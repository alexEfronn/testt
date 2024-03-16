@extends('layout')

@section('content')
 <script src="assets/js/profile.js?v=4"></script>
    <div class="user-profile">
        <div class="user-profile-overview-loop gray-color">
            <div class="user-profile-overview-loop__left">
                <div class="flex-row">
                    <div class="user-profile-overview-loop__left-avatar">
                        <div class="user-profile-overview-loop__left-avatar-wrapper relative-wrapper">
                            <img src="{{$u->avatar}}" alt="">
                            <a href="/logout"  class="user-profile-overview-loop__left-vk">Выйти</a>
                        </div>
                        <p class="user-profile-overview-loop__left-since">На сайте с {{($u->created_at)->format('d.m.Y') }}</p>
                    </div>
                    <div class="user-profile-overview-loop__left-resources">
                    <div class="user-profile-overview-loop__left-resources__name">{{$u->username}}</span></div>
                        <div class="user-profile-overview-loop__left-resources__balance">
						<svg class="icon">
											<use xlink:href="/img/symbols.svg#icon-coin"></use>
										</svg>
						<span class="user-profile-overview-loop__left-resources__money beatify-numbers">{{ $u->balance }}</span></div>
                        <div class="user-profile-overview-loop__left-resources__tickets"> 
                            Управление <br> балансом в <br>поле "Кошелёк"
                        </div>

                    </div>
                </div>
                <div class="code">
                    <div class="value">
                           <input class="input-field input-with-icon" name="promo" placeholder="Введите промокод" id="promoInput">
          <button type="button" class="btn btn-green activatePromo"><span>Активировать</span></button>
                    </div>
                </div>
            </div>
            <div class="user-profile-overview-horizontal-line"></div>
            <div class="user-profile-overview-loop__right">
                <div class="user-profile-overview-loop__right-stats">
                    <div class="stat-block">
                        <div class="stat-block__title">Сумма ставок</div>
                        <div class="stat-block__value stat-block__value_coins-with-icon">
						<svg class="icon">
											<use xlink:href="/img/symbols.svg#icon-coin"></use>
										</svg>
                             <span class="beatify-numbers">{{ $sumBets->sum }}</span>
                        </div>
                    </div>
                     <div class="stat-block">
                        <div class="stat-block__title">Сумма пополнений</div>
                        <div class="stat-block__value stat-block__value_coins-with-icon">
                        <svg class="icon">
											<use xlink:href="/img/symbols.svg#icon-coin"></use>
										</svg>
						<span class="beatify-numbers">{{ $paysAmount }}</span>
                        </div>
                    </div>
                    <div class="stat-block">
                        <div class="stat-block__title">Сумма выводов</div>
                        <div class="stat-block__value stat-block__value_coins-with-icon">
                        <svg class="icon">
											<use xlink:href="/img/symbols.svg#icon-coin"></use>
										</svg>
						<span class="beatify-numbers">{{ $withdrawAmount }}</span>
                        </div>
                    </div>
                </div>
			<div class="user-profile-overview-stats-divisor"></div>
             <div class="next-rank user-profile-overview-ranks">
                    <img class="rank-icon tooltip" title="Новичок" src="img/rank/0.svg" alt=""> 
                    <div class="progress-next-rank">  
                               
                            <div class="bets-progress">Ставок: <span class="progress-sum"><span class="beatify-numbers">{{ $sumBets->sum }}</span> / <span class="beatify-numbers">2000 </span> </span> <span class="myicon-coins"></span> <div class="fill" style="width:15%"></div></div>
                            <div class="deposit-progress">Депозитов: <span class="progress-sum"><span class="beatify-numbers">{{ $paysAmount }}</span> / <span class="beatify-numbers">50 </span> </span> <span class="myicon-coins"></span> <div class="fill" style="width:0%"></div></div>
                                            </div>
                                            <img class="rank-icon tooltip" title="Начинающий" src="img/rank/1.svg" alt=""> 
                                    </div>
                <div class="user-profile-overview-rank-table">
                    <a href="/rank"  class="def_link user-profile-overview-rank-table__link">Таблица рангов</a>
                </div>
  <div>
	  
       <div class="switch-btn"></div>
      </div>

<style type="text/css">
        .switch-btn {
            display: inline-block;
            width: 38px; /* ширина переключателя */
            height: 15px; /* высота переключателя */
            border-radius: 12px; /* радиус скругления */
            background: #FFFF; /* цвет фона */
            z-index: 0;
            margin: 0;
            padding: 0;
            border: none;
            cursor: pointer;
            position: relative;
            transition-duration: 300ms; /* анимация */
        }
        .switch-btn::after {
            content: "";
            height: 24px; /* высота кнопки */
            width: 24px; /* ширина кнопки */
            border-radius: 12px; /* радиус кнопки */
            background: #fff; /* цвет кнопки */
            top: -6px; /* положение кнопки по вертикали относительно основы */
            left: -6px; /* положение кнопки по горизонтали относительно основы */
            transition-duration: 300ms; /* анимация */
            box-shadow: 0 0 10px 0 #999999; /* тень */
            position: absolute;
            z-index: 1;
        }
        .switch-on {
            background: #fff;
            box-shadow: inset 0 0 10px 0 #999999; /* тень */
        }
        .switch-on::after {
            left: 20px;
            background: #2e2e2e;
        }
