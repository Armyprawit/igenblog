<?php
class Image{

	public function newImage($dbHandle,$object_id,$album_id,$product_id,$title,$picture,$source){
		try{
			$stmt = $dbHandle->prepare("INSERT INTO ig_image(im_object_id,im_album_id,im_product_id,im_title,im_picture,im_source,im_create_time,im_update_time) VALUES(:object,:album,:product,:title,:picture,:source,:create,:update)");
			$stmt->bindParam(':object',$object_id);
			$stmt->bindParam(':album',$album_id);
			$stmt->bindParam(':product',$product_id);
			$stmt->bindParam(':title',$title);
			$stmt->bindParam(':picture',$picture);
			$stmt->bindParam(':source',$source);
			$stmt->bindParam(':create',time());
			$stmt->bindParam(':update',time());
			
			$stmt->execute();
		}
		catch(PDOException $e){
			return 'ไม่สามารถทำรายการ กรุณาลองอีกครั้งค่ะ !';
		}
	}

}
?>