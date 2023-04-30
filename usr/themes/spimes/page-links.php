<?php
/**
* 导航链接模板
*
* @package custom
*/
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div class="nav-content">
    <div class="row">
        <!--s导航-->
        <div class="nav-sidebar col-md-2">
            <nav class="nav"> 
              <span class="nav-title">站点导航</span>
              <ul class="nav-list">
   
                <li class="nav-list-item"><a href="#div-1" class="nav-item active"><i class="icon iconfont icon-dianzan1"></i> 最多点赞</a></li>  

                <li class="nav-list-item"><a href="#div-2" class="nav-item"><i class="icon iconfont icon-shoucang1"></i> 一周热门</a></li>  
                <li class="nav-list-item"><a href="#div-3" class="nav-item"><i class="icon iconfont icon-shoucang1"></i> 30天热门</a></li>  
               
                <li class="nav-list-item"><a href="#div-4" class="nav-item"><i class="icon iconfont icon-shuju1"></i> 标签导航</a></li>                
              </ul> 
              
              <span class="nav-title">关于我们</span>
              <ul class="nav-list">
                <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
		        <?php while($pages->next()): ?>
                <li class="nav-list-item"><a href="<?php $pages->permalink(); ?>" class="nav-item"><i class="icon iconfont icon-shouye1"></i> <?php $pages->title(); ?></a></li>
                <?php endwhile; ?>
                <!--<li class="nav-list-item"><a href="" class="nav-item"><i class="icon iconfont icon-shouye1"></i>  联系我们</a></li>
                <li class="nav-list-item"><a href="" class="nav-item"><i class="icon iconfont icon-shouye1"></i>  用户协议</a></li>
                <li class="nav-list-item"><a href="" class="nav-item"><i class="icon iconfont icon-shouye1"></i> 免责声明</a></li> -->           
              </ul> 
              
             
            </nav> 
          
            <div class="news-home">
              <a class="kr-link"  href="<?php $this->options->siteUrl(); ?>"><span class="icon iconfont icon-shouye1"></span>
                <span class="back-text kr-tags">返回首页</span>
              </a>
            </div>
          
        </div>
        <!--e导航-->
        <div class="nav-main col-md-10">
          
           <div class="navlists">
             
            <!--点赞排行榜-->
           
            <div id="div-1" class="mod-column column-nav resource" >
                <div class="mod-column-head">
                    <div class="mod-column-title">点赞排行榜</div>                 
                </div>
                <div class="big-mod-column-body">
                    <ul class="mod-list modnews row">            
                      
                      
<?php             

$html = null;
$counts = Typecho_Db::get()->fetchAll(Typecho_Db::get()
->select()                                      
->from('table.contents')
->where('type = ?', 'post')
->where('status = ?', 'publish')                                  
->order('agree', Typecho_Db::SORT_DESC)
->limit('12')
); 
foreach ($counts as $count) {              
$this->widget('Widget_Archive@hots'.$count['cid'], 'pageSize=1&type=post', 'cid='.$count['cid'])->to($ji);
$likes = $count['agree'];
$created = date('m-d', $ji->created);
$picsum = imgNum($ji->content);  
$imgUrl = getGravatar($ji->author->mail); 
$str = stcdnimg($ji->fields->img);  
if ($ji->fields->videourl){ $stico = '<i class="icon iconfont icon-icon-test15"></i>';}else{ $stico = imgNums($ji->content);}
$html=$html.'<li class="mod-list-item col-md-3 col-xs-6 col-sm-3"><div class="feaimg"><a href="'.$ji->permalink.'"  class="block-fea scrollLoading" data-url="'.$str.'"></a><div class="kan-icon">'.$stico.'</div></div><div class="modnews-content"><div class="modnews-title"><a href="'.$ji->permalink.'">'.$ji->title.'</a></div><div class="a_cl"> <div class="author-infos" data-id="'.$ji->author->uid.'"><img src="'.$imgUrl.'" class="avatar avatar-140 photo" height="22" width="22">
    

</div> '.$ji->author->screenName.' <span class="a_cl_r">'.$likes.'人点赞</span></div></div></li>';
}
echo $html;                  
?>                       
                       
                    </ul>                  
                </div>
            </div>
         
            <!--点赞排行榜-->
          
             
            <!--一周热门-->
            <div id="div-2" class="mod-column column-nav resource" >
                <div class="mod-column-head">
                    <div class="mod-column-title">一周热门</div>                 
                </div>
                <div class="big-mod-column-body">
                    <ul class="mod-list modnews row">            
                      
                      
