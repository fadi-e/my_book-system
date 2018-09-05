<?php

include "../../model/db.php";
    
//echo $_POST['email'];
//echo $_POST['password'];
//echo $_POST['student'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$username = !empty($_POST['username'])? test_user_input(($_POST['username'])): null;
	$password = !empty($_POST['password'])? test_user_input(($_POST['password'])): null;

	
	$hashpassword = password_hash($password, PASSWORD_DEFAULT);

	$insert_sql_login = "INSERT INTO users (username, password, role) VALUES ( '" . $_POST['username'] . "', '" . $hashpassword . "', '" . $_POST['role'] . "');";
    
    $stmt = $conn->prepare($insert_sql_login);
    $stmt->execute();
    
	//header('location: teacher_area.php');
	
}
?>