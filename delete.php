
<?php

include 'dbcon.php';

$id = $_GET['id'];

$deletequery = "delete from fileup where id=$id";
$query = mysqli_query($conn,$deletequery);

 header('location:index.php');

?>