<?php
require('includes/db.php');
require_once('includes/function.php');

if(isset($_POST['register'])){
$email = mysqli_real_escape_string($db,$_POST['email']);
$password = mysqli_real_escape_string($db,$_POST['password']);
$password = md5($password);
$full_name = mysqli_real_escape_string($db,$_POST['full_name']);


	$query="INSERT INTO users(email,password,full_name) VALUES('$email','$password','$full_name') ";
	$runQuery = mysqli_query($db,$query);


$query="SELECT * FROM users ";
$runQuery = mysqli_query($db,$query);
if(mysqli_num_rows($runQuery)){
  $_SESSION['isUserSignIn']=true;
  header('Location:/blog/login.php');
}
}


?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">

  <title>Kayıt Paneli</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  
</head>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" method="post" action="register.php">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="email" class="form-control" name="email" placeholder="Email"  required>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" name="password" placeholder="Şifre" required>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="name" class="form-control" name="full_name" placeholder="Ad-Soyad"  required>
        </div>
        
        
        <button class="btn btn-primary btn-lg btn-block" name="register" type="submit">Kayıt ol</button>
            <a class="btn btn-primary btn-lg btn-block" href="login.php"><font color="black"><strong>Giriş Ekranına Dön</strong></font></a>
        
      </div>
    </form>
    <div class="text-right">
      
    </div>
  </div>


</body>

</html>
