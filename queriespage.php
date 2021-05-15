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
		
			text-align:center;
			padding-top: 10px;
			padding-left: 20px;
			padding-right: 20px;
			background-color: #FFF5EE;
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
		div{
			margin: auto;
			border-radius: 12px;
			min-width: 50%;
			max-width: 80%;
			background-color: #FFF5EE;
		}
	</style>

</head>
<body background="image\lo.jpg">
	
		<p class=s style="padding-top: 30px; text-decoration: underline; font-size: 30px;font-weight: 900;text-align:center">Queries Page</p>
    <div id="view" align="center">	
    <table align="left" cellpadding="6px" cellspacing="6px">
        <tr>
				<th>No.</th>
				
				<th>Queries</th>
                
				
				
			</tr>
			<!--Get all booking record of hte user-->
			<?php
				
				$count=0;
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				//Read user booking detail
				$read_user_booking = "SELECT EnterYourQuery FROM Query ";
				$result_read_user_booking = mysqli_query($conn, $read_user_booking);
				if ($result_read_user_booking){
					while($row = mysqli_fetch_array($result_read_user_booking, MYSQLI_ASSOC)){
						//$eid=$row['EventID'];
						$count=$count+1;
						echo "<tr>";
						echo "<td>".$count."</td>";
                        echo "<td>".$row['EnterYourQuery']."</td>";
						//echo"<tr>";
                        //echo "<td><button class='reply' value='reply '></button></td>";
                        //echo "<td><input value=' '></td>";
                        //echo "<option value='".$row[VenueName]."'>".$row[VenueName]."</option>";
						//echo"</tr>";
						echo "</tr>";
					}
				}
                
			?>
	</table>	
	</div>
</body>
</html>