<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
<meta charset="<?php $this->options->charset(); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="applicable-device" content="pc,mobile">  
<?php if($this->options->favicon): ?><link rel="shortcut icon" href="<?php $this->options->favicon(); ?>"><?php endif;?>  
<?php if ($this->options->seotitle && $this->is('index')):?>
<title><?php $this->options->seotitle(); ?></title> 
<?php else : ?>  
<?php if ($this->options->themeseo == '0'):?>
<title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s的主页')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
<?php else : ?>
<?php if ( ($this->fields->tktit && $this->is('post') || $this->fields->tktit && $this->is('page') )  ):?>  
<title><?php $this->fields->tktit(); ?> - <?php $this->options->title(); ?></title>
<?php else : ?>  
<title><?php if($this->_currentPage>1) echo '第 '.$this->_currentPage.' 页 - '; ?><?php $this->archiveTitle(array(
            'category'  =>  _t('%s '),
            'search'    =>  _t('包含关键字 %s 的内容'),
            'tag'       =>  _t('标签 %s 下的内容'),
            'author'    =>  _t('%s的主页')
        ), '', ' - '); ?><?php if ( $this->is('index') || $this->is('post') || $this->is('page')|| $this->is('tag') ) : ?><?php else: ?><?php endif; ?> <?php $this->options->title(); ?></title>
<?php endif; ?><?php endif; ?><?php endif; ?>
<!-- 使用url函数转换相关路径 -->
<link rel="stylesheet" href="<?php echo stcdn($this->options->themeUrl); ?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo stcdn($this->options->themeUrl); ?>/style.css?ver=<?php echo themeVersion(); ?>">
<link rel="stylesheet" href="<?php echo stcdn($this->options->themeUrl); ?>/css/iconfont.css?ver=<?php echo themeVersion(); ?>" type="text/css" media="all">
<script src="//cdn.staticfile.org/jquery/3.4.1/jquery.min.js"></script>
<script type='text/javascript'>var globals = {"ajax_url":"<?php $this->options->siteUrl(); ?><?php $this->options->aboutme(); ?>.html","web_url":"<?php $this->options->siteUrl(); ?>"};</script>
<!--[if lt IE 9]>
<script src="http://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
<script src="http://cdn.staticfile.org/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->  
<?php if ($this->options->sitelink) : ?>  
<?php if ($this->is('page', $this->options->sitelink)): ?>  
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/links.css'); ?>">
<?php endif; ?><?php endif; ?>
<?php if ($this->is('post')) : ?>
<link rel="canonical" href="<?php $this->permalink() ?>"/>
<?php endif; ?>
<!-- 通过自有函数输出HTML头部信息 --> 
<?php $this->need('assets/og.php'); ?>
<?php if (($this->is('post')) || ($this->is('page'))): ?>  
<?php if (($this->fields->tkeyc) && ($this->fields->tdesc)): ?>
<nocompress><?php $tdesc = $this->fields->tdesc; $tkeyc = $this->fields->tkeyc; $this->header("generator=&template=&description=$tdesc&keywords=$tkeyc&pingback=&xmlrpc=&wlw=&atom=&rss1=&rss2="); ?></nocompress>
<?php else : ?> 
<?php $this->header('generator=&template=&pingback=&xmlrpc=&wlw=&atom=&rss1=&rss2='); ?>
<?php endif; ?>  
<?php else : ?> 
<?php $this->header('generator=&template=&pingback=&xmlrpc=&wlw=&atom=&rss1=&rss2='); ?> 
<?php endif; ?>  
<?php if ($this->options->webcss): ?>
<style type="text/css"><?php $this->options->webcss(); ?></style>
<?php endif; ?>
<?php if ($this->options->tophtml): ?>
<?php $this->options->tophtml(); ?>
<?php endif; ?>  
</head>
<body class="<?php if ($this->options->night == '2'):?><?php echo($_COOKIE['night'] == '1'?'night':''); ?><?php elseif ($this->options->night == '1'): setcookie("night", "1", time()+3600); ?>sp-dark-mode<?php elseif ($this->options->night == '0'): setcookie("night", "0", time()+3600); ?><?php endif; ?> " style="--theme: #<?php vartheme(); ?>;">  
<!--[if lt IE 8]>
<div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="https://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->
<div class="site-main spimes-container">
<div class="top-bar">  
<div class="container clearnav secnav">
<!--移动端按钮-->
<nav class="navbar navbar-inverse navbar-static-top">
<div class="container">
<div class="navbar-header">
<div class="m_nav-list" >
<a href="javascript:;" data-toggle="offcanvas" class="lines js-m-navlist">
<span class="line first-line"></span>
<span class="line second-line"></span>
<span class="line third-line"></span>
</a>
</div>
</div>
<div id="navbar" class="collapse navbar-collapse sidebar-offcanvas">
<!--移动导航s-->
<?php if ($this->options->night == '2'):?><input class="wb-switch wb-yes" id="J_themesSwitchBtn" type="checkbox" onclick="javascript:switchNightMode()"><?php endif; ?>  
<div class="mobile-sidebar-column">
<ul class="mobile-sidebar-menu ultop">
<?php if ($this->options->naslist == '0'):?>  
<li class="menu-item"><a href="<?php $this->options->siteUrl(); ?>"><i class="icon iconfont icon-icon-test35"></i><?php _e('首页'); ?></a></li>
<?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
 <?php while($categorys->next()): ?>
 <?php if ($categorys->levels === 0): ?>
 <?php $children = $categorys->getAllChildren($categorys->mid); ?>
 <?php if (empty($children)) { ?>
<li class="menu-item">
<a href="<?php $categorys->permalink(); ?>" title="<?php $categorys->name(); ?>"><i class="icon iconfont icon-icon-test35"></i><?php $categorys->name(); ?></a>
</li>
<?php } else { ?> 
<li class="menu-item" >
<a ><i class="icon iconfont icon-icon-test35"></i><?php $categorys->name(); ?><div class="dropdown-sub-menu"><span class="icon iconfont icon-icon-test37"></span></div></a>
<ul class="sub-menu">
<?php foreach ($children as $mid) { ?>
<?php $child = $categorys->getCategory($mid); ?>
<li class="menu-item">
<a href="<?php echo $child['permalink'] ?>" title="<?php echo $child['name']; ?>"><?php echo $child['name']; ?></a>
</li>
<?php } ?>
</ul>
</li>
<?php } ?>
<?php endif; ?>
<?php endwhile; ?>
<li class="menu-item"> 
<a ><i class="icon iconfont icon-icon-test35"></i>其他<div class="dropdown-sub-menu"><span class="icon iconfont icon-icon-test37"></span></div></a>
<ul class="sub-menu">
<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>   
<?php while($pages->next()): ?>
<?php if($pages->status = 'publish'): ?><li class="menu-item"><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li><?php endif; ?>
<?php endwhile; ?>
</ul>  
</li> 
<?php else : ?>
<li class="nav-s"><a href="<?php $this->options->siteUrl(); ?>"><i class="icon iconfont icon-icon-test35"></i><?php _e('首页'); ?></a></li>   
<?php navtopinfo(); ?>
<?php endif; ?> 
</ul>
</div>
<!--移动导航e-->
</div><!--/.nav-collapse -->
</div>
</nav> 
<div class="top-bar-left pull-left navlogo">				
<a href="<?php $this->options->siteUrl(); ?>" class="logo box">
<?php if($this->options->logoUrl): ?>
<img src="<?php $this->options->logoUrl();?>" class="logo-light" id="logo-light" alt="<?php $this->options->title() ?>" />
<img src="<?php $this->options->logoUrldark();?>" class="logo-dark <?php if($this->options->night == '1'): ?><?php else : ?>d-none<?php endif; ?>" id="logo-dark" alt="<?php $this->options->title() ?>" />
<?php else : ?>
<span id="logo-light" class="logo-light"><?php $this->options->title() ?></span> <span class="logo-dark d-none" id="logo-dark"><?php $this->options->title() ?></span>
<?php endif; ?>
 <b class="shan"></b>
