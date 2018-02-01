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

		$user_found = User::Find($email, true);

		if($user_found) {

            $return['redirect'] = '/change_password.php?id=' . $user_found['user_id'] . '&code=' . base64_encode($email);
            $return['is_logged_in'] = true;

		} else {
			// They need to create a new account
            $return['error'] = "Invalid user email";
		}

		echo json_encode($return, JSON_PRETTY_PRINT); exit;
	} else {
		// Die. Kill the script. Redirect the user. Do something regardless.
		exit('Invalid URL');
	}
?>
