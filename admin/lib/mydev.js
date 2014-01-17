var headerBarState = 'show';

function headerBar(){
  if(headerBarState == 'show'){
    $("#navigator").animate({left:"0%"},400);
    headerBarState = 'close';
  }
  else if(headerBarState == 'close'){
    $("#navigator").animate({left:"-102%"},600);
    headerBarState = 'show';
  }
}

/*
$(function() {      
  $("body").swipe({
    swipeLeft:function(event, direction, distance, duration, fingerCount){
      $("#navigator").animate({left:"-102%"},600);
      headerBarState = 'show';
    },
    swipeRight:function(event, direction, distance, duration, fingerCount){
      $("#navigator").animate({left:"0%"},400);
      headerBarState = 'close';
    },
    threshold:0
  });
  
  $("#navigator").swipe({
    swipeLeft:function(event, direction, distance, duration, fingerCount){
      $("#navigator").animate({left:"-102%"},600);
      headerBarState = 'show';
    },
    threshold:0
  });
});
*/

$(function(){
  $('.animated').autosize({append:"\n"});
});

function loadImage(url){
  if(url != ""){
    $("#imageResult").fadeIn(200).html('<img src="'+url+'">');
  }
}

function exampleArticle(text){
  text = text.replace(/\r?\n/g,"<br>");
  $("#exampleDisplay").html(text);
}
function showLiveView(event){
  if(event == 'open'){
    exampleArticle($("#textArea").val());
    $("#viewExample").animate({left:"0%"},800);
  }
  else if(event == 'close'){
    $("#viewExample").animate({left:"-90%"},800);
  }
}

function updateClock(){
  var currentTime = new Date ( );

  var currentHours = currentTime.getHours ( );
  var currentMinutes = currentTime.getMinutes ( );
  var currentSeconds = currentTime.getSeconds ( );

  // Pad the minutes and seconds with leading zeros, if required
  currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
  currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

  // Choose either "AM" or "PM" as appropriate
  var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

  // Convert the hours component to 12-hour format if needed
  currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

  // Convert an hours component of "0" to "12"
  currentHours = ( currentHours == 0 ) ? 12 : currentHours;

  // Compose the string for display
  var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;

  // Update the time display
  document.getElementById("clock").firstChild.nodeValue = currentTimeString;
}