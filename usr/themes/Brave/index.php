<?php

/**
 * 勇敢爱 - Typecho情侣主题
 * @package     Brave
 * @author      Veen Zhao
 * @version     1.2
 * @link        https://blog.zwying.com
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('base/head.php');
$this->need('base/nav.php');
?>

<div class="list-content mx-auto mt-5">
    <div class="list-top">
        <h5 class="list-text">💕世间最动情之事，莫过于两人相依💑，走过四季三餐的温暖。<br>📜相信在以后会有更多美好的事情发生😊</h5>
        <?php if ($this->have()) : ?>
            <?php while ($this->next()) : ?>
                <article style="padding: 20px;border-bottom: 1.2px solid rgba(0,123,255,.2);text-align: center;border-radius: 8px; box-shadow: 1px 4px 15px rgb(125 147 178 / 30%);margin-bottom: 25px;" class="post" itemscope itemtype="http://schema.org/BlogPosting">
                    <h4 class="post-title" itemprop="name headline"><a class=" list-wbc" itemprop="url" style="color: #973444;" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h4>
                    <time datetime="<?php $this->date('c'); ?>"  itemprop="datePublished"> <?php $this->author(); ?> </time>
                    <time datetime="<?php $this->date('c'); ?>" class="lover-card-title" itemprop="datePublished">  深情地写于 </time>
                    <time datetime="<?php $this->date('c'); ?>"  itemprop="datePublished"><?php $this->date(); ?></time>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <article class="post">
                <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
            </article>
        <?php endif; ?>
        <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    </div>
</div>
<?php $this->need('base/footer.php'); ?>