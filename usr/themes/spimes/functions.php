<?php

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
require_once("core/theme.php");
require_once("core/oin.php");
require_once("libs/member.php");
require_once("libs/writepost.php");
function themeConfig($form)
{
    $Version =themeVersion();
    $index = Helper::options()->siteUrl;
?>  
    <link rel="stylesheet" href="/usr/themes/spimes/assets/css/setting.spimes.css">
    <script src="//cdn.staticfile.org/jquery/3.4.1/jquery.min.js"></script>
    <script src="/usr/themes/spimes/assets/css/setjs.js"></script>
    <script src="/usr/themes/spimes/assets/css/jscolor.js"></script>
    <div class="j-setting-contain">
        <link href="<?php echo THEME_URL ?>/core/j.setting.min.css" rel="stylesheet" type="text/css" />
        <div>
            <div class="j-aside">
                <div class="logo">设置面板</div>
                <ul class="j-setting-tab">
                    <li data-current="j-setting-notice">最新公告 Noti</li>
                    <li data-current="j-setting-global">常规设置 Set</li>
                    <li data-current="j-setting-index">首页设置 Index</li>
                    <li data-current="j-setting-user">会员中心 User</li>
                    <li data-current="j-setting-ads">广告设置 Ad</li>
                    <li data-current="j-setting-color">风格样式 Style</li>
                    <li data-current="j-setting-aside">边栏页脚 Side</li>
                    <li data-current="j-setting-mox">移动设置 Mox</li>
                    <li data-current="j-setting-seo">SEO设置 Seo</li>
                    <li data-current="j-setting-speed">优化加速 Speed</li>
                </ul>
                <?php require_once("core/backup.php"); ?>
            </div>
        </div>
        <span id="j-version" style="display: none;"><?php echo $Version ?></span>
    <div class="j-setting-notice">
    <!--公告-->  
    <div class="miracles-pannel pannel_clo">
    <span class="spimes_logo" href="javascript:;"></span>
	<h1>Spimes x<?php echo $Version ?> 设置面板</h1>
	<p>Spimes主题为博客、自媒体、资讯类的网站设计开发，自适应兼容手机、平板设备的团队，工作室门户主题，精心打磨的一处处细节。只为让您的站点拥有速度与优雅兼具的极致体验。</p>
    <hr><p>提交sitemap可以向搜索提交网站的sitemap文件，帮助spider更好的抓取您的网站。</p>
    <p>sitemap.xml地图：<a href='<?php echo $index ?>sitemap.xml' target='_blank'><?php echo $index ?>sitemap.xml</a> <a href='https://ziyuan.baidu.com/linksubmit'>(地图提交)</a><p>
    <hr>
    <script src="https://xiao.dpaoz.com/version.js"></script>
	</div>
	<?php
	
	 /**
	 *  留言面板
	 */	    
    $lyopen = Helper::options()->liuyan;
    if($lyopen){  
    $mess = file_exists("./../message.txt") ? file_get_contents("./../message.txt") : NULL;      
    if($mess){
    $mess = rtrim($mess, "[n]");     
    $arrmess = explode("[n]", $mess);   
    echo '<div class="miracles-pannel"><ul>';
    foreach($arrmess as $m) {
    list($username, $dt ,$title, $content) = explode("||", $m);
    $time = date("Y-m-d H:i",$dt);   
    echo "<li>".$time." {$username} {$title} {$content}</li>";    
    }  
    echo '</ul>';  
    echo '<form class="protected" action="?Miraclesliu" method="post">
        <input type="submit" name="liutype" class="miracles-backup-button backup" value="清空留言" />	   
	  </form></div>';
      }      

    if(isset($_POST['liutype'])){ 
    if($_POST["liutype"]=="清空留言"){
       file_put_contents('./../message.txt','');
      echo '<div class="tongzhi">删除成功，请等待自动刷新，如果等不到请点击';
 ?><a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div><script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script><?php    
    }}}  
	
	;?>
	
	<?php require_once("libs/cacheset.php"); ?>
	<!--公告-->  
    </div>
        <script src="<?php echo THEME_URL ?>/core/j.setting.min.js"></script>
    <?php
    
    //网站模式

    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址<b style="color: red;">✱</b>'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个logo,留空则会显示网站文字标题, 尺寸高度建议50-70px之间，宽度等比例自适应'));
    $logoUrl->setAttribute('class', 'j-setting-content j-setting-global');
    $form->addInput($logoUrl);

	$logoUrldark = new Typecho_Widget_Helper_Form_Element_Text('logoUrldark', NULL, NULL, _t('站点夜间模式LOGO地址<b style="color: red;">✱</b>'), _t('夜间模式的logo,白天模式下不会显示,尺寸高度建议50-70px之间，宽度等比例自适应'));
    $form->addInput($logoUrldark);
    $logoUrldark->setAttribute('class', 'j-setting-content j-setting-global');

	$favicon = new Typecho_Widget_Helper_Form_Element_Text('favicon', NULL, NULL, _t('favicon地址'), _t('一般为http://www.yourblog.com/image.png,支持 https:// 或 //,留空则不设置favicon'));
    $form->addInput($favicon);
    $favicon->setAttribute('class', 'j-setting-content j-setting-global');
    
    $aboutme = new Typecho_Widget_Helper_Form_Element_Text('aboutme', NULL, NULL, _t('关于我们页面缩略名<b style="color: red;">✱</b>'), _t('开启列表视频播放需加载ajax必填'));
    $form->addInput($aboutme);
    $aboutme->setAttribute('class', 'j-setting-content j-setting-global');
  
    $liuyan = new Typecho_Widget_Helper_Form_Element_Text('liuyan', NULL, NULL, _t('留言板页面缩略名'), _t('不填则不显示'));
    $form->addInput($liuyan);
    $liuyan->setAttribute('class', 'j-setting-content j-setting-global');
    
    $tougao = new Typecho_Widget_Helper_Form_Element_Text('tougao', NULL, NULL, _t('投稿页面缩略名'), _t('不填则不显示'));
    $form->addInput($tougao);
    $tougao->setAttribute('class', 'j-setting-content j-setting-global');
    
    $gaoedit = new Typecho_Widget_Helper_Form_Element_Text('gaoedit', NULL, NULL, _t('文章编辑页面缩略名'), _t('不填则不显示'));
    $form->addInput($gaoedit);
    $gaoedit->setAttribute('class', 'j-setting-content j-setting-global');
  
    $sitelink = new Typecho_Widget_Helper_Form_Element_Text('sitelink', NULL, NULL, _t('站点导航页面缩略名'), _t('不填则不显示'));
    $form->addInput($sitelink);
    $sitelink->setAttribute('class', 'j-setting-content j-setting-global');

    $openimg = new Typecho_Widget_Helper_Form_Element_Select('openimg',array('-1'=>'不开启','0'=>'开启'),'-1','开启后首页列表获取文章缩略图','默认：不开启');
    $form->addInput($openimg);
    $openimg->setAttribute('class', 'j-setting-content j-setting-global');
    
    
    $JGravatars = new Typecho_Widget_Helper_Form_Element_Select(
        'JGravatars',
        array(
            'gravatar.helingqi.com/wavatar' => '禾令奇（默认）',
            'www.gravatar.com/avatar' => 'gravatar的www源',
            'cn.gravatar.com/avatar' => 'gravatar的cn源',
            'secure.gravatar.com/avatar' => 'gravatar的secure源',
            'sdn.geekzu.org/avatar' => '极客族',
            'cdn.v2ex.com/gravatar' => 'v2ex源',
            'dn-qiniu-avatar.qbox.me/avatar' => '七牛源[不建议]',
            'gravatar.loli.net/avatar' => 'loli.net源',
        ),
        'gravatar.helingqi.com/wavatar',
        '选择头像源',
        '介绍：不同的源响应速度不同，头像也不同'
    );
    $JGravatars->setAttribute('class', 'j-setting-content j-setting-global');
    $form->addInput($JGravatars->multiMode());
    
    

    $imghdp = new Typecho_Widget_Helper_Form_Element_Text('imghdp', NULL, NULL, _t('幻灯片侧栏文章ID(2)<b style="color: red;">✱</b>'), _t('在这里填入幻灯片旁边文章ID,输入2个文章ID,<b style="color: red;">限定为2个以内</b>'));
    $form->addInput($imghdp);
    $imghdp->setAttribute('class', 'j-setting-content j-setting-index');

	$dhtop = new Typecho_Widget_Helper_Form_Element_Text('dhtop', NULL, NULL, _t('幻灯片文章ID<b style="color: red;">✱</b>'), _t('在这里填入幻灯片轮显文章ID'));
    $form->addInput($dhtop); 
    $dhtop->setAttribute('class', 'j-setting-content j-setting-index');
  
    $nolist = new Typecho_Widget_Helper_Form_Element_Text('nolist', NULL, NULL, _t('首页不显示某分类'), _t('仅用在首页，首页不显示某分类，填入<b style="color: red;">缩略名</b>'));
    $form->addInput($nolist); 
    $nolist->setAttribute('class', 'j-setting-content j-setting-index');
  
    $topnews = new Typecho_Widget_Helper_Form_Element_Text('topnews', NULL, NULL, _t('头部推荐文章ID<b style="color: red;">✱</b>'), _t('首页头部显示的推荐文章ID,幻灯片下方位置<b style="color: red;">限定为4个以内</b>'));
    $form->addInput($topnews); 
    $topnews->setAttribute('class', 'j-setting-content j-setting-index');

	$sequid = new Typecho_Widget_Helper_Form_Element_Text('sequid', NULL, NULL, _t('列表推荐文章ID'), _t('首页列表显示的推荐文章ID,默认出现在第12个的位置<b style="color: red;">限定为4个以内</b>'));
    $form->addInput($sequid);   
    $sequid->setAttribute('class', 'j-setting-content j-setting-index');
  
    $slidenum = new Typecho_Widget_Helper_Form_Element_Text('slidenum', NULL, NULL, _t('列表推荐文章ID(滑动模块)<b style="color: red;">✱</b>'), _t('<b style="color: red;">填:-1则为关闭</b>,不填默认为本月最热推荐，首页列表显示的推荐文章ID(滑动模块)，7-8个即可'));
    $form->addInput($slidenum);  
    $slidenum->setAttribute('class', 'j-setting-content j-setting-index');

	$zhiduid = new Typecho_Widget_Helper_Form_Element_Text('zhiduid', NULL, NULL, _t('置顶文章ID'), _t('在这里填入置顶文章ID,输入1~2个文章ID,设置太多,会影响美观，推荐1,2个最为合适'));
    $form->addInput($zhiduid);
    $zhiduid->setAttribute('class', 'j-setting-content j-setting-index');

	$labanew = new Typecho_Widget_Helper_Form_Element_Text('labanew', NULL, NULL, _t('公告文章ID'), _t('在这里填入公告文章ID,输入为公告的文章ID,循环向上滚动'));
    $form->addInput($labanew);
    $labanew->setAttribute('class', 'j-setting-content j-setting-index');

	$footnew = new Typecho_Widget_Helper_Form_Element_Text('footnew', NULL, NULL, _t('底部推荐栏目ID'), _t('输入栏目ID，底部会显示推荐的栏目最新文章,不填则不显示'));
    $form->addInput($footnew);
    $footnew->setAttribute('class', 'j-setting-content j-setting-index');

	$footnewmore = new Typecho_Widget_Helper_Form_Element_Text('footnewmore', NULL, NULL, _t('底部栏目更多推荐链接'), _t('一般为http://www.yourblog.com/,不填则不显示'));
    $form->addInput($footnewmore);
    $footnewmore->setAttribute('class', 'j-setting-content j-setting-index');

	$sidetag = new Typecho_Widget_Helper_Form_Element_Text('sidetag', NULL, NULL, _t('边栏TAG标签更多链接'), _t('一般为http://www.yourblog.com/,不填则不显示'));
    $form->addInput($sidetag);
    $sidetag->setAttribute('class', 'j-setting-content j-setting-index');
  
    $liuynes = new Typecho_Widget_Helper_Form_Element_Text('liuynes', NULL, NULL, _t('边栏留言下方我要留言链接'), _t('一般为http://www.yourblog.com/，不填则不显示'));
    $form->addInput($liuynes);
    $liuynes->setAttribute('class', 'j-setting-content j-setting-index');
   
    $sitedate = new Typecho_Widget_Helper_Form_Element_Text('sitedate', NULL, NULL, _t('网站建站日期'), _t('不填则不显示网站统计，在这里填入你的网站建站日期， 例如：2017-05-20'));
    $form->addInput($sitedate);
    $sitedate->setAttribute('class', 'j-setting-content j-setting-index');
  
    $naslist = new Typecho_Widget_Helper_Form_Element_Select('naslist',array('0'=>'默认导航','1'=>'自制导航'),'0','头部导航切换','<b style="color: red;">默认导航：下方【头部高级导航菜单】则为超话标签，自制导航：下方【头部高级导航菜单】则为自定义栏目</b>');
    $form->addInput($naslist);
    $naslist->setAttribute('class', 'j-setting-content j-setting-index');
  
    $huaoff = new Typecho_Widget_Helper_Form_Element_Select('huaoff',array('0'=>'不显示','1'=>'显示'),'0','导航#超话显示','默认：不显示#超话导航');
    $form->addInput($huaoff);
    $huaoff->setAttribute('class', 'j-setting-content j-setting-index');

	$navtops = new Typecho_Widget_Helper_Form_Element_Textarea('navtops', NULL, NULL, _t('头部高级导航菜单'), _t('头部高级菜单格式,每行1组以"<b style="color: red;"><br/>标题|链接|描述|图标代码<br/> 自定义标题|https://www.xxx.com|自定义描述|icon-dianying ( 图标代码不带. )</b><br/>"形式,顺序不要弄错了,icon图标参考：<a href="https://www.dpaoz.com/iconcss"><b>https://www.dpaoz.com/iconcss</b></a>'));
    $form->addInput($navtops);
    $navtops->setAttribute('class', 'j-setting-content j-setting-index');

	$navsecs = new Typecho_Widget_Helper_Form_Element_Textarea('navsecs', NULL, NULL, _t('首页列表菜单'), _t('幻灯片下方位置,列表菜单设置,自动pjax加载,一般填入4个较为合适,只适合放页面，<b style="color: red;">不适合放分类，分类不能分页</b>，不宜太多,每行1组以"<b style="color: red;">标题|链接</b>"形式)'));
    $form->addInput($navsecs);
    $navsecs->setAttribute('class', 'j-setting-content j-setting-index');
    
    $denglu = new Typecho_Widget_Helper_Form_Element_Text('denglu', NULL, NULL, _t('登录页面缩略名<b style="color: red;">✱</b>'), _t('必填，新建页面，配置好缩略名字后填入到这里'));
    $form->addInput($denglu);
    $denglu->setAttribute('class', 'j-setting-content j-setting-user');
    
    $zhuce = new Typecho_Widget_Helper_Form_Element_Text('zhuce', NULL, NULL, _t('注册页面缩略名<b style="color: red;">✱</b>'), _t('必填，新建页面，配置好缩略名字后填入到这里'));
    $form->addInput($zhuce);
    $zhuce->setAttribute('class', 'j-setting-content j-setting-user');
    
    $tgcat = new Typecho_Widget_Helper_Form_Element_Text('tgcat', NULL, NULL, _t('投稿指定栏目ID'), _t('投稿指定的栏目id,必填'));
    $form->addInput($tgcat);
    $tgcat->setAttribute('class', 'j-setting-content j-setting-user');

    $pingopen = new Typecho_Widget_Helper_Form_Element_Select('pingopen',array('0'=>'不开启','1'=>'开启'),'0','开启登录才能评论','默认：不开启');
    $form->addInput($pingopen);
    $pingopen->setAttribute('class', 'j-setting-content j-setting-user');
    
    $applic = new Typecho_Widget_Helper_Form_Element_Select('applic',array('0'=>'不开启','1'=>'开启'),'0','开启会员页的申请认证选项','默认：不开启');
    $form->addInput($applic);
    $applic->setAttribute('class', 'j-setting-content j-setting-user');

   // $autjifen = new Typecho_Widget_Helper_Form_Element_Text('autjifen', NULL, NULL, _t('积分公式'), _t('(阅读数*0.001)+评论数+(点赞数*5)'));
   // $form->addInput($autjifen);

    $adimg = new Typecho_Widget_Helper_Form_Element_Text('adimg', NULL, NULL, _t('边栏广告图片+链接'), _t('边栏第一个位置,在这里填入你广告图片链接代码：&lt;a rel="nofollow" target="_blank" href=""&gt; &lt;img src="图片链接"&gt;  &lt;/a&gt;'));
    $form->addInput($adimg);
    $adimg->setAttribute('class', 'j-setting-content j-setting-ads');
  
    $adimgs = new Typecho_Widget_Helper_Form_Element_Text('adimgs', NULL, NULL, _t('边栏2广告图片+链接'), _t('边栏第二个位置,在这里填入你广告图片链接代码：&lt;a rel="nofollow" target="_blank" href=""&gt; &lt;img src="图片链接"&gt;  &lt;/a&gt;'));
    $form->addInput($adimgs);
    $adimgs->setAttribute('class', 'j-setting-content j-setting-ads');

	$hdadimg = new Typecho_Widget_Helper_Form_Element_Text('hdadimg', NULL, NULL, _t('幻灯片下方广告'), _t('在这里填入你广告图片链接代码：&lt;a rel="nofollow" target="_blank" href=""&gt; &lt;img src="图片链接"&gt;  &lt;/a&gt;'));
    $form->addInput($hdadimg);
    $hdadimg->setAttribute('class', 'j-setting-content j-setting-ads');
  
    $listadimg = new Typecho_Widget_Helper_Form_Element_Text('listadimg', NULL, NULL, _t('列表广告'), _t('首页列表广告，出现到第12个位置，在这里填入你广告图片链接代码：&lt;a rel="nofollow" target="_blank" href=""&gt; &lt;img src="图片链接"&gt;  &lt;/a&gt;'));
    $form->addInput($listadimg);
    $listadimg->setAttribute('class', 'j-setting-content j-setting-ads');

	$txtadimg = new Typecho_Widget_Helper_Form_Element_Text('txtadimg', NULL, NULL, _t('文章上方广告'), _t('在这里填入你广告图片链接代码：&lt;a rel="nofollow" target="_blank" href=""&gt; &lt;img src="图片链接"&gt;  &lt;/a&gt;'));
    $form->addInput($txtadimg);
    $txtadimg->setAttribute('class', 'j-setting-content j-setting-ads');

	$txtaddown = new Typecho_Widget_Helper_Form_Element_Text('txtaddown', NULL, NULL, _t('文章下方底部广告'), _t('在这里填入你广告图片链接代码：&lt;a rel="nofollow" target="_blank" href=""&gt; &lt;img src="图片链接"&gt;  &lt;/a&gt;'));
    $form->addInput($txtaddown);
    $txtaddown->setAttribute('class', 'j-setting-content j-setting-ads');
    
    $auadtop = new Typecho_Widget_Helper_Form_Element_Text('auadtop', NULL, NULL, _t('会员页头部广告'), _t(''));
    $form->addInput($auadtop);
    $auadtop->setAttribute('class', 'j-setting-content j-setting-ads');
    
    $auadside = new Typecho_Widget_Helper_Form_Element_Text('auadside', NULL, NULL, _t('会员页边栏广告'), _t(''));
    $form->addInput($auadside);
    $auadside->setAttribute('class', 'j-setting-content j-setting-ads');
	
	$vartheme = new Typecho_Widget_Helper_Form_Element_Text('vartheme', NULL, NULL, _t('网站主色调'), _t('默认色调: 29D'));
    $vartheme->input->setAttribute('class', 'jscolor');
    $form->addInput($vartheme);
    $vartheme->setAttribute('class', 'j-setting-content j-setting-color');
	
    //切换左右边栏
	$rlweb = new Typecho_Widget_Helper_Form_Element_Select('rlweb',array('rble'=>'右边栏','lble'=>'左边栏'),'rble','网站边栏显示位置');
    $form->addInput($rlweb);
    $rlweb->setAttribute('class', 'j-setting-content j-setting-color');
  
    //开启白天黑夜模式
	$night = new Typecho_Widget_Helper_Form_Element_Select('night',array('0'=>'白天模式','1'=>'黑夜模式','2'=>'自动模式'),'2','自动模式:21点为界限，之前为白天模式，之后为黑夜模式');
    $form->addInput($night);
    $night->setAttribute('class', 'j-setting-content j-setting-color');
  
    //开启扩展看点
	$oncosmore = new Typecho_Widget_Helper_Form_Element_Select('oncosmore',array('0'=>'关闭','1'=>'开启'),'0','是否开启列表扩展看点推荐（推荐为文章中的相关推荐文章）');
    $form->addInput($oncosmore);
    $oncosmore->setAttribute('class', 'j-setting-content j-setting-color');
    
    //开启AJAX视频列表
	$ajxplay = new Typecho_Widget_Helper_Form_Element_Select('ajxplay',array('0'=>'关闭','1'=>'开启'),'0','是否开启AJAX视频列表,开启需要配置好【常规设置-关于我们页面】选项');
    $form->addInput($ajxplay);
    $ajxplay->setAttribute('class', 'j-setting-content j-setting-color');

    //开启表情评论
	$pingimg = new Typecho_Widget_Helper_Form_Element_Select('pingimg',array('pingyes'=>'开启','pingno'=>'关闭'),'pingyes','开启全站表情评论功能');
    $form->addInput($pingimg);
    $pingimg->setAttribute('class', 'j-setting-content j-setting-color');
  
    //开启评论UserAgent (UA)模式
	$piua = new Typecho_Widget_Helper_Form_Element_Select('piua',array('0'=>'不开启UA','1'=>'开启UA'),'0','是否开启UserAgent(UA)博客评论显示');
    $form->addInput($piua);
    $piua->setAttribute('class', 'j-setting-content j-setting-color');
    
    //开启阅读文章边栏透明功能
	$postimask = new Typecho_Widget_Helper_Form_Element_Select('postimask',array('0'=>'不开启','1'=>'开启'),'0','是否开启开启阅读文章边栏透明功能');
    $form->addInput($postimask);
    $postimask->setAttribute('class', 'j-setting-content j-setting-color');

	//分页样式显示
	$navpages = new Typecho_Widget_Helper_Form_Element_Select('navpages',array('navshu'=>'分页显示','navmor'=>'更多加载'),'navshu','分页样式显示');
    $form->addInput($navpages);
    $navpages->setAttribute('class', 'j-setting-content j-setting-color');

	$webcss = new Typecho_Widget_Helper_Form_Element_Textarea('webcss', NULL, NULL, _t('自定义CSS'), _t('自定义样式,内置nexzhu和webmo字体，切换可添加<b style="color: red;">body {font-family: nexzhu!important;}</b> 或者 <b style="color: red;">body {font-family: webmo!important;}</b>'));
    $form->addInput($webcss);
    $webcss->setAttribute('class', 'j-setting-content j-setting-color');

	$tophtml = new Typecho_Widget_Helper_Form_Element_Textarea('tophtml', NULL, NULL, _t('页头代码'), _t('添加在页面</head>前,比如：站长平台HTML验证代码,谷歌分析代码'));
    $form->addInput($tophtml);
    $tophtml->setAttribute('class', 'j-setting-content j-setting-color');

	$foothtml = new Typecho_Widget_Helper_Form_Element_Textarea('foothtml', NULL, NULL, _t('页脚代码'), _t('添加在页面</body>前,比如：客服工具等js代码，注意 统计代码不在这里填！！'));
    $form->addInput($foothtml);
    $foothtml->setAttribute('class', 'j-setting-content j-setting-color');

	$sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array(
	'ShowAboutMe' => _t('关于我 - (仅在文章页显示)'),
	'ShowAd' => _t('广告'),
	'Showkx' => _t('快讯 - (仅在首页显示)'),
    'Showauthors' => _t('互动读者 - (仅在首页显示)'), 	
	'ShowSidebarPosts' => _t('热门文章'), 
    'ShowSidebarzan' => _t('点赞排行榜'),
    'ShowAds' => _t('广告'),  
    'Showtag' => _t('热门标签'), 
	'ShowlastComments' => _t('热评文章 - (全站关闭评论则不显示)'),   
    'ShowRecentComments' => _t('最新回复')),
    array('ShowAboutMe','ShowAd','Showkx','Showauthors','ShowSidebarPosts','ShowSidebarzan','ShowAds','Showtag','ShowlastComments','ShowRecentComments'), _t('侧边栏显示（不宜设置太长，3,4个即可）'));    
    $form->addInput($sidebarBlock->multiMode());
    $sidebarBlock->setAttribute('class', 'j-setting-content j-setting-aside');

    $footernav = new Typecho_Widget_Helper_Form_Element_Textarea('footernav', NULL, NULL, _t('底部链接（友情链接）'), _t('一行一个链接,格式为：&lt;a rel="nofollow" target="_blank" href="//www.dpaoz.com"&gt;小灯泡&lt;/a&gt;'));
    $form->addInput($footernav);
    $footernav->setAttribute('class', 'j-setting-content j-setting-aside');
  
	$footnav = new Typecho_Widget_Helper_Form_Element_Textarea('footnav', NULL, NULL, _t('页脚版权设置'), _t('页脚版权/备案信息，比如：版权所有 本站内容未经书面许可,禁止一切形式的转载。粤ICP备123456号-1. All rights reserved.'));
    $form->addInput($footnav);
    $footnav->setAttribute('class', 'j-setting-content j-setting-aside');

	$footlogo = new Typecho_Widget_Helper_Form_Element_Text('footlogo', NULL, NULL, _t('页脚LOGO图片地址'), _t('在这里填入你的页脚LOGO图片地址,http://www.yourblog.com/image.png,支持 https:// 或 //'));
    $form->addInput($footlogo);
    $footlogo->setAttribute('class', 'j-setting-content j-setting-aside');

    $zztj = new Typecho_Widget_Helper_Form_Element_Text('zztj', NULL, NULL, _t('网站统计代码'), _t('在这里填入你的网站统计代码,这个可以到百度统计或者cnzz上申请。'));
    $form->addInput($zztj);
    $zztj->setAttribute('class', 'j-setting-content j-setting-aside');

	$mobiset = new Typecho_Widget_Helper_Form_Element_Select('mobiset',array('0'=>'不开启','1'=>'开启'),'0','移动底部菜单设置','移动端页脚底部菜单');
    $form->addInput($mobiset);
    $mobiset->setAttribute('class', 'j-setting-content j-setting-mox');
  
    $navmobi = new Typecho_Widget_Helper_Form_Element_Textarea('navmobi', NULL, NULL, _t('手机端底部菜单<b style="color: red;">✱</b>'), _t('手机端底部高级菜单格式,每行1组以"<b style="color: red;">icon图标|链接</b>"形式),顺序不能弄错，icon图标参考：<a href="https://www.dpaoz.com/iconcss"><b>https://www.dpaoz.com/iconcss</b></a>'));
    $form->addInput($navmobi); 
    $navmobi->setAttribute('class', 'j-setting-content j-setting-mox');
  
    $seotitle = new Typecho_Widget_Helper_Form_Element_Text('seotitle', NULL, NULL, _t('首页标题<b style="color: red;">✱</b>'), _t('首页SEO标题，不设置默认显示[设置]里面的站点标题和描述，<b style="color: red;">关键字和描述，请到程序设置</b>'));
    $form->addInput($seotitle);
    $seotitle->setAttribute('class', 'j-setting-content j-setting-seo');
  
    $closelun = new Typecho_Widget_Helper_Form_Element_Select('closelun',array('0'=>'不开启','1'=>'开启'),'0','开启评论','选择是否开启全网评论，');
    $form->addInput($closelun);	
    $closelun->setAttribute('class', 'j-setting-content j-setting-seo');

	$themeseo = new Typecho_Widget_Helper_Form_Element_Select('themeseo',array('0'=>'不开启','1'=>'开启'),'0','开启SEO','如果使用第三方SEO插件,可以选择关闭主题自带SEO功能');
    $form->addInput($themeseo);	
    $themeseo->setAttribute('class', 'j-setting-content j-setting-seo');

	$themecompress = new Typecho_Widget_Helper_Form_Element_Select('themecompress',array('0'=>'不开启','1'=>'开启'),'0','HTML压缩功能','是否开启HTML压缩功能,缩减页面代码');
    $form->addInput($themecompress);
    $themecompress->setAttribute('class', 'j-setting-content j-setting-seo');
  
    $tsmore = new Typecho_Widget_Helper_Form_Element_Select('tsmore',array('0'=>'不开启','1'=>'开启'),'0','文章-阅读全文','手机移动端文章过长截断显示阅读全文');
    $form->addInput($tsmore);
    $tsmore->setAttribute('class', 'j-setting-content j-setting-seo');

	$Keywordspress = new Typecho_Widget_Helper_Form_Element_Textarea('Keywordspress', NULL, NULL, _t('关键字内链<b style="color: red;">✱</b>'), _t('文章详情页自动关键词链接,每行1组以"<b style="color: red;">关键词|(半角竖线)链接</b>"形式)'));
    $form->addInput($Keywordspress);
    $Keywordspress->setAttribute('class', 'j-setting-content j-setting-seo');

	$cdnopen = new Typecho_Widget_Helper_Form_Element_Select('cdnopen',array('0'=>'不开启','1'=>'开启'),'0','开启镜像存储','可不开启，关闭状态下，镜像存储，镜像源，子域名cdn则无效');
    $form->addInput($cdnopen);	
    $cdnopen->setAttribute('class', 'j-setting-content j-setting-speed');
	
	$cdnurla = new Typecho_Widget_Helper_Form_Element_Text('cdnurla', NULL, NULL, _t('镜像存储-镜像源'), _t('利用镜像存储做cdn缓存图片文件,格式：www.yourblog.com/ ,记得带上/,不带http或者https,和七牛之类云存储所填的保持一致'));
    $form->addInput($cdnurla);
    $cdnurla->setAttribute('class', 'j-setting-content j-setting-speed');

	$cdnurlb = new Typecho_Widget_Helper_Form_Element_Text('cdnurlb', NULL, NULL, _t('镜像存储-子域名'), _t('利用镜像存储做cdn缓存图片文件,和第三方存储所填的域名保持一致即可,格式：xxx.yourblog.com/ '));
    $form->addInput($cdnurlb);
    $cdnurlb->setAttribute('class', 'j-setting-content j-setting-speed');
  
    $imageView = new Typecho_Widget_Helper_Form_Element_Text('imageView', NULL, NULL, _t('文章内第三方存储图片后缀'), _t('第三方存储的处理接口样式，填入则开启,注意开头是否需要以？开头 '));
    $form->addInput($imageView);
    $imageView->setAttribute('class', 'j-setting-content j-setting-speed');
  
    $txtopcas = new Typecho_Widget_Helper_Form_Element_Select('txtopcas',array('0'=>'不开启','1'=>'开启'),'0','开启缓存<b style="color: red;">✱</b>','TXT缓存生成，开启生成的数据文件');
    $form->addInput($txtopcas);	
    $txtopcas->setAttribute('class', 'j-setting-content j-setting-speed');


}


