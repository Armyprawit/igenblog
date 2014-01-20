<?php
class Api extends MyDev{

	// Timeload on Page
	public function log($dbHandle,$type,$total){

		if($type != 'all'){
			$stmt = $dbHandle->prepare('SELECT * FROM lb_log WHERE lg_target = :type LIMIT :total');
			$stmt->bindParam(':type',$type);
		}
		else{
			$stmt = $dbHandle->prepare('SELECT * FROM lb_log LIMIT :total');
		}

		$stmt->bindParam(':total',$total,PDO::PARAM_INT);
		if(parent::checkLicense($dbHandle,'q12e30e4xls')){
			$stmt->execute();
		}
		while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
			extract($var);
			$array[] = array(
				"id" => $var['lg_id'],
				"ip" => $var['lg_ip'],
				"url" => $var['lg_url'],
				"time" => floatval($var['lg_time']),
				"timeLoad" => floatval($var['lg_time_load']),
				"sql" => floatval($var['lg_sql']),
			);
		}

		$data = array(
			"apiVersion" => "1.0",
			"data" => array(
				"update" => time(),
				"items" => $array
			),
		);

		echo json_encode($data);
	}

	public function liveOnline($dbHandle){
		$stmt = $dbHandle->prepare('SELECT lo_type,COUNT(lo_session) FROM bl_live_online GROUP BY lo_type');
		if(parent::checkLicense($dbHandle,'q12e30e4xls')){
			$stmt->execute();
		}
		while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
			extract($var);
			if($var['lo_type'] == 1){
				$device = 'Desktop';
			}
			else if($var['lo_type'] == 2){
				$device = 'Mobile';
			}
			$array[] = array(
				"page" => $device,
				"value" => floatval($var['COUNT(lo_session)'])
			);
		}

		$data = array(
			"apiVersion" => "1.0",
			"data" => array(
				"update" => time(),
				"items" => $array
			),
		);

		echo json_encode($data);
	}

	public function pageAccess($dbHandle){
		$stmt = $dbHandle->prepare('SELECT * FROM bl_analytic_page_view WHERE pv_id = 2 OR pv_id = 3 OR pv_id = 4 OR pv_id = 6 OR pv_id = 7 OR pv_id = 8 OR pv_id = 9 OR pv_id = 10');
		if(parent::checkLicense($dbHandle,'q12e30e4xls')){
			$stmt->execute();
		}
		while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
			extract($var);
			$array[] = array(
				"page" => $var['pv_title'],
				"value" => floatval($var['pv_value'])
			);
		}

		$data = array(
			"apiVersion" => "1.0",
			"data" => array(
				"update" => time(),
				"totalFeed" => floatval($total),
				"items" => $array
			),
		);

		echo json_encode($data);
	}

	public function actionEvent($dbHandle){
		// Video Event
		$stmt = $dbHandle->prepare('SELECT SUM(vi_c_view),SUM(vi_c_watch) FROM bl_video WHERE vi_status = 1');
		if(parent::checkLicense($dbHandle,'q12e30e4xls')){
			$stmt->execute();
		}
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		extract($var);
		$array[] = array(
			"type" => "Vdieo",
			"view" => floatval($var['SUM(vi_c_view)']),
			"watch" => floatval($var['SUM(vi_c_watch)'])
		);

		// Article Event
		$stmt = $dbHandle->prepare('SELECT SUM(ar_c_view),SUM(ar_c_read) FROM bl_article WHERE ar_status = 1');
		$stmt->execute();
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		extract($var);
		$array[] = array(
			"type" => "Article",
			"view" => floatval($var['SUM(ar_c_view)']),
			"watch" => floatval($var['SUM(ar_c_read)'])
		);

		// Photo Event
		$stmt = $dbHandle->prepare('SELECT SUM(im_c_view),SUM(im_c_watch) FROM bl_image WHERE im_status = 1');
		$stmt->execute();
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		extract($var);
		$array[] = array(
			"type" => "Photo",
			"view" => floatval($var['SUM(im_c_view)']),
			"watch" => floatval($var['SUM(im_c_watch)'])
		);

		$data = array(
			"apiVersion" => "1.0",
			"data" => array(
				"callType" => "Action Event",
				"totalFeed" => floatval($total),
				"items" => $array
			),
		);

		echo json_encode($data);
	}
}
?>