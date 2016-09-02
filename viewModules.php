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
  
  <link rel="stylesheet" type="text/css" href="styleBGslide.css" />
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<!--Include Nav of the Site-->
<?php include "navigation.php"; ?>

<div class="container">

<h1><?php

//include database info
include 'databaseInfo.php';


//insert correct title for page
$getTitle=$_REQUEST["name"];
$getYear=$_REQUEST["id"];
$faculty;

if($getTitle=="socomputing"){
	echo "School of Computing | $getYear";
	$faculty="School of Computing";
	}
if($getTitle=="somanagement"){
	echo "School of Management | $getYear";
	$faculty="School of Management";
	}
if($getTitle=="soengineering"){
	echo "School of Engineering | $getYear";
	$faculty="School of Engineering";
	}

?></h1>
<br><br>



      
     
<?php

//to search modulecode ID
$code=$_REQUEST['id'];
$sql0="SELECT idcourses,description FROM courses WHERE moduleCode='$code'";
$result0=$conn->query($sql0);
$row0=$result0->fetch_assoc();
$selectID=$row0['idcourses'];
$description=$row0['description'];

if($description!="" || $description!=null){
	echo "<h2>Lecture Message</h2>";
	echo "<div class='panel panel-info'><div class='panel-body'><pre>$description</pre></div></div>";
	
}


?>
	<br><br><br>
<h2>TOPIC OUTLINE</h2>


<?php 

//to search modulecode ID
$code=$_REQUEST['id'];
$sql0="SELECT idcourses FROM courses WHERE moduleCode='$code'";
$result0=$conn->query($sql0);
$row0=$result0->fetch_assoc();
$selectID=$row0['idcourses'];


$sql="SELECT fileName,filePath,fileType FROM uploadnotes WHERE courses_idcourses=$selectID";
$result = $conn->query($sql);
$count=1;

if ($result->num_rows > 0) {
	
	?><table class="table table-responsive" style="margin-top:30px;"><?php
    while($row = $result->fetch_assoc()) {
        
		?><tr><td><a class="setOrngColor" target="_blank" href="<?php echo $row["filePath"];?>"><?php echo $count." |";
		
		
		if($row['fileType']=="docx"){
			
			?><img src="Images/uploadIcons/word.png" width="40px" height="40px"><?php
		}
		else if($row['fileType']=="pptx"){
			?><img src="Images/uploadIcons/ppoint.png" width="40px" height="40px"><?php
			
		}
		else{
			?><img src="Images/uploadIcons/other.png" width="40px" height="40px"><?php
			
		}
		
		
		
	
		
		echo " ".$row["fileName"];?></a></td></tr><?php
		$count++;
    }
} else {
    echo "0 results";
}
$conn->close();
?></table>





</div>

	<!--Include footer of the Site-->
	<?php include "footer.php"; ?>

</body>
</html>

