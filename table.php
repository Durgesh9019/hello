<!DOCTYPE html>
<html lang="en">
<head>
  <title>Table</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Display:ital@1&family=Roboto+Slab&family=Zen+Antique&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap" rel="stylesheet">
</head>
<body>
  
<div class="container">

  <table class="table table-bordered">
  <thead>
    <th>ID</th>
    <th>Title</th>
    <th>File Name</th>
    <th>Action</th>
  </thead>
  <tbody>
    <?php

      include 'dbcon.php';
      $selectquery = "select * from fileup";
              $query = mysqli_query($conn,$selectquery);
              $nums = mysqli_num_rows($query);

              while($res = mysqli_fetch_array($query)) {

                ?>
              <tr>
                <td><?php echo $res['id']; ?></td>
                 <td><?php echo $res['title']; ?></td>
                  <td><?php echo $res['image']; ?></td>
                  <td class="text-center"><a href="download.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Download</a></td>
                  <a href="delete.php?id=<?php echo $res['id'];?>" data-toggle="tooltip" data-placement="top" title="DELETE"><i class="fas fa-trash-alt"></i></a>
              </tr>
              <?php



              }


    ?>



  </tbody>
</table>       

</body>
</html>