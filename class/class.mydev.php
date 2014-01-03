<?php
// CLASS MYDEV this Class by igensite.com
class MyDev extends License{
	
	
	//Get URL for SEO
	/*
	public function urlSEO($raw){
     	$raw = preg_replace('#[^-ก-๙a-zA-Z0-9]#u','-', $raw);
     	$raw =  ereg_replace("-+","-",$raw);
     	if(substr($raw,0,1) == '-'){
			$raw = substr($raw,1);
		}
     	if(substr($game_url,-1) == '-'){
          $raw = substr($raw,0,-1);
	 	}
     	return urlencode($raw);
	}
	*/
	//Random Color of Aff Button
	public function randomColorAffBtn(){
		$i = rand(1,8);
		if($i==1){$color="style=\"background:#1abc9c;\"";}
		else if($i==2){$color="style=\"background:#2980b9;\"";}
		else if($i==3){$color="style=\"background:#f1c40f;\"";}
		else if($i==4){$color="style=\"background:#e74c3c;\"";}
		else if($i==5){$color="style=\"background:#8e44ad;\"";}
		else if($i==6){$color="style=\"background:#34495e;\"";}
		else if($i==7){$color="style=\"background:#7f8c8d;\"";}
		else if($i==8){$color="style=\"background:#2ecc71;\"";}
		else{$color="style=\"background:#2c3e50;\"";}
		return $color;
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