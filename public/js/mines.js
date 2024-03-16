function startgame(){
  var bet = $("#amountBetInputBomb").val();
  var mine = "mine";
  $.ajax({
    url: '/api/mines/bet',
    type: "POST",
    dataType: "html",
    data: {
      type: mine,
      mines: $('.mineSelected').attr('data-mineamount'),
      bet: bet,
    },
    success: function(response){
      obj = $.parseJSON(response);
      if(obj.info == "warning"){
      
       noty({
    text: obj.warning,
    type: 'error',
    layout: 'bottomLeft',
    timeout: 4000,
    progressBar: true,
    animation   : {
      open : 'animated fadeInLeft',
      close: 'animated fadeOutLeft'
    }
  });

    }else{
      if(obj.info == "true"){
      	$('.finish-game-btn').show();
      	$('.start-game-btn').hide();
        $(".win").css("color","green").text("0");
        $(".allin-win").css("visibility","visible");

        for(i=0;i<26;i++){
        $(".mine[data-number="+i+"]").removeClass("win-mine").removeAttr("disabled","disabled").text("");
        $(".mine[data-number="+i+"]").removeClass("lose-mine fas fa-bomb").removeAttr("disabled","disabled").text("");
        }
        $(".take").removeAttr("disabled","disabled");
        $(".start-game-btn").attr("disabled","disabled");
        $(".finish-game-btn").removeAttr("disabled","disabled");
        noty({
    text: 'Игра началась, приятной игры!',
    type: 'success',
    layout: 'bottomLeft',
    timeout: 4000,
    progressBar: true,
    animation   : {
      open : 'animated fadeInLeft',
      close: 'animated fadeOutLeft'
    }
  });
       
        $(".balanceBox").text(obj.money);
        $(".mine-circle").attr("disabled","disabled");

      }
      if(obj.info == "false"){
      	        noty({
    text: 'У вас есть активная игра!',
    type: 'warning',
    layout: 'bottomLeft',
    timeout: 4000,
    progressBar: true,
    animation   : {
      open : 'animated fadeInLeft',
      close: 'animated fadeOutLeft'
    }
  });
       

      }
}
    }
  });
};
var lastClick;
function checkClick(timeclick)
{var timeStamp = 0;
  if ( !lastClick || lastClick && timeStamp - lastClick > timeclick ) {
    lastClick = timeStamp;
    return true;
  }
  else
  {
    return false;
  }
}
$( document ).ready(function() {
	$( ".circle" ).click(function mineSelection()
{
  $('.circle').removeClass('mineSelected');
  $(this).addClass('mineSelected');
  if($(this).attr('data-mineamount') == 2)
  {
    $('#nextRewardBoxBomb').html(1.03);
    $('#winSummaBoxBomb').html(($('#amountBetInputBomb').val()*1.03).toFixed(2));
  }
  if($(this).attr('data-mineamount') == 3)
  {
    $('#nextRewardBoxBomb').html(1.07);
    $('#winSummaBoxBomb').html(($('#amountBetInputBomb').val()*1.07).toFixed(2));
  }
  if($(this).attr('data-mineamount') == 5)
  {
    $('#nextRewardBoxBomb').html(1.18);
    $('#winSummaBoxBomb').html(($('#amountBetInputBomb').val()*1.18).toFixed(2));
  }
  if($(this).attr('data-mineamount') == 24)
  {
    $('#nextRewardBoxBomb').html(24);
    $('#winSummaBoxBomb').html(($('#amountBetInputBomb').val()*24).toFixed(2));
  }
});
var click = checkClick(300);
if(click){
$(".mine").click(
  function minclick(){
  var pressmine = $(this).attr("data-number");
  $.ajax({
   url: '/api/mines/mine',
   type: "POST",
   dataType: "html",
   data: {
     mmine: pressmine,
   },
   success: function(response){ //response
     obj = $.parseJSON(response); //response
     if(obj.info == "warning"){
           noty({
    text: obj.warning,
    type: 'error',
    layout: 'bottomLeft',
    timeout: 4000,
    progressBar: true,
    animation   : {
      open : 'animated fadeInLeft',
      close: 'animated fadeOutLeft'
    }
  });
  }
    if(obj.info == "click"){
      if(obj.bombs == "true"){
      	 $('.start-game-btn').show();
        $('.finish-game-btn').hide();
           $(".mine[data-number="+obj.pressmine+"]").addClass("lose-mine fas fa-bomb");
           $('#historyGameContentBombGame').html("Поле "+obj.pressmine+" оказалось с миной");
           $(".finish-game-btn").attr("disabled","disabled");
           $(".start-game-btn").removeAttr("disabled","disabled");
           $(".mine-circle").removeAttr("disabled","disabled");
           $(".win").css("color","red").text("0");
           $("#nextRewardBoxBomb").text("1.03");
           obj.tamines = $.parseJSON(obj.tamines);
           for(i = 0; i < obj.tamines.length; i++){
           $(".mine[data-number="+obj.tamines[i]+"]").addClass('lose-mine fas fa-bomb');
          };
           for(i=0;i<26;i++){
             $(".mine[data-number="+i+"]").attr("disabled","disabled");
           };
           $("#bombHistoryContent").prepend(obj.resultHistoryContentBomb);
           }else{
           $(".mine[data-number="+obj.pressmine+"]").text("+"+obj.win).addClass("win-mine");
           $("#winSummaBoxBomb").text(obj.win);
           $(".mine[data-number="+obj.pressmine+"]").attr("disabled","disabled");
           $("#historyGameContentBombGame").text("Поле " +pressmine+" оказалось призовым");
           $("#nextRewardBoxBomb").text(obj.nextX);
           //прокрутка истории действий
         }
   }
 }
 })
  }
);
}else{
  nortification("Не спеши!","bad");
};
});
function finishgame(){
  $.ajax({
    url: '/api/mines/finish',
    type: "POST",
    dataType: "html",
    data: {
      finish: true,
    },
    success: function(response){
     obj = $.parseJSON(response);
     if(obj.info == "warning"){
     	noty({
    text: obj.warning,
    type: 'error',
    layout: 'bottomLeft',
    timeout: 4000,
    progressBar: true,
    animation   : {
      open : 'animated fadeInLeft',
      close: 'animated fadeOutLeft'
    }
  });
      

   }else{
     obj.tamines = $.parseJSON(obj.tamines);
     if (obj.info = true){
     	     	noty({
    text: 'Поздравляем, вы выиграли '+obj.win+' coin',
    type: 'success',
    layout: 'bottomLeft',
    timeout: 4000,
    progressBar: true,
    animation   : {
      open : 'animated fadeInLeft',
      close: 'animated fadeOutLeft'
    }
  });
       
        $('.start-game-btn').show();
        $('.finish-game-btn').hide();
       $(".balanceBox").text(obj.money);
       $(".start-game-btn").removeAttr("disabled","disabled");
       $(".finish-game-btn").attr("disabled","disabled");
       $("#historyGameContentBombGame").text("Нажмите 'играть' чтобы начать игру");
       $("#bombHistoryContent").prepend(obj.resultHistoryContentBomb);
       
       for(i=0;i<26;i++){
         $(".mine[data-number="+i+"]").attr("disabled","disabled");
       }
      for(i = 0; i < obj.tamines.length; i++){
      $(".mine[data-number="+obj.tamines[i]+"]").addClass('lose-mine fas fa-bomb');
      }
      }
}

   },
  })
};