<?php
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	$User = new user();
    $user_info = $User->getUserbySessionToken($_SESSION['token']);


	$InCart = new incart();
	// debugger($user_info);
	// debugger($_POST,true);
	if($_POST){
		if (isset($_POST['quantity']) && !empty($_POST['quantity'])){
				$data = array(
							'username' => sanitize($user_info[0]->username),
							'email' => $user_info[0]->email,
							'user_id' => (int)$user_info[0]->id,
							'quantity' => (int)$_POST['quantity'], 
							'product_id' => (int)$_POST['product_id'],
							'status' => 'Active'
				);
				$act = 'Add';
				$incart_id = false;
			if($data){
				$incart_info = $InCart->getInCartbyId((int)$_POST['product_id']);
				if (isset($incart_info) && !empty($incart_info)) {// Update
					$success = $InCart->updateInCartbyId($data,(int)$_POST['product_id']);
				}else if(isset($_POST['quantity']) && !empty($_POST['quantity'])){// Add
					$success = $InCart->addInCart($data);
				}
			}
			if ($success) {
				redirect('../product?id='.$data['product_id'],'success','InCart '.$act.'ed Succesfully');
			}else{
				redirect('../product?id='.$data['product_id'],'error','Problem While '.$act.'ing InCart');
			}
		}else if (isset($_POST['deleteid']) && !empty($_POST['deleteid'])){
			$incart_id = (int)$_POST['id'];
			$act = substr(md5("Delete-InCart-".$incart_id.$_SESSION['token']), 3,15);
			if($act == $_POST['deleteid']){
				$incart_info = $InCart->getInCartbyId($incart_id);
				$data = array(
							'username' => sanitize($user_info[0]->username),
							'email' => $user_info[0]->email,
							'user_id' => (int)$user_info[0]->id,
							'quantity' => (int)$_POST['quantity'], 
							'product_id' => (int)$_POST['id'],
							'status' => 'Passive'
				);
				$act = 'Add';
				// $incart_id = false;

			if($data){		//Add	
			$success = $InCart->updateInCartbyId($data,$incart_id);
			}
			if ($success) {
				redirect('../product?id='.$data['product_id'],'success','InCart '.$act.'ed Succesfully');
			}else{
				redirect('../product?id='.$data['product_id'],'error','Problem While '.$act.'ing InCart');
			}
		} 
			}
			
	}else if ($_GET) {		//Delete
		if (isset($_GET['id']) && !empty($_GET['id'])) {
			$incart_id = (int)$_GET['id'];
			if ($incart_id) {
				$act = substr(md5("Delete-InCart-".$incart_id.$_SESSION['token']), 3,15);
				if ($act) {
					if ($act == $_GET['deleteid']){
						$incart_info = $InCart->getInCartbyId($incart_id);
						if ($incart_info) {
							$data =  array(
								'status'=>'Passive'
								);
							$success = $InCart->updateInCartbyId($data,$incart_id);
							if ($success) {
								redirect('../product?id='.$data['product_id'],'success','InCart Deleted Succesfully.');
							}else{
								redirect('../product?id='.$data['product_id'],'error','Error while Deleting.');
							}
						} else {
							redirect('../product?id='.$data['product_id'],'error','InCart Not Found.');
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