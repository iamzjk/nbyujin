=== WP Baidu Map ===
Contributors: suifengtec
Donate link: http://coolwp.com/wp-baidu-map.html
Tags: map, baidu
Requires at least: 3.0.1
Tested up to: 4.9.1
Stable tag: 1.2.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

这是一个用于在你的网站上显示自定义百度地图的插件。
== Description ==

真搞不明白为什么那么多人把针对百度搜索引擎的网站地图插件叫做 WordPress 百度地图插件,那么叫的话,让真正的WordPress百度地图插件情何以堪啊?


= 使用 =



可使用编辑器右上方的地图按钮插入地图(支持输入地址后,解析为百度地图的坐标);

或者，你也可使用短代码自行插入地图: 在你想调用百度地图的地方使用短代码调用百度地图，示例:

`
[baidu_map id='abcd' zl='17' nm='0' w='100%' h='450px' lon='135' lat='35' biz_name='酷威普' address='这里输入地址' email='my@email.ltd' phone='010-12345678']
`

支持自定义地图的缩放等级(默认为17)，支持隐藏地图上跳动的 marker.

== Screenshots ==

1. 正常状态下是一个跳动(实际跳动幅度大于截图上的)的红色图钉.
2. 点击图钉后显示企业/团队的联系方式,图钉还是处于跳动状态.
3.  使用说明.


== Installation ==
= 安装 =
就像其它插件那样安装就行了！

安装之后,需要更换主文件 wp-baidu-map.php 中的百度地图AK：
`
/*================= 设置百度地图 AK =================*/
    public static $ak = '你的百度地图AK';

/*================= //设置百度地图 AK =================*/
`

百度地图AK，可以在百度地图开发者平台免费申请到。


= 参数说明 =
id : 必需，默认为 map_<当前的时间戳>以英文开头的英文字母、数字和中横线的组合；

zl: 可选, 默认为 17, 缩放等级,1-18 闭区间内的整数;

nm: 可选,默认为 0, 是否隐藏地图上跳动的 marker;

w : 可选,字符串,默认为 `100%`;

h : 可选,字符串, 默认为 `450px`;

lon : 必需，浮点型数字， 指经度；

lat : 必需，浮点型数字， 指维度；

biz_name : 可选的字符串，指企业/团队的名称；

address : 可选的字符串，指企业/团队的地址 ；

email： 可选的字符串，指企业/团队的电邮地址；

phone : 可选的整型数，指企业/团队的电话号码 。

== Frequently Asked Questions ==

应该不会有什么使用上的困难的，因为很好用。
如果有的话，请移步至[WP Baidu Map的主页](http://coolwp.com/wp-baidu-map.html)获取帮助


== Changelog ==
= 1.2.1 =
修复一处非关键性的语法错误;
= 1.2 =
结合用户邮件反馈的建议,增加两个选项(一个用于控制缩放等级,默认的缩放等级为17,一个用于控制是否显示地图上跳动的 marker);
= 1.1 =
支持编辑器快捷输入;
在快捷输入中支持将地址转换为百度地图的经纬度;
代码优化;

= 1.0 =
初始发布;



== Upgrade Notice ==
= 1.2.1 =
直接升级即可;
= 1.2=
CSS Class "mywindow" 改为"bdmpwindow";
= 1.1 =
直接升级即可;
= 1.0 =
initial release