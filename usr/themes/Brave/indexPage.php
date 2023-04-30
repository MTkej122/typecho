<?php
/**
 * 主题首页
 * @package custom
 * Author: Veen Zhao
 * CreateTime: 2021/2/6 22:32
 */
$this->need('base/head.php');
$this->need('base/nav.php');
?>
<div class="container">
    <blockquote class="blockquote text-center my-5 py-2">
        <h5 class="card-title lover-card-title">我们风雨同舟已经一起走过</h5>
        <h5 id="site_runtime"></h5>
    </blockquote>
    <div class="row indexPlate">
        
        <div class="col-md-4">
             <a href="<?php $this->options->aboutPageLink() ?>" class="card" style="order-radius: 8px !important; box-shadow: 1px 4px 15px rgb(125 147 178 / 30%); border:1px solid rgba(208,206,206,.4)!important; margin:10px; background: #fafafa; cursor:pointer" >
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="avatar avatar-md">
                                <img src="<?php $this->options->aboutPageIcon() ?>" alt="..." class="avatar-img rounded-circle">
                            </div>
                        </div>
                        <div class="col">
                            <p class="h5">关于我们</p>
                            <p class="small text-muted mb-1">💑我们的经历</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-md-4">
            <a href="<?php $this->options->blessingPageLink() ?>" class="card " style="order-radius: 8px !important; box-shadow: 1px 4px 15px rgb(125 147 178 / 30%); border:1px solid rgba(208,206,206,.4)!important; margin:10px; background: #fafafa;">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="avatar avatar-md">
                                <img src="<?php $this->options->blessingPageIcon() ?>" alt="..." class="avatar-img rounded-circle">
                            </div>
                        </div>
                        <div class="col">
                            <p class="h5">祝福板</p>
                            <p class="small text-muted mb-1">💌写下你的祝福</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="/index.php/blog/" class="card" style="order-radius: 8px !important; box-shadow: 1px 4px 15px rgb(125 147 178 / 30%); border:1px solid rgba(208,206,206,.4)!important; margin:10px; background: #fafafa;">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="avatar avatar-md">
                                <img src="<?php $this->options->timePageIcon() ?>" alt="..." class="avatar-img rounded-circle">
                            </div>
                        </div>
                        <div class="col">
                            <p class="h5">点点滴滴</p>
                            <p class="small text-muted mb-1">💖记录你我生活</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="<?php $this->options->loveListPageLink() ?>" class="card " style="order-radius: 8px !important; box-shadow: 1px 4px 15px rgb(125 147 178 / 30%); border:1px solid rgba(208,206,206,.4)!important; margin:10px; background: #fafafa;">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="avatar avatar-md">
                                <img src="<?php $this->options->loveListPageIcon() ?>" alt="..." class="avatar-img rounded-circle">
                            </div>
                        </div>
                        <div class="col">
                            <p class="h5">Love List</p>
                            <p class="small text-muted mb-1">📜甜蜜有你陪伴</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-md-4">
            <a href="<?php $this->options->timemachinePageLink() ?>" class="card" style="order-radius: 8px !important; box-shadow: 1px 4px 15px rgb(125 147 178 / 30%); border:1px solid rgba(208,206,206,.4)!important; margin:10px; background: #fafafa;">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="avatar avatar-md">
                                <img src="<?php $this->options->timemachinePageIcon() ?>" alt="..." class="avatar-img rounded-circle">
                            </div>
                        </div>
                        <div class="col">
                            <p class="h5"style="font-family:FangzhengKT;color:#3B3838;">时光机</p>
                            <p class="small text-muted mb-1" >🕖你言我语</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-md-4">
            <a href="<?php $this->options->albumPageLink() ?>" class="card" style="order-radius: 8px !important; box-shadow: 1px 4px 15px rgb(125 147 178 / 30%); border:1px solid rgba(208,206,206,.4)!important; margin:10px; background: #fafafa;">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="avatar avatar-md">
                                <img src="<?php $this->options->albumPageIcon() ?>" alt="..." class="avatar-img rounded-circle">
                            </div>
                        </div>
                        <div class="col">
                            <p class="h5">记忆相册</p>
                            <p class="small text-muted mb-1">🖼️留住你我回忆</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
    </div>
</div>
<?php $this->need('base/footer.php'); ?>