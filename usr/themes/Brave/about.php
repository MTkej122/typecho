<?php
/**
 * 关于我们
 * @package custom
 * Author: ace
 * CreateTime: 2022/02/10
 * about-us page
 */
    
$date_a = date('Y年m月d日');   
$date_1 = date('Y-m-d');
$date_2= '2017-02-14';
$date1_arr = explode("-",$date_1);
$date2_arr = explode("-",$date_2);
$day1 = mktime(0,0,0,$date1_arr[1],$date1_arr[2],$date1_arr[0]);
$day2 = mktime(0,0,0,$date2_arr[1],$date2_arr[2],$date2_arr[0]);
$days = round(($day1 - $day2)/3600/24);

            
            
            
$this->need('base/head.php');
$this->need('base/nav.php');?>
    
<div class="list-content mx-auto mt-5">
    <div class="list-top">
<h5 class="list-text">💕关于我们💕</h5>
    </div>
</div>

<div class="botui-app-container" id="botui" style="min-height:500px; padding:14px 6px 4px 6px; background-image:url(http://cdn.txykoke.cn/love/images/b015b4d2.jpg); border-radius: 10px;">
    <h6 class="list-text" style="color:#F2F2F2;"><strong>Hi，欢迎来到这里😄</strong></h6>
    <bot-ui style="background:transparent;">
       <center>
         <div id="code" style="color:#F2F2F2;">
            
<p>本站是koke送给hyn的礼物🎁</p>

<p>记录他们的生活点滴🍵</p>
   
<p>koke和hyn是怎么认识的？🌅</p>
   
<p>两人相识于2014年💡</p>

<p>在大二寒假那年⛷</p>
  
<p>koke和hyn一起出去玩耍！！👣</p>

<p>慢慢的发展他们就产生了那种好感🤩</p>
   
<p>后来koke就向hyn表白了✉</p>

<p>他们开始了异地恋💕/p> 

<p>毕业后，她随他一起来到了上海🚄</p>
  
<p>今天是<?php echo $date_a; ?>，他们已经在一起<?php echo $days; ?>天了！🍀</p>
   
<p>写于2022年8月6日 10:42:30 未完···💬</p>

<p>介绍完了，还不赶紧去小站其他地方转转，顺手在祝福板留下评论的足迹吧👈</p>

<p>感谢访问小站👀</p>
         </div>
       </center>
    <bot-ui>
</div>
<body>
    
    <script>
        Element.prototype.typewriter = function (a) {
            var d = this,
                c = d.innerHTML,
                b = 0;
            d.innerHTML = "";
            var e = setInterval(function () {
                b++
                d.innerHTML = c.substring(0, b) + (b & 1 ? "|" : ""); //&1 这个表达式 可以用来 判断 a的奇偶性
                if (b >= c.length) {
                    clearInterval(e)
                }
            }, 150)
            return this
    
        }
        document.getElementById("code").typewriter();
    </script>
</body>

    

<?php $this->need('base/footer.php'); ?>