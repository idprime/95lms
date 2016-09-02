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
   <script type="text/javascript" src="script.js"></script>
</head>
<body>
<!--Include Nav of the Site-->
<?php include "navigation.php"; ?>

<!--BG slide-->
<ul class="cb-slideshow">
            <li><span>Image 01</span><div></div></li>
            <li><span>Image 02</span><div></div></li>
            <li><span>Image 03</span><div></div></li>
            <li><span>Image 04</span><div></div></li>
            <li><span>Image 05</span><div></div></li>
            <li><span>Image 06</span><div></div></li>
        </ul>



<!--Form-->
  
 <div class="container" id="logDiv">
  
  <h2 style="font-size:50px;  text-shadow: 2px 2px 4px #000000;">Quality teaching succesfull students<br>Use it yourself.!</h2>
  <form method="post" name="logForm" action="checkLogin.php" onsubmit="return validateLoginForm()">
    <div class="form-group">
     <label class="sr-only" >Email address:</label>
      <input type="email" class="form-control input-lg" name="email" placeholder="Enter your email">
    </div>
    <div class="form-group">
      <label class="sr-only" >Password:</label>
      <input type="password" class="form-control input-lg" name="pwd" placeholder="Enter password">
    </div>
    <div class="checkbox">
     <!-- <label class="fCheck"><input type="checkbox" name="rememberMe"> Remember me</label> --></div><p><?php 
	  
	
	 
	  
	  
	  if($_REQUEST["pl"]=="error")
	  {echo "Please Login for Access";}
  
  if($_REQUEST["pl"]=="no")
	  {echo "Invalid Logins.Check again username and password";}
  
   if($_REQUEST["pl"]=="success")
	  {echo "Registered Successfully.! Please Login ";}
  
  
	  ?></p>
   
    <button type="submit" class="btn btn-default">Login</button>
    <a href="Register.php"><button type="button" class="btn btn-default">Register</button>
  </form>
</div>
</body>
</html>

