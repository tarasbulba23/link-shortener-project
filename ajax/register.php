<?php 

	// Allow the config
	define('__CONFIG__', true);

	// Require the config
	require_once "../inc/config.php"; 

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		// Always return JSON format
		header('Content-Type: application/json');

		$return = [];

		$email = Filter::String( $_POST['email'] );
		$login = Filter::String( $_POST['login'] );

		$user_found = User::Find($email);
		$user_found_login = User::FindLogin($login);

		if($user_found || $user_found_login) {
			// User exists 
			// We can also check to see if they are able to log in. 
			$return['error'] = "You already have an account";
			$return['is_logged_in'] = false;
		} else {
			// User does not exist, add them now. 

			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

			$hash = md5($login . $email . $password . time() . mt_rand());
			
			$addUser = $con->prepare("INSERT INTO users(login, email, password, act_hash) VALUES(:login, LOWER(:email), :password, :hash)");
			$addUser->bindParam(':login', $login, PDO::PARAM_STR);
			$addUser->bindParam(':email', $email, PDO::PARAM_STR);
			$addUser->bindParam(':password', $password, PDO::PARAM_STR);
			$addUser->bindParam(':hash', $hash, PDO::PARAM_STR);
			$addUser->execute();

			$user_id = $con->lastInsertId();

            $subject = "Active Account";
            $body = "<p>To active account, visit the following address: <a href='".DIR."accept_register.php?key=$hash'>".DIR."accept_register.php?key=$hash</a></p>
			<p>Or enter this code <strong style='color: red;'>$hash</strong></p>";

            /*$mail = new Mail();
            $mail->setFrom(SITEEMAIL);
            $mail->addAddress($email);
            $mail->subject($subject);
            $mail->body($body);
            $mail->send();*/

			$return['redirect'] = '/accept_register.php';
			$return['is_logged_in'] = true;
		}

		echo json_encode($return, JSON_PRETTY_PRINT); exit;
	} else {
		// Die. Kill the script. Redirect the user. Do something regardless.
		exit('Invalid URL');
	}
?>
