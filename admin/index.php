<?php
require('../includes/db.php');
require_once('../includes/function.php');
if(!isset($_SESSION['isUserLoggedIn'])){
  header('Location:login.php');
}
$admin=getAdminInfo($db,$_SESSION['email']);
?>
<!DOCTYPE>
<html>

<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Admin Paneli</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="css/bootstrap-theme.css" rel="stylesheet">

 
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />

  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />

  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">

  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">

</head>

<body>

  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <a href="index.php" class="logo">H<strong>0</strong>pe Admin Paneli</a>
   

      <div class="top-nav notification-row">
        <ul class="nav pull-right top-menu">


          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            
                    
                            <span ><?=$admin['full_name']?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              
              <li>
                <a href="../includes/logout.php"><i></i> Çıkış Yap</a>
              </li>
              
            </ul>
          </li>
        </ul>
      </div>
    </header>

    <aside>
      <div id="sidebar" class="nav-collapse ">

        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="index.php?manageusers">
                          <i class="icon_house_alt"></i>
                          <span>Kullanıcıları Yönet</span>
                      </a>
          </li>
          <li class="active">
            <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Gönderi Ekle</span>
                      </a>
          </li>
          <li class="active">
            <a class="" href="index.php?managepost">
                          <i class="icon_house_alt"></i>
                          <span>Gönderileri Yönet</span>
                      </a>
          </li>
          <li class="active">
            <a class="" href="index.php?managecomments">
                          <i class="icon_house_alt"></i>
                          <span>Yorumları Yönet</span>
                      </a>
          </li>
          <li class="active">
            <a class="" href="index.php?managecategory">
                          <i class="icon_house_alt"></i>
                          <span>Kategörileri Yönet</span>
                      </a>
          </li>
          <li class="active">
            <a class="" href="index.php?managemenu">
                          <i class="icon_house_alt"></i>
                          <span>Menüleri Yönet</span>
                      </a>
          </li>
          

        </ul>
      </div>
    </aside>


    <section id="main-content">
      <section class="wrapper">  

        <div class="row">
          <div class="col-lg-12 col-md-12">
     <?php
     if(isset($_GET['managepost'])){
?>
<div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Gönderiler
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th>#</th>
                    <th>Gönderi id</th>
                    <th>Başlık</th>
                    <th>Kategori</th>
                    <th>Tarih</th>
                    <th></th>

                   
                  </tr>

          <?php
          $posts = getAllPost($db);
          $count=1;
          foreach($posts as $post){
            ?>
<tr>
                    <td><?=$count?></td>
                    <td><?=$post['id']?></td>
                    <td><?=$post['title']?></td>
                    <td><?=getCategory($db,$post['category_id'])?></td>

                    <td><?=$post['created_at']?></td>

                   
                    <td>
                      <div class="btn-group">
                       
                        <a class="btn btn-danger" href="../includes/removepost.php?id=<?=$post['id']?>">sil <i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
            <?php
            $count++;
          }
          ?>
                  
                

                
                </tbody>
              </table>
            </section>
          </div>
        </div>

<?php
     }else if(isset($_GET['managecomments'])){
?>
<div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Yorumlar
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th>#</th>
                    <th>İçerik</th>
                    <th>İsim</th>
                    <th>Gönderi id</th>
                    <th>Tarih</th>
                    <th></th>

                   
                  </tr>

          <?php
          $comments = getAllComments($db);
          $count=1;
          foreach($comments as $comment){
            ?>
<tr>
                    <td><?=$count?></td>
                    
                    <td><?=$comment['comment']?></td>
                    <td><?=$comment['name']?></td>
                    <td><?=$comment['post_id']?></td>
                    <td><?=$comment['created_at']?></td>

                   
                    <td>
                      <div class="btn-group">
                       
                        <a class="btn btn-danger" href="../includes/removecomment.php?id=<?=$comment['id']?>">sil <i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
            <?php
            $count++;
          }
          ?>
                  
                

                
                </tbody>
              </table>
            </section>
          </div>
        </div>

<?php
     }else if(isset($_GET['manageusers'])){
?>
<div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Kullanıcılar
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th>#</th>
                    <th>Ad Soyad</th>
                    <th>Email</th>
                    
                    <th>Kayıt Tarihi</th>
                    

                   
                  </tr>

          <?php
          $users = getAllusersInfo($db);
          $count=1;
          foreach($users as $user){
            ?>
<tr>
                    <td><?=$count?></td>
                    
                    <td><?=$user['full_name']?></td>
                    <td><?=$user['email']?></td>
                    
                    <td><?=$user['created_at']?></td>

                   
                    <td>
                      <div class="btn-group">
                       
                        <a class="btn btn-danger" href="../includes/removeuser.php?id=<?=$user['id']?>">sil <i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
            <?php
            $count++;
          }
          ?>
                  
                

                
                </tbody>
              </table>
            </section>
          </div>
        </div>






<?php
     }else if(isset($_GET['managemenu'])){
?>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal"
                  class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">Menü Ekle</h4>
                      </div>
                      <div class="modal-body">

                        <form role="form" method="post" action="../includes/addmenu.php">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Başlık</label>
                            <input type="text" name="menu-name" class="form-control" id="exampleInputEmail3" placeholder="Menü İsmini Yazınız">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Link</label>
                            <input type="text" name="menu-link" class="form-control" id="exampleInputEmail3" value="#" placeholder="Menü Linkini Yazınız.">
                          </div>
                          
                          
                          <button type="submit" name="addmenu" class="btn btn-primary">Ekle</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
<div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Menü - <a href="#myModal" data-toggle="modal" class="text-primary">
                 Yeni Menü Ekle</a>
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th>#</th>
                    <th>Menü</th>
                    <th>Link</th>
                    <th></th>

                   
                  </tr>

          <?php
          $menus = getMenu($db);
          $count=1;
          foreach($menus as $menu){
            ?>
<tr>
                    <td><?=$count?></td>
                    <td><?=$menu['name']?></td>
                    <td><?=$menu['action']?></td>

                   
                    <td>
                      <div class="btn-group">
                       
                        <a class="btn btn-danger" href="../includes/removemenu.php?id=<?=$menu['id']?>">Sil <i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
            <?php
            $count++;
          }
          ?>
                  
                

                
                </tbody>
              </table>
            </section>
          </div>
        </div>


        




        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal1"
                  class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">Alt Başlık Ekle</h4>
                      </div>
                      <div class="modal-body">

                        <form role="form" method="post" action="../includes/addmenu.php">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Başlık</label>
                            <input type="text" name="submenu-name" class="form-control" id="exampleInputEmail3" placeholder="Enter menu name..">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Eklenecek Başlık</label>
                            <select name="parent-id" class="form-control" id="exampleInputEmail3">
<?php
$mlist = getAllMenu($db);
foreach($mlist as $m){
  ?>
                            <option value="<?=$m['id']?>"><?=$m['name']?></option>

  <?php
}
?>
       
</select>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Alt Başlık Link</label>
                            <input type="text" name="submenu-link" class="form-control" id="exampleInputEmail3" value="#" placeholder="Enter menu link..">
                          </div>
                          
                          
                          <button type="submit" name="addsubmenu" class="btn btn-primary">Ekle</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
<div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
              Alt Başlık - <a href="#myModal1" data-toggle="modal" class="text-primary">
                 Alt Başlık Ekle</a>
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th>#</th>
                    <th>Alt Başlık</th>
                    <th>Menü</th>
                    <th>Link</th>
                    <th></th>

                   
                  </tr>

          <?php
          $submenus = getAllSubMenu($db);
          $count=1;
          foreach($submenus as $menu){
            ?>
<tr>
                    <td><?=$count?></td>
                    <td><?=$menu['name']?></td>
                    <td><?=getMenuName($db,$menu['parent_menu_id'])?></td>

                    <td><?=$menu['action']?></td>

                   
                    <td>
                      <div class="btn-group">
                       
                        <a class="btn btn-danger" href="../includes/removesubmenu.php?id=<?=$menu['id']?>">Kaldır <i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
            <?php
            $count++;
          }
          ?>
                  
                

                
                </tbody>
              </table>
            </section>
          </div>
        </div>


<?php
     }else if(isset($_GET['managecategory'])){
?>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal"
                  class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">Kategori Ekle</h4>
                      </div>
                      <div class="modal-body">

                        <form role="form" method="post" action="../includes/addct.php">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Kategori İsmi</label>
                            <input type="text" name="category-name" class="form-control" id="exampleInputEmail3" placeholder="Kategori İsmini Yazınız">
                          </div>
                         
                          
                          
                          <button type="submit" name="addct" class="btn btn-primary">Ekle</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
<div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Kategori - <a href="#myModal" data-toggle="modal" class="text-primary">
                  Yeni Kategori Ekle
                </a>
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th>#</th>
                    <th>Kategori İsmi</th>
                    <th></th>
                   
                  </tr>

          <?php
          $categories = getAllCategory($db);
          $count=1;
          foreach($categories as $ct){
            ?>
<tr>
                    <td><?=$count?></td>
                    <td><?=$ct['name']?></td>
                   
                    <td>
                      <div class="btn-group">
                       
                        <a class="btn btn-danger" href="../includes/removect.php?id=<?=$ct['id']?>">Sil <i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
            <?php
            $count++;
          }
          ?>
                  
                

                
                </tbody>
              </table>
            </section>
          </div>
        </div>
<?php
     }else{
       ?>
 <div class="col-lg-12">
                <section class="panel">
                  <header class="panel-heading">
                    Gönderi Ekle
                  </header>
                  <div class="panel-body">
                    <div class="form">
                      <form action="../includes/addpost.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="form-group">
                      <div class="col-sm-12">
                        <label>Başlık</label>
                            <input type="text" class="form-control" name="post_title">
                          </div>
</div>
                        <div class="form-group">
                         
                          <div class="col-sm-12">
                          <label>İçerik</label>
                            <textarea class="form-control ckeditor" name="post_content" rows="6"></textarea>
                          </div>
                        </div>

<div class="row">
<div class="form-group col-sm-6">
                      <div class="col-sm-12">
                        <label>Kategori Seç</label>

                           <select name="post_category" class="form-control">
                           <?php
$categories = getAllCategory($db);
foreach($categories as $ct){
  ?>
<option value="<?=$ct['id']?>"><?=$ct['name']?></option>
  <?php
}
?>

</select>
                          </div>
</div>
<div class="form-group col-sm-6">
                      <div class="col-sm-12">
                        <label>Resim Yükle(max 5)</label>

                          <input type="file" class="form-control" name="post_image[]" accept="image/*" multiple/>
                          </div>
</div>
</div>
                        <input type="submit" name="addpost" class="btn btn-primary" value="Gönderi Ekle">
                      </form>
                    </div>
                  </div>
                </section>
              </div>
           
</div>

        </div>
       <?php
     }
     ?>
         


      </section>
     
    </section>

  </section>


  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>

  <script src="js/bootstrap.min.js"></script>

  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js"></script>
  <<script src="js/fullcalendar.min.js"></script>
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <script src="js/scripts.js"></script>
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  <script src="js/form-component.js"></script>
  <script src="js/scripts.js"></script>

    <script>
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });


      $(function() {
        $('select.styled').customSelect();
      });

      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>

</body>

</html>
