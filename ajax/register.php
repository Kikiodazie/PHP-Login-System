<?php 

	// Allow the config
	define('__CONFIG__', true);

	// Require the config
	require_once "/wamp64/www/php_login_course/inc/config.php"; 

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		// Always return JSON format
		// header('Content-Type: application/json');

		$return = [];

		$email = Filter::String( $_POST['email'] );

		$userFound = User::find($email, true);

		if($userFound) {
			// User exists 
			// We can also check to see if they are able to log in. 
			$return['error'] = "You already have an account";
			$return['is_logged_in'] = false;
		} else {
			// User does not exist, add them now. 

			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			
			$addUser = $con->prepare("INSERT INTO users(email, password) VALUES(LOWER(:email), :password)");
			$addUser->bindParam(':email', $email, PDO::PARAM_STR);
			$addUser->bindParam(':password', $password, PDO::PARAM_STR);
			$addUser->execute();

			$user_id = $con->lastInsertId();

			$_SESSION['user_id'] = (int) $user_id;

			$return['redirect'] = '/php_login_course/dashboard.php';
			$return['is_logged_in'] = true;
		}

		echo json_encode($return, JSON_PRETTY_PRINT); exit;
	} else {
		// Die. Kill the script. Redirect the user. Do something regardless.
		exit('Invalid URL');
	}
?>
