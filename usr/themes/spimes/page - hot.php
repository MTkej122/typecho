<?php
/**
* 热门文章
*
* @package custom
*/
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="row">	
		<div class="col-md-9 contpost" <?php if ($this->options->rlweb == 'lble'):?>style="float: right;"<?php else : ?><?php endif; ?>>		
		        <header>
                    <div class="widget-list-title"><i class="icon iconfont icon-wenjuan"></i> <span><?php if($this->_currentPage>1) echo '第 '.$this->_currentPage.' 页 - '; ?><?php $this->archiveTitle(array('category'  =>  _t('%s ')), '', ''); ?></span></div>
                </header>		
				<div class="row" id="content">
                <?php $i=exicache('pagehot'); if(($this->options->txtopcas == '1') && $i ):?>               
                <?php fopagehot(); ?>
                <?php else: ?> 
                <?php hotlistViewed(); ?>
                <?php endif; ?>  
                <script>$(function(){$('.cck').hide(); });</script>
                <script>$(function(){$('.next').hide(); });</script>
				</div>				
		 </div>
		<?php $this->need('sidebar.php'); ?>
	</div>
<?php $this->need('footer.php'); ?>