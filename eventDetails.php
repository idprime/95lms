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
   <script type="text/javascript" src="script.js"></script>
</head>
<body >
<!--Include Nav of the Site-->
<?php
include "navigation.php";
//include database info
include 'databaseInfo.php';
?>

<div class="container">
<div class="row">
<nav class="col-md-1 EDnav" id="myScrollspy">
<ul class="nav nav-pills nav-stacked">

<?php
$idupdateDetails=$_REQUEST['id'];
//To Remove Speakers
$sql="SELECT * FROM updatedetails WHERE idupdateDetails=$idupdateDetails";
$result=$conn->query($sql);
$row=$result->fetch_assoc();


$showSpk="NotShow";
$showSch="NotShow";
$showSpon="NotShow";

$speaker1=$row['speaker1'];
$speaker2=$row['speaker2'];
$speaker3=$row['speaker3'];



//To get activity name
	$activityName=$row['activityNames_idactivities'];
	$sql2="SELECT name FROM activitynames WHERE idactivities=$activityName";
	$result2=$conn->query($sql2);
	$row2=$result2->fetch_assoc();
	$activityName=$row2["name"];


if($speaker1!=null || $speaker2!=null || $speaker3!=null){
	echo "<li><a href='#speakers'>Speakers</a></li>";
	//to show speaker section
	$showSpk="Show";
	
	}
	
//To Remove Schedule
$sql0="SELECT startTime FROM eventschedule WHERE updateDetails_idupdateDetails=$idupdateDetails";
$result0=$conn->query($sql0);

if($result0->num_rows!=0){
echo "<li><a href='#Schedule'>Schedule</a></li>";
$showSch="Show";	
}

echo "<li><a href='#Venue'>Venue</a></li>";


//To Remove Sponsers
$sponser1=$row['sponser1'];
$sponser2=$row['sponser2'];

if($sponser1!=null || $sponser2 !=null){
	echo "<li><a href='#sponsers'>Sponsers</a></li>";
	$showSpon="Show";
	}
	
	
	echo "<li><a href='#contact'>Contact Us</a></li>";
	

?>
<li><a href="#GetTickets"><span>

<?php
if($row['price']==0){
	echo "Tickets! <span style='font-size:90%;' class='secondCScheme'>Its Free</span>";
	
}else{
	
	echo "Get Tickets!";
	
}

?></span></a></li>


</ul>
</nav>

</div>

<!--Speaker section-->
<?php

if($showSpk=="Show"){
	
//show time/subtitle of event in top

	 
		 $subTitle=$row['name'];
		 $date=strtotime($row['date']);
		 $month=date("M",$date);
		 $day=date("d",$date);
		 $dayName=date("D",$date);
		 $time=$row['time'];
		 $venue=$row['venue'];
		 $news=$row['news'];
		 
		 if($_REQUEST['name']=="expire"){
		$subTitle=$row['name']." <span class='bg-danger'>EVENT EXPIRED</span>";
			 
		 }
		 
		 
	echo "<div class='row setpadding'>";
	echo "<h3>$subTitle</h3>";
	echo "<h4>$month $day $dayName $time</h4>";
	echo "<h5>$news ( By $activityName )</h5>";
	echo "<h3 id='speakers' class='navHead text-uppercase'>Speakers</h3><hr/>";

	


if($row['speaker1']!=""){
echo "<div class='col-md-4'>";
echo "<a href='#' data-toggle='tooltip' title='$speaker1'><img class='img-responsive img-circle' src='Images/Event Home/speakers/1.png' width='204'></a>";
echo "</div>";}

if($row['speaker2']!=""){
echo "<div class='col-md-4'>";
//echo "<h4><strong>$speaker2</strong></h4>";
echo "<a href='#' data-toggle='tooltip' title='$speaker2'><img class='img-responsive' src='Images/Event Home/speakers/2.png' width='204'></a>";
echo "</div>";}	

if($row['speaker3']!=""){
echo "<div class='col-md-4'>";
//echo "<h4><strong>$speaker3</strong></h4>";
echo "<a href='#' data-toggle='tooltip' title='$speaker3'><img class='img-responsive' src='Images/Event Home/speakers/3.png' width='204'></a>";
echo "</div>";}




?>
</div>
<?php

}

?>

