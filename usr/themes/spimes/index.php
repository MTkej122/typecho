<?php
/**
 * Spimes版本,一款简约新闻自媒体类的 typecho 主题，设计上简约、干净、精致、响应式，后台设置更是强大而且实用的新闻自媒体类主题
 *
 * @package Spimes 主题
 * @author 小灯泡设计
 * @version 4.6 
 * @link https://blog.ococn.cn
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');

/** 文章置顶 */
$sticky = $this->options->zhiduid; //置顶的文章cid，按照排序输入, 请以半角逗号或空格分隔
if($sticky && $this->is('index') || $this->is('front')){
    $sticky_cids = explode(',', strtr($sticky, ' ', ','));//分割文本 
    $sticky_html = "<span class='badge arc_v6'>置顶</span>"; //置顶标题的 html
    $db = Typecho_Db::get();
    $pageSize = $this->options->pageSize;
    $select1 = $this->select()->where('type = ?', 'post');
    $select2 = $this->select()->where('type = ? && status = ? && created < ?', 'post','publish',time());
    //清空原有文章的列队
    $this->row = [];
    $this->stack = [];
    $this->length = 0;
    $order = '';
    foreach($sticky_cids as $i => $cid) {
        if($i == 0) $select1->where('cid = ?', $cid);
        else $select1->orWhere('cid = ?', $cid);
        $order .= " when $cid then $i";
        $select2->where('table.contents.cid != ?', $cid); //避免重复
    }
    if ($order) $select1->order(null,"(case cid$order end)"); //置顶文章的顺序 按 $sticky 中 文章ID顺序
    if ($this->_currentPage == 1) foreach($db->fetchAll($select1) as $sticky_post){ //首页第一页才显示
        $sticky_post['sticky'] = $sticky_html;
        $this->push($sticky_post); //压入列队
    }
$uid = $this->user->uid; //登录时，显示用户各自的私密文章
    if($uid) $select2->orWhere('authorId = ? && status = ?',$uid,'private');
    $sticky_posts = $db->fetchAll($select2->order('table.contents.created', Typecho_Db::SORT_DESC)->page($this->_currentPage, $this->parameter->pageSize));
    foreach($sticky_posts as $sticky_post) $this->push($sticky_post); //压入列队
    $this->setTotal($this->getTotal()-count($sticky_cids)); //置顶文章不计算在所有文章内
}
?>
<div class="row">
<div class="col-md-9 contpost" <?php if ($this->options->rlweb == 'lble'):?>style="float: right;"<?php else : ?><?php endif; ?>>
<?php if($this->is('index') && $this->_currentPage == 1): ?>		
<?php $this->need('assets/index - hd.php'); ?>
<?php if ($this->options->hdadimg): ?>
<div class="adimgs adTags"><div class="adTag">广告</div><?php $this->options->hdadimg(); ?></div>
<?php endif; ?>
<?php $this->need('assets/index - i.php'); ?>
<?php endif; ?>
<div class="row" id="content">
<?php $this->need('index - one.php'); ?>
<script>$(function(){$('.cck').show();});</script>
<script>$(function(){$('.next').show();});</script>
</div>
<?php if ($this->is('index')): ?><?php $this->need('assets/nav-pages.php'); ?><?php endif; ?>
</div>
<?php $this->need('sidebar.php'); ?>
</div>
<?php $this->need('footer.php'); ?>