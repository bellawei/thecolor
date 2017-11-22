<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>颜色敏锐度测试</title>
    <link rel="stylesheet" href="css/thecolor.css"/>
    <style>
  .wrap{
    text-align: center;
    width: 500px;
    height: 300px;
    position: absolute;
    top: 150px;
    left: 50%;
    margin-left: -250px;
}
    </style>
</head>
<body>
<div class="bigbox"></div>
<div class="score"></div>
<div class="timer">剩余
    <span></span>秒
</div>
<div class="mask">
    <div class="wrap">
        <form action="php/save.php" method="post">
            <div class="result"> 得分<i></i></div>
            <span>游戏结束,获得称号<i class="xxx"></i></span><br>
            

            <input name="username" type="text" id='name' required placeholder="大侠,留个名呗~"><br> 
            <input type="text" class="sc" hidden name="score" >
            <input type="text" class="title" hidden name="title" >
            
            <input type="submit" class="ranking" value="查看排名"><br>
            
        </form>
        <input type="submit" class="restart" value="不服再战!">
        
    </div>
</div>

<script src="jquery/jquery-1.12.4.min.js"></script>

<script>
    /*
     1.bigbox颜色有一块是不同的     点击不同的那个切换 随机生成下一组颜色
     2.timer 倒计时30秒   时间为0的时候游戏结束
     3. 显示得分  
     4. 输入用户名
     5. 显示排名
     * */

    $(function () {
    


        //-----------------------------------创建方块-------------------------------
        var i = 2;
        var score=0;
        var color1=null;
        var color2=null;

        Render();
        Timing();

        function Render () {
            var width = ($('.bigbox')[0].offsetWidth - i * 2) / i;
            var height = ($('.bigbox')[0].offsetHeight - i * 2) / i;

            var r=Math.ceil(Math.random()*255);
            var g=Math.ceil(Math.random()*255);
            var b=Math.ceil(Math.random()*255);
            color1='rgb('+r+','+g+','+b+')';
            color2='rgb('+(r-12)+','+(g-18)+','+(b-20)+')';
            color3='rgb('+(r-10)+','+(g-8)+','+(b-10)+')';
            color4='rgb('+(r-10)+','+(g-5)+','+(b-8)+')';
            

            var randomNumber=Math.floor(Math.random()*i*i);

            $('.bigbox')[0].innerHTML = "";

            for (var j = 0; j < i * i; j++) {       //总共需要创建的小方块数量

                var $smallCell= $('<div></div>').appendTo('.bigbox')
                $smallCell.addClass( "smallCell").css({
                    'width': width,
                    'height': height,
                });

                if(j==randomNumber){
                    $('.smallCell').eq(j).css('background', color2).addClass('btn');
                    $('.btn').click(Render);        //----------------点击变换颜色---------------
                    $('.score').html(score);           // 页面显示得分
                    $('.result i').html(score);        //遮罩层显示得分
                    $('.sc').val(score);            //--------------将得分提交给input,以便传值------
                    score++;
                    if(score>=15){        //减小颜色差异
                        $('.smallCell').eq(j).css('background', color3).addClass('btn');
                    }else if(score>=25){
                        $('.smallCell').eq(j).css('background', color4).addClass('btn');
                    }

                }else{
                    $('.smallCell').eq(j).css('background', color1)
                }
            }
            i++;
            if (i >= 10) {
                i = 10
            }

//----------------------------------点击重新开始游戏----------------------------
        $('.restart').click(function() {
           i = 2;
           score = 0;
            Render();
            Timing();
            $('.mask').css('display', 'none');

        });
 //--------------------------根据得分判断等级----------------------
if(score>=38){
    $('.mask span i').html("色魔");
    $('.title').val("色魔");       //----传值给php-----
}else if(score>=28){
    $('.mask span i').html("色鬼");
    $('.title').val("色鬼");
}else if(score>=20){
    $('.mask span i').html("色狼");
    $('.title').val("色狼");
}else{
    $('.mask span i').html("色盲");
    $('.title').val("色盲");
}


}


//---------------------------------设置计时器------------------------
function Timing(){
var seconds=45;
$('.timer span').html(seconds);

var timerID=setInterval(function(){
   seconds--;
   $('.timer span').html(seconds);
   if(seconds==0){
       clearInterval(timerID);
       $('.mask').css('display','block');
   }
},1000)
}
        });
</script>
</body>
</html>