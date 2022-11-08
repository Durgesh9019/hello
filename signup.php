<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign up form</title>
		<?php include 'links1.php' ?>
		
</head>
<style>
	body
		{
			background-image: url(White-Desk-Simple-Background-Image-.jpg);
			background-attachment: fixed;
			background-repeat: no-repeat;
			background-size: cover;
			margin-top: 20px;
		}

</style>
<body>

		<?php
				include 'dbcon.php';

			if (isset($_POST['submit']))
			 {
				$username = mysqli_real_escape_string($conn, $_POST['username']);
				$email = mysqli_real_escape_string($conn, $_POST['email']);
				$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
				$password = mysqli_real_escape_string($conn, $_POST['password']);
				$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

				$pass = password_hash($password, PASSWORD_BCRYPT);
				$cpass = password_hash($cpassword, PASSWORD_BCRYPT);

				$token = bin2hex(random_bytes(15));

				$emailquery = "select * from signup where email = '$email'";

				$query = mysqli_query($conn,$emailquery);

				$emailcount = mysqli_num_rows($query);

				if($emailcount>0)
				{
					?>
						<script>
							alert("Email Already Exit!!");
						</script>
				   <?php
				}
				else
				{
					if($password===$cpassword)
					{
						$insertquery = "insert into signup( username, email, mobile, password,  cpassword ) values('$username','$email','$mobile','$pass','$cpass')";

						$iquery = mysqli_query($conn,$insertquery);

								if($iquery)
								{
									// {
									// 		$subject = "Email Activation";
									// 		$body = "Hi,$username. Click here too activate your account http://localhost/Registation/activate.php?token=$token";

									// 		$sender_email = "from: dharmadhikaridurgesh8830@gmail.com";

									// 		if(mail($email, $subject, $body,$sender_email)){
									// 			$_SESSION['msg'] = "Check you mail to activate your account $email";
									// 			header('location.login.php');
										
									// }

									?>
											<script>
													alert("Signup Successfull!!");
											</script>
									<?php
											header('location:login.php');
								}
									else
									{
											?>
												<script>
												alert("Data Not Inserted!!!");
												</script>
											<?php

									}

					}
					else
					{
						?>
							<script>
								alert("Not Matching Password....Please Try again!!!");
							</script>
					<?php
					}

				}
			}

			

		?>

	<div class="container">
		<div class="mainform" style="">
		<div class="heading"><h3>Create Account</h3>
		<p>Welcome to Mobigic-Company!!</p>
	</div>

		<a href="" class="btn btn-block btn-gmail text-center" style="background-color: red; width:30%; align-items: center; margin-left: 37%; color: white; font-weight: bold;"><i class="fa fa-google" style="padding-right: 30px; font-weight: bold;"></i>        Login via Gmail</a><br>

		<a href="" class="btn btn-block btn-gmail text-center" style="background-color: darkblue; width:30%; align-items: center; margin-left: 37%; color: white; font-weight: bold;"><i class="fa fa-facebook" style="padding-right: 30px; color: white; font-weight: bold;" ></i>        Login via Facebook</a><br>

		<p class="divider-text">
			<span class="bg-black" style="margin-left: 4%;">________________OR________________</span>
		</p>

	<div class="form">
		<form action="" method="POST">
		<i class="fa fa-user-circle-o" aria-hidden="true" style="padding: 4px;"></i><input type="text" name="username" placeholder="Full Name" required style="width: 25%; padding-left: 15px;"><br><br>

		<i class="fa fa-envelope" aria-hidden="true" style="padding: 3px;  "></i><input type="text" name="email" placeholder="Email address" required  style="width: 25%; padding-left: 15px;"><br><br>

		<i class="fa fa-volume-control-phone" aria-hidden="true"style="padding: 3px;  "></i><input type="text" name="mobile" placeholder="Phone number" required style="width: 25%; padding-left: 15px;"><br><br>

		<i class="fa fa-unlock-alt" aria-hidden="true"style="padding: 4px;  "></i><input type="password" name="password" placeholder="Create Password" required style="width: 25%; padding-left: 15px;"><br><br>

		<i class="fa fa-unlock-alt" aria-hidden="true"style="padding: 4px;  "></i><input type="password" name="cpassword" placeholder="Confirm Password" required style="width: 25%; padding-left: 15px;"><br><br>

		<button class="btn btn-block btn-gmail text-center" type="submit" name="submit" id="submitbtn" style="background-color: blue; width:30%;color: white; font-weight: bold;margin-left: 35%;">Create Account</button><br><br>
	</form>

		<p>Have a account to <a href="login.php">Login Here</a></p>
	</div>

	</div>
	</div>


</body>
</html>
