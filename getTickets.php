<?php
// Start the session
session_start();



if (!isset($_SESSION['pageControl'])) {
header('Location: index.php?pl=error');
}

?>


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
<body>
<?php
include "navigation.php";
include 'databaseInfo.php';

$idupdateDetails=$_REQUEST['id'];
//To Remove Speakers
$sql="SELECT news,date,name,venue,time,price FROM updatedetails WHERE idupdateDetails=$idupdateDetails";
$result=$conn->query($sql);
$row=$result->fetch_assoc();



?>



<div class="container setBorderR">

<ul class="ticketsUL">
<li><a href="">Connect facebook to check who are going</a></li>
<li class="setFright"><a href=""><button class="greenSB">Buy Now</button></a></li>
<li><strong>| <?php echo $row['price'].' LKR';  ?></strong></li>
</ul>
<hr>
<h2>Why Attend <?php echo $row['name'];  ?></h2>
<p><?php echo $row['news'];?></p>


<h2>What WIll You Learn?</h2>
<ul>
<li>he duties of professionals who assist in commercial transactions</li>
<li>The key differences between commercial and residential real estate</li>
<li>Types of commercial real estate</li>
<li>Types of commercial transactions</li>
<li>Commercial contracts</li>
</ul>

<h2>When?</h2>
<p><?php

	 
		 $date=strtotime($row['date']);
		 $month=date("M",$date);
		 $day=date("d",$date);
		 $dayName=date("D",$date);
		 $year=date("Y",$date);
		 $time=$row['time'];
		 

echo "$dayName , $month $day , $year from $time onward"; 
?></p>

<h2>Where?</h2>
<p><?php echo $row['venue'];?></p>

</div>

	<!--Include footer of the Site-->
	<?php include "footer.php"; ?>

</body>
</html>

