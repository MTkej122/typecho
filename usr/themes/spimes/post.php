<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php 

//  判断是否是点赞的 POST 请求
if (isset($_POST['agree'])) {
    //  判断 POST 请求中的 cid 是否是本篇文章的 cid
    if ($_POST['agree'] == $this->cid) {
        //  调用点赞函数，传入文章的 cid，然后通过 exit 输出点赞数量
        exit(agree($this->cid));
    }
    //  如果点赞的文章 cid 不是本篇文章的 cid 就输出 error 不再往下执行
    exit('error');
}

$this->need('header.php'); ?> 
	<div class="row">
	<div class="col-md-9 contpost" id="content" <?php if ($this->options->rlweb == 'lble'):?>style="float: right;"<?php else : ?><?php endif; ?>>  
    <?php if ($this->fields->Copyrightnew =='0'):?><div class="originalImg"></div><?php endif; ?> 
    <!--大图配置-->
    <?php if ($this->fields->abcimg =='bable' && $this->fields->videourl == null ):?>
    <div class="detail-wrap" ><div class="article__top-img js-article-top-img" ><div class="top-img" ><img src="<?php echo stcdnimg($this->fields->bimg); ?>" alt="<?php $this->title(); ?>" ></div></div></div>
    <?php endif; ?>
      <!--大图配置-->
      
      <?php if ($this->fields->videourl): ?>
      <?php $this->need('ext/danmu/post - dmplay.php'); ?>
      <?php endif; ?>          
		<article class="post <?php if ($this->fields->abcimg =='bable' && $this->fields->videourl == null ):?>bs_img<?php endif; ?>">
			<header class="entry-header page-header" >
			    <div class="">            
				<?php listdeng($this);?><span class="badge badge-hot"><?php $this->category(',', true, 'none'); ?></span>
                </div>
				<h1 class="entry-title page-title"><?php $this->title(); ?></h1>				
				<div class="contimg">
				<div class="author-infos" data-id="<?php echo geipuid($this->cid); ?>"><?php $email=$this->author->mail; $imgUrl = getGravatar($email);echo '<img src="'.$imgUrl.'" srcset="'.$imgUrl.'" class="avatar" height="35" width="35">'; ?>
				<div class="author-info-card">
					   <!--作者卡片-->
                       <!--作者卡片-->
					   </div>
				</div>
				</div>				
				<div class="entry-meta contpost-meta">					    
				    <a href="<?php $this->options->siteUrl(); ?><?php if ($this->options->rewrite==0): ?>index.php/<?php endif; ?>author/<?php $this->author->uid(); ?>">
				    <?php $this->author->screenName(); ?>
					</a><span class="separator">/</span>
					<?php if($this->category == "toss"): ?>
					<?php _e( '最后更新：' ); ?><?php echo date('m-d' , $this->modified); ?>
					<?php else : ?>
					<time datetime="<?php $this->date('c'); ?>"><?php $this->date('m-d'); ?></time>
					<?php endif; ?>
					<span class="separator">/</span>
					<a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('0 评论', '1 条评论', '%d 条评论'); ?></a>
					<span class="separator">/</span>
					<?php Postviews($this); ?> 阅读
					<span class="separator">/</span><?php zannum($this); ?>赞
					<?php if($this->user->hasLogin()):?>
					
					<?php if($this->user->uid == $this->author->uid):?>
					
					<i class="edit">
					<a href="<?php $this->options->siteUrl(); ?><?php $this->options->gaoedit(); ?>.html?tid=<?php $this->cid(); ?>" class="category-link"  target="_blank"><?php _e( '[编辑]' ); ?></a></i>
					
					<?php endif;?>
					
					<?php endif;?>
					<div class="post-intro"><?php echo reintro($this->author->uid); ?></div>
					
				</div>
				<div class="postArticle-meta">
				<i class="icon iconfont icon-icon-test4"></i> 本文阅读 <?php echo art_time($this->cid); ?> 分钟
				<?php $this->need('assets/link-s.php'); ?>
				</div>
				<div class="border-theme"></div>
			</header>
			<!--文章上方广告-->
            <?php if ($this->options->txtadimg): ?><div class="shadimg con_ad-top"><div class="adTags"><div class="adTag">广告</div><?php $this->options->txtadimg(); ?></div></div><?php endif; ?>
            <!--文章上方广告-->
            <div <?php if ($this->options->tsmore == '1'):?>class="show_text"<?php endif; ?>>               
			<div class="entry-content clearfix">
			    	
				<?php $connt=costcn($this->cid,$this->remember('mail',true),$this->content,$this->user->hasLogin());  echo $connt; ?>  
                <!--点赞s-->
                
                <?php $agree = $this->hidden?array('agree' => 0, 'recording' => true):agreeNum($this->cid); ?>                
                <div class="dianzan text-center">
                    
                <button <?php echo $agree['recording']?'disabled':''; ?> type="button" id="agree-btn" data-cid="<?php echo $this->cid; ?>" data-url="<?php $this->permalink(); ?>">
                <i class="icon iconfont icon-dianzan"></i>  
                <span>赞</span>
                <span class="agree-num"><?php echo $agree['agree']; ?></span>
                </button>
                </div>
                
                <!--点赞e-->
              
                <?php if ($this->fields->Copyrightnew =='0'):?>
                <div class="Copyrightnew">原创文章，作者：<?php $this->author->screenName(); ?>，如若转载，请注明出处：<?php $this->permalink() ?></div>
                <?php elseif($this->fields->Copyrightnew =='2') : ?>
                <div class="Copyrightnew">本文经授权后发布，本文观点不代表立场<?php if ($this->fields->Copyurl):?>，文章出自：<?php $this->fields->Copyurl(); ?><?php endif; ?></div>
                <?php else : ?>
                <div class="Copyrightnew">本文来自投稿，不代表本站立场，如若转载，请注明出处：<?php $this->permalink() ?></div>               
                <?php endif; ?> 
              </div>  
              <?php if ($this->options->tsmore == '1'):?>
              <div class="showall" >-- 展开阅读全文 --</div>
              <?php endif; ?>	
              </div>
            <?php $this->need('assets/sider - footer.php'); ?> 
			<footer class="entry-footer fixed" id="footfix">
			    <div class="entry-bar-inner">
				<div class="post-tags">
				<?php if(  count($this->tags) == 0 ): ?>   
				<?php $this->category(',', true, 'none'); ?>
                <?php else: ?>
				<?php $this->tags('', true, ''); ?>
				<?php endif; ?>
				</div>
				<div class="readlist">
				<div href="javascript:;" id="mClick" class="mobile_click">
                    <div class="share">					
					<div class="Menu-item"><a href="javascript:Share('tqq')"><i class="icon iconfont icon-qq"></i> <?php _e( 'QQ 分享' ); ?></a></div>
					<div class="Menu-item"><a href="javascript:Share('sina')"><i class="icon iconfont icon-weibo"></i> <?php _e( '微博分享' ); ?></a></div>
					<div class="Menu-item"><i class="icon iconfont icon-icon-test38"></i> <?php _e( '微信分享' ); ?><img src="<?php $this->options->themeUrl("poster/api.php"); ?>?url=<?php $this->permalink() ?>"/>
				</div></div>
				<div><i class="icon iconfont icon-fenxiang" title="分享转发"> </i><?php _e( '分享' ); ?></div>
				</div>
				<?php if ($this->fields->img): ?><div class="read_outer"><a class="comiis_poster_a" href="javascript:;" title="生成封面"><i class="icon iconfont icon-tupian"></i> <?php _e( '封面' ); ?></a></div><?php endif; ?>
				<div class="read_outer"><a class="read" href="javascript:;" title="阅读模式"><i class="icon iconfont icon-shuju"></i> <?php _e( '阅读' ); ?></a></div>
				</div>
				</div>
			</footer>
			</article>
<!--下一篇上一篇--> 
<div class="entry-page">
<?php thePrev($this); ?>
<?php theNext($this); ?> 
</div>
<!--下一篇上一篇-->
	<?php if ($this->options->txtaddown): ?><div class="shadbottom"><div class="adTags"><div class="adTag">广告</div><?php $this->options->txtaddown(); ?></div></div><?php endif; ?>  
	<!--相关文章s-->    
    <?php if (($this->options->closelun == '1') && ($this->fields->pinglun !='0')):?>
    <!--评论开启-->
    <?php $this->need('assets/post - more.php'); ?>      
    <?php else: ?>
    <!--评论关闭-->
    <?php $this->need('assets/post - mores.php'); ?>
    <?php endif; ?>
	<!--相关文章e-->
	<?php $this->need('comments.php'); ?>
	</div>
	<?php $this->need('sidebar.php'); ?>		
	</div>
<?php $this->need('footer.php'); ?>