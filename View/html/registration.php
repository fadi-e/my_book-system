
  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
     <?php include('header.php'); ?>
        <nav>
            <div class="nav-wrapper">
              <a href="login.php" data-activates="mobile-demo" class="button-collapse"><i>Logon</i></a>
              <ul class="right hide-on-med-and-down">
                <li><a href="login.php">Log on</a></li>
              </ul>
              <ul class="side-nav" id="mobile-demo">
                <li><a href="login.php">Log on</a></li>



              </ul>
            </div>
          </nav>

      <!--Import jQuery before materialize.js-->
      <div class="row">
<form class="col s12" action="../../Controller/reg.php" method="post">
<div class="row">

  <div class="input-field col s6">
    <i class="material-icons prefix">account_circle</i>
    <input id="last_name prefix" type="text" name="username" pattern=".{3,}" placeholder="3 or more letters" class="validate" required>
    <label for="last_name prefix" class="active">Username</label>
  </div>
</div>
<div class="row">
  <div class="input-field col s12">
    <i class="material-icons prefix">lock</i>
    <input id="password prefix" type="password" name="password" pattern=".{6,}" placeholder="Six or more characters" class="validate" required>
    <label for="password prefix" class="active">Password</label>
  </div>
</div>
  <div class="row">
  <div class="input-field col s12" >
     <select name="role" id="c_street_type">
       <option value="2">User</option>
       <option value="1">Admin</option>
     </select>
     <label>Role</label>
   </div>
   <div class="row">
   <button class="btn waves-effect waves-light" function="myfunction()" id ="tos" type="submit" name="action">Sign up
     <input type="hidden" name="action_type" value="add"/>
   <i class="material-icons right" type="submit" name="button">send</i>
 </button>
   </div>
   </div>

</div>
</form>
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
    <?php include('footer.php'); ?>
  </html>
