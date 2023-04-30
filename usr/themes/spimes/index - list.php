<?php if($this->have()):?>
<?php while($this->next()): ?>
<?php if ($this->options->sequid): ?>
<?php if ($this->sequence == 12): ?>
<?php $this->need('assets/sequ.php'); ?>
<?php endif; ?>
<?php endif; ?>

<!--图文模式s-->
<?php $this->need('assets/list_box.php'); ?>
<!--图文模式e-->


     <?php endwhile; ?>
	 <?php else:?>
        <div><p class="listnone">...看起来这里没有任何东西...</p></div>
    <?php endif?>