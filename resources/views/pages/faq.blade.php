@extends('layout')

@section('content')
<link rel="stylesheet" href="/css/faq.css">
<div class="section">
    <div class="faq-component">
        <div class="faq-head">
            <h1 class="faq-caption">Ответы на вопросы</h1>
            @if($settings->vk_support_link)
            <div class="faq-link"><a class="btn btn-light" href="{{$settings->vk_support_link}}" target="_blank">&nbsp; Написать в поддержку &nbsp;</a></div>
            @endif
        </div>
        <div class="faq-item">
            <div class="caption">
                <div class="caption-block">
                    <svg class="icon icon-faq">
                        <use xlink:href="/img/symbols.svg#icon-faq"></use>
                    </svg> О сайте
                </div>
            </div>
            <div class="faq-content">
                <p>{{$settings->sitename}} - это увлекательные и доказуемые честные мини-игры.</p>
                <p>Играйте в игры и выигрывайте монеты, которые сможете обменять на реальные деньги.</p>
            </div>
        </div>
        <div class="faq-item">
            <div class="caption">
                <div class="caption-block">
                    <svg class="icon icon-coin">
                        <use xlink:href="/img/symbols.svg#icon-coin"></use>
                    </svg> Монеты
                </div>
            </div>
            <div class="faq-content">
                <p>Монеты - это наша внутригровая валюта. Курс: 1.00 монета = 1.00 рубль</p>
                <p>Вы можете купить монеты на странице <a class="" data-toggle="modal" data-target="#walletModal">покупки монет</a> или получать бесплатно до 10 монет каждые 15 минут, на странице <a class="" href="/free">бесплатных монет</a></p>
                <p>ВНИМАНИЕ! Система отыгровок на бонусный счет не работает. Бонусный счет создан для тестирования сайта, но вы в любой момент можете обменять бонусные монеты на реальные. Играйте с реального счета чтобы сделать отыгровку и выводить больше.</p>
			    <p>Если вы ставите ставку с бонусного счета а кто то с реального, и вы выигрываете, то реальный баланс конвертируется в бонусный 1 к 1. (На то это и бонусный счет). Если выигрывает кто поставил с реального счета, то он болучает ваш бонусный счет и реальный. Играйте с реального счета чтобы получать больше!
			</div>
        </div>
        <div class="faq-item">
            <div class="caption">
                <div class="caption-block">
                    <svg class="icon icon-fairness">
                        <use xlink:href="/img/symbols.svg#icon-fairness"></use>
                    </svg> Честная игра
                </div>
            </div>
            <div class="faq-content">
                <p>Генератор случайных чисел создает доказуемые и абсолютно честные случайные числа, которые используются для определения результата каждой игры, сыгранной на сайте.</p>
                <p>Каждый пользователь может проверить исход любой игры полностью детерминированным способом. Предоставляя один параметр - клиентский хэш, на входы генератора случайных чисел, {{$settings->sitename}} не может манипулировать результатами в свою пользу.</p>
                <p>Генератор случайных чисел {{$settings->sitename}} позволяет каждой игре запрашивать любое количество случайных чисел из заданного начального числа клиента, начального числа сервера и одноразового номера.</p>
            </div>
        </div>
        <div class="faq-item">
            <div class="caption">
                <div class="caption-block">
                    <svg class="icon icon-affiliate">
                        <use xlink:href="/img/symbols.svg#icon-affiliate"></use>
                    </svg> Партнерская программа
                </div>
            </div>
            <div class="faq-content">
                <p>Приглашайте других игроков на наш сайт по <a class="" href="/affiliate">вашей реферальной ссылке</a> и зарабатывайте 5% от нашей прибыли с каждой ставки, сделанной вашим рефералом.</p>
            </div>
        </div>

        <div class="faq-item">
            <div class="caption">
                <div class="caption-block">
                    <svg class="icon icon-tasks">
                        <use xlink:href="/img/symbols.svg#icon-tasks"></use>
                    </svg> Вывод
                </div>
            </div>
            <div class="faq-content">
                <p>Деньги заработанные на промокодах выводить ЗАПРЕЩЕНО, Почему? </p>
                <p>Потому, что это как 'Демо' режим для ознакомления и удовольствия игры. </p>
                <p>Выводим только тем, кто пополнял свой баланс. </p>
                <p>Минимальный депозит на сайт 10 рублей, минимальный депозит для вывода 50 рублей.</p>
				<p>Вывод на анонимные кошельки QIWI, Яндекс деньги и WebMoney невозможны, такие кошельки будут отменяться системой автоматически.</p>
            </div>
        </div>
		
		<div class="faq-item">
            <div class="caption">
                <div class="caption-block">
                    <svg class="icon icon-faq">
                        <use xlink:href="/img/symbols.svg#icon-faq"></use>
                    </svg> Блокировка
                </div>
            </div>
            <div class="faq-content">
                <p>В случае если вы будете пойманы на багоюзирстве монет и прочего, бан навсегда - с аннулированием баланса!</p>
                <p>Играйте честно! И помогайте администрации улучшать игру :)</p>
            </div>
        </div>

    </div>
</div>
@endsection