2017-08-30
这里是首页

### [RyShop 虚拟主机销售系统发布说明](http://127.0.0.1/readme "RyShop-Readme")

这里是关于 RyShop 虚拟主机销售系统发布说明以及安装方法，请持续关注此页面以便获取最新更新以及 bug 修复。

### [本站升级至 Typecho 开发版 1.1 (17.8.17)](http://127.0.0.1/index)

由于某些缘故，本站脱离原来的香港VPS，来到Vultr。
在搬家之后，出现白屏，500错误。打开debug之后出现如下错误：
最终还是被我成功解决了，方法大体如下：

用typecho在github的开发版，强制覆盖替换，删config.inc.php，重装，选择保留原数据，完全OK，网站首页已经可以进入。

接着发现在后台更换回原主题时，出现Call to undefined function token_get_all()错误，回VPS安装php7-tokenizer扩展，重启 php-fpm，成功解决。

希望对广大朋友有所帮助。