//后台编辑器添加功能
function themeFields($layout) {
  
    $img = new Typecho_Widget_Helper_Form_Element_Text('img', NULL, NULL, _t('封面图'), _t('在这里填入一个图片 URL 地址, 以添加显示本文的缩略图，留空则显示默认缩略图'));
    $img->input->setAttribute('class', 'w-100 setfb');
    $layout->addItem($img);

	$bimg = new Typecho_Widget_Helper_Form_Element_Text('bimg', NULL, NULL, _t('封面大图'), _t('在这里填入一个图片 URL 地址, 以添加显示本文的大封面缩略图，留空则显示默认小缩略图'));
    $bimg->input->setAttribute('class', 'w-100 setfb');
    $layout->addItem($bimg);  

	  //单图/大图/三图显示
    $abcimg = new Typecho_Widget_Helper_Form_Element_Radio('abcimg',
        array('able' => _t('单图'),
              'bable' => _t('大图'),
		      'mable' => _t('三图'),
              'shuos' => _t('说说'),
        ),
        'able', _t('单图/大图/三图显示/说说'), _t('默认单图，注意三图确保发布的文章必须有三张以上的图片附件'));
    $layout->addItem($abcimg);
  
    $tktit = new Typecho_Widget_Helper_Form_Element_Text('tktit', NULL, NULL, _t('SEO标题'), _t('在这里填入文章的标题，不填则为默认系统'));
    $tktit->input->setAttribute('class', 'w-100 setfb');
    $layout->addItem($tktit);
  
    $tkeyc = new Typecho_Widget_Helper_Form_Element_Text('tkeyc', NULL, NULL, _t('SEO关键字'), _t('在这里填入文章的关键字，不填则为默认系统（与SE0描述同时填入则会出现文章SEO优化描述）'));
    $tkeyc->input->setAttribute('class', 'w-100 setfb');
    $layout->addItem($tkeyc);
  
    $tdesc = new Typecho_Widget_Helper_Form_Element_Text('tdesc', NULL, NULL, _t('SEO描述'), _t('在这里填入文章的描述内容（同时也是自定义描述内容）不填则为默认系统'));
    $tdesc->input->setAttribute('class', 'w-100 setfb');
    $layout->addItem($tdesc);

    $videourl = new Typecho_Widget_Helper_Form_Element_Text('videourl', NULL, NULL, _t('视频链接'), _t('在这里填入一个视频 URL 地址, 以添加显示视频，留空则没有'));
    $videourl->input->setAttribute('class', 'w-100 setfb');
    $layout->addItem($videourl); 
    
	$catalog = new Typecho_Widget_Helper_Form_Element_Radio('catalog', 
    array(true => _t('启用'),
    false => _t('关闭')),
    false, _t('文章目录'), _t('默认关闭，启用则会在文章内显示“文章目录”（若文章内无任何 h2 标题，则不显示目录）'));
    $layout->addItem($catalog);
  
   
    $pinglun = new Typecho_Widget_Helper_Form_Element_Radio('pinglun', 
    array('1' => _t('启用'),
    '0' => _t('关闭')),
    '1', _t('文章评论'), _t('默认开启，如后台设置了评论关闭，则不会显示评论，注意：主题后台配置关闭的话，则这里会失效'));
    $layout->addItem($pinglun);
   
  
    $Copyrightnew = new Typecho_Widget_Helper_Form_Element_Radio('Copyrightnew', 
    array('0' => _t('原创版权'),
    '1' => _t('投稿版权'),
    '2' => _t('转载文章')),
    '1', _t('投稿版权'), _t('版权类型默认：投稿版权，文章版权类型，可以在主题设置里面新增和编辑版权类型，'));
    $layout->addItem($Copyrightnew); 
  
    $Copyurl = new Typecho_Widget_Helper_Form_Element_Text('Copyurl', NULL, NULL, _t('转载文章来源'), _t('在这里填入一个文章 URL 地址，留空则没有'));
    $Copyurl->input->setAttribute('class', 'w-100 setfb');
    $layout->addItem($Copyurl);  
}

