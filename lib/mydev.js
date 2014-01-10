$(document).on("ready", function(){
  // make every image fill their direct parent
  $(".img").imagefill();
  
  // subscibe to the "fillsContainer" event
  $(".img").on("fillsContainer", function(event, imageProperties){
    //console.log(event, imageProperties);
  });  
});

var headerBarState = 'show';

function headerBar(){
	if(headerBarState == 'show'){
		$("#header").animate({left:"0%"},400);
		headerBarState = 'close';
	}
	else if(headerBarState == 'close'){
		$("#header").animate({left:"-82%"},600);
		headerBarState = 'show';
	}
}