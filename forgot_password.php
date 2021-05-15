<?php
	//Connect database
	include_once "database/connect.php";
	
	//Read session
	include 'session.php';
	
	
	

	//To change password

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		a:hover{
			font-size: 24px;
		}
		a{
			color: black;
		}
		form{
			margin-left: 60px;
			margin-top: 15px;
			margin-right: 60px;
			
		}
		table{
			min-width: 600px;
			max-width:800px;
			margin-top:50px;
			margin-bottom:50px;
			margin-left:auto;
			margin-right:auto;
			background-color: #FFF5EE;
			padding-top: 20px;
			padding-bottom: 30px;
			padding-left: 10px;
			padding-right: 10px;
			min-height: 400px;
		}
		th{
			font-size: 30px;
			text-align: center;
			padding-top: 20px;
			padding-bottom: 20px;
			text-decoration: underline;
			
		}
		 input[type=password],input[type=text]{
			background-color: white;
			padding: 5px;
			text-align: center;
			border-style: none;
			font-size: 22px;
			font-family: Times New Roman;
			width: 60%;
			
			border-style: none;
			border-bottom: 2px solid #66CDAA;
			border-top: 2px solid #66CDAA;
			border-right: 2px solid #66CDAA;
			border-left: 2px solid #66CDAA;
			border-radius: 12px;
		}
		td{
			
			padding: 5px;
			text-align: center;
			border-style: none;
			font-size: 22px;
			font-family: Times New Roman;
			width: 60%;
			background-color: #FFF5EE;
			
		}
		input[type=submit], input[type=reset]{
			padding: 10px;
			color: black;
			border: none;
			background-color: #82CAFF;
			font-weight: 900;
			font-family: Times New Roman;
			font-size: 20px;
			text-align: center;
			width: 120px;
			border-radius: 12px;
			
		}
		input[type=submit]:hover, input[type=reset]:hover{
			background-color:  #2B65EC;
			border-radius: 12px;
		}
		hr{
			border-top: none;
			border-bottom: none;
			border-left: none;
			border-right: none;
			width: 95%;
			padding-top: 10px
		}
        #security{
			width:60%;
			height:40px;
			
			background-color: white;
			border-style: none;
			border-bottom: 2px solid #66CDAA;
			border-top: 2px solid #66CDAA;
			border-right: 2px solid #66CDAA;
			border-left: 2px solid #66CDAA;
			border-radius: 12px;

		}
	</style>
</head>
<body background="image\lo.jpg">
	<form action="forgot_password.php" method="POST">
		<table>
			<tr>
				<th>Change Password</th>
                
			</tr>
			<tr>
				<td>
					<hr>
                    <input type="text" class="" name="userid" placeholder="User Name" style="border-bottom: 2px solid #66CDAA;" required>
					<br></br>
                    <select name="securityquestion" id="security" placeholder="Select security question">
    		            <option value="What is your pet name?">What is your pet name?</option>
    		            <option value="What is your nick name?">What is your nick name?</option>
    		            <option value="what is your favorite place?">what is your favorite place?</option>
    		            <option value="What is your favourite item?">What is your favourite item?</option>
  		            </select>
                    <?php
                   
                    if (isset($_POST['change'])) {

                        $passnew = $_POST['new'];
		                $passre = $_POST['reenter'];
                        $uid = $_POST['userid'];
                        $answer=$_POST['xyz'];
                        $securityquestion=$_POST['securityquestion'];

		                $conn = mysqli_connect($servername, $username, $password, $dbname);

                        if (strcmp($passre, $passnew)!==0){
                            $message="New password and re-enter password is not same. Please try again.";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                       

                        $read_user_booking = "SELECT * FROM user_details WHERE UserID='$uid' AND Security='$securityquestion' AND Answer='$answer'";
                        $result_read_user_booking = mysqli_query($conn, $read_user_booking);
                        if ($result_read_user_booking){
							while($row1 = mysqli_fetch_array($result_read_user_booking, MYSQLI_ASSOC)){
								//$vid=$row1['VenueID'];
								$update_password = "UPDATE user_details SET UserPassword='$passre' WHERE UserID='$uid'";
						        $result_update_password = mysqli_query($conn, $update_password);
						        if ($result_update_password){
							        $message="Change password success.";
							        echo "<script type='text/javascript'>alert('$message');</script>";
						        }
						        else{
							        $message="Fail to change password. Please try again.";
							        echo "<script type='text/javascript'>alert('$message');</script>";
						        }
								
								
								
								
								
							}
						}
                        else{
                            $message1="Fail to change password xyz.";
							echo "<script type='text/javascript'>alert('$message1');</script>";
                        }
                    }
                    
                    ?>
					<br></br>
                     <input type="text" class="" name="xyz" placeholder="Enter Answer" style="border-bottom: 2px solid #66CDAA;" required>
                     

                    
					
					<br><br>
					<input type="password" name="new" placeholder="New Password" style="border-bottom: 2px solid #66CDAA;" minlength="8" maxlength="12" required>
					<br><br>
					<input type="password" name="reenter" placeholder="Re-enter New Password" style="border-bottom: 2px solid #66CDAA;";  required>
					<br><br><br>
					<input type="submit" name="change" value="Save">&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="reset" name="cancel" value="Cancel">
				</td>
			</tr>
		</table>
	</form>

</body>
</html>