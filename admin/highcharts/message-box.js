// JavaScript Document
var Msg = false;
function closeMessage(){
	$("#message-chat").animate({top:"100%"},1000);
	document.getElementById("#message-chat").innerHTML = "";
}
function openMessage(id){
	$("#message-chat").animate({top:"0%"},1000);
	Msg = false;
	if(window.XMLHttpRequest) { // Mozilla, Safari,...
		Msg = new XMLHttpRequest();
			if (Msg.overrideMimeType) {
				Msg.overrideMimeType('text/html');
			}
	}else if (window.ActiveXObject) { // IE
		try{
			Msg = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				Msg = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}
	
	if (!Msg) {
		alert('Cannot create XMLHTTP instance');
		return false;
	}
	var url = 'process/process-Msgete-category.php';
	var pmeters = 'id='+id;
	Msg.open('POST',url,true);

	Msg.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	Msg.setRequestHeader("Content-length", pmeters.length);
	Msg.setRequestHeader("Connection", "close");
	Msg.send(pmeters);			
	Msg.onreadystatechange = function(){
		if(Msg.readyState == 3)  // Loading Request
		{
			//document.getElementById("result-article").innerHTML = Msg.responseText;
		}
		if(Msg.readyState == 4) // Return Request
		{
			//$('#category-'+id).hide(300);
			document.getElementById("message").innerHTML = Msg.responseText;
		}				
	}
}