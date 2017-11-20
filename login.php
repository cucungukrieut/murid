
<?php require_once("includes/initialize.php");


 
if(isset($_POST['log'])) {
  $name = $_POST['un'];
  $pass = $_POST['up'];
  $sql = mysql_query("SELECT * FROM useraccounts WHERE username='$name' and userpass='$pass'");
  $rs = mysql_fetch_array($sql);
  
  $confirm = mysql_num_rows($sql);
 
  if($confirm == 1) {
      
    $_SESSION['userID'] = $rs['userID'];
    $_SESSION['userLName'] = $rs['userLName'];
    $_SESSION['userFName'] = $rs['userFName'];
    $_SESSION['userMName'] = $rs['userMName'];
    $_SESSION['username'] = $rs['username'];
    $_SESSION['userpass'] = $rs['userpass'];
    $_SESSION['usertype'] = $rs['usertype'];
 
    header("location: index.php");//directing to main form index.php
    echo '<meta http-equiv="Refresh" content="0">';
  }
  else  {
    ?>
      <script type="text/javascript">
                alert("Invalid Username or Password!");
                </script>
        <?php
  }
}
?>



<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>MONITORING OF STUDENTS CYBER ACCOUNT BALANCES</title>

    
        <link rel="stylesheet" href="css/style.css">

    
  </head>

  <body>
    
<link rel="stylesheet" href="css/styles.css" />    
    


  <center><h2 style="background:#366b82;color:#fff;padding:5px; border-radius:10px 10px 10px 10px;">MONITORING OF STUDENTS CYBER ACCOUNT BALANCES</h2></center>

    <div class="container">

  <div id="login-form">

    <h3>User Login</h3>

    <fieldset>

      <form action="" method="post">

        <input type="text" autofocus name="un" placeholder="Username" required> 

        <input type="password" name="up" placeholder="Password" required>  

        <input type="submit" name="log" value="Login">

       
      </form>

    </fieldset>

  </div> <!-- end login-form -->

</div>
    
    
    
    
    
  </body>
</html>



 