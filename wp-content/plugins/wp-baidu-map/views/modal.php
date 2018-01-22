<link rel="stylesheet" href="../wp-content/plugins/wp-baidu-map/css/modal.min.css?ver=1.2">
<div class="media-frame-title"> <h1>插入百度地图<span class="dashicons dashicons-arrow-down"></span></h1></div>
<button type="button" class="button-link media-modal-close"  onclick="tb_remove();" ><span class="media-modal-icon"><span class="screen-reader-text">关闭</span></span></button>
<div class="media-frame-content">
  <div class="attachments-browser">
    <div class="p_pof" id="e_cst1_menu">
      <div class="mtm">
      <div class="pl-content">
        <div id="bdmap">
          <div id="pl-box">
            <div class="pl-main basic-grey">
              <div class="form-control"><label >地图 ID： <input type="text" id="id" value="map_<?php echo time(); ?>"></label> </div>
              <div class="form-control"><label >地图的<a href="http://coolwp.com/wp-baidu-map.html#zoomlevel">缩放比例</a>：
               <input type="number" id="zl"  min="1" max="18" step="1" value="17">
              </label>
               </div>
              <div class="form-control"><label >禁用<a href="http://coolwp.com/wp-baidu-map.html#zoomlevel">marker</a>：
               <input type="number" id="nm"  min="0" max="1" step="1" value="0">
              </label>
               </div>
              <div class="form-control"><label>地图高度：  <input type="text" id="h"  value="450px"></label> </div>
              <div class="form-control"><label>地图宽度：  <input type="text" id="w" value="100%"></label></div>
              <div class="form-control"><label>   地址：   <input type="text" id="address" value="郑州人民公园"></label></div>
              <div class="form-control"><label>地图经度：  <input type="text" id="lng"></label></div>
              <div class="form-control"><label>地图纬度：  <input type="text" id="lat"></label></div>
              <div class="form-control"><label>单位名称：  <input type="text" id="biz_name"></label></div>
              <div class="form-control"><label>Email：    <input type="email" id="email"></label></div>
              <div class="form-control"><label>电 话：    <input type="phone" id="phone"></label></div>
            </div>
          </div>
          <script>;jQuery(function(a){a("#pl-show").click(function(){a("#pl-box").show()}),a("#pl-close").click(function(){a("#pl-box").hide()}),a("#pl-box #address").on("blur",function(l){var o=a(this).val(),t="http://api.map.baidu.com/geocoder/v2/?address="+o+"&output=json&ak="+baiduMapAK;a.ajax({url:t,dataType:"jsonp",jsonpCallback:"data",success:function(l){"0"==l.status&&l.result&&(a("#pl-box #lng").val(l.result.location.lng),a("#pl-box #lat").val(l.result.location.lat))}})}),a("#baidumap-insert-btn").on("click",function(){var l=a("#pl-box #id").val(),o=a("#pl-box #w").val(),t=a("#pl-box #w").val(),zl=a("#pl-box #zl").val(),n=a("#pl-box #lat").val(),e=a("#pl-box #lng").val(),p=a("#pl-box #biz_name").val(),i=a("#pl-box #address").val(),s=a("#pl-box #email").val(),b=a("#pl-box #phone").val(),nm=a("#pl-box #nm").val(),c=a("#e_cst1_bdmap_param_1").val(),d='[baidu_map id="'+l+'"  zl="'+zl+'" nm="'+nm+'"  w="'+o+'" h="'+t+' lat="'+n+'" lon="'+e+'" biz_name="'+p+'" address="'+i+'" email="'+s+'" phone="'+b+'"]';c?(tinymce.activeEditor.execCommand("mceInsertContent",!1,d),tb_remove()):a("#e_cst1_bdmap_param_1").val(d)})});</script>
        </div>
      </div>
      </div>
      <div id="PLfooter"> 短代码：
        <textarea type="text" id="e_cst1_bdmap_param_1" /></textarea>
        <div style="clear:both"></div>
        <button type="button" class="button button-primary button-large" id="baidumap-insert-btn">插入</button>
      </div>
    </div>
  </div>
 <div style="clear:both"></div>
 </div>
</div>