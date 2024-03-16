<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Mines;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Settings;
use DB;
use App\Http\Controllers\Controller;

class MinesController extends Controller
{
	public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('pages.mines');
    }

    public function bet(Request$r) {
    	    $type = $r->type;
  		 $bet = $r->bet;

  		if(!$bet) return array("info" => "warning", "warning"=>"Введите сумму ставки");

  		if($bet > $this->user->balance) return array("info" => "warning", "warning"=>"Недостаточно средств");





    $mines = $r->mines; //кол-во мин
    if($mines == 3 || $mines == 5 || $mines == 10 || $mines == 24){
    if($bet >= "1"){
    if($type == "mine"){
  
  $addbilet = $bet / 100;

$addbileted = User::where('id', $this->user->id)->first();
$addbileted->bilet += $addbilet;
$addbileted->save(); 
 
  
     
      $rowsminenum = DB::table('mines-game')->where('id_users', $this->user->id)->where('onOff', 1)->orderBy('id', 'desc')->limit(1)->count();
    
  
      if($rowsminenum != 0){
      return array("info" => "false");
      }else{
        //вычитаем монету
        $this->user->balance -= $bet;
        $this->user->save();
  
        $this->redis->publish('updateBalance', json_encode([
            'id' => $this->user->id,
            'balance' => $this->user->balance
        ]));  
        
        if($mines == 3){
          $resultmines = range(1,25);
          shuffle($resultmines);
          $resultmines = array_slice($resultmines,0,3);
        }
        if($mines == 5){
          $resultmines = range(1,25);
          shuffle($resultmines);
          $resultmines = array_slice($resultmines,0,5);
        }
        if($mines == 10){
          $resultmines = range(1,25);
          shuffle($resultmines);
          $resultmines = array_slice($resultmines,0,10);
        }
        if($mines == 24){
          $resultmines = range(1,25);
          shuffle($resultmines);
          $resultmines = array_slice($resultmines,0,24);
        }
        $resultmines = serialize($resultmines);
  
        $sss = []; // для заполнения столбца (click)
        $sss = serialize($sss); // часть функции
  

		DB::table('mines-game')->insert([
            'id_users' => $this->user->id,
            'bet' => $bet,
            'onOff' => 1,
            'step' => 0,
            'result' => 1,
            'win' => 0,
            'mines' => $resultmines,
            'click' => $sss,
            'num_mines' => $mines,
            'login' => $this->user->user_id

        ]);
       
  
        return array("info"=>"true","money"=> $this->user->balance);
      }
    }
}
}
}

    public function mine(Request $r) {


$mines = DB::table('mines-game')->where('id_users', $this->user->id)->orderBy('id', 'desc')->limit(1)->first()->mines;
$minesgame = DB::table('mines-game')->where('id_users', $this->user->id)->orderBy('id', 'desc')->limit(1)->first();
$click = DB::table('mines-game')->where('id_users', $this->user->id)->orderBy('id', 'desc')->limit(1)->first()->click;
$step = DB::table('mines-game')->where('id_users', $this->user->id)->orderBy('id', 'desc')->limit(1)->first()->step;
$win = DB::table('mines-game')->where('id_users', $this->user->id)->orderBy('id', 'desc')->limit(1)->first()->win;
$bet = DB::table('mines-game')->where('id_users', $this->user->id)->orderBy('id', 'desc')->limit(1)->first()->bet;
$num_mines = DB::table('mines-game')->where('id_users', $this->user->id)->orderBy('id', 'desc')->limit(1)->first()->num_mines;

    $mmines = $r->mmine;
    if($mmines >= "1" && $mmines <= "25"){
    
    
    
    
    $mines = unserialize($mines);
    if($minesgame !=  null){
    

    $threebombs = [1.03,1.06,1.12,1.18,1.30,1.45,1.67,2.51,2.9,3.8,6,7.33,9.93,13.24,18.2,26.01,39.01,62.42,109.25,218.5,546.25,2190];
    $fivebombs = [1.18,1.5,1.91,2.48,3.01,3.84,5.89,7.15,8.55,12.8,17.21,25.21,40.72,80.25,150.29,350.58,504.31,700.05,1500];
    $tenbombs = [1.38,2.41,3.8,5.8,8.8,11.61,17.96,25.67,55.77,103,310,1086,4700,28200,31100];
    $twfobombs = [23.8];
    

 

    

    if(in_array($mmines,$mines)){
    
       //тут есть бомба, игра проиграна
    
      
    	DB::table('mines-game')->where('id_users', $this->user->id)->orderBy('id', 'desc')->limit(1)->update([
            'onOff' => 2,
            'win' => 0
        ]);

    
        // для работы с антиминусом

  
      $tamines = json_encode($mines);

      $saad = "<span class='number result-lose result'><span class='myBetsBox'>".$bet."</span> <i class='fas fa-coins'></i></span>";
      return array("info" => "click","bombs"=>"true","pressmine" => "$mmines","tamines"=>"$tamines","resultHistoryContentBomb"=>"$saad");
    
    }else{

     

        $win = $win - $bet;
        if($win < 100000){
      

       //тут нет бомбы, все четко...
    
      $stepadd = Mines::where('id_users', $this->user->id)->orderBy('id', 'desc')->limit(1)->first();
      $stepadd->step += 1;
      $stepadd->save();
    
      if($num_mines == "3"){
      $win = $bet * $threebombs[$stepadd->step];
      }
      if($num_mines == "5"){
      $win = $bet * $fivebombs[$stepadd->step];
      }
      if($num_mines == "10"){
      $win = $bet * $tenbombs[$stepadd->step];
      }
      if($num_mines == "24"){
      $win = $bet * 23.8;
      }

    
     //кол-во криссталов
      $gem_number = 24 - $num_mines - $stepadd->step;

      $stepadd->win = $win;
      $stepadd->save();
    
   

      if($num_mines == 3){
        $nextCoef = $threebombs[$stepadd->step+1];
      }
      if($num_mines == 5){
        $nextCoef = $fivebombs[$stepadd->step+1];
      }
      if($num_mines == 10){
        $nextCoef = $tenbombs[$stepadd->step+1];
      }
      if($num_mines == 24){
        $nextCoef = 23.8;
      }
      $rdr = "<span class='number result-win result'><span class='myBetsBox'>".$win."</span> <i class='fas fa-coins'></i></span>";
      return array("info" => "click","bombs"=>"false","pressmine" => "$mmines","win" => "$win","gem"=>"$gem_number","nextX"=>"$nextCoef","resultHistoryContentBomb"=>"$rdr");
        

   } 
   else {

    //создаем проигрышный вариант игры

$query = DB::table()->where('id_users', $this->user->id)->where('onOff', 1)->first();

$click = $query->click;
$step = $query->step;
$num_mines = $query->num_mines;
$resultgame = $query->result;
$onOff = $query->onOff;
$click = unserialize($click);



    //создаем новый массив, нужно учесть значения click

  $mines = [];
  $mines[] = $mmines;      
  while(count($mines) < $num_mines){
    $rand = mt_rand(1,25);
    if(in_array($rand,$click)){
    }else{
        if(in_array($rand,$mines) == false){
           $mines[] = $rand;
        }

    }
}
    }



}
}
}
}


