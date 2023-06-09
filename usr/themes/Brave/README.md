## Brave

> Typecho情侣主题Brave

- 作者主页：https://blog.zwying.com/
- Git仓库：https://github.com/zwying0814/Brave
- 主题宗旨：简洁、超强、开源、精华

#### 主题简介：

Brave主题是一款适合有对象的博主使用 
有计时器🧭、留言板✍、恋爱清单📜、点点滴滴记录💕等功能
基本上是保留了Cupid主题的所有功能，UI重新进行了设计。

#### 更新历史

**V1.2 (20220520)**
1. 此版本运行环境要求typecho1.2.0
2. 修复pjax回调失效
3. 修复评论翻页样式错误
4. cdn源由jsd切换至字节
5. 修复8小时差错误
6. 其他一些bug修复


#### 二次开发

1. 增加樱花飘落特效
2. 添加时光机、记忆相册、关于我们界面
3. 增加留言显示IP属地、设备和浏览器
4. 祝福版增加快捷祝福快捷添加表情
5. 去掉pjax无刷新
6. UI美化
7. 增加鼠标点击文字效果


#### 主题配置

第一步：将主题压缩包完整上传到服务器上 Typecho 的/usr/themes/文件夹内，解压，然后到 Typecho 后台-控制台-外观-启用主题。

第二步：启用后，创建对应页面，这里有三个页面需要创建，分别是首页、祝福板、Love List（一定要选择对应的模板！！！）。保存祝福板页面，和Love List页面的地址，后面会用到。

#### 恋爱清单使用说明

参数说明：

status为0将显示灰色对勾，代表未完成此项，为1会显示绿色对勾，代表完成此项
img后面可以填写图片的链接，将显示在清单展开后，不填默认灰色填充

#### 主题目录介绍（非实时）

├── base 头部脚部加载文件

├── core 主题核心文件夹

├── svg 恋爱清单使用的svg

├── public 共用的一些模块文件

├── about.php 关于我们页面

├── commentPage.php.php 祝福板页面

├── Lens.php 相册页面1

├── functions.php 主题的外观、功能设置

├── index.php 博客首页页面

├── loveListPage.php 恋爱清单页面

├── Multiverse.php 相册页面2

├── post.php 点点滴滴文章页面

├── screenshot.php 主题截图图片

└── timemachine.php.php 时光机页面

