<?php if($this->have()):?>
<?php while($this->next()): ?>
<?php if($this->category != $this->options->nolist): ?>



<?php if ($this->options->sequid): ?>
<?php if ($this->sequence == 12): ?>
<?php $this->need('assets/sequ.php'); ?>
<?php endif; ?><?php endif; ?>




<?php if (($this->sequence == 6) && ($this->options->slidenum !='-1')): ?>
<?php $this->need('assets/slide - list.php'); ?>
<?php endif; ?>




<?php if ($this->options->listadimg): ?>
<?php if ($this->sequence == 15): ?>
<div class="adimgs adTags"><div class="adTag">广告</div><?php $this->options->listadimg(); ?></div>
<?php endif; ?>
<?php endif; ?>


<?php $this->need('assets/list_box.php'); ?>



<?php endif; ?>
     <?php endwhile; ?>
	 <?php else:?>
        <div><p class="listnone">...看起来这里没有任何东西...</p></div>
    <?php endif?>