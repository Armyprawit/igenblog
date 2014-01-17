// JavaScript Document
var create = false;
var edit = false;
var createForm = false;
var editForm = false;
var example = false;
var loading = false;
var mode = false;
var search = false;
var status_s = false;
var index = 5;
var state = true;

// scroll event to load more Photo.
$(window).scroll(function() {
  if($(window).scrollTop() + $(window).height() >= $(document).height()-50) {
  	if(state){
  		loadingPhoto($('#categoryMode').val(),index);
  	}
  }
});

function createPhoto(image,context,category,keyword){
	state = true;
	showLiveView('close');
	$("#console").animate({bottom:"0px"},800);

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
	var url = 'process/process-photo-create.php';
	context = context.replace(/\r?\n/g,"<br>");
	var pmeters = 'image='+image+'&description='+context+'&category='+category+'&keyword='+keyword;
	create.open('POST',url,true);

	create.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	create.send(pmeters);			
	create.onreadystatechange = function(){
		if(create.readyState == 3)  // Loading Request
		{
			$("#console").html('<i class="fa fa-spinner fa-spin"></i> รอสักครู่...');
		}
		if(create.readyState == 4) // Return Request
		{
			$("#console").fadeIn(200).html(create.responseText);
			$("#console").delay(3000).animate({bottom:"-50px"},500);

			modeListPhoto();
			toCreatePhoto();
			$("#categoryMode").val("0");
		}				
	}
}

function editPhoto(id,link,context,category,keyword){
	state = true;
	showLiveView('close');
	$("#console").animate({bottom:"0px"},800);

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
	var url = 'process/process-photo-edit.php';
	context = context.replace(/\r?\n/g,"<br>");
	var pmeters = 'id='+id+'&image='+link+'&description='+context+'&category='+category+'&keyword='+keyword;
	edit.open('POST',url,true);

	edit.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//edit.setRequestHeader("Content-length", pmeters.length);
	//edit.setRequestHeader("Connection", "close");
	edit.send(pmeters);			
	edit.onreadystatechange = function(){
		if(edit.readyState == 3)  // Loading Request
		{
			$("#console").html('<i class="fa fa-spinner fa-spin"></i> รอสักครู่...');
		}
		if(edit.readyState == 4) // Return Request
		{
			$("#console").fadeIn(200).html(edit.responseText);
			$("#console").delay(3000).animate({bottom:"-50px"},400);

			toSelectPhoto(id);
			modeListPhoto(0);
		}				
	}
}

function statusPhoto(id,stat){
	state = true;
	$("#console").animate({bottom:"0px"},800);

	status_s = false;
	if(window.XMLHttpRequest) { // Mozilla, Safari,...
		status_s = new XMLHttpRequest();
			if (status_s.overrideMimeType) {
				status_s.overrideMimeType('text/html');
			}
	}else if (window.ActiveXObject) { // IE
		try{
			status_s = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				status_s = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}
	
	if (!status_s) {
		alert('Cannot status_s XMLHTTP instance');
		return false;
	}
	var url = 'process/process-photo-status.php';
	var pmeters = 'id='+id+'&stat='+stat;
	status_s.open('POST',url,true);

	status_s.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	status_s.send(pmeters);			
	status_s.onreadystatechange = function(){
		if(status_s.readyState == 3)  // Loading Request
		{
			$("#console").html('<i class="fa fa-spinner fa-spin"></i> รอสักครู่...');
		}
		if(status_s.readyState == 4) // Return Request
		{
			$("#console").fadeIn(200).html(status_s.responseText);
			$("#console").delay(3000).animate({bottom:"-50px"},500);

			modeListPhoto(0);
		}				
	}
}

function modeListPhoto(category){
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
	var url = 'process/mode-photo.php';
	var pmeters = 'category='+category;
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

function searchPhoto(q){
	state = false;
	search = false;

	if(window.XMLHttpRequest) { // Mozilla, Safari,...
		search = new XMLHttpRequest();
			if (search.overrideMimeType) {
				search.overrideMimeType('text/html');
			}
	}else if (window.ActiveXObject) { // IE
		try{
			search = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				search = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}
	
	if (!search) {
		alert('Cannot search XMLHTTP instance');
		return false;
	}
	var url = 'process/process-photo-search.php';
	var pmeters = 'q='+q;
	search.open('POST',url,true);

	search.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	search.send(pmeters);			
	search.onreadystatechange = function(){
		if(search.readyState == 3)  // Loading Request
		{
			$("#console").html('<i class="fa fa-spinner fa-spin"></i> รอสักครู่...');
		}
		if(search.readyState == 4) // Return Request
		{
			$("#list").html(search.responseText);
		}				
	}
	index = 5;
	console.log('set index = 5');
	if(q == ''){
		modeListPhoto();
		state = true;
	}
}

function loadingPhoto(category,start){
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
	var url = 'process/process-photo-loading.php';
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

// When click clip item is call this function.
function toSelectPhoto(id){
	$("#result").fadeOut(100);
	document.getElementById("loading-"+id).innerHTML = '<i class="fa fa-spinner fa-spin"></i>';

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
	var url = 'process/edit-photo.php';
	var pmeters = 'id='+id;
	editForm.open('POST',url,true);

	editForm.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//editForm.setRequestHeader("Content-length", pmeters.length);
	//editForm.setRequestHeader("Connection", "close");
	editForm.send(pmeters);			
	editForm.onreadystatechange = function(){
		if(editForm.readyState == 3)  // Loading Request
		{
		}
		if(editForm.readyState == 4) // Return Request
		{
			document.getElementById("loading-"+id).innerHTML = '';
			$("#result").fadeIn(200).html(editForm.responseText);
		}				
	}
}

function toCreatePhoto(){
	state = true;

	createForm = false;
	if(window.XMLHttpRequest) { // Mozilla, Safari,...
		createForm = new XMLHttpRequest();
			if (createForm.overrideMimeType) {
				createForm.overrideMimeType('text/html');
			}
	}else if (window.ActiveXObject) { // IE
		try{
			createForm = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				createForm = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}
	
	if (!createForm) {
		alert('Cannot createForm XMLHTTP instance');
		return false;
	}
	var url = 'process/process-photo-createform.php';
	var pmeters = 'id='+0;
	createForm.open('POST',url,true);

	createForm.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	createForm.send(pmeters);			
	createForm.onreadystatechange = function(){
		if(createForm.readyState == 3)  // Loading Request
		{
		}
		if(createForm.readyState == 4) // Return Request
		{
			$("#result").fadeIn(200).html(createForm.responseText);
			modeListVideo();
		}				
	}
}