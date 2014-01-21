// JavaScript Document
var meta = false;
var links = '';

var create = false;
var loading = false;
var editForm = false;
var index = 5;
var state = true;
var deletes = false;

// scroll event to load more Photo.
$(window).scroll(function() {
  if($(window).scrollTop() + $(window).height() >= $(document).height()-50) {
  	if(state){
  		loadingFanpage(0,index);
  	}
  }
});

function createFanpage(link){
	if(link ==""){
		return false;
	}

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
	var url = 'process/process-fanpage-create.php';
	var pmeters = 'link='+link;
	create.open('POST',url,true);

	create.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	create.send(pmeters);			
	create.onreadystatechange = function(){
		if(create.readyState == 3)  // Loading Request
		{
		}
		if(create.readyState == 4) // Return Request
		{
			modeListFanpage();
			$('#username').val('');
		}				
	}
}

function getMetaFanpage(link){
	if(username ==""){
		return false;
	}

	$("#btn-loading").html('<i class="fa fa-spinner fa-spin"></i>');

	meta = false;
	if(window.XMLHttpRequest) { // Mozilla, Safari,...
		meta = new XMLHttpRequest();
			if (meta.overrideMimeType) {
				meta.overrideMimeType('text/html');
			}
	}else if (window.ActiveXObject) { // IE
		try{
			meta = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				meta = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}
	
	if (!meta) {
		alert('Cannot create XMLHTTP instance');
		return false;
	}
	var url = 'process/get-meta-fanpage.php';
	var pmeters = 'link='+link;
	meta.open('POST',url,true);

	meta.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	meta.send(pmeters);			
	meta.onreadystatechange = function(){
		if(meta.readyState == 3)  // Loading Request
		{
		}
		if(meta.readyState == 4) // Return Request
		{
			if(links != link){
				$('#list').prepend(meta.responseText);
			}
			links = link;

			$("#btn-loading").html('<i class="fa fa-check-circle-o"></i>');
		}				
	}
}

function deletePage(id){
	state = true;
	showLiveView('close');
	$("#console").animate({bottom:"0px"},800);

	deletes = false;
	if(window.XMLHttpRequest) { // Mozilla, Safari,...
		deletes = new XMLHttpRequest();
			if (deletes.overrideMimeType) {
				deletes.overrideMimeType('text/html');
			}
	}else if (window.ActiveXObject) { // IE
		try{
			deletes = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				deletes = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}
	
	if (!deletes) {
		alert('Cannot delete XMLHTTP instance');
		return false;
	}
	var url = 'process/process-fanpage-delete.php';
	var pmeters = 'id='+id;
	deletes.open('POST',url,true);

	deletes.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	deletes.send(pmeters);			
	deletes.onreadystatechange = function(){
		if(deletes.readyState == 3)  // Loading Request
		{
			$("#console").html('<i class="fa fa-spinner fa-spin"></i> รอสักครู่...');
		}
		if(deletes.readyState == 4) // Return Request
		{
			$("#console").fadeIn(200).html(deletes.responseText);
			$("#console").delay(3000).animate({bottom:"-50px"},500);

			//modeListFacebookFeed($('#feedType').val());
			$("#"+id+"").slideUp(400);
		}				
	}
}

function modeListFanpage(){
	state = true;
	$("#list").fadeOut(100);

	mode = false;
	if(window.XMLHttpRequest) { // Mozilla, Safari,...
		mode = new XMLHttpRequest();
			if (mode.overrideMimeType) {
				mode.overrideMimeType('text/html');
			}
	}else if (window.ActiveXObject) { // IE
		try{
			mode = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				mode = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}
	
	if (!mode) {
		alert('Cannot mode XMLHTTP instance');
		return false;
	}
	var url = 'process/mode-fanpage.php';
	var pmeters = 'id='+0;
	mode.open('POST',url,true);

	mode.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	mode.send(pmeters);			
	mode.onreadystatechange = function(){
		if(mode.readyState == 3)  // Loading Request
		{
		}
		if(mode.readyState == 4) // Return Request
		{
			$("#list").fadeIn(200).html(mode.responseText);
		}				
	}
	index = 5;
}

// When click clip item is call this function.
function toSelectFanpage(id){
	$("#result").fadeOut(100);
	//document.getElementById("loading-"+id).innerHTML = '<i class="fa fa-spinner fa-spin"></i>';

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
	var url = 'process/update-fanpage.php';
	var pmeters = 'id='+id;
	editForm.open('POST',url,true);

	editForm.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	editForm.send(pmeters);			
	editForm.onreadystatechange = function(){
		if(editForm.readyState == 3)  // Loading Request
		{
		}
		if(editForm.readyState == 4) // Return Request
		{
			//document.getElementById("loading-"+id).innerHTML = '';
			$("#result").fadeIn(200).html(editForm.responseText);
		}				
	}
}

function loadingFanpage(category,start){
	state = true;
	loading = false;

	$("#loadingProcess").slideDown('fast');

	if(window.XMLHttpRequest) { // Mozilla, Safari,...
		loading = new XMLHttpRequest();
			if (loading.overrideMimeType) {
				loading.overrideMimeType('text/html');
			}
	}else if (window.ActiveXObject) { // IE
		try{
			loading = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				loading = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}
	
	if (!loading) {
		alert('Cannot loading XMLHTTP instance');
		return false;
	}
	var url = 'process/process-fanpage-loading.php';
	var pmeters = 'start='+start+'&category='+category;
	loading.open('POST',url,true);

	loading.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	loading.send(pmeters);			
	loading.onreadystatechange = function(){
		if(loading.readyState == 3)  // Loading Request
		{
		}
		if(loading.readyState == 4) // Return Request
		{
			$('#list').append(loading.responseText);
			console.log("start:"+start);
			index+=5;

			$("#loadingProcess").slideUp('fast');
		}				
	}
}