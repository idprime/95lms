<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php

//can`t add auto redirect seesion.coz no one login before register.(No sessons create)
	
//include database info
include 'databaseInfo.php';


$nic = $_REQUEST["nic"];
$email = $_REQUEST["email"];
$fName = $_REQUEST["fName"];
$lName = $_REQUEST["lName"];
$contact = $_REQUEST["contact"];
$pwd = $_REQUEST["pwd"];

if($nic!="" || $email!="" || $fName!="" || $lName!="" || $contact!="" || $pwd!=""){
	

$sql = "SELECT contact,nic,email FROM user WHERE nic='$nic' or email='$email' or contact='$contact'";
$result=$conn->query($sql);

if($result->num_rows>=1){
	
	
	header('Location: Register.php?id=dublicate');
	
}else{
	
	
	
$date = date('Y-m-d');
$sql = "INSERT INTO user (nic, email, fName, lName,password,contact,date,status) VALUES ('$nic', '$email', '$fName','$lName','$pwd','$contact','$date','bita')";

	if (mysqli_query($conn, $sql)) {
		
		//echo "New record created successfully";
		header('Location: index.php?pl=success');
} 	else {
		//echo  "Error: " . $sql . "<br>" . mysqli_error($conn);
		header('Location: Register.php?id=no');
}

		mysqli_close($conn); 
	
}
 
}

else{
		header("Location:Register.php");
	
}


	





?>
</body>

</html>
