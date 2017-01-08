<?php
$curr_company = $_GET['desc'];
$_SESSION['other_company_name']="$curr_company";

include '../Himanshu/connect.php';

$query = "select * from company where company_name='$curr_company'";

$sql1 = mysqli_query($con,$query);
$row = $sql1->fetch_assoc();

$_SESSION['other_email_id'] = $row['email_id'];
$_SESSION['other_phone'] = $row['phone'];
$_SESSION['other_description'] = $row['description'];
$_SESSION['other_address'] = $row['address'];
$_SESSION['other_product'] = $row['product'];
$_SESSION['other_country'] = $row['country'];
$_SESSION['other_isPremium'] = $row['isPremium'];

?>