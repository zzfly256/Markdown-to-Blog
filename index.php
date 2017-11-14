<?php

# 
# Markdown to Blog
# Author: Rytia
# Blog: http://www.zzfly.net
# Powered by Parsedown
#

require 'Parsedown';
require 'config';
require 'RyBlog';

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

// 判断文件是否存在
if (is_file($content_file)):
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
else:
	$content_title = "文件未找到";
	$content_text = "请检查地址是否正确噢！";
	$content_date = null;
endif;

// 调用主题
$Parsedown = new Parsedown();
RyBlog::view($content_title,$Parsedown->text($content_text),$content_date,$sitename,$siteurl,$theme);
?>