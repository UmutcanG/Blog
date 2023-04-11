<?php
require 'db.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="DELETE FROM comments WHERE id=$id";
    mysqli_query($db,$query);
header('location:../admin/index.php?managecomments');
}

?>