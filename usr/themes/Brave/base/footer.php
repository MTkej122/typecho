</div>
<div class="p-5 text-center ">
	<h6>©<?php $this->options->title() ?></h6>
	<p class="h6"> Powered by <a href="http://typecho.org" target="_blank">Typecho</a> ※ Theme is <a href="#"arget="_blank">Brave</a></p>
</div>
<script src="https://lf26-cdn-tos.bytecdntp.com/cdn/expire-1-M/nprogress/0.2.0/nprogress.min.js" type="application/javascript"></script>
<script>
	window.showSiteRuntime = function() {
        var site_runtime = $("#site_runtime");
		if (!site_runtime) return;
		window.setTimeout("showSiteRuntime()", 1000);
		start = new Date("<?php $this->options->lovetime(); ?>");
		now = new Date();
		T = (now.getTime() - start.getTime());
		i = 24 * 60 * 60 * 1000;
		d = T / i;
		D = Math.floor(d);
		h = (d - D) * 24;
		H = Math.floor(h);
		m = (h - H) * 60;
		M = Math.floor(m);
		s = (m - M) * 60
		S = Math.floor(s);
		site_runtime.html("第 <span class=\"bigfontNum\">" + D + "</span> 天 <span class=\"bigfontNum\">" + H + "</span> 小时 <span class=\"bigfontNum\">" + M + "</span> 分钟 <span class=\"bigfontNum\">" + S + "</span> 秒");
	};
	showSiteRuntime();

   
</script>
<script src="<?php $this->options->themeUrl('/base/main.js'); ?>"></script>
<?php $this->footer(); ?>
<?php $this->options->底部自定义(); ?>

<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aplayer/dist/APlayer.min.css">
<script src="https://cdn.jsdelivr.net/npm/aplayer/dist/APlayer.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/meting@2/dist/Meting.min.js"></script>
<meting-js
 server="netease"
 type="playlist"
 id="7573695060"
 fixed="true"
 autoplay="true"
 loop="all"
 lrc-type="0"
 >
-->
<!--鼠标点击特效-->
<script type="text/javascript">
jQuery(function () {
        $("html").click(function(e) {
            var a_idx = Math.floor((Math.random() * 29));/*鼠标点击随机出现一句话，代码数字请与添加的短句数量相一致*/
            var a = new Array(
                "希望全世界停电 我可以偷偷跑去亲你", "我会爱你很久很久","我在贩卖日落 你像神明一样将阳光撒向我","陪伴本身就是这个世界上最了不起的安慰方式", "嘿，我是一朵云ლ(⁰⊖⁰ლ)", "❤"
                   ,"陪你把岁月熬成清酒 陪你把孤夜熬成温柔","❤","月光下邂逅的是爱情和你","祝眉目舒展 顺问冬按","只想拥你入怀","这个世界乱糟糟的 而你干干净净","日月星辰之外 你是第四种难得","我会在每个有意义的时刻 远隔山海与你共存","山脚下遇见的你 我们山顶见","想试试在你迎面跑来一把抱住你的感觉","在生命里的旅程里 遇见你真好","如果不曾遇见 岂知生命如何","❤"
                   ,"想和你一起走过下雪后的天","在我贫瘠的土地上你是最后的玫瑰","今晚月色很美呢","天青色等烟雨 而我在等你","你是我这一生等了半世未拆的礼物","你养我 我养你 两人爱情甜蜜蜜","人的一生会遇见两个人 一个惊艳了时光 一个温柔了岁月","你不用多好，我喜欢就好","愿有岁月可回首 且以深情共白头"
                 );/*请在此添加句子*/
            var color1 = Math.floor((Math.random() * 255))
            var color2 = Math.floor((Math.random() * 255));
            var color3 = Math.floor((Math.random() * 255));

            var $i = $("<span />").text(a[a_idx]);
            var x = e.pageX,
                y = e.pageY;
            $i.css({
                "z-index": 9999999999999 ,
                "top": y - 20,
                "left": x,
                "position": "absolute",
                "font-family":"mmm",
                "fontSize":Math.floor((Math.random() * 5)+10),/*文字大小在10px到15px之间*/
                "font-weight": "bold",
                "color": "rgb("+color1+","+color2+","+color3+")",/*随机颜色*/
                "-webkit-user-select":"none",
                "-moz-user-select":"none",
                "-ms-user-select":"none",
                "user-select":"none",
            });
            $("body").append($i);
            $i.animate({
                    "top": y - 200,
                    "opacity": 0
                },
                3000,/*句子悬浮时间*/
                function() {
                    $i.remove();
                });
        });
    });
