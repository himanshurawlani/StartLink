<?php
include 'connect.php';

// XSS Validation
$company_name=$email_id=$password=$repassword=$phone=$description=$address=$product=$country=$isPremium="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$company_name=test_input($_POST["company_name"]);
	$email_id=test_input($_POST["email_id"]);
	$password=test_input($_POST["password"]);
	$repassword=test_input($_POST["repassword"]);
	$phone=test_input($_POST["phone"]);
	$description=test_input($_POST["description"]);
	$address=test_input($_POST["address"]);
	$product=test_input($_POST["product"]);
	$country=test_input($_POST["country"]);
	$isPremium=test_input($_POST["isPremium"]);
}	
function test_input($data) 
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$sql="INSERT INTO company(company_name,email_id,password,phone,description,address,product,country,isPremium) 
VALUES('$company_name','$email_id','$password','$phone','$description','$address','$product','$country','$isPremium')";
$query=mysqli_query($con,$sql);
/*if($query)
{
	echo "<br>Insertion Successful!";
}	
else 
{
	echo "<br>Not inserted!";
}*/

$sel="SELECT * FROM company WHERE company_name='$company_name'";
$retval=mysqli_query($con,$sel);
$row=$retval->fetch_assoc();
$company_id=$row["company_id"];

if($isPremium=="YES" or $isPremium=="yes")
{
	$sql1="INSERT INTO premium_user(premium_id) VALUES($company_id)";
	$query1=mysqli_query($con,$sql1);
	/*if($query1)
		echo "</br>Premium user inserted!";
	else
		echo "</br>Premium user not inserted!";*/
}

header('Location:homepage.php');

?>
