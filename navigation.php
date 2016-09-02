<?php

session_start();
?>

<!--Navigation bar-->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid ">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><span id="fHeader">95<strong id="fHeader2">LMS</strong></span></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

	
	<ul class="nav navbar-nav">
         <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">CATEGORIES<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="dcom"><a href="#" class="dropdown-toggle" data-toggle="dropdown">School of Computing</a>
			<ul class="dropdown-computing">
            <li><a href="catSelectModules.php?name=socomputing&id=Year 0">Year 0</a></li>
			<li><a href="catSelectModules.php?name=socomputing&id=Year 1">Year 1</a></li>
			<li><a href="catSelectModules.php?name=socomputing&id=Year 2">Year 2</a></li>
			<li><a href="catSelectModules.php?name=socomputing&id=Year 3">Year 3</a></li>
			<li><a href="catSelectModules.php?name=socomputing&id=Year 4">Year 4</a></li>
			<li><a href="catSelectModules.php?name=socomputing&id=PGD">PGD</a></li>
            
            
          </ul>
			
			</li>
            <li class="dman"><a class="dropdown-toggle" data-toggle="dropdown" href="#">School of Management</a>
			<ul class="dropdown-management">
            <li><a href="catSelectModules.php?name=somanagement&id=PGD">PGD</a></li>
            <li><a href="catSelectModules.php?name=somanagement&id=UCD">UCD</a></li>
			<li><a href="catSelectModules.php?name=somanagement&id=UGC">UGC</a></li>
            <li><a href="catSelectModules.php?name=somanagement&id=Foundation">Foundation</a></li>
			<li><a href="catSelectModules.php?name=somanagement&id=Plymouth">Plymouth</a></li>
      
            
          </ul></li>
            <li class="deng"><a class="dropdown-toggle" data-toggle="dropdown" href="#">School of Engineering</a>
			<ul class="dropdown-engineering" style="padding-bottom:70px;">
           <li><a href="catSelectModules.php?name=soengineering&id=Year 0">Year 0</a></li>
			<li><a href="catSelectModules.php?name=soengineering&id=Year 1">Year 1</a></li>
			<li><a href="catSelectModules.php?name=soengineering&id=Year 2">Year 2</a></li>
			<li><a href="catSelectModules.php?name=soengineering&id=Year 3">Year 3</a></li>
            
          </ul>
			</li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">FACULTY ALLOCATION<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="dcom"><a href="hallReservation.php?name=School of Computing">School of Computing</a>
			
			
			</li>
            <li class="dman"><a href="hallReservation.php?name=School of Management">School of Management</a>
			</li>
            <li class="deng"><a href="hallReservation.php?name=School of Engineering">School of Engineering</a>
			
			</li>
			<li><a href="#">library Information</a></li>
			<li><a href="examination.php">Examination Time</a></li>
          </ul>
        </li>
        <li><a href="activities.php">ACTIVITIES</a></li>
        <li><a href="eventHome.php">TAKE EVENTS</a></li>
		<li><a href="about.php">ABOUT US</a></li>
      </ul>
     
	
      <ul class="nav navbar-nav navbar-right">
        
			<?php
			
			
		if($_SESSION["pageControl"]=="Admin"){
		?> <li><a href="adminPanel.php" style="color:#f6cd3f;"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li> <?php
		
		}
		
		?>
		
		<li>
		
		
		
		<a href=""><span class="glyphicon glyphicon-user"></span> 
		<?php
		if(!isset($_SESSION["pageControl"])){
			
			echo "User";
		}else{
			
			echo "Hi ".$_SESSION["pageControl"];
		}
		
		?>
		
		</a></li>
        <li>
		<?php
			
			
		if(!isset($_SESSION["pageControl"]) && $_SESSION["pageControl"]!="Admin"){
			
			?><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li><?php
		}else{
			
			?> <li><a href="logOut.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li> <?php
		} ?>
		
		
		
		
       
      </ul>
    </div>
  </div>
</nav>