</script>

</body>
<?php

class class_guest_info{

function GetLang() {

$Lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 4);

//使用substr()截取字符串，从 0 位开始，截取4个字符

if (preg_match('/zh-c/i',$Lang)) {

//preg_match()正则表达式匹配函数

$Lang = '简体中文';

}

elseif (preg_match('/zh/i',$Lang)) {

$Lang = '繁體中文';

}

else {

$Lang = 'English';

}

return $Lang;

}




 function getIpAddress($ip = '')
    {
        if(empty($ip)){
            $ip = $_REQUEST['ip'];
            if(empty($ip)) die('106.12.117.232'); // 根据实际调用方式去返回数据
        }
        $ch = curl_init();
        $url = 'https://whois.pconline.com.cn/ipJson.jsp?ip=' . $ip;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $data = curl_exec($ch);
        curl_close($ch);
        $data = mb_convert_encoding($data, 'utf-8', 'GB2312'); // 转换编码
        // 截取{}中的字符串
        $data = substr($data, strlen('({') + strpos($data, '({'), (strlen($data) - strpos($data, '})')) * (-1));
        // 将截取的字符串$data中的‘，’替换成‘&’   将字符串中的‘：‘替换成‘=’
        $data = str_replace('"', "", str_replace(":", "=", str_replace(",", "&", $data)));
        parse_str($data, $addressInfo); // 将字符串转换成数组格式
        return $addressInfo['addr']; // 返回ip归属地
    }


function GetBrowser() {

$Browser = $_SERVER['HTTP_USER_AGENT'];

if (preg_match('/MSIE/i',$Browser)) {

$Browser = 'MSIE';

}

elseif (preg_match('/Firefox/i',$Browser)) {

$Browser = '火狐';

}

elseif (preg_match('/Chrome/i',$Browser)) {

$Browser = 'Chrome';

}

elseif (preg_match('/Safari/i',$Browser)) {

$Browser = 'Safari';

}

elseif (preg_match('/Opera/i',$Browser)) {

$Browser = 'Opera';

}

else {

$Browser = 'Other';

}

return $Browser;

}

function GetOS() {

$OS = $_SERVER['HTTP_USER_AGENT'];

if (preg_match('/win/i',$OS)) {

$OS = 'Windows电脑';

}

elseif (preg_match('/mac/i',$OS)) {

$OS = '苹果电脑';

}

elseif (preg_match('/linux/i',$OS)) {

$OS = '安卓/Linux';

}

elseif (preg_match('/unix/i',$OS)) {

$OS = 'Unix';

}

elseif (preg_match('/bsd/i',$OS)) {

$OS = 'BSD';

}

else {

$OS = 'Other';

}

return $OS;

}



}
/**

* $obj = new class_guest_info;

* $obj->GetLang(); //获取访客语言：简体中文、繁體中文、English。

* $obj->GetBrowser(); //获取访客浏览器：MSIE、Firefox、Chrome、Safari、Opera、Other。

* $obj->GetOS(); //获取访客操作系统：Windows、MAC、Linux、Unix、BSD、Other。

* $obj->GetIP(); //获取访客IP地址。

* $obj->GetAdd(); //获取访客地理位置，使用 Baidu 隐藏接口。

* $obj->GetIsp(); //获取访客ISP，使用 Baidu 隐藏接口。

*/
$obj = new class_guest_info;

$ipd = $_SERVER["REMOTE_ADDR"];


$time=date('Y-m-d H:i:s',time());
$content = "\r\n"."IP地址:".$ipd."  地区:". $obj->getIpAddress($ipd)."  访问时间:".$time."  语言:".$obj->GetLang()."  浏览器:".$obj->GetBrowser()."  设备:".$obj->GetOS();

//定义文件存放的位置
$compile_dir = "./log.txt";
//下面就是写入的PHP代码了
$file = fopen($compile_dir,"a+");
fwrite($file,$content);
fclose($file);


?>
</html>