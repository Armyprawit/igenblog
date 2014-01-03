// JavaScript Document
var loading = false;
var mode = false;
var search = false;
var index = 21;
var state = true;

// scroll event to load more Video.
$(window).scroll(function() {
  if($(window).scrollTop() + $(window).height() >= $(document).height()-100) {
  	if(state){
  		loadingFeed(0,0,index);
  	}
  }
});

function loadingFeed(category,type,start){
	state = true;
	loading = false;
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
	var url = 'process/process-feed-loading.php';
	var pmeters = 'type='+type+'&start='+start+'&category='+category;
	loading.open('POST',url,true);

	loading.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	loading.send(pmeters);			
	loading.onreadystatechange = function(){
		if(loading.readyState == 3)  // Loading Request
		{
		}
		if(loading.readyState == 4) // Return Request
		{
			$('#feedDisplay').append(loading.responseText);
			console.log("start:"+start);
			index+=21;
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