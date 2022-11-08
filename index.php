<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
	<title>Profile</title>
</head>
<body>


	<?php
	error_reporting(0);

	include 'dbcon.php';

	if(isset($_POST["submit"]))
	{

		$title = $_POST["title"];

		$pname = rand(100000,1000000)."-".$_FILES["file"]["name"];

		$tname = $_FILES['files']['tmp_name'];

		$uploads_dir = '/images';

		move_uploaded_file($tname, $uploads_dir.'/'.$pname);

		$sqlquery = "INSERT into fileup(title,image) VALUES('$title','$pname')";

		if(mysqli_query($conn,$sqlquery))
		{
			
		}
		else
		{
			echo "file not uploaded";
		}


	}



	?>
       <h1 style="text-align:center; font-weight: bold; color: red;">Welcome to Mobigic Company!!</h1><hr>
    <div class="container" style="margin-left: 5%; margin-top: 3%;">

	<form action="" method="post" enctype="multipart/form-data">
		<label>Title</label>
		<input type="text" name="title">  Select File to upload:<br> 
    <input type="file" name="file" id="fileToUpload" style="margin-top: 4px;"> <br>
    
  
  <input type="submit" value="Upload Here" name="submit" class="btn btn-primary">
</form>
</div><hr>

<div class="container" style="margin-top: 20px;">

  <table class="table table-bordered" style="text-align:center;">
  <thead>
    <th style="text-align: center;">ID</th>
    <th style="text-align: center;">Title</th>
    <th style="text-align: center;">File Name</th>
    <th style="text-align: center;">Action</th>
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
                  <td class="text-center"><a href="download.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Download</a>
                  	          <a href="delete.php?id=<?php echo $res['id'];?>" data-toggle="tooltip" data-placement="top" title="DELETE"><i class="fas fa-trash-alt" style="color: red; padding-left: 30px;"></i></a>

                  </td>
              </tr>
              <?php



              }


    ?>



  </tbody>
</table>       





</body>
</html>