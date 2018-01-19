<?php
/**
 * WordPress基础配置文件。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以不使用网站，您需要手动复制这个文件，
 * 并重命名为“wp-config.php”，然后填入相关信息。
 *
 * 本文件包含以下配置选项：
 *
 * * MySQL设置
 * * 密钥
 * * 数据库表名前缀
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/usr/share/nginx/html/nbyujin/wp-content/plugins/wp-super-cache/' );
define('DB_NAME', 'database_name_here');

/** MySQL数据库用户名 */
define('DB_USER', 'username_here');

/** MySQL数据库密码 */
define('DB_PASSWORD', 'password_here');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */

define('AUTH_KEY',         'azY;-N[`Rgn`093jRu|O=%{%S0>|mzHRTDm}?:U7fJRY-^bXSDg-TOJL;@KE([
S,');
define('SECURE_AUTH_KEY',  '&V}TPX[FTq8q Iu@Fc)|$t%^lzl];Ys+LC+>=8&U*?8eTKju(#R-b^UuZsab5^
%X');
define('LOGGED_IN_KEY',    '=kx+ZCxveG,Tg1PC%o/i[6&Ow{6$=~R7RsOzz(}.(;3?JUt=p28d?d5R+8E= J
h0');
define('NONCE_KEY',        'L%{]T)Oq8f-+ LY/,[sg8 9?ITRba=v8pFc)CBG-26t=Yw+D%#G6)y&+tY^3r5@1');
define('AUTH_SALT',        '8wE0K!)w_nX:aYz(}_MR%[6:n1~c|qR&@Y{GT%_8}^Yi3Wp]dK,P`jWKd0;_sRuW');
define('SECURE_AUTH_SALT', '$41{1.&$|MP-cC|`~Uk3BT5CU&8sqOwO#3+,=-nC|6|,+i;MC.pS>/k+GB^}oSi-');
define('LOGGED_IN_SALT',   '/sP7^D!CuUBI)3)IeqLZks6?7@|Yz#Ff%kC=ZX4 No-w^>~OAm32v`^?F5om#D|j');
define('NONCE_SALT',       'YQ;ykZH4|hv-Hu[-V5h6syLjtprWmFH*vGKKM$12]&w{|QZ};~p(.,K9ND!O$8$~');

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wp_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 *
 * 要获取其他能用于调试的信息，请访问Codex。
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