</a>

</div>
<?php if ($this->options->tougao): ?>
<div class="search-btn">
<a href="<?php $this->options->siteUrl(); ?><?php $this->options->tougao(); ?>.html" class="btn btn-blue btn-article"><i class="icon iconfont icon-icon-test10"></i> 投稿推荐</a>
</div>
<?php endif; ?>
<div class="search-warp clearfix">
<form method="get" action="">
<div class="search-area" >
<input class="search-input" placeholder="搜索感兴趣的知识和文章" type="text" name="s" autocomplete="off" id="soblur">
<!--弹出-->
<ul class="dropdown-menu top_so">
<?php sosoViewed(4); ?>
<!--历史-->
<li><span class="vhiy"><i class="cv icon iconfont icon-icon_time"></i>观看历史记录：</span></li>
<div id="jl_viewHistory" >
</div>
<!--历史-->
<div class="s_tag">
<?php $this->widget('Widget_Metas_Tag_Cloud', array('sort' => 'count', 'ignoreZeroCount' => true, 'desc' => true, 'limit' => 14))->to($tags); ?>
<?php if($tags->have()): ?>
<?php while ($tags->next()): ?>
<div class="item "><a href="<?php $tags->permalink(); ?>" rel="tag"><i>#</i> <?php $tags->name(); ?></a></div>
<?php endwhile; ?>
<?php else: ?>
<?php _e('没有任何标签'); ?>
<?php endif; ?>
</div>                                
</ul>
<!--弹出-->
</div>
<button class="showhide-search search-form-input" type="submit"><i class="icon iconfont icon-sousuo"></i></button>
</form>
</div>
<!--手机端s-->
<div class="top-bar-right pull-right text-right mobs">
<div class="top-admin">	
<a href="javascript:;" id="soStats" class="sostats_click"><i id="soico" class="icon iconfont icon-sousuo"></i> <?php _e('搜索'); ?></a>
  <?php if($this->user->hasLogin()): ?>
  <div id="auStats" class="dropdown-toggle"><?php $email=$this->user->mail; $imgUrl = getGravatar($email);echo '<img src="'.$imgUrl.'" width="25px" height="25px" class="navtar" >'; ?>
							<div class="austats" id="aus">
							<ul>
							<li><a href="<?php $this->options->siteUrl(); ?><?php if ($this->options->rewrite==0): ?>index.php/<?php endif; ?>author/<?php $this->user->uid(); ?>"><i class="icon iconfont icon-wodeguanzhu"></i>个人主页</a></li>
							<li><a href="<?php $this->options->siteUrl(); ?><?php $this->options->tougao(); ?>.html"><i class="icon iconfont icon-bianji"></i>发布文章</a></li>							
							<li><a href="<?php $this->options->logoutUrl(); ?>"><i class="icon iconfont icon-shibai"></i>退出登录</a></li>							
							</ul>
						    </div>	

  </div>
  
  <?php else : ?>
