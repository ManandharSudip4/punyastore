<?php
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';

	$schema = new schema();

		$table = array(
			'users'=>"
				CREATE TABLE IF NOT EXISTS users
					(
						id int not null AUTO_INCREMENT PRIMARY KEY,
						username varchar(50),
						email varchar(150) UNIQUE KEY,
						password varchar(200),
						session_token text,
						activate_token text,
						password_reset_token text,
						role enum('Admin','Staff') default 'Staff',
						status enum('Active','Passive') default 'Passive',
						added_by int,
						created_date datetime default current_timestamp,
						updated_date datetime on update current_timestamp
					)
			",
			'superadmin'=>"
				INSERT into users SET
					username = 'Admin',
					email = 'admin@admin.com',
					password = '".sha1('admin@admin.comadmin123')."',
					role = 'Admin',
					status = 'Active'
			",
			'category'=>"
				CREATE TABLE IF NOT EXISTS categories
					(
						id int not null AUTO_INCREMENT PRIMARY KEY,
						categoryname varchar(40),
						description text,
						image varchar(50),
						status enum('Active','Passive') default 'Passive',
						added_by int,
						created_date datetime default current_timestamp,
						updated_date datetime on update current_timestamp
					)
			",
			'product'=>"
				CREATE TABLE IF NOT EXISTS products
					(
						id int not null AUTO_INCREMENT PRIMARY KEY,
						productname varchar(40),
						description text,
						madeof varchar(100),
						acprice int,
						cprice int,
						featured enum('Featured','notFeatured') default 'notFeatured',
						size varchar(20),
						weight varchar(20),
						categoryid int,
						view int,
						image varchar(50),
						status enum('Active','Passive') default 'Passive',
						added_by int,
						created_date datetime default current_timestamp,
						updated_date datetime on update current_timestamp
					)
			",
			'rating'=>"
				CREATE TABLE IF NOT EXISTS ratings
					(
						id int not null AUTO_INCREMENT PRIMARY KEY,
						name varchar(50),
						email varchar(150),
						rating int,
						review text,
						product_id int,
						status enum('Active','Passive') default 'Active',
						created_date datetime default current_timestamp,
						updated_date datetime on update current_timestamp
					)
			",
			'query'=>"
				CREATE TABLE IF NOT EXISTS querys
					(
						id int not null AUTO_INCREMENT PRIMARY KEY,
						name varchar(50),
						message text,
						queryType enum('question','reply') default 'question',
						questionid int,
						productid int,
						state enum('waiting','accept','reject') default 'accept',
						status enum('Active','Passive') default 'Active',
						added_by int,
						created_date datetime default current_timestamp,
						updated_date datetime on update current_timestamp
					)
			",
			'fav'=>"
				CREATE TABLE IF NOT EXISTS favs
					(
						id int not null AUTO_INCREMENT PRIMARY KEY,
						username varchar(50),
						email varchar(150),
						user_id int,
						product_id int,
						status enum('Active','Passive') default 'Active',
						created_date datetime default current_timestamp,
						updated_date datetime on update current_timestamp
					)
			",
			'incart'=>"
				CREATE TABLE IF NOT EXISTS incarts
					(
						id int not null AUTO_INCREMENT PRIMARY KEY,
						username varchar(50),
						email varchar(150),
						user_id int,
						quantity int,
						product_id int,
						status enum('Active','Passive') default 'Active',
						created_date datetime default current_timestamp,
						updated_date datetime on update current_timestamp
					)
			",
			'sale'=>"
				CREATE TABLE IF NOT EXISTS sales
					(
						id int not null AUTO_INCREMENT PRIMARY KEY,
						categoryid int,
						description text,
						productname varchar(70),
						productid int,
						discount int,
						image varchar(50),
						status enum('Active','Passive') default 'Passive',
						added_by int,
						created_date datetime default current_timestamp,
						updated_date datetime on update current_timestamp
					)
			",
			'blog'=>"
				CREATE TABLE IF NOT EXISTS blogs
					(
						id int not null AUTO_INCREMENT PRIMARY KEY,
						title varchar(250),
						content text,
						quote text,
						bloggername varchar(50),
						featured enum('Featured','notFeatured') default 'notFeatured',
						blogcategoryid int,
						view int,
						image varchar(50),
						status enum('Active','Passive') default 'Passive',
						added_by int,
						created_date datetime default current_timestamp,
						updated_date datetime on update current_timestamp
					)
			",
			'blogcategory'=>"
				CREATE TABLE IF NOT EXISTS blogcategories
					(
						id int not null AUTO_INCREMENT PRIMARY KEY,
						categoryname varchar(40),
						description text,
						image varchar(50),
						status enum('Active','Passive') default 'Passive',
						added_by int,
						created_date datetime default current_timestamp,
						updated_date datetime on update current_timestamp
					)
			",
			'contactinfo'=>"
				CREATE TABLE IF NOT EXISTS contactinfos
					(
						id int not null AUTO_INCREMENT PRIMARY KEY,
						maplink text,
						description text,
						address varchar(150),
						phone_number bigint,
						email varchar(150),
						status enum('Active','Passive') default 'Active',
						added_by int,
						created_date datetime default current_timestamp,
						updated_date datetime on update current_timestamp
					)
			",
			'contact'=>"
				CREATE TABLE IF NOT EXISTS contacts
					(
						id int not null AUTO_INCREMENT PRIMARY KEY,
						username varchar(50),
						email varchar(150),
						message text,
						type enum('message','subscription') default 'subscription',
						status enum('Active','Passive') default 'Active',
						created_date datetime default current_timestamp,
						updated_date datetime on update current_timestamp
					)
			"
		);

	foreach ($table as $key => $sql) {
		try{
			$success = $schema->create($sql);
				if ($success){
					echo "Query ".$key." Executed Successfully<br>";
				}else{
					echo "Problem While Executing Query :".$key."<br>";
				}
		}catch(PDOException $e){
			error_log(Date("M d, Y h:i:s a").' : (run Query) : '.$e->getMessage(),3,ERROR_PATH.'error.log');
			return false;
		}
	}	


?>

