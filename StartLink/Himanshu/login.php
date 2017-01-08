<?php
include 'connect.php';

//XSS Validation
$email_id=$password="";
//if($_SERVER["REQUEST_METHOD"]=="POST")
//{
	$email_id=test_input($_POST['login_email']);
	$password=test_input($_POST['login_password']);
//}

function test_input($data) 
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$query1="SELECT * FROM company WHERE password='$password' and email_id='$email_id';";
$sql1=mysqli_query($con,$query1);
$row_count=mysqli_num_rows($sql1);
$row=$sql1->fetch_assoc();

$company_id=$row["company_id"];
$company_name=$row["company_name"];
$email=$row["email_id"];
$phone=$row["phone"];
$description=$row["description"];
$address=$row["address"];
$product=$row["product"];
$country=$row["country"];
$isPremium=$row["isPremium"];

$data="";
if($row_count==0)
	{
		$data = "Invalid Credentials";
		//echo "<script>window.location.href='homepage.php'</script>";
	}
else
{
	$data = "Successfull Login";
	session_start();
	$_SESSION["company_id"]="$company_id";
	$_SESSION["company_name"]="$company_name";
	$_SESSION["email_id"]="$email";
	$_SESSION["phone"]="$phone";
	$_SESSION["description"]="$description";
	$_SESSION["address"]="$address";
	$_SESSION["product"]="$product";
	$_SESSION["country"]="$country";
	$_SESSION["isPremium"]="$isPremium";
	if($isPremium=="YES")
	{
		$query2="SELECT * FROM premium_user WHERE premium_id='$company_id';";
		$sql2=mysqli_query($con,$query2);
		$row=$sql2->fetch_assoc();
		$coins=$row["coins"];
		$_SESSION['coins_old']="$coins";
	}
	//echo "<script>window.location.href='homepage.php'</script>";
}
	

echo $data;

?>