</style>
<script src="/examples/vendors/jquery/jquery-3.3.1.min.js"></script>

         <script>
                $('.switch-btn').click(function(){
                    $(this).toggleClass('switch-on');
                    x.style.color = "dark"; 
                });
            </script>
			
            </div>
        </div>
        <div class="user-profile-full-stats gray-color">
            <div class="user-profile-caregories">  
                </div>
				 <span class="user-profile-caregories__category user-profile-caregories__category_pays table-picker btn btn-green" data-toggle="modal" data-target="#profileModal">Изменить имя</span>
                <span class="user-profile-caregories__category user-profile-caregories__category_withdraws table-picker btn btn-green" data-toggle="modal" data-target="#profileModalImg">Изменить аватар</span>
                <a class="user-profile-caregories__category user-profile-caregories__category_send table-picker btn btn-green" href="/pay/send">Переводы</a>
                <a class="user-profile-caregories__category user-profile-caregories__category_partnership btn btn-green" href="/affiliate">Партнерка</a>
				<span class="user-profile-caregories__category user-profile-caregories__category_settings table-picker btn btn-green" data-load="settings">Настройка</span>

            </div>
   <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModal" aria-hidden="true">
		<div class="modal-dialog faucet-demo-modal modal-dialog-centered" role="document">
			<div class="modal-content">
				<button class="modal-close" data-dismiss="modal" aria-label="Close">
					<svg class="icon icon-close">
						<use xlink:href="/img/symbols.svg#icon-close"></use>
					</svg>
				</button>
				<div class="faucet-container">
					<h3 class="faucet-caption"><span>Изменить имя</span></h3>
					<h3 class="faucet-caption"><div id="banName"></div></h3>
					<div class="caption-line"><span class="span"><svg class="icon"><use xlink:href="/img/symbols.svg#icon-ban"></use></svg></span></div>
					<div class="form-row">
						<label>
							<div class="form-label">Имя (от 3-х до 15 символов)</div>
							<div class="form-field">
								<div class="input-valid">
									<input class="input-field input-with-icon" id="profileName" value="{{ $u->username }}" placeholder="Имя" >
									<div class="input-icon">
										<svg class="icon">
										<use xlink:href="/img/symbols.svg#icon-edit"></use>
										</svg>
									</div>
								</div>
							</div>
						</label>
					</div>
					<div class="form-row">
						<button type="button" class="btn btn-green profileChangeName"><span>Изменить</span></button>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="modal fade" id="profileModalImg" tabindex="-1" role="dialog" aria-labelledby="profileModalImg" aria-hidden="true">
		<div class="modal-dialog faucet-demo-modal modal-dialog-centered" role="document">
			<div class="modal-content">
				<button class="modal-close" data-dismiss="modal" aria-label="Close">
					<svg class="icon icon-close">
						<use xlink:href="/img/symbols.svg#icon-close"></use>
					</svg>
				</button>
				<div class="faucet-container">
					<h3 class="faucet-caption"><span>Изменить аватар</span></h3>
					<h3 class="faucet-caption"><div id="banName"></div></h3>
					<div class="caption-line"><span class="span"><svg class="icon"><use xlink:href="/img/symbols.svg#icon-ban"></use></svg></span></div>
					<div class="form-row">
						<label>
							<div class="form-label">Ссылка на картинку</div>
							<div class="form-field">
								<div class="input-valid">
									<input class="input-field input-with-icon" id="profileImg" placeholder="Ссылка" >
									<div class="input-icon">
										<svg class="icon">
										<use xlink:href="/img/symbols.svg#icon-edit"></use>
										</svg>
									</div>
								</div>
							</div>
						</label>
					</div>
					<div class="form-row">
						<button type="button" class="btn btn-green profileChangeAvatar"><span>Изменить</span></button>
					</div>
				</div>
			</div>
		</div>
	</div>
    <script>
        $('.profileChangeName').click(() => {
            $.post('/profile/changeName', {name: $('#profileName').val().trim()}, data => {
                $('#profileModal').modal('hide');
                if(data.error) return $.notify({type: "error", message: data.error});
                $.notify({type: "success", message: "Вы успешно изменили имя"});
                setTimeout(() => window.location.reload(), 1500);
            });
        });
        $('.profileChangeAvatar').click(() => {
            $.post('/profile/changeAvatar', {img: $('#profileImg').val().trim()}, data => {
                $('#profileModalImg').modal('hide');
                if(data.error) return $.notify({type: "error", message: data.error});
                $.notify({type: "success", message: "Вы успешно изменили аватарку"});
                setTimeout(() => window.location.reload(), 1500);
            });
        });
    </script>
@endsection