// JavaScript Document
var set = false;
function updateSetting(id,value){
	set = false;
	//is Empty value.
	if(value==""){return false;}
	
	if(window.XMLHttpRequest) { // Mozilla, Safari,...
		set = new XMLHttpRequest();
			if (set.overrideMimeType) {
				set.overrideMimeType('text/html');
			}
	}else if (window.ActiveXObject) { // IE
		try{
			set = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				set = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}
	
	if (!set) {
		alert('Cannot create XMLHTTP instance');
		return false;
	}
	var url = 'process/process-update-setting.php';
	var pmeters = 'id='+id+'&value='+value;
	set.open('POST',url,true);

	set.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	set.setRequestHeader("Content-length", pmeters.length);
	set.setRequestHeader("Connection", "close");
	set.send(pmeters);			
	set.onreadystatechange = function(){
		if(set.readyState == 3)  // Loading Request
		{
			//document.getElementById("result-article").innerHTML = set.responseText;
		}
		if(set.readyState == 4) // Return Request
		{
			//$('#'+id).hide(300);
			document.getElementById("setting-status-"+id).innerHTML = set.responseText;
			$('#setting-status-'+id).delay(1000).fadeOut(1000);
		}				
	}
}