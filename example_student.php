<?php
include 'session.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$uid=$_SESSION['UserID'];
include 'Calendar.php';

include_once "database/connect.php";
$calendar01 = new Calendar('2021-01-02');
$calendar02 = new Calendar('2021-02-02');
$calendar03 = new Calendar('2021-03-02');
$calendar04 = new Calendar('2021-04-02');
$calendar05 = new Calendar('2021-05-02');
$calendar06 = new Calendar('2021-06-02');
$calendar07 = new Calendar('2021-07-02');
$calendar08 = new Calendar('2021-08-02');
$calendar09 = new Calendar('2021-09-02');
$calendar10 = new Calendar('2021-10-02');
$calendar11 = new Calendar('2021-11-02');
$calendar12 = new Calendar('2021-12-02');

$conn = mysqli_connect($servername, $username, $password, $dbname);

$check = "SELECT * FROM booking_details WHERE UserID='$uid' ";
$result1 = mysqli_query($conn, $check);
while($row1 = mysqli_fetch_array($result1)){
	$id=$row1['EventID'];
	echo $id;
}
$checking="SELECT * FROM event_details WHERE EventID='$id' ";
$result = mysqli_query($conn, $checking);

while($row = mysqli_fetch_array($result)){
        $eventname=$row['EventName'];
        $eventday=$row['EventDate'];
        $calendar01->add_event($eventname, $eventday, 1, 'green');
        $calendar02->add_event($eventname, $eventday, 1, 'green');
        $calendar03->add_event($eventname, $eventday, 1, 'green');
        $calendar04->add_event($eventname, $eventday, 1, 'green');
        $calendar05->add_event($eventname, $eventday, 1, 'green');
        $calendar06->add_event($eventname, $eventday, 1, 'green');
        $calendar07->add_event($eventname, $eventday, 1, 'green');
        $calendar08->add_event($eventname, $eventday, 1, 'green');
        $calendar09->add_event($eventname, $eventday, 1, 'green');
        $calendar10->add_event($eventname, $eventday, 1, 'green');
        $calendar11->add_event($eventname, $eventday, 1, 'green');
        $calendar12->add_event($eventname, $eventday, 1, 'green');
       

}



?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Event Calendar</title>
		
		<link href="calendar.css" rel="stylesheet" type="text/css">
        <style>
        * {
    box-sizing: border-box;
    font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
    font-size: 16px;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
body {
    background-color: #FFFFFF;
    margin: 0;
}
.navtop {
    background-color: #3b4656;
    height: 60px;
    width: 100%;
    border: 0;
}
.navtop div {
    display: flex;
    margin: 0 auto;
    width: 800px;
    height: 100%;
}
.navtop div h1, .navtop div a {
    display: inline-flex;
    align-items: center;
}
.navtop div h1 {
    flex: 1;
    font-size: 24px;
    padding: 0;
    margin: 0;
    color: #ebedee;
    font-weight: normal;
}
.navtop div a {
    padding: 0 20px;
    text-decoration: none;
    color: #c4c8cc;
    font-weight: bold;
}
.navtop div a i {
    padding: 2px 8px 0 0;
}
.navtop div a:hover {
    color: #ebedee;
}
.content {
    width: 800px;
    margin: 0 auto;
}
.content h2 {
    margin: 0;
    padding: 25px 0;
    font-size: 22px;
    border-bottom: 1px solid #ebebeb;
    color: #666666;
}
        </style>
	</head>
	<body>
	    <nav class="navtop">
	    	<div>
	    		<h1>Event Calendar</h1>
	    	</div>
	    </nav>
		<div class="content home">
			<?=$calendar01?>
            <?=$calendar02?>
            <?=$calendar03?>
            <?=$calendar04?>
            <?=$calendar05?>
            <?=$calendar06?>
            <?=$calendar07?>
            <?=$calendar08?>
            <?=$calendar09?>
            <?=$calendar10?>
            <?=$calendar11?>
            <?=$calendar12?>
        
		</div>
	</body>
</html>