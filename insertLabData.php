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


//to get batch ID
$batch = $_REQUEST["batch"];
$sql0="SELECT idbatch FROM batch WHERE batch='$batch'";
$result0=$conn->query($sql0);
$row0=$result0->fetch_assoc();
$batch=$row0['idbatch'];

$groupNumber = $_REQUEST["groupNumber"];

//to get module ID
$mName=$_REQUEST['mName'];
$sql="SELECT idcourses FROM courses WHERE moduleName='$mName'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$mName=$row['idcourses'];



//to get hall ID
$labNumber = $_REQUEST["labNumber"];
$sql1="SELECT idhalls FROM halls WHERE hall='$labNumber'";
$result1=$conn->query($sql1);
$row1=$result1->fetch_assoc();
$labNumber=$row1['idhalls'];



$date=$_REQUEST["date"];
$sTime=$_REQUEST["sTime"];
$eTime=$_REQUEST["eTime"];

$sql = "INSERT INTO facultylaballocation (batch_idbatch, groupNumber,date,sTime,eTime,courses_idcourses,halls_idhalls) VALUES ('$batch', '$groupNumber','$date', '$sTime','$eTime','$mName','$labNumber')";

if (mysqli_query($conn, $sql)) {
   //echo "New record created successfully";
   header('Location: adminPanel.php?id=okayLab&name=Sessions');
} else {
  //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	header('Location: adminPanel.php?id=noLab&name=Sessions');
}
mysqli_close($conn);

?>
</body>

</html>
