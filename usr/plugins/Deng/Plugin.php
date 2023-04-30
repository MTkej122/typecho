<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 针对Spimes主题的用户会员社区开发插件(奉天博客blog.ococn.cn)
* <div class="FansSet"><a href="https://blog.ococn.cn/" target="_blank">问题反馈</a>&nbsp;</div><style>.FansSet{margin-top: 5px;}.FansSet a{background: #4DABFF;padding: 5px;color: #fff;}</style>
 * @package Deng 插件 for Spimes主题
 * @author 小灯泡设计
 * @version 1.0
 * @link https://blog.ococn.cn/
 */
class Deng_Plugin extends Widget_Abstract_Users implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
	
	  self::install();	
		
      Typecho_Plugin::factory('Widget_Register')->register = array('Deng_Plugin', 'zhuce'); 
	  Typecho_Plugin::factory('Widget_Register')->finishRegister = array('Deng_Plugin', 'zhucewan');
      Typecho_Plugin::factory('Widget_Login')->loginSucceed = array('Deng_Plugin', 'Loginwan');
      //百度推送
      Typecho_Plugin::factory('Widget_Contents_Post_Edit')->finishPublish = array('Deng_Plugin', 'publish_push');
      Typecho_Plugin::factory('Widget_Contents_Post_Edit')->finishSave = array('Deng_Plugin', 'save_push');
      
      Typecho_Plugin::factory('Widget_Archive')->footer = array('Deng_Plugin', 'auto_push');
	  //输入密码or页面跳转限制
      Typecho_Plugin::factory('admin/footer.php')->end = array('Deng_Plugin', 'footerjs');
      
      
 
	  //Typecho_Plugin::factory('Widget_Users_Profile')->filter = array('Deng_Plugin', 'usertip');
      //Typecho_Plugin::factory(' Widget_Users_Edit')->filter = array('Deng_Plugin', 'usertip');
      $index = Helper::addMenu('会员信息');
      Helper::addPanel($index, 'Deng/html/profile.php', '会员信息', '管理会员信息', 'administrator');
      
      
      //找回密码
      Helper::addRoute('Deng_forgot', '/Deng/forgot', 'Deng_Widget', 'doForgot');
      Helper::addRoute('Deng_reset', '/Deng/reset', 'Deng_Widget', 'doReset');
      return _t('请配置此插件的SMTP信息, 以使您的插件生效');
      
	  
    }
    

    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){
        
        Helper::removeRoute('Deng_reset');
        Helper::removeRoute('Deng_forgot');
        
        $index = Helper::removeMenu('会员信息');
		Helper::removePanel($index, 'Deng/html/profile.php');
        return _t('插件已被禁用');
        
    }
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {

    $yonghuzu = new Typecho_Widget_Helper_Form_Element_Radio('yonghuzu',array(
      'visitor' => _t('访问者'),
      'subscriber' => _t('关注者'),
      'contributor' => _t('贡献者'),
      'editor' => _t('编辑'),
      'administrator' => _t('管理员')
    ),'subscriber',_t('注册用户默认用户组设置'),_t('<p class="description">
不同的用户组拥有不同的权限，具体的权限分配表请<a href="http://docs.typecho.org/develop/acl" target="_blank" rel="noopener noreferrer">参考这里</a>.<br>---------------<br>1,编辑or管理员可以进入后台编辑管理权限<br>2,贡献者可以进行投稿，发布，无权限进入后台，视为认证用户<br>3,关注者为普通注册用户,无发文章权限</p>'));
    $form->addInput($yonghuzu); 
    
    $newsend = new Typecho_Widget_Helper_Form_Element_Text('newsend', NULL, 'NULL', _t('爱语飞飞推送key'), _t(''));
  
    $form->addInput($newsend);
    
    //拓展设置
    $tuozhan = new Typecho_Widget_Helper_Form_Element_Checkbox('tuozhan', 
    array('register-nb' => _t('勾选该选项后台注册功能将可以直接设置注册密码(默认登录注册页面)'),
),
    array(), _t('拓展设置'), _t('仅限程序后台页面有效'));
    $form->addInput($tuozhan->multiMode());
    
    
    //拓展设置
    $noato = new Typecho_Widget_Helper_Form_Element_Checkbox('noato', 
    array('pa-noato' => _t('访问默认登录注册页自动跳转主题注册登录页面'),
),
    array(), _t('页面权限'), _t('禁止访问默认登录注册页面'));
    $form->addInput($noato->multiMode());
    
 

    $api = new Typecho_Widget_Helper_Form_Element_Text('api', NULL, 'NULL', _t('推送设置(百度)：接口调用地址'), _t('站长工具-普通收录-资源提交-API提交-接口调用地址<br>(格式如下：http://data.zz.baidu.com/urls?site=https://blog.ococn.cn/&token=xxxxxxxxxxx)<br>---------------<br>注意事项<br>1,为null,为空则不执行推送设置<br>2,管理员和编辑发布，则会跳转后台管理页面,其他会员发布则跳回个人主页<br>3,文章保存的时候也是和发布文章一样执行跳转'));
  
    $form->addInput($api->addRule('required', _t('请填写接口调用地址')));
    
    $noarc = new Typecho_Widget_Helper_Form_Element_Checkbox('noarc', 
    array('noarc' => _t('是否前台访问自动提交到百度推送(页面会加载百度推送js文件)'),));
    $form->addInput($noarc->multiMode());   
    
    
    
   
    //密码找回
    
    $host = new Typecho_Widget_Helper_Form_Element_Text('host', NULL, '', _t('服务器(SMTP)'), _t('如: smtp.exmail.qq.com'));
        $port = new Typecho_Widget_Helper_Form_Element_Text('port', NULL, '465', _t('端口'), _t('如: 25、465(SSL)、587(SSL)'));

        $username = new Typecho_Widget_Helper_Form_Element_Text('username', NULL, '', _t('帐号'), _t('如: hello@example.com'));
        $password = new Typecho_Widget_Helper_Form_Element_Password('password', NULL, NULL, _t('密码'));

        $secure = new Typecho_Widget_Helper_Form_Element_Select('secure',array(
            'ssl' => _t('SSL'),
            'tls' => _t('TLS'),
            'none' => _t('无')
        ), 'ssl', _t('安全类型'));

        $form->addInput($host);
        $form->addInput($port);
        $form->addInput($username);
        $form->addInput($password);
        $form->addInput($secure);


      
      
//    $tcat = new Typecho_Widget_Helper_Form_Element_Text('tcat', NULL, NULL, _t('特例分类'), _t('在这里填入一个分类mid，分类间用英文的半角逗号隔开如【1,2】，这些分类贡献者发布文章必须需要经过审核！'));
//    $form->addInput($tcat);
    }
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
public static function personalConfig(Typecho_Widget_Helper_Form $form){}
    
	
 public static function install()
    {

        try {
            return self::addTable();
        } catch (Typecho_Db_Exception $e) {
            if ('42S01' == $e->getCode()) {
                $msg = '数据库已存在!';
                return $msg;
            }
        }
    }	
	
	public static function addTable()
	    {
	        $db = Typecho_Db::get();
			$prefix = $db->getPrefix();
			$db->query('ALTER TABLE `'.$db->getPrefix().'contents` ADD `views` INT(10) DEFAULT 0;');
			$db->query('ALTER TABLE `'.$db->getPrefix().'users` ADD `uviews` INT(10) DEFAULT 0;');
			$db->query('ALTER TABLE `' . $prefix . 'contents` ADD `agree` INT(10) NOT NULL DEFAULT 0;');
			$db->query('ALTER TABLE `'.$db->getPrefix().'users` ADD `points` INT(10) DEFAULT NULL;'); 
			$db->query('ALTER TABLE `'.$db->getPrefix().'users` ADD `pointy` INT(10) DEFAULT NULL;'); 
			$db->query('ALTER TABLE `'.$db->getPrefix().'users` ADD `introduce` varchar(200) DEFAULT NULL;'); 
			
			
	    }
	
    /**
     * 插件实现方法
     * 
     * @access public
     * @return void
     */
public static function zhuce($v) {
  /*获取插件设置*/
  $yonghuzu = Typecho_Widget::widget('Widget_Options')->plugin('Deng')->yonghuzu;
  $hasher = new PasswordHash(8, true);
  /*判断注册表单是否有密码*/
  if(isset(Typecho_Widget::widget('Widget_Register')->request->password)){
    /*将密码设定为用户输入的密码*/
    $generatedPassword = Typecho_Widget::widget('Widget_Register')->request->password;
  }else{
    /*用户没输入密码，随机密码*/
    $generatedPassword = Typecho_Common::randString(7);
  }
  /*将密码设置为常量，方便下个函数adu()直接获取*/
  define('passd', $generatedPassword);
  /*将密码加密*/
  $wPassword = $hasher->HashPassword($generatedPassword);
  /*设置用户密码*/
  $v['password']=$wPassword;
  /*将注册用户默认用户组改为插件设置的用户组*/
  $v['group']=$yonghuzu;
  /*返回注册参数*/
  return $v;
}
public static function zhucewan($obj) {
 /*获取密码*/
 $wPassword=passd;
 /*登录账号*/
 $obj->user->login($obj->request->name,$wPassword);
 /*删除cookie*/
 Typecho_Cookie::delete('__typecho_first_run');
 Typecho_Cookie::delete('__typecho_remember_name');
 Typecho_Cookie::delete('__typecho_remember_mail');
 /*发出提示*/
 $obj->widget('Widget_Notice')->set(_t('用户 <strong>%s</strong> 已经成功注册, 密码为 <strong>%s</strong>', $obj->screenName, $wPassword), 'success');
 /*跳转地址(后台)*/
 if (NULL != $obj->request->referer) {
 $obj->response->redirect($obj->request->referer);
 }else if(NULL != $obj->request->tz){
   if (Helper::options()->rewrite==0){$authorurl=Helper::options()->rootUrl.'/index.php/author/';}else{$authorurl=Helper::options()->rootUrl.'/author/';}
  $obj->response->redirect($authorurl.$obj->user->uid);
 }else{
 $obj->response->redirect($obj->options->adminUrl);
 }
}
public static function Loginwan($obj) {
    
 /*跳转地址(后台)*/
 if (NULL != $obj->request->referer) {
 $obj->response->redirect($obj->request->referer);
 }
 else{
 $obj->response->redirect($obj->options->adminUrl);
 }
 
 
}

public static function footerjs(){
   if (!empty(Typecho_Widget::widget('Widget_Options')->plugin('Deng')->tuozhan) && in_array('register-nb',  Typecho_Widget::widget('Widget_Options')->plugin('Deng')->tuozhan)){
?>
<script>
var Denghtml='<p><label for="password" class="sr-only">密码</label><input type="password"  id="password" name="password" placeholder="输入密码" class="text-l w-100" autocomplete="off" required></p><p><label for="confirm" class="sr-only">确认密码</label><input type="password"  id="confirm" name="confirm" placeholder="再次输入密码" class="text-l w-100" autocomplete="off" required></p>';
$("#mail").parent().after(Denghtml);
</script>
<?php
   }
   
   
    if (!empty(Typecho_Widget::widget('Widget_Options')->plugin('Deng')->noato) && in_array('pa-noato',  Typecho_Widget::widget('Widget_Options')->plugin('Deng')->noato)){
?>
<script>
 if ($(".typecho-login").length > 0) {
   
     window.location.href = 'http://'+window.location.hostname;
 }
</script>
<?php
   }
 }
 
 
 /** 第三方信息推送 */
public static function newsend($a,$b){
    
    $sckey = Typecho_Widget::widget('Widget_Options')->plugin('Deng')->newsend;
    $text = $a;
    $desp = $b;
    
    $postdata = http_build_query(
    array(
        'text' => $text,
        'desp' => $desp
        )
    );
    $opts = array('http' =>array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata
        ),
        // 解决SSL证书验证失败的问题
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        )
    );
    $context  = stream_context_create($opts);
    file_get_contents('https://iyuu.cn/'. $sckey .'.send', false, $context);
    
}

 /**
     * 发布文章时使用接口推送
     * 
     * @access public
     * @return void
     */
