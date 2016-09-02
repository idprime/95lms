<?php

$getCookie=$_COOKIE['user'];
if(isset($getCookie)){
	
	$_SESSION["pageControl"]=$getCookie;
	
	
	
}else if(!isset($_SESSION['pageControl'])){
	
	header('Location: index.php?pl=error');
	
}





?>