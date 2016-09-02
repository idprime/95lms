<?php
session_start();

if ($_SESSION['pageControl']!="Admin") {
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
//include database info
include 'databaseInfo.php';

?>






<div class="container">
<!--Side Nav-->
<div class="row">
<nav class="col-md-1 EDnav" id="myScrollspy">
<ul class="nav nav-pills nav-stacked">
<li><hr></li>
<li><a href="#Modules">Upload Modules</a></li>

<li><a href="#Hall">Manage Lecture Hall</a></li>
<li><a href="#Sessions">Manage Lab Sessions</a></li>
<li><a href="#Examination">Manage Examination</a></li>
</ul></nav>
<div class="col-md-11">
<h1 style="text-align:left;">Admin Panel</h1>
<hr>

<?php 

$sql="SELECT nic FROM user";
$result=$conn->query($sql);
$num_rows=$result->num_rows;

?>
<div class='panel panel-info'><div class='panel-body'><p>Total Users : <span><?php echo $num_rows;?></span></p></div></div>
<!--create module sections-->

<h3 class="navHead" id="Modules">Upload Module</h3>
<p>you can create modify remove or anything with this modules</p>
<hr>

<form method="post" enctype="multipart/form-data" action="insertModuleData.php" name="createModules" onsubmit="return validateModuleForm()">
<div class="form-group">
     <label>Module Code</label>
      <input type="text" class="form-control input-lg" name="mcode"/>
    </div>
	<div class="form-group">
     <label>Module Name</label>
      <input type="text" class="form-control input-lg" name="mname"/>
    </div>
	 <div class="form-group">
	 <label>Description</label>
	  <textarea name="description" class="form-control input-lg"></textarea>
    </div>
    
    <input type="file" class="form-control" name="uploadImg"/>
    <input type="submit" class="btn btn-default" value="Create">
  <p><?php

$response=$_REQUEST['id'];
if($response=="okay"){
	echo "New module created successfully";}
	
	if($response=="no"){
		
		echo "Cant insert module.There is some problem.please try again.!";
	}


?></p>
	 <p>
	 <?php

$response=$_REQUEST['uploadP'];

	
	if($response=="exitst"){
		
		echo "Sorry, file already exists.!";
	}
	
	if($response=="notupload"){
		
		echo "Sorry, your file was not uploaded.";
	}
	
	if($response=="upload"){
		
		echo "File has been uploaded!";
	}


?></p>


</form>





<!--Manage Lecture Halls sections-->

<br><br><br>
<hr><h3 class="navHead" id="Hall">Manage Lecture Hall</h3>
<p>you can create modify remove or anything with this Halls</p>
<hr>

<form method="post" action="insertHallData.php" name="createHall" onsubmit="return validateHallForm()">
<div class="form-group">
      <label>Batch</label>
      <select name="batch" class="form-control input-lg">
	 <?php
	 
	 $sql0="SELECT batch FROM batch";
	 $result0=$conn->query($sql0);
	 
	 while($row0 = $result0->fetch_assoc()){
	 $batch=$row0['batch'];
		 echo "<option>$batch</option>";
	 }
	 
	 
	 
	 ?>
	 </select>
    </div>
	<div class="form-group">
     <label>Module Name</label>
      <input type="text" class="form-control input-lg" name="mName"/>
    </div>
	<div class="form-group">
     <label>Hall Number</label>
	 <select name="hallNumber" class="form-control input-lg">
	 <?php
	 
	 $sql0="SELECT hall FROM halls WHERE status='free'";
	 $result0=$conn->query($sql0);
	 
	 while($row0 = $result0->fetch_assoc()){
	 $hall=$row0['hall'];
		 echo "<option>$hall</option>";
	 }
	 
	 
	 
	 ?>
	 </select>
	 
    </div>
	<div class="form-group">
     <label>Date</label>
	 <input type="date" class="form-control input-lg" name="date"/>
	 
    </div>
	<div class="form-group">
     <label>Start Time</label>
	 <input type="time" class="form-control input-lg" name="sTime"/>
	 </div>
	 <div class="form-group">
     <label>End Time</label>
	 <input type="time" class="form-control input-lg" name="eTime"/>
	 </div>
	
    <input type="submit" class="btn btn-default" value="Create"/>
  <p><?php

$response=$_REQUEST['id'];
if($response=="okayHall"){
	echo "Hall reserved successfully";}
	
	if($response=="noHall"){
		
		echo "Cant reserved hall.There is a problem.please try again.!";
	}


?></p></form>





<!--Manage Lab sections-->

<br><br><br>
<hr><h3 class="navHead" id="Sessions">Manage Lab Sessions</h3>
<p>you can create modify remove or anything with this LAB</p>
<hr>

<form method="post" action="insertLabData.php" name="createLab" onsubmit="return validateLabForm()">
<div class="form-group">
     <label>Batch</label>
      <select name="batch" class="form-control input-lg">
	 <?php
	 
	 $sql0="SELECT batch FROM batch";
	 $result0=$conn->query($sql0);
	 
	 while($row0 = $result0->fetch_assoc()){
	 $batch=$row0['batch'];
		 echo "<option>$batch</option>";
	 }
	 
	 
	 
	 ?>
	 </select>
    </div>
	<div class="form-group">
     <label>Group Number</label>
      <input type="text" class="form-control input-lg" name="groupNumber"/>
    </div>
	
	<div class="form-group">
     <label>Module Name</label>
      <input type="text" class="form-control input-lg" name="mName"/>
    </div>
	<div class="form-group">
     <label>Lab</label>
	 <select name="labNumber" class="form-control input-lg">
	 <?php
	 
	 $sql0="SELECT hall FROM halls WHERE status='free'";
	 $result0=$conn->query($sql0);
	 
	 while($row0 = $result0->fetch_assoc()){
	 $hall=$row0['hall'];
		 echo "<option>$hall</option>";
	 }
	 
	 
	 
	 ?></select>
	 
    </div>
	<div class="form-group">
     <label>Date</label>
	 <input type="date" class="form-control input-lg" name="date"/>
	 
    </div>
	<div class="form-group">
     <label>Start Time</label>
	 <input type="time" class="form-control input-lg" name="sTime"/>
	 </div>
	 <div class="form-group">
     <label>End Time</label>
	 <input type="time" class="form-control input-lg" name="eTime"/>
	 </div>
    <input type="submit" class="btn btn-default" value="Create"/>
  <p><?php

$response=$_REQUEST['id'];
if($response=="okayLab"){
	echo "Hall reserved successfully";}
	
	if($response=="noLab"){
		
		echo "Cant reserved Lab.There is a problem.please try again.!";
	}


?></p></form>







<!--Manage Examination sections-->
<br><br><br>
<hr><h3 class="navHead" id="Examination">Examination Management</h3>
<p>you can create modify remove or anything with this Examination</p>
<hr>

<form method="post" action="insertExamData.php" name="createExam" onsubmit="return validateExamForm()">
<div class="form-group">
     <label>Batch</label>
      <select name="batch" class="form-control input-lg">
	 <?php
	 
	 $sql0="SELECT batch FROM batch";
	 $result0=$conn->query($sql0);
	 
	 while($row0 = $result0->fetch_assoc()){
	 $batch=$row0['batch'];
		 echo "<option>$batch</option>";
	 }
	 
	 
	 
	 ?>
	 </select>
    </div>
	
	<div class="form-group">
     <label>Module Name</label>
         <select name="mName" class="form-control input-lg">
	 <?php
	 
	 $sql0="SELECT moduleName FROM courses";
	 $result0=$conn->query($sql0);
	 
	 while($row0 = $result0->fetch_assoc()){
	 $moduleName=$row0['moduleName'];
		 echo "<option>$moduleName</option>";
	 }
	 
	 
	 
	 ?></select>
    </div>
	<div class="form-group">
     <label>Date</label>
	 <input type="date" class="form-control input-lg" name="date"/>
	 
    </div>
	<div class="form-group">
     <label>Start Time</label>
	 <input type="time" class="form-control input-lg" name="sTime"/>
	 </div>
	 <div class="form-group">
     <label>End Time</label>
	 <input type="time" class="form-control input-lg" name="eTime"/>
	 </div>
    <input type="submit" class="btn btn-default" value="Create"/>
  <p><?php

$response=$_REQUEST['id'];
if($response=="okayExam"){
	echo "Exam reserved successfully";}
	
	if($response=="noExam"){
		
		echo "Cant reserved Exam.There is a problem.please try again.!";
	}


?></p></form>


</div>

</div>

</div>
	<!--Include footer of the Site-->
	<?php include "footer.php"; ?>
	
	
</body>
</html>

