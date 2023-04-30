
<?php 
header('Content-Type: text/html;charset=utf-8');
$cid=$_POST["id"];
$gepoid=$_POST["gepoid"];
$genum=$_POST["genum"];
if($cid!=''){  //视频播放
$this->widget('Widget_Archive@indexxiu', 'pageSize=1&type=post', 'cid='.$cid)->to($ji);    
$vurl=$ji->fields->videourl;
$aaa =  array('name'=>$vurl,'cid'=>$cid);
$bbb  =json_encode($aaa);
echo $bbb;  
exit();
}
elseif( $gepoid!=''){
$html = get_kuaixun();
$aaa =  array('vuser'=>$html);
$bbb  =json_encode($aaa);
echo $bbb;  
exit();
}
//------------
else{
    if($genum!=''){  //用户作品
       
       $siteUrl = Helper::options()->siteUrl;
       
       $username=getuname($genum);
       $usermail=getGravatar(getumail($genum));
       
       $useruid=$genum;
       $usergroup=yonghuzu($useruid);
       $userurl=$siteUrl.'author/'.$useruid;
       $userimg = nerPosts($useruid);
       $intro = reintro($useruid);
       $aaa=array('userimg'=>$userimg,'username'=>$username,'usermail'=>$usermail,'usergroup'=>$usergroup,'userurl'=>$userurl,'userintro'=>$intro);
       $bbb  =json_encode($aaa);
       echo $bbb;  
       exit();
    }
}
//--------------
?>

<?php

/**
* 关于我们
*
* @package custom
*/

if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>


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
