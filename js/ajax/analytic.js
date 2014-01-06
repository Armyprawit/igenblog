// JavaScript Document
var update = false;

function updateWatch(type,id){
	state = true;

	create = false;
	if(window.XMLHttpRequest) { // Mozilla, Safari,...
		create = new XMLHttpRequest();
			if (create.overrideMimeType) {
				create.overrideMimeType('text/html');
			}
	}else if (window.ActiveXObject) { // IE
		try{
			create = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				create = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}
	
	if (!create) {
		alert('Cannot create XMLHTTP instance');
		return false;
	}

	if(type == 'video'){
		var url = 'process/process-video-update-watch.php';
	}
	else if(type == 'article'){
		var url = 'process/process-article-update-read.php';
	}
	else if(type == 'photo'){
		var url = 'process/process-photo-update-watch.php';
	}

	var pmeters = 'id='+id;
	create.open('POST',url,true);

	create.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	create.send(pmeters);			
	create.onreadystatechange = function(){
		if(create.readyState == 3)  // Loading Request
		{
		}
		if(create.readyState == 4) // Return Request
		{
			console.log("Content ID: "+id+" Updated.");
		}				
	}
}