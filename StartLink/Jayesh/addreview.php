<?php 
	/*$conn = mysql_connect('localhost','root','');
	if(!$conn){
		die("could not establish connection  " . mysql_error());
	}
	mysql_select_db('startlink');*/
	include '../Himanshu/connect.php';
	session_start();
	$cname = $_POST['desc'];
	$title = $_POST['review_title'];
	$description = $_POST['review_description']; 
	$from = $_POST['startup'];
	$cmpid=$_SESSION['company_id'];
	$query="INSERT INTO reviews(reviewing_startup,review_startup,review_title,review_description,company_id) VALUES ('$from','$cname','$title',
	'$description','$cmpid')";

	$retval = mysqli_query($con,$query);

	echo "<script>window.location.href='startup_profile - other.php?desc=$cname'</script>";
?>