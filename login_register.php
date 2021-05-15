<?php
	//Connect database
	include_once "database/connect.php";
		
	//To register user
	if (isset($_POST['register'])) {
		$uid = $_POST['userid'];
		$upass = $_POST['userpass'];
		$upass1 = $_POST['userpass1'];
		$uname = $_POST['username'];
		$utype = $_POST['usertype'];
		$uemail = $_POST['useremail'];
		$contact = $_POST['contactno'];
		$security=$_POST['securityquestion'];
		$answer=$_POST['securityanswer'];
		$upicture = file_get_contents("image/DefaultUserAvatar.jpg");
		$upicture = mysqli_real_escape_string($conn, $upicture);

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$insert_user = "INSERT INTO user_details (UserID, UserFullName, UserPassword, UserType, UserEmail,ContactNo,Security,Answer, UserImage) VALUES ('$uid', '$uname', '$upass', '$utype', '$uemail','$contact','$security','$answer', '$upicture')";
		//$mob="/[1-9][0-9]{9}/s";
		function validating($phone){

			if(preg_match('/^[0-9]{10}+$/', $phone)) {

				
				return 1;
			
			//echo "Valid <br>";

			
			}
			else{

				
				return 0;
			
			//echo "Invalid <br>";
			
			}
			
		}
		//check password reconfirmation
		if (($upass!=$upass1)){
			$message="Password and re-enter password is incorrect. Please try again.";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else{
			//$result_insert_user = mysqli_query($conn, $insert_user);
			if(validating($contact)==1){
				$result_insert_user = mysqli_query($conn, $insert_user);
				$message="Contact number is valid.";
				echo "<script type='text/javascript'>alert('$message');</script>";
				if($result_insert_user){
					$message="Register success. You can login now.";
					echo "<script type='text/javascript'>alert('$message');</script>";
				}
				else{
					$message="Registration fail. Please try again.";
					echo "<script type='text/javascript'>alert('$message');</script>";
				}
				
			}
			else{
				$message="Contact number is invalid.";
				echo "<script type='text/javascript'>alert('$message');</script>";

			}
			
		}
	}

	//To check entered details, login user, and retrieve user name and type
	if (isset($_POST['login'])) {
		$uid = $_POST['userid'];
		$upass = $_POST['userpass'];
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$read_DB = "SELECT * FROM user_details WHERE UserID='$uid' AND UserPassword='$upass'";
		$result = mysqli_query($conn, $read_DB);
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				//Compare string to check entered password and database record. Case sensitive.
				if (strcmp($upass, $row['UserPassword']) == 0) { 
    				session_start();
					$_SESSION['UserFullName'] = $row['UserFullName'];
					$_SESSION['UserID'] = $row['UserID'];
					$_SESSION['UserType'] = $row['UserType'];
					$message="Login Success.";
					echo "<script type='text/javascript'>alert('$message');</script>";
					header("Refresh: 0; index.php");
					} 
				else { 
    				$message="Login Fail. Please try again.";
					echo "<script type='text/javascript'>alert('$message');</script>";
				} 
			}
		}
		else{
			$message="Login Fail. Please try again.";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Events - Login or Register</title>
	<style>
		.login_button{
			font-family: Times New Roman;
			color: black;
			font-size: 26px;
			font-weight: 900;
			width: 50%;
			text-align: center;
			border: none;
			background-color: #8EEDEC;
			padding: 8px 0px;
			display: inline-block;
			border-radius: 12px;
		}
		.register_button{
			font-family: Times New Roman;
			color: black;
			font-size: 26px;
			font-weight: 900;
			width: 50%;
			text-align: center;
			border: none;
			background-color: white;
			padding: 8px 0px;
			display: inline-block;
			border-radius: 12px;
		}
		input[type=submit], input[type=button]{
			padding: 10px 5px; 
			color: black;
			border: none;
			background-color: #8EEDEC;
			font-weight: 700;
			font-size: 18px;
			font-family: Times New Roman;
			text-align: center;
			width: 22%;
			border-radius: 12px;
		}
		input[type=submit]:hover, input[type=button]:hover{
			background-color: #43C6DB;
			border-radius: 12px;
		}
		input[type=text], input[type=password], input[type=email]{
			background-color: white;
			padding: 6px 2px;
			text-align: center;
			border-style: none;
			border-bottom: 2px solid #66CDAA;
			border-top: 2px solid #66CDAA;
			border-right: 2px solid #66CDAA;
			border-left: 2px solid #66CDAA;
			font-size: 18px;
			font-family: Times New Roman;
			width: 60%;
			border-radius: 12px;
		}
		.loginform{
			margin-top: 50px;
			width: 500px;
			height: 800px;
			margin-left: 33%;
			margin-right: 33%;
			text-align: center;
			background-color: #FFF5EE; 
			font-size: 18px;
			font-family: Times New Roman;
			z-index: 1;
			position: absolute;
			border-bottom-style: solid;
			border-bottom-color: #FAEBD7;
			border-top-style: solid;
			border-top-color: #FAEBD7;
			border-right-style: solid;
			border-right-color: #FAEBD7;
			border-left-style: solid;
			border-left-color: #FAEBD7;
		}
		.registerform{
			margin-top: 50px;
			width: 500px;
			height: 800px;
			margin-left: 33%;
			margin-right: 33%;
			text-align: center;
			background-color: #FFF5EE; 
			font-size: 18px;
			font-family: Times New Roman;
			position: absolute;
			border-bottom-style: solid;
			border-bottom-color: #FAEBD7;
			border-top-style: solid;
			border-top-color: #FAEBD7;
			border-right-style: solid;
			border-right-color: #FAEBD7;
			border-left-style: solid;
			border-left-color: #FAEBD7;
		}
		.register-active{
			z-index: 2;


		}
		#security{
			width:60%;
			height:40px;
			border-style: none;
			border-bottom: 2px solid #66CDAA;
			border-top: 2px solid #66CDAA;
			border-right: 2px solid #66CDAA;
			border-left: 2px solid #66CDAA;
			border-radius: 12px;

		}
		#forgot{
			width:150%;
			padding-top: 20px;
			padding-right:50px;
			bottom:200px;
			border-radius: 12px;
			
			
			
		}
		
		
		
	
        
		
	
	
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script>
	    $(document).ready(function(){
	        $(".register_button").click(function(){
	          $(".login_button").css('background-color','white');
	          $(".register_button").css('background-color','#8EEDEC');
	          $(".registerform").addClass("register-active");
	        });
	    });
	    $(document).ready(function(){
	        $(".login_button").click(function(){
	          $(".register_button").css('background-color','white');
	          $(".login_button").css('background-color','#8EEDEC');
	          $(".registerform").removeClass("register-active");
	        });
	    });
	    $(document).ready(function(){
	        $(".home").click(function(){
	          window.location="index.php";
	        });
	    });
		$(document).ready(function(){
	        $(".forgot").click(function(){
	          window.location="forgot_password.php";
	        });
	    });
		
    

	</script>
