<?php
// 判断用户登录
session_start();
require('RyBlog');

// 登录判断操作
RyBlog::login();

// 判断是否执行退出操作
if(isset($_GET['a'])&&$_GET['a']=='logout'):
	RyBlog::logout();
endif;

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
<a href="/admin.php?a=logout" class="pull-right">注销</a>
</form>
CNT;

if (isset($info)) {
	$content = $info.$content;
}

RyBlog::view("站点设置",$content,null,$sitename,$siteurl,$theme);

?>