<!--Schedule section-->
<?php

if($showSch=="Show"){

?>
<div class="row setpadding setfont">
<h3 id="Schedule" class="navHead text-uppercase">Schedule</h3>
<hr>

<div class="col-md-6">
<p><strong>11.00am - 12.00pm</strong></p>
</div>

<div class="col-md-6">
<p><strong>Morning Workshop</strong></p>
<p>Bluminton convection center.</p>
</div>



<div class="col-md-6">
<p><strong>11.00am - 12.00pm</strong></p>
</div>

<div class="col-md-6">
<p><strong>Morning Workshop</strong></p>
<p>Bluminton convection center.</p>
</div>


<div class="col-md-6">
<p><strong>11.00am - 12.00pm</strong></p>
</div>

<div class="col-md-6">
<p><strong>Morning Workshop</strong></p>
<p>Bluminton convection center.</p>
</div>

<div class="col-md-6">
<p><strong>11.00am - 12.00pm</strong></p>
</div>

<div class="col-md-6">
<p><strong>Morning Workshop</strong></p>
<p>Bluminton convection center.</p>
</div>


<div class="col-md-6">
<p><strong>11.00am - 12.00pm</strong></p>
</div>

<div class="col-md-6">
<p><strong>Morning Workshop</strong></p>
<p>Bluminton convection center.</p>
</div>

<div class="col-md-6">
<p><strong>11.00am - 12.00pm</strong></p>
</div>

<div class="col-md-6">
<p><strong>Morning Workshop</strong></p>
<p>Bluminton convection center.</p>
</div>


<div class="col-md-6">
<p><strong>11.00am - 12.00pm</strong></p>
</div>

<div class="col-md-6">
<p><strong>Morning Workshop</strong></p>
<p>Bluminton convection center.</p>
</div></div>
<?php

}

?>


<!--Venue section-->
<div class="row setpadding">
<h3 id="Venue" class="navHead text-uppercase">Venue</h3>
<hr/>
<?php


echo "<div class='col-md-6'>";
echo "<h4><strong>$venue</strong></h4>";
echo "<p>The Combine features inspirational presentations from nationally renowned entrepreneurs and innovators</p></div>";


?>
</div>


<!--Sponsers section-->

<?php

if($showSpon=="Show"){

?>
<div class="row setpadding">
<h3 id="sponsers" class="navHead text-uppercase">Sponsers</h3>
<hr/>

<?php

if($sponser1!=""){
echo "<div class='col-md-2'>";
//echo "<h4><strong>$sponser1</strong></h4>";
echo "<a href='#' data-toggle='tooltip' title='$sponser1'><img class='img-responsive' src='Images/Event Home/sponsers/1.png' width='150'></a>";
echo "</div>";}

if($sponser2!=""){
echo "<div class='col-md-2'>";
//echo "<h4><strong>$sponser2</strong></h4>";
echo "<a href='#' data-toggle='tooltip' title='$sponser2'><img class='img-responsive' src='Images/Event Home/sponsers/2.png' width='150'></a>";
echo "</div>";}

?>
</div>
<?php

}

?>






<!--Contact section-->


<div class="row setpadding">
<h3 id="contact" class="navHead text-uppercase">Contact Us</h3>
<hr>

			<div class="col-md-12">
			<div class="form-group">
			<form method="post">
			<input class="form-control input-lg" type="text" name="name" placeholder="Your Name" /><br>
			<input class="form-control input-lg" type="email" name="email" placeholder="Your Email" /><br>
			<input class="form-control input-lg" type="subject" name="subject" placeholder="Your Subject" /><br>
			<textarea class="form-control input-lg" name="subject"></textarea><br>
			<input class="editBtn" type="submit" Value="Contact Us">
			
			</form>
			</div>
			
			</div>
			</div>
			
			
			<?php
			
	if($row['price']!=0){
	
	echo "<div class='row setpadding'>";
	echo "<div id='GetTickets' class='gettickets'><h1>Are you Ready?</h1>";
	echo "<a href='getTickets.php?id=$idupdateDetails'><button class='editBtn'>Get Tickets Now</button></a></div></div>";
}
			?>

</div>

</div>


	<!--Include footer of the Site-->
	<?php
	
	
	
	include "footer.php"; ?>




</body>
</html>

