<?php 

	include 'includes.php'; 
	
	$error_msg = ""; 
	
	if(isset($_POST['name'], $_POST['password'], $_POST['checkpass'], $_POST['email'])){
	
		$ffusername = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING); 
		$ffpassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING); 
		$ffcheckpass = filter_input(INPUT_POST, 'checkpass', FILTER_SANITIZE_STRING); 
		$ffemail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING); 
		
		if($ffpassword != $ffcheckpass){
			header("location: register.php"); 
		}
		
		if(!filter_var($ffemail, FILTER_VALIDATE_EMAIL)){
			$error_msg .= '<p>The email address you entered is not valid</p>'; 
		}
		
		if(strlen($password) != 128){
			$error_msg .= '<p>Invalid Password</p>'; 
		}
		
		$prep_stmt = "SELECT id FROM users WHERE email = ? LIMIT 1";
		$stmt = $con->prepare($prep_stmt); 
		
		if($stmt){
			$stmt->bind_param('s', $ffemail); 
			$stmt->execute(); 
			$stmt->store_result(); 
			
			if($stmt->num_rows == 1){
				$error_msg .= '<p>A user already exists with this email</p>';
				$stmt->close(); 
			}
			$stmt->close(); 
		}else{
			$error_msg .= '<p>Database error, line 300</p>'; 
			$stmt->close(); 
		}
		
		$prep_stmt = "SELECT id FROM users WHERE name = ? LIMIT 1"; 
		$stmt = $con->prepare($prep_stmt); 
		
		if($stmt){
			$stmt->bind_param('s', $ffusername); 
			$stmt->execute(); 
			$stmt->store_result(); 
				if($stmt->num_results == 1){
					$error_msg .= '<p>A user with this name already exists</p>';
					$stmt->close(); 
				}
			$stmt->close(); 
		}else{
			$error_msg .= '<p>Database error, line 300</p>'; 
			$stmt->close();
		}
		
		if(empty($error_msg)){
			$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true)); 
			$password = hash('sha512', $ffpassword . $random_salt); 
			
			if($insert_stmt = $con->prepare("INSERT INTO users (name, email, password, salt VALUES (?, ?, ?, ?)")){
				$insert_stmt->bind_param('ssss', $ffusername, $ffemail, $password, $random_salt); 
					if(! $insert_stmt->execute()){
					echo "test"; 
				}else{
					echo "it worked, yay, lel"; 
				}
			}
			
		}
		
	}else{
		header("location: index.php"); 
	}
?>