<?php             
$period = time() - 604800; // 单位: 秒, 时间范围: 30天
$html = null;
$counts = Typecho_Db::get()->fetchAll(Typecho_Db::get()
->select()                                      
->from('table.contents')
->where('created > ?', $period )
->where('type = ?', 'post')
->where('status = ?', 'publish')                                  
->order('views', Typecho_Db::SORT_DESC)
->limit('12')
); 
foreach ($counts as $count) {              
$this->widget('Widget_Archive@hots'.$count['cid'], 'pageSize=1&type=post', 'cid='.$count['cid'])->to($ji);

$created = date('m-d', $ji->created);
$picsum = imgNum($ji->content);  
$imgUrl = getGravatar($ji->author->mail); 
$str = stcdnimg($ji->fields->img);  
if ($ji->fields->videourl){ $stico = '<i class="icon iconfont icon-icon-test15"></i>';}else{ $stico = imgNums($ji->content);}
$html=$html.'<li class="mod-list-item col-md-3 col-xs-6 col-sm-3"><div class="feaimg"><a href="'.$ji->permalink.'"  class="block-fea scrollLoading" data-url="'.$str.'"></a><div class="kan-icon">'.$stico.'</div></div><div class="modnews-content"><div class="modnews-title"><a href="'.$ji->permalink.'">'.$ji->title.'</a></div><div class="a_cl"> <img src="'.$imgUrl.'" class="avatar avatar-140 photo" height="22" width="22"> '.$ji->author->screenName.' <span class="a_cl_r">'.$created.' </span></div></div></li>';
}
echo $html;                  
?>                       
                       
                    </ul>                  
                </div>
            </div>
            <!--一周热门-->
             
            <!--30天热门-->  
                 <div id="div-3" class="mod-column column-nav resource" >
                <div class="mod-column-head">
                    <div class="mod-column-title">30天热门</div>                 
                </div>
                <div class="big-mod-column-body">
                    <ul class="mod-list modnews row">
    
 <?php             
$period = time() - 2592000; // 单位: 秒, 时间范围: 30天
$htmls = null; 
$counts = Typecho_Db::get()->fetchAll(Typecho_Db::get()
->select()                                      
->from('table.contents')
->where('created > ?', $period )
->where('type = ?', 'post')
->where('status = ?', 'publish')                                  
->order('views', Typecho_Db::SORT_DESC)
->limit('12')
); 
foreach ($counts as $count) {              
$this->widget('Widget_Archive@hotss'.$count['cid'], 'pageSize=1&type=post', 'cid='.$count['cid'])->to($jis);
$views = $count['views'];  
$created = date('m-d', $jis->created);
$picsum = imgNum($jis->content);  
$str = stcdnimg($jis->fields->img); 
if ($jis->fields->videourl){ $stico = '<i class="icon iconfont icon-icon-test15"></i>';}else{ $stico = imgNums($jis->content);}
$imgUrl = getGravatar($jis->author->mail);  
$htmls=$htmls.'<li class="mod-list-item col-md-3 col-xs-6 col-sm-3"><div class="feaimg"><a href="'.$jis->permalink.'" class="block-fea scrollLoading" data-url="'.$str.'"></a><div class="kan-icon">'.$stico.'</div></div><div class="modnews-content"><div class="modnews-title"><a href="'.$jis->permalink.'">'.$jis->title.'</a></div><div class="a_cl"> <img src="'.$imgUrl.'" class="avatar avatar-140 photo" height="22" width="22"> '.$jis->author->screenName.' <span class="a_cl_r">'.$views.' 阅读</span></div></div></li>';
}
echo $htmls;                  
?>         
                       
                    </ul>                  
                </div>
            </div>
            <!--30天热门-->
             
             
              <!--标签导航s-->  
             <div id="div-4" class="mod-column column-nav">
                <div class="mod-column-head">
                    <div class="mod-column-title">标签导航</div>                    
                </div>
                <div class="mod-column-body">
                    <ul class="spimes-tags">
                    
                <?php $this->widget('Widget_Metas_Tag_Cloud', array('sort' => 'count', 'ignoreZeroCount' => true, 'desc' => true, 'limit' => 65))->to($taglist); ?>       
                      
               <?php while($taglist->next()): ?>
                <li><a href="<?php $taglist->permalink(); ?>" title="<?php $taglist->name(); ?>">#<?php $taglist->name(); ?></a></li>
                <?php endwhile; ?>
            </ul>
                </div>
            </div>
             <!--标签导航e-->
             
             
             <div id="div-6" class="mod-column column-nav"><?php $this->need('comments.php'); ?></div>
            
             

 
       </div>
     
        <!--导航结束-->
        </div>
    </div>
</div>

<?php $this->need('footer.php'); ?>