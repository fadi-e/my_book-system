<?php 
session_start();

if(!isset($_SESSION['Login'])){
  logout();
 session_destroy();
  
}

function logout(){
  header('location:login.php');
  }
?>
 <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link rel="stylesheet" href="../CSS/style.css">
       

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
      <?php include('header.php'); ?>
        <nav class="nav-extended" style="background-color: #00022A;">
          
          <div class="nav-content">
            <ul class="tabs tabs-transparent">
              <li class="tab"><a lass="active" href="#test1" style="text-decoration: none;">Books</a></li>
              <li class="tab"><a href="#test2" style="text-decoration: none;">Authors</a></li>
              <li class="tab"><a href="#test3" style="text-decoration: none;">New Book</a></li>
            </ul>
          </div>
        </nav>
        <div id="test1" class="col s12">
<?php 
        include'../../Model/db.php';
        include'../../Model/functions.php';

  $table = selectData('book',array('order_by' => 'BookID' ) );
      if ( !empty($table)) {
           $count = 0;
            foreach ($table as $user) {
             $count++;
			$coverImage = "../pics/".$user['coverName'];
?>
<div class="imageContainer" style="border-color: #00022A; ">
        <div class="imageHolder" style="border-color: #00022A;">
          
       
          <img class="imageItself" src="<?php echo $coverImage; ?>">

        </div>
        <div class="imagebuttons" style="text-align: center;">
            <div class="title"><?php echo $user['BookTitle']; ?>
            </div>
            <div class="buttons">
            <a class="btn btn-outline-primary" href='../../Controller/edit.php?BookID=<?php echo $user['BookID'];?>' style="background-color: #00022A;">Edit</a>
			<form  action="pdoDelete.php" method="post">
            <input type="hidden" value="<?php echo $user['BookTitle']; ?>" name="delete_file" />
            <a type="submit" class="btn btn-outline-primary black" href='../../Controller/pdoDelete.php?action_type=delete&BookID=<?php echo $user['BookID'];?>/&pictur_name=<?php echo $user['coverName'];?>' onclick="return confirm('Are you sure?')">Delete</a>
			</form> 
            </div>
        </div>  
</div>
<?php
  }
}

 ?>
  </div>
  <div id="test2" class="col s12">
              <?php 
            
                GLOBAL $conn;
              $sql = "SELECT * FROM author, book WHERE book.AuthorID = author.AuthorID ORDER BY 'AuthorID'";
              $res = $conn->prepare($sql);
              $res->execute();
              while ($result = $res->fetch(PDO::FETCH_ASSOC)):{  

?>
   
   
   
   
   <div class="cols" style="height: auto;">
    <div class="card-action" >
          <h5><?php echo $result['BookTitle']; ?></h5></br>
        </div>
    <div class="card"  style="border-color: #00022A;">

      <div class="card-image">
        <img src="../pics/<?php echo $result['coverName']; ?>">
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <p>Name : <?php echo $result['Name']; ?></p></br>
          <p>Surname : <?php echo $result['Surname']; ?></p></br>
          <p>Nationality : <?php echo $result['Nationality']; ?></p></br>
          <p>BirthYear : <?php echo $result['BirthYear']; ?></p></br>
          <p>DeathYear : <?php echo $result['DeathYear']; ?></p></br>
        </div>
      
      </div>
    </div>
  </div>
  
 <?php }
                    endwhile;  ?></div>

  <div id="test3" class="col s12">
          <div class="container">
   <div class="row">
              <form class="col s12" method="post" enctype="multipart/form-data" action="../../controller/PDONewBook.php">
                 <div class="row">
                          <div class="input-field col s10">
          <input id="BookTitle" type="text" class="validate" name="BookTitle" value=""/>
          <label for="BookTitle">Book Title:</label>
                          </div>
                 </div>
                 
                 
                 <!--
                 <div class="row">
        <div class="input-field col s10">
          <input id="BookCoverURL:" type="text" name="BookCoverURL" value=""/>
          <label for="Original book title:">Book Cover URL:</label>
                </div>
                </div>
                
                -->
                <div class="row">
        <div class="input-field col s10">
          <input id="Original book title:" type="text" name="OriginalTitle" value=""/>
          <label for="Original book title:">Original Book Title:</label>
        </div>
                </div> 
                <div class="row">
       <div class="input-field col s10">
          <input id="YearOfPublication" type="number" name="YearofPublication" class="validate" value=""/>
          <label for="YearOfPublication">Year Of Publication:</label>
        </div>
                </div> 
                <div class="row">      
      <div class="input-field col s10">
          <input id="Genre" type="text" class="validate" name="Genre" value=""/>
          <label for="Genre">Genre:</label>
        </div>
                </div>
                <div class="row">   
       <div class="input-field col s10">
          <input id="MillionsSold" type="number" class="validate" name="MillionsSold" value="" />
          <label for="MillionsSold">MillionsSold:</label>
       </div> 
               </div>
               <div class="row">  
      <div class="input-field col s10">
          <input id="LanguageWritten" type="text" class="validate" name="LanguageWritten" value="" />
          <label for="LanguageWritten">Language Written:</label>
      </div>
              </div>
              <div class="row">
        <div class="input-field col s10">
          <input id="Surname" type="text" class="validate" name="Surname" value="" />
          <label for="Surname">Author Surname:</label>
        </div>
              </div>
              <div class="row">
        <div class="input-field col s10">
          <input id="Nationality" type="text" class="validate" name="Nationality" value="" />
          <label for="Nationality">Author Nationality:</label>
        </div>
              </div>
              <div class="row">
        <div class="input-field col s10">
          <input id="BirthYear" type="number" class="validate" name="BirthYear" value="" />
          <label for="BirthYear">Author BirthYear:</label>
        </div>
              </div>
              <div class="row">
        <div class="input-field col s10">
          <input id="DeathYear" type="number" class="validate" name="DeathYear" value="" />
          <label for="DeathYear">Author DeathYear:</label>
        </div>
              </div>
              
              
              
               <div class="row">
        <div class="input-field col s10">
          <input id="file" type="file" class="validate" name="file" value="" />
          
        </div>
              </div>
              
              
              
              
              
      </div>
      <div class="row">
   <button class="btn waves-effect waves-light" type="submit" name="acttion" value="yes" style="background-color: #00022A;">Add
     <input type="hidden" name="action_type" value="add"/>
   
 </button>
   </div>
        
    </form>
  </div>
  </div>
  </div>

 <script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous">
</script>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script>

    $(document).ready(function() {
$('select').material_select();
});

    </script>
    </body>
    <?php include('footer_users.php'); ?>
  </html>