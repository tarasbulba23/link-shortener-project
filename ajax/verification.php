<?php 

	// Allow the config
	define('__CONFIG__', true);

	// Require the config
	require_once "../inc/config.php"; 

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		// Always return JSON format
		header('Content-Type: application/json');

		$return = [];

		$code = Filter::String( $_POST['code'] );

		$user_found = User::FindCode($code, true);

		if($user_found) {
			
			$addUser = $con->prepare("UPDATE users SET act_hash = null WHERE user_id = :id");
			$addUser->bindParam(':id', $user_found['user_id'], PDO::PARAM_INT);
			$addUser->execute();

            $_SESSION['user_id'] = (int) $user_found['user_id'];

			$return['redirect'] = '/dashboard.php';
			$return['is_logged_in'] = true;
		} else {
            $return['error'] = "Wrong code";
            $return['is_logged_in'] = false;
		}

		echo json_encode($return, JSON_PRETTY_PRINT); exit;
	} else {
		// Die. Kill the script. Redirect the user. Do something regardless.
		exit('Invalid URL');
	}
?>
