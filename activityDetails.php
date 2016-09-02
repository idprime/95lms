<!DOCTYPE html>
<html>
<head>
<title>95 Learning Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="styleBGslide.css" />
  <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="script.js"></script>
</head>
<body >
<?php
include "navigation.php"; 
//include database info
include 'carousel.html';
include 'databaseInfo.php';


?>



<div class="container">
<h2>UPCOMING</h2>
<table class="table table-responsive">
<?php
$today=date("Y-m-d");
$activityId=$_REQUEST['id'];
$sql="SELECT idupdateDetails,date,name,time,venue FROM updatedetails WHERE activityNames_idactivities=$activityId and date>='$today'";
$result=$conn->query($sql);
	 
	 
if($result->num_rows > 0){
	 while($row = $result->fetch_assoc()){
		 $subTitle=$row['name'];
		 
		 $date=strtotime($row['date']);
		 $month=date("M",$date);
		 $day=date("d",$date);
		 $dayName=date("D",$date);
		 $time=$row['time'];
		 $venue=$row['venue'];
		 $id=$row['idupdateDetails'];
		 
		 
	echo "<tr><td><h4>$month<br>$day</h4></td><td><a href='eventDetails.php?id=$id'><h4>$subTitle</h4>$dayName $time</a></td><td><h4>$venue</h4></td></tr>";
	 }
}else{
	
	echo "No Data";
}

?>
</table>

<h2>PAST</h2>
<table class="table table-responsive">
<?php
$today=date("Y-m-d");
$activityId=$_REQUEST['id'];
$sql="SELECT idupdateDetails,date,name,time,venue FROM updatedetails WHERE activityNames_idactivities=$activityId and date<'$today'";
$result=$conn->query($sql);
	 
	 
if($result->num_rows > 0){
	 while($row = $result->fetch_assoc()){
		 $subTitle=$row['name'];
		 
		 $date=strtotime($row['date']);
		 $month=date("M",$date);
		 $day=date("d",$date);
		 $dayName=date("D",$date);
		 $time=$row['time'];
		 $venue=$row['venue'];
		 $id=$row['idupdateDetails'];
		 
		 
	echo "<tr><td><h4>$month<br>$day</h4></td><td><a href='eventDetails.php?id=$id&name=expire'><h4>$subTitle</h4>$dayName $time</a></td><td><h4>$venue</h4></td></tr>";
	 }
}else{
	
	echo "No Data";
}

?>
</table>



</div>

	<!--Include footer of the Site-->
	<?php include "footer.php"; ?>
</body>
</html>