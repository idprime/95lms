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
<!--Include Nav of the Site-->
<?php include "navigation.php"; 
//include database info
include 'databaseInfo.php';
?>


<div class="container">



	<div class="row">
	<br></br>
<h1>Faculty Allocation | <span style="font-size:19px; color:#a0a0a0;">Examination Schedule</span></h1>
	<hr>
	
	<div class="col-md-12 setBorderR">
	<table class="table table-responsive" style="margin-top:30px;">
<tr>
<th>Date</th><th>Time</th><th>Programme</th><th>Module</th>
</tr>
<?php
$today=date("Y-m-d");
$sql="SELECT * FROM examinationtime WHERE date>='$today'";
$result=$conn->query($sql);

while($row=$result->fetch_assoc()){
	$date=$row['date'];
	$time=$row['sTime']."-".$row['eTime'];
	$idbatch=$row['batch_idbatch'];
	
	
	//To get module name
	$module=$row["courses_idcourses"];
	$sql2="SELECT moduleName,degreeProgramm_iddegreeProgramm FROM courses WHERE idcourses=$module";
	$result2=$conn->query($sql2);
	$row2=$result2->fetch_assoc();
	$module=$row2["moduleName"];
	$iddegreeProgramm=$row2["degreeProgramm_iddegreeProgramm"];
	
	
	//select degreeProgramm name
	$sql0="SELECT degreeProgramm FROM degreeProgramm WHERE iddegreeProgramm=$iddegreeProgramm";
	$result0=$conn->query($sql0);
	$row0=$result0->fetch_assoc();
	$degreeProgramm=$row0['degreeProgramm'];
	
	//select batch name
	$sql1="SELECT batch FROM batch WHERE idbatch=$idbatch";
	$result1=$conn->query($sql1);
	$row1=$result1->fetch_assoc();
	$idbatch=$row1['batch'];
	
	
	
	
	
	echo "<tr><td>$date</td><td>$time</td><td>$degreeProgramm - $idbatch</td><td>$module</td></tr>";
	
}


?>



</table>
	
	</div>
	</div>
	

</div>

	<!--Include footer of the Site-->
	<?php include "footer.php"; ?>

</body>
</html>

