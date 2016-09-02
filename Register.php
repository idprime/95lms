<?php

session_start();


if (isset($_SESSION['pageControl'])) {
header('Location: home.php');
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
  
	<script src="dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
  
  <link rel="stylesheet" type="text/css" href="styleBGslide.css" />
  <link rel="stylesheet" type="text/css" href="style.css">
    <script language="javascript" type="text/javascript" src="script.js"></script>
</head>
<body>
<!--Include Nav of the Site-->
<?php include "navigation.php"; ?>

<div class="container" id="regForm">

<h1>Sign up for a new account</h1>
<p>It`s what all the cool kids are doing nowadays.</p>

<form method="post" action="insertUserData.php" name="createUsers" onsubmit="return validateRegisterForm()">
<div class="form-group">
     <label>Nic Number</label>
      <input type="text" class="form-control input-lg" name="nic" maxlength="10"/>
    </div>
	<div class="form-group">
     <label>E-mail Address</label>
      <input type="email" class="form-control input-lg" name="email"/>
    </div>
	<div class="form-group">
     <label>First Name</label>
      <input type="text" class="form-control input-lg" name="fName"/>
    </div>
	<div class="form-group">
     <label>Last Name</label>
      <input type="text" class="form-control input-lg" name="lName"/>
    </div>
	<div class="form-group">
     <label>Contact Number</label>
      <input type="text" class="form-control input-lg" name="contact" maxlength="10"/>
    </div>
	<div class="form-group">
     <label>Password</label>
      <input type="password" class="form-control input-lg" name="pwd"/>
    </div>
	<div class="checkbox">
	<label class="fCheck"><input type="checkbox" name="term">I agree with <a href=#>terms and conditions.</a></label>
	</div><input type="submit" class="btn btn-default" value="Sign Up"/>
   

 <p><?php

 //display register okay or not
$response=$_REQUEST['id'];

	
	if($response=="dublicate"){
		
		echo "NIC,Email or Contact Number already in use.Please use different Inputs";
	}
	if($response=="no"){
		
		echo "There is a problem.please try again.!";
	}

	
	
	


?></p>

</form>


</div>

	<!--Include footer of the Site-->
	<?php include "footer.php"; ?>

</body>
</html>

