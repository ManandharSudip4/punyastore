<?php
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	
	$Query = new query();
	//$Categor = new query();
	// debugger($_POST, true);
	 $act="Add";
	if($_POST){
		$data = array(
			'name' => sanitize($_POST['name']),
			'message' => sanitize(htmlentities($_POST['query'])),
			'status' =>	'Active',
			'productid' => (int)$_POST['productid'],
			'state' => 'accept'
			// 'updated_date' => 
		);
	if (isset($_POST['queryid']) && !empty($_POST['queryid'])) {
		//reply
		$question_id = (int)$_POST['queryid'];
		$data['questionid'] = $_POST['queryid'];
		$data['queryType'] = 'reply';
		// debugger($_POST, true);
	}else{
		//query
		$question_id = false;
		$data['queryType'] = 'question';
	}
	// debugger($question_id, true);	
	if ($question_id) {
		$query_info = $Query->getQuerybyId($question_id);
		if ($query_info) {
				$success = $Query->addQuery($data);
				// debugger($data, true);
		}else{
			redirect('../product?id='.$data['productid'],'error','Query Not Found');
		}
	}else{		//Add	
	$success = $Query->addQuery($data);
	// debugger($data, true);
	}
	if ($success) {
		redirect('../product?id='.$data['productid'],'success','Query '.$act.'ed Succesfully');
	}else{
		redirect('../product?id='.$data['productid'],'error','Problem While '.$act.'ing Query');
	}
}

?>