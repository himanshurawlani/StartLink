<?php 
	include '../Himanshu/connect.php';
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	
	$query = "insert into contact(name,email,subject) values('$name','$email','$subject')";
	$sql = mysqli_query($con,$query);
	
	echo "Success";
?>