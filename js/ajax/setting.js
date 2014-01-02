var editForm = false;
var edit = false;
var state = true;

function editSetting(id,value){

	$("#loading-"+id).fadeIn(300);

	edit = false;
	if(window.XMLHttpRequest) { // Mozilla, Safari,...
		edit = new XMLHttpRequest();
			if (edit.overrideMimeType) {
				edit.overrideMimeType('text/html');
			}
	}else if (window.ActiveXObject) { // IE
		try{
			edit = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				edit = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}
	
	if (!edit) {
		alert('Cannot edit XMLHTTP instance');
		return false;
	}
	var url = 'process/process-setting-edit.php';
	var pmeters = 'id='+id+'&value='+value;
	edit.open('POST',url,true);

	edit.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	edit.send(pmeters);			
	edit.onreadystatechange = function(){
		if(edit.readyState == 3)  // Loading Request
		{
			$("#console").html('<i class="fa fa-spinner fa-spin"></i> รอสักครู่...');
		}
		if(edit.readyState == 4) // Return Request
		{
			$("#loading-"+id).fadeIn(200).html(edit.responseText);
			$("#loading-"+id).delay(3000).fadeOut(1000);
		}				
	}
}

// When click clip item is call this function.
function toSelectSetting(type){
	state = true;

	editForm = false;
	if(window.XMLHttpRequest) { // Mozilla, Safari,...
		editForm = new XMLHttpRequest();
			if (editForm.overrideMimeType) {
				editForm.overrideMimeType('text/html');
			}
	}else if (window.ActiveXObject) { // IE
		try{
			editForm = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				editForm = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}
	
	if (!editForm) {
		alert('Cannot editForm XMLHTTP instance');
		return false;
	}
	var url = 'process/edit-setting.php';
	var pmeters = 'type='+type;
	editForm.open('POST',url,true);

	editForm.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	editForm.send(pmeters);			
	editForm.onreadystatechange = function(){
		if(editForm.readyState == 3)  // Loading Request
		{
		}
		if(editForm.readyState == 4) // Return Request
		{
			// document.getElementById("loading-"+id).innerHTML = '';
			$("#result").fadeIn(200).html(editForm.responseText);
		}				
	}
}