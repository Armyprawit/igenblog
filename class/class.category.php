<?php
class Category extends MyDev{

	public function listCategory($dbHandle,$category_id){
		//Mode :1 = Normal, 0 = Ajax
		try{
    		$stmt = $dbHandle->prepare('SELECT * FROM bl_category WHERE ca_status = 1 ORDER BY ca_create_time DESC');
    		$stmt->execute();
			while($var = $stmt->fetch(PDO::FETCH_ASSOC)){

				$stmts = $dbHandle->prepare('SELECT COUNT(tl_id) FROM bl_timeline WHERE tl_status = 1 AND tl_category_id = ?');
    			$stmts->execute(array($var['ca_id']));
    			$vars = $stmts->fetch(PDO::FETCH_ASSOC);

				include'html/category-item.php';
			}
		}
		catch(PDOException $e){echo'ERROR:'.$e->getMessage();}
	}
	
	// List Category
	public function listAllCategory($category_id){
		$query = "SELECT ca_id,ca_title,ca_description,ca_url,ca_status FROM bl_category WHERE ca_status = '1' ORDER BY ca_create_time ASC";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		while($category = mysql_fetch_array($result, MYSQL_ASSOC)){
		?>
        	<a href="cat_<?php echo $category['ca_url'];?>.html" target="_parent">
    		<section <?php if($category_id == $category['ca_id']){echo "class=\"category-item-selected\"";}else{echo "class=\"category-item\"";}?>>
            	<h3>
					<?php echo $category['ca_title'];?>
                </h3>
            </section>
            </a>
		<?
		}
	}
	
	// Get Cetegory Link (Feed Item)
	public function getCategoryLink($category_id){
		$query = "SELECT ca_title,ca_url FROM bl_category WHERE ca_id = '".mysql_real_escape_string($category_id)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		while($category = mysql_fetch_array($result, MYSQL_ASSOC)){
		?>
    		<section class="category-link"><?php echo $category['ca_title'];?></section>
		<?
		}
	}
	
	//Get Category Data by URL
	public function getCategoryDataByURL($url){
		$query = "SELECT * FROM bl_category WHERE ca_url = '".mysql_real_escape_string($url)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		return $category = mysql_fetch_array($result, MYSQL_ASSOC);
	}
}
?>