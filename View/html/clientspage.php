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
          <?php include('header.php'); ?>
       		 <nav class="nav-extended" style="background-color: #00022A;">
          
          <div class="nav-content">
            <ul class="tabs tabs-transparent">
              <li class="tab"><a href="#test2">Books</a></li>
          
            </ul>
          </div>
        </nav>

  <div id="test2" class="col s12">
              <?php 
           
            
            include'../../Model/db.php';
        include'../../Model/functions.php';
              $sql = "SELECT * FROM author, book WHERE book.AuthorID = author.AuthorID ORDER BY 'AuthorID'";
              $res = $conn->prepare($sql);
              $res->execute();
              while ($result = $res->fetch(PDO::FETCH_ASSOC)):{  

?>
    <div class="cols" style="width: 300px;">
    <div class="card-action">
          <h4><?php echo $result['BookTitle']; ?></h4></br>
        </div>
    <div class="card " style="border-color: #00022A;">

      <div class="card-image">
        <img src="<?php echo $result['BookCoverURL']; ?>">
      </div>

      <div class="card-stacked">
        <div class="card-content">
          <p>Surname : <?php echo $result['Surname']; ?></p></br>
          <p>Name : <?php echo $result['Name']; ?></p></br>     
          <p>Nationality : <?php echo $result['Nationality']; ?></p></br>
          <p>Birth Year : <?php echo $result['BirthYear']; ?></p></br>
          <p>Death Year : <?php echo $result['DeathYear']; ?></p></br>
        </div>
      
      </div>
    </div>
  </div>
  
 <?php }
                    endwhile;  ?></div>

   
    <script>

    $(document).ready(function() {
$('select').material_select();
});

    </script>
    </body>
    <?php include('footer_users.php'); ?>
  </html>