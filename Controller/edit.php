<!DOCTYPE html>
<html>
<head>
	
<link href="../View/css/css.css" rel="stylesheet" type="text/css">
</head>
<body>
	
<?php 
include "../view/html/header.php";
include_once("../Model/db.php");
include_once("../Model/functions.php");

//include_once("../view/pages/topPages.php");
$userData = selectData('book', array('where'=>array('BookID'=>$_GET['BookID']),'return_type'=>'single'));

if (!empty($userData)) {
$coverImage = "../view/pics/".$userData['coverName'];

	?>
	<div class="container">
	 <div class="row">
      <form class="col s12" method="post"  enctype="multipart/form-data"  action="PDOUpdate.php?BookID=<?php echo $_GET['BookID'] ?>/&pictur_name=<?php echo $userData['coverName'];?>">
      
        <div class="row">
        <div class="col s10">
          <div class="card">
   
            
            <div class="card-action">
                 <img class="imageItself" src="<?php echo $coverImage; ?>"><br>
				<input id="file" type="file" class="validate" name="file" value="" />

                
                 
            </div>
          </div>
        </div>
      </div>
        
          
          
          
          
        <div class="input-field col s6">
          <input placeholder="Placeholder" id="BookTitle" type="text" class="validate" name="BookTitle" value="<?php echo $userData['BookTitle'];?>"/>
          <label for="BookTitle">BookTitle:</label>
        </div>
       
          
          
          
       
      <div>
        <div class="input-field col s6">
          <input id="Original book title:" type="text" name="OriginalTitle" value="<?php echo $userData["OriginalTitle"];?>"/>
          <label for="Original book title:">Original book title:</label>
        </div>
      </div>
      
      
    
     
     <div class="input-field col s6">
          <input id="YearOfPublication" type="text" name="YearofPublication" class="validate" value="<?php echo $userData['YearofPublication'];?>"/>
          <label for="YearOfPublication">YearOfPublication:</label>
        </div>
      
      <div class="input-field col s6">
          <input id="Genre" type="text" class="validate" name="Genre" value="<?php echo $userData['Genre'];?>"/>
          <label for="Genre">Genre:</label>
        </div>
      
       <div class="input-field col s6">
          <input id="MillionsSold" type="text" class="validate" name="MillionsSold" value="<?php echo $userData['MillionsSold'];?>"/>
          <label for="MillionsSold">MillionsSold:</label>
        </div>
  
      <div class="input-field col s6">
          <input id="LanguageWritten" type="text" class="validate" name="LanguageWritten" value="<?php echo $userData['LanguageWritten'];?>"/>
          <label for="LanguageWritten">LanguageWritten:</label>
        </div>
        
      <input type="hidden" name="BookID" value="<?php echo $userData['BookID'];?>"/>
        <input type="hidden" name="action_type" value="update"/>
     
        <input class="btn btn-outline-primary" type="submit" name="submit" value="Update" style="background-color: #00022A;">
        </div>
    </form>
  </div>
   </div>
	<?php
}else{echo "nope";}?>

</body>
    <?php include "../view/html/footer_users.php" ?>

    <!-- Compiled and minified CSS -->
    
</html>

   
