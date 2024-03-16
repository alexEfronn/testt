@extends('layout') @section('content')
<style>
._2JflO {
    padding: 0 40px;
    max-width: 1250px;
    margin: 0 auto;
    width: 100%;
}
.quest-banner {
    padding: 25px;
    background: linear-gradient(90deg, #597da3 40%, #5a5aa3 100% );
    color: #fff;
    border-radius: 6px 6px 0 0;
    position: relative;
    overflow: hidden;
    text-align: center;
}
.quest-banner .caption {
    margin-top: -5px;
    position: relative;
}
.quest-banner .info {
    font-weight: 400;
    font-size: 15px;
    color: #b3b6bd;
    position: relative;
}
.tasks.hasBanner {
    border-radius: 0 0 6px 6px;
}
.tasks {
    padding: 25px;
    border-radius: 6px;
    background: linear-gradient(90deg, #3e6387 40%, #5a5aa3 100% );
}
.task-nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}
.task-nav .breadcrumb {
    margin-bottom: 0!important;
}
.breadcrumb {
    display: flex;
    margin-bottom: 25px;
    font-size: 18px;
    line-height: 18px;
    font-weight: 400;
}
.breadcrumb .current, .breadcrumb .disabled {
    color: #828f9a;
}
.task-filter {
    display: flex;
}
.task-filter .btn.isActive {
    background: #ffffff;
    color: #000;
}
.task-filter .btn {
    display: flex;
    align-items: center;
    margin-right: 15px;
    border-radius: 100px;
}
.btn.btn-light {
    background: transparent;
    color: #6b768a;
    border: 1px solid hsla(0,0%,100%,.08);
    box-shadow: none;
}
.btn.isActive {
    cursor: default;
}
.btn {
    font-size: 13px;
    font-weight: 500;
    line-height: 18px;
    font-family: Open Sans,sans-serif;
    padding: 9px 20px;
    cursor: pointer;
    -webkit-transition: all .3s;
    transition: all .3s;
    text-decoration: none;
    color: #fff;
    border: 1px solid transparent;
    border-radius: 5px;
    outline: none;
    background: #4986f5;
    align-items: center;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
.withPager .list {
    position: relative;
}
.task-list {
    display: flex;
    flex-wrap: wrap;
    width: calc(100% + 30px);
    margin-left: -15px;
    margin-right: -15px;
}
._2eDwZ, .Ccruh {
    display: flex;
    flex-direction: column;
    width: 100%;
}
.Ccruh {
    position: relative;
    min-height: 100%;
}
.task-list .item, .task-list .item:first-child {
    margin-bottom: 30px;
}
.task-list .item {
    width: 33.33333%;
    padding: 0 15px;
}
.task-list .task-box:last-child {
    margin-bottom: 0;
}
.task-list .task-box {
    border-radius: 5px;
    background: #2e3542;
    width: 100%;
    align-items: center;
    position: relative;
}
.task-list .task-box-info {
    font-size: 13px;
    align-items: center;
    padding: 15px;
    position: relative;
}
.task-list .task-box-info:after, .task-list .task-box-info:before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 5px 5px 0 0;
}
.task-list .task-box-dd {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 8px;
    padding-bottom: 8px;
    border-bottom: 1px solid hsla(0,0%,100%,.06);
    position: relative;
    color: #9ca4b3;
    z-index: 3;
    text-transform: uppercase;
    font-size: 12px;
}
.task-list .task-box-dd span {
    font-weight: 400;
    display: inline-block;
    font-size: 14px;
    color: #fff;
    text-transform: none;
}
.color-blue {
    color: #4986f5!important;
}
.task-list .task-box-dd span {
    font-weight: 400;
    display: inline-block;
    font-size: 14px;
    color: #fff;
    text-transform: none;
}
.task-list .task-box-date, .task-list .task-box-vk {
    text-align: center;
    display: flex;
    align-items: center;
    padding: 15px;
    background: #353d4a;
    border-radius: 0 0 6px 6px;
    position: relative;
}
.task-list .task-box-date .timer, .task-list .task-box-vk .timer {
    font-weight: 400;
    color: #9ca4b3;
    text-align: left;
    font-size: 11px;
    position: relative;
    text-transform: uppercase;
}
.task-list .task-box-date .btn, .task-list .task-box-vk .btn {
    display: flex;
    margin-left: auto;
    height: 40px;
    min-width: 110px;
    border: 1px solid hsla(0,0%,100%,.09);
    color: #fff;
    font-weight: 400;
    position: relative;
    padding: 0;
    justify-content: center;
}
.task-filter .btn>svg {
    margin-right: 5px;
}
.task-list .empty-list {
    font-size: 19px;
    text-align: center;
    width: 100%;
    margin: 20px 0 5px;
    color: #7d8594;
}
</style>
<div class="section">
    <div class="_2JflO">
        <div class="quest-banner task">
            <div class="caption">
                <h1>Еженедельные задания</h1>
            </div>
            <div class="info">Принимайте участие в еженедельных заданиях и выигрывайте денежные призы</div>
        </div>
        <div class="tasks hasBanner">
            <div class="task-nav">
                <div class="breadcrumb"><span class="current">Задания</span></div>
                <div class="task-filter">
                    <a href="/tasks" type="button" class="btn btn-light isActive">
                        <svg class="icon icon-tasks"  viewBox="0 0 32 32">
                        <path d="M26.072 2.274h-1.271V.727a.727.727 0 00-1.454 0v1.554H8.68V.727a.726.726 0 10-1.452 0v1.554H5.993a3.634 3.634 0 00-3.632 3.632v22.455A3.634 3.634 0 005.993 32h20.072a3.634 3.634 0 003.632-3.632V5.906a3.632 3.632 0 00-3.625-3.632zM12.604 23.711l-3.189 3.051a.7.7 0 01-.495.203h-.007a.743.743 0 01-.516-.211l-1.736-1.736a.724.724 0 111.024-1.024l1.235 1.235 2.68-2.557a.721.721 0 011.024.021.715.715 0 01-.021 1.017zm0-7.264l-3.189 3.051a.7.7 0 01-.495.203h-.007a.746.746 0 01-.516-.21l-1.736-1.736a.724.724 0 111.024-1.024l1.235 1.235 2.68-2.557a.721.721 0 011.024.021.712.712 0 01-.021 1.017zm0-7.265l-3.189 3.051a.7.7 0 01-.495.203h-.007a.746.746 0 01-.516-.21l-1.736-1.737a.724.724 0 111.024-1.024L8.92 10.7l2.68-2.557a.721.721 0 011.024.021.712.712 0 01-.021 1.017zM24.895 25.44h-8.354a.726.726 0 110-1.452h8.354a.727.727 0 010 1.454zm0-7.264h-8.354a.727.727 0 010-1.454h8.354a.727.727 0 010 1.454zm0-7.265h-8.354a.727.727 0 010-1.454h8.354a.727.727 0 010 1.454z"></path>

                        </svg>
                        Задания
                    </a>
                    <a type="button" href="/tasks/myhistory"  class="btn btn-light">
                        <svg class="icon icon-bets" viewBox="0 0 32 32">
                            <path d="M24.666.594H7.335A6.74 6.74 0 00.598 7.335v17.334a6.741 6.741 0 006.737 6.738h17.331a6.741 6.741 0 006.738-6.737V7.335A6.74 6.74 0 0024.667.598zM9.259 24.666a1.927 1.927 0 010-3.854 1.927 1.927 0 010 3.854zM7.334 16a1.927 1.927 0 013.854 0 1.927 1.927 0 01-3.854 0zm1.925-4.812a1.927 1.927 0 010-3.854 1.927 1.927 0 010 3.854zm3.854 12.515v-1.925h11.553v1.925H13.113zm11.553-6.741H13.113v-1.925h11.553v1.925zm-11.553-6.74V8.297h11.553v1.925H13.113z"></path>
                        </svg>
                        Ваша история
                    </a>
                </div>
            </div>
            <div class="withPager">
                <div class="list">
                    <div class="task-list">
                        @forelse($tasks as $task)
                        <div class="item">
                            <div class="task-box">
                                <div class="task-box-info game-challenge">
                                    <div class="task-box-dd">Челлендж <span class="name">{{ $namesOfTasks[$task->challengeId] }}</span></div>
                                    <div class="task-box-dd">Цель <span class="color-blue">Рейтинг</span></div>
                                    <div class="task-box-dd">
                                        Призовой фонд 
                                        <span class="color-warning">
                                            <div class="bet-number">
                                                <span class="bet-wrap">
                                                    <span>{{ number_format($task->bank, 2, '.', '') }}</span>
                                                    <svg class="icon icon-coin">
                                                        <use xlink:href="#icon-coin"></use>
                                                    </svg>
                                                </span>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                                <div class="task-box-date">
                                    <div class="timer"> Участвуют <span>{{ $task->count }} игроков</span> </div>
                                    <a href="/tasks/{{$task->id}}" class="btn btn-light" >Участвовать</a > 
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="empty-list">В данный момент нет активных заданий, но они появятся позже</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