public static function publish_push($content, $edit)
    {
        $api = Typecho_Widget::widget('Widget_Options')->plugin('Deng')->api;
        if($api !== 'NULL' || $api!=='') {
        
        $db = Typecho_Db::get();
        $siteUrl = Typecho_Widget::widget('Widget_Options')->index;

        $content['cid'] = $edit->cid;
        $content['slug'] = $edit->slug;
        
        //用以判断跳转地址
        $authorId = $edit->authorId;
        $rewrite = Typecho_Widget::widget('Widget_Options')->rewrite;
        if($rewrite==0){ $authorurl = $siteUrl.'index.php/author/'.$authorId; }
        else{  $authorurl = $siteUrl.'/author/'.$authorId; }
        
        $row = $db->fetchRow($db->select('group')->from('table.users')->where('uid = ?', $authorId));
        if($row['group']=='administrator' ||$row['group']=='editor' ){
            $authorurl = $siteUrl.'/admin/manage-posts.php';
        }
        //https://www.acgmkan.com/action/1/author/1
        
        //获取分类缩略名
        $content['category'] = urlencode(current(Typecho_Common::arrayFlatten($db->fetchAll($db->select()->from('table.metas')
            ->join('table.relationships', 'table.relationships.mid = table.metas.mid')
            ->where('table.relationships.cid = ?', $content['cid'])
            ->where('table.metas.type = ?', 'category')
            ->order('table.metas.order', Typecho_Db::SORT_ASC)), 'slug')));

        //获取并格式化文章创建时间
        $content['created'] = $edit->created;
        $created = new Typecho_Date($content['created']);
        $content['year'] = $created->year; $content['month'] = $created->month; $content['day'] = $created->day;

        //生成URL
        $url = Typecho_Common::url(Typecho_Router::url($content['type'], $content), $siteUrl);

        //发送请求
        $urls = array(0=>$url);
        $ch = curl_init();
        $options =  array(
            CURLOPT_URL => $api,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => implode("\n", $urls),
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
        );
        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        
        $res = json_decode($result, true);
        
        if($row['group']=='administrator' ||$row['group']=='editor' ){
            
        }
        else{
            
       $text = "有人发表了文章";
       $desp = "有人在您的博客发表了文章";    
            
        Deng_Plugin::newsend($text,$desp);    
        
        
        if(isset($res['error'])) exit('<script>alert("链接提交百度接口失败！错误代码：'.$res['error'].'，错误信息：'.$res['message'].'。");location.href="'.$authorurl.'";</script>');
        else exit('<script>alert("发布成功");location.href="'.$authorurl.'";</script>');
        
        }
        
        }
        
    } 
 
