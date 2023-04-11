<?php
require('includes/db.php');
include_once('includes/function.php');
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
<div>
    <div class="container m-auto mt-3 row">
        <div class="col-8">
        <?php
        $post_id=$_GET['id'];
$postQuery="SELECT * FROM posts WHERE id=$post_id";
$runPQ=mysqli_query($db,$postQuery);
$post=mysqli_fetch_assoc($runPQ);
        ?>
            <div class="card mb-3">
           
                <div class="card-body">
                  <h5 class="card-title"><?=$post['title']?></h5>
                  <span class="badge bg-primary "><?=$post['created_at']?> Tarihinde Gönderildi.</span>
                  <span class="badge bg-danger"><?=getCategory($db,$post['category_id'])?></span>
                  <div class="border-bottom mt-3"></div>
<?php
$post_images=getImagesByPost($db,$post['id']);



?>




<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
  <?php
  $c=1;
foreach($post_images as $image){
  if($c>1){
    $sw = "";
  }else{
    $sw = "active";

  }
  ?>
<div class="carousel-item <?=$sw?>">
      <img src="images/<?=$image['image']?>" class="d-block w-100" alt="...">
    </div>
  <?php
  $c++;
}
  ?>
    
    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Önceki</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Sonraki</span>
  </button>
</div>






                  <p class="card-text"><?=$post['content']?>
                  </p>
                  <div class="addthis_inline_share_toolbox"></div>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Yorum Ekle
</button>

                </div>
              </div>
        




<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yorum Ekle</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="includes/add_comment.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">İsim</label>
    <input type="name" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Yorum</label>
    <input type="text" class="form-control" name="comment" id="exampleInputPassword1">
  </div>
  <input type="hidden" name="post_id" value="<?=$post_id?>">
  <button type="submit" name="addcomment" class="btn btn-primary">Yorumu Ekle</button>
</form>
      </div>
      
    </div>
  </div>
</div>






              <div>
                  <h4>Benzer Kategorideki Gönderiler</h4>
                
 <?php
 $pquery="SELECT * FROM posts WHERE category_id={$post['category_id']} ORDER BY id DESC";
 $prun=mysqli_query($db,$pquery);
 while($rpost=mysqli_fetch_assoc($prun)){
   if($rpost['id']==$post_id){
     continue;
   }
   ?>

   <a href="post.php?id=<?=$rpost['id']?>" style="text-decoration:none;color:black">
<div class="card mb-3" style="max-width: 700px;">
                    <div class="row g-0">
                      <div class="col-md-5" style="background-image: url('images/<?=getPostThumb($db,$rpost['id'])?>');background-size: cover">
                        
                      </div>
                      <div class="col-md-7">
                        <div class="card-body">
                          <h5 class="card-title"><?=$rpost['title']?></h5>
                          <p class="card-text text-truncate"><?=$rpost['content']?></p>
                          <p class="card-text"><small class="text-muted"><?=$post['created_at']?> Tarihinde Gönderildi.</small></p>
                        </div>
                      </div>
                    </div>
                  </div>  
   </a>
   <?php
 }
 ?>
                  
              </div>
        
    </div>
    <?php include_once('includes/sidebar.php'); ?>

    </div>

  
      
      
    

      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>  
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60315b469e32d063"></script>  
</body>
</html>