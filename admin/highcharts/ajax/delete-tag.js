// JavaScript Document
var del = false;
function deleteTag(id){
	del = false;
	if(window.XMLHttpRequest) { // Mozilla, Safari,...
		del = new XMLHttpRequest();
			if (del.overrideMimeType) {
				del.overrideMimeType('text/html');
			}
	}else if (window.ActiveXObject) { // IE
		try{
			del = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				del = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}
	
	if (!del) {
		alert('Cannot create XMLHTTP instance');
		return false;
	}
	var url = 'process/process-delete-tag.php';
	var pmeters = 'id='+id;
	del.open('POST',url,true);

	del.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	del.setRequestHeader("Content-length", pmeters.length);
	del.setRequestHeader("Connection", "close");
	del.send(pmeters);			
	del.onreadystatechange = function(){
		if(del.readyState == 3)  // Loading Request
		{
			//document.getElementById("result-article").innerHTML = del.responseText;
		}
		if(del.readyState == 4) // Return Request
		{
			$('#tag-'+id).hide(300);
			//document.getElementById("result").innerHTML = del.responseText;
		}				
	}
}