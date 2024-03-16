<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use App\Payments;
use App\Filter;
/**/use App\Promocode;/**/
use Carbon\Carbon;
use Illuminate\Http\Request;
use Redis;

class ChatController extends Controller
{
    const CHAT_CHANNEL = 'chat.message';
    const NEW_MSG_CHANNEL = 'new.msg';
    const CLEAR = 'chat.clear';
    const DELETE_MSG_CHANNEL = 'del.msg';
	const BAN_CHANNEL = 'ban.msg';

    public function __construct()
    {
        parent::__construct();
        $this->redis = Redis::connection();
    }

    public static function chat()
    {
        $redis = Redis::connection();

        $value = $redis->lrange(self::CHAT_CHANNEL, 0, -1);
        $i = 0;
        $returnValue = NULL;
        $value = array_reverse($value);

        foreach ($value as $key => $newchat[$i]) {
            if ($i > 20) {
                break;
            }
            $value2[$i] = json_decode($newchat[$i], true);

            $value2[$i]['username'] = htmlspecialchars($value2[$i]['username']);

            $returnValue[$i] = [
                'unique_id' => $value2[$i]['unique_id'],
                'avatar' => $value2[$i]['avatar'],
                'time' => $value2[$i]['time'],
                'time2' => $value2[$i]['time2'],
                'ban' => self::checkBan($value2[$i]['unique_id']),
                'messages' => $value2[$i]['messages'],
                'username' => $value2[$i]['username'],
                'youtuber' => $value2[$i]['youtuber'],
                'moder' => $value2[$i]['moder'],
                'admin' => $value2[$i]['admin']];

            $i++;

        }

       if(!is_null($returnValue)) return array_reverse($returnValue);
    }

	private static function checkBan($id) {
		$user = User::where('unique_id', $id)->first();
		$ban = 0;
		if(!is_null($user['banchat'])) $ban = 1;
		return $ban;
	}

    public function __destruct() {
        $this->redis->disconnect();
    }

	public function ban(Request $r) {
		$user = User::where('unique_id', $r->get('id'))->first();
		if(is_null($user)) return response()->json(['success' => false, 'msg' => 'Пользователь не найден!', 'type' => 'error']);
		if(!is_numeric($r->get('time')) || $r->get('time') <= 0) return response()->json(['success' => false, 'msg' => 'Вы ввели некоректное значение для поля "Время"!', 'type' => 'error']);
		if(!is_null($user->banchat)) return response()->json(['success' => false, 'msg' => 'Пользователь уже заблокирован!', 'type' => 'info']);
		if($user->unique_id == $this->user->unique_id) return response()->json(['success' => false, 'msg' => 'Вы не можете заблокировать себя!', 'type' => 'info']);

		$user->banchat = Carbon::now()->addMinutes(floatval($r->get('time')))->getTimestamp();
		$user->banchat_reason = htmlspecialchars($r->get('reason'));
		$user->save();

		$banusername = preg_replace('#(.*)\s+(.).*#usi', '$1 $2.', htmlspecialchars($user->username));

		$time = date('H:i', time());
        $moder = $this->user->is_moder;
        $youtuber = $this->user->is_youtuber;
        $unique_id = $this->user->unique_id;
        $avatar = $this->user->avatar;
		$ban = 0;
		if(!is_null($this->user->banchat)) $ban = 1;
		$username = preg_replace('#(.*)\s+(.).*#usi', '$1 $2.', htmlspecialchars($this->user->username));
		$admin = 0;
		if($this->user->is_admin) {
			$avatar = '/img/no_avatar.png';
			$unique_id = null;
			$admin = 1;
		}

		$returnValue = ['unique_id' => $unique_id, 'avatar' => $avatar, 'time2' => Carbon::now()->getTimestamp(), 'time' => $time, 'messages' => '<span style="color: #4986f5;">Пользователь "'.$user->username.'" заблокирован в чате на '.floatval($r->get('time')).' мин.'. ($r->get('reason') ? ' Причина: '.htmlspecialchars($r->get('reason')).'.' : '') .'</span>', 'username' => $username, 'ban' => $ban, 'admin' => $admin, 'moder' => $moder, 'youtuber' => $youtuber];
		$returnBan = ['unique_id' => $user->unique_id, 'username' => $banusername, 'ban' => 1];
		$this->redis->publish(self::BAN_CHANNEL, json_encode($returnBan));
		$this->redis->rpush(self::CHAT_CHANNEL, json_encode($returnValue));
		$this->redis->publish(self::NEW_MSG_CHANNEL, json_encode($returnValue));

		return response()->json(['success' => true, 'msg' => 'Пользователь '. $user->username .' заблокирован в чате на '. $r->get('time') .' мин!', 'type' => 'success']);
	}

