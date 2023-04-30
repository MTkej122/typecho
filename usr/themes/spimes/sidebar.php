<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="col-md-3 widget-area <?php if (($this->is('post')) && ($this->options->postimask == '1') ): ?>post_sider<?php endif; ?>" id="secondary">
  <?php if (!empty($this->options->sidebarBlock) && in_array('ShowAboutMe', $this->options->sidebarBlock)): ?>
  <?php if ($this->is('post')): ?>
    <section class="widget abautor g_m_i">
        <h4 class="widget-title"><i class="icon iconfont icon-icon-test24"></i> <span><?php _e('作者信息'); ?></span></h4>
        <div class="widget-list"> 
        <div class="av_v">  
		<a class="av_v_img author-infos author-left" data-id="<?php $this->author->uid(); ?>" href="<?php $this->options->siteUrl(); ?><?php if ($this->options->rewrite==0): ?>index.php/<?php endif; ?>author/<?php $this->author->uid(); ?>"><?php $email=$this->author->mail; $imgUrl = getGravatar($email);echo '<img class="widget-about-image" src="'.$imgUrl.'" srcset="'.$imgUrl.'" class="avatar avatar-140 photo" height="70" width="70">'; ?>
			<div class="author-info-card"><!--作者卡片--></div>
        </a>
        <?php if ($this->options->viphonor): ?><div class="av_v_honor"><img src="<?php $this->options->viphonor(); ?>" title="注册用户"></div><?php endif; ?>      
        </div>
        <div class="widget-about-intro">
        <div class="name"><?php $this->author->screenName(); ?></div>
        <div class="widget-intro"><?php echo reintro($this->author->uid); ?></div>
		<div class="widget-about-desc">发表文章 <?php echo allpostnum($this->author->uid); ?> 篇 </div><div class="widget-article-newest"><span>最新文章</span></div>
		<ul class="posts-widget"><?php authorPosts($this->author->uid);?></ul>
        </div>           
        </div>
    </section>
	<?php endif; ?>
    <?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowAd', $this->options->sidebarBlock) && ($this->options->adimg)): ?>
<section class="widget_img"><div class="adTags"><div class="adTag">广告</div>
<?php $this->options->adimg(); ?></div>
</section>
<?php endif; ?> 

<!--快讯-->
<?php if (!empty($this->options->sidebarBlock) && in_array('Showkx', $this->options->sidebarBlock)): ?>
<section class="widget g_m_i widget_kuaixun">
<h4 class="widget-title"><i class="icon iconfont icon-wodeguanzhu"></i> <span><?php _e('动态快讯'); ?></span></h4>
<ul class="widget-kx-list">
    
<div class='postpj'><div class='loading-5'><i></i><i></i></div></div>
</ul>
</section>   
<?php endif; ?>
<!--快讯-->

<?php if (!empty($this->options->sidebarBlock) && in_array('Showauthors', $this->options->sidebarBlock)): ?>
<?php if ($this->is('index')): ?>
<?php $i=exicache('pagemember'); if(($this->options->txtopcas == '1') && $i ):?> 
<section class="widget hunter-widget-hunter-authors g_m_i">
<h4 class="widget-title"><i class="icon iconfont icon-wodeguanzhu"></i> <span><?php _e('互动读者'); ?></span></h4>
<div class="hunter-cont">
<ul class="hunter-authors">
<?php fosmember(); ?>
</ul>
</div>
</section>
<?php endif; ?>       

<?php endif; ?>  
<?php endif; ?> 
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowSidebarPosts', $this->options->sidebarBlock)): ?>
<section class="widget g_m_i">
<h4 class="widget-title"><i class="icon iconfont icon-paihangbang"></i> <span><?php _e('热门文章'); ?></span></h4>
<div class="list-rounded my-n2">
<?php $i=exicache('hot'); if(($this->options->txtopcas == '1') && $i ):?> 
<?php foDatahot(); ?>
<?php else: ?> 
<?php theMostViewed(); ?>
<?php endif; ?>  
</div>
</section>
<?php endif; ?>  
  
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowSidebarzan', $this->options->sidebarBlock)): ?>  
<?php $i=exicache('hot'); if(($this->options->txtopcas == '1') && $i ):?>   
<section class="widget abautor g_m_i">
<h4 class="widget-title"><i class="icon iconfont icon-paihangbang"></i> <span><?php _e('最多点赞'); ?></span></h4> 
<?php foslikehot(); ?>
</section>
<?php endif; ?> 
<?php endif; ?>  
  
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowAds', $this->options->sidebarBlock) && ($this->options->adimgs)): ?>
<section class="widget_img"><div class="adTags"><div class="adTag">广告</div>
<?php $this->options->adimgs(); ?></div>
</section>
<?php endif; ?>  
  
