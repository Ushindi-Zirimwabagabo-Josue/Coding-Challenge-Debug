<?php

$database_host = '';
$database_user = '';
$database_password = '';
$database_name = '';

$question_id = $_POST['id'] ?? 0;

if (!($connection = mysqli_connect($database_host, $database_user, $database_password, $database_name))) {
	die(mysqli_connect_error());
}

// Use prepared statement to prevent SQL injection
$query = mysqli_prepare($connection, "DELETE FROM questions WHERE id=? LIMIT 1");
mysqli_stmt_bind_param($query, 'i', $question_id);
mysqli_stmt_execute($query);

if (mysqli_affected_rows($connection) > 0) {
	$result = ['status' => true];
} else {
	$result = ['status' => false];
}

// close the database connection after executing the query
mysqli_close($connection);

die(json_encode($result));