<a href="<?php if ($this->options->denglu): ?><?php $this->options->siteUrl(); ?><?php if ($this->options->rewrite==0): ?>index.php/<?php endif; ?><?php $this->options->denglu(); ?>.html<?php else: ?><?php $this->options->adminUrl('login.php'); ?><?php endif; ?>"><i class="/icon iconfont icon iconfont icon-icon-test24"></i> <?php _e('登录'); ?></a>
<?php endif; ?> 





 <!--搜索框开始-->
<div class="navbar-search socollapse sostats" id="navbar-search" style="">
			<div class="container">
				<form method="get" role="search" id="searchform" class="searchform shadow" action="">
					<div class="input-group">
						<input type="text" name="s" id="s" placeholder="请输入搜索关键词并按回车键…" class="form-control" required="" >
					
						<div class="input-group-append">
							<button class="btn btn-nostyle" type="submit"><i class="icon iconfont icon-sousuo"></i></button>
						</div>
					</div>
<!-- /input-group -->
				</form>
			</div>
</div>
<?php if ($this->options->night == '2'):?><input class="wb-switch wb-no" id="J_themesSwitchBtn" type="checkbox" onclick="javascript:switchNightMode()"><?php endif; ?>   
</div>
</div>
<!--手机端e-->			
</div>  
<!--s-->
<div class="new_header container clearnav">  
<div class="top-bar-left pull-left navs">
    
<?php if ($this->is('post')): ?> 
<div class="top-bar-title post_no" id="post_top_title"><a href="<?php $this->options->siteUrl(); ?>"><i class="icon iconfont icon-shouye1"></i></a> <?php $this->title(); ?></div> 
<?php endif; ?> 
    			  
<nav class="top-bar-navigation">
<ul class="top-bar-menu">
<li class="menu-item"><a href="<?php $this->options->siteUrl(); ?>"><i class="icon iconfont icon-shouye1"></i> <?php _e('首页'); ?></a></li>	
<a rel="" target="_blank" href="https://dkewl.com/"></a>
<a rel="" target="_blank" href="https://www.dkewl.com/"></a>
<a rel="" target="_blank" href="https://www.dkewl.com/"></a>
<a rel="" target="_blank" href="https://www.dkewl.com/"></a>						
<!--pc导航s-->              
<?php if ($this->options->huaoff == '1'):?> 
<?php if ($this->options->navtops): ?>
						<li class="drop-down">
                            <a href="#"><i class="icon iconfont icon-huatifuhao"></i> 超话精选 <i class="icon iconfont icon-icon-test37"></i></a>
                            <div class="aui-dow-box aui-dow-box-list">
                                <div class="aui-down-menu clearfix">                      
                                    <ul class="aui-down-menu-list">                                     
                                    <?php if ($this->options->naslist == '0'):?><?php navtopinfo(); ?><?php else : ?>
                                     <?php $this->widget('Widget_Metas_Category_List@options','ignore=21')->to($category); ?>
                                      <?php while($category->next()): ?>
								        <li class="aui-down-menu-list-item aui-top-border">
                                            <a href="<?php $category->permalink(); ?>">
                                                <p class="aui-down-menu-list-title">
                                                    <i class="icon iconfont icon-huatifuhao"></i><?php $category->name(); ?>
                                                </p>
                                                <p class="aui-down-menu-list-text"><?php $category->name(); ?></p>
                                            </a>
                                        </li>
                                      <?php endwhile; ?>                                       
                                    <?php endif; ?>                         
                                    </ul>
                                </div>
                            </div>
                        </li>
						<?php endif; ?><?php endif; ?>
