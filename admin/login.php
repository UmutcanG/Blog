<?php
require('../includes/db.php');
if(isset($_SESSION['isUserLoggedIn']) && $_SESSION['isUserLoggedIn']){
  header('Location:index.php');

}
if(isset($_POST['login'])){
$email = mysqli_real_escape_string($db,$_POST['email']);
$password = mysqli_real_escape_string($db,$_POST['password']);

$query="SELECT * FROM admin WHERE email='$email' AND password='$password'";
$runQuery = mysqli_query($db,$query);
if(mysqli_num_rows($runQuery)){
  $_SESSION['isUserLoggedIn']=true;
  $_SESSION['email']=$email;
  header('Location:index.php');
}else{
  echo "<script>alert('Yanlış Email ya da şifre !');</script>";
}

}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Admin Paneli</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  
</head>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" method="post">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="email" class="form-control" name="email" placeholder="Email" autofocus required>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" name="password" placeholder="Şifre" required>
        </div>
        
        <button class="btn btn-primary btn-lg btn-block" name="login" type="submit">Giriş Yap</button>
        
      </div>
    </form>
    <div class="text-right">
      
    </div>
  </div>


</body>

</html>