        public function newQuiz(Request $r) {
        $data = [
            "question" => $r->get("question"),
            "amount" => floor($r->get("amount")),
            "typeBalance" => $r->get("typeBalance")
        ];
        $this->redis->publish("quiz.new", json_encode($data));
        $data['answer'] = $r->get("answer");
        $this->redis->set("quiz", json_encode($data));
        return response()->json([
            "success" => true,
            "type" => "success",
            "msg" => "Вы успешно создали викторину"
        ]);
    }

	public function unban(Request $r) {
		$user = User::where('unique_id', $r->get('id'))->first();
		if(is_null($user)) return response()->json(['success' => false, 'msg' => 'Пользователь не найден!', 'type' => 'error']);
		if(is_null($user->banchat)) return response()->json(['success' => false, 'msg' => 'Пользователь не заблокирован!', 'type' => 'info']);
		if($user->unique_id == $this->user->unique_id) return response()->json(['success' => false, 'msg' => 'Вы не можете разблокировать себя!', 'type' => 'info']);

		$user->banchat = null;
		$user->banchat_reason = null;
		$user->save();

		$banusername = preg_replace('#(.*)\s+(.).*#usi', '$1 $2.', htmlspecialchars($user->username));

		$time = date('H:i', time());
        $moder = $this->user->is_moder;
        $youtuber = $this->user->is_youtuber;
        $unique_id = $this->user->unique_id;
        $avatar = $this->user->avatar;
		$ban = 0;
		if(!is_null($this->user->banchat)) $ban = 1;
		$username = preg_replace('#(.*)\s+(.).*#usi', '$1 $2.', htmlspecialchars($this->user->username));
		$admin = 0;
		if($this->user->is_admin) {
			$avatar = '/img/no_avatar.png';
			$unique_id = null;
			$admin = 1;
		}

		$returnValue = ['unique_id' => $unique_id, 'avatar' => $avatar, 'time2' => Carbon::now()->getTimestamp(), 'time' => $time, 'messages' => '<span style="color: #4986f5;">Пользователь "'.$user->username.'" разблокирован в чате.</span>', 'username' => $username, 'ban' => $ban, 'admin' => $admin, 'moder' => $moder, 'youtuber' => $youtuber];
		$returnBan = ['unique_id' => $user->unique_id, 'username' => $banusername, 'ban' => 0];
		$this->redis->publish(self::BAN_CHANNEL, json_encode($returnBan));
		$this->redis->rpush(self::CHAT_CHANNEL, json_encode($returnValue));
		$this->redis->publish(self::NEW_MSG_CHANNEL, json_encode($returnValue));

		return response()->json(['success' => true, 'msg' => 'Пользователь '. $user->username .' разблокирован в чате!', 'type' => 'success']);
	}

	public function clear() {
		$this->redis->del(self::CHAT_CHANNEL);
		$this->redis->publish(self::CLEAR, 1);
		return response()->json(['success' => true, 'msg' => 'Вы очистили чат!', 'type' => 'success']);
	}