<?php if ($this->options->naslist == '0'):?>                  
<?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
<?php while($categorys->next()): ?>
<?php if ($categorys->levels === 0): ?>
<?php $children = $categorys->getAllChildren($categorys->mid); ?>
<?php if (empty($children)) { ?><li class="nav-s"><a href="<?php $categorys->permalink(); ?>" title="<?php $categorys->name(); ?>"><?php $categorys->name(); ?></a></li>
<?php } else { ?>
<li class="drop-down"><a  href="<?php $categorys->permalink(); ?>" ><?php $categorys->name(); ?><i class="icon iconfont icon-icon-test37"></i></a><ul class="aui-nav-dow"><?php foreach ($children as $mid) { ?><?php $child = $categorys->getCategory($mid); ?><li><a href="<?php echo $child['permalink'] ?>" title="<?php echo $child['name']; ?>"><?php echo $child['name']; ?></a></li><?php } ?></ul>
</li>
<?php } ?>
<?php endif; ?>                  
<?php endwhile; ?>
  
<li class="drop-down"> <i class="msg_remind" style="display: inline;"></i>
<a href="#"><i class="icon iconfont icon-gengduo list_i"></i></a>
<ul class="aui-nav-dow">
<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>   
<?php while($pages->next()): ?>
<?php if($pages->status = 'publish'): ?><li><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li><?php endif; ?>
<?php endwhile; ?>
</ul>  
</li>
<?php else : ?>
<?php navtopinfo(); ?>
<?php endif; ?> 
<!--pc导航e-->
</ul>
<div id="sidebar-toggle" class="sidebar-toggle">
<span></span>
</div>
</nav>
</div>
<div class="top-bar-right pull-right text-right">
<div class="top-admin">
<!--站点统计开始-->              
<?php if ($this->options->sitelink): ?>
<a href="<?php $this->options->siteUrl(); ?><?php if ($this->options->rewrite==0): ?>index.php/<?php endif; ?><?php $this->options->sitelink(); ?>.html" class="stats_click"><i class="icon iconfont icon-ditu"></i> <?php _e('排行榜'); ?></a>		
<?php endif; ?>
<?php if ($this->options-> sitedate): ?>  
<a href="javascript:;" id="mStats" class="stats_click"><i class="icon iconfont icon-paihangbang"></i> <?php _e('统计'); ?>
						<div class="stats">
							<ul>
							<?php if ($this->options->sitedate): ?>
							<li><?php _e( '建站日期：' ); ?><?php $this->options->sitedate(); ?></li>
							<?php endif; ?>
							<?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
							<li><?php _e( '文章总数：' ); ?><?php $stat->publishedPostsNum() ?><?php _e( ' 篇' ); ?></li>
							<li><?php _e( '评论总数：' ); ?><?php $stat->publishedCommentsNum() ?><?php _e( ' 条' ); ?></li>
							<li><?php _e( '分类总数：' ); ?><?php $stat->categoriesNum() ?><?php _e( ' 个' ); ?></li>
							<li><?php _e( '最后更新：' ); ?><?php get_last_update(); ?></li>
							</ul>
						</div>	
</a>
<?php endif; ?>  
					<!--站点统计结束-->
						<div class="login avt_tl">
			            <?php if($this->user->hasLogin()): ?>							
							<div class="avt_cl"><?php $email=$this->user->mail; $imgUrl = getGravatar($email);echo '<img src="'.$imgUrl.'" width="25px" height="25px" class="navtar" >'; ?><!--s--><?php $this->need('member/nav_ainfo.php'); ?>
							<!--e--></div><?php else: ?>
			                <i class="icon iconfont icon-zengjia"></i><span><?php _e('登录'); ?>
			                
			                <!--s-->
			                <?php $this->need('member/notlogin.php'); ?>
			                <!--e-->
			                
			                </span>
			                
			            <?php endif; ?>
			            </div>
						<?php if ($this->options->night == '2'):?><input class="wb-switch" id="J_themesSwitchBtn" type="checkbox" onclick="javascript:switchNightMode()"><?php endif; ?>                
                        <!--夜间白天-->
				</div>
			</div>  
</div>
<!--e-->  
	<div id="percentageCounter"></div>
	</div><!-- .top-bar -->
	<div class="container">
	<main id="main" class="site-main">	