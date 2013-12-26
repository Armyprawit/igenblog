<?php
class FB{
	public function postPhotoToPage($facebook,$message,$url,$hashtag,$photo,$album,$fanpage_token){
		if($url != ""){
			$message = $message.' (สั่งซื้อสินค้า '.$url.') #'.$hashtag;
		}
		$args = array(
			'message' => $message,
			'image' => '@' . $photo,
			'aid' => $album, 
			'no_story' => 0,
			'access_token' => $fanpage_token
		);

		$photo = $facebook->api($album . '/photos', 'post', $args);
		
		return $photo['id'];
	}
	
	public function createNewAlbum($facebook,$message,$url,$hashtag,$title,$fanpage_token){
		if($url != ""){
			$message = $message.' (สั่งซื้อสินค้า '.$url.') #'.$hashtag;
		}
		$album_details = array( 
			'message'=> $message, 
			'name'=> $title.' ::'.date('d/m/Y (H:i)').'',
			'access_token' => $fanpage_token
		);
			
		$album_uid = $facebook->api('/'.$fanpage.'/albums', 'post', $album_details);
		return $album_uid['id'];
	}
	
	public function getUrlPhoto($facebook,$id,$fanpage_token){
		$photo = $facebook->api($id.'?fields=id,name,picture,source,images', 'GET', $fanpage_token);
		return $photo;
	}
}
?>