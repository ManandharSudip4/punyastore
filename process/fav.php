<?php
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	$User = new user();
    $user_info = $User->getUserbySessionToken($_SESSION['token']);

	$Fav = new fav();
	// debugger($user_info);
	// debugger($_POST,true);
	if($_POST){
		$data = array(
			'username' => sanitize($user_info[0]->username),
			'email' => $user_info[0]->email,
			'user_id' => (int)$user_info[0]->id,
			'product_id' => (int)$_POST['product_id'],
			'status' => 'Active'
		);
		$act = 'Add';
		$fav_id = false;
	if($data){		//Add	
	$success = $Fav->addFav($data);
	}
	if ($success) {
		redirect('../product?id='.$data['product_id'],'success','Fav '.$act.'ed Succesfully');
	}else{
		redirect('../product?id='.$data['product_id'],'error','Problem While '.$act.'ing Fav');
	}
}else if ($_GET) {		//Delete
	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$fav_id = (int)$_GET['id'];
		if ($fav_id) {
			$act = substr(md5("Delete-Fav-".$fav_id.$_SESSION['token']), 3,15);
			if ($act) {
				if ($act == $_GET['act']){
					$fav_info = $Fav->getFavbyId($fav_id);
					if ($fav_info) {
						$data =  array(
							'status'=>'Passive'
							);
						$success = $Fav->updateFavbyId($data,$fav_id);
						if ($success) {
							redirect('../product?id='.$data['product_id'],'success','Fav Deleted Succesfully.');
						}else{
							redirect('../product?id='.$data['product_id'],'error','Error while Deleting.');
						}
					} else {
						redirect('../product?id='.$data['product_id'],'error','Fav Not Found.');
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