<?php

$database_host = '';
$database_user = '';
$database_password = '';
$database_name = '';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (!($connection = mysqli_connect($database_host, $database_user, $database_password, $database_name))) {
	die(mysqli_connect_error());
}

// prevent SQL injection by using prepared statements
$query = mysqli_prepare($connection, "SELECT * FROM users WHERE username=?");
mysqli_stmt_bind_param($query, 's', $username);
mysqli_stmt_execute($query);

$result = mysqli_stmt_get_result($query);

if ($result->num_rows == 1) {
	$userEntry = mysqli_fetch_array($result);
	if ($userEntry['password'] == md5($password)) {
		session_start(); // Start session before using $_SESSION variable
		$_SESSION['user_id'] = $userEntry['id'];
		$response = ['status' => true];
	}
} else {
	$response = ['status' => false];
}

// close the database connection after executing the query
mysqli_close($connection);

die(json_encode($response));
