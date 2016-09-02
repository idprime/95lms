

<div id="myCarousel" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

   <div class="carousel-inner" role="listbox">
    
	<?php
	//include database info
	include 'databaseInfo.php';
	
	
	
		
	
	$today=date("Y-m-d");
	$sql="SELECT name,news,imagePath FROM updatedetails WHERE date>='$today' LIMIT 4";
	$result=$conn->query($sql);
	$active="active";
	while($row=$result->fetch_assoc()){
	$name=$row['name'];
	$imagePath=$row['imagePath'];
	$news=$row['news'];
		echo "<div class='item $active'>";
		echo "<img src='$imagePath'>";
		echo "<div class='carousel-caption'>";
        echo "<h3>$name</h3>";
        echo "<p>$news</p></div></div>";
		$active=null;
	}
	
	
	
	
	?>
	<!--<div id="myCarousel" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

   <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="Images/Event Home/mainslides/1.jpg" >
	  <div class="carousel-caption">
        <h3>YarnWire 2016 Music Party</h3>
        <p>Putting the Fun Back in Your Fundraising Event.</p>
      </div>
    </div>

    <div class="item">
      <img src="Images/Event Home/mainslides/2.jpg" >
	  <div class="carousel-caption">
        <h3>Golden Apple Gala</h3>
        <p>Putting the Fun Back in Your Fundraising Event.</p>
      </div>
    </div>

    <div class="item">
      <img src="Images/Event Home/mainslides/3.jpg" >
	  <div class="carousel-caption">
        <h3>The Ultimate Picnic</h3>
        <p>Putting the Fun Back in Your Fundraising Event.</p>
      </div>
    </div>

    <div class="item">
      <img src="Images/Event Home/mainslides/4.jpg" >
	  <div class="carousel-caption">
        <h3>Gathering in the Gardens</h3>
        <p>Putting the Fun Back in Your Fundraising Event.</p>
      </div>
    </div>
  </div>
  
  

</div> -->

  </div>
  
  

</div>