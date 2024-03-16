@extends('layout') @section('content')
<link rel="stylesheet" href="/css/tasks.css">
<script>
$(function() {
    $("#joinToTask").click(function() {
        $.ajax({
            url: "/tasks/join",
            method: "POST",
            data: {
                id: $(this).data('id')
            },
            success: (data) => {
                if(data.error)
                    return $.notify({
                        type: "error",
                        message: data.error
                    });
                $.notify({
                    type: "success",
                    message: data.msg
                });
            },
            error: e =>
                $.notify({
                    type: "error",
                    message: "Произошла ошибка при попытке запроса"
                })
            
        })
    });
});
</script>
<div class="section">
<div class="_2JflO">
    <div class="tasks">
        <div class="breadcrumb"><a href="/tasks" class="">Задания</a><span class="current">{{ $namesOfTasks[$task->challengeId] }} #{{$task->id}} </span></div>
        <div class="task-full">
            <div class="task-head">
                <div class="info-col">
                    <div class="task-desc">
                        <!-- <div class="icon-wrap">
                            <svg class="icon icon-wheel">
                                <use xlink:href="#icon-wheel"></use>
                            </svg>
                        </div> -->
                        <div class="text">
                            <div class="paragraph"><span class="dot">Задание:</span> Сделайте выигрыш {{ $namesOfTasks[$task->challengeId] }} и более за 1 ставку в игре {{ $namesOfTasks[$task->challengeId] }}</div>
                            <div class="paragraph">
                                <span class="dot">Правила:</span> Профит засчитываются от выигрышных ставок<br />Монеты с демо счета не учитываются 
                            </div>
                        </div>
                    </div>
                    <div class="take-part">
                        <div class="status">
                            @if($task->status == 1)
                                <div class="not-active">Статус:&nbsp;Завершен</div>
                            @else
                                <div class="active">Статус:&nbsp;Активен</div>
                            @endif
                        </div>
                        <div class="bottom"><button id="joinToTask" data-id="{{ $task->id }}" type="button" @if($task->status == 1 || $isJoin >= 1) disabled @endif class="btn"> @if($isJoin >= 1) Вы участвуете @else Принять участие @endif</button></div>
                    </div>
                </div>
                <div class="info-col">
                    <ul class="task-information">
                        <li> <span>Челлендж <span class="value">{{ $namesOfTasks[$task->challengeId] }}</span></span> </li>
                        <li>
                            <span >
                                Цель 
                                <span class="value tip-block" style="font-size: 14px;">
                                    Максимальный профит
                                </span >
                            </span>
                        </li>
                        <li>
                            <span >
                                Сумма входа
                                <span class="value" >
                                    <div class="bet-number">
                                        <span class="bet-wrap" >
                                            <span>{{ number_format($task->deposit, 2, '.', '') }}</span>
                                            <svg class="icon icon-coin">
										        <use xlink:href="/img/symbols.svg#icon-coin"></use>
									        </svg>
                                        </span>
                                    </div>
                                </span >
                            </span>
                        </li>
                        <li>
                            <span >
                                Призовой фонд 
                                <span class="value" >
                                    <div class="bet-number">
                                        <span class="bet-wrap" >
                                            <span>{{ number_format($task->bank, 2, '.', '') }}</span>
                                            <svg class="icon icon-coin">
										        <use xlink:href="/img/symbols.svg#icon-coin"></use>
									        </svg>
                                        </span>
                                    </div>
                                </span >
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            @if(count($usersInTask) >= 1)
            <div class="withPager">
                <div class="list">
                    <table class="table-classic tournament">
                        <thead>
                            <tr>
                                <th>Игрок</th>
                                <!-- <th>Попыток</th> -->
                                <th>Профит</th>
                                <th>@if($task->status == 0) Возможный @endif Приз</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 0; $i < count($usersInTask); $i++)
                            <tr>
                                <td> <button type="button" class="btn btn-user" data-id="0ky2m"> <span class="sanitize-user"><span class="sanitize-text">{{ $usersInTask[$i]->username }}</span></span> </button> </td>
                                <!-- <td>1</td> -->
                                <td><button type="button" class="btn btn-link" data-id="233027349">{{ $usersInTask[$i]->profit }}</button></td>
                                <td class="text-right">
                                    <div class="bet-number">
                                        <span class="bet-wrap" > 
                                            <span>
                                            @if($i < $winnersCount['count']) 
                                                {{ number_format($task->bank*$winnersCount['coef'][$i], 2, '.', '') }}
                                            @else 
                                                0.00
                                            @endif
                                            </span>
                                            <svg class="icon icon-coin">
                                                <use xlink:href="#icon-coin"></use>
                                            </svg>
                                        </span>
                                    </div>
                                </td>  
                            </tr>
                            @endfor
                           
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
            <!-- <div class="_3XAxD">
                <button type="button" class="_16KDD" disabled="">
                    <span >
                        <svg class="icon icon-left">
                            <use xlink:href="#icon-left"></use>
                        </svg>
                        Предыдущая страница
                    </span >
                </button>
                <div class="_3_kz-">
                    <div class="form-field"><input class="input-field" value="1" /></div>
                    из 11 
                </div>
                <button type="button" class="_16KDD">
                    <span >
                        Следующая страница
                        <svg class="icon icon-left">
                            <use xlink:href="#icon-left"></use>
                        </svg >
                    </span>
                </button>
            </div> -->
        </div>
    </div>
</div>
</div>
@endsection