public function finish()
{

$mines = DB::table('mines-game')->where('id_users', $this->user->id)->orderBy('id', 'desc')->limit(1)->first()->mines;
$minesgame = DB::table('mines-game')->where('id_users', $this->user->id)->orderBy('id', 'desc')->limit(1)->first();
$click = DB::table('mines-game')->where('id_users', $this->user->id)->orderBy('id', 'desc')->limit(1)->first()->click;
$step = DB::table('mines-game')->where('id_users', $this->user->id)->orderBy('id', 'desc')->limit(1)->first()->step;
$win = DB::table('mines-game')->where('id_users', $this->user->id)->orderBy('id', 'desc')->limit(1)->first()->win;
$bet = DB::table('mines-game')->where('id_users', $this->user->id)->orderBy('id', 'desc')->limit(1)->first()->bet;
$num_mines = DB::table('mines-game')->where('id_users', $this->user->id)->orderBy('id', 'desc')->limit(1)->first()->num_mines;

      $minesget = Mines::where('id_users', $this->user->id)->orderBy('id', 'desc')->limit(1)->first();

    $mines = unserialize($mines);
  
      if($step != "0"){
      if($minesgame != null){

      $this->user->balance += $minesget->win;
      $this->user->save();

        $this->redis->publish('updateBalance', json_encode([
            'id' => $this->user->id,
            'balance' => $this->user->balance
        ]));

      $minesget->onOff = 2;
      $minesget->save();
  
     $tamines = json_encode($mines);
    
    $win = $win;
    $money = $this->user->balance + $win; //для правильного отображения баланса
    $ssa = "<span class='number result-win result'><span class='myBetsBox'>".$win."</span> <i class='fas fa-coins'></i></span>"; 
    return array("info"=>"true","win" => "$win","money"=>"$money","tamines"=>"$tamines","resultHistoryContentBomb"=>"$ssa");
  }else{
    return array("info" => "warning","warning"=>"Игра не существует.");
  }
  }else{
    return array("info" => "warning","warning"=>"Ты не нажал на поле!");
  }

}

}