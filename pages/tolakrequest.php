<?php
require_once('./class/class.request.php'); 	
require_once('./class/class.buku.php'); 	

if(isset($_GET['reqid'])){	
	$objRequest = new Request(); 
	$objRequest->reqid = $_GET['reqid'];	
	$objRequest->UpdateTolakRequest();

	echo "<script> alert('$objRequest->message'); </script>";
	echo "<script>window.location = 'dashboardadmin.php?p=requestedlist'</script>";					
} 
else{		
	echo '<script>window.history.back()</script>';	
}
?>

