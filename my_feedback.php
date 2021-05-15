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
	<title> Feedback</title>
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
			background-color: white;
			border-style: none;
			border-bottom: 2px solid #66CDAA;
			border-top: 2px solid #66CDAA;
			border-right: 2px solid #66CDAA;
			border-left: 2px solid #66CDAA;
			border-radius: 12px;
			
		}
		div{
			margin: auto;
			padding-bottom: 5px;
			min-width: 50%;
			max-width: 60%;
			background-color: #FFF5EE;
			border-radius: 12px;
			
		}
		
	</style>
</head>
<body background="image\lo.jpg">
	<div id="view" align="center">
		<p style="padding-top: 30px; text-decoration: underline; font-size: 30px;font-weight: 900">Feedback</p>
		
		<table align="center" cellpadding="6px" cellspacing="6px">
			<tr>
				<th>No.</th>
				
				<th>Given by</th>
				<th>Subject</th>
				<th>Rating</th>
				<th>Feedback</th>
				
			</tr>
			<!--Get all booking record of hte user-->
			<?php
				
				$count=0;
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				//Read user booking detail
				$read_user_booking = "SELECT * FROM feedback ";
				$result_read_user_booking = mysqli_query($conn, $read_user_booking);
				if ($result_read_user_booking){
					while($row = mysqli_fetch_array($result_read_user_booking, MYSQLI_ASSOC)){
						//$eid=$row['EventID'];
						$count=$count+1;
						echo "<tr>";
						echo "<td>".$count."</td>";
                        echo "<td>".$row['Name']."</td>";
                        echo "<td>".$row['Subject']."</td>";
                        echo "<td>".$row['Rating']."</td>";
                        echo "<td>".$row['FeedBack']."</td>";

                        
						
						//Read event detail
						
						echo "</tr>";
					}
				}
			?>
		</table>
	</div>
</body>
</html>