</head>

<body background="image\lo.jpg" >
	<!--Login form-->
	<form method="POST" class="loginform" action="login_register.php">
		<br><br>
		<button type="button" class="login_button">Login</button><button type="button" class="register_button">Register</button>
		<br><br><br><br>
		<input type="text" class="" name="userid" placeholder="User Name" required>
		<br><br><br>
		<input type="password" class="" name="userpass" placeholder="Password" required>
		<br><br><br>
		<input type="password" class="" name="otp" placeholder="OTP">
		<br><br><br>
		
		<input type="submit" name="login" value="Login">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" class="home" value="Home">
		<br>
		<div id=forgot>
		<input type="button" class="forgot" value="Forgot Password?"></div>
		<br><br><br><br>
	</form>

	<!--Register form color: #008B8B;-->				
	<form method="POST" class="registerform" action="login_register.php">
		<br><br>
		<button type="button" class="login_button">Login</button><button type="button" class="register_button">Register</button>
		<br><br>
		<input type="text" name="userid" placeholder="User Name" required>
		<br><br>
		<input type="text" name="username" placeholder="Name" required>
		<br><br>
		<input type="password" name="userpass" placeholder="Password" required>
		<br><br>
		<input type="password" name="userpass1" placeholder="Re-enter Password" required>
		<br><br>
		<input type="email" name="useremail" placeholder="E-mail" required>
		<br><br>
		
    	<input type="text" id="phone" name="contactno" placeholder="Contact Number">
		
		
		<br><br>
		
		 <input type="text" name="usertype" placeholder="Student/Guest" required>
		<br><br>
		
		
		<select name="securityquestion" id="security" placeholder="Select security question">
    		<option value="What is your pet name?">What is your pet name?</option>
    		<option value="What is your nick name?">What is your nick name?</option>
    		<option value="what is your favorite place?">what is your favorite place?</option>
    		<option value="What is your favourite item?">What is your favourite item?</option>
  		</select>
		<br><br>
		
		
		 <input type="text" name="securityanswer" placeholder="Answer" required>
		<br><br>

		<input type="submit" name="register" value="Register">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" class="home" value="Home">
	</form>
</body>
</html>