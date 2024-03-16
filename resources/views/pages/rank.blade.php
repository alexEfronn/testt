@extends('layout')

@section('content')
<div class="cont-a">
    <div class="ranks">
        <h1 class="window-heading">
            Ранги
        </h1>
        <div class="window-body">
            <div class="subheading" style="margin-bottom: 0; margin-top: 5px;">
                <h3 style="margin-bottom: 10px;">Таблица рангов</h3>
                <hr size="1" style="margin-top: 5px;" color="#353535">
            </div>
            <div class="payHistory ranks-table">
                <table class="games-table games-table__ranks" style="display: table;">
                    <thead>
                        <tr class="games-table__header-tr">
                            <th class="games-table__header-th">Ранг</th>
                            <th class="games-table__header-th">Ставок</th>
                            <th class="games-table__header-th">Депозитов</th>
                            <th class="games-table__header-th">Награда</th>
                            <th class="games-table__header-th">Ежед. бонус</th>
                        </tr>
                    </thead>
                    <tbody>
                                                <tr class="games-table__body-tr ">
                            <td class="rank-name games-table__body-td">
                                <div>
                                    <img class="rank-icon" title="Новичок" width="25" height="25" src="img/rank/0.svg" alt=""> 
                                    Новичок
                                </div>
                            </td>
                            <td class="games-table__body-td">
                                <div>
                                                                            0
                                                                       <span class="myicon-coins"></span>
                                </div>
                            </td>
                            <td class="games-table__body-td"><div>
                                                                    0
                                                                <span class="myicon-coins"></span></div></td>
                            <td class="games-table__body-td"><div>
                                                                    0
                                 <span class="myicon-coins"></span></div></td>
                            <td class="games-table__body-td"><div>10-90 <span class="myicon-coins"></span></div></td>
													
                        </tr>

                                                <tr class="games-table__body-tr not-reached">
                            <td class="rank-name games-table__body-td">
                                <div>
                                    <img class="rank-icon" title="Начинающий" width="25" height="25" src="img/rank/1.svg" alt=""> 
                                    Начинающий
                                </div>
                            </td>
                            <td class="games-table__body-td">
                                <div>
                                                                            2k
                                                                       <span class="myicon-coins"></span>
                                </div>
                            </td>
                            <td class="games-table__body-td"><div>
                                                                    50
                                                                <span class="myicon-coins"></span></div></td>
                            <td class="games-table__body-td"><div>
                                                                    30
                                 <span class="myicon-coins"></span></div></td>
                            <td class="games-table__body-td"><div>20-100 <span class="myicon-coins"></span></div></td>
                        </tr>
                                                <tr class="games-table__body-tr not-reached">
                            <td class="rank-name games-table__body-td">
                                <div>
                                    <img class="rank-icon" title="Любитель" width="25" height="25" src="img/rank/2.svg" alt=""> 
                                    Любитель
                                </div>
                            </td>
                            <td class="games-table__body-td">
                                <div>
                                                                            5k
                                                                       <span class="myicon-coins"></span>
                                </div>
                            </td>
                            <td class="games-table__body-td"><div>
                                                                    500
                                                                <span class="myicon-coins"></span></div></td>
                            <td class="games-table__body-td"><div>
                                                                    40
                                 <span class="myicon-coins"></span></div></td>
                            <td class="games-table__body-td"><div>30-110 <span class="myicon-coins"></span></div></td>
                        </tr>
                                                <tr class="games-table__body-tr not-reached">
                            <td class="rank-name games-table__body-td">
                                <div>
                                    <img class="rank-icon" title="Азартный" width="25" height="25"  src="img/rank/3.svg" alt=""> 
                                    Азартный
                                </div>
                            </td>
                            <td class="games-table__body-td">
                                <div>
                                                                            10k
                                                                       <span class="myicon-coins"></span>
                                </div>
                            </td>
                            <td class="games-table__body-td"><div>
                                                                    1k
                                                                <span class="myicon-coins"></span></div></td>
                            <td class="games-table__body-td"><div>
                                                                    50
                                 <span class="myicon-coins"></span></div></td>
                            <td class="games-table__body-td"><div>40-120 <span class="myicon-coins"></span></div></td>
                        </tr>
                                                <tr class="games-table__body-tr not-reached">
                            <td class="rank-name games-table__body-td">
                                <div>
                                    <img class="rank-icon" title="Профи" width="25" height="25" src="img/rank/4.svg" alt=""> 
                                    Профи
                                </div>
                            </td>
                            <td class="games-table__body-td">
                                <div>
                                                                            20k
                                                                       <span class="myicon-coins"></span>
                                </div>
                            </td>
                            <td class="games-table__body-td"><div>
                                                                    2k
                                                                <span class="myicon-coins"></span></div></td>
                            <td class="games-table__body-td"><div>
                                                                    100
                                 <span class="myicon-coins"></span></div></td>
                            <td class="games-table__body-td"><div>50-130 <span class="myicon-coins"></span></div></td>
                        </tr>
                                                <tr class="games-table__body-tr not-reached">
                            <td class="rank-name games-table__body-td">
                                <div>
                                    <img class="rank-icon" title="Акула" width="25" height="25" src="img/rank/5.svg" alt=""> 
                                    Акула
                                </div>
                            </td>
                            <td class="games-table__body-td">
                                <div>
                                                                            50k
                                                                       <span class="myicon-coins"></span>
                                </div>
                            </td>
                            <td class="games-table__body-td"><div>
                                                                    5k
                                                                <span class="myicon-coins"></span></div></td>
                            <td class="games-table__body-td"><div>
                                                                    150
                                 <span class="myicon-coins"></span></div></td>
                            <td class="games-table__body-td"><div>60-140 <span class="myicon-coins"></span></div></td>
                        </tr>
                                                <tr class="games-table__body-tr not-reached">
                            <td class="rank-name games-table__body-td">
                                <div>
                                    <img class="rank-icon" title="Мастер" width="25" height="25" src="img/rank/6.svg" alt=""> 
                                    Мастер
                                </div>
                            </td>
                            <td class="games-table__body-td">
                                <div>
                                                                            100k
                                                                       <span class="myicon-coins"></span>
                                </div>
                            </td>
                            <td class="games-table__body-td"><div>
                                                                    10k
                                                                <span class="myicon-coins"></span></div></td>
                            <td class="games-table__body-td"><div>
                                                                    300
                                 <span class="myicon-coins"></span></div></td>
                            <td class="games-table__body-td"><div>70-150 <span class="myicon-coins"></span></div></td>
                        </tr>
                                                <tr class="games-table__body-tr not-reached">
                            <td class="rank-name games-table__body-td">
                                <div>
                                    <img class="rank-icon" title="Гроссмейстер" width="25" height="25" src="img/rank/7.svg" alt=""> 
                                    Гроссмейстер
                                </div>
                            </td>
                            <td class="games-table__body-td">
                                <div>
                                                                            250k
                                                                       <span class="myicon-coins"></span>
                                </div>
                            </td>
                            <td class="games-table__body-td"><div>
                                                                    25k
                                                                <span class="myicon-coins"></span></div></td>
                            <td class="games-table__body-td"><div>
                                                                    500
                                 <span class="myicon-coins"></span></div></td>
                            <td class="games-table__body-td"><div>80-160 <span class="myicon-coins"></span></div></td>
                        </tr>
                                                <tr class="games-table__body-tr not-reached">
                            <td class="rank-name games-table__body-td">
                                <div>
                                    <img class="rank-icon" title="Cash Machine" width="25" height="25"  src="img/rank/8.svg" alt=""> 
                                    Cash Machine
                                </div>
                            </td>
                            <td class="games-table__body-td">
                                <div>
                                                                            750k
                                                                       <span class="myicon-coins"></span>
                                </div>
                            </td>
                            <td class="games-table__body-td"><div>
                                                                    75k
                                                                <span class="myicon-coins"></span></div></td>
                            <td class="games-table__body-td"><div>
                                                                    1k
                                 <span class="myicon-coins"></span></div></td>
                            <td class="games-table__body-td"><div>90-170 <span class="myicon-coins"></span></div></td>
                        </tr>
                                                <tr class="games-table__body-tr not-reached">
                            <td class="rank-name games-table__body-td">
                                <div>
                                    <img class="rank-icon" title="Morgenstern" width="25" height="25" src="img/rank/9.svg" alt=""> 
                                    Morgenstern
                                </div>
                            </td>
                            <td class="games-table__body-td">
                                <div>
                                                                            1500k
                                                                       <span class="myicon-coins"></span>
                                </div>
                            </td>
                            <td class="games-table__body-td"><div>
                                                                    150k
                                                                <span class="myicon-coins"></span></div></td>
                            <td class="games-table__body-td"><div>
                                                                    2k
                                 <span class="myicon-coins"></span></div></td>
                            <td class="games-table__body-td"><div>100-180 <span class="myicon-coins"></span></div></td>
                        </tr>
                            
                    </tbody>
                </table>
            </div>
<br> 
            <div class="ranks-description">
                <div class="subheading">
                    <h2>Что такое ранги?</h2>
                    <hr size="1" style="margin-top: 5px; margin-bottom: 10px;" color="#353535">
                </div>
            
                <ol class="decimal-list">
                    <li>Ранг - это уровень, для достижения которого необходимо выполнить определенные требования</li>
<br>
                    <li>Для получения ранга необходимо сделать ставок и депозитов на определенную сумму</li>
<br>
                </ol>
                <div class="subheading">
                    <h2>Что это дает?</h2>
                    <hr size="1" style="margin-top: 5px; margin-bottom: 10px;" color="#353535">
                </div>
            
                <ol class="decimal-list">
                    <li>Новый ранг увеличивает размер ежедневного бонуса (см. таблицу выше)</li>
<br>
                    <li>За получение нового ранга выдается разовый бонус (см. таблицу выше)</li>
<br>
                    <li>В дальнейшем будут введены дополнительные вознаграждения</li>
                </ol>

                
            </div>
        </div>
		
    </div>
    
</div>
    </div>
  </div>
  @endsection