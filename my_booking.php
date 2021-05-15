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
			padding-left: 10px;
			padding-right: 10px;
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
			border-radius: 12px;
		}
		div{
			margin: auto;
			padding-bottom: 5px;
			min-width: 50%;
			max-width: 90%;
			background-color: #FFF5EE;
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
								$(document).ready(function(){
									$(".query").click(function(){
									  window.location="query.php";
									});
								});
								$(document).ready(function(){
									$(".feedback").click(function(){
									  window.location="feedback.php";
									});
								});
								$(document).ready(function(){
									$(".join").click(function(){
									  window.location="my_booking.php";
									  alert("Ticket has been successfully purchased");
									});
								});
								$(document).ready(function(){
									$(".pay").click(function(){
									
									  window.location="pay1.php";
									});
								});
								</script>

</head>
<body background="image\lo.jpg">
	<div id="view" align="center">
		<p style="padding-top: 30px; text-decoration: underline; font-size: 30px;font-weight: 900">My Booking</p>
		<hr>
		<table align="center" cellpadding="6px" cellspacing="6px">
			<tr>
				<th>No.</th>
				<th>Booking<br>Date & Time</th>
				<th>Event Name</th>
				<th>Event Date</th>
				<th>Event Time</th>
				<th>Venue</th>
				<th>Lecturer</th>
				<th>Query</th>
				<th>Feedback</th>
				<th>Join</th>
				<th>Payment Status</th>

			</tr>
			<!--Get all booking record of hte user-->
			<?php
				
				$count=0;
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				//Read user booking detail
				$read_user_booking = "SELECT * FROM booking_details WHERE UserID='$uid'";
				$result_read_user_booking = mysqli_query($conn, $read_user_booking);
				if ($result_read_user_booking){
					while($row = mysqli_fetch_array($result_read_user_booking, MYSQLI_ASSOC)){
						$eid=$row['EventID'];
						$count=$count+1;
						echo "<tr>";
						echo "<td>".$count."</td>";
						echo "<td>".$row['BookingTimeStamp']."</td>";
						//Read event detail
						$read_event_detail = "SELECT * FROM event_details WHERE EventID='$eid'";
						$result_read_event_detail = mysqli_query($conn, $read_event_detail);
						if ($result_read_event_detail){
							while($row1 = mysqli_fetch_array($result_read_event_detail, MYSQLI_ASSOC)){
								$vid=$row1['VenueID'];
								echo "<td>".$row1['EventName']."</td>";
								echo "<td>".$row1['EventDate']."</td>";
								echo "<td>".$row1['EventTime']."</td>";

								//Read venue detail
								$read_venue_detail = "SELECT * FROM venue_details WHERE VenueID='$vid'";
								$result_read_venue_detail = mysqli_query($conn, $read_venue_detail);
								if ($result_read_event_detail){
									while($row2 = mysqli_fetch_array($result_read_venue_detail, MYSQLI_ASSOC)){
										echo "<td>".$row2['VenueName']."</td>";
									}
								}
								echo "<td>".$row1['GuestID']."</td>";
								echo "<td style='text-align:center'><input type='submit' name='query' class='query' value='Query'/></td>";
								echo "<td style='text-align:center'><input type='submit' name='feedback' class='feedback' value='Feedback'/></td>";
								if ($row1['EventTicketPrice']==0){
									echo "<td style='text-align:center'><input type='submit' name='join' class='join' value='Join event'/></td>";
								}
								else{
								echo "<td style='text-align:center'><input type='submit' name='pay' class='pay' value='Pay and join'/></td>";
								}
								$read_payment="SELECT * FROM booking_details WHERE EventID='$eid' AND UserID='$uid'";
								$result_read_payment_detail = mysqli_query($conn, $read_payment);
								if ($result_read_payment_detail){
									while($row3 = mysqli_fetch_array($result_read_payment_detail, MYSQLI_ASSOC)){
										echo "<td>".$row3['pay_status']."</td>";
									}
								}

								
									
            
        							

								
								

								
							}
						}
						
						echo "</tr>";
					}
				}
			?>
		</table>
	</div>
</body>
</html>