$Version =themeVersion();

/**
 * 获取主题版本号
 */
function themeVersion() {
    $info = Typecho_Plugin::parseInfo(__DIR__ . '/index.php');
    return $info['version'];
}


function themeInit($archive) {
    
/* 强制用户关闭反垃圾保护 */
Helper::options()->commentsAntiSpam = false;
/* 强制用户关闭检查来源URL */
Helper::options()->commentsCheckReferer = false;
/* 强制用户强制要求填写邮箱 */
 Helper::options()->commentsRequireMail = true;
/* 强制用户强制要求无需填写url */
Helper::options()->commentsRequireURL = false;    

Helper::options()->commentsMaxNestingLevels = '5'; //最大嵌套层数
Helper::options()->commentsOrder = 'DESC'; //将最新的评论展示在前
Helper::options()->commentsHTMLTagAllowed = '<a href=""> <img src=""> <img src="" class=""> <code> <del>';

if ($archive->is('single')) {
        if ($archive->fields->catalog) {
            $archive->content = createCatalog($archive->content);
        }
        
        $archive->content = get_glo_keywords($archive->content);
        $archive->content = stcdn($archive->content);
        
}
//设置栏目数量的地方
if ($archive->is('category', 'baike')) {
$archive->parameter->pageSize = 45; // 自定义条数
}
if ($archive->is('category', 'shipin')) {
$archive->parameter->pageSize = 21; // 自定义条数
}
if ($archive->is('category', 'tuij')) {
$archive->parameter->pageSize = 20; // 自定义条数
}
}


?>


