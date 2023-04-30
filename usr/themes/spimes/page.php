<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="row">
	<div class="col-md-9 contpost" id="content" <?php if ($this->options->rlweb == 'lble'):?>style="float: right;"<?php else : ?><?php endif; ?>>
		<article class="post">
			<header class="entry-header page-header" >
			<h1 class="entry-title page-title"><?php $this->title(); ?></h1>	
			<div class="border-theme"></div>
			</header>
			<div class="entry-content clearfix">
            	
				<?php $connt=costcn($this->cid,$this->remember('mail',true),$this->content,$this->user->hasLogin());  echo $connt; ?>                  
			</div>
			</article>	
<?php $this->need('comments.php'); ?>
</div>
<?php $this->need('sidebar.php'); ?>		
</div>
<?php $this->need('footer.php'); ?>