public static function save_push($content, $edit)
{   $siteUrl = Typecho_Widget::widget('Widget_Options')->index;
    $authorId = $edit->authorId;
     $db = Typecho_Db::get();
    
        $rewrite = Typecho_Widget::widget('Widget_Options')->rewrite;
        if($rewrite==0){ $authorurl = $siteUrl.'index.php/author/'.$authorId; }
        else{  $authorurl = $siteUrl.'/author/'.$authorId; }
        
        $row = $db->fetchRow($db->select('group')->from('table.users')->where('uid = ?', $authorId));
        if($row['group']=='administrator' ||$row['group']=='editor' ){
            $authorurl = $siteUrl.'/admin/manage-posts.php';
        }
    
    if(true) exit('<script>alert("保存成功");location.href="'.$authorurl.'";</script>');
}
 
 
    /**
     * 用户浏览文章时自动推送
     * 
     * @access public
     * @return void
     */
public static function auto_push()
    {
        
         $noarc = Typecho_Widget::widget('Widget_Options')->plugin('Deng')->noarc;
         if(!empty($noarc === 'NULL')){
             
       
        echo PHP_EOL.'<script>
(function(){
  var bp = document.createElement("script");
  var curProtocol = window.location.protocol.split(":")[0];
  if (curProtocol === "https"){
    bp.src = "https://zz.bdstatic.com/linksubmit/push.js";
  }else{
    bp.src = "http://push.zhanzhang.baidu.com/push.js";
  }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>'.PHP_EOL;
    } 
    }
 
}
