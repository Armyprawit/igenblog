<?php
//Message Set
include_once'var-message.php';

//////////////////
/* CLASS VIDEO. */
//////////////////

class Youtube extends MyDev{

	public function getChannelMeta($username){
		$url = 'http://gdata.youtube.com/feeds/users/'.$username.'?alt=json';
		$json = file_get_contents($url);
		$data = json_decode($json,true);

		$user['title'] = $data['entry']['title']['$t'];
		$user['description'] = $data['entry']['content']['$t'];
		$user['username'] = $data['entry']['yt$username']['$t'];
		$user['image'] = $data['entry']['media$thumbnail']['url'];
		$user['href'] = $data['entry']['id']['$t'];
		$user['url'] = '';
		$user['google'] = $data['entry']['yt$googlePlusUserId']['$t'];
		$user['location'] = $data['entry']['yt$location']['$t'];


		//echo 'title:'.$user['title'].'<br>';
		// echo 'description:'.$user['description'].'<br>';
		// echo 'username:'.$user['username'].'<br>';
		// echo 'image:'.$user['image'].'<br>';
		// echo 'href:'.$user['href'].'<br>';
		// echo 'google:'.$user['google'].'<br>';
		// echo 'location:'.$user['location'].'<br>';

		return $user;
	}
	
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
	public function getVideoDataByChannelAPI($username,$start,$total){
		$url = 'http://gdata.youtube.com/feeds/api/users/'.$username.'/uploads?v=2&alt=jsonc&start-index='.$start.'&max-results='.$total;
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


	public function newChannel($dbHandle,$title,$description,$username,$image,$href,$url,$google,$location){
		global $msg;
		$stmt = $dbHandle->prepare('SELECT ch_id FROM bl_channel WHERE ch_username = ?');
    	$stmt->execute(array($username));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($var['ch_id'] == ""){
			try{
				$stmt = $dbHandle->prepare('INSERT INTO bl_channel(ch_title,ch_description,ch_username,ch_image,ch_href,ch_url,ch_google_plus,ch_location,ch_create_time,ch_update_time) VALUES(:title,:description,:username,:image,:href,:url,:google,:location,:create_time,:update_time)');

				$stmt->bindParam(':title',$title);
				$stmt->bindParam(':description',$description);
				$stmt->bindParam(':username',$username);
				$stmt->bindParam(':image',$image);
				$stmt->bindParam(':href',$href);
				$stmt->bindParam(':url',$url);
				$stmt->bindParam(':google',$google);
				$stmt->bindParam(':location',$location);

				$stmt->bindParam(':create_time',time()); //Create Time
				$stmt->bindParam(':update_time',time()); //Last time
				// $stmt->bindParam(':type',$type);
				// $stmt->bindParam(':status',$status);
			
				$stmt->execute();
				
				return $msg['7'];
			}
			catch(PDOException $e){
				//return $msg['5'];
				return $e->getMessage();
			}
		}
		else{
			return $msg['8'];
		}
	}


	public function listChannel($dbHandle,$event,$type,$status,$start,$total){
		try{
			$stmt = $dbHandle->prepare('SELECT ch_id,ch_title,ch_description,ch_username,ch_image,ch_href,ch_url,ch_create_time,ch_update_time,ch_status FROM bl_channel WHERE ch_type = :type ORDER BY ch_create_time DESC LIMIT :start,:total');

    		$stmt->bindParam(':type',$type);

			$stmt->bindParam(':start',$start,PDO::PARAM_INT);
			$stmt->bindParam(':total',$total,PDO::PARAM_INT);
			$stmt->execute();

			while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
				if($event == "normal"){
					include'html/channel-item.php';
				}
				else if($event == "ajax"){
					include'../html/channel-item.php';
				}
			}
		}
		catch(PDOException $e){echo'ERROR:'.$e->getMessage();}
	}

	public function statusChannel($dbHandle,$id,$status){

		global $msg;
		try{
			$stmt = $dbHandle->prepare('UPDATE bl_channel SET ch_status = :status WHERE ch_id = :id');

				$stmt->bindParam(':status',$status);
				$stmt->bindParam(':id',$id);
			
				$stmt->execute();

				$id = $id + 1024;
				if($status == 1){
					return '<span class="style-2"><i class="fa fa-globe"></i> เผยแพร่ #'.$id.'</span>';
				}
				else if($status == 0){
					return '<span class="style-3"><i class="fa fa-file-text-o"></i> ฉบับร่าง #'.$id.'</span>';
				}
			}
		catch(PDOException $e){
			return $msg['0'];
		}
	}

