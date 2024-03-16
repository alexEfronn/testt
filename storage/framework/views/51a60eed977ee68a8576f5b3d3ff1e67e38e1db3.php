<?php if(!Auth::check() && $settings->site_disable || $settings->site_disable && Auth::check() && !$u->is_admin): ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo e($settings->title); ?></title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link href="css/pre.css" rel="stylesheet">
</head>
<body>
	<div class="logo">
		<img src="/img/logo.png" alt="">
		<span class="title">Тех. работы!</span>
		<a href="<?php echo e($settings->vk_url); ?>" class="vk" target="_blank"><span>Перейти в группу </span><i class="fab fa-vk"></i></a>
	</div>
</body>
<?php else: ?>
<?php if(Auth::user() && $u->ban): ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo e($settings->title); ?></title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="css/pre.css" rel="stylesheet">
</head>
<body>
	<div class="logo">
		<img src="/img/logo.png" alt="">
		<span class="title">Ваш аккаунт заблокирован!</span>
		<?php if($u->ban_reason): ?><span class="text"><?php echo e($u->ban_reason); ?></span><?php endif; ?>
		<a href="<?php echo e($settings->vk_url); ?>" class="vk" target="_blank"><span>Перейти в группу </span><i class="fab fa-vk"></i></a>
		<a href="/logout" class="vk" target="_blank"><span>Выйти</span></a>
	</div>
</body>
<?php else: ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="description" content="">
   <title><?php echo e($settings->title); ?></title>
    <link rel="stylesheet" href="/css/drop-style.css">
    <link rel="stylesheet" href="/css/main_dark.css?v=7">
	<?php if(session('theme') == 'light'): ?>
    <link id="css_theme" rel="stylesheet" href="/css/main.css?v=7">
    <?php else: ?>
    <link id="css_theme" rel="stylesheet" href="/css/main_dark.css?v=7">
    <?php endif; ?>
	<link rel="stylesheet" href="/css/awesome/css/all.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="/css/icon.css">
    <link rel="stylesheet" href="/css/notify.css">
    <link rel="stylesheet" href="/css/animation.css">
    <link rel="stylesheet" href="/css/media.css">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/profile.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <?php echo NoCaptcha::renderJs(); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
    <script type="text/javascript" src="/js/perfect-scrollbar.min.js"></script>
	<script type="text/javascript" src="/js/wnoty.js"></script>
	<audio id="startthisgame" src=/sounds/startthisgame.mp3 preload=auto></audio>
    <audio id="common-bet" src=/sounds/common-bet.mp3 preload=auto></audio>
    <?php if(Auth::user() and $u->is_admin == 1 || $u->is_moder == 1 ): ?>
    <script type="text/javascript" src="/js/moderatorOptions.js"></script>
    <?php endif; ?>
	<script>
		<?php if(auth()->guard()->check()): ?>
		const USER_ID = '<?php echo e($u->unique_id); ?>';
		const youtuber = '<?php echo e($u->is_youtuber); ?>';
		const vip = '<?php echo e($u->is_vip); ?>';
		const admin = '<?php echo e($u->is_admin); ?>';
		const moder = '<?php echo e($u->is_moder); ?>';
		<?php else: ?>
		const USER_ID = null;
		const youtuber = null;
		const vip = null;
		const admin = null;
		const moder = null;
		<?php endif; ?>
		const settings = <?php echo json_encode($gws); ?>;
	</script>
</head>

