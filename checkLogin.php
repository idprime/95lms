<?php
session_start();

//include database info
include 'databaseInfo.php';
	
$email = $_REQUEST["email"];
$pwd = $_REQUEST["pwd"];

$sql = "SELECT fName,email,password FROM user WHERE email='$email' and password='$pwd'";
$result=$conn->query($sql);
$row = $result->fetch_assoc();









	if ($result->num_rows >= 1) {
   

	//to set username top of the page
	$_SESSION["pageControl"]=$row["fName"];
	
	//echo "<br>home.php";
	header('Location: home.php');
	
	
} else {
	
	if($email=="alfalogin@gmail.com" && $pwd=="alfa12345"){
	
		$_SESSION["pageControl"]="Admin";
		
		header('Location: adminPanel.php');
		//echo "adminPanel.php";
		 
	}else{
	 // echo "0 results";
   header('Location: index.php?pl=no');	
		//echo "<br>index.php";
	}
mysqli_close($conn);
	
	
} 
	
	
	




	
	



?>