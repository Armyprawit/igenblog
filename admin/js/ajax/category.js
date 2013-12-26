// JavaScript Document
var category = false;
var mode = false;
var form = false;
var search = false;

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

function toCreateCategory(){
	modeCategory(1);
	$("#result").load("html/category-form.php");
}