	public function unBanFromUser() {
		$users = User::where('banchat', '!=', NULL)->orderBy('banchat', 'asc')->get();
		if($users == '[]') return response()->json(['msg' => 'Пользователи не найдены!', 'status' => 'error']);
		foreach($users as $usr) {
			$nowtime = time();
			if($usr->banchat <= $nowtime) {
				User::where('unique_id', $usr->unique_id)->update(['banchat' => null, 'banchat_reason' => null]);
				$returnBan = ['unique_id' => $usr->unique_id, 'username' => $usr->username, 'ban' => 0];
				$this->redis->publish(self::BAN_CHANNEL, json_encode($returnBan));
			}
		}
		return response()->json(['msg' => 'Пользователи разбарены', 'status' => 'success']);
	}

    public function add_message(Request $request) {
		if(\Cache::has('action.user.' . $this->user->id)) return response()->json(['message' => 'Вы слишком часто отправляете сообщения!', 'status' => 'error']);
        \Cache::put('action.user.' . $this->user->id, '', 5);
        $val = \Validator::make($request->all(), [
            'messages' => 'required|string|max:255'
        ],[
            'required' => 'Сообщение не может быть пустым!',
            'string' => 'Сообщение должно быть строкой!',
            'max' => 'Максимальный размер сообщения 255 символов.',
        ]);
        $error = $val->errors();

        if($val->fails()){
            return response()->json(['message' => $error->first('messages'), 'status' => 'error']);
        }

        if($this->user->is_admin) $messages = strip_tags($request->get('messages'), '<img>');
        else {
			if(substr_count(strtolower($request->get('messages')), '<img class="s')) $messages = $request->get('messages');
			else $messages = html_entity_decode(strip_tags($request->get('messages'), '<img>'));
		}

		$dep = Payments::where('user_id', $this->user->id)->where('status', 1)->sum('sum');
        if(!$this->user->is_admin && !$this->user->is_moder && !$this->user->is_youtuber) {
            if($this->settings->chat_dep != 0) if($dep < $this->settings->chat_dep) {
                return response()->json(['message' => 'Для того чтобы писать в чат, вам нужно пополнить счет на '.$this->settings->chat_dep.' руб!', 'status' => 'error']);
            }
        }

        $nowtime = time();
        $banchat = $this->user->banchat;
        if($banchat >= $nowtime) {
            return response()->json(['message' => 'Вы заблокированы до: '.date("d.m.Y H:i:s", $banchat), 'status' => 'error']);
        }

        $words = Filter::get();
        foreach($words as $value) {
			if(substr_count(mb_strtolower($messages), $value->word)) $messages = mb_strtolower($messages);
            $messages = str_ireplace($value->word, $this->settings->censore_replace, $messages);
        }

        $quiz = $this->redis->get("quiz");
        if($quiz != "") {
            $quiz = json_decode($quiz, true);
            if(strtoupper($messages) == strtoupper($quiz['answer'])) {
                $this->redis->del("quiz");

                $this->user[$quiz['typeBalance']] += $quiz['amount'];
                $this->user->save();

                if($quiz['typeBalance'] == 'balance') $this->redis->publish('updateBalance', json_encode([
                    'unique_id' => $this->user->unique_id,
                    'balance' 	=> round($this->user->balance, 2)
                ]));
                if($quiz['typeBalance'] == 'bonus') $this->redis->publish('updateBonus', json_encode([
                    'unique_id' => $this->user->unique_id,
                    'bonus' 	=> round($this->user->bonus, 2)
                ]));

                $this->redis->publish("quiz.winner", json_encode([
                    "user" => [
                        "username" => $this->user->username,
                        "avatar" => $this->user->avatar
                    ],
                    "amount" => $quiz['amount'],
                    "type" => $quiz['typeBalance'],
                    "answer" => $quiz['answer']
                ]));
                return response()->json(['message' => "Вы правильно ответили на вопрос викторины", 'status' => 'success']);
            }
        }

        $time = date('H:i', time());
        $moder = $this->user->is_moder;
        $youtuber = $this->user->is_youtuber;
        $admin = 0;
        $ban = $this->user->banchat;
        $unique_id = $this->user->unique_id;
		$username = preg_replace('#(.*)\s+(.).*#usi', '$1 $2.', htmlspecialchars($this->user->username));
        $avatar = $this->user->avatar;
        if($this->user->is_admin) {
            if($request->get('optional')) {
                $admin = 1;
            }
        }
        if($admin) {
            $avatar = '/img/no_avatar.png';
            $unique_id = '';
        }

        function object_to_array($data) {
            if (is_array($data) || is_object($data)) {
                $result = array();
                foreach ($data as $key => $value) {
                    $result[$key] = object_to_array($value);
                }
                return $result;
            }
            return $data;
        }

		if(substr_count(strtolower($messages), '$bal')) {
			if(\Cache::has('bal.'.$request->get('balType').'.user.' . $this->user->id)) return response()->json(['message' => 'Вы слишком часто выполняете это действие!', 'status' => 'error']);
        	\Cache::put('bal.'.$request->get('balType').'.user.' . $this->user->id, '', 300);
			$returnValue = ['unique_id' => $unique_id, 'avatar' => $avatar, 'time2' => Carbon::now()->getTimestamp(), 'time' => $time, 'messages' => '<div class="chat-transaction flex-row align-center"><div class="chat-transaction__icon"><svg class="icon"><use xlink:href="/img/symbols.svg#icon-bank-'.$request->get('balType').'"></use></svg></div><div class="flex-column flex-column_align-start"><div class="chat-transaction__status">' . ($request->get('balType') == 'balance' ? 'Мой баланс' : 'Мои бонусы') . '</div><span class="chat-message-transaction-link">'.($request->get('balType') == 'balance' ? $this->user->balance : $this->user->bonus).' <svg class="icon icon-coin '.$request->get('balType').'"><use xlink:href="/img/symbols.svg#icon-coin"></use></svg></span></div></div>', 'username' => $username, 'ban' => $ban, 'admin' => $admin, 'moder' => $moder, 'youtuber' => $youtuber];
			$this->redis->rpush(self::CHAT_CHANNEL, json_encode($returnValue));
			$this->redis->publish(self::NEW_MSG_CHANNEL, json_encode($returnValue));
			return response()->json(['message' => 'Вы показали свой баланс в чате!', 'status' => 'success']);
		}
		
		/*Промо в чат*/

if(substr_count(strtolower($messages), '$prom')) {
    $promo = htmlspecialchars($request->get('promo'));
    if(!$promo) return response()->json(['message' => 'Вы не ввели промокод!', 'status' => 'error']);
    $promik = Promocode::where('code', $promo)->first();
    if(!$promik) return response()->json(['message' => 'Такого кода не существует!', 'status' => 'error']);
            $sum = Promocode::where('code', $promo)->sum('amount');
            $amount = Promocode::where('code', $promo)->sum('count_use');
            $username = 'Промокод';
            $avatar = '/img/promo.png';
            $returnValue = ['unique_id' => $unique_id, 'avatar' => $avatar, 'time2' => Carbon::now()->getTimestamp(), 'time' => $time, 'messages' => '<div class="chat-transaction"><div class="flex-column"><div class="chat-transaction__status">'.$request->get('promo').'</div><span class="chat-message-transaction-link color-white">'.$sum.' <svg class="icon icon-coin bonus"><use xlink:href="/img/symbols.svg#icon-coin"></use></svg> / Кол-во: '.$amount.'</span></div></div>', 'username' => $username, 'ban' => $ban, 'admin' => $admin, 'moder' => $moder, 'youtuber' => $youtuber];
            $this->redis->rpush(self::CHAT_CHANNEL, json_encode($returnValue));
            $this->redis->publish(self::NEW_MSG_CHANNEL, json_encode($returnValue));
            return response()->json(['message' => 'Вы отправили промокод в чат!', 'status' => 'success']);
            
        }

/************/

/*Telegram в чат*/
        if(preg_match("/TM/", $messages) && $admin == 1) {
        $telega = 'https://t.me/milkivay77';    
        $returnValue = ['unique_id' => $unique_id, 'avatar' => $avatar, 'time2' => Carbon::now()->getTimestamp(), 'time' => $time, 'messages' => 'Подписываемся на наш <a href="'.$telega.'" target="_blank">Telegram</a> канал!', 'username' => $username, 'ban' => $ban, 'admin' => $admin, 'moder' => $this->user->is_moder, 'youtuber' => $this->user->is_youtuber];
        $this->redis->rpush(self::CHAT_CHANNEL, json_encode($returnValue));
        $this->redis->publish(self::NEW_MSG_CHANNEL, json_encode($returnValue));
        return response()->json(['message' => 'Telegram канал опубликован!', 'status' => 'success']);
        }
/*************/

/*ВК в чат*/
        if(preg_match("/VK/", $messages) && $admin == 1) {
        $vkontakte = 'https://vk.com/milkivay_ru';    
        $returnValue = ['unique_id' => $unique_id, 'avatar' => $avatar, 'time2' => Carbon::now()->getTimestamp(), 'time' => $time, 'messages' => 'Подписываемся на нашу группу <a href="'.$vkontakte.'" target="_blank">ВК</a> канал!', 'username' => $username, 'ban' => $ban, 'admin' => $admin, 'moder' => $this->user->is_moder, 'youtuber' => $this->user->is_youtuber];
        $this->redis->rpush(self::CHAT_CHANNEL, json_encode($returnValue));
        $this->redis->publish(self::NEW_MSG_CHANNEL, json_encode($returnValue));
        return response()->json(['message' => 'Telegram канал опубликован!', 'status' => 'success']);
        }
/*************/

/*Блокировка промо в чат*/
        $banPromo = Promocode::get();
        $banWord = "[Промокод]";
        foreach($banPromo as $value) {
			if(substr_count(mb_strtolower($messages), $value->code)) $messages = mb_strtolower($messages);
            $messages = str_ireplace($value->code, $banWord, $messages);
        }
/***********************/

		if(preg_match("/href|url|http|https|www|.ru|.com|.net|.info|csgo|winner|ru|xyz|com|net|info|.org/i", $messages)) {
			return response()->json(['message' => 'Ссылки запрещены!', 'status' => 'error']);
		}
        $returnValue = ['unique_id' => $unique_id, 'avatar' => $avatar, 'time2' => Carbon::now()->getTimestamp(), 'time' => $time, 'messages' => htmlspecialchars($messages), 'username' => $username, 'ban' => $ban, 'admin' => $admin, 'moder' => $this->user->is_moder, 'youtuber' => $this->user->is_youtuber];
        $this->redis->rpush(self::CHAT_CHANNEL, json_encode($returnValue));
        $this->redis->publish(self::NEW_MSG_CHANNEL, json_encode($returnValue));
        return response()->json(['message' => 'Ваше сообщение успешно отправлено!', 'status' => 'success']);
    }

    public function delete_message(Request $request) {
        $value = $this->redis->lrange(self::CHAT_CHANNEL, 0, -1);
        $i = 0;
        $json = json_encode($value);
        $json = json_decode($json);
        foreach ($json as $newchat) {
            $val = json_decode($newchat);

            if ($val->time2 == $request->get('messages')) {
                $this->redis->lrem(self::CHAT_CHANNEL, 1, json_encode($val));
                $this->redis->publish(self::DELETE_MSG_CHANNEL, json_encode($val));
            }
            $i++;
        }
        return response()->json(['message' => 'Сообщение удалено!', 'status' => 'success']);
    }
}