@extends('layout')

@section('content')

<link rel="stylesheet" href="css/mines.css?v={{ time() }}">
<script src="js/mines.js?v={{ time() }}"></script>
<script src="{{ asset('/js/chart.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/crash.js') }}"></script>
	<script type="text/javascript" src="https://ned.im/noty/v2/vendor/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="https://ned.im/noty/v2/vendor/noty-2.4.1/js/noty/packaged/jquery.noty.packaged.js"></script>   
	<script type="text/javascript" src="https://ned.im/noty/v2/vendor/google-code-prettify/prettify.js"></script> 
    <script type="text/javascript" src="https://ned.im/noty/v2/vendor/share.min.js"></script> 
    <script type="text/javascript" src="https://ned.im/noty/v2/vendor/showdown/showdown.min.js"></script>
    <link rel="stylesheet" href="https://ned.im/noty/v2/vendor/animate.css" />
    <div class="section game-section">
        <div style="float: unset;width: auto;" class="container">
            <div class="game">



                        <!-- <div class="block">

                            <div class="bet methods-value bg">
                                <div class="value">
                                    <input type="text" value="0.00" id="amount" placeholder="Сумма ставки">
                                </div>
                          
                            </div>
                        </div>
                        <div class="block" style="width: 100%;margin-top: 10px;">

                            <div class="bet methods-value bg">
                                Количество бомб
                                <ul>
                                    <li><a class="selectBomb isActive" data-bomb="3">3</a></li>
                                    <li><a class="selectBomb" data-bomb="5">5</a></li>
                                    <li><a class="selectBomb" data-bomb="10">10</a></li>
                                    <li><a class="selectBomb" data-bomb="24">24</a></li>
                                </ul>

                            </div>
                        </div>
                        <div class="bet-component">
                            <div class="bet-form">
                                <button style="cursor: pointer; margin-top: 10px;" type="button"
                                    class="btn btn-green btn-play "><span>Играть</span></button>
                            </div>
                        </div> -->

                    </div>
                </div>
					<center>
                        <div class="tower_component__3oM-1" style="background: #212121;box-shadow: 0 0 5px;">
                            <div class="tower_tiles__2V8Cz tile_notAutomated__2MIRN">

							<div class="minefield">
								@if(!Auth::guest())
								<?php
								$query = DB::table('mines-game')->where('id_users', $u->id)->where('onOff', 1)->orderBy('id', 'desc')->limit(1)->first();
								if($query != false){
									$mines = $query->mines;
									$click = $query->click;
									$click = unserialize($click);
									$winMines = $query->win;
									$countClick = count($click);
									if($click != null){
									$winMines1 = $winMines/$countClick;
									}
									
                                    for($i=1;$i<26;$i++){
										if(in_array($i,$click)){
										echo '<button class="mine win-mine" data-number="'.$i.'" disabled="disabled">+'.$winMines1.'</button>';
										}else{
										echo '<button class="mine" data-number="'.$i.'"></button>';
										}		
									}
								
								}else{								
                          echo '<button class="mine" data-number="1" disabled="">1</button>
								<button class="mine" data-number="2" disabled="">2</button>
								<button class="mine" data-number="3" disabled="">3</button>
								<button class="mine" data-number="4" disabled="">4</button>
								<button class="mine" data-number="5" disabled="">5</button>
								<button class="mine" data-number="6" disabled="">6</button>
								<button class="mine" data-number="7" disabled="">7</button>
								<button class="mine" data-number="8" disabled="">8</button>
								<button class="mine" data-number="9" disabled="">9</button>
								<button class="mine" data-number="10" disabled="">10</button>
								<button class="mine" data-number="11" disabled="">11</button>
								<button class="mine" data-number="12" disabled="">12</button>
								<button class="mine" data-number="13" disabled="">13</button>
								<button class="mine" data-number="14" disabled="">14</button>
								<button class="mine" data-number="15" disabled="">15</button>
								<button class="mine" data-number="16" disabled="">16</button>
								<button class="mine" data-number="17" disabled="">17</button>
								<button class="mine" data-number="18" disabled="">18</button>
								<button class="mine" data-number="19" disabled="">19</button>
								<button class="mine" data-number="20" disabled="">20</button>
								<button class="mine" data-number="21" disabled="">21</button>
								<button class="mine" data-number="22" disabled="">22</button>
								<button class="mine" data-number="23" disabled="">23</button>
								<button class="mine" data-number="24" disabled="">24</button>
								<button class="mine" data-number="25" disabled="">25</button>';	
								}
								?>	
								@else
								<button class="mine" data-number="1" disabled="">1</button>
								<button class="mine" data-number="2" disabled="">2</button>
								<button class="mine" data-number="3" disabled="">3</button>
								<button class="mine" data-number="4" disabled="">4</button>
								<button class="mine" data-number="5" disabled="">5</button>
								<button class="mine" data-number="6" disabled="">6</button>
								<button class="mine" data-number="7" disabled="">7</button>
								<button class="mine" data-number="8" disabled="">8</button>
								<button class="mine" data-number="9" disabled="">9</button>
								<button class="mine" data-number="10" disabled="">10</button>
								<button class="mine" data-number="11" disabled="">11</button>
								<button class="mine" data-number="12" disabled="">12</button>
								<button class="mine" data-number="13" disabled="">13</button>
								<button class="mine" data-number="14" disabled="">14</button>
								<button class="mine" data-number="15" disabled="">15</button>
								<button class="mine" data-number="16" disabled="">16</button>
								<button class="mine" data-number="17" disabled="">17</button>
								<button class="mine" data-number="18" disabled="">18</button>
								<button class="mine" data-number="19" disabled="">19</button>
								<button class="mine" data-number="20" disabled="">20</button>
								<button class="mine" data-number="21" disabled="">21</button>
								<button class="mine" data-number="22" disabled="">22</button>
								<button class="mine" data-number="23" disabled="">23</button>
								<button class="mine" data-number="24" disabled="">24</button>
								<button class="mine" data-number="25" disabled="">25</button>
								@endif
                                </div>
                                </div>			
			
						<br>
