<?php
require('includes/db.php');
include_once('includes/function.php');
if(!isset($_SESSION['isUserLoggedIn'])){
  header('Location:login.php');
}
$users=getusersInfo($db,$_SESSION['email']);
?>
<?php
  $sql="SELECT * from `users`";
  $query= mysqli_query($db, $sql);
  if($query){
    while($row=mysqli_fetch_assoc($query)){
      $id=$row['id'];
      $email=$row['email'];
      $password=$row['password'];
      $full_name=$row['full_name'];

  }
}


?>

<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="index.php">H<strong>0</strong>pe</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
<?php
$navQuery = "SELECT * FROM menu";
$runNav=mysqli_query($db,$navQuery);
while($menu=mysqli_fetch_assoc($runNav)){
  $no = getSubMenuNo($db,$menu['id']);
  if(!$no){
    ?>
<li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?=$menu['action']?>"><?=$menu['name']?></a>
              </li>
    <?php
  }else{
    ?>
<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="<?=$menu['action']?>" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?=$menu['name']?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
<?php
$submenus = getSubMenu($db,$menu['id']);
foreach($submenus as $sm){
  ?>
                  <li><a class="dropdown-item" href="<?=$sm['action']?>"><?=$sm['name']?></a></li>

  <?php
}
?>
                  

                </ul>
              </li>
    <?php
  }
  ?>

  <?php
}
?>
        
            </ul>
            



            <li class="nav-item dropdown">
                 
                          
                          
                          <a class="btn btn-outline-success my-2 my-sm-0" href="profile.php?updateid='.$id.'"><?=$users['full_name']?></a>
                          
                          <a class="btn btn-outline-success my-2 my-sm-0" href="logout.php">Çıkış Yap</a>
                
                          <b class="caret"></b>
                        
                        <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              
              
              
            </ul>
                
              </li>
            
          </div>
        </div>
      </nav>  
