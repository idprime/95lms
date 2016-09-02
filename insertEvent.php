<?php

session_start();



if (!isset($_SESSION['pageControl'])) {
header('Location: index.php?pl=error');
}

?>


<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
//include database info
include 'databaseInfo.php';


//uplaod file
$target_dir = "uploads/Slides/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

$image_info = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
$image_width = $image_info[0];
$image_height = $image_info[1];

echo $image_width."br";
echo $image_height;

if($image_width==1920 && $image_height==594){
	
	
	// Check if file already exists
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
	header('Location: eventHome.php?id=exitst');
    $uploadOk = 0;
}
	
	

//select eventId
	$eventId = $_REQUEST["eName"];
	$sql0="SELECT idactivities FROM activitynames WHERE name='$eventId'";
	$result0=$conn->query($sql0);
	$row0=$result0->fetch_assoc();
	$eventId=$row0['idactivities'];


$subTitle = $_REQUEST["subTitle"];
$description = $_REQUEST["description"];
$venue = $_REQUEST["venue"];
$date = $_REQUEST["date"];
$time = $_REQUEST["time"];
$price = $_REQUEST["price"];
$contact = $_REQUEST["contact"];


$speaker1 = $_REQUEST["speaker1"];
$speaker2 = $_REQUEST["speaker2"];
$speaker3 = $_REQUEST["speaker3"];


$sponser1 = $_REQUEST["sponser1"];
$sponser2 = $_REQUEST["sponser2"];

$sql = "INSERT INTO updatedetails (name,venue,date,news,contact,price,speaker1,speaker2,speaker3,sponser1,sponser2,time,imagePath,activityNames_idactivities) VALUES ('$subTitle', '$venue','$date','$description','$contact','$price','$speaker1','$speaker2','$speaker3','$sponser1','$sponser2','$time','$target_file',$eventId)";

if (mysqli_query($conn, $sql) && move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	//echo "New record created successfully";
  header('Location: eventHome.php?id=okayEvent&name=Events');
} else {
	//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	header('Location: eventHome.php?id=noEvent&name=Events');
}
mysqli_close($conn);
	
	
}else{
	
	header('Location: eventHome.php?id=wrongRes&name=Events');
	
}




?>
</body>

</html>
