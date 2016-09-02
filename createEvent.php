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

//select eventType
	$eventType = $_REQUEST["eType"];
	$sql="SELECT idactivityType FROM activitytype WHERE name='$eventType'";
	$result=$conn->query($sql);
	$row=$result->fetch_assoc();
	$eventType=$row['idactivityType'];


$name = $_REQUEST["name"];
$description = $_REQUEST["description"];

$sql0="INSERT INTO activitynames(name,description,activityType_idactivityType) VALUES ('$name','$description','$eventType')";
if (mysqli_query($conn, $sql0)) {
	//echo "New record created successfully";
    header('Location: eventHome.php?id=okayCEvent&name=CEvents');
} else {
	//echo "Error: " . $sql0 . "<br>" . mysqli_error($conn);
	header('Location: eventHome.php?id=noCEvent&name=CEvents');
}
mysqli_close($conn);

?>
</body>

</html>
