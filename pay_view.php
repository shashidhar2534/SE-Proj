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

	//Read button script
	include "top_button.html";
?>

<!DOCTYPE html>
<html>
<head>
	<title> Payment details</title>
	<style type="text/css">
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
			border-radius: 12px;
		}
		table{
			max-width:1200px;
			margin-bottom:50px;
			margin-left:auto;
			margin-right:auto;
			background-color: white;
			text-align:center;
			border-radius: 12px;
		}
		th{
			background-color: #82CAFF;
			border:1px solid #66CDAA;
			font-size: 22px;
			text-align: center;
			padding-top: 10px ;
			padding-bottom: 10px ;
			border-radius: 12px;
		}
		td{
			
			font-size: 20px;
			font-family: Times New Roman;
			text-align: center;
			padding-top: 5px ;
			padding-bottom: 5px ;
			background-color: white;
			border-style: none;
			border-bottom: 2px solid #66CDAA;
			border-top: 2px solid #66CDAA;
			border-right: 2px solid #66CDAA;
			border-left: 2px solid #66CDAA;
			border-radius: 12px;
		}
		input[type=submit]{
			padding: 5px;
			color: black;
			border: none;
			background-color: #82CAFF;
			font-weight: 700;
			font-family: Times New Roman;
			font-size: 18px;
			text-align: center;
			width: 100px;
			border-radius: 12px;
		}
		input[type=submit]:hover{
			background-color: #2B65EC;
			border-radius: 12px;
		}
		div{
			margin: auto;
			padding-bottom: 1px;
			width: 80%;
			background-color: white;
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
	</style>
</head>
<body background="image\lo.jpg">

	<button onclick="topFunction()" id="myBtn" title="Go to top"></button>

	<!--Sort according to name in ascending/descending order-->
	<!--Sort according to UserID by default-->
	<div id="view" align="center">
		<br>
		<p><span style="text-decoration: underline;font-weight: 900;font-size: 30px">  Booking details </span></p>
		<hr>
		<form action="pay_view.php" method="POST" style="font-size: 20px;">
			Sort according to booking ID in: &nbsp;&nbsp;
			<input type="submit" name="ascending" value="Ascending">&nbsp;&nbsp;
			<input type="submit" name="descending" value="Descending">
		</form>
		<hr>
		<table align="center" cellpadding="20px" cellspacing="6px">
			<tr>
				<th>No.</th>
				<th>Booking ID</th>
				<th>Booking TimeStamp</th>
				<th>UserID</th>
				<th>EventID</th>
               
                
                <th>Payment status</th>
                <th>Event Name</th>
			</tr>
			<?php
				if (isset($_POST['ascending'])) {
					$count=0;
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					$read_user = "SELECT * FROM booking_details ORDER BY BookingID ASC";
					$result_read_user = mysqli_query($conn, $read_user);
					if(mysqli_num_rows($result_read_user)>0){
						while($row = mysqli_fetch_array($result_read_user, MYSQLI_ASSOC)){
							$count=$count+1;
							echo "<tr>";
							echo "<td>".$count."</td>";
							echo "<td>".$row['BookingID']."</td>";
							echo "<td>".$row['BookingTimeStamp']."</td>";
							echo "<td>".$row['UserID']."</td>";
							echo "<td>".$row['EventID']."</td>";
                            echo "<td>".$row['pay_status']."</td>";
                            $y=$row['EventID'];
                            $v="SELECT EventName FROM event_details WHERE EventID='$y'";
                            $result_v = mysqli_query($conn, $v); 
         
        
                             while($row_v = mysqli_fetch_array($result_v)) {
                                 $st= $row_v['EventName'];
                                 echo "<td>".$st."</td>"; 
                                 
            
                            }
							echo "<tr>";
						}
					}
				}
				else if (isset($_POST['descending'])) {
					$count=0;
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					$read_user = "SELECT * FROM booking_details ORDER BY BookingID DESC";
					$result_read_user = mysqli_query($conn, $read_user);
					if(mysqli_num_rows($result_read_user)>0){
						while($row = mysqli_fetch_array($result_read_user, MYSQLI_ASSOC)){
							$count=$count+1;
							echo "<tr>";
                            echo "<td>".$count."</td>";
							echo "<td>".$row['BookingID']."</td>";
							echo "<td>".$row['BookingTimeStamp']."</td>";
							echo "<td>".$row['UserID']."</td>";
							echo "<td>".$row['EventID']."</td>";
                            echo "<td>".$row['pay_status']."</td>";
                            $y=$row['EventID'];
                            $v="SELECT EventName FROM event_details WHERE EventID='$y'";
                            $result_v = mysqli_query($conn, $v); 
         
        
                             while($row_v = mysqli_fetch_array($result_v)) {
                                 $st= $row_v['EventName'];
                                 echo "<td>".$st."</td>"; 
                                 
            
                            }
							
							echo "<tr>";
						}
					}
				}
				else{
					$count=0;
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					$read_user = "SELECT * FROM booking_details ORDER BY EventID ASC";
					$result_read_user = mysqli_query($conn, $read_user);
					if(mysqli_num_rows($result_read_user)>0){
						while($row = mysqli_fetch_array($result_read_user, MYSQLI_ASSOC)){
							$count=$count+1;
							echo "<tr>";
							echo "<td>".$count."</td>";
							echo "<td>".$row['BookingID']."</td>";
							echo "<td>".$row['BookingTimeStamp']."</td>";
							echo "<td>".$row['UserID']."</td>";
							echo "<td>".$row['EventID']."</td>";
                            echo "<td>".$row['pay_status']."</td>";
                            $y=$row['EventID'];
                            $v="SELECT EventName FROM event_details WHERE EventID='$y'";
                            $result_v = mysqli_query($conn, $v); 
         
        
                             while($row_v = mysqli_fetch_array($result_v)) {
                                 $st= $row_v['EventName'];
                                 echo "<td>".$st."</td>"; 
                                 
            
                            }
                      
							echo "<tr>";
						}
					}
				}
			?>
		</table>
	</div>
</body>
</html>