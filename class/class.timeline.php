<?php
class Timeline extends Mydev{
	
	// Get Feed Timeline.
	public function getFeedTimeline($dbHandle,$event,$type,$category_id,$start,$total){
		try{
			if($type == 1){
				// echo'Video Mode';
				$stmt = $dbHandle->prepare('SELECT tl_id,tl_category_id,tl_type,tl_content_id,tl_post_time,tl_last_time,tl_status FROM bl_timeline WHERE tl_status = 1 AND tl_type = :type ORDER BY tl_post_time DESC LIMIT :start,:total');
				$stmt->bindParam(':type',$type);
			}
			else if($type == 2){
				// echo'Article Mode';
				$stmt = $dbHandle->prepare('SELECT tl_id,tl_category_id,tl_type,tl_content_id,tl_post_time,tl_last_time,tl_status FROM bl_timeline WHERE tl_status = 1 AND tl_type = :type ORDER BY tl_post_time DESC LIMIT :start,:total');
				$stmt->bindParam(':type',$type);
			}
			else if($type == 3){
				// echo'Photo Mode';
				$stmt = $dbHandle->prepare('SELECT tl_id,tl_category_id,tl_type,tl_content_id,tl_post_time,tl_last_time,tl_status FROM bl_timeline WHERE tl_status = 1 AND tl_type = :type ORDER BY tl_post_time DESC LIMIT :start,:total');
				$stmt->bindParam(':type',$type);
			}
			else if($type == 4){
				// echo'Category Mode';
				$stmt = $dbHandle->prepare('SELECT tl_id,tl_category_id,tl_type,tl_content_id,tl_post_time,tl_last_time,tl_status FROM bl_timeline WHERE tl_status = 1 AND tl_category_id = :category ORDER BY tl_post_time DESC LIMIT :start,:total');
				$stmt->bindParam(':category',$category_id);
			}
			else{
				// echo'Other Mode';
				$stmt = $dbHandle->prepare('SELECT tl_id,tl_category_id,tl_type,tl_content_id,tl_post_time,tl_last_time,tl_status FROM bl_timeline WHERE tl_status = 1 ORDER BY tl_post_time DESC LIMIT :start,:total');
			}
				
			// $stmt->bindParam(':type',$type);
			// $stmt->bindParam(':category',$category);

			$stmt->bindParam(':start',$start,PDO::PARAM_INT);
			$stmt->bindParam(':total',$total,PDO::PARAM_INT);

    		$stmt->execute();

    		while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
    			
				if($var['tl_type'] == 1){// Video Feed
					// echo 'Type:'.$type.' / Cat:'.$category_id.'<br>';
					$this->getVideoByContentID($dbHandle,$event,$var['tl_content_id']);
				}
				else if($var['tl_type'] == 2){// Article Feed
					// echo 'Type:'.$type.' / Cat:'.$category_id.'<br>';
					$this->getArticleByContentID($dbHandle,$event,$var['tl_content_id']);
				}
				else if($var['tl_type'] == 3){// Image Feed
					// echo 'Type:'.$type.' / Cat:'.$category_id.'<br>';
					$this->getPhotoByContentID($dbHandle,$event,$var['tl_content_id']);
				}
			}
		}
		catch(PDOException $e){echo'ERROR:'.$e->getMessage();}
	}
	
	//GET VIDEO by Content ID
	public function getVideoByContentID($dbHandle,$event,$content_id){
		try{
			$stmt = $dbHandle->prepare('SELECT vi_id,vi_title,vi_description,vi_duration,vi_code,vi_image_mini,vi_image_hd,vi_post_time,vi_status,ca_id,ca_title FROM bl_video,bl_category WHERE vi_id = :id AND vi_category_id = ca_id');

    		$stmt->bindParam(':id',$content_id);
			$stmt->execute();

			$var = $stmt->fetch(PDO::FETCH_ASSOC);
			if($event == 'normal'){
				include'html/feed-video-item.php';
			}
			else if($event == 'ajax'){
				include'../html/feed-video-item.php';
			}
		}
		catch(PDOException $e){echo'ERROR:'.$e->getMessage();}
	}

	//GET ARTICLE by Content ID
	public function getArticleByContentID($dbHandle,$event,$content_id){
		try{
			$stmt = $dbHandle->prepare('SELECT ar_id,ar_title,ar_image,ar_description,ar_post_time,ar_status,ca_id,ca_title FROM bl_article,bl_category WHERE ar_id = :id AND ar_category_id = ca_id');

    		$stmt->bindParam(':id',$content_id);
			$stmt->execute();

			$var = $stmt->fetch(PDO::FETCH_ASSOC);
			if($event == 'normal'){
				include'html/feed-article-item.php';
			}
			else if($event == 'ajax'){
				include'../html/feed-article-item.php';
			}
		}
		catch(PDOException $e){echo'ERROR:'.$e->getMessage();}
	}

	//GET PHOTO by Content ID
	public function getPhotoByContentID($dbHandle,$event,$content_id){
		try{
			$stmt = $dbHandle->prepare('SELECT im_id,im_image,im_description,im_post_time,im_status,ca_id,ca_title FROM bl_image,bl_category WHERE im_id = :id AND im_category_id = ca_id');

    		$stmt->bindParam(':id',$content_id);
			$stmt->execute();

			$var = $stmt->fetch(PDO::FETCH_ASSOC);
			if($event == 'normal'){
				include'html/feed-photo-item.php';
			}
			else if($event == 'ajax'){
				include'../html/feed-photo-item.php';
			}
		}
		catch(PDOException $e){echo'ERROR:'.$e->getMessage();}
	}

	//GET Image by Content ID
	public function getImageByContentID($content_id){
		$query = "SELECT im_id,im_title,im_image,im_category_id,im_update_time FROM bl_image WHERE im_id = '".mysql_real_escape_string($content_id)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		while($image = mysql_fetch_array($result, MYSQL_ASSOC)){
			?>
            <article class="feed-item">
            	<figure class="image">
                	<a href="image-<?php echo $image['im_id']+1024;?>-<?php echo parent::urlSEO($image['im_title']);?>.html" target="_blank">
                	<img src="<?php echo $image['im_image'];?>" height="350" alt="<?php echo parent::urlSEO($image['im_title']);?>">
                    </a>
                    
                    <section class="title">
                    	<h2>
                			<a href="image-<?php echo $image['im_id']+1024;?>-<?php echo parent::urlSEO($image['im_title']);?>.html" target="_blank">
							<?php echo $image['im_title'];?>
                			</a>
                		</h2>
                    </section>
                    
                    <section class="info">
                    	<?php parent::getCategoryLink($image['im_category_id']);?>
                		<section class="content-type"><img src="image/content_type/gallery.png" alt="Gallery Icon"></section>
                    </section>
                </figure>
            </article>
			<?php
		}
	}
	
	
	// Get Page of Timeline
	public function getPafeTimeline($type,$category_id,$category_url,$page,$pageall){
		
		//Type Sort 1=video, 2=article, 3=image, 4=category
		if($type == 1){
			$query = "SELECT COUNT(tl_id) FROM bl_timeline WHERE tl_status = '1' AND tl_type = '1' AND tl_post_time < '".time()."'";
			$url = "video";
		}
		else if($type == 2){
			$query = "SELECT COUNT(tl_id) FROM bl_timeline WHERE tl_status = '1' AND tl_type = '2' AND tl_post_time < '".time()."'";
			$url = "article";
		}
		else if($type == 3){
			$query = "SELECT COUNT(tl_id) FROM bl_timeline WHERE tl_status = '1' AND tl_type = '3' AND tl_post_time < '".time()."'";
			$url = "image";
		}
		else if($type == 4){
			$query = "SELECT COUNT(tl_id) FROM bl_timeline WHERE tl_status = '1' AND tl_category_id = '".mysql_real_escape_string($category_id)."' AND tl_post_time < '".time()."'";
			$url = "category";
		}
		else{
			$query = "SELECT COUNT(tl_id) FROM bl_timeline WHERE tl_status = '1'";
			$url = "index";
		}
		mysql_query("SET NAMES UTF8");
		if(parent::checkLicense("q12e30e4xls")){$result = mysql_query($query);}
		while($count = mysql_fetch_array($result, MYSQL_ASSOC))
		{$total_feed = $count['COUNT(tl_id)'];}
			
		$total_feed = ($total_feed/$pageall)+1;//Total Page of Clip Content.
	
		for($i=($page - 7);$i <= $page + 7;$i++){
			if($i == $page){
				?><li><?php echo $i;?></li><?php
			}
			else if($i > 0 && $i <= $total_feed){
				if($type == 4){
					?>
                    	<li><a href="cat_<?php echo $category_url;?>_<?php echo $i;?>.html"><?php echo $i;?></a></li>
					<?php
				}
				else{
					?>
                    	<li><a href="<?php echo $url;?>.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
					<?php
				}
			}
		}
	}
	
	//////////////////////////////////
	////////PREV or NEXT Content//////
	//////////////////////////////////
	//Prev Content
	public function prevContent($type,$content_id,$t){
		$query = "SELECT * FROM bl_timeline WHERE tl_type = '".mysql_real_escape_string($type)."' AND tl_content_id < '".mysql_real_escape_string($content_id)."' AND tl_status = '1' AND tl_post_time < '".time()."' ORDER BY tl_id DESC LIMIT 0,1";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		while($timeline = mysql_fetch_array($result, MYSQL_ASSOC)){
			// Video Feed
			if($timeline['tl_type'] == 1){
				$this->getRVideo($timeline['tl_content_id'],$t);
			}
			// Article Feed
			if($timeline['tl_type'] == 2){
				$this->getRArticle($timeline['tl_content_id'],$t);
			}
			// Image Feed
			if($timeline['tl_type'] == 3){
				$this->getRImage($timeline['tl_content_id'],$t);
			}
		}
	}
	///Next Content
	public function nextContent($type,$content_id,$t){
		$query = "SELECT * FROM bl_timeline WHERE tl_type = '".mysql_real_escape_string($type)."' AND tl_content_id > '".mysql_real_escape_string($content_id)."' AND tl_status = '1' AND tl_post_time < '".time()."' ORDER BY tl_id ASC LIMIT 0,1";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		while($timeline = mysql_fetch_array($result, MYSQL_ASSOC)){
			// Video Feed
			if($timeline['tl_type'] == 1){
				$this->getRVideo($timeline['tl_content_id'],$t);
			}
			// Article Feed
			if($timeline['tl_type'] == 2){
				$this->getRArticle($timeline['tl_content_id'],$t);
			}
			// Image Feed
			if($timeline['tl_type'] == 3){
				$this->getRImage($timeline['tl_content_id'],$t);
			}
		}
	}
	
	//GET VIDEO
	public function getRVideo($content_id,$t){
		$query = "SELECT vi_id,vi_title,vi_code,vi_category_id,vi_update_time,vi_type FROM bl_video WHERE vi_id = '".mysql_real_escape_string($content_id)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		while($video = mysql_fetch_array($result, MYSQL_ASSOC)){
			//Prev
			if($t == 1){
			?>
            <section class="prev">
            	<section class="images"><img src="image/btn-prev.png" width="30" alt="Prev Icon"></section>
            	<h2>
                	<a href="play-<?php echo $video['vi_id']+1024;?>-<?php echo parent::urlSEO($video['vi_title']);?>.html" target="_parent">
					<?php echo $video['vi_title'];?>
                	</a>
                </h2>
            </section>
			<?php
			}
			//Next
			if($t == 2){
			?>
            <section class="next">
            	<section class="images"><img src="image/btn-next.png" width="30" alt="Next Icon"></section>
            	<h2>
                	<a href="play-<?php echo $video['vi_id']+1024;?>-<?php echo parent::urlSEO($video['vi_title']);?>.html" target="_parent">
					<?php echo $video['vi_title'];?>
                	</a>
                </h2>
            </section>
			<?php
			}
		}
	}
	//GET Article
	public function getRArticle($content_id,$t){
		$query = "SELECT ar_id,ar_title,ar_image,ar_category_id,ar_update_time FROM bl_article WHERE ar_id = '".mysql_real_escape_string($content_id)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		while($article = mysql_fetch_array($result, MYSQL_ASSOC)){
			//Prev
			if($t == 1){
			?>
            <section class="prev">
            	<section class="images"><img src="image/btn-prev.png" width="30" alt="Prev Icon"></section>
            	<h2>
                	<a href="read-<?php echo $article['ar_id']+1024;?>-<?php echo parent::urlSEO($article['ar_title']);?>.html" target="_parent">
					<?php echo $article['ar_title'];?>
                	</a>
                </h2>
            </section>
			<?php
			}
			//Next
			if($t == 2){
			?>
            <section class="next">
            	<section class="images"><img src="image/btn-next.png" width="30" alt="Next Icon"></section>
            	<h2>
                	<a href="read-<?php echo $article['ar_id']+1024;?>-<?php echo parent::urlSEO($article['ar_title']);?>.html" target="_parent">
					<?php echo $article['ar_title'];?>
                	</a>
                </h2>
            </section>
			<?php
			}
		}
	}
	//GET Image
	public function getRImage($content_id,$t){
		$query = "SELECT im_id,im_title,im_image,im_category_id,im_update_time FROM bl_image WHERE im_id = '".mysql_real_escape_string($content_id)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		while($image = mysql_fetch_array($result, MYSQL_ASSOC)){
			//Prev
			if($t == 1){
			?>
            <section class="prev">
            	<section class="images"><img src="image/btn-prev.png" width="30" alt="Prev Icon"></section>
            	<h2>
                	<a href="image-<?php echo $image['im_id']+1024;?>-<?php echo parent::urlSEO($image['im_title']);?>.html" target="_parent">
					<?php echo $image['im_title'];?>
                	</a>
                </h2>
            </section>
			<?php
			}
			//Next
			if($t == 2){
			?>
            <section class="next">
            	<section class="images"><img src="image/btn-next.png" width="30" alt="Next Icon"></section>
            	<h2>
                	<a href="image-<?php echo $image['im_id']+1024;?>-<?php echo parent::urlSEO($image['im_title']);?>.html" target="_parent">
					<?php echo $image['im_title'];?>
                	</a>
                </h2>
            </section>
			<?php
			}
		}
	}
	
	
	///////////////////////////////////
	///////////////////////////////////
	
	
	
	///////////////////////////////////
	//Get Relates Content by Category//
	///////////////////////////////////
	public function getRelatedContent($category_id,$type,$total){
		$query = "SELECT * FROM bl_timeline WHERE tl_category_id = '".mysql_real_escape_string($category_id)."' AND tl_type = '".mysql_real_escape_string($type)."' AND tl_status = '1' AND tl_post_time < '".time()."' ORDER BY RAND() LIMIT 0,$total";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		while($timeline = mysql_fetch_array($result, MYSQL_ASSOC)){
			
			// Video Feed
			if($timeline['tl_type'] == 1){
				$this->getRelatedVideo($timeline['tl_content_id']);
			}
			// Article Feed
			if($timeline['tl_type'] == 2){
				$this->getRelatedArticle($timeline['tl_content_id']);
			}
			// Image Feed
			if($timeline['tl_type'] == 3){
				$this->getRelatedImage($timeline['tl_content_id']);
			}
		}
	}
	//GET RELATED CONTENT (read,watch,image page.)
	//GET RELATED VIDEO
	public function getRelatedVideo($content_id){
		$query = "SELECT vi_id,vi_title,vi_code,vi_category_id,vi_update_time,vi_type,vi_image_hd FROM bl_video WHERE vi_id = '".mysql_real_escape_string($content_id)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		while($video = mysql_fetch_array($result, MYSQL_ASSOC)){
			?>
            <article class="item">
            	<figure class="images">
                	<a href="play-<?php echo $video['vi_id']+1024;?>-<?php echo parent::urlSEO($video['vi_title']);?>.html" target="_parent">
                	<img src="<?php echo $video['vi_image_hd'];?>" alt="<?php echo parent::urlSEO($video['vi_title']);?>">
                    </a>
                </figure>
            	<h2>
                	<a href="play-<?php echo $video['vi_id']+1024;?>-<?php echo parent::urlSEO($video['vi_title']);?>.html" target="_parent">
					<?php echo $video['vi_title'];?>
                	</a>
                </h2>
            </article>
			<?php
		}
	}
	//GET Related Article by Category
	public function getRelatedArticle($content_id){
		$query = "SELECT ar_id,ar_title,ar_image,ar_category_id,ar_update_time FROM bl_article WHERE ar_id = '".mysql_real_escape_string($content_id)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		while($article = mysql_fetch_array($result, MYSQL_ASSOC)){
			?>
            <article class="item">
            	<figure class="images">
                	<a href="read-<?php echo $article['ar_id']+1024;?>-<?php echo parent::urlSEO($article['ar_title']);?>.html" target="_parent">
                	<img src="<?php echo $article['ar_image'];?>" alt="<?php echo parent::urlSEO($article['ar_title']);?>">
                    </a>
                </figure>
            	<h2>
                	<a href="read-<?php echo $article['ar_id']+1024;?>-<?php echo parent::urlSEO($article['ar_title']);?>.html" target="_parent">
					<?php echo $article['ar_title'];?>
                	</a>
                </h2>
            </article>
			<?php
		}
	}
	//GET Related Image by Category
	public function getRelatedImage($content_id){
		$query = "SELECT im_id,im_title,im_image,im_category_id,im_update_time FROM bl_image WHERE im_id = '".mysql_real_escape_string($content_id)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		while($image = mysql_fetch_array($result, MYSQL_ASSOC)){
			?>
            <article class="item">
            	<figure class="images">
                	<a href="image-<?php echo $image['im_id']+1024;?>-<?php echo parent::urlSEO($image['im_title']);?>.html" target="_parent">
                	<img src="<?php echo $image['im_image'];?>" alt="<?php echo parent::urlSEO($image['im_title']);?>">
                    </a>
                </figure>
            	<h2>
                	<a href="image-<?php echo $image['im_id']+1024;?>-<?php echo parent::urlSEO($image['im_title']);?>.html" target="_parent">
					<?php echo $image['im_title'];?>
                	</a>
                </h2>
            </article>
			<?php
		}
	}
	
	
	
	
	/////////////////////////////////
	//Get Other Content by Category//
	/////////////////////////////////
	public function getOtherContent($category_id,$total){
		$query = "SELECT * FROM bl_timeline WHERE tl_category_id = '".mysql_real_escape_string($category_id)."' LIMIT 0,$total";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		while($timeline = mysql_fetch_array($result, MYSQL_ASSOC)){
			
			// Video Feed
			if($timeline['tl_type'] == 1){
				$this->getOtherVideoByCategory($timeline['tl_content_id']);
			}
			// Article Feed
			if($timeline['tl_type'] == 2){
				$this->getOtherArticleByCategory($timeline['tl_content_id']);
			}
			// Image Feed
			if($timeline['tl_type'] == 3){
				$this->getOtherImageByCategory($timeline['tl_content_id']);
			}
		}
	}
	
	// GET OTHER CONTENT (read,watch,image page.)
	//GET OTHER VIDEO by Category
	public function getOtherVideoByCategory($content_id){
		$query = "SELECT vi_id,vi_title,vi_code,vi_category_id,vi_update_time,vi_type,vi_image_hd FROM bl_video WHERE vi_id = '".mysql_real_escape_string($content_id)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		while($video = mysql_fetch_array($result, MYSQL_ASSOC)){
			?>
            <article class="recommend-item">
            	<h2>
                	<a href="play-<?php echo $video['vi_id']+1024;?>-<?php echo parent::urlSEO($video['vi_title']);?>.html" target="_parent">
					<?php echo $video['vi_title'];?>
                	</a>
                </h2>
                <figure class="image">
                	<a href="play-<?php echo $video['vi_id']+1024;?>-<?php echo parent::urlSEO($video['vi_title']);?>.html" target="_parent">
                	<img src="<?php echo $video['vi_image_hd'];?>" height="300" alt="<?php echo parent::urlSEO($image['im_title']);?>">
                    </a>
                </figure>
            </article>
			<?php
		}
	}
	//GET Other Article by Category
	public function getOtherArticleByCategory($content_id){
		$query = "SELECT ar_id,ar_title,ar_image,ar_category_id,ar_update_time FROM bl_article WHERE ar_id = '".mysql_real_escape_string($content_id)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		while($article = mysql_fetch_array($result, MYSQL_ASSOC)){
			?>
            <article class="recommend-item">
            	<h2>
                	<a href="read-<?php echo $article['ar_id']+1024;?>-<?php echo parent::urlSEO($article['ar_title']);?>.html" target="_parent">
					<?php echo $article['ar_title'];?>
                	</a>
                </h2>
                <figure class="image">
                	<a href="read-<?php echo $article['ar_id']+1024;?>-<?php echo parent::urlSEO($article['ar_title']);?>.html" target="_parent">
                	<img src="<?php echo $article['ar_image'];?>" height="300" alt="<?php echo parent::urlSEO($article['ar_title']);?>">
                    </a>
                </figure>
            </article>
			<?php
		}
	}
	//GET Other Image by Category
	public function getOtherImageByCategory($content_id){
		$query = "SELECT im_id,im_title,im_image,im_category_id,im_update_time FROM bl_image WHERE im_id = '".mysql_real_escape_string($content_id)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		while($image = mysql_fetch_array($result, MYSQL_ASSOC)){
			?>
            <article class="recommend-item">
            	<h2>
                	<a href="image-<?php echo $image['im_id']+1024;?>-<?php echo parent::urlSEO($image['im_title']);?>.html" target="_parent">
					<?php echo $image['im_title'];?>
                	</a>
                </h2>
                <figure class="image">
                	<a href="image-<?php echo $image['im_id']+1024;?>-<?php echo parent::urlSEO($image['im_title']);?>.html" target="_parent">
                	<img src="<?php echo $image['im_image'];?>" height="300" alt="<?php echo parent::urlSEO($image['im_title']);?>">
                    </a>
                </figure>
            </article>
			<?php
		}
	}
	
	//Check Content if Show Navigator Menu
	public function checkContentInTimeline($type){
		$query = "SELECT COUNT(tl_id) FROM bl_timeline WHERE tl_status = '1' AND tl_type = '".mysql_real_escape_string($type)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		$count = mysql_fetch_array($result, MYSQL_ASSOC);
		if($count['COUNT(tl_id)'] > 0){
			return true;
		}
		else{
			return false;
		}
	}
	
	//Last View of Content
	public function getContentLastView($type,$total){
		
		// GET Timeline.
		//Type Sort 1=video, 2=article, 3=image, 4=category
		if($type == 1){
			$query = "SELECT tl_category_id,tl_type,tl_content_id,tl_last_time FROM bl_timeline WHERE tl_type = '1' AND tl_status = '1' AND tl_post_time < '".time()."' ORDER BY tl_last_time DESC LIMIT 0,$total";
		}
		else if($type == 2){
			$query = "SELECT tl_category_id,tl_type,tl_content_id,tl_last_time FROM bl_timeline WHERE tl_type = '2' AND tl_status = '1' AND tl_post_time < '".time()."' ORDER BY tl_last_time DESC LIMIT 0,$total";
		}
		else if($type == 3){
			$query = "SELECT tl_category_id,tl_type,tl_content_id,tl_last_time FROM bl_timeline WHERE tl_type = '3' AND tl_status = '1' AND tl_post_time < '".time()."' ORDER BY tl_last_time DESC LIMIT 0,$total";
		}
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		while($timeline = mysql_fetch_array($result, MYSQL_ASSOC)){
			
			// Video Feed
			if($timeline['tl_type'] == 1){
				$this->getVideoByContentLastView($timeline['tl_content_id']);
			}
			// Article Feed
			if($timeline['tl_type'] == 2){
				$this->getArticleByContentLastView($timeline['tl_content_id']);
			}
			// Image Feed
			if($timeline['tl_type'] == 3){
				$this->getImageByContentLastView($timeline['tl_content_id']);
			}
		}
	}
	
	//GET VIDEO by Content ID
	public function getVideoByContentLastView($content_id){
		$query = "SELECT vi_id,vi_title,vi_code,vi_category_id,vi_update_time,vi_image_hd,vi_type FROM bl_video WHERE vi_id = '".mysql_real_escape_string($content_id)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		while($video = mysql_fetch_array($result, MYSQL_ASSOC)){
			?>
            <section class="item">
            	<h2>
				<a href="play-<?php echo $video['vi_id']+1024;?>-<?php echo parent::urlSEO($video['vi_title']);?>.html" target="_blank">
				<?php echo $video['vi_title'];?>
                </a>
                </h2>
            </section>
			<?php
		}
	}
	//GET Article by Content ID
	public function getArticleByContentLastView($content_id){
		$query = "SELECT ar_id,ar_title,ar_image,ar_category_id,ar_update_time FROM bl_article WHERE ar_id = '".mysql_real_escape_string($content_id)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		while($article = mysql_fetch_array($result, MYSQL_ASSOC)){
			?>
            <section class="item">
            	<h2>
                <a href="read-<?php echo $article['ar_id']+1024;?>-<?php echo parent::urlSEO($article['ar_title']);?>.html" target="_blank">
				<?php echo $article['ar_title'];?>
                </a>
                </h2>
            </section>
			<?php
		}
	}
	//GET Image by Content ID
	public function getImageByContentLastView($content_id){
		$query = "SELECT im_id,im_title,im_image,im_category_id,im_update_time FROM bl_image WHERE im_id = '".mysql_real_escape_string($content_id)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		while($image = mysql_fetch_array($result, MYSQL_ASSOC)){
			?>
            <section class="item">
            	<h2>
                <a href="image-<?php echo $image['im_id']+1024;?>-<?php echo parent::urlSEO($image['im_title']);?>.html" target="_blank">
				<?php echo $image['im_title'];?>
                </a>
                </h2>
            </section>
			<?php
		}
	}
}
?>