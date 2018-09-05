<?php 

include_once("../Model/db.php");

include_once("../Model/functions.php");

if ($_REQUEST['action_type']){

try {

	$BookTitle =!empty($_POST['BookTitle'])? test_user_input(($_POST['BookTitle'])):null;
 	$OriginalTitle =!empty($_POST['OriginalTitle'])? $_POST['OriginalTitle']:null;
    $YearofPublication =!empty($_POST['YearofPublication'])? test_user_input(($_POST['YearofPublication'])):0;
    $Genre =!empty($_POST['Genre'])? test_user_input(($_POST['Genre'])):null;
    $MillionsSold =!empty($_POST['MillionsSold'])? test_user_input(($_POST['MillionsSold'])):null;
    $LanguageWritten =!empty($_POST['LanguageWritten'])? test_user_input(($_POST['LanguageWritten'])):null;
    
	
	if(isset($_POST['submit'])){ 
		if(!empty($_FILES['file'])){ 
			$fileTmp = $_FILES['file']['tmp_name'];
			$fileName = date('YmdHis').$_FILES['file']['name'];
			$fileType = $_FILES['file']['type'];
			$filePath = "../View/pics/";
			$upload_folder = "../view/pics/".$fileName;
			move_uploaded_file($fileTmp, $upload_folder);
		}
	
	}
	
    //$cover =!empty($_POST['cover'])? $_POST['cover']:null;
    //$BookCoverURL =!empty($_POST['BookCoverURL'])? $_POST['BookCoverURL']:null;
    //$BookCoverURL =!empty($_POST['BookCoverURL'])? $_POST['BookCoverURL']:null;
    
	

	if (!empty($_GET['BookID'])) {
		$data = array(
             'BookTitle' => $BookTitle,
             'OriginalTitle' => $OriginalTitle,
             //'AuthorID' => 'deafult',
             'YearofPublication' => $YearofPublication,
             'Genre' => $Genre,
             'MillionsSold' => $MillionsSold,
             'LanguageWritten' => $LanguageWritten,
             'coverName' => $fileName,
             'coverPath' => $filePath,
             'coverType' => $fileType,
             //'BookCoverURL' => $BookCoverURL
             //'BookCoverURL' => $BookCoverURL

            );
			
		$table = "book";
        $conditions = array('BookID' => $_GET['BookID']);
        updateData($table, $data, $conditions);
        if($coverName=$_REQUEST['pictur_name']){
			unlink("../view/pics/".$coverName);
			}
		if(!empty($_FILES['file'])){
			$data2 = array(
             'coverName' => $fileName,
             'coverPath' => $filePath,
             'coverType' => $fileType,
            );
		 updateData($table, $data2, $conditions);
		}
       

	}
             header('location:../View/html/displaybooks.php');
}
            catch(PDOException $e)
            {
                echo "Error: ...".$e -> getMessage();
                die();
            }
}



 ?>