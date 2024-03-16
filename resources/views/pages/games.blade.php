@extends('layout')

@section('content')
         <link rel="stylesheet" href="/css/games.css">
<div class="section_Section__14IWw landing_LandingGameSection__JPR73">
                    <div class="news-block">
                        <strong> Промокоды -></strong>
                        <a href="https://vk.com/malexenka"><p class="link">ВКонтакте</p></a>
                        <a href="https://t.me/justfolked"><p class="link">Телеграм</p></a>
                    </div> 
                
<div class="games-cards-list">

	<div class="game-card">
        <div class="game-title"><h2>JACKPOT</h2></div>
        <div class="game-image locked">
        	<img src="/static/games/bet.png">
        </div>
        <div class="game-description">
        	<button class="game__info" data-toggle="tooltip" data-placement="top" title="
        	Перед началом раунда игроки вносят ставки в общий банк. Чем больше ваш вклад в банк - тем больше шансов выиграть джекпот!"> ?
        	</button>
        </div>
        <div class="game-play">
            <a href="/jackpot">Играть</a>
        </div>
    </div>

	<div class="game-card">
        <div class="game-title"><h2>CRASH</h2></div>
        <div class="game-image locked">
        	<img src="/static/games/money.png">
        </div>    
        <div class="game-description">
        	<button class="game__info" data-toggle="tooltip" data-placement="top" title="
        	Угадайте, до какой точки будет расти график. Чем выше точка - тем больше выигрыш!"> ?
        	</button>
        </div>
        <div class="game-play">
            <a href="/crash">Играть</a>
        </div>
    </div> 


<div class="game-card">
        <div class="game-title"><h2>WHEEL</h2></div>
        <div class="game-image locked">
        	<img src="/static/games/casino.png">
        </div>    
        <div class="game-description">
        	<button class="game__info" data-toggle="tooltip" data-placement="top" title="
        	Выбираете один из 4-ёх множителей и ставите ,при выигрыше ваш баланс умножится в соответствии с выбраным множителем."> ?
        	</button>
        </div>
        <div class="game-play">
            <a href="/wheel">Играть</a>
        </div>
    </div>

	<div class="game-card">
        <div class="game-title"><h2>PVP</h2></div>
        <div class="game-image locked">
        	<img src="/static/games/sword.png">
        </div>    
        <div class="game-description">
        	<button class="game__info" data-toggle="tooltip" data-placement="top" title="
        	Битва 50 на 50!"> ?
        	</button>
        </div>
        <div class="game-play">
            <a href="/coinflip">Играть</a>
        </div>
    </div>

	
		<div class="game-card">
        <div class="game-title"><h2>MINES</h2></div>
        <div class="game-image locked">
        	<img src="/static/games/bomb.png">
        </div>    
        <div class="game-description">
        	<button class="game__info" data-toggle="tooltip" data-placement="top" title="
        	Чем больше Вы угадываете пустую ячейку ,тем выше Ваш выигрыш!"> ?
        	</button>
        </div>
        <div class="game-play">
            <a href="/mines">Играть</a>
        </div>
    </div>
	
	
		<div class="game-card">
        <div class="game-title"><h2>CASES</h2></div>
        <div class="game-image locked">
        	<img src="/static/games/work.png">
        </div>        
        <div class="game-description">
        	<button class="game__info" data-toggle="tooltip" data-placement="top" title="
        	Открываю денежный кейс ,вы получаете рандомную сумму ,она может быть так выше Вашей ставки ,так и ниже!"> ?
        	</button>
        </div>
        <div class="game-play">
            <a href="#">Soon</a>
        </div>
    </div>

</div>	
@endsection