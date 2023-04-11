<div class="col-4">

        

          <?php
          if(isset($_GET['id'])){
            ?>
<div class="card mb-3">
            <h5 class="card-header">Yorumlar</h5>
            <?php
$comments = getComments($db,$post_id);
if(count($comments)<1){
  echo '<div class="card-body"><p class="text-center card-text">Yorumsuz....</p></div>';
}
foreach($comments as $comment){
  ?>
<div class="card-body">
              <h5 class="" style="margin-bottom: 0;"><?=$comment['name']?></h5>
             <span class="text-secondary"> <small><?=$post['created_at']?> Tarihinde Gönderildi.</small></span>
              <p class="card-text"><?=$comment['comment']?></p>
              
            </div>
  <?php
}
            ?>
            
          </div>
            <?php
          }
          ?>
          
          
    </div>