@extends('layout')

@section('content')
@include('includes.openLayout')


<div id="content">
		<div id="spinner">
		<div class="container">
			<div class="content">
				<span class="name {{$spinner->color}}-spinner">{{ $spinner->name }}</span>
				<div class="row params">
					<div class="col-lg-4 col-sm-4 col-4 param">
						<div class="spinner-param-item tltp">
							<div class="tooltiptext">
								Цена спиннера
							</div>
							<span class="font-bold">{{ $spinner->price }} <span class="rouble">&#8399;</span></span>
						</div>
					</div>
					<div class="col-lg-4 col-sm-4 col-4 param">
						<div class="spinner-param-item tltp">
							<div class="tooltiptext">
								Максимальное число оборотов
							</div>
							<img src="/images/spinscount-icon.png">
							<span class="maxspins">{{ $spinner->max_spin }}</span>
						</div>
					</div>
					<div class="col-lg-4 col-sm-4 col-4 param">
						<div class="spinner-param-item tltp">
							<div class="tooltiptext">
								Диапазон для ставки
							</div>
							<img src="/images/range-icon.png">
							<span class="range">{{ $spinner->diapasone }}</span>
						</div>
					</div>
				</div>
				<div class="case-arrow-left case-arrow-class" style="float: left;"><img src="/images/spinners/arrows/{{$spinner->color}}-spinner_left.png" alt=""></div>
				<div class="case-arrow-right case-arrow-class" style="float: right;"><img src="/images/spinners/arrows/{{$spinner->color}}-spinner_right.png" alt=""></div>
				<div class="spinner {{$spinner->color}}-spinner">
					<div class="spinner-box">
				    	<img class="js-spinner" src="/images/spinners/spin/{{$spinner->color}}-spinner.png">
				   		<span class="counter js-spins-counter">0</span>  
					</div>
				</div>
				<div class="interface">
					<p>Я думаю, спиннер сделает оборотов:</p>
					<div class="userrange">
						<input type="text" class="js-input-range-from"> - <input type="text" class="js-input-range-to">
						<div id="range" class="js-slider-range"></div>
					</div>
				</div> 
				<div class="spin js-button-spin" id="spin">
					Крутить!
				</div>
				<div class="canwin">Возможный выигрыш: <span class="color-limegreen font-bold">{{ $spinner->max_profit }}  <span class="rouble">&#8399;</span></span></div>
				<!--<div class="wantbonusratio" style="margin-bottom: 8px;" onclick="$('#bonusratioinvite').slideToggle();"><span class="how">Как увеличить приз?</span></div>
					<div id="bonusratioinvite" style="display:none;">
						<p class="wantbonusratio" style="margin-bottom:0">Вы можете увеличить приз до <span class="color-limegreen font-bold">{{$spinner->bonus}} <span class="rouble">&#8399;</span>:</span></p>
						<p style="margin-bottom:0" class="wantbonusratio">1. Вступите в нашу группу: <a href="https://vk.com/milkivay_ru" class="color-primary" target="_blank">vk.com/spinmoneyonline</a></p>
						<p style="margin-bottom:0" class="wantbonusratio">2. Обновите страницу</p>
						<p class="wantbonusratio">3. Приз увеличен!</p>
					</div>

				
				<div class="howworks">
					<p class="color-primary" style="font-size:20px; margin-bottom:10px;"> Ваша цель - угадать, сколько оборотов сделает спиннер!</p>

					<p><b class="lightgray">Цена</b> - cумма, необходимая для того, чтобы закрутить спиннер;</p>

					<p><b class="lightgray">Максимальное число оборотов.</b> Спиннер делает случайное число оборотов от 1 до N, где N - максимальное число оборотов.</p>

					<p><b class="lightgray">Диапазон ставки.</b> В спиннере установлен диапазон чисел, который вы можете выбрать.</p>

					<p><b class="lightgray">Возможный выигрыш</b> - cумма, которую вы получите, если угадаете.</p>

					<p style="margin-top:10px;">После нажатия на кнопку "Крутить!", если количество оборотов, которое сделал спиннер войдет в выбранный Вами диапазон (включительно!) - вы получите заявленный выигрыш.</p>

					<p class="color-primary" style="margin: 10px 0 0 0">Что будет, если я не угадаю?</p>

					<p>Вы получите часть денег обратно на баланс. Сумма будет зависить от того, насколько Вы близки к результату!</p>
				</div>
				<br><br>
			</div>
		</div>
	</div>-->
	<div id="winmodal" class="modal fade js-spin-win-modal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-header">
				<div class="modal-title">
					<span class="win-type-win js-win-type js-win-type-win">Победа!</span>
					<span class="win-type-prewin js-win-type js-win-type-prewin">Было близко!</span>
					<span class="win-type-lose js-win-type js-win-type-lose">Не повезло</span>
				</div>
			</div>
			<div class="modal-body row">
				<div class="win-inner">
					<div class="spinner {{$spinner->color}}-spinner">
						<div class="image">
							<img src="/images/spinners/main/{{$spinner->color}}-spinner.png">
						</div>
					</div>
					<p>Ваш выигрыш: 
						<span id="win-count"><span class="js-spin-win-sum">0</span> <span class="rouble">&#8399;</span></span> 
						<a class="btn" data-dismiss="modal">Сыграть еще раз</a>	
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="/js/Utils.js"></script>
<script src="/js/LiveDropModule.js"></script>
<script src="/js/SpinModule.js"></script>
<script src="/js/nouislider.min.js"></script>
<script>
    SpinModule.init({
        "inputRangeFrom":".js-input-range-from",
        "inputRangeTo":".js-input-range-to",
        "spinnerId":"{{ $spinner->id }}",
        "spinnerRange":{{ $spinner->diapasone }},
        "maxSpins":{{ $spinner->max_spin }},
        "sliderRange":".js-slider-range",
        "buttonSpin":".js-button-spin",
        "csrf":"{{ csrf_token() }}",
        "spinner":".js-spinner",
        "spinsCounter":".js-spins-counter",
        "LiveDropModule":LiveDropModule,
        "winModal":".js-spin-win-modal",
        "winSum":".js-spin-win-sum",
        "winType":".js-win-type",
        "winTypeWin":".js-win-type-win",
        "winTypePrewin":".js-win-type-prewin",
        "winTypeLose":".js-win-type-lose",
        "spanBalance":"#balance",
        "spinnerPrice":{{ $spinner->price }}
    });
</script>
        
@endsection