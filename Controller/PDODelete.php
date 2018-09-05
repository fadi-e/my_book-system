<?php 

include_once("../Model/db.php");

include_once("../Model/functions.php");

/* if (array_key_exists('delete_file', $_POST)) {
			  $coverName = $_POST['delete_file'];

			  if (file_exists($coverName)) {
				unlink($coverName);
				echo "../view/pics/".$coverName;
				exit;
				//echo 'File '.$coverName.' has been deleted';
			  } else {
				echo 'Could not delete '.$coverName.', file does not exist';
			  }
			} */
if ($_REQUEST['action_type'] =='delete'){
	if (!empty($_GET['BookID'])) {
		$table="book";
		$conditions =  array('BookID' => $_GET['BookID'] );
		try {
			if($coverName=$_REQUEST['pictur_name']){
			unlink("../view/pics/".$coverName);
			}

			//function call
			deleteData($table,$conditions);
			
			header('location:../view/html/displaybooks.php');
			
		} catch (Exception $e) {
			echo "Error: ".$e -> getMessage();
			die();
		}
		
	} 
	
}

 ?>