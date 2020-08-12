<?php
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	
	$Rating = new rating();
	// debugger($_POST);
	if($_POST){
		$data = array(
			'name' => sanitize($_POST['name']),
			'email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
			'rating' => (int)$_POST['star'], 
			'review' => htmlentities($_POST['review']),
			'product_id' => (int)$_POST['product_id'],
			'status' => 'Active'
		);

		//debugger($data,true);
	// if (isset($_POST['id']) && !empty($_POST['id'])) {
	// 	$act = 'Updat';
	// 	$rating_id = (int)$_POST['id'];
	// }else{
		$act = 'Add';
		$rating_id = false;
	// }

	// if ($rating_id) {
	// 	$rating_info = $Rating->getRatingbyId($rating_id);
	// 	// debugger($rating_info,true);	
	// 	if ($rating_info) {
	// 		if ($_SESSION['user_id'] == $rating_info[0]->added_by) {
	// 			$success = $Rating->updateRatingbyId($data,$rating_id);
	// 		}else{
	// 			redirect('../rating','error','You are not allowed to edit.');
	// 		}
	// 	}else{
	// 		redirect('../rating','error','Rating Not Found');
	// 	}
	// }else
	if($data){		//Add	
	$success = $Rating->addRating($data);
	}
	if ($success) {
		redirect('../product?id='.$data['product_id'],'success','Rating '.$act.'ed Succesfully');
	}else{
		redirect('../product?id='.$data['product_id'],'error','Problem While '.$act.'ing Rating');
	}
}else if ($_GET) {		//Delete
	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$rating_id = (int)$_GET['id'];
		if ($rating_id) {
			$act = substr(md5("Delete-Rating-".$rating_id.$_SESSION['token']), 3,15);
			if ($act) {
				if ($act == $_GET['act']){
					$rating_info = $Rating->getRatingbyId($rating_id);
					if ($rating_info) {
						$data =  array(
							'status'=>'Passive'
							);
						$success = $Rating->updateRatingbyId($data,$rating_id);
						if ($success) {
							redirect('../product?id='.$data['product_id'],'success','Rating Deleted Succesfully.');
						}else{
							redirect('../product?id='.$data['product_id'],'error','Error while Deleting.');
						}
					} else {
						redirect('../product?id='.$data['product_id'],'error','Rating Not Found.');
					}
				}else{
					redirect('../product?id='.$data['product_id'],'error',"Invalid Action");
				}
			}else{
				redirect('../product?id='.$data['product_id'],'error','action is required');
			}
		}else{
			redirect('../product?id='.$data['product_id'],'error','Id is Invalid');
		}
	}else{
		redirect('../product?id='.$data['product_id'],'error','Id is required.');
	}
}
else{
	redirect('../product?id='.$data['product_id'],'error','Error Occurs during submitting');
}
?>