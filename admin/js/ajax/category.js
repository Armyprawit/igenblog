// JavaScript Document
var category = false;
var mode = false;
var form = false;
var search = false;
var status_s = false;
var deletes = false;

function showCategory(id){
	$("#result").fadeOut(100);
	category = false;
	if(window.XMLHttpRequest) { // Mozilla, Safari,...
		category = new XMLHttpRequest();
			if (category.overrideMimeType) {
				category.overrideMimeType('text/html');
			}
	}else if (window.ActiveXObject) { // IE
		try{
			category = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				category = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}
	
	if (!category) {
		alert('Cannot create XMLHTTP instance');
		return false;
	}
	var url = 'process/edit-category.php';
	var pmeters = 'id='+id;
	category.open('POST',url,true);

	category.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//category.setRequestHeader("Content-length", pmeters.length);
	//category.setRequestHeader("Connection", "close");
	category.send(pmeters);			
	category.onreadystatechange = function(){
		if(category.readyState == 3)  // Loading Request
		{
			document.getElementById("loading-"+id).innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
		}
		if(category.readyState == 4) // Return Request
		{
			document.getElementById("loading-"+id).innerHTML = '';
			$("#result").fadeIn(200).html(category.responseText);
		}				
	}
}

function modeCategory(modes){
	
	$(".item").removeClass('active');
	$("#option-item-"+modes).addClass('active');

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
		alert('Cannot create XMLHTTP instance');
		return false;
	}
	var url = 'process/mode-category.php';
	var pmeters = 'mode=' + modes;
	mode.open('POST',url,true);

	mode.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//mode.setRequestHeader("Content-length", pmeters.length);
	//mode.setRequestHeader("Connection", "close");
	mode.send(pmeters);			
	mode.onreadystatechange = function(){
		if(mode.readyState == 3)  // Loading Request
		{
			//document.getElementById("loading-"+id).innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
		}
		if(mode.readyState == 4) // Return Request
		{
			//document.getElementById("loading-"+id).innerHTML = '';
			$("#list").fadeIn(200).html(mode.responseText);
		}				
	}
}

// Create, Edit, and Delete
function formCategory(event,id,title,urls,description,keyword,image){
	$('#console').fadeIn(300);
	form = false;
	if(window.XMLHttpRequest) { // Mozilla, Safari,...
		form = new XMLHttpRequest();
			if (form.overrideMimeType) {
				form.overrideMimeType('text/html');
			}
	}else if (window.ActiveXObject) { // IE
		try{
			form = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				form = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}
	
	if (!form) {
		alert('Cannot create XMLHTTP instance');
		return false;
	}

	var pmeters = 'id='+id+'&title='+title+'&url='+urls+'&description='+description+'&keyword='+keyword+'&image='+image;

	if(event == 'edit'){
		var url = 'process/process-category-edit.php';
	}
	else if(event == 'create'){
		var url = 'process/process-category-create.php';	
	}

	form.open('POST',url,true);
	form.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//form.setRequestHeader("Content-length", pmeters.length);
	//form.setRequestHeader("Connection", "close");
	form.send(pmeters);			
	form.onreadystatechange = function(){
		if(form.readyState == 3)  // Loading Request
		{
			document.getElementById("console").innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
		}
		if(form.readyState == 4) // Return Request
		{
			//document.getElementById("loading-"+id).innerHTML = '';
			$("#console").fadeIn(200).html(form.responseText);
			$('#console').delay(1200).fadeOut(300);

			if(event == 'edit'){
				showCategory(id);
			}
			else if(event == 'create'){
				toCreateCategory()
			}
			modeCategory(1);
		}				
	}
}

function searchCategory(q){

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
		alert('Cannot create XMLHTTP instance');
		return false;
	}
	var url = 'process/process-category-search.php';
	var pmeters = 'q=' + q;
	search.open('POST',url,true);

	search.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	search.send(pmeters);			
	search.onreadystatechange = function(){
		if(search.readyState == 3)  // Loading Request
		{
			//document.getElementById("loading-"+id).innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
		}
		if(search.readyState == 4) // Return Request
		{
			//document.getElementById("loading-"+id).innerHTML = '';
			$("#list").fadeIn(200).html(search.responseText);
		}				
	}
}

function deleteCategory(id){
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
	var url = 'process/process-category-delete.php';
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

function statusCategory(id,stat){
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
	var url = 'process/process-category-status.php';
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

			modeCategory(1);
		}				
	}
}

function toCreateCategory(){
	modeCategory(1);
	$("#result").load("html/category-form.php");
}