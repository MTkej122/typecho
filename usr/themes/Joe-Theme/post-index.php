<?php

/**
 * 首页
 * 
 * @package custom 
 * 
 **/

?>
<!DOCTYPE html>
<html lang="zh-Hans-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width" />
    <title>老狮的梦</title>		
    <link href="<?php $this->options->themeUrl(); ?>css/layui.css" rel="stylesheet" type="text/css">  
    <link href="<?php $this->options->themeUrl(); ?>css/index_style.css" rel="stylesheet" type="text/css">
    <link href="<?php $this->options->themeUrl(); ?>css/animate.min.css" rel="stylesheet" type="text/css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" >
    
</head>
<body>
    <div id="menu" class="hover_animation menu_open" data-mark="false">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div id="navgation" class="navgation navgation_close">
        <ul class="point">
            <li><a href="#">首页</a></li>
            <li><a href="https://laolion.com">博客</a></li>
            <li><a href="/gbook.html">留言</a></li>
        </ul>
        <div class="logo"><a>老狮</a></div>
    </div>
    <div class="section" id="section1">
        <div class="fp-tablecell">
            <div class="page1">
                <div class="nav wow zoomIn" data-wow-duration="2s">
                    <h1>老狮的梦</h1>
                    <p>一只游走在广袤无垠的草原老狮！</p>
                    <a class="layui-btn layui-btn-normal" style="margin-top: 20px" href="https://laolion.com">Enter Blog</a>
                </div>
                <a class="next wow fadeInUp" data-wow-duration="2s" id="next"></a>
            </div>
        </div>
    </div>
    <div class="section" id="section2">
        <div class="fp-tablecell">
            <div class="page2">
                <div class="warp-box">
                    <div class="new-article">
                        <div class="inner wow fadeInDown" data-wow-delay=".2s">
                            <h1>栏目分类</h1>                            
                        </div>
                    </div>
                    <div class="layui-row">
                        <div class="layui-col-xs12 layui-col-sm4 layui-col-md4  wow fadeInUp" style="padding: 0 10px">
                            <div class="single-news">
                                <div class="news-head">
                                    <img src="https://laolion.com/usr/uploads/2020/03/2402724754.png">
                                    <a href="https://laolion.com/category/game/" class="link"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="news-content">
                                    <h4>
                                        <a href="https://laolion.com/category/game/">
                                           游戏人生
                                        </a>
                                    </h4>                                    
                                    <p>
                                       这里是牛头人的故乡，一片绿意盎然一望无际的大草原，置身其中真叫人心旷神怡流连忘返，一路欣赏沿途的风景都忘记了打怪升级了......
                                    </p>                                    
                                </div>
                            </div>
                        </div>
                        <div class="layui-col-xs12 layui-col-sm4 layui-col-md4  wow fadeInUp" data-wow-delay=".2s" style="padding: 0 10px">
                            <div class="single-news">
                                <div class="news-head">
                                    <img src="https://laolion.com/usr/uploads/2021/03/4096227207.jpg">
                                    <a href="https://laolion.com/category/code/" class="link"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="news-content">
                                    <h4>
                                        <a href="https://laolion.com/category/code/">
                                           网络代码
                                        </a>
                                    </h4>                                   
                                    <p>
                                        自从博客加了悬浮音乐播放器后就一直在折腾换页音乐不中断的功能，在网上查找后发现想要实现换页音乐不中断的功能必须要为博客加pjax......
                                    </p>                                    
                                </div>
                            </div>
                        </div>
                        <div class="layui-col-xs12 layui-col-sm4 layui-col-md4  wow fadeInUp" data-wow-delay=".4s" style="padding: 0 10px">
                            <div class="single-news">
                                <div class="news-head">
                                    <img src="https://laolion.com/usr/uploads/2020/11/1087236984.jpg">
                                    <a href="https://laolion.com/category/momisc/" class="link"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="news-content">
                                    <h4>
                                        <a href="https://laolion.com/category/momisc/">
                                            观影听音
                                        </a>                                    </h4>
                                    
                                    <p>
                                       甘道夫说服弗罗多将魔戒护送到精灵王国瑞文希尔，弗罗多在好朋友山姆、皮平和梅利的陪同下，在跃马旅店得到了刚铎王子阿拉贡的帮助，历经艰难......
                                    </p>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    
    <footer class="footer wow fadeInUp" id="contact">
        
        <div class="copyright">
            <div class="container">
                <div class="layui-row">
                    <div class="layui-col-xs12 layui-col-sm12 layui-col-md12 text-center">
                        <p><span><img src="https://laolion.com/img/beian.png"><a href="http://www.beian.gov.cn/portal/registerSystemInfo"> 皖34081102000372号</a></span>&nbsp;皖ICP备19022537号</p>
                    </div>
                </div>
            </div>
        </div>  
    </footer>
    <script src="<?php $this->options->themeUrl(); ?>js/layui.js"></script>
    <script src="<?php $this->options->themeUrl(); ?>js/wow.min.js"></script>
    <script src="<?php $this->options->themeUrl(); ?>js/index.js"></script>
</body>
</html>