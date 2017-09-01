2017-08-30
本站升级至 Typecho 开发版 1.1 (17.8.17)

由于某些缘故，本站脱离原来的香港VPS，来到Vultr。
在搬家之后，出现白屏，500错误。打开debug之后出现如下错误：
最终还是被我成功解决了，方法大体如下：

用typecho在github的开发版，强制覆盖替换，删config.inc.php，重装，选择保留原数据，完全OK，网站首页已经可以进入。

接着发现在后台更换回原主题时，出现Call to undefined function token_get_all()错误，回VPS安装php7-tokenizer扩展，重启 php-fpm，成功解决。

希望对广大朋友有所帮助。

#### 最后醒醒，本文纯属虚构，本站通过 Markdown to Blog 构建！

---

© [Sentris 64MB VPS](https://github.com/zzfly256/Markdown-to-Blog/tree/master/content)