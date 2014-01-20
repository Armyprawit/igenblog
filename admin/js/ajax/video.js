// JavaScript Document
var yt = false;
var create = false;
var createform = false;
var editForm = false;
var example = false;
var loading = false;
var mode = false;
var search = false;
var status_s = false;
var index = 5;
var state = true;

// scroll event to load more Video.
$(window).scroll(function() {
  if($(window).scrollTop() + $(window).height() >= $(document).height()-50) {
  	if(state){
  		loadingVideo($('#categoryMode').val(),index);
  	}
  }
});


function getMetaVideo(id){
	if(id ==""){
		return false;
	}

	document.getElementById("loading").innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
	$("#meta").fadeOut(100);
	yt = false;
	if(window.XMLHttpRequest) { // Mozilla, Safari,...
		yt = new XMLHttpRequest();
			if (yt.overrideMimeType) {
				yt.overrideMimeType('text/html');
			}
	}else if (window.ActiveXObject) { // IE
		try{
			yt = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				yt = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}
	
	if (!yt) {
		alert('Cannot create XMLHTTP instance');
		return false;
	}
	var url = 'process/get-meta-youtube.php';
	var pmeters = 'id='+id;
	yt.open('POST',url,true);

	yt.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	yt.send(pmeters);			
	yt.onreadystatechange = function(){
		if(yt.readyState == 3)  // Loading Request
		{
		}
		if(yt.readyState == 4) // Return Request
		{
			document.getElementById("loading").innerHTML = '<i class="fa fa-check-circle-o"></i>';
			$("#meta").fadeIn(200).html(yt.responseText);
		}				
	}
}

function createVideo(id,category,title,context,keyword){
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
	var url = 'process/process-video-create.php';
	context = context.replace(/\r?\n/g,"<br>");
	var pmeters = 'id='+id+'&category='+category+'&title='+title+'&description='+context+'&keyword='+keyword;
	create.open('POST',url,true);

	create.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	create.send(pmeters);			
	create.onreadystatechange = function(){
		if(create.readyState == 3)  // Loading Request
		{
		}
		if(create.readyState == 4) // Return Request
		{
			$("#console").fadeIn(200).html(create.responseText);
			$("#console").delay(3000).animate({bottom:"-50px"},500);

			toCreateVideo();
			modeListVideo(0);
			$("#categoryMode").val("0");
		}				
	}
}

function editVideo(id,category,title,context,keyword){
	state = true;
	showLiveView('close');
	$("#console").animate({bottom:"0px"},800);

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
	var url = 'process/process-video-edit.php';
	context = context.replace(/\r?\n/g,"<br>");
	var pmeters = 'id='+id+'&category='+category+'&title='+title+'&description='+context+'&keyword='+keyword;
	editForm.open('POST',url,true);

	editForm.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	editForm.send(pmeters);			
	editForm.onreadystatechange = function(){
		if(editForm.readyState == 3)  // Loading Request
		{
		}
		if(editForm.readyState == 4) // Return Request
		{
			$("#console").fadeIn(200).html(edit.responseText);
			$("#console").delay(3000).animate({bottom:"-50px"},400);

			toSelectVideo(id);
			modeListVideo();
		}				
	}
}


function statusVideo(id,stat){
	state = true;

	$("#loading-"+id).fadeIn(200).html('<i class="fa fa-spinner fa-spin"></i>');

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
	var url = 'process/process-video-status.php';
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
			$("#status-"+id).html(status_s.responseText);
			$("#loading-"+id).fadeIn(200).html('');
		}				
	}
}

function modeListVideo(category){
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
	var url = 'process/mode-video.php';
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


function searchVideo(q){
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
	var url = 'process/process-video-search.php';
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
		modeListVideo();
		state = true;
	}
}

function loadingVideo(category,start){
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
	var url = 'process/process-video-loading.php';
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
function toSelectVideo(id){
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
	var url = 'process/edit-video.php';
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
			document.getElementById("loading-"+id).innerHTML = '';
			$("#result").fadeIn(200).html(editForm.responseText);
		}				
	}
}

function toCreateVideo(){
	state = true;

	createform = false;
	if(window.XMLHttpRequest) { // Mozilla, Safari,...
		createform = new XMLHttpRequest();
			if (createform.overrideMimeType) {
				createform.overrideMimeType('text/html');
			}
	}else if (window.ActiveXObject) { // IE
		try{
			createform = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				createform = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}
	
	if (!createform) {
		alert('Cannot createform XMLHTTP instance');
		return false;
	}
	var url = 'process/process-video-createform.php';
	var pmeters = 'id='+0;
	createform.open('POST',url,true);

	createform.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	createform.send(pmeters);			
	createform.onreadystatechange = function(){
		if(createform.readyState == 3)  // Loading Request
		{
		}
		if(createform.readyState == 4) // Return Request
		{
			$("#result").fadeIn(200).html(createform.responseText);
		}				
	}
}