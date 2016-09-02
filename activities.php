<!DOCTYPE html>
<html lang="en">
<head>
  <title>95 Learning Management System </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="styleBGslide.css" />
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bgImage">
<!--Include Nav of the Site-->
<?php include "navigation.php";
include 'carousel.html';
//include database info
include 'databaseInfo.php';
?>




<br><br><br>
<div class="container setBorder">


<h2>UPCOMING</h2>
<table class="table table-responsive">
<?php
$today=date("Y-m-d");
$sql="SELECT idupdateDetails,date,name,time,venue FROM updatedetails WHERE date>='$today' LIMIT 5";
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
		 
		 
	echo "<tr><td><h4>$month<br>$day</h4></td><td><a class='setOrngColor2' href='eventDetails.php?id=$id'><h4>$subTitle</h4>$dayName $time</a></td><td><h4>$venue</h4></td></tr>";
	 }
}else{
	
	echo "No Data";
}

?>
</table>
</div>

<!--Societies-->
<br><br><br>
<div class="container setBorder"><h1>Societies</h1>
<div class="form-group">
      <input type="text" class="form-control" placeholder="cant find? hit me here...">
    </div>

<div class="row">
<?php
$sql="SELECT * FROM activitynames WHERE activityType_idactivityType=1";
$result=$conn->query($sql);

while($row=$result->fetch_assoc()){
	
	$logoPath=$row['logoPath'];
	$name=$row['name'];
	$description=$row['description'];
	$id=$row['idactivities'];
	echo "<div class='col-md-4'>";
	echo "<a href='activityDetails.php?id=$id'><img class='img-responsive img-thumbnail setRad' src='$logoPath' width='400px'></a>";
	echo "<h4 class='text-center'>$name</h4>";
	echo "<p class='text-center' style='padding:0px 15px;'>$description</P>";
	echo "</div>";
}?>
</div>




<!--clubs-->
<br><br>
<h1>Clubs</h1>
<hr>
<div class="row">
<?php
$sql="SELECT * FROM activitynames WHERE activityType_idactivityType=2";
$result=$conn->query($sql);

	
	while($row=$result->fetch_assoc()){
	
	
	
	$logoPath=$row['logoPath'];
	$name=$row['name'];
	$description=$row['description'];
	$id=$row['idactivities'];
	echo "<div class='col-md-4'>";
	echo "<a href='activityDetails.php?id=$id'><img class='img-responsive img-thumbnail setRad' src='$logoPath' width='400px'></a>";
	echo "<h4 class='text-center'>$name</h4>";
	echo "<p class='text-center' style='padding:0px 15px;'>$description</P>";
	echo "</div>";
}
	


?>
</div>
<!--student Parties-->
<br><br>
<h1>Parties</h1>
<hr>
<div class="row">
<?php
$sql="SELECT * FROM activitynames WHERE activityType_idactivityType=4";
$result=$conn->query($sql);

while($row=$result->fetch_assoc()){
	
	$logoPath=$row['logoPath'];
	$name=$row['name'];
	$description=$row['description'];
	$id=$row['idactivities'];
	echo "<div class='col-md-4'>";
	echo "<a href='activityDetails.php?id=$id'><img class='img-responsive img-thumbnail setRad' src='$logoPath' width='400px'></a>";
	echo "<h4 class='text-center'>$name</h4>";
	echo "<p class='text-center' style='padding:0px 15px;'>$description</P>";
	echo "</div>";
}?>
</div>




<!--student activities-->
<br><br>
<h1>Activities</h1>
<hr>
<div class="row">
<?php
$sql="SELECT * FROM activitynames WHERE activityType_idactivityType=3";
$result=$conn->query($sql);

while($row=$result->fetch_assoc()){
	
	$logoPath=$row['logoPath'];
	$name=$row['name'];
	$description=$row['description'];
	$id=$row['idactivities'];
	echo "<div class='col-md-4'>";
	echo "<a href='activityDetails.php?id=$id'><img class='img-responsive img-thumbnail setRad' src='$logoPath' width='400px'></a>";
	echo "<h4 class='text-center'>$name</h4>";
	echo "<p class='text-center' style='padding:0px 15px;'>$description</P>";
	echo "</div>";
}?>
</div>

</div>



	<!--Include footer of the Site-->
	<?php include "footer.php"; ?>


</body>
</html>

