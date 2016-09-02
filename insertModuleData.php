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


$moduleCode = $_REQUEST["mcode"];
$moduleName = $_REQUEST["mname"];
$description = $_REQUEST["description"];


$sql0="SELECT idcourses FROM courses WHERE moduleCode='$moduleCode' and moduleName='$moduleName'";
$result0=$conn->query($sql0);
$row0 = $result0->fetch_assoc();
$idcourses= $row0['idcourses'];




//uplaod file
$target_dir = "uploads/Notes/";
$target_file = $target_dir . basename($_FILES["uploadImg"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


// Check if file already exists
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
	header('Location: adminPanel.php?uploadP=exitst&name=Modules');
    $uploadOk = 0;
}



$fileName=basename( $_FILES["uploadImg"]["name"]); 

//include description to courses.(Update query)
if($description!="" || $description!=null){
	
	$sql = "UPDATE courses SET description='$description' WHERE idcourses=$idcourses";
    $result=mysqli_query($conn, $sql);
	echo "set";
	
}



$sql = "INSERT INTO uploadnotes (fileName, filePath, fileType,courses_idcourses) VALUES ('$fileName', '$target_file', '$imageFileType',$idcourses)";





if (mysqli_query($conn, $sql) && move_uploaded_file($_FILES["uploadImg"]["tmp_name"], $target_file)) {
  // echo "New record created successfully";
   header('Location: adminPanel.php?id=okay&name=Modules');
} else {
  //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	
	header('Location: adminPanel.php?id=no&name=Modules');
}
mysqli_close($conn);


?>
</body>

</html>
