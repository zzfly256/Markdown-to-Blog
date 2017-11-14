<?php
// 判断用户登录
session_start();

// 已登录
if (isset($_SESSION['user'])) {
	// 从文件读入用户名密码
	require('user');
	$userInfo = md5($user."ryblog".$password);
	
	// 登录失败
	if (strcmp($_SESSION['user'],$userInfo)!=0)
	{
		die("安全错误");
	}
}
// 处理登录请求
if (!isset($_SESSION['user'])&&isset($_POST['user'])) {
	// 从文件读入用户名密码
	require('user');
	$userInfo = md5($user."ryblog".$password);
	$loginInfo = md5($_POST['user']."ryblog".$_POST['password']);
	
	// 登录失败
	if (strcmp($loginInfo,$userInfo)!=0)
	{
		die("用户名密码错误");
	}
	else{
		$_SESSION['user'] = $loginInfo;
	}
}
else if (!isset($_SESSION['user'])&&!isset($_POST['user'])) {
// 未登录
include('config');
$content = <<<CNT
<form action="/admin.php" method="POST" >
<div class="form-group">
	<label for="user">用户名</label>
	<input class="form-control" name="user" placeholder="用户名"/>
</div>
<div class="form-group">
	<label for="password">密码</label>
	<input class="form-control" name="password" placeholder="密码" />
</div>
<input class="btn btn-default" type="submit" name="" value="登录" />
</form>
CNT;

$rsblog = ['title' => "登录", 'content' =>$content , 'date' => NULL, 'sitename' => $sitename, 'siteurl' => $siteurl, 'theme' => '/theme/'.$theme]; 
// 引用主题文件
include './theme/'.$theme.'/index.php';
die();
}

if(isset($_POST['sitename'])):

// 合成变量
foreach ($_POST as $key => $value) {
	$$key = $value;
}

// 生成配置文件

$new = <<<EOT
<?php
# 
# Markdown to Blog
# Author: Rytia
# Config file
#
// 站点名称
\$sitename = "$sitename";
// 站点Url
\$siteurl = "$siteurl";
// 文本扩展名
\$extension = "$extension";
// 是否本地保存，使用 Github 等请填写 false
\$local = "$local";
// 文本保存目录 / 在线地址
\$content_dir = "$content_dir";
// 网站主题
\$theme = "$theme";
?>
EOT;

$fp = fopen("config", "w");
fwrite($fp, $new);
fclose($fp);

$info = '<div class="alert alert-success">配置已更新</div>';

else:
	include('config');
endif;

$content = <<<CNT
<form action="/admin.php" method="POST" >
<div class="form-group">
	<label for="sitename">站点名称</label>
	<input class="form-control" name="sitename" value="$sitename" />
</div>
<div class="form-group">
	<label for="siteurl">站点Url</label>
	<input class="form-control" name="siteurl" value="$siteurl" />
</div>
<div class="form-group">
	<label for="extension">文本扩展名</label>
	<input class="form-control" name="extension" value="$extension" />
</div>
<div class="form-group">
	<label for="local">是否本地保存，使用 Github 等请填写 false</label>
	<select class="form-control" name="local" value="$local">
	<option value="true">是</option>
	<option value="false">否</option>
	</select>
</div>
<div class="form-group">
	<label for="content_dir">文本保存目录 / 在线地址</label>
	<input class="form-control" name="content_dir" value="$content_dir" />
</div>
<div class="form-group">
	<label for="theme">网站主题</label>
	<input class="form-control" name="theme" value="$theme" />
</div>
<input class="btn btn-default" type="submit" name="" value="提交" />
</form>
CNT;

if (isset($info)) {
	$content = $info.$content;
}

// 生成关联数组
$rsblog = ['title' => "站点设置", 'content' =>$content , 'date' => NULL, 'sitename' => $sitename, 'siteurl' => $siteurl, 'theme' => '/theme/'.$theme]; 
// 引用主题文件
include './theme/'.$theme.'/index.php';
?>

