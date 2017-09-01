<?php

# 
# Markdown to Blog
# Author: Rytia
# Blog: http://www.zzfly.net
# Powered by Parsedown
#

require 'Parsedown.php';
require 'config.php';

// 获取请求地址
//echo $_SERVER["REQUEST_URI"];
if($_SERVER["REQUEST_URI"] != '/')
{
	$request = explode('/', $_SERVER["REQUEST_URI"]);
	if($request[1]=="index"){
		header("location:/");
	}else{
		$content_file = $local ? '.'.$content_dir.'/'.$request[1].$extension : $content_dir.'/'.$request[1].$extension;
	}
}
else
{
	$content_file = $local ? '.'.$content_dir.'/'."index".$extension : $content_dir.'/'."index".$extension;
}

// 获取文件内容
$content_array = file($content_file);
// 获取发表日期
$content_date = $content_array[0];
array_shift($content_array);
// 获取页面标题
$content_title = $content_array[0];
array_shift($content_array);
// 获取正文内容
$content_text = implode("",$content_array);
$Parsedown = new Parsedown();

// 生成关联数组
$rsblog = ['title' => $content_title, 'content' => $Parsedown->text($content_text), 'date' => $content_date, 'sitename' => $sitename, 'siteurl' => $siteurl, 'theme' => '/theme/'.$theme]; 
// 引用主题文件
include './theme/'.$theme.'/index.php';
?>