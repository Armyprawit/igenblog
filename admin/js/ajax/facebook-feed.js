// JavaScript Document
var create = false;
var loading = false;
var cretes = false;
var deletes = false;

var toPost = false;

var index = 10;
var state = true;

// scroll event to load more Photo.
$(window).scroll(function() {
  if($(window).scrollTop() + $(window).height() >= $(document).height()-50) {
  	if(state){
  		loadingFacebookFeed($('#feedType').val(),index)
  	}
  }
});

function modeListFacebookFeed(type){
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
	var url = 'process/mode-facebook-feed.php';
	var pmeters = 'type='+type;
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
	index = 10;
}

function loadingFacebookFeed(type,start){
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
	var url = 'process/process-facebook-feed-loading.php';
	var pmeters = 'start='+start+'&type='+type;
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
			console.log("Start:"+start+" / Type:"+type);
			index+=10;

			$("#loadingProcess").slideUp('fast');
		}				
	}
}

function feedToPost(type,id){
	state = true;
	toPost = false;

	if(window.XMLHttpRequest) { // Mozilla, Safari,...
		toPost = new XMLHttpRequest();
			if (toPost.overrideMimeType) {
				toPost.overrideMimeType('text/html');
			}
	}else if (window.ActiveXObject) { // IE
		try{
			toPost = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				toPost = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}
	
	if (!toPost) {
		alert('Cannot toPost XMLHTTP instance');
		return false;
	}

	if(type == 'video'){
		var url = 'process/process-facebook-video-createform.php';
	}
	else if(type == 'photo'){
		var url = 'process/process-facebook-photo-createform.php';
	}
	else if(type == 'article'){
		var url = 'process/process-facebook-article-createform.php';
	}

	var pmeters = 'id='+id;
	toPost.open('POST',url,true);

	toPost.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	toPost.send(pmeters);			
	toPost.onreadystatechange = function(){
		if(toPost.readyState == 3)  // toPost Request
		{
		}
		if(toPost.readyState == 4) // Return Request
		{
			$("#result").fadeIn(200).html(toPost.responseText);
		}				
	}
}

function createVideo(id,category,title,context,keyword){
	state = true;
	showLiveView('close');
	$("#console").animate({bottom:"0px"},800);

	creates = false;
	if(window.XMLHttpRequest) { // Mozilla, Safari,...
		creates = new XMLHttpRequest();
			if (creates.overrideMimeType) {
				creates.overrideMimeType('text/html');
			}
	}else if (window.ActiveXObject) { // IE
		try{
			creates = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				creates = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}
	
	if (!creates) {
		alert('Cannot creates XMLHTTP instance');
		return false;
	}
	var url = 'process/process-facebook-feed-video-create.php';
	context = context.replace(/\r?\n/g,"<br>");
	var pmeters = 'id='+id+'&category='+category+'&title='+title+'&description='+context+'&keyword='+keyword;
	creates.open('POST',url,true);

	creates.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	creates.send(pmeters);			
	creates.onreadystatechange = function(){
		if(creates.readyState == 3)  // Loading Request
		{
		}
		if(creates.readyState == 4) // Return Request
		{
			$("#console").fadeIn(200).html(creates.responseText);
			$("#console").delay(3000).animate({bottom:"-50px"},500);

			$("#result").fadeIn(200).html('');

			//modeListFacebookFeed($('#feedType').val());
			$("#"+id+"").slideUp(400);
		}				
	}
}

function createPhoto(id,image,context,category,keyword){
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
	var url = 'process/process-facebook-feed-photo-create.php';
	context = context.replace(/\r?\n/g,"<br>");
	var pmeters = 'id='+id+'&image='+image+'&description='+context+'&category='+category+'&keyword='+keyword;
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

			$("#result").fadeIn(200).html('');

			//modeListFacebookFeed($('#feedType').val());
			$("#"+id+"").slideUp(400);
		}				
	}
}

// Crete new Article
function createArticle(id,image,title,context,category,keyword,credit){
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
	var url = 'process/process-facebook-feed-article-create.php';
	context = context.replace(/\r?\n/g,"<br>");
	var pmeters = 'id='+id+'&image='+image+'&title='+title+'&context='+context+'&category='+category+'&keyword='+keyword+'&credit='+credit;
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

			$("#result").fadeIn(200).html('');

			//modeListFacebookFeed($('#feedType').val());
			$("#"+id+"").slideUp(400);
		}				
	}
}

function deleteFeed(id){
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
	var url = 'process/process-facebook-feed-delete.php';
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