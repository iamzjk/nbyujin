<?php
/*
Plugin Name:WP Baidu Map
Plugin URI: http://coolwp.com/wp-baidu-map.html
Description: A real Baidu map plugin.
Author:suifengtec
Version: 1.2.1
Author URI: https://coolwp.com
*/
/*
1.0 : 初始发布;
1.1 : 添加编辑器按钮插入;支持将输入的地址转换为百度地图的坐标;代码优化;支持在同一页面显示N多地图;
1.2 : 增加两个选项(一个用于控制缩放等级,默认的缩放等级为17,一个用于控制是否显示地图上跳动的 marker);
1.2.1 : 修复一处非关键性的语法错误;
 */

defined('ABSPATH') || exit;

if(!class_exists('WP_Baidu_Maps')):

class WP_Baidu_Maps{

    /*百度地图AK , 请在 http://lbsyun.baidu.com/apiconsole/key 这里申请,免费的。*/
/*================= 设置百度地图 AK =================*/
    public static $ak = '5upeZi9ESotIhhBvDkERXuUB';

/*================= //设置百度地图 AK =================*/

    private static $instance;
    private static $ver = '1.2';
    public function __wakeup() {}
    public function __clone() {}
    public function __construct(){ }
    public static function instance() {

        if ( ! isset( self::$instance ) && ! ( self::$instance instanceof WP_Baidu_Maps ) ) {
            self::$instance = new self();
            self::$instance->hooks();
        }
        return self::$instance;

    }

    public function hooks(){
        add_action('init', array( $this, 'add_shortcode' ) );
        add_action('admin_init', array ( __CLASS__, 'add_insert_btn' ) );
    }

    public static function add_insert_btn(){

/*        if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
            return;
        }*/
        add_filter('mce_buttons', array(__CLASS__,'register_baidumap_button'));
        add_filter('mce_external_plugins', array(__CLASS__,'add_baidumap_button_plugin'));

    }


    public static function register_baidumap_button( $buttons ) {

        array_push( $buttons, "|", "baidumap" );
        return $buttons;
    }

    public static function add_baidumap_button_plugin($plugin_array){

        echo '<script>var baiduMapAK ="'.self::$ak.'";</script>';

        $plugin_array['baidumap'] =  plugins_url('js/baidu-map.js',__FILE__);
        return $plugin_array;
    }



    public  function add_shortcode(){

        add_shortcode('baidu_map', array( $this ,'add_sc' ) );
    }

    public  function add_sc( $atts= array(), $content='' ){

        extract(shortcode_atts(array(
            'id'=>'',
            'zl'=>17,
            'nm'=>0,
            'w'=>'',
            'h'=>'',
            'lon'=>'',
            'lat'=>'',
            'biz_name'=>'',
            'address'=>'',
            'email'=>'',
            'phone'=>'',
            'ak'=> self::$ak,
            ) ,$atts));

        $id = $id?$id:'wp-baidu-map';
        $nm = isset($nm)?$nm:0;
         $zl = $zl?$zl:17;
        $w = $w?$w:'100%';
        $h = $h?$h:'400px';
        $lon = $lon?$lon:false;
        $lat = $lat?$lat:false;


        if(!$lon||!$lat){
            return '设置经纬度后才能显示地图哦！';
        }

        ob_start();
        ?><script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=<?php echo $ak?>"></script>
        <style>.map{display:block;margin-bottom:1em}div#<?php echo esc_attr($id) ?> {display: block !important;}
            #<?php echo esc_attr($id) ?> {width:<?php echo $w ?>; height:<?php echo $h ?>;overflow: hidden;margin:0}.bdmapwindow{ height:auto; width:auto; font-size:12px; line-height:22px}.BMap_cpyCtrl span,.anchorBL{display:none!important} </style>
        <div class="map"><div id="<?php echo esc_attr($id) ?>"></div></div>
        <script type="text/javascript">;var map<?php echo esc_attr($id) ?> = new BMap.Map("<?php echo esc_attr($id) ?>");var point = new BMap.Point(<?php echo $lon ?>,<?php echo $lat ?>);map<?php echo esc_attr($id) ?>.enableScrollWheelZoom(true);map<?php echo esc_attr($id) ?>.enableContinuousZoom(true); map<?php echo esc_attr($id) ?>.addControl(new BMap.NavigationControl());map<?php echo esc_attr($id) ?>.centerAndZoom(point,<?php echo $zl; ?>);
            <?php if(!$nm&&($address||$email||$phone||$biz_name )): ?>var marker = new BMap.Marker(point); marker.setAnimation(BMAP_ANIMATION_BOUNCE); map<?php echo esc_attr($id) ?>.addOverlay(marker);var sContent ='<div class="bdmapwindow"><?php echo $biz_name ?><?php if(!empty($address)){echo '<br>地址：'.$address;} ?><?php if(!empty($phone)){echo '<br>电话：'.$phone;} ?><?php if(!empty($email)){echo '<br>电邮：'.$email;} ?></div>'; var infoWindow = new BMap.InfoWindow(sContent); marker.addEventListener("click", function(){this.openInfoWindow(infoWindow);window.onload = function (){infoWindow.redraw() }});
            <?php endif; ?></script>
       <?php
        $o = ob_get_contents();
        ob_end_clean();
        return $o;


    }

}

$GLOBALS['wp_baidu_map'] = WP_Baidu_Maps::instance();

endif;
