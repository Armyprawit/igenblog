<?php
//Message Set
include_once'var-message.php';

class Category{
	public function newCategory($dbHandle,$title,$description,$url,$keyword,$image){
		global $msg;
		$stmt = $dbHandle->prepare('SELECT ca_id FROM bl_category WHERE ca_title = ?');
    	$stmt->execute(array($title));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($var['ca_id'] == ""){
			try{
				$stmt = $dbHandle->prepare("INSERT INTO bl_category(ca_title,ca_description,ca_url,ca_keyword,ca_image,ca_create_time,ca_last_time) VALUES(:title,:description,:url,:keyword,:image,:c_time,:l_time)");
				$stmt->bindParam(':title',$title);
				$stmt->bindParam(':description',$description);
				$stmt->bindParam(':url',$url);
				$stmt->bindParam(':keyword',$keyword);
				$stmt->bindParam(':image',$image);
				$stmt->bindParam(':c_time',time()); //Create Time
				$stmt->bindParam(':l_time',time()); //Last time
			
				$stmt->execute();
				
				return $msg['7'];
			}
			catch(PDOException $e){
				return $msg['5'];
			}
		}
		else{
			return $msg['8'];
		}
	}
	public function updateCategory($dbHandle,$category_id,$title,$description,$url,$keyword,$image){
		global $msg;
		try{
    		$stmt = $dbHandle->prepare('UPDATE bl_category SET ca_title = :title,ca_description = :description,ca_url = :url,ca_keyword = :keyword,ca_image = :image,ca_last_time = :time WHERE ca_id = :id');
			$stmt->bindParam(':title',$title);
			$stmt->bindParam(':description',$description);
			$stmt->bindParam(':url',$url);
			$stmt->bindParam(':keyword',$keyword);
			$stmt->bindParam(':image',$image);
			$stmt->bindParam(':time',time());
			$stmt->bindParam(':id',$category_id);
			
			$stmt->execute();
			
			return $msg['0'];
			
		}
		catch(PDOException $e){echo'ERROR:'.$e->getMessage();}
	}
	
	//DELETE CATEGORY
	public function deleteCategory($dbHandle,$category_id){
		global $msg;
		$stmt = $dbHandle->prepare('SELECT ca_id FROM ig_category WHERE ca_parent = ?');
    	$stmt->execute(array($category_id));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($var['ca_id'] == ""){
			try{
    			$stmt = $dbHandle->prepare('DELETE FROM ig_category WHERE ca_id = :id');
				$stmt->bindParam(':id',$category_id);
    			$stmt->execute();
				return $msg['0'];
			}
			catch(PDOException $e){
				return $msg['5'];
			}
		}
		else{
			return $msg['1'];
		}
	}
	
	//DELETE CATEGORY
	public function hiddenCategory($dbHandle,$category_id){
		try{
    		$stmt = $dbHandle->prepare('DELETE FROM ig_category WHERE ca_id = :id');
			$stmt->bindParam(':id',$category_id);
    		$stmt->execute();
		}
		catch(PDOException $e){echo'ERROR:'.$e->getMessage();}
	}
	
	public function listCategory($dbHandle,$event,$status,$start,$total){
		try{
    		$stmt = $dbHandle->prepare('SELECT ca_id,ca_title,ca_url,ca_description FROM bl_category WHERE ca_status = :status ORDER BY ca_create_time DESC');
			$stmt->bindParam(':status',$status);
    		$stmt->execute();
			while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
				if($event=="normal"){
					include'html/category-item.php';
				}
				else if($event=="ajax"){
					include'../html/category-item.php';
				}
			}
		}
		catch(PDOException $e){echo'ERROR:'.$e->getMessage();}
	}

	public function searchCategory($dbHandle,$q){
		try{
			if($q != ""){
    			$stmt = $dbHandle->prepare("SELECT ca_id,ca_title,ca_url,ca_description FROM bl_category WHERE ca_title LIKE ? OR ca_url LIKE ? OR ca_description LIKE ? OR ca_id LIKE ? ORDER BY ca_title,ca_url,ca_description");
    		}
    		else{
    			$stmt = $dbHandle->prepare('SELECT ca_id,ca_title,ca_url,ca_description FROM bl_category WHERE ca_status = 1 ORDER BY ca_create_time DESC');
    		}
    		$stmt->bindValue(1,"%$q%",PDO::PARAM_STR);
    		$stmt->bindValue(2,"%$q%",PDO::PARAM_STR);
    		$stmt->bindValue(3,"%$q%",PDO::PARAM_STR);
    		$stmt->bindValue(4,"%$q%",PDO::PARAM_STR);
    		$stmt->execute();
			while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
				include'../html/category-item.php';
			}
		}
		catch(PDOException $e){echo'ERROR:'.$e->getMessage();}
	}
	
	public function listCategoryToSelectForm($dbHandle,$category_id,$mode){
		//Mode :1 = Normal, 0 = Ajax
		try{
    		$stmt = $dbHandle->prepare('SELECT ca_id,ca_title FROM bl_category WHERE ca_status = 1 ORDER BY ca_create_time DESC');
    		$stmt->execute();
			while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
				if($mode == '1'){
					include'html/category-select-form.php';
				}
				if($mode == '0'){
					include'../html/category-select-form.php';
				}
			}
		}
		catch(PDOException $e){echo'ERROR:'.$e->getMessage();}
	}
	
	
	//GET CATEGORY DATA
	public function getCategoryData($dbHandle,$category_id){
		$stmt = $dbHandle->prepare('SELECT * FROM bl_category WHERE ca_id = ?');
    	$stmt->execute(array($category_id));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		return $var;
	}

	public function infoCategoryData($dbHandle,$event){
		if($event == 'total'){
			$stmt = $dbHandle->prepare('SELECT COUNT(ca_id) FROM bl_category');
    		$stmt->execute(array($id));
    		$var = $stmt->fetch(PDO::FETCH_ASSOC);
    		return $var['COUNT(ca_id)'];
		}
	}
}
?>