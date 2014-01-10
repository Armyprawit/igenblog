<?php
class Analytic extends MyDev{

	public function pageViewData($dbHandle,$id){
		$stmt = $dbHandle->prepare('SELECT pv_value FROM bl_analytic_page_view WHERE pv_id = ?');
    	$stmt->execute(array($id));
    	$var = $stmt->fetch(PDO::FETCH_ASSOC);
    	return $var['pv_value'];
	}
}
?>