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

$date=$_REQUEST["date"];
$sTime=$_REQUEST["sTime"];
$eTime=$_REQUEST["eTime"];

//to get module ID
$mName=$_REQUEST['mName'];
$sql="SELECT idcourses FROM courses WHERE moduleName='$mName'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$mName=$row['idcourses'];


//to get batch ID
$batch = $_REQUEST["batch"];
$sql0="SELECT idbatch FROM batch WHERE batch='$batch'";
$result0=$conn->query($sql0);
$row0=$result0->fetch_assoc();
$batch=$row0['idbatch'];


//to get hall ID
$hallNumber = $_REQUEST["hallNumber"];
$sql1="SELECT idhalls FROM halls WHERE hall='$hallNumber'";
$result1=$conn->query($sql1);
$row1=$result1->fetch_assoc();
$hallNumber=$row1['idhalls'];


$sql = "INSERT INTO facultyhallallocation (date,sTime,eTime, courses_idcourses, batch_idbatch, halls_idhalls) VALUES ('$date','$sTime','$eTime', $mName, $batch,$hallNumber)";

if (mysqli_query($conn, $sql)) {
    //echo "New record created successfully";
   header('Location: adminPanel.php?id=okayHall&name=Hall');
} else {
   //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	header('Location: adminPanel.php?id=noHall&name=Hall');
}
mysqli_close($conn); 

?>
</body>

</html>