<br>
						</div>

					
						<div id="bet" class="bet-input">
	<h5>сделать ставку:</h5>
		<div class="value">
			<input type="text" id="amountBetInputBomb" onkeyup="var coef = $('#nextRewardBoxBomb').val(); var sum = $('#amountBetInputBomb').val();var otvet = sum*coef; $('#winSummaBoxBomb').text(otvet)">		</div>

	<div style="margin-top: 10px"></div>
	<div class="amout-bomb-btns">
			<button style="width: 72px;border: 1px solid #007bff;background: #007bff;border: none;border-radius: 5px;color: #fff;cursor: pointer;" type="button" class="btn btn-outline-primary circle mineSelected" data-mineamount="3">x3</button>
											<button style="width: 72px;border: 1px solid #28a745;background: #28a745;border: none;border-radius: 5px;color: #fff;cursor: pointer;" type="button" class="btn btn-outline-success circle" data-mineamount="5">x5</button>
											<button style="width: 72px;border: 1px solid #ffc107;background: #ffc107;border: none;border-radius: 5px;color: #fff;cursor: pointer;" type="button" class="btn btn-outline-warning circle" data-mineamount="10">x10</button>
											<button style="width: 72px;border: 1px solid #dc3545;background: #dc3545;border: none;border-radius: 5px;color: #fff;cursor: pointer;" type="button" class="btn btn-outline-danger circle" data-mineamount="24">x24</button>
										</div>

							<div style="margin-top: 10px"></div>
							<center>
	<button class="start-game-btn btn btn-green btn-play" @if(!Auth::guest()) onclick="startgame()" <?php if($query != null){echo "disabled='disabled'";} ?> @endif>Поставить</button>	

<style>
	.finish-game-btn {
		display: none;
	}
</style>
@if(!Auth::guest())
  <button type="button" style="cursor: pointer; margin-top: 10px;" class="finish-game-btn btn btn-green btn-play" onclick="finishgame()" <?php if($query == null){echo "disabled='disabled'";} ?>>Забрать <span class="winSummaBox" id="winSummaBoxBomb"><?if($query == null){echo "10";}else{echo $winMines;} ?></span> coin</button>

@endif
							</center>
						</div>
		</center>
</div>
@endsection