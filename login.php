<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include 'links1.php' ?>
		<link rel="stylesheet" type="text/css" href="login.css">
		<script src="https://apis.google.com/js/platform.js" async defer></script>
		<meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
		 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login Form</title>
	</head>
	<style>
		body
		{
			background-image: url('images.png');
			background-attachment: fixed;
			background-size: cover;
			background-repeat: no-repeat;
		}


	@media only screen and (max-device-width: 640px) {
	   body        
	   { font-size: 4vw;

	   }
	.container 
	{ margin: 2em auto; 
	}
	.loader     
	{ 
		transform: translate(0, 0) scale(2,2);
	}
	#gmail
	{
		margin: 0px;
		width: 100px;
	}
	
	}
	</style>
	<body>
		<?php
			include 'dbcon.php';
			if(isset($_POST['submit'])){
				$email = $_POST['email'];
				$password = $_POST['password'];
				$email_search = "select * from signup where email = '$email'";
				$query = mysqli_query($conn,$email_search);
				$email_count = mysqli_num_rows($query);
				if($email_count)
				{
					$email_pass = mysqli_fetch_assoc($query);
					$db_pass = $email_pass['password'];
					$pass_decode = password_verify($password,$db_pass);
					if($pass_decode)
					{
						echo "Login successfull";
		?>
		<script>
		<?php
			$_SESSION['username']= $email;
			$_SESSION['status'] =true;
		?>
		location.replace("index.php");
		</script>
		<?php
		}
		else
		{
		?>
		<script>
			alert("Password is Incorrect!!....Try Again :) ")
		</script>
		<?php
		}
		
		}
		}
		?>
		<div class="container" style="">
			<h3 class="text-center" style="color:white; padding-bottom:3px;">Login Here</h3>
			<p class="text-center" style="color:white;">Welcome to Mobigic-Company!!</p>
			<a href="" class="btn btn-block btn-gmail text-center" id= "gmail" id="mySignin" onclick="login()" style="background-color: red; width:30%; align-items: center; margin-left: 35%; color: white; font-weight: bold;"><i class="fa fa-google" style="padding-right: 30px; font-weight: bold;"></i>        Login via Google</a><br>
			<a href="" class="btn btn-block btn-gmail text-center" onclick="login()" style="background-color: darkblue; width:30%; align-items: center; margin-left: 35%; color: white; font-weight: bold;"><i class="fa fa-facebook" style="padding-right: 30px; color: white; font-weight: bold;" ></i>        Login via Facebook</a><br>
			<p class="divider-text" style="text-align: center;">
				<span class="bg-black" style="color:white;">________OR________</span>
			</p>
			<form action="" method="POST">
				<i class="fa fa-user-circle-o" aria-hidden="true" style="padding: 3px; "></i><input type="text" name="email" placeholder="Username" id="username"required style="width: 25%; padding-left: 15px;"><br><br>
				<i class="fa fa-unlock-alt" aria-hidden="true" style="padding: 3px;"></i><input type="password" name="password" placeholder="Password" required style="width: 25%; padding-left: 15px;"><br><br>
				<button class="btn btn-block btn-gmail text-center" type="submit" name="submit" id="submitbtn" style="background-color: blue; width:30%; align-items: center; margin-left: 35%; color: white; font-weight: bold;">Login Now</button><br><br>
				<p style="text-align: center; color:white;">Not Have an account?<a href="signup.php"><span style="color: red; font-weight:bold; padding-left:10px;">Sign up Here</span></a>
			</div>
		</div>

		<script type="text/javascript">
        function login() 
        {
          var myParams = {
            'clientid' : 'YOUR_CLIENT_ID.apps.googleusercontent.com',
            'cookiepolicy' : 'single_host_origin',
            'callback' : 'loginCallback',
            'approvalprompt':'force',
            'scope' : 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read'
          };
          gapi.auth.signIn(myParams);
        }

        function loginCallback(result)
        {
            if(result['status']['signed_in'])
            {
                var request = gapi.client.plus.people.get(
                {
                    'userId': 'me'
                });
                request.execute(function (resp)
                {
                    /* console.log(resp);
                    console.log(resp['id']); */
                    var email = '';
                    if(resp['emails'])
                    {
                        for(i = 0; i < resp['emails'].length; i++)
                        {
                            if(resp['emails'][i]['type'] == 'account')
                            {
                                email = resp['emails'][i]['value'];//here is required email id
                            }
                        }
                    }
                   var usersname = resp['displayName'];//required name
                });
            }
        }
        function onLoadCallback()
        {
            gapi.client.setApiKey('YOUR_API_KEY');
            gapi.client.load('plus', 'v1',function(){});
        }

            </script>

        <script type="text/javascript">
              (function() {
               var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
               po.src = 'https://apis.google.com/js/client.js?onload=onLoadCallback';
               var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
             })();
        </script>
        <script>



  window.fbAsyncInit = function() {
        FB.init({
            appId      : '1736082853383409',
            xfbml      : true,
            version    : 'v2.8'
        });
        FB.getLoginStatus(function(response){
            if(response.status === 'connected'){
                document.getElementById('status').innerHTML = 'we are connected';
            } else if(response.status === 'not_authorized') {
                 document.getElementById('status').innerHTML = 'we are not logged in.'
            } else {
                document.getElementById('status').innerHTML = 'you are not logged in to Facebook';
            }
        });
    // FB.AppEvents.logPageView();
    };

    (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    function login(){
        FB.login(function(response){
            if(response.status === 'connected'){
                document.getElementById('status').innerHTML = 'we are connected';
            } else if(response.status === 'not_authorized') {
                 document.getElementById('status').innerHTML = 'we are not logged in.'
            } else {
                document.getElementById('status').innerHTML = 'you are not logged in to Facebook';
            }

        });
    }
    // get user basic info

    function getInfo() {
        FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id'}, function(response) {
            document.getElementById('status').innerHTML = response.id;
        });
    }

    function logout(){
        FB.logout(function(response) {
            document.location.reload();
        });
    }


</script>
	</body>
</html>