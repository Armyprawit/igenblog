<?php
// CLASS MYDEV this Class by igensite.com
class MyDev extends License{

	function convDuration($time){
		$h = round($time/3600,0);
		$time = $time%3600;
		$m = round($time/60,0);
		$time = $time%60;
		$s = $time;
		if($h<10){$h = '0'.$h;}
		if($s<10){$s = '0'.$s;}
	
		if($h<1){
			return "$m:$s";
		}
		else{
			return "$h:$m:$s";
		}
	}

	public function convTextToMetaTag($text){
		$text = str_replace(array("\t","\n"),"",$text);
		$text = str_replace(array('\"'),'',$text);
		return iconv_substr($text,0,280,"UTF-8");
	}

	function br2nl($string){
    	return preg_replace('/\<br(\s*)?\/?\>/i',"\n", $string);
	}
	
	public function urlSEO($data){
		$data = preg_replace('#[^-ก-๙a-zA-Z0-9]#u','-', $data);
		if(substr($data,0,1) == '-'){
			$data = substr($data,1);
		}
     	if(substr($data,-1) == '-'){
          $data = substr($data,0,-1);
	 	}
     	$data = urldecode($data);
 		$data = str_replace(array('   ','  ',' '),array('-','-','-'),$data);
 		$data = str_replace(array('---','--'),array('-','-'),$data);
		
		return rawurlencode($data);
	}
	
	
	//Find Real IP address.
	public function getIpAddress(){
		//check ip from share internet
    	if (!empty($_SERVER['HTTP_CLIENT_IP'])){
      		$ip = $_SERVER['HTTP_CLIENT_IP'];
    	}
		//to check ip is pass from proxy
    	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    	}
    	else{
      		$ip = $_SERVER['REMOTE_ADDR'];
    	}
    	return $ip;
	}
	
	public function fb_thaidate($timestamp){
	
		$diff = time() - $timestamp;
		$periods = array("S. ", "M. ", "H. ");	
		$words="ago";
	
		if($diff < 60){
			$i = 0;
			$diff = ($diff == 1)?"":$diff;
			$text = "$diff $periods[$i]$words";	
		}
		else if($diff < 3600){
			$i = 1;
			$diff = round($diff/60);
			$diff = ($diff == 3 || $diff == 4)?"":$diff;
			$text = "$diff $periods[$i]$words";	
		}
		else if($diff < 86400){
			$i = 2;
			$diff = round($diff/3600);
			$diff = ($diff != 1)?$diff:"" . $diff ;		
			$text = "$diff $periods[$i]$words";	
		}
		else if($diff < 172800){
			$diff = round($diff/86400);
			$text = "$diff days ago " .date("g:i a",$timestamp);								
		}
		else{
			$thMonth = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
			$date = date("j", $timestamp);
			$month = $thMonth[date("m", $timestamp)-1];
			$y = date("Y", $timestamp)+543;
			$t1 = "$date  $month  $y";
			$t2 = "$date  $month  ";		

			if($timestamp < strtotime(date("Y-01-01 00:00:00"))){
				$text = "" . $t1. " " . date("G:i",$timestamp) . ".";
			}
			else{					
				$text = "" . $t2 . " " . date("G:i",$timestamp) . ".";	
			}
		}
		return $text;
	}
}
?>