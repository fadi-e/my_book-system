<?php 
session_start();
include_once("../model/db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = !empty($_POST['username']) ? test_user_input(($_POST['username'])) : null;
	$password = !empty($_POST['password']) ? test_user_input(($_POST['password'])) : null;
		

	try {
			$stmt = $conn->prepare("SELECT password FROM users WHERE username = :user");
			$stmt->bindParam(':user', $username);
			$stmt->execute();
			$rows = $stmt ->fetch(PDO::FETCH_ASSOC)['password'];

				if (password_verify($password, $rows)) {

					$stmt = $conn->prepare("SELECT usersID, role FROM users WHERE username = :user");
					$stmt->bindParam(':user', $username);
					$stmt->execute();
								$user = $stmt->fetch(PDO::FETCH_ASSOC);	
					
									if ($user['role'] == '1') {
								
									$_SESSION['Login'] = $user['role'];
									header('location:sessions.php?role=' . $user['role']);
									header('location:../view/html/clientspage.php');

								}
									if ($user['role'] == '2') {
									
									//header('location:../view/html/displaybooks.php');
									$_SESSION['Login'] = $user['role'];
									header('location:sessions.php?role=' . $user['role']);
									header('location:../view/html/displaybooks.php');

								}
									
							}
					//header('location:../view/html/displaybooks.php');				
		else{
			header('location:../view/html/index.php');
		}
	} catch (Exception $e) {
		
	}
}
 ?>