<?php if (!empty($this->options->sidebarBlock) && in_array('Showtag', $this->options->sidebarBlock)): ?>
<section class="widget widget-hunter-topics g_m_i">
	<h4 class="widget-title"><i class="icon iconfont icon-huatifuhao"></i> <span><?php _e('标签TAG'); ?></span></h4>
	<div class="items">	  
<?php $this->widget('Widget_Metas_Tag_Cloud', array('sort' => 'count', 'ignoreZeroCount' => true, 'desc' => true, 'limit' => 12))->to($tags); ?>
<?php if($tags->have()): ?>
<?php while ($tags->next()): ?>
    <div class="item "><div class="wall-item"><a href="<?php $tags->permalink(); ?>" rel="tag"><h2> <i class="clr_orange">#</i> <?php $tags->name(); ?> </h2></a></div></div>
<?php endwhile; ?>
<?php else: ?>
<?php _e('没有任何标签'); ?>
<?php endif; ?>
</div>
<?php if ($this->options->sidetag): ?>
<div class="viewAll">
<a href="<?php $this->options->sidetag(); ?>"  class="btn btn-default"> 更多标签 <i class="icon iconfont icon-gengduo"></i> </a>
 </div>
<?php endif; ?>
</section>
<?php endif; ?>
<?php if ($this->options->closelun == '1') :?>  
 <?php if (!empty($this->options->sidebarBlock) && in_array('ShowlastComments', $this->options->sidebarBlock)): ?>
    <section class="widget g_m_i">
		<h4 class="widget-title"><i class="icon iconfont icon-taolunqu"></i> <span><?php _e('热评文章'); ?></span></h4>
        <ul class="posts-widget">
        <?php $i=exicache('siderping'); if(($this->options->txtopcas == '1') && $i ):?>   
        <?php fosping();?>
        <?php else: ?>
        <?php getHotPosts('5');?>  
        <?php endif; ?>   
      </ul>
    </section>
    <?php endif; ?>
 <?php endif; ?>    
   <?php if ($this->is('page')): ?><?php else: ?>
	<div class="widget-fixed">
    <?php if ($this->options->closelun == '1'):?>
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>    
    <section class="widget wRecent g_m_i">
		<h4 class="widget-title"><i class="icon iconfont icon-yuyin"></i> <span><?php _e('最近回复'); ?></span></h4>
        <?php $this->widget('Widget_Comments_Recent','ignoreAuthor=false&pageSize=4')->to($comments); ?>
        <?php while($comments->next()): ?>
				<div class="item"><div class="meta"><div class="meta-item"> <span class="comment-avatar"><i class="thumb " style="background-image:url(<?php $email=$comments->mail; $imgUrl = getGravatar($email);echo ''.$imgUrl.''; ?>)"></i></span> <?php $comments->author(); ?><?php if ($comments->authorId != '0'):  ?><span class="autlv aut-4 vs">V</span><?php endif; ?><?php autvip($comments->mail);?></div>				
				<span class="views"><?php $comments->dateWord(); ?></span>
				</div>
				<div class="comment-content"><a href="<?php $comments->permalink(); ?>" ><?php $cos=parseBiaoQing($comments->content); echo $cos;?></a></div>
				<h2> <i class="icon iconfont icon-taolunqu"></i><a href="<?php $comments->permalink(); ?>" >  <?php $comments->title(); ?> </a> </h2>
				</div>
        <?php endwhile; ?> 
      <?php if ($this->options->liuynes): ?>
<div class="viewAll"><a href="<?php $this->options->liuynes(); ?>"  class="btn btn-default"> 我要留言 <i class="icon iconfont icon-gengduo"></i> </a></div>
<?php endif; ?></section><?php endif; ?><?php endif; ?></div><?php endif; ?></div>
