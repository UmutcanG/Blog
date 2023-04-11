<?php
require('includes/db.php');
include('includes/function.php');


  $id=$_GET['updateid']; 
if(isset($_POST['update']))
{
  $email = $_POST['email'];
  $password= $_POST['password'];
   

  $query = "UPDATE `users` SET `email`='$email',`password`='$password' where id=$id " ;
  $runquery = mysqli_query($db,$query);

  if ($runquery) 
  {
    echo "<script>alert('Güncelleme başarılı');</script>"; 
    
  }
  else{
    echo "<script>alert('güncelleme başarısız');</script>";
  }



}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>H0pe</title>
</head>
<body>
      <?php include_once('includes/navbar.php'); ?>
<br>
<hr>
<form method="POST">
<div class="col-5"  style="margin-right:2;" >
<div class="card mb-4">
            <h5 class="card-header">Profil Güncelleme</h5>
            <div class="card-body">
              <h5 class="card-title"></h5>
              <p class="card-text"><?=$users['full_name']?></p><hr>
              <p class="card-text">Email</p>
              <input type="email" name="email" placeholder="email"><br><hr>
              <p class="card-text">Şifre</p>
              <input type="password" name="password" placeholder="şifre" autocomplete="off"><br><hr>        
              <input type="submit" name="update" value="güncelleme">
            </div>
          </div>
      </div>
</form>



      
        
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>    
</body>
</html>