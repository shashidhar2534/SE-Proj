

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   
    
    <style>
        form {
            box-shadow: 10px 10px 40px grey;
            padding: 50px;
            margin: 20px;
            background-color: #FFF5EE;
            border-radius: 12px;
        }
   
.top{
			font-size: 34px;
			font-family: Helvetica;
			text-align: center;
            border-radius: 12px;
		}
.form-container{
            font-weight: 900;
			font-family: Times New Roman;
			font-size: 16px;
            border-radius: 12px;
}
.xyz{
    color: green;
}
input[type=submit]{
			padding: 10px 5px; 
			color: black;
			border: none;
			background-color: #82CAFF;
			font-weight: 700;
			font-size: 18px;
			font-family: Times New Roman;
			text-align: center;
			width: 10%;
            border-radius: 12px;
		}
		input[type=submit]:hover{
			background-color: #2B65EC;
            border-radius: 12px;
		}
.x{
    position:relative;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
								$(document).ready(function(){
									$(".back").click(function(){
									  window.location="my_booking.php";
									});
								});
								
								</script>
</head>
    
    <body background="image\lo.jpg" >
    <hr width="auto" size="10" style="background: #C24641"> <!-- line under the title-->
    <div class="top">
		<h1>Query</h1>
	</div>
        
        <hr width="auto" size="10" style="background: #C24641">
        <p class="text-success text-center">
        </p>
      
    <form method="post" action=""
            enctype="multipart/form-data"
            class="w-75 mx-auto">

          
        <h4 class="text-success text-center">
            Fill the form
        </h4>
          
        <div class="form-group">
            <input type="text" name="name"
                class="form-control"
                placeholder="Name" required="">
        </div>
          
        <div class="form-group">
            <input type="email" name="email"
                class="form-control"
                placeholder="Email address" required="">
        </div>
          
        <div class="form-group">
            <input type="text" name="enteryourquery"
                class="form-control"
                placeholder="Enter your query" required="">
        </div>
          
        <input type="submit" name="x" class="x" value="Submit"> 
        <input type="submit" name="back" class="back" value="Back">  
        
    </form>
<?php
    include_once "database/connect.php";
    

    if(isset($_POST['x'])){
        $name= $_POST['name'];
		$email = $_POST['email'];
		$enteryourquery = $_POST['enteryourquery'];

        $conn = mysqli_connect($servername, $username, $password, $dbname);
		$insert_user = "INSERT INTO Query (Name,EmailAddress,EnterYourQuery) VALUES ('$name','$email','$enteryourquery')";
        


        //verifying the user ID
        $read_DB = "SELECT * FROM user_details WHERE UserEmail='$email' AND UserFullName='$name'";
        $result = mysqli_query($conn, $read_DB);
        if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				//Compare string to check entered password and database record. Case sensitive.
				if (strcmp($email, $row['UserEmail']) == 0) { 
    				session_start();
					
					$message="Recieved";
					echo "<script type='text/javascript'>alert('$message');</script>";
					$result_insert_event = mysqli_query($conn, $insert_user);
					} 
				else { 
    				$message="Not recieved,Invalid email";
					echo "<script type='text/javascript'>alert('$message');</script>";
				} 
			}
		}
		else{
			$message="Invalid Email";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}

    
    }

?>

</body>
</html>