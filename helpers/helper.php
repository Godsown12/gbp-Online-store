<?php
function sanitize($dirty){
  return htmlentities($dirty, ENT_QUOTES, "UTF-8"); 
}

function displayErrors($errors){
    $display = '';
    foreach($errors as $error){
        $display .= '<span class="error">'.$error.'&nbsp&nbsp</span>';
    }

    return $display;
}

function login($userId){
  $_SESSION['user'] = $userId;
  global $conn;
	date_default_timezone_set('Africa/Lagos');
	$date = date("Y-m-d H:i:s");
	$conn->query("UPDATE users SET last_login = '$date' WHERE users_id = '$userId'");
	$_SESSION['success_flash'] = 'Welcome you are now login';
	header("Location: index.php");
}

