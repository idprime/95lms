<?php
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
  
  
	<script src="dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
  
  
  <link rel="stylesheet" type="text/css" href="styleBGslide.css" />
  <link rel="stylesheet" type="text/css" href="style.css">
      <script type="text/javascript" src="script.js"></script>
</head>


<?php
//set bookmark autoload
$ancLog=$_REQUEST['name'];

?>


<body onload='location.href="#<?php echo $ancLog;?>"'>
<!--Include Nav of the Site-->
<?php include "navigation.php";
include "carousel.php";

?>






<!--Body of the Page-->
<div class="container">
<div class="row">
<div class="col-md-12"><br><br><br>
<h4>You can Create/Manage Events.for Manage you need to create event first</h4>
<h3 class="navHead" id="CEvents">Create Events</h3>
<p>you can create modify remove or anything with this Events</p>
<hr>

<form method="post" action="createEvent.php" name="createEvent" onsubmit="return validateCEventForm()">
   <div class="form-group">
	  <label>Event Type</label>
      <select class="form-control input-lg" name="eType">
	  <?php
		$sql="SELECT name FROM activitytype";
		$result=$conn->query($sql);
	 
	 while($row = $result->fetch_assoc()){
	 $name=$row['name'];
		 echo "<option>$name</option>";
	 }
	 
	  ?>
	  
	  </select>
   </div>
      <div class="form-group">
	  <label>Name</label>
      <input type="text" class="form-control input-lg" name="name"/>
   </div>
	 <div class="form-group">
     <label>Description</label>
      <textarea class="form-control input-lg" name="description"></textarea>
   </div>
  
	 <input type="submit" class="btn btn-default" value="Create"/>
	 
    
    
  <p><?php

$response=$_REQUEST['id'];
if($response=="okayCEvent"){
	echo "Event Created successfully";}
	
	if($response=="noCEvent"){
		
		echo "Cant create Event.There is a problem.please try again.!";
	}


?></p><br><br><br><br><br><br><br>


</form>




<!--Manage Events-->
<hr><h3 class="navHead" id="Events">Manage Events</h3>
<p>you can create modify remove or anything with this Events</p>
<hr>

<form method="post" enctype="multipart/form-data" action="insertEvent.php" name="reserveEvent" onsubmit="return validateEventForm()">
	   <div class="form-group">
	  <label>Event Name</label>
        <select name="eName" class="form-control input-lg">
	  <?php
	 
	 $sql0="SELECT name FROM activitynames";
	 $result0=$conn->query($sql0);
	 
	 while($row0 = $result0->fetch_assoc()){
	 $name=$row0['name'];
		 echo "<option>$name</option>";
	 }
	 
	 
	 
	  ?></select>
   </div>
   <div class="form-group">
	  <label>Sub-title</label>
      <input type="text" class="form-control input-lg" name="subTitle"/>
   </div>
   
	 <div class="form-group">
     <label>Description</label>
      <textarea class="form-control input-lg" name="description"></textarea>
   </div>
     <div class="form-group">
	  <label>Venue</label>
      <input type="text" class="form-control input-lg" name="venue"/>
   </div>
    <div class="form-group">
	  <label>Date</label>
      <input type="date" class="form-control input-lg" name="date"/>
   </div>
    <div class="form-group">
    <label>Time</label>
	 <input type="time" class="form-control input-lg" name="time"/><br>
	 </div>
   <div class="form-group">
	  <label>Price</label>
      <input type="number" class="form-control input-lg" name="price"/>
   </div>
   <div class="form-group">
	  <label>Contact</label>
      <input type="number" class="form-control input-lg" name="contact"/>
   </div>
	
	
	 <hr>
     
	
	 <label>Speaker 01</label>
      <input type="text" class="input-lg" name="speaker1"/>
	  
	  <label>Speaker 02</label>
      <input type="text" class="input-lg" name="speaker2"/>
    
	 <label>Speaker 03</label>
      <input type="text" class="input-lg" name="speaker3"/>
	
	    <hr>
		
	 
	 <label>Sponser 01</label>
      <input type="text" class="input-lg" name="sponser1"/>
	  
	  <label>Sponser 02</label>
      <input type="text" class="input-lg" name="sponser2"/>
	
	 <hr>
	 <input type="file" name="fileToUpload"/><br>
	 <input type="submit" class="btn btn-default" value="Create"/>
	 
    
    
  <p><?php

$response=$_REQUEST['id'];
if($response=="okayEvent"){
	echo "Event reserved successfully";}
	
	if($response=="noEvent"){
		echo "Cant reserved Event.There is a problem.please try again.!";}
		
		if($response=="wrongRes"){
	echo "Only Accept 1920x594 image resolution";}
	
		if($response=="exitst"){
	echo "Image file Already Exist";}


?></p></form>

</div>

</div>
</div>
</div>
	<!--Include footer of the Site-->
	<?php include "footer.php"; ?>





</body>
</html>

