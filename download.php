<?php
include 'dbcon.php';

if(isset($_GET['id']))
{
  $id = $_GET['id'];
  $stat = $database->prepare("select * from fileup where id=?");
  $stat->bindparam(1, $id);
  $stat->execute();
  $data = $stat->fetch();

  $file = 'media/'.$data['filename'];

  if(file_exists($file)){

    header('content-title'. $data['title']);
    header('content-image'. $data['image']);
    readfile($file);
    exit;
  }



}

?>