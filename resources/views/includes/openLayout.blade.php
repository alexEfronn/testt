<link href="/css/opencase/layout.css" rel="stylesheet" type="text/css">
<link href="/css/nouislider.css" rel="stylesheet" type="text/css">
<div id="livedrop">
    <div class="container">
        <span class="live-span" style="">LIVE</span>
        <div class="row js-livedrop">
            @foreach($drops as $d)
                <a class="livedrop-item {{ $d->color }}-spinner col-lg-1 js-livedrop-item" href="#">
                    <div class="livedrop-item-box">
                        <img class="livedrop-img" src="/images/spinners/livedrop/{{$d->color}}-spinner.png" alt="{{$d->color}} Spinner">
                        <img class="user-livedrop-avatar" src="{{$d->avatar}}" width="43">
                        <div class="livedrop-win">
                            <span class="livedrop-win-value">{{$d->win}}<span class="rouble">⃏</span></span>
                        </div>
                    </div>
                </a>
            @endforeach
            </div>
    </div>
</div>

<div id="totalopens" class="text-center">
			<div class="container">
				<div class="pageblocktitle">
					<span>Всего открыто: <span class="font-bold color-primary js-total-opens">
					{{ \DB::table('drops')->count() }}
					</span></span>
				</div>
			</div>
		</div>
<div id="winnerstop2">
<div class="container text-center">
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
    
</div>
</div>