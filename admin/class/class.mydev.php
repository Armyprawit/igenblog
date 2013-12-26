<?php
// CLASS MYDEV this Class by igensite.com
class MyDev{
	
	public function convTextToMetaTag($text){
		return str_replace('\"','',$text);
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
	
	
	//FIND REAL IP ADDRESS
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
	
	// THAI DATA STYLE FACEBOOK	
	public function fb_thaidate($timestamp){
	
		$diff = time() - $timestamp;
		$periods = array("วินาที ", "นาที ", "ชั่วโมง ");	
		$words="ที่แล้ว";
	
		if($diff < 60){
			$i = 0;
			$diff = ($diff == 1)?"":$diff;
			$text = "เมื่อ $diff $periods[$i]$words";	
		}
		else if($diff < 3600){
			$i = 1;
			$diff = round($diff/60);
			$diff = ($diff == 3 || $diff == 4)?"":$diff;
			$text = "เมื่อ $diff $periods[$i]$words";	
		}
		else if($diff < 86400){
			$i = 2;
			$diff = round($diff/3600);
			$diff = ($diff != 1)?$diff:"" . $diff ;		
			$text = "เมื่อ $diff $periods[$i]$words";	
		}
		else if($diff < 172800){
			$diff = round($diff/86400);
			$text = date("G:i",$timestamp).' &rsaquo; เมื่อ '.$diff.' วันที่แล้ว';								
		}
		else{
			$thMonth = array("มกราคม","กุมภาพันธื","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
			$date = date("j", $timestamp);
			$month = $thMonth[date("m", $timestamp)-1];
			$y = date("Y", $timestamp)+543;
			$t1 = "$date  $month  $y";
			$t2 = "$date  $month  $y";		

			if($timestamp < strtotime(date("Y-01-01 00:00:00"))){
				$text = ''.date("G:i",$timestamp).' &rsaquo; '.$t2;
			}
			else{					
				$text = ''.date("G:i",$timestamp).' &rsaquo; '.$t2;	
			}
		}
		return $text;
	}
	
	
	
	public function encryptionKeys($key){
		$key = md5($key);
		return $this->encryptionKey($key);
	}
	
	private function encryptionKey($key){return md5(md5($key));}
}
?>