<?php

//////////////////
/* CLASS VIDEO. */
//////////////////

class Youtube{
	
	// Find Code Video in Link Video (Youtube)
	public function findCodeVideoYoutube($link,$mode){
		// Mode Link of Youtube
		// 1 = http://www.youtube.com/watch?v=ZK_aAq-2VkI
		// 2 = http://youtu.be/bU8a1t99rQs
		if($mode == '1'){
			$position = strpos($link,'v=',0);
			$video_code = substr($link,$position+2,11);
			return $video_code;
		}
		else if($mode == '2'){
			$position = strpos($link,'.be/',0);
			$video_code = substr($link,$position+4,11);
			return $video_code;
		}
	}
	
	// GET video data by Youtube API
	public function getVideoDataByLinkAPI($link,$mode){
		$link = $this->findCodeVideoYoutube($link,$mode);
		$url = 'http://gdata.youtube.com/feeds/api/videos?q='.trim($link).'&max-results=1&v=2&alt=jsonc';
		$json = file_get_contents($url);
		$data = json_decode($json);
		
		if($data->data->items){
			foreach ( $data->data->items as $data ){
				$video['title'] = $data->title;
				$video['description'] = $data->description;
				$video['code'] = $data->id;
				$video['image_mini'] = $data->thumbnail->sqDefault;
				$video['image_hd'] = $data->thumbnail->hqDefault;
				$video['uploader'] = $data->uploader;
				$video['duration'] = $data->duration;	
			}
			
			return $video;
		}
	}
	
	// GET video data by cURL
	public function getVideoDataByLinkCURL($link,$mode){
		$link = $this->findCodeVideoYoutube($link,$mode);
		$ch = curl_init("http://www.youtube.com/watch?v=$link");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$data = curl_exec($ch);
		curl_close($ch);
		
		$s = strpos($data,'name="description"',1);
	
		if($s>1){
			//Find Title
			$ts = strpos($data,'name="title"',1);
			$te = strpos($data,'">',$ts)-22;
			$title = substr($data,$ts+22,($te-$ts));
			$video['title'] = trim(strip_tags($title));
		
			//Find Description
			$ds = strpos($data,'name="description"',1);
			$de = strpos($data,'">',$ds)-28;
			$description = substr($data,$ds+28,($de-$ds));
			$video['description'] = trim(strip_tags($description));
		
			//Find Keyword
			$ks = strpos($data,'name="keywords"',1);
			$ke = strpos($data,'">',$ks)-25;
			$keyword = substr($data,$ks+25,($ke-$ks));
			$video['keyword'] = trim(strip_tags($keyword));
			
			// Return $feed with Array.
			return $video;
		}
	}
}

?>