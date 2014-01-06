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

// Update Youtube API
var update = false;
var totalVideo = 0;
var wait = 0;
var href = '';

var usernames = '';

function updateVideoYoutube(channel,http,category,stat,start,total){

	console.log("http:"+http+" / category:"+category+" / Status:"+stat);

	var statusStr = '';
	var httpStr = '';

	if(stat == 0){
		statusStr = 'บันทึกแบบร่าง';
	}
	else if(stat == 1){
		statusStr = 'เผยแพร่ทันที';
	}

	if(http == 0){
		httpStr = 'http';
	}
	else if(http == 1){
		httpStr = 'https';
	}

	if(start == 1){
		$("#loading").html(' <i class="fa fa-spinner fa-spin"></i> รอสักครู่...');
		$("#setting").html('<i class="fa fa-cog"></i> '+httpStr+' / '+statusStr+' / '+category);
	}

	if(http == 0){
		href = 'http://gdata.youtube.com/feeds/api/users/'+channel+'/uploads?v=2&alt=jsonc&start-index='+start+'&max-results='+total;
	}
	else if(http == 1){
		href = 'https://gdata.youtube.com/feeds/api/users/'+channel+'/uploads?v=2&alt=jsonc&start-index='+start+'&max-results='+total;
	}

	$.ajax({
		url:href,
		error: function (request, status, error) {
    	    console.log("Request session again!");
    	    wait++;
    	    $('#updateResult').prepend('<div class="waitItem" id="waitItem'+wait+'"><i class="fa fa-exclamation-circle"></i> กำลังขอ Session ใหม่อีกครั้ง ['+wait+']</div>');
    	    $('#waitItem'+wait).hide().slideDown(700);

    	    updateVideoYoutube(channel,http,category,stat,start,total);
    	}
	}).done(function(data){
		$('#process').html(start+' / <span class="t">'+data.data.totalItems+'<span>');
		totalVideo = data.data.totalItems;

		$.each(data.data.items,function(k,v){
			var videoText = v.description;
			videoText = videoText.replace(/\r?\n/g,"<br>");
			newVideoUpdate(category,v.title,videoText,v.duration,'keyword',v.thumbnail.sqDefault,v.thumbnail.hqDefault,v.id,v.uploader,1,stat,start);
		});

		start += total;
		wait = 0;

		if(start > totalVideo){
			$("#loading").html(' <i class="fa fa-check-circle-o"></i> อัพเดทแล้ว');
		}
		else{
			updateVideoYoutube(channel,http,category,stat,start,total);
		}
	}).error();
}

function newVideoUpdate(category,title,text,duration,keyword,image_mini,image_hd,code,uploader,type,status,start){
	if(username ==""){
		return false;
	}

	newUpdate = false;
	if(window.XMLHttpRequest) { // Mozilla, Safari,...
		newUpdate = new XMLHttpRequest();
			if (newUpdate.overrideMimeType) {
				newUpdate.overrideMimeType('text/html');
			}
	}else if (window.ActiveXObject) { // IE
		try{
			newUpdate = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				newUpdate = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}
	
	if (!newUpdate) {
		alert('Cannot create XMLHTTP instance');
		return false;
	}
	var url = 'process/process-video-youtube-update.php';
	var pmeters = 'category='+category+'&title='+title+'&text='+text+'&duration='+duration+'&keyword='+keyword+'&image_mini='+image_mini+'&image_hd='+image_hd+'&code='+code+'&uploader='+uploader+'&type='+type+'&status='+status+'&start='+start;
	newUpdate.open('POST',url,true);

	newUpdate.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	newUpdate.send(pmeters);			
	newUpdate.onreadystatechange = function(){
		if(newUpdate.readyState == 3)  // Loading Request
		{
		}
		if(newUpdate.readyState == 4) // Return Request
		{
			$('#updateResult').prepend(newUpdate.responseText);
			$('#vidItem'+start).hide().slideDown(700);
		}				
	}
}

// scroll event to load more Video.
$(window).scroll(function() {
  if($(window).scrollTop() + $(window).height() >= $(document).height()-50) {
  	if(state){
  		loadingChannel(index);
  	}
  }
});


function getMetaChannel(username){
	if(username ==""){
		return false;
	}

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
	var url = 'process/get-meta-channel.php';
	var pmeters = 'username='+username;
	yt.open('POST',url,true);

	yt.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	yt.send(pmeters);			
	yt.onreadystatechange = function(){
		if(yt.readyState == 3)  // Loading Request
		{
		}
		if(yt.readyState == 4) // Return Request
		{
			if(usernames != username){
				$('#list').prepend(yt.responseText);
			}
			usernames = username;
		}				
	}
}

function createChannel(username){
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
	var url = 'process/process-channel-create.php';
	var pmeters = 'username='+username;
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
			modeListChannel();
			$('#username').val('');
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


function statusChannel(id,stat){
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
	var url = 'process/process-channel-status.php';
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

			modeListChannel();
		}				
	}
}

function modeListChannel(){
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
	var url = 'process/mode-channel.php';
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

function loadingChannel(start){
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
	var url = 'process/process-channel-loading.php';
	var pmeters = 'start='+start;
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
		}				
	}
}

// When click clip item is call this function.
function toSelectChannel(id){
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
	var url = 'process/update-channel.php';
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