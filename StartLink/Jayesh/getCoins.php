<?php
	session_start();
	include '../Himanshu/connect.php';
	$company_id=$_SESSION['company_id'];
	$query="SELECT coins FROM premium_user WHERE premium_id='$company_id'";
	$sql=mysqli_query($con,$query);
	$row=$sql->fetch_assoc();
	$coins=$row['coins'];
	echo $coins;
?>