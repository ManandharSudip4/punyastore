<?php
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';

	$User = new user();
	$user_info = $User->getUserbySessionToken($_SESSION['token']);
	$Contact = new contact();
	//$Categor = new contact();
	// debugger($_POST, true);
	 $act="Add";
	if($_POST){
		if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['message']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty(($_POST['message']))){
			$data = array(
			'username' => sanitize($_POST['username']),
			'email' => filter_var($_POST['email'],FILTER_VALIDATE_EMAIL),
			'message' => sanitize(htmlentities($_POST['message'])),
			'type' => 'message',
			'status' =>	'Active',
		);
		}else if(isset($_POST['email']) && empty($_POST['username']) && !empty($_POST['email']) && empty(($_POST['message']))){
			$data = array(
			'username' => sanitize($user_info[0]->username),
			'email' => filter_var($_POST['email'],FILTER_VALIDATE_EMAIL),
			'message' => $user_info[0]->username.' has subscribed you',
			'type' => 'subscription',
			'status' =>	'Active',
		);
		}
		if ($data) {
				$success = $Contact->addContact($data);
				// debugger($data, true);
		}else{
			redirect('../contact','error','Contact Not Found');
		}
	if ($success) {
		redirect('../contact','success','Contact '.$act.'ed Succesfully');
	}else{
		redirect('../contact','error','Problem While '.$act.'ing Contact');
	}
}

?>