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
    $("#viewExample").animate({left:"-60%"},800);
  }
}

// function clearStyle(context){
//  context = strip_tags(context,'<p><a>');
//  $("#textArea").fadeIn(200).val(context);
// }

// function strip_tags (input, allowed) {
//   allowed = (((allowed || "") + "").toLowerCase().match(/<[a-z][a-z0-9]*>/g) || []).join('');
//   var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi,
//     commentsAndPhpTags = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi;
//   return input.replace(commentsAndPhpTags, '').replace(tags, function ($0, $1) {
//     return allowed.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 : '';
//   });
// }

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