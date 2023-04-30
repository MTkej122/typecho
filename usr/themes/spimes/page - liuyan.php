<?php
/**
* 留言页面
*
* @package custom
*/

if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php $this->need('header.php'); ?>

<style>  body { background: url(<?php $this->options->themeUrl('images/demobg.jpg'); ?>) no-repeat top;}  
</style>
     
<script language='javascript'>
            function checkform(){
            	if(document.forma.username.value==''){
            		alert('请填写您的姓名!!');
            		document.forma.username.focus();
            		return false;
            	}
            	if(document.forma.title.value==''){
            		alert('请填写您的联系电话!!');
            		document.forma.title.focus();
            		return false;
            	}   
			  alert('提交成功!!');             
            	return true;             
            }
</script>

  <div class="bg">
   <div class="inner-content">
   <div class="join-content">
   <div class="top">
   <h1>有话要说</h1>
   </div>
    <div class="main">
<form action="" method="post" class="input-form" name=forma onsubmit='return checkform();'>
<div class="input-box field-feedbackmodel-name required">
<label class="" >你的姓名</label><input type="text" name="username"  placeholder="必填：请输入姓名">
</div>
<div class="input-box field-feedbackmodel-name required">
<label class="" >联系方式</label><input type="text"  name="title" placeholder="必填：请输入联系方式">
</div>



<div class="input-box mh100 field-feedbackmodel-content required">
<label class="" >留言说明</label><textarea name="content" placeholder="格式：内容 + 链接（维权）"></textarea>
</div>
<div class="submit-box">
                        <button class="submit-btn" type="submit" name="dosubmit"><span>提交</span></button>
                    </div>
</form>
<div class="txts">
<ul>
<?php
     
    //留言板的思路：1.先创建一个文件名，方便于存放写入的内容
    // 2.将表单中的内容赋值给一个变量
    //3.判断文件是否存在，将用户输入的值写进变量，打开文件的是时候注意选择对文件访问的操作
    //4.读取文件的内容,关闭文件    
    
    $filename = "message.txt";//创建一个文件的名字     
    //如果用户提交了， 就写入文件， 按一定格式写入
    if(isset($_POST['dosubmit'])) {
    //字段的分隔使用||, 行的分隔使用[n]
    $mess = "姓名：{$_POST['username']}||".time()."||联系电话：{$_POST['title']}||留言内容：{$_POST['content']}[n]";
      
    $Sermess = "姓名：{$_POST['username']}||联系电话：{$_POST['title']}||留言内容：{$_POST['content']}";
      
    $mess = trim($mess);  //清理空格  

    $mess = strip_tags($mess);   //过滤html标签  

    $mess = htmlspecialchars($mess);   //将字符内容转化为html实体  

    $mess = addslashes($mess);  //防止SQL注入 
      
    $sckey = $this->options->Serkey;
      
    file_get_contents("https://sc.ftqq.com/{$sckey}.send?text=新的留言信息哦&desp={$Sermess}");//Server酱SCKEY
     
    writemessage($filename, $mess);//向文件写进内容     
    }     
    if(file_exists($filename)) {//判断文件 是否存在
    readmessage($filename);//读取文件的函数
    }
     
    function writemessage($filename, $mess) {
    $fp = fopen($filename, "a");//在尾部执行写的操作，且不删除原来的文件内容
    fwrite($fp, $mess);//写入文件     
    fclose($fp);//关闭文件     
    header('location:/');     
    }     
    function readmessage($filename) {
    $mess = file_get_contents($filename);
    $mess = rtrim($mess, "[n]");     
    $arrmess = explode("[n]", $mess);
     
   // foreach($arrmess as $m) {
   // list($username, $dt ,$title, $content) = explode("，", $m);
   // $time = date("Y-m-d H:i",$dt);
   // echo "<li>".$time."<br/> {$username} {$title} {$content}</li>";
   // }     
    }
     
    ?>
</ul>
</div>      
</div>
<div class="ship">
<img src="<?php $this->options->themeUrl('images/top-banner-news-winter.jpg'); ?>">
<div class="desqtxt">本站所提供的文章资讯、软件资源、图片视频等内容均为作者提供、网友推荐、互联网整理而来（部分报媒/平媒内容转载自网络合作媒体），仅供学习参考，如有侵犯您的版权，请联系我们，本站将在三个工作日内改正。</div>
</div>
   </div>
   </div>
  </div>


<?php $this->need('footer.php'); ?>