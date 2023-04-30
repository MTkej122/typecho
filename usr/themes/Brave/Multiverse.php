﻿<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
/**
 * Multiverse风格照片集
 *
 * @package custom
 */
?>
<!-- 
作者：ZhangDi
https://github.com/zzd/photo-page-for-typecho
时间:2021-11-03 版权所有，请勿删除 
-->
<!-- jsdelivr公共CDN -->
<?php
function usePublicCdn()
{
	echo "http://cdn.txykoke.cn";
}
?>
<!-- 公共CDN结束 -->
<!-- 相册图片对象存储供应商，用以加载缩略图 -->
<?php
function storage($storage)
{
	if ($storage == "UPYUN") {
		echo "!/fw/640/quality/85";
	} elseif ($storage == "OSS") {
		echo "?x-oss-process=image/resize,w_640/quality,q_85";
	} elseif ($storage == "KODO") {
		echo "?imageView2/2/w/640/q/85";
	} elseif ($storage == "COS") {
		echo "?imageView2/2/w/640/q/85";
	} else
		echo "";
}
?>
<!-- 自动缩略图结束 -->
<!DOCTYPE HTML>
<html>

<head>
	<title><?php $this->title() ?> - <?php $this->options->title() ?></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="<?php usePublicCdn(); ?>/Multiverse/main.css" />
	<link rel="shortcut icon" href="<?php $this->options->siteUrl(); ?>/favicon.ico">
	<noscript>
		<link rel="stylesheet" href="<?php usePublicCdn(); ?>/Multiverse/noscript.css" /></noscript>

</head>

<body class="is-preload">
	<!-- Wrapper -->
	<div id="wrapper">
		<!-- Header -->
		<header id="header">
			<h1><a href="<?php $this->permalink() ?>"><strong><?php $this->title() ?></strong> Powered by ZDSR</a></h1>
			<nav>
				<ul>
					<li><a href="#footer" class="icon solid fa-info-circle">关于</a></li>
				</ul>
			</nav>
		</header>
		<!-- Main -->
		<div id="main">
		</div>
		<!-- Footer -->
		<footer id="footer" class="panel">
			<div class="inner split">
				<div>
					<section>
						<h2>控制台</h2>
						<p>本系统共有<span id="count_CN"></span>张图片。</p>
						
					</section>
					<section>
						<ul class="icons">
							<?php if ($this->fields->Twitter) : ?>
								<li><a href="<?php echo $this->fields->Twitter; ?>" class="icon brands fa-twitter" target="_blank"><span class="label">Twitter</span></a></li>
							<?php endif ?>
							<?php if ($this->fields->Facebook) : ?>
								<li><a href="<?php echo $this->fields->Facebook; ?>" class="icon brands fa-facebook-f" target="_blank"><span class="label">Facebook</span></a></li>
							<?php endif ?>
							<?php if ($this->fields->Instagram) : ?>
								<li><a href="<?php echo $this->fields->Instagram; ?>" class="icon brands fa-instagram" target="_blank"><span class="label">Instagram</span></a></li>
							<?php endif ?>
							<?php if ($this->fields->GitHub) : ?>
								<li><a href="<?php echo $this->fields->GitHub; ?>" class="icon brands fa-github" target="_blank"><span class="label">GitHub</span></a></li>
							<?php endif ?>
						</ul>
					</section>
					<p class="copyright">
						<!-- 虽说本页面制作容易，但也需要一点点时间编辑，请保留版权信息。 -->
						&copy; 2022 <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a> Powered by <a href="https://github.com/zzd/photo-page-for-typecho">ZDSR</a></a>.
					</p>
				</div>
				<div>
					<section>
						<h2>关于<?php $this->title() ?></h2>
						<?php if ($this->fields->about) : ?>
							<p><?php echo $this->fields->about; ?></p>
						<?php else : ?>
							<p>koke💕hyn</p>
						<?php endif ?>
					</section>
				</div>
			</div>
		</footer>
	</div>
	<!--
		动态读取数据 by ZhangDi
		https://github.com/zzd/photo-page-for-typecho
	-->
	<script type="text/javascript">
		var datas =
`<?php
	$html = $this->row['text'];
	echo $html;
?>`;
		datas = datas.split("\n");
		for (var i = 0; i < datas.length; i++) {
			datas[i] = datas[i].split(",");
		}

		function creatArticle(datas) {
			var parent = document.getElementById("main");
			for (var i = 0; i < datas.length; i++) {
				var article = document.createElement("article");
				article.className = "thumb";
				parent.appendChild(article);
				var a = document.createElement("a");
				a.className = "image";
				a.href = datas[i][2];
				article.appendChild(a);
				var img = document.createElement("img");
				img.src = datas[i][2] + "<?php storage($this->fields->CDN); ?>";
				a.appendChild(img);
				var h2 = document.createElement("h2");
				h2.innerHTML = datas[i][0];
				article.appendChild(h2);
				var p = document.createElement("p");
				p.innerHTML = datas[i][1];
				article.appendChild(p);
			}
		}
		creatArticle(datas);
		document.getElementById("count_EN").innerHTML = document.getElementById("count_CN").innerHTML = datas.length;
	</script>
	<!-- Scripts -->
	<script src="<?php usePublicCdn(); ?>/Multiverse/jquery.min.js"></script>
	<script src="<?php usePublicCdn(); ?>/Multiverse/jquery.poptrox.min.js"></script>
	<script src="<?php usePublicCdn(); ?>/Multiverse/browser.min.js"></script>
	<script src="<?php usePublicCdn(); ?>/Multiverse/breakpoints.min.js"></script>
	<script src="<?php usePublicCdn(); ?>/Multiverse/util.js"></script>
	<script src="<?php usePublicCdn(); ?>/Multiverse/main.js"></script>
</body>

</html>