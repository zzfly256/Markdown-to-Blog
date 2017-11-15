null
Sentris 小站
### [在HTML中如何实现鼠标指上之后更换图片的问答](http://sentris.x64.men/hover "hover")

然看到有人于 segmentfault 提出这个问题，不幸由于问题过水被强制关闭了，答案写了一半无法提交甚至遗憾，那么我来这儿解答一下。
1.如果是div等块级元素，那么可以通过CSS的 :hover 伪类，改变 `background-image` 属性值即可。
2.如果是 `<img src='' />` 这种图片元素，那么可以通过 jQuery 监听 ``mouseover`` ``mouseout`` 这两个事件，通过以下方法改变 src 属性的值。

![image](https://ws1.sinaimg.cn/large/d3ea10bdgy1fj33uavl5sj20iw0a675u.jpg)

### [RyShop 虚拟主机销售系统发布说明](http://sentris.x64.men/ryshop "RyShop-Readme")

这里是关于 RyShop 虚拟主机销售系统发布说明以及安装方法，请持续关注此页面以便获取最新更新以及 bug 修复。

### [本站升级至 Typecho 开发版 1.1 (17.8.17)](http://sentris.x64.men/typecho)

由于某些缘故，本站脱离原来的香港VPS，来到Vultr。
在搬家之后，出现白屏，500错误。打开debug之后出现如下错误：
最终还是被我成功解决了，方法大体如下：

用typecho在github的开发版，强制覆盖替换，删config.inc.php，重装，选择保留原数据，完全OK，网站首页已经可以进入。

接着发现在后台更换回原主题时，出现Call to undefined function token_get_all()错误，回VPS安装php7-tokenizer扩展，重启 php-fpm，成功解决。

希望对广大朋友有所帮助。

---

© [Sentris 64MB VPS](https://github.com/zzfly256/Markdown-to-Blog/tree/master/content)