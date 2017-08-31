2017-08-31
在HTML中如何实现鼠标指上之后更换图片？

突然看到有人于 segmentfault 提出这个问题，不幸由于问题过水被强制关闭了，答案写了一半无法提交甚至遗憾，那么我来这儿解答一下。

1.如果是div等块级元素，那么可以通过CSS的 :hover 伪类，改变 `background-image` 属性值即可。
2.如果是 `<img src='' />` 这种图片元素，那么可以通过 jQuery 监听 ``mouseover`` ``mouseout`` 这两个事件，通过以下方法改变 src 属性的值。

> $("#imgId").attr('src',path);