<body> 
<input type="hidden" value="<?php echo e(session('sound')); ?>" id="soundController">
<input type="hidden" value="<?php echo e(session('theme')); ?>" id="themeController">
<audio id="startthisgame" src=/sounds/startthisgame.mp3 preload=auto></audio>
	<audio id="common-bet" src=/sounds/common-bet.mp3 preload=auto></audio>
    <div class="wrapper">
        <div class="page">
            <div class="header">
                <?php if(auth()->guard()->check()): ?>
                <div class="header-inner">
                    <nav class="top-nav">
                      <ul class="menu-main">
                        <li class="left-item ">
                            <a class="" href="/">
                                <svg class="icon icon-gamepad">
                                    <use xlink:href="/img/symbols.svg#icon-gamepad"></use>
                                </svg>
                                <span>Главная</span>
                            </a>
                        </li>

                        <li class="left-item ">
                            <a class="<?php echo e(Request::is('free') ? 'isActive' : ''); ?>" href="/free">
                                <svg class="icon icon-faucet">
                                    <use xlink:href="/img/symbols.svg#icon-faucet"></use>
                                </svg>
                                <span>Бонусы</span>
                            </a>
                        </li>

                        <li class="left-item ">
                            <div class="toggle">
                                <button class="btn">
                                    <svg class="icon icon-faq">
                                        <use xlink:href="/img/symbols.svg#icon-faq"></use>
                                    </svg>
                                    <span>Помощь</span>
                                    <svg class="icon icon-down">
                                        <use xlink:href="/img/symbols.svg#icon-down"></use>
                                    </svg>
                                </button>
                                <ul class="">
                                    <li>
                                        <a class="" href="/faq">
                                            <svg class="icon icon-faq">
                                                <use xlink:href="/img/symbols.svg#icon-faq"></use>
                                            </svg>
                                            <span>Ответы на вопросы</span>
                                        </a>
                                    </li>
                                    <?php if($settings->vk_support_link): ?>
                                    <li>
                                        <a href="<?php echo e($settings->vk_support_link); ?>" target="_blank">
                                            <svg class="icon icon-support">
                                                <use xlink:href="/img/symbols.svg#icon-support"></use>
                                                </svg>
                                            Написать в поддержку
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </li>

                        <?php if(Auth::check() && $u->is_admin): ?>
                        <li class="left-item ">
                            <div class="toggle">
                                <button class="btn">
                                    <svg class="icon icon-fairness">
                                        <use xlink:href="/img/symbols.svg#icon-admin"></use>
                                    </svg>
                                    <span>Админ</span>
                                    <svg class="icon icon-down">
                                        <use xlink:href=""></use>
                                    </svg>
                                </button>
                                <ul class="">
                                    <li>
                                        <a class="" href="/admin">
                                            <span>Панель управления</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="modal" data-target="#promoChat">
                                            <span>Промо в чат</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <?php endif; ?>

                        <li class="right-item"><a href="/profile">Профиль</a></li>

                        <li class="right-item__money">
                            <div class="deposit-wrap">
                                <div class="bottom-start rounded dropdown">
                                    <button type="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle btn btn-secondary">
                                        <div class="selected balance">
                                            <svg class="icon icon-coin">
                                                <use xlink:href="/img/symbols.svg#icon-coin"></use>
                                            </svg>
                                        </div>
                                    </button>
                                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu" x-placement="bottom-start">
                                        <button type="button" data-id="balance" tabindex="0" role="menuitem" class="dropdown-item">
                                            <div class="balance-item balance">
                                                <svg class="icon icon-coin">
                                                    <use xlink:href="/img/symbols.svg#icon-coin"></use>
                                                </svg><span>Реальный счет</span>
                                            <div class="value" id="balance_bal"><?php echo e($u->balance); ?></div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                                <div class="deposit-block">
                                    <div class="select-field"><span id="balance">0</span></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                      <a class="navbar-logo locked" href="/"><img src="/img/logo.png" style="width: 153px;height: 48px;"></a>
                    </nav>
                </div>
            </div>

            <div class="left-sidebar">
                <ul class="left-sidebar__games">
                   <li class="<?php echo e(Request::is('/jackpot') ? 'current' : '' || Request::is('jackpot/history') ? 'current' : ''  || Request::is('jackpot/history/*') ? 'current' : ''); ?>">
                        <a class="" href="/jackpot">
                           <img class="icon" src="/img/games/jackpot.png" alt="">
                        </a>
                    </li>
                  
                    <li class="<?php echo e(Request::is('crash') ? 'current' : ''); ?>">
                        <a class="" href="/crash">
                            <img class="icon" src="/img/games/crash.png" alt="">
                        </a>
                    </li>
					
					 <li class="<?php echo e(Request::is('cases') ? 'current' : ''); ?>">
                        <a class="" href="/wheel">
                           <img class="icon" src="/img/games/wheel.png" alt="">
                        </a>
                    </li>
					
                    <li class="<?php echo e(Request::is('coinflip') ? 'current' : ''); ?>">
                        <a class="" href="/coinflip">
                            <img class="icon" src="/img/games/war.png" alt="">
                        </a>
                    </li>
					
					<li class="<?php echo e(Request::is('dice') ? 'current' : ''); ?>">
                        <a class="" href="/dice">
                            <img class="icon" src="/img/games/dice.png" alt="">
                        </a>
                    </li>
					
					<li class="<?php echo e(Request::is('battle') ? 'current' : ''); ?>">
                        <a class="" href="/battle">
                            <img class="icon" src="/img/games/battle.png" alt="">
                        </a>
                    </li>
										<li class="<?php echo e(Request::is('hilo') ? 'current' : ''); ?>">
                        <a class="" href="/hilo">
                            <img class="icon" src="/img/games/hilo.png" alt="">
                        </a>
                    </li>
					<li class="<?php echo e(Request::is('mines') ? 'current' : ''); ?>">
												<a href="/mines">
						 <svg class="icon">
              <use xlink:href="/img/symbols.svg#icon-mines"></use>
                                 </svg>
							</a>
						</li>

                </ul>
                <ul class="left-sidebar__bottom">
                    <li>
                        <a href="https://vk.com/milkivay_ru">
                                <svg class="icon icon-vk">
                                    <use xlink:href="/img/symbols.svg#icon-vk"></use>
                                </svg>
                            </a>
                    </li>
                </ul>
                <?php endif; ?>
            </div>
            <div class="main-content">
                <div class="main-content-top">                                   
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>

                <div class="main-content-footer">
                    <div class="footer-counters">
                    <div class="footer">
                        <div class="container">
                            <div class="row">
                                <div class="col col-7">
                                    <ul class="footer-nav">
                                        <li><a class="" data-toggle="modal" data-target="#tosModal">Пользовательское соглашение</a></li>
                                        <?php if($settings->vk_url): ?>
                                        <li>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="col col-5">
                                    <div class="copyright">
                                        <div class="text">© 2021 <?php echo e($settings->sitename); ?>

                                            <br> All rights reserved</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-sidebar">
                <div class="sidebar-container">
                	<?php if(auth()->guard()->check()): ?>
                   	<?php endif; ?>
                    <div class="chat tab current">
                      	<?php if(auth()->guard()->check()): ?>
						
                        <?php endif; ?>
                        <div class="chat-params">
                            <div class="item">
                                <div class="chat-online">В сети: <span>0</span></div>
                            </div>
                            <div class="item">
                                <?php if(Auth::user() and $u->is_admin): ?>
                                <div class="toggle">
                                	<a class="toggle-btn" data-toggle="tooltip" data-placement="top" title="Режим администратора">
										<svg class="icon">
											<use xlink:href="/img/symbols.svg#icon-sheriff"></use>
										</svg>
									</a>
                                </div>
                                <?php endif; ?>
                                <?php if(Auth::user() and $u->is_admin || $u->is_moder): ?>
                                <div class="list">
                                	<button class="banned-btn" data-toggle="tooltip" data-placement="top" title="Забаненные пользователи">
										<svg class="icon">
											<use xlink:href="/img/symbols.svg#icon-ban"></use>
										</svg>
									</button>
                                </div>
                                <div class="clear">
                                	<button class="clear-btn clearChat" data-toggle="tooltip" data-placement="top" title="Очистить чат">
										<svg class="icon">
											<use xlink:href="/img/symbols.svg#icon-clear"></use>
										</svg>
									</button>
                                </div>
                                <?php endif; ?>
                                <?php if(auth()->guard()->check()): ?>
                                <div class="share" data-toggle="modal" data-target="#rulesChat">
                                  <button class="" data-toggle="tooltip" data-placement="top" title="Правила чата">
                    <a class="icon" style="color: #fff">
                      ?
                    </a>
                  </button>
                                </div>                                
                                <div class="share">
                                	<button class="share-btn shareToChat" data-toggle="tooltip" data-placement="top" title="Поделиться балансом">
										<svg class="icon">
											<use xlink:href="/img/symbols.svg#icon-coin"></use>
										</svg>
									</button>
                                </div>                    
                                <?php endif; ?>
                                <button class="close-btn">
                                    <svg class="icon icon-close">
                                        <use xlink:href="/img/symbols.svg#icon-close"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="chat-conversation">
                            <div class="scrollbar-container chat-conversation-inner ps">
                                <?php if($messages != 0): ?> <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sms): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="message-block user_<?php echo e($sms['unique_id']); ?>" id="chatm_<?php echo e($sms['time2']); ?>">
                                    <div class="message-avatar <?php echo e($sms['admin'] ? 'isAdmin' : ''); ?><?php echo e($sms['moder'] ? 'isModerator' : ''); ?>"><img src="<?php echo e($sms['avatar']); ?>" alt=""></div>
                                    <div class="message-content">
                                        <div>
                                            <button class="user-link" type="button" data-id="<?php echo e($sms['unique_id']); ?>">
                                                <span class="sanitize-name">
                                                	<span class="sanitize-text"><?php if($sms['admin']): ?><span class="admin-badge isAdmin" data-toggle="tooltip" data-placement="top" title="Администратор"><span class=""><svg class="icon iconon-a"><use xlink:href="/img/symbols.svg#icon-a"></use></svg></span></span> Администратор <?php elseif($sms['moder']): ?><span class="admin-badge isModerator" data-toggle="tooltip" data-placement="top" title="Модератор"><span class=""><svg class="icon icon-m"><use xlink:href="/img/symbols.svg#icon-m"></use></svg> 
                                                    <?php echo e($sms['username']); ?> <?php elseif($sms['youtuber']): ?><span class="admin-badge isYouTuber" data-toggle="tooltip" data-placement="top" title="YouTuber"><span class=""><svg class="icon icon-y"><use xlink:href="/img/symbols.svg#icon-y"></use></svg></span></span> 
                                                    <?php echo e($sms['username']); ?> <?php else: ?> <?php echo e($sms['username']); ?>

                                                    <?php endif; ?> <span>&nbsp; </span></span>
                                                </span>
                                            </button>
                                            <div class="message-text"><?php echo $sms['messages']; ?></div>
                                        </div>
                                    </div>
                                    <?php if(Auth::user() and $u->is_admin || $u->is_moder): ?>
									<div class="delete">
										<button type="button" class="btn btn-light" onclick="chatdelet(<?php echo e($sms['time2']); ?>)">
											<svg class="icon">
												<use xlink:href="/img/symbols.svg#icon-close"></use>
											</svg><span>Удалить</span>
										</button>
										<?php if(!$sms['admin']): ?>
										<?php if(!$sms['ban']): ?>
										<button type="button" class="btn btn-light btnBan" data-name="<?php echo e($sms['username']); ?>" data-id="<?php echo e($sms['unique_id']); ?>">
											<svg class="icon">
												<use xlink:href="/img/symbols.svg#icon-ban"></use>
											</svg><span>Забанить</span>
										</button>
										<?php else: ?>
										<button type="button" class="btn btn-light btnUnBan" data-name="<?php echo e($sms['username']); ?>" data-id="<?php echo e($sms['unique_id']); ?>">
											<svg class="icon">
												<use xlink:href="/img/symbols.svg#icon-ban"></use>
											</svg><span>Разбанить</span>
										</button>
										<?php endif; ?>
										<?php endif; ?>
									</div>
                               		<?php endif; ?>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
								
								
	                                <div class="message-block quiz" id="chatm_">
                                    <div class="message-content">
                                        <div>
                                            <div class="message-text">
												<span class="quizLabel">
													<svg class="icon icon-success"><use xlink:href="/img/symbols.svg#icon-success"></use></svg>СИСТЕМА:
												</span>
												<div class="quizMessage">
													 Все игры рандомные и честные, предсказать результат невозможно.Наш сайт использует random.org.Подписывайтесь на нашу группу
												</div>
											</div>
                                        </div>
                                    </div>
                                </div>
								
								
								
                            </div>
                        </div>
                        <?php if(auth()->guard()->guest()): ?>
                        <div class="chat-empty-block">Чтобы писать в чат, необходимо авторизоваться</div>
                        <?php else: ?>
                        	<input type="hidden" id="optional" value="0">
							<?php if($u->banchat): ?>
							<div class="chat-ban-block">
								<div class="title">Чат заблокирован!</div>
								<button type="button" class="btn btn-light unbanMe">
									<span>Разблокировать ( -50 <svg class="icon icon-coin balance"><use xlink:href="/img/symbols.svg#icon-coin"></use></svg> )</span>
								</button>
							</div>
							<?php else: ?>
							<div class="chat-message-input">
								<div class="chat-textarea">
									<div class="chat-editable" contenteditable="true"></div>
								</div>
								<div class="chat-controls">
									<button type="submit" class="item sendMessage">
										<i class="fab fa-telegram-plane"></i>
									</button>
								</div>
							</div>
							<?php endif; ?>
                        <?php endif; ?>
                    </div>
					<div class="user-profile tab">
						<?php if(auth()->guard()->check()): ?>
						<div class="user-block">
						<div data-v-3a0c2e60="" class="profile-sidebar__user-avatar-winter-cap"><!-- <img data-v-3a0c2e60="" src="/img/winter/cap.png" alt="Winter Cap">--></div>
							<div class="user-avatar">
								<button class="close-btn">
									<svg class="icon icon-close">
										<use xlink:href="/img/symbols.svg#icon-close"></use>
									</svg>
								</button>
                                <div class="give-block">
                                    <a href="/profile" class="btn-profile" style="align: center;">
                                        <span>
                                            <img src="<?php echo e($u->avatar); ?>" style="width: 75px;height: 75px;float: left;border-radius: 50%;    border: 1px solid #2cb6cd;">
                                            <p style="margin-left: 13px;float: left;line-height: 75px;font-size: 16 px;"><?php echo e($u->username); ?></p>
                                        </span>
                                    </a>
                                </div>
							</div>
						</div>
						<ul class="profile-nav">
						<div class="give-block">
                            <a data-toggle="modal" data-target="#giveawayModal" class="btn-give"><span>&nbsp; Раздачи</span></a>
                        </div>
                        <br>
                        <li>					
                            <li>
                                <a class="" href="/free">
									<div class="item-icon">
                                    <svg class="icon icon-faucet">
                                        <use xlink:href="/img/symbols.svg#icon-faucet"></use>
                                    </svg>
                                    </div><span>Бонусы</span>
                                </a>
                            </li>                              
                            <li>
								<a class="" href="/profile/history">
									<div class="item-icon">
										<svg class="icon icon-history">
											<use xlink:href="/img/symbols.svg#icon-history"></use>
										</svg>
									</div><span>История</span>
								</a>
							</li>
                            <li>
                                <a class="<?php echo e(Request::is('affiliate') ? 'isActive' : ''); ?>" href="/affiliate">
                                    <div class="item-icon">
                                        <svg class="icon icon-affiliate">
                                            <use xlink:href="/img/symbols.svg#icon-affiliate"></use>
                                        </svg>
                                    </div><span>Рефералы</span>
                                </a>
                            </li> 
                            <li class="">
                                <a href="/pay/send">
									<div class="item-icon">
                                    <svg class="icon icon-send">
                                        <use xlink:href="/img/symbols.svg#icon-send"></use>
                                    </svg>
                                   </div> <span>Перевод</span>
                                </a>
                            </li>  
						</ul> 
						<a href="/logout" class="btn btn-logout">
							<div class="item-icon">
								<svg class="icon icon-logout">
									<use xlink:href="/img/symbols.svg#icon-logout"></use>
								</svg>
							</div><span>Выход</span>
						</a>
						<?php endif; ?>
					</div>
                </div>
            </div>
			<div class="mobile-nav-component">
				<?php if(auth()->guard()->check()): ?>
				<div class="pull-out other">
					<button class="close-btn">
						<svg class="icon icon-close">
							<use xlink:href="/img/symbols.svg#icon-close"></use>
						</svg>
					</button>
					<ul class="pull-out-nav">
						<li>
							<a href="/faq">
								<svg class="icon icon-faq">
									<use xlink:href="/img/symbols.svg#icon-faq"></use>
								</svg>FAQ
							</a>
						</li>
						<?php if($settings->vk_support_url): ?>
						
						<?php endif; ?>
						<li>
							<a href="/free">
								<svg class="icon icon-faucet">
									<use xlink:href="/img/symbols.svg#icon-faucet"></use>
								</svg>Бонусы
							</a>
						</li>
                        <li>
                            <a href="https://vk.com/malexenka">
                                <svg class="icon icon-vk">
                                    <use xlink:href="/img/symbols.svg#icon-vk"></use>
                                </svg>VK
                            </a>
                        </li>                        
						<li>
							<a href="https://vk.me/malexenka">
								<svg class="icon icon-support">
									<use xlink:href="/img/symbols.svg#icon-support"></use>
								</svg>Тех. Поддержка
							</a>
						</li>
						
						<?php if(Auth::check() && $u->is_admin): ?>
						<li>
							<a href="/admin">
								<svg class="icon icon-fairness">
									<use xlink:href="/img/symbols.svg#icon-fairness"></use>
								</svg>П.У
							</a>
						</li>	
						<?php endif; ?>
						<?php if(Auth::check() && $u->is_lowadmin): ?>
						<li>
							<a href="/panel">
								<svg class="icon icon-fairness">
									<use xlink:href="/img/symbols.svg#icon-fairness"></use>
								</svg>ПУ
							</a>
						</li>
						<?php endif; ?>
					</ul>
				</div>
				<?php endif; ?>
				<div class="pull-out game">
					<button class="close-btn">
						<svg class="icon icon-close">
							<use xlink:href="/img/symbols.svg#icon-close"></use>
						</svg>
					</button>
					<ul class="pull-out-nav">
						<li>
							<a href="/jackpot">
								<svg class="icon">
									<use xlink:href="/img/symbols.svg#icon-jackpot"></use>
								</svg>JackPote
							</a>
						</li>
						<li>
							<a href="/crash">
								<svg class="icon">
									<use xlink:href="/img/symbols.svg#icon-crash"></use>
								</svg>Crash
							</a>
						</li>
						<li>
							<a href="/wheel">
								<svg class="icon">
									<use xlink:href="/img/symbols.svg#icon-roulette"></use>
								</svg>Wheel 
							</a>
						</li>
                        <li>
							<a href="/dice">
								<svg class="icon">
									<use xlink:href="/img/symbols.svg#icon-dice"></use>
								</svg>Dice
							</a>
						</li>
						<li>
							<a href="/battle">
								<svg class="icon">
									<use xlink:href="/img/symbols.svg#icon-battle"></use>
								</svg>Battle
							</a>
						</li>
                        <li>
							<a href="/coinflip">
								<svg class="icon">
									<use xlink:href="/img/symbols.svg#icon-flip"></use>
								</svg>PvP
								</a>
								</li>
						 <li>
							<a href="/hilo">
								<svg class="icon">
									<use xlink:href="/img/symbols.svg#icon-hilo"></use>
								</svg>Карты
							</a>
						</li>
							</a>
						</li>						
					</ul>
				</div>
				<div class="mobile-nav-menu-wrapper">
					<ul class="mobile-nav-menu">
							<li>
							<button id="gamesMenu">
								<svg class="icon icon-gamepad">
									<use xlink:href="/img/symbols.svg#icon-gamepad"></use>
								</svg>Игры
							</button>
						</li>
						<li>
							<button id="chatMenu">
								<svg class="icon icon-conversations">
									<use xlink:href="/img/symbols.svg#icon-conversations"></use>
								</svg>Чат
							</button>
						</li>
						<?php if(auth()->guard()->check()): ?>
						<li>
							<button id="profileMenu">
								<svg class="icon icon-person">
									<use xlink:href="/img/symbols.svg#icon-person"></use>
								</svg>Профиль
							</button>
						</li>
						<li>
							<button id="otherMenu">
								<svg class="icon icon-more">
									<use xlink:href="/img/symbols.svg#icon-more"></use>
								</svg><span>Еще</span>
							</button>
						</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
        </div>
    </div>
    <script type="text/javascript" src="/js/main.js?v=3"></script>
    <?php if(auth()->guard()->check()): ?>
	<div class="modal fade" id="walletModal" tabindex="-1" role="dialog" aria-labelledby="walletModalLabel" aria-hidden="true">
		<div class="modal-dialog deposit-modal modal-dialog-centered" role="document">
			<div class="modal-content">
				<button class="modal-close" data-dismiss="modal" aria-label="Close">
					<svg class="icon icon-close">
						<use xlink:href="/img/symbols.svg#icon-close"></use>
					</svg>
				</button>
				<div class="deposit-modal-component">
					<div class="wrap">
						<div class="tabs">
							<button type="button" class="btn btn-tab isActive">Пополнение</button>
							<button type="button" class="btn btn-tab">Вывод</button>
							
						</div>
						<div class="deposit-section tab active" data-type="deposite">
							<form action="/pay" method="post" id="payment">
								<?php if($settings->dep_bonus_min > 0): ?>
								<div class="form-row">
									<label>
										<div class="form-label big">Пополняй счет на сумму от <?php echo e($settings->dep_bonus_min); ?>р. и получай <center> бонус +<?php echo e($settings->dep_bonus_perc); ?>% на свой баланс!</center></div>
									</label>
								</div>
								<?php endif; ?>
								<div class="form-row">
									<label>
										<div class="form-label">Сумма пополнения (руб)</div>
										<div class="form-field">
											<div class="input-valid">
												<input class="input-field input-with-icon" name="amount" value="<?php echo e($settings->min_dep); ?>" placeholder="Мин. сумма: <?php echo e($settings->min_dep); ?>р.">
												<div class="input-icon">
													<svg class="icon icon-coin">
														<use xlink:href="/img/symbols.svg#icon-coin"></use>
													</svg>
												</div>
												<div class="valid inline"></div>
											</div>
										</div>
									</label>
								</div>
								<div class="form-row">
									<div class="form-label">Способ оплаты</div>
									<div class="select-payment">
										<input type="hidden" name="type" value="" id="depositType">
										<div class="bottom-start dropdown">
											<button type="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle btn btn-secondary" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Выберите способ
												<div class="opener">
													<svg class="icon icon-down"><use xlink:href="/img/symbols.svg#icon-down"></use></svg>
												</div>
											</button>
											<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu" x-placement="bottom-start" data-placement="bottom-start">
												<button type="button" data-id="5" tabindex="0" role="menuitem" class="dropdown-item" data-system="freekassa">
													<div class="image"></div><span>XMPAY</span>
												</button>
											</div>
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-green">Перейти к оплате</button>
							</form>
						</div>
						<div class="deposit-section tab" data-type="withdraw">
							<div class="form-row">
							</div>
							<div class="form-row">
								<div class="form-label">Способ вывода</div>
								<div class="select-payment">
									<input type="hidden" name="type" value="" id="withdrawType">
									<div class="bottom-start dropdown">
										<button type="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle btn btn-secondary" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Выберите способ
											<div class="opener">
												<svg class="icon icon-down"><use xlink:href="/img/symbols.svg#icon-down"></use></svg>
											</div>
										</button>
										<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 46px, 0px);" data-placement="bottom-start">
											<button type="button" data-id="6" tabindex="0" role="menuitem" class="dropdown-item" data-system="qiwi">
												<div class="image"><img src="/img/wallets/qiwi.png" alt="qiwi"></div><span>Qiwi</span>
											</button>
											<button type="button" data-id="3" tabindex="0" role="menuitem" class="dropdown-item" data-system="yandex">
												<div class="image"><img src="/img/wallets/yandex.png" alt="yandex"></div><span>Яндекс деньги</span>
											</button>
											<button type="button" data-id="2" tabindex="0" role="menuitem" class="dropdown-item" data-system="webmoney">
												<div class="image"><img src="/img/wallets/webmoney.png" alt="webmoney"></div><span>Webmoney WMR</span>
											</button>
											<button type="button" data-id="2" tabindex="0" role="menuitem" class="dropdown-item" data-system="visa">
												<div class="image"><img src="/img/wallets/visa.png" alt="visa"></div><span>VISA / Mastercard</span>
											</button>
										</div>
									</div>
								</div>
							</div>
							<div class="form-row">
								<label>
									<div class="form-label">Введите номер кошелька</div>
									<div class="form-field">
										<div class="input-valid">
											<input class="input-field" name="purse" placeholder="+79559875412" value="" id="numwallet">
										</div>
									</div>
								</label>
							</div>
							<div class="form-row">
								<label>
									<div class="form-label">Сумма вывода (руб)</div>
									<div class="form-field">
										<div class="input-valid">
											<input class="input-field input-with-icon" name="amount" value="" id="valwithdraw" placeholder="Введите сумму">
											<div class="input-icon">
												<svg class="icon icon-coin">
													<use xlink:href="/img/symbols.svg#icon-coin"></use>
												</svg>
											</div>
										</div>
									</div>
								</label>
							</div>
							<div class="form-row">
								<div class="com-row">
									Комиссия: <span>0%</span>
								</div>
							</div>
							<button type="submit" disabled="" class="btn btn-green" id="submitwithdraw">Вывести (<span id="totalwithdraw">0</span>р.)</button>
							<div class="checkbox-block">
								<label>Подтверждаю правильность реквизитов
								<input name="agree" type="checkbox" id="withdraw-checkbox" value=""><span class="checkmark"></span></label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="modal fade" id="promoModal" tabindex="-1" role="dialog" aria-labelledby="promoModalLabel" aria-hidden="true">
        <div class="modal-dialog faucet-demo-modal modal-dialog-centered" role="document">
            <div class="modal-content">
                <button class="modal-close" data-dismiss="modal" aria-label="Close">
                    <svg class="icon icon-close">
                        <use xlink:href="/img/symbols.svg#icon-close"></use>
                    </svg>
                </button>
                <div class="faucet-container">
                    <h3 class="faucet-caption"><span>Активация промокодов</span></h3>
                    <div class="caption-line"><span class="span"><svg class="icon icon-coin"><use xlink:href="/img/symbols.svg#icon-coin"></use></svg></span></div>
                    <div class="form-row">
                        <label>
                            <div class="form-field">
                                <div class="input-valid">
                                    <input class="input-field input-with-icon" name="promo" placeholder="Введите промокод" id="promoInput">
                                    <div class="input-icon">
                                        <svg class="icon icon-promo">
                                            <use xlink:href="/img/symbols.svg#icon-promo"></use>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="faucet-modal-form">
                        <button type="button" class="btn btn-green activatePromo"><span>Активировать</span></button>
                    </div>
          <p>Средства от промокодов будут начислены на бонусный счет. Но вы в любой момент сможете обменять их на реальный счет.<p>
          <p><img src="img/pr2.png"  alt="Промокод"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="rulesChat" tabindex="-1" role="dialog" aria-labelledby="rulesChatLabel" aria-hidden="true">
        <div class="modal-dialog faucet-demo-modal modal-dialog-centered" role="document">
            <div class="modal-content">
                <button class="modal-close" data-dismiss="modal" aria-label="Close">
                    <svg class="icon icon-close">
                        <use xlink:href="/img/symbols.svg#icon-close"></use>
                    </svg>
                </button>
                <div class="faucet-container">
                    <h3 class="faucet-caption"><span>Правила чата</span></h3>
                    <div class="caption-line"><span class="span"></span></div>
                    <div class="form-row">
                        <label>
                            <div class="form-field">
                                <strong>В чате запрещается:</strong>
                                <br>
                                1. Оскорблять кого-либо.
                                <br>
                                2. Попрошайничать.
                                <br>
                                3. Спамить или флудить.
                                <br>
                                4. Пиариться и клеветать.
                                <br>
                                5. Распостранять ссылки на сторонние сайты.
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="modal fade" id="giveawayModal" tabindex="-1" role="dialog" aria-labelledby="giveawayModalLabel" aria-hidden="true">
		<div class="modal-dialog faucet-demo-modal modal-dialog-centered" role="document">
			<div class="modal-content">
				<button class="modal-close" data-dismiss="modal" aria-label="Close">
					<svg class="icon icon-close">
						<use xlink:href="/img/symbols.svg#icon-close"></use>
					</svg>
				</button>
				<div class="faucet-container">
					<h3 class="faucet-caption"><span>Раздачи</span></h3>
					<div class="caption-line"><span class="span"><svg class="icon icon-bets"><use xlink:href="/img/symbols.svg#icon-bets"></use></svg></span></div>
					<div class="gv-list">
						<?php $__empty_1 = true; $__currentLoopData = $gives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
						<div class="faucet-modal-give <?php echo e($gv->status == 1 ? 'doneGive' : ''); ?>" id="gv_<?php echo e($gv->id); ?>">
							<div class="give-btn-block">
								<div class="faucet-reload">
									<h3><div class="faucet-cd">Раздача #<?php echo e($gv->id); ?></div></h3>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-6">
									<div class="bank-text">Сумма: <?php echo e($gv->sum); ?> <svg class="icon icon-coin <?php echo e($gv->type); ?>"><use xlink:href="/img/symbols.svg#icon-coin"></use></svg></div>
								</div>
								<div class="col-6">
									<div class="date-text">До начала: <?php echo e($gv->status == 0 ? $gv->time_to : 'Проведена'); ?></div>
								</div>
							</div>
							<?php if($gv->status == 0): ?>
								<?php if($gv->group_sub != 0 || $gv->min_dep != 0): ?>
								
							<br>
							<div class="give-btn-block nowGive">
									<div class="faucet-reload">
										<div class="faucet-cd">Для участия необходимо:</div>
										<div class="text-left">
											<?php if($gv->group_sub != 0 && $settings->vk_url): ?><div class="faucet-sm-text">• Быть подписанным на нашу <a href="<?php echo e($settings->vk_url); ?>" target="_blank">группу VK</a></div><?php endif; ?>
											<?php if($gv->min_dep != 0): ?><div class="faucet-sm-text">• Пополнить счет на сумму <?php echo e($gv->min_dep); ?>р. за текущий день</div><?php endif; ?>
										</div>
									</div>
								</div>
								<?php endif; ?>
								<br>
								<div class="give-btn-block nowGive">
									<button type="button" class="btn btn-green joinGiveaway" data-id="<?php echo e($gv->id); ?>"><span>&nbsp; Учавствовать &nbsp;</span></button>
									<br><br>
									<div class="faucet-sm-text">Участников: <span class="total_users"><?php echo e($gv->total); ?></span></div>
								</div>
							<?php endif; ?>
							<div class="give-btn-block">
								<div class="faucet-reload">
									<div class="faucet-cd">Победитель:</div>
									<div class="winnerGive">
										<?php if($gv->status > 0 && !is_null($gv->winner_id)): ?>
										<button type="button" class="btn btn-link" data-id="<?php echo e($gv->winner->unique_id); ?>">
											<span class="sanitize-user">
												<div class="sanitize-avatar"><img src="<?php echo e($gv->winner->avatar); ?>" alt=""></div>
												<span class="sanitize-name"><?php echo e($gv->winner->username); ?></span>
											</span>
										</button>
										<?php else: ?>
										Нет
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
						<div class="faucet-modal-give giveNone">
							<div class="give-btn-block">
								<div class="faucet-reload">
									<div class="faucet-cd">Раздач нет</div>
								</div>
							</div>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="ChangeNickModal" tabindex="-1" role="dialog" aria-labelledby="ChangeLabel" aria-hidden="true">
        <div class="modal-dialog faucet-demo-modal modal-dialog-centered" role="document">
            <div class="modal-content">
                <button class="modal-close" data-dismiss="modal" aria-label="Close">
                    <svg class="icon icon-close">
                        <use xlink:href="/img/symbols.svg#icon-close"></use>
                    </svg>
                </button>
                <div class="faucet-container">
                    <h3 class="faucet-caption"><span>Смена Никнейма</span></h3>
					<div class="modal-body">
                    <div class="flex">
                      <input id="changeImg" onkeyup="validNick()" autocomplete="off" class="input flex" type="text" name="" value="" placeholder="Никнейм">
                      <div class="button wheelButton flexNot" onclick="changeImg();">
                        Cменить
                      </div>
                    </div>
                   </div>
						
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ChangeAvatarModal" tabindex="-1" role="dialog" aria-labelledby="ChangeAvatarLabel" aria-hidden="true">
        <div class="modal-dialog faucet-demo-modal modal-dialog-centered" role="document">
            <div class="modal-content">
                <button class="modal-close" data-dismiss="modal" aria-label="Close">
                    <svg class="icon icon-close">
                        <use xlink:href="/img/symbols.svg#icon-close"></use>
                    </svg>
                </button>
                <div class="faucet-container">
                    <h3 class="faucet-caption"><span>Смена аватарки</span></h3>
					<div class="modal-body">
                    <div class="flex">
                        <form method="POST" action="/forms/changeAvatar.php">
                          <input name="link" type="text" placeholder="Ссылку на фото"/>
                          <input type="submit" value="Изменить"/>
                        </form>
                    </div>
                   </div>
						
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="modal fade" id="captchaModal" tabindex="-1" role="dialog" aria-labelledby="captchaModalLabel" aria-hidden="true">
		<div class="modal-dialog captcha-need-modal modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="captcha-need-modal-container">
					<div class="caption">Подтвердите,что Вы не робот!</div>
					<div class="form">
						<div class="label">Нажмите "Я не робот", чтобы продолжить!</div>
						<div class="captcha">
							<div hl="ru">
								<div>
									<div style="width: 304px; height: 78px;">
										<?php echo NoCaptcha::display(['data-callback' => 'recaptchaCallback']); ?>

									</div>
								</div>
							</div>
						</div>
						<button type="button" disabled="" class="btn" id="submitBonus">Продолжить</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	 <!--Промокод в чат--><?php if(Auth::user() and $u->is_admin == 1 || $u->is_moder == 1): ?>
    <div class="modal fade" id="promoChat" tabindex="-1" role="dialog" aria-labelledby="promoModalLabel" aria-hidden="true">
        <div class="modal-dialog faucet-demo-modal modal-dialog-centered" role="document">
            <div class="modal-content">
                <button class="modal-close" data-dismiss="modal" aria-label="Close">
                    <svg class="icon icon-close">
                        <use xlink:href="/img/symbols.svg#icon-close"></use>
                    </svg>
                </button>
                <div class="faucet-container">
                    <h3 class="faucet-caption"><span>Промокод в чат</span></h3>
                    <div class="caption-line"><span class="span"><svg class="icon icon-coin"><use xlink:href="/img/symbols.svg#icon-coin"></use></svg></span></div>
                    <div class="form-row">
                        <label>
                            <div class="form-field">
                                <div class="input-valid">
                                    <input class="input-field input-with-icon" name="promo" placeholder="Введите промокод" id="promoChatInput">
                                    <div class="input-icon">
                                        <svg class="icon icon-promo">
                                            <use xlink:href="/img/symbols.svg#icon-promo"></use>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="faucet-modal-form">
                        <button type="button" class="btn btn-green activateChatPromo"><span>Отправить</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!----><?php endif; ?>
	
	<?php if($u->is_admin == 1 || $u->is_moder == 1): ?>
		<div class="modal fade" id="quizModal" tabindex="-1" role="dialog" aria-labelledby="quizModalLabel" aria-hidden="true">
		<div class="modal-dialog faucet-demo-modal modal-dialog-centered" role="document">
			<div class="modal-content">
				<button class="modal-close" data-dismiss="modal" aria-label="Close">
					<svg class="icon icon-close">
						<use xlink:href="/img/symbols.svg#icon-close"></use>
					</svg>
				</button>
				<div class="faucet-container">
					<h3 class="faucet-caption"><span>Новая лотерея</span></h3>
					<h3 class="faucet-caption"><div id="banName"></div></h3>
					<div class="caption-line"><span class="span"><svg class="icon"><use xlink:href="/img/symbols.svg#icon-ban"></use></svg></span></div>
					<div class="form-row">
						<label>
							<div class="form-label">Вопрос</div>
							<div class="form-field">
								<div class="input-valid">
									<input class="input-field input-with-icon" id="quizQuestion" placeholder="Текст вопроса" >
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
						<label>
							<div class="form-label">Ответ</div>
							<div class="form-field">
								<div class="input-valid">
									<input class="input-field input-with-icon" id="quizAnswer" placeholder="Текст ответа">
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
						<label>
							<div class="form-label">Сумма выигрыша</div>
							<div class="form-field">
								<div class="input-valid">
									<input class="input-field input-with-icon" id="quizAmount" placeholder="100">
									<div class="input-icon">
										<svg class="icon">
										<use xlink:href="/img/symbols.svg#icon-coin"></use>
										</svg>
									</div>
								</div>
							</div>
						</label>
					</div>
					<div class="form-row">
						<label>
							<div class="form-label">Тип баланса</div>
							<div class="form-field">
								<div class="input-valid">
									<select id="quizTypeBalance" class="input-field">
										<option value="balance">Реальный</option>
										<option value="bonus">Бонусный</option>
									</select>

									
								</div>
							</div>
						</label>
					</div>
					<div class="form-row">
						<button type="button" class="btn btn-green newQuiz"><span>Создать лотерею</span></button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="bannedModal" tabindex="-1" role="dialog" aria-labelledby="bannedModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<button class="modal-close" data-dismiss="modal" aria-label="Close">
					<svg class="icon icon-close">
						<use xlink:href="/img/symbols.svg#icon-close"></use>
					</svg>
				</button>
				<div class="faucet-container">
					<h3 class="faucet-caption"><span>Заблокированные пользователи</span></h3>
					<h3 class="faucet-caption"><div id="unbanName"></div></h3>
					<div class="caption-line"><span class="span"><svg class="icon"><use xlink:href="/img/symbols.svg#icon-ban"></use></svg></span></div>
					<div class="form-row">
						<div class="table-heading">
							<div class="thead">
								<div class="tr">
									<div class="th">Пользователь</div>
									<div class="th">Окончание блокировки</div>
									<div class="th">Причина</div>
									<div class="th">Действия</div>
								</div>
							</div>
						</div>
						<div class="table-ban-wrap" style="max-height: 100%;">
							<div class="table-wrap" style="transform: translateY(0px);">
								<table class="table">
									<tbody id="bannedList">
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="banModal" tabindex="-1" role="dialog" aria-labelledby="banModalLabel" aria-hidden="true">
		<div class="modal-dialog faucet-demo-modal modal-dialog-centered" role="document">
			<div class="modal-content">
				<button class="modal-close" data-dismiss="modal" aria-label="Close">
					<svg class="icon icon-close">
						<use xlink:href="/img/symbols.svg#icon-close"></use>
					</svg>
				</button>
				<div class="faucet-container">
					<h3 class="faucet-caption"><span>Блокировка чата пользователю</span></h3>
					<h3 class="faucet-caption"><div id="banName"></div></h3>
					<div class="caption-line"><span class="span"><svg class="icon"><use xlink:href="/img/symbols.svg#icon-ban"></use></svg></span></div>
					<div class="form-row">
						<input type="hidden" name="user_ban_id">
						<label>
							<div class="form-label">Время бана в минутах</div>
							<div class="form-field">
								<div class="input-valid">
									<input class="input-field input-with-icon" name="time" placeholder="Время" id="banTime">
									<div class="input-icon">
										<svg class="icon">
											<use xlink:href="/img/symbols.svg#icon-time"></use>
										</svg>
									</div>
								</div>
							</div>
						</label>
					</div>
					<div class="form-row">
						<input type="hidden" name="user_ban_id">
						<label>
							<div class="form-label">Причина бана</div>
							<div class="form-field">
								<div class="input-valid">
									<input class="input-field input-with-icon" name="reason" placeholder="Причина" id="banReason">
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
						<button type="button" class="btn btn-green banThis"><span>Забанить</span></button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="unbanModal" tabindex="-1" role="dialog" aria-labelledby="unbanModalLabel" aria-hidden="true">
		<div class="modal-dialog faucet-demo-modal modal-dialog-centered" role="document">
			<div class="modal-content">
				<button class="modal-close" data-dismiss="modal" aria-label="Close">
					<svg class="icon icon-close">
						<use xlink:href="/img/symbols.svg#icon-close"></use>
					</svg>
				</button>
				<div class="faucet-container">
					<h3 class="faucet-caption"><span>Разблокировка чата пользователю</span></h3>
					<h3 class="faucet-caption"><div id="unbanName"></div></h3>
					<div class="caption-line"><span class="span"><svg class="icon"><use xlink:href="/img/symbols.svg#icon-ban"></use></svg></span></div>
					<div class="form-row">
						<input type="hidden" name="user_unban_id">
						<button type="button" class="btn btn-green unbanThis"><span>Разбанить</span></button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php endif; ?>
	<?php if(auth()->guard()->guest()): ?>
	<div class="modal fade" id="confirmAgeModal" tabindex="-1" role="dialog" aria-labelledby="confirmAgeModalLabel" aria-hidden="true">
		<div class="modal-dialog confirm-age-modal modal-dialog-centered" role="document">
			<div class="modal-content">
				<button class="modal-close" data-dismiss="modal" aria-label="Close">
					<svg class="icon icon-close">
						<use xlink:href="/img/symbols.svg#icon-close"></use>
					</svg>
				</button>
				<div class="confirm-age-modal-container">
					<div class="wrap">
						<div class="head"><img src="/img/logo.png" alt=""></div>
						<div class="body">
							<div class="wrap">
								<div class="buttons auth-buttons">
									<a href="/auth/vkontakte" class="btn">
										Войти через
										<svg class="icon icon-vk">
											<use xlink:href="/img/symbols.svg#icon-vk"></use>
										</svg>
									</a>
								</div>
								<div class="disclaimer">Входя на сайт, вы принимаете условия
									<br>
									<button class="button-link" data-toggle="modal" data-target="#tosModal">лицензионного соглашения</button> и подтверждаете, что Вам есть 18 лет</div>
								<div class="leave-link"><a href="https://google.com" rel="nofollow">Покинуть сайт</a></div>
								<div class="info">*Услуги сайта – являются имитатором (симулятором), позволяющим получить психо-эмоциональное удовлетворение без каких бы то ни было рисков для пользователя, в связи с чем, услуги сайта относятся к аттракционам.</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
    <?php
    // header('Location: url-адрес сайта');
    // Переадресация на главную страницу данного сайта
    // header('Location: landing'); 
    ?>
	<?php endif; ?>
	<div class="modal fade" id="tosModal" tabindex="-1" role="dialog" aria-labelledby="tosModalLabel" aria-hidden="true">
		<div class="modal-dialog tos-modal modal-dialog-centered" role="document">
			<div class="modal-content">
				<button class="modal-close" data-dismiss="modal" aria-label="Close">
					<svg class="icon icon-close">
						<use xlink:href="/img/symbols.svg#icon-close"></use>
					</svg>
				</button>
				<div class="tos-modal-container">
					<div class="scrollbar-container tos-modal-block ps">
						<h2>Общие положения</h2>
						<p>1.1. Настоящее соглашение (далее «Соглашение») регламентирует порядок и условия предоставления услуг сайтом «<?php echo e($settings->domain); ?>», именуемой далее по тексту «Организатор», и адресовано физическому лицу, желающему получать услуги указанного сайта (далее «Участник».)</p>
						<p>1.2. Организатор и участник признают порядок и форму заключения настоящего соглашения равнозначным по юридической силе соглашению, заключенному в письменной форме.</p>
						<p>1.3. Условия настоящего соглашения принимаются участниками в полном объеме и без каких-либо оговорок, путем присоединения к соглашению в том виде, в каком оно изложено на сайте «<?php echo e($settings->domain); ?>»</p>
						<h2>Термины и Определения</h2>
						<p>2.1. Предметом настоящего Соглашения является предоставление организатором участнику услуг по организации досуга и отдыха в игре «<?php echo e($settings->domain); ?>» в соответствии с условиями настоящего Соглашения. Под такими услугами, в частности, понимаются следующие: услуги по покупке-продаже игрового инвентаря (<?php echo e($settings->domain); ?>), ведение учета значимой информации: движения по игровому счету, обеспечение мер по идентификации и безопасности участников, разработка программного обеспечения, интегрируемого в игровую площадку и внешние приложения, информационные и другие услуги, необходимые для организации игры и обслуживания участника в ее процессе на площадке организатора.</p>
						<p>2.2. Игра в целом, а равно любой ее элемент или любое сопряженное внешнее игровое приложение, созданы исключительно для развлечений. Участник признает, что все виды деятельности в игре на игровой площадке являются для него развлечением. Участник соглашается с тем, что в зависимости от характеристик его аккаунта, степень его участия в игре будет доступна в различной мере.</p>
						<p>2.3. Участник соглашается, что он несет персональную ответственность за все действия, произведенные с игровым инвентарем (<?php echo e($settings->domain); ?>): покупкой, продажей, вводом и выводом, а также за игровые действия на игровой площадке: создание, покупку-продажу, операции со всеми игровыми элементами и другими игровыми атрибутами и объектами, используемыми для игрового процесса.</p>
						<p>2.4. Участник признает, что степень и возможность участия в развлечениях на сервере Игры являются главными качествами оказываемой ему услуги.</p>
						<h2>Права и обязанности сторон</h2>
						<p>3.1 Права и обязанности участника.</p>
						<p>3.1.1. Принимать участие в игре «<?php echo e($settings->domain); ?>» могут только лица, достигшие гражданской дееспособности по законодательству страны своей резиденции. Все последствия неисполнения данного условия возлагаются на участника.</p>
						<p>3.1.2. Степень и способ участия в игре определяются самим участником, но не могут противоречить настоящему Соглашению и правилам игровой площадки. </p>
						<p>3.1.2. Участник обязан:</p>
						<p>3.1.2.1. правдиво сообщать сведения о себе при регистрации и по первому требованию Организатора предоставить достоверные данные о своей личности, позволяющие идентифицировать его как владельца аккаунта в игре;</p>
						<p>3.1.2.2. не использовать игру для совершения каких-либо действий, противоречащих международному законодательству и законодательству страны — резиденции Участника;</p>
						<p>3.1.2.3. не использовать недокументированные особенности (баги) и ошибки программного обеспечения игры и незамедлительно сообщать Организатору о них, а так же о лицах, использующих эти ошибки;</p>
						<p>3.1.2.4. не использовать внешние программы любого рода, для получения преимуществ в игре;</p>
						<p>3.1.2.5. не использовать для рекламы своей партнерской ссылки, а равно ресурса, ее содержащего, почтовые рассылки и иного вида сообщения лицам, не выражавшим согласия их получать (спам);</p>
						<p>3.1.2.6. не вправе ограничивать доступ других участников или других лиц к Игре, обязан уважительно и корректно относиться к участникам игры, а так же к Организатору, его партнерам и сотрудникам, не создавать помехи в работе последних;</p>
						<p>3.1.2.7. не обманывать Организатора и участников игры;</p>
						<p>3.1.2.8. не использовать ненормативную лексику и оскорбления в любой форме;</p>
						<p>3.1.2.9. не порочить действия других игроков и Администрации;</p>
						<p>3.1.2.10. не угрожать насилием и физической расправой кому бы то ни было;</p>
						<p>3.1.2.11. не распространять материалы пропагандирующие неприятие или ненависть к любой расе, религии, культуре, нации, народу, языку, политике, государству, идеологии или общественному движению;</p>
						<p>3.1.2.12. не рекламировать порнографию, наркотики и ресурсы, содержащие подобную информацию;</p>
						<p>3.1.2.13. не использовать действия, терминологию или жаргон для завуалирования нарушения обязанностей участника;</p>
						<p>3.1.2.14. самостоятельно заботиться о необходимых мерах компьютерной и иной безопасности, хранить в секрете и не передавать другому лицу или другому участнику свои идентификационные данные: логин, пароль аккаунта и др., не допускать несанкционированного доступа к почтовому ящику, указанному в профиле аккаунта участника. Весь риск неблагоприятных последствий разглашения этих данных несет участник, так как участник согласен с тем, что система информационной безопасности игровой площадки исключает передачу логина, пароля и идентификационной информации аккаунта участника третьим лицам;</p>
						<p>3.1.2.15. самостоятельно нести персональную ответственность за ведение своих финансовых сделок и операций, Организатор не несет ответственности за совершаемые финансовые действия между игроками по передаче игрового инвентаря и игровой валюты, а равно иных игровых атрибутов.</p>
						<p>3.1.2.16. о своих претензиях и жалобах первым уведомлять организатора в письменной форме через страницу «Поддержка».</p>
						<p>3.1.2.17. регулярно самостоятельно знакомиться с новостями игры, а также с изменениями в настоящем Соглашении и в правилах игры на игровой площадке.</p>
						<p>3.1.2.18. не создавать дополнительные аккаунты ( мультиаккаунты ). Такие действия повлекут за собой блокировку аккаунта, либо его обнуление.</p>
						<p>3.1.2.19. Запрещена продажа/передача аккаунтов</p>
						<p>3.1.2.20. Запрещены "сговоры" групп лиц в целях получения выгоды для участников/неучастников сговора</p>
						<p>3.1.2.21. "Сговоры" - они же картельный сговор, преступный сговор, кооператив. Данный термин определяет группу лиц, которые путем кооперации пытаются получить выгоду на сайте. В случае обнаружения оных, всем участникам грозит бан и обнуление, также возможно наказание устанавливаемое администраторами.</p>
						<h3>Права и обязанности организатора</h3>
						<p>4.1.1. Организатор обязан:</p>
						<p>4.1.1.1. обеспечить без взимания платы доступ участника на игровую площадку и к участию в игре. Участник самостоятельно за свой счет оплачивает доступ в сеть Интернет и несет иные расходы, связанные с данным действием.</p>
						<p>4.1.1.2. вести учет игрового инвентаря (<?php echo e($settings->domain); ?>) на игровом счете участника.</p>
						<p>4.1.1.3. регулярно совершенствовать аппаратно-программный комплекс, но не гарантирует, что программное обеспечение Игры не содержит ошибок, а аппаратная часть не выйдет из рабочих параметров и будет функционировать бесперебойно.</p>
						<p>4.1.1.4. Соблюдать режим конфиденциальности в отношении персональных данных участника в порядке п. 6 настоящего соглашения.</p>
						<p>4.1.1.5. Получение выплат пользователем может ограничиваться администрацией на своё усмотрение.</p>
						<p>4.1.1.6. Любому лицу, законно владеющему игровым инвентарем (<?php echo e($settings->domain); ?>), осуществляется оплата денежной суммы, обусловленной курсовой стоимостью (<?php echo e($settings->domain); ?>), за вычетом затрат на осуществление данной операции.</p>
						<p>4.1.2. Организатор имеет право:</p>
						<p>4.1.2.2. предоставлять участнику дополнительные платные услуги, перечень которых, а также порядок и условия пользования которыми определяются настоящим соглашением, правилами игровой площадки и иными объявлениями организатора. При этом организатор вправе в любое время изменить количество и объем предлагаемых платных услуг, их стоимость, название, вид и эффект от использования.</p>
						<p>4.1.2.3. приостановить действие настоящего соглашения и отключить участника от участия в игре на время проведения расследования по подозрению участника в нарушении настоящего Соглашения и правил игровой площадки.</p>
						<p>4.1.2.4. исключить участника из игры, если установит, что участник нарушил настоящее соглашение или правила, установленные на игровой площадке, в порядке 5.10 настоящего соглашения.</p>
						<p>4.1.2.5. частично или полностью прерывать предоставление услуг без предупреждения участника при проведении реконструкции, ремонта и профилактических работ на площадке.</p>
						<p>4.1.2.6. Организатор не несет ответственности за неправильное функционирование программного обеспечения игры. Участник использует программное обеспечение по принципу «КАК ЕСТЬ» (“AS IS”). Если организатор установит, что при игре возник сбой (ошибка) в работе площадки, то результаты, которые состоялись во время некорректной работы программного обеспечения, могут быть аннулированы или скорректированы по усмотрению организатора. Участник согласен не апеллировать к организатору по поводу качества, количества, порядка и сроков предоставляемых ему игровых возможностей и услуг.</p>
						<p>Гарантии и ответственность 5.1. Организатор не гарантирует постоянный и непрерывный доступ к игровой площадке и его услугам в случае возникновения технических неполадок и/или непредвиденных обстоятельств, в числе которых: неполноценная работа или не функционирование интернет–провайдеров, серверов информации, банковских и платёжных систем, а также неправомерных действий третьих лиц. Организатор приложит все усилия по недопущению сбоев, но не несет ответственности за временные технические сбои и перерывы в работе Игры, вне зависимости от причин таких сбоев.</p>
						<p>5.2. Участник полностью согласен, что организатор не может нести ответственность за убытки участника, которые возникли в связи с противоправными действиями третьих лиц, направленными на нарушение системы безопасности электронного оборудования и баз данных игры, либо вследствие независящих от организатора перебоев, приостановления или прекращения работы каналов и сетей связи, используемых для взаимодействия с участником, а также неправомерных или необоснованных действий платежных систем, а так же третьих лиц.</p>
						<p>5.3. Организатор не несет ответственности за убытки, понесенные в результате использования или не использования участником информации об Игре, игровых правил и самой Игры и не несет ответственности за убытки или иной вред, возникший у участника в связи с его неквалифицированными действиями и незнанием игровых правил или его ошибках в расчетах;</p>
						<p>5.4. Участник согласен с тем, что использует игровую площадку по своей доброй воле и на свой собственный риск. Организатор не дает участнику никакой гарантии того, что он извлечет выгоду или пользу от участия в игре. Степень участия в Игре определяется самим участником.</p>
						<p>5.5. Организатор не несет ответственности перед участником за действия других участников.</p>
						<p>5.6. В случае возникновения споров и разногласий на игровой площадке, решение организатора является окончательным, и участник с ним полностью согласен. Все споры и разногласия, возникающие из настоящего Соглашения или в связи с ним, подлежат разрешению путем переговоров. В случае невозможности достижения согласия путем переговоров, споры, разногласия и требования, возникающие из настоящего Соглашения, подлежат разрешению в соответствии с действующим законодательством РФ.</p>
						<p>5.7. Организатор не несет налогового бремени за Участника. Участник обязуется самостоятельно включать возможные полученные доходы в налоговую декларацию в соответствии с законодательством страны своей резиденции.</p>
						<p>5.8. Организатор может вносить изменения в настоящее Соглашение, правила игровой площадки и другие документы в одностороннем порядке. В случае внесения изменений в документы Организатор размещает последние версии документов на сайте игровой площадки. Все изменения вступают в силу с момента размещения. Участник имеет право расторгнуть настоящее Соглашение в течение 3 дней, если он не согласен с внесенными изменениями. В таком случае расторжение Соглашения производится согласно п. 5.9 настоящего Соглашения. На Участника возлагается обязанность регулярно посещать официальный сайт Игры с целью ознакомления с официальными документами и новостями.</p>
						<p>5.9. Участник имеет право расторгнуть настоящее Соглашение в одностороннем порядке без сохранения игрового аккаунта. При этом все расходы, связанные с участием в игре, участнику не компенсируются и не возвращаются.</p>
						<p>5.10. Организатор имеет право расторгнуть настоящее Соглашение в одностороннем порядке, а также совершать иные действия, ограничивающие возможности в Игре, в отношении участника или группы участников, являющихся соучастниками выявленных нарушений условий настоящего Соглашения. При этом все игровые атрибуты, игровой инвентарь (<?php echo e($settings->domain); ?>) находящиеся в аккаунте и на игровом счете участника или группы участников, а равно все расходы возврату не подлежат и не компенсируются, за исключением если Организатор по своему усмотрению посчитает целесообразным компенсировать расходы участника или группы участников.</p>
						<p>5.11. Организатор и Участник освобождаются от ответственности в случае возникновения обстоятельств непреодолимой силы (форс-мажорных обстоятельств), к числу которых относятся, но перечнем не ограничиваются: стихийные бедствия, войны, огонь (пожары), наводнения, взрывы, терроризм, бунты, гражданские волнения, акты правительственной или регулирующей власти, хакерские атаки, отсутствия, нефункционирование или сбои работы энергоснабжения, поставщиков Интернет услуг, сетей связи или других систем, сетей и услуг. Сторона, у которой возникли такие обстоятельства, должна в разумные сроки и доступным способом оповестить о таких обстоятельствах другую сторону.</p>
						<h2>Конфиденциальность</h2>
						<p>6.1. Условие конфиденциальности распространяется на информацию, которую Организатор может получить об Участнике во время его пребывания на сайте Игры и которая может быть соотнесена с данным конкретным пользователем. Организатор автоматически получает и записывает в серверные логи техническую информацию из вашего браузера: IP адрес, адрес запрашиваемой страницы и т.д. Организатор может записывать «cookies» на компьютер пользователя и впоследствии использовать их. Организатор гарантирует, что данные, сообщенные участником при регистрации в Игре, будут использоваться Организатором только внутри Игры.</p>
						<p>6.2. Организатор вправе передать персональную информацию об Участнике третьим лицам только в случаях, если:</p>
						<p>6.2.1. Участник изъявил желание раскрыть эту информацию;</p>
						<p>6.2.2. Без этого Участник не может воспользоваться желаемым продуктом или услугой, в частности - информация об именах (никах), игровых атрибутах - может быть доступна другим участникам;</p>
						<p>6.2.3. Этого требует международное законодательство и/или органы власти с соблюдением законной процедуры;</p>
						<p>6.2.4. Участник нарушает настоящее Соглашение и правила игровой площадки.</p>
						<h2>Иные положения</h2>
						<p>7.1. Недействительность части или пункта (подпункта) настоящего соглашения не влечет недействительности всех остальных частей и пунктов (подпунктов).</p>
						<p>7.2. Срок действия настоящего Соглашения устанавливается на весь период действия игровой площадки, то есть на неопределенный срок, и не предполагает срока окончания данного соглашения.</p>
						<p>7.3. Регистрируясь и находясь на игровой площадке, участник признает, что он прочитал, понял и полностью принимает условия настоящего Соглашения, а также правила игры и иных официальных документов.</p>
						<p>7.4. Запрещено использование временных ( одноразовых ) почт, за использование таковых аккаунт будет удален и будут приняты меры. Одноразовая почта определяется администрацией сайта. Под данное определение подходят и почты поставленные на купленные домены, купленные домены определяются администрацией сайта.</p>
						<p>7.4.1. Запрещено регистрировать более одного аккаунта через сайт. Такие действия повлекут к блокировке аккаунта</p>
						<p>7.4.2. Искусственное наигрывание баланса с помощью скриптов - категорически запрещено. Участник который будет замечен будет заблокирован</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="fairModal" tabindex="-1" role="dialog" aria-labelledby="tosModalLabel" aria-hidden="true">
		<div class="modal-dialog fair-modal modal-dialog-centered" role="document">
			<div class="modal-content">
				<button class="modal-close" data-dismiss="modal" aria-label="Close">
					<svg class="icon icon-close">
						<use xlink:href="/img/symbols.svg#icon-close"></use>
					</svg>
				</button>
				<div class="fair-modal__container">
					<h1><span>Честная игра</span></h1><span>Наша система честной игры гарантирует, что мы не можем манипулировать результатом игры. <br><br> Подобно тому, как вы разрезали колоду в реальном казино. Эта реализация дает вам полное спокойствие во время игры, зная, что мы не можем «подстраивать» ставки в нашу пользу.<br><br></span>
					<p data-v-1ae0ffcb="" class="fair-game-page__header-text">СВЯЗАННЫЕ С random.org ссылки на независимые SHA-224 генераторы: <a data-v-1ae0ffcb="" href="https://md5hashing.net/hash/sha224" rel="nofollow" target="_blank" class="underline underline-start">md5hashing.net</a>, <a data-v-1ae0ffcb="" href="https://www.miniwebtool.com/sha224-hash-generator/" rel="nofollow" target="_blank" class="underline underline-start">miniwebtool.com</a>, <a data-v-1ae0ffcb="" href="https://encode-decode.com/sha224-generator-online/" rel="nofollow" target="_blank" class="underline underline-start">encode-decode.com</a>.</p>
					<div class="collapse-component">
						<div class="form-field">
							<div class="input-valid">
								<input class="input-field input-with-icon" name="hash" id="gameHash" placeholder="Введите хэш">
								<div class="input-icon">
									<svg class="icon icon-coin">
										<use xlink:href="/img/symbols.svg#icon-fairness"></use>
									</svg>
								</div>
							</div>
						</div>
					</div>
					<button type="button" class="btn btn-rotate checkHash"><span>&nbsp; Проверить &nbsp;</span></button>
					<div class="fair-table" style="display: none;">
						<table class="table">
							<thead>
								<tr>
									<th><span># Игры</span></th>
									<th><span>Сгенерированное число</span></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td id="gameRound"></td>
									<td id="gameNumber"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="whatisthisModal" tabindex="-1" role="dialog" aria-labelledby="whatisthisModalLabel" aria-hidden="true">
		<div class="modal-dialog fair-modal modal-dialog-centered" role="document">
			<div class="modal-content">
				<button class="modal-close" data-dismiss="modal" aria-label="Close">
					<svg class="icon icon-close">
						<use xlink:href="/img/symbols.svg#icon-close"></use>
					</svg>
				</button>
			</div>
		</div>
	</div>
	<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
		<div class="modal-dialog user-modal modal-dialog-centered" role="document">
			<div class="modal-content">
				<button class="modal-close" data-dismiss="modal" aria-label="Close">
					<svg class="icon icon-close">
						<use xlink:href="/img/symbols.svg#icon-close"></use>
					</svg>
				</button>
				<div class="user-modal__container"></div>
			</div>
		</div>
	</div>
<?php if(session('error')): ?>
	<script>
	$.notify({
		type: 'error',
		message: "<?php echo e(session('error')); ?>"
	});
	</script>
<?php elseif(session('success')): ?>
	<script>
	$.notify({
		type: 'success',
		message: "<?php echo e(session('success')); ?>"
	});
	</script>
<?php endif; ?>

</body>
</html>
<?php endif; ?>
<?php endif; ?>

<?php /* /var/www/html/resources/views/layout.blade.php */ ?>