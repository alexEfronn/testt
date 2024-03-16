@extends('layout')

@section('content')
	<div class="section">
		  <ul class="game_bar">
                               <li class="">
                                  <a class="" href="/jackpot">
                                      <svg class="icon">
                                          <use xlink:href="/img/symbols.svg#icon-jackpot"></use>
                                      </svg>
                                      <div class="side-nav-tooltip">Джекпот</div>
                                  </a>
                              </li>
                    
                             <li class="">
                                  <a class="" href="/crash">
                                      <svg class="icon">
                                          <use xlink:href="/img/symbols.svg#icon-crash"></use>
                                      </svg>
                                      <div class="side-nav-tooltip">Краш</div>
                                  </a>
                              </li>
                                
								<li>
							<a href="/cases">
								<svg class="icon">
									<use xlink:href="/img/symbols.svg#icon-hilo"></use>
								</svg>Кейсы
							</a>
						</li>
								
								<li>
							<a href="/mines">
						 <svg class="icon">
              <use xlink:href="/img/symbols.svg#icon-tower"></use>
                                 </svg>Мины
							</a>
						</li>
						
						<li class="">
                                  <a class="" href="/coinflip">
                                      <svg class="icon">
                                          <use xlink:href="/img/symbols.svg#icon-flip"></use>
                                      </svg>
                                      <div class="side-nav-tooltip">Coinflip</div>
                                  </a>
                              </li>
								
                              <!--<li class="">
                                  <a class="" href="/wheel">
                                      <svg class="icon">
                                          <use xlink:href="/img/symbols.svg#icon-roulette"></use>
                                      </svg>
                                      <div class="side-nav-tooltip">Х50</div>
                                  </a>
                              </li> 

                              <li class="">
                                  <a class="" href="/battle">
                                      <svg class="icon">
                                          <use xlink:href="/img/symbols.svg#icon-battle"></use>
                                      </svg>
                                      <div class="side-nav-tooltip">Батл</div>
                                  </a>
                              </li>
                              
							 <li class="">
                                  <a class="" href="/tower">
                                      <svg class="icon">
                                          <use xlink:href="/img/symbols.svg#icon-tower"></use>
                                      </svg>
                                      <div class="side-nav-tooltip">Башня</div>
                                  </a>
                              </li> 
							  
							<li class="">
                                  <a class="" href="/coinflip">
                                      <svg class="icon">
                                          <use xlink:href="/img/symbols.svg#icon-flip"></use>
                                      </svg>
                                      <div class="side-nav-tooltip">Coinflip</div>
                                  </a>
                              </li>
							  
							  <li class="">
                                  <a class="" href="/hilo">
                                      <svg class="icon">
                                          <use xlink:href="/img/symbols.svg#icon-hilo"></use>
                                      </svg>
                                      <div class="side-nav-tooltip">hilo</div>
                                  </a>
                              </li>
							  
							  <li>
							<a href="/cases">
								<svg class="icon">
									<use xlink:href="/img/symbols.svg#icon-hilo"></use>
								</svg>Кейсы
							</a>
						</li>
					    
						<li>
							<a href="/mines">
						 <svg class="icon">
              <use xlink:href="/img/symbols.svg#icon-tower"></use>
                                 </svg>Мины
							</a>
						</li>-->
						
                          </ul>
		<div class="top-content">
			<div class="cont-b">
			   <div class="table-new"><span>Jackpot призы</span></div>
			   <div class="table-new"<span>1.Место: 75₽
			                                  2.Место: 50₽
											  3.Место: 25₽</span></div>
				<div class="second-title"><span>Топ 20</span></div>
				<div class="rooms">
					<ul class="room-selector">
						<li class="room">
							<a><div class="room-name">Jackpot</div></a>
						</li>
						<li class="room">
							<a><div class="room-name">Battle</div></a>
						</li>
					</ul>
				</div>
				<div class="top">
					<table>
						<thead>
							<tr>
								<th>Место</th>
								<th>Пользователь</th>
								<th>Профит</th>
							</tr>
						</thead>
						<tbody id="top_jackpot"></tbody>
					</table>
				</div>
				<div class="top">
					<table>
						<thead>
							<tr>
								<th>Место</th>
								<th>Пользователь</th>
								<th>Профит</th>
							</tr>
						</thead>
						<tbody id="top_battle"></tbody>
					</table>
				</div>
				<div class="top">
					<table>
						<thead>
							<tr>
								<th>Место</th>
								<th>Пользователь</th>
								<th>Профит</th>
							</tr>
						</thead>
					</table>
				</div>
				<center>обновляется каждые 24 часа*</center>
			</div>
		</div>
	</div>
<script>
$(document).ready(function() {
	
	 $(document).on('click', '.room', function() {
		  if(!$(this).is('.active')) {
		$('.room').removeClass('active');
		$('.top').removeClass('active');
      $(this).addClass('active');
	  $('.top:eq('+$(this).index()+')').addClass('active');
		  }
    });
	
	
	$.ajax({
		url : '/topAjax',
		type : 'get',
		success : function(data) {
			var jackpot = '';
			var double = '';
			var pvp = '';
			var battle = '';
			var dice = '';
			var j = 1, s = 1, d = 1, b = 1, c = 1;
			data.jackpot.forEach(function (top) {
				jackpot += '<tr>';
				jackpot += '<td>' + j++ + '</td>';
				jackpot += '<td>' + top.username + '</td>';
				jackpot += '<td>' + top.total + ' <i class="fas fa-coins"></i></td>';
				jackpot += '</tr>';
			});
			data.double.forEach(function (top) {
				double += '<tr>';
				double += '<td>' + s++ + '</td>';
				double += '<td>' + top.username + '</td>';
				double += '<td>' + top.total + ' <i class="fas fa-coins"></i></td>';
				double += '</tr>';
			});
			data.flip.forEach(function (top) {
				pvp += '<tr>';
				pvp += '<td>' + d++ + '</td>';
				pvp += '<td>' + top.username + '</td>';
				pvp += '<td>' + top.total + ' <i class="fas fa-coins"></i></td>';
				pvp += '</tr>';
			});
			data.battle.forEach(function (top) {
				battle += '<tr>';
				battle += '<td>' + b++ + '</td>';
				battle += '<td>' + top.username + '</td>';
				battle += '<td>' + top.total + ' <i class="fas fa-coins"></i></td>';
				battle += '</tr>';
			});
			data.dice.forEach(function (top) {
				dice += '<tr>';
				dice += '<td>' + c++ + '</td>';
				dice += '<td>' + top.username + '</td>';
				dice += '<td>' + top.total + ' <i class="fas fa-coins"></i></td>';
				dice += '</tr>';
			});
			$('#top_jackpot').html(jackpot);
			$('#top_double').html(double);
			$('#top_pvp').html(pvp);
			$('#top_battle').html(battle);
			$('#top_dice').html(dice);
		},
		error : function(data) {
			console.log(data.responseText);
		}
	});
});
</script>
@endsection