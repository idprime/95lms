

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
<h2>
<?php

$facName=$_REQUEST['name'];
$searchByBatch=$_REQUEST['searchByBatch'];


//To get facultyID
	
	$sql="SELECT idfacultyName FROM facultyname WHERE name='$facName'";
	$result=$conn->query($sql);
	$row=$result->fetch_assoc();
	$facultyID=$row["idfacultyName"];
	$today=date("Y-m-d");

	
	$sql0="SELECT idcourses FROM courses WHERE facultyName_idfacultyName=$facultyID";
	$result0=$conn->query($sql0);


	$sql5="SELECT idbatch,batch FROM batch WHERE batch LIKE '%$searchByBatch%'";
	$result5=$conn->query($sql5);


	
	

	
	
	
	
	
	
	
	
	


 ?></h2>
	<div class="row">
	<br></br>
<h1>Faculty Allocation |<span style="font-size:19px; color:#a0a0a0;"><?php echo ' '.$facName;?></span></h1><hr>


	<hr>
	
	

	<h4 class="navHead">Search Result</h4>
	<div class="col-md-12 setBorderR">
	<h2>Lecture halls</h2>
	<table class="table table-responsive">
<tr>
<th>Batch</th><th>Module</th><th>Hall Number</th><th>Date</th><th>Time</th>
</tr>
<?php

	
	//check the batch matches
	while($row5=$result5->fetch_assoc()){
		$idbatch=$row5['idbatch'];
		$batch=$row5['batch'];
	
	       
	

	//check idcourses
	while($row0=$result0->fetch_assoc()){
		
	$idcourses=$row0['idcourses'];
	
	$sql1="SELECT * FROM facultyhallallocation WHERE courses_idcourses=$idcourses and date>='$today' and batch_idbatch=$idbatch";
	$result1=$conn->query($sql1);
	
	while($row1=$result1->fetch_assoc()){
		
	
	
	
	
	//To get module name
	$module=$row1["courses_idcourses"];
	$sql3="SELECT moduleName FROM courses WHERE idcourses=$module";
	$result3=$conn->query($sql3);
	$row3=$result3->fetch_assoc();
	$module=$row3["moduleName"];

	//To get hall name
	$hallNumber=$row1["halls_idhalls"];
	$sql4="SELECT hall FROM halls WHERE idhalls=$hallNumber";
	$result4=$conn->query($sql4);
	$row4=$result4->fetch_assoc();
	$hallNumber=$row4["hall"];
		
	$time=$row1["sTime"]."-".$row1["eTime"];
	$date=$row1["date"];
		
		echo "<tr><td>$batch</td><td>$module</td><td>$hallNumber</td><td>$date</td><td>$time</td>";}}}


?>

</table>
	
	</div>
	</div>
	
		<div class="row ">
		

	<h4 class="navHead"><?php echo $today; ?></h4>
	<div class="col-md-12 setBorderR">
	
	<h2>Lab Sessions</h2>
	<table class="table table-responsive">
<tr>
<th>Batch</th><th>Group Number</th><th>Module</th><th>Lab Number</th><th>Time</th>
</tr>
<?php

	

	
	$sql0="SELECT idcourses FROM courses WHERE facultyName_idfacultyName=$facultyID";
	$result0=$conn->query($sql0);


	$sql5="SELECT idbatch,batch FROM batch WHERE batch LIKE '%$searchByBatch%'";
	$result5=$conn->query($sql5);
	
	
	//check the batch matches
	while($row5=$result5->fetch_assoc()){
		
	$idbatch=$row5['idbatch'];
	$batch=$row5['batch'];
	    

	//check idcourses
	while($row0=$result0->fetch_assoc()){
		
		
		
		
	$idcourses=$row0['idcourses'];
	
	$sql1="SELECT * FROM facultylaballocation WHERE courses_idcourses=$idcourses and date>='$today' and batch_idbatch=$idbatch";
	$result1=$conn->query($sql1);
	
	
	
	
	while($row1=$result1->fetch_assoc()){
		
	
	
	$groupNumber=$row1['groupNumber'];
	
	//To get module name
	$module=$row1["courses_idcourses"];
	$sql3="SELECT moduleName FROM courses WHERE idcourses=$module";
	$result3=$conn->query($sql3);
	$row3=$result3->fetch_assoc();
	$module=$row3["moduleName"];

	//To get lab name
	$labNumber=$row1["halls_idhalls"];
	$sql4="SELECT hall FROM halls WHERE idhalls=$labNumber";
	$result4=$conn->query($sql4);
	$row4=$result4->fetch_assoc();
	$labNumber=$row4["hall"];
		
	$time=$row1["sTime"]."-".$row1["eTime"];
	$date=$row1["date"];
		
			echo "<tr><td>$batch</td><td>$groupNumber</td><td>$module</td><td>$labNumber</td><td>$time</td></tr>";
		
		
		
	}
	
	
	
	
	
	}
	
	
	
}
	
$conn->close();
?>


</table>
	
	</div>
	</div>
	
	
</div>

<!--Include footer of the Site-->
	<?php include "footer.php"; ?>

</body>
</html>

