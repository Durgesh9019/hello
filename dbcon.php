<?php 
$server = "localhost";
$username = "root";
$password = "";
$database = "mobigic";

$conn = mysqli_connect($server,$username,$password,$database);

if($conn)
{
	
}
else
{
	?>
	<script>
		alert("Connection unsuccessfull!!!");
	</script>
	<?php

}

 ?>