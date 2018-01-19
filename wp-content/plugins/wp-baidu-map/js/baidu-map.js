/*
* @Author: suifengtec
* @Date:   2017-05-04 00:44:00
* @Last Modified by:   suifengtec
* @Last Modified time: 2017-05-04 02:12:48
*/

;(function() {

var codeBoxPolyv = {
    create: function() {
        var styleNode = document.createElement('style');
        styleNode.innerHTML = boxStyle;
        document.getElementsByTagName('head')[0].appendChild(styleNode);
        
        this._dom = document.createElement('div');
        this._dom.setAttribute('class' , 'polyver-code-box');
        this._dom.innerHTML = boxTemplate;
        document.body.appendChild(this._dom);
        this._init = true;
        var that = this;
        var language = this.language = document.getElementById('codeLanguage');
        var textarea = this.textarea = document.getElementById('codeInput');
        var cancel = document.getElementById('codeCancelButton');
        var insert = document.getElementById('codeInsertButton');
        var html = '';
        for(var i in languages){
            html += '<option value="' + languages[i] + '">' + i + '</option>';
        }
        language.innerHTML = html;
        textarea.onkeydown = function(e){
            if(e.keyCode == 9){//tab
                e.preventDefault();
                var start = this.selectionStart, end = this.selectionEnd;
                var text = this.value;
                var tab = '    ';
                text = text.substr(0, start) + tab + text.substr(start);
                this.value = text;
                this.selectionStart = start + tab.length;
                this.selectionEnd = end + tab.length;
            }
        }
        cancel.onclick = function(){
            that.hide();
        }
        insert.onclick = function(){
            var text = textarea.value;
            var lan = language.value;
            var label = language.options[language.selectedIndex].innerHTML;
            text = text.replace(/</g, '&lt;').replace(/>/g, '&gt;');
            text = '<pre class="brush: ' + lan + '; title: ' + label + '">' + text + '</pre>';
            that._action && that._action(text);
            that.hide();
            if(localStorage){
                localStorage['lastLanguage'] = lan;
            }
        }
    },
    show: function(action) {
        if (!this._init) {
            this.create();
        }
        this.textarea.value = '';
        this._action = action;
        if(localStorage && localStorage['lastLanguage']){
            this.language.value = localStorage['lastLanguage'];
        }
        this._dom.style.display = 'block';
    },
    hide: function(){
        this._action = null;
        this._dom.style.display = 'none';
    }
};

tinymce.create('tinymce.plugins.baidumap', {
    init : function(ed, url) {
        ed.addButton('baidumap', {
            title : '百度地图',
            image : url+'/../imgs/btn.png',
            onclick : function() {
				tb_show('百度地图',url+'/../views/modal.php?&modal=true&ak='+baiduMapAK);

            }
        });
    },
    createControl : function(n, cm) {
        return null;
    },
});
tinymce.PluginManager.add('baidumap', tinymce.plugins.baidumap);

})();