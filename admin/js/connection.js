// JavaScript Document
var run = function(){
  var req = new XMLHttpRequest();
  req.timeout = 5000;
  req.open('GET','http://www.igensite.com', true);
  req.send();
}

setInterval(run, 3000);