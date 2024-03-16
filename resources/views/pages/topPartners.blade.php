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
    	<div class="second-title"><span>Топ партнеров</span></div>
      	<div class="top active">
      		<table>
      			<thead>
      				<tr>
      					<th>Место</th>
      					<th>Пользователь</th>
      					<th>Заработано</th>
      				</tr>
      			</thead>
      			<tbody id="top"></tbody>
      		</table>
      	</div>
    </div>
  </div>
</div>
<script>
$(document).ready(function() {
	$.ajax({
		url : '/topPartnersAjax',
		type : 'get',
		success : function(data) {
			var html = '';
			var i = 1;
			data.forEach(function (top) {
				html += '<tr>';
				html += '<td>' + i++ + '</td>';
				html += '<td>' + top.username + '</td>';
				html += '<td>' + Math.floor(top.ref_money) + ' <i class="myicon-coins"></i></td>';
				html += '</tr>';
			});
			$('#top').html(html);
		},
		error : function(data) {
			console.log(data.responseText);
		}
	});
});
</script>
@endsection