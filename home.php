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


<!--BG slide-->
<ul class="cb-slideshow">
            <li><span>Image 01</span><div></div></li>
            <li><span>Image 02</span><div></div></li>
            <li><span>Image 03</span><div></div></li>
            <li><span>Image 04</span><div></div></li>
            <li><span>Image 05</span><div></div></li>
            <li><span>Image 06</span><div></div></li>
        </ul>



<div class="container">

<div class="row homePaF">
<div class="col-md-4">
<b class="text-uppercase">School of Computing</b>
<hr>
<ul>

<li><a href="catSelectModules.php?name=socomputing&id=Year 0">Year 0</a></li>
<li><a href="catSelectModules.php?name=socomputing&id=Year 1">Year 1</a></li>
<li><a href="catSelectModules.php?name=socomputing&id=Year 2">Year 2</a></li>
<li><a href="catSelectModules.php?name=socomputing&id=Year 3">Year 3</a></li>
<li><a href="catSelectModules.php?name=socomputing&id=Year 4">Year 4</a></li>
<li><a href="catSelectModules.php?name=socomputing&id=PGD">PGD</a></li>
</ul></div>

<div class="col-md-4">
<b class="text-uppercase">School of Management</b>	
<hr>
<ul>
<li><a href="catSelectModules.php?name=somanagement&id=PGD">PGD</a></li>
<li><a href="catSelectModules.php?name=somanagement&id=UCD">UCD</a></li>
<li><a href="catSelectModules.php?name=somanagement&id=UGC">UGC</a></li>
<li><a href="catSelectModules.php?name=somanagement&id=Foundation">Foundation</a></li>
<li><a href="catSelectModules.php?name=somanagement&id=Plymouth">Plymouth</a></li>
</ul></div>

<div class="col-md-4">
<b class="text-uppercase">School of Engineering</b>
<hr>
<ul>
<li><a href="catSelectModules.php?name=soengineering&id=Year 0">Year 0</a></li>
<li><a href="catSelectModules.php?name=soengineering&id=Year 1">Year 1</a></li>
<li><a href="catSelectModules.php?name=soengineering&id=Year 2">Year 2</a></li>
<li><a href="catSelectModules.php?name=soengineering&id=Year 3">Year 3</a></li>
</ul></div>
</div>



</div>



</body>
</html>

