<?php
// 判断用户登录
session_start();
require('RyBlog');
require('config');

// 登录判断操作
RyBlog::login();

if(isset($_GET['d'])){
	RyBlog::delete("./".$content_dir.'/'.$_GET['d'].$extension);
}

$request = explode('/', $_SERVER["REQUEST_URI"]);

if(count($request)==2){
	if($local&&!isset($_POST['title'])&&!isset($_POST['content'])&&!isset($_POST['slug'])){
		// 写作
		RyBlog::new("新建文章..","请开始你的写作","请输入文件名称(无需扩展名)",null,$sitename,$siteurl,$theme);
	}
	else{
		RyBlog::update($_POST['title'],$_POST['content'],"null","./".$content_dir.'/'.$_POST['slug'].$extension);
		header("location:/".$_POST['slug']);
	}
}
else{
	// 文章修改
	if($local&&!isset($_POST['title'])&&!isset($_POST['content'])){
		
		$content_file = "./".$content_dir.'/'.$request[2].$extension;
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
		RyBlog::edit($content_title,$content_text,$request[2],$content_date,$sitename,$siteurl,$theme);
	
	}
	else if(isset($_POST['title'])&&isset($_POST['content'])){
		RyBlog::update($_POST['title'],$_POST['content'],"null","./".$content_dir.'/'.$request[2].$extension);
		header("location:/".$request[2]);
	}
		
}
?>