<?php 
include_once("../Model/db.php");
//include_once("../Model/functions.php");
if ($_SERVER["REQUEST_METHOD"]) 
				{
		      		include_once("PDOArray.php");
if ($_POST['action_type']){

	try
{
			$conn->beginTransaction();
			$sql ="INSERT INTO author (`AuthorID`, `Name`, `Surname`, `Nationality`, `BirthYear`, `DeathYear`) VALUES (DEFAULT,?,?,?,?,?);";		
													$res = $conn->prepare($sql);		
													$res->execute(array($Name,$Surname,$Nationality,$BirthYear,$DeathYear));
													$AuthorID = $conn-> lastInsertId(); 
			if(isset($_POST['acttion'])){
				
				$fileTmp = $_FILES['file']['tmp_name'];
				$fileName = date('YmdHis').$_FILES['file']['name'];
				$fileType = $_FILES['file']['type'];
				$filePath = "../pics/";
					
				//$filePath = "pics/".$fileName;
				$upload_folder = "../view/pics/".$fileName;
				move_uploaded_file($fileTmp, $upload_folder);
				//unlink(getcwd().'../view/pics/'.$fileName);
					

				/* $sql2 ="INSERT INTO book (BookID,BookTitle,OriginalTitle,YearofPublication,Genre,MillionsSold,LanguageWritten,AuthorID, coverName, coverType, coverPath) VALUES (DEFAULT,?,?,?,?,?,?,'$AuthorID','$fileName','$fileType','$filePath');";		
														$res = $conn->prepare($sql2);
														$res->execute(array($BookTitle,$OriginalTitle,$YearofPublication,$Genre,$MillionsSold,$LanguageWritten,$fileName,$fileType,$filePath));
															
														$res->bindparam(':foregin_key',$AuthorID);	 */
															$conn->commit();

				$connection = mysqli_connect("localhost","root","","mybook");


				$BookTitle  =  $_POST['BookTitle'];
				$OriginalTitle  =  $_POST['OriginalTitle'];
				$YearofPublication  =  $_POST['YearofPublication'];
				$Genre  =  $_POST['Genre'];
				$MillionsSold  =  $_POST['MillionsSold'];
				$LanguageWritten  =  $_POST['LanguageWritten'];
				mysqli_query($connection, "INSERT INTO `book` (BookTitle,OriginalTitle,YearofPublication,Genre,MillionsSold,LanguageWritten,AuthorID, coverName, coverType, coverPath) VALUES('$BookTitle','$OriginalTitle','$YearofPublication','$Genre','$MillionsSold','$LanguageWritten','$AuthorID','$fileName','$fileType','$filePath');");
				
			}
			header("location:../view/html/displaybooks.php");
		}							
			catch	(PDOException $e){
				$conn->rollback();
				echo $e;
				die();
			}
		}
	}
?>