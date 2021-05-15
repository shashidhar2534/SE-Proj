<?php
    session_start();
    include_once "database/connect.php";
    

    if(isset($_POST['x'])){
        $name= $_POST['name'];
		$amount1= $_POST['enteryourquery'];
		$userid= $_SESSION['UserID'];

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        $checking="SELECT * FROM event_details WHERE EventName='$name' AND EventTicketPrice='$amount1' ";
        $result = mysqli_query($conn, $checking);
		if($result){
        
        $x="SELECT EventID from event_details where EventName='$name'";
       
        $result_x = mysqli_query($conn, $x); 
         
        
        while($row = mysqli_fetch_array($result_x)) {
            $y= $row['EventID']; 
            
        }
        $v="SELECT pay_status FROM booking_details WHERE EventID='$y' and UserID='$userid'";
        $result_v = mysqli_query($conn, $v); 
         
        
        while($row = mysqli_fetch_array($result_v)) {
            $st= $row['pay_status']; 
            
        }
        if($st=='No'){
            $insert_booking = "UPDATE  booking_details SET pay_status='Yes' where EventID='$y' and UserID='$userid'";
            $result_insert_booking = mysqli_query($conn, $insert_booking);
            $message="Payment done";
            echo "<script type='text/javascript'>alert('$message');</script>";
            

        }
        else{
            $message="Payment already done";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }

        

        
        
       

       
       // $insert_booking = "UPDATE  booking_details SET pay_status='Yes' where EventID='$y' ";
		//$result_insert_booking = mysqli_query($conn, $insert_booking);
                    

        }
        else{
            $message="Login ";
            echo "<script type='text/javascript'>alert('$message');</script>";
           
        }
    
    }

?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    
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
.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;

}
input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
  border-radius: 12px;
}

label {
  margin-bottom: 10px;
  display: block;
  border-radius: 12px;
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
		<h1>Payment</h1>
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
                placeholder=" Event Name" required="">
        </div>
          
        <div class="form-group">
            <input type="text" name="enteryourquery"
                class="form-control"
                placeholder="Amount" required="">
        </div>
        <h3>Payment</h3>
        <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="Aparna">
            <br></br>
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <br></br>
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="March">
            <br></br>
            
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2024">
            
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="123">
            
       
        <input type="submit" name="x" class="x" value="Submit"> 
        <input type="submit" name="back" class="back" value="Back">  
        
    </form>


</body>
</html>