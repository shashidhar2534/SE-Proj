<?php
	//Connect database
	include "database/connect.php";

	//Read session
	include 'session.php';
	$uid=$_SESSION['UserID'];
	if($uid=='' || $uid==null){
		$message="Please login to continue";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("Refresh: 0, login_register.php");
	}
   
?>

<!DOCTYPE html>
<html>
<head>	
	<title> My Booking</title>
	<style type="text/css">
		a:hover{
			font-size: 24px;
		}
		a{
			color: black;
		}
        table{
			max-width: 1200px;
			margin-bottom:50px;
			margin-left:auto;
			margin-right:auto;
			background-color: #FFF5EE;
			text-align:center;
			padding-top: 10px;
			padding-left: 20px;
			padding-right: 20px;
			border-radius: 12px;
		}
		
	
		th{
			background-color: #82CAFF;
			border:1px solid #66CDAA;
			font-size: 20px;
			text-align: center;
			padding: 5px 10px;
			border-radius: 12px;
		}
		td{
			border:1px solid black;
			font-size: 18px;
			font-family: Times New Roman;
			padding: 5px 5px;
			border-style: none;
			border-bottom: 2px solid #66CDAA;
			border-top: 2px solid #66CDAA;
			border-right: 2px solid #66CDAA;
			border-left: 2px solid #66CDAA;
			background-color:white;
			border-radius: 12px;
		}
		}
		#view{
			margin: auto;
			border-radius: 12px;
			min-width: 50%;
			max-width: 80%;
			background-color: white;
		}
        
		input[type=submit]{
			padding: 10px 5px; 
			border-radius: 12px;
			color: black;
			border: none;
			background-color: #66CDAA;
			font-weight: 700;
			font-size: 18px;
			font-family: Times New Roman;
			text-align: center;
			width: 10%;
		}
		input[type=submit]:hover{
			background-color: #20B2AA;
			border-radius: 12px;
		}
		#mybutton {
  			position: fixed;
			bottom: 10px;
			border-radius: 12px;
  			right: -550px;
			min-width: 50%;
			max-width: 80%;
		
		}
		
      
       
	</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
								$(document).ready(function(){
									$(".back").click(function(){
									  window.location="index.php";
									});
								});
								
								</script>

</head>
<body background="image\lo.jpg">
	
		<p class=s style="padding-top: 30px; text-decoration: underline; font-size: 30px;font-weight: 900;text-align:center">Queries Page</p>
    <div id="view" align="center">	
    <table align="left" cellpadding="6px" cellspacing="6px">
        <tr>
				<th>No.</th>
				<th>Asked by</th>
				
				<th>Queries</th>

				<th>Answer</th>
				
                
				
				
			</tr>
			<!--Get all booking record of hte user-->
			<?php
				$x=0;
				$count=0;
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				//Read user booking detail
				$read_user_booking = "SELECT EnterYourQuery,Name FROM Query ";
				$result_read_user_booking = mysqli_query($conn, $read_user_booking);
				if ($result_read_user_booking){
					while($row = mysqli_fetch_array($result_read_user_booking, MYSQLI_ASSOC)){
						//$eid=$row['EventID'];
						$count=$count+1;
						echo "<tr>";
						echo "<td>".$count."</td>";
						echo "<td>".$row['Name']."</td>";
                        echo "<td>".$row['EnterYourQuery']."</td>";
						//echo"<tr>";
                       // 
					    //echo "<td><button class='reply' value='reply '></button></td>";
					    echo "<td><input value=' '></td>";
						
                       // $x="<td><input value=' '></td>";
						
						//$insert_event = "INSERT INTO Query (answer) VALUES ('$x')";
                        //echo "<option value='".$row[VenueName]."'>".$row[VenueName]."</option>";
						//echo"</tr>";
						echo "</tr>";
					}
				}

                
			?>
			

		</table>	
	
	</div>
	<div id="mybutton">
	<input type="submit" name="back" class="back" value="Back">
	</div>
</body>
</html>