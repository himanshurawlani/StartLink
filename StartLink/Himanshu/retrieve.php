<?php
session_start();

include 'connect.php';
$user=$_SESSION['user'];
$sql="SELECT * FROM company WHERE company_id=$user";
$retval=mysqli_query($con,$sql);
$row=$retval->fetch_assoc();

$company_id=$row["company_id"];
$company_name=$row["company_name"];
$email_id=$row["email_id"];
$password=$row["password"];
$phone=$row["phone"];
$description=$row["description"];
$address=$row["address"];
$product=$row["product"];
$country=$row["country"];
$premium=$row["isPremium"];

?>