	//NEW VIDEO
	public function newVideoYoutube($dbHandle,$category_id,$title,$text,$duration,$keyword,$image_mini,$image_hd,$code,$uploader,$type,$status,$start){
		global $msg;
		$duplicate = false;

		$stmt = $dbHandle->prepare('SELECT vi_id FROM bl_video WHERE vi_code = ?');
    	$stmt->execute(array($code));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($var['vi_id'] == ""){
			//$text = str_replace(array("\r\n","\n\r","\r","\n"),"",$text);
			$description = strip_tags($text);
			//$category_id = 0;
			$user_id = 0;
			$article_id = 0;

			try{
				$stmt = $dbHandle->prepare('INSERT INTO bl_video(vi_category_id,vi_user_id,vi_article_id,vi_title,vi_description,vi_text,vi_duration,vi_keyword,vi_image_mini,vi_image_hd,vi_code,vi_uploader,vi_post_time,vi_update_time,vi_type,vi_status) VALUES(:category,:user,:artcle,:title,:description,:context,:duration,:keyword,:image_mini,:image_hd,:code,:uploader,:post_time,:update_time,:type,:status)');
				$stmt->bindParam(':category',$category_id);
				$stmt->bindParam(':user',$user_id);
				$stmt->bindParam(':artcle',$article_id);
				$stmt->bindParam(':title',$title);
				$stmt->bindParam(':description',$description);
				$stmt->bindParam(':context',$text);
				$stmt->bindParam(':duration',$duration);
				$stmt->bindParam(':keyword',$keyword);
				$stmt->bindParam(':image_mini',$image_mini);
				$stmt->bindParam(':image_hd',$image_hd);
				$stmt->bindParam(':code',$code);
				$stmt->bindParam(':uploader',$uploader);
				$stmt->bindParam(':post_time',time()); //Create Time
				$stmt->bindParam(':update_time',time()); //Last time
				$stmt->bindParam(':type',$type);
				$stmt->bindParam(':status',$status);
			
				$stmt->execute();

				// Add Video To Timeline.
				$this->addToTimeLine($dbHandle,$category_id,1,$this->getLastVideoID($dbHandle),$status,time());

				include'../html/update-video-item.php';
				
				//return $msg['7'];
			}
			catch(PDOException $e){
				//return $msg['5'];
				//return $e->getMessage();
			}
		}
		else{
			//return $msg['8'];
			$duplicate = true;
			include'../html/update-video-item.php';
		}
	}

	// Add Video To Timeline.
	// Time Type of Content
	// 1 = Video
	// 2 = Article
	// 3 = Photo
	// 4 = Category
	public function addToTimeLine($dbHandle,$category_id,$type,$content_id,$status,$timepost){
		$stmt = $dbHandle->prepare('SELECT tl_id FROM bl_timeline WHERE tl_type = ? AND tl_content_id = ?');
    	$stmt->execute(array($type,$content_id));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($var['tl_id'] == ""){

			$stmt = $dbHandle->prepare('INSERT INTO bl_timeline(tl_category_id,tl_type,tl_content_id,tl_post_time,tl_last_time,tl_status) VALUES (:category,:type,:id,:post_time,:update_time,:status)');

				$stmt->bindParam(':category',$category_id);
				$stmt->bindParam(':type',$type);
				$stmt->bindParam(':id',$content_id);
				$stmt->bindParam(':post_time',time()); //Create Time
				$stmt->bindParam(':update_time',time()); //Last time
				$stmt->bindParam(':status',$status);
			
				$stmt->execute();
		}
	}
	// GET Last Id of Content
	public function getLastVideoID($dbHandle){
		$stmt = $dbHandle->prepare('SELECT vi_id FROM bl_video ORDER BY vi_post_time DESC LIMIT 1');
    	$stmt->execute();
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		return $var['vi_id'];
	}


	// GET VIDEO DATA
	public function getChannelData($dbHandle,$channel_id){
		$stmt = $dbHandle->prepare('SELECT * FROM bl_channel WHERE ch_id = ?');
    	$stmt->execute(array($channel_id));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		return $var;
	}

	public function infoChannelData($dbHandle,$event){
		if($event == 'total'){
			$stmt = $dbHandle->prepare('SELECT COUNT(ch_id) FROM bl_channel');
    		$stmt->execute();
    		$var = $stmt->fetch(PDO::FETCH_ASSOC);
    		return $var['COUNT(ch_id)'];
		}
	}
}

// echo'<pre>';
// print_r($data);
// echo'</pre>';

?>