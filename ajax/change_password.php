<?php 

	// Allow the config
	define('__CONFIG__', true);

	// Require the config
	require_once "../inc/config.php"; 

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		// Always return JSON format
		header('Content-Type: application/json');

		$return = [];

		$email = Filter::String( base64_decode($_POST['email']) );
		$id = Filter::Int( $_POST['id'] );

		$user_found = User::FindIdEmail($email, $id);

		if($user_found) {

			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			
			$addUser = $con->prepare("UPDATE users SET password = :password WHERE user_id = :id AND email = :email");
			$addUser->bindParam(':id', $id, PDO::PARAM_INT);
			$addUser->bindParam(':email', $email, PDO::PARAM_STR);
			$addUser->bindParam(':password', $password, PDO::PARAM_STR);
			$addUser->execute();

			if ($addUser->rowCount() > 0) {

                $return['redirect'] = '/dashboard.php';

                $_SESSION['user_id'] = $id;

                $return['is_logged_in'] = true;
            } else {
                $return['error'] = "Some Error";
                $return['is_logged_in'] = false;
			}
		} else {
            $return['error'] = "Some Error";
            $return['is_logged_in'] = false;
		}

		echo json_encode($return, JSON_PRETTY_PRINT); exit;
	} else {
		// Die. Kill the script. Redirect the user. Do something regardless.
		exit('Invalid URL');
	}
?>
