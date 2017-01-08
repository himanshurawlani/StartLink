<?php
session_start();
include '../Himanshu/connect.php';
$buyer_name=$seller_name=$amount="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	//$buyer_name=test_input($_POST['buyer_name']);
	$seller_name=test_input($_POST['seller_name']);
	$amount=test_input($_POST['amount']);
}

function test_input($data) 
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$status='';
$buyer_name = $_SESSION['company_name'];
$query="SELECT * FROM company WHERE company_name='$buyer_name';";
$sql=mysqli_query($con,$query);
$row_count=mysqli_num_rows($sql);
if($row_count==0)
{
	//echo "Company does not exist!";
	$status='Buyer Company does not exist!';
}
else
	{
		$row=$sql->fetch_assoc();
		$buyer_id=$row['company_id'];
		$query1="SELECT * FROM company WHERE company_name='$seller_name';";
		$sql1=mysqli_query($con,$query1);
		$row_count1=mysqli_num_rows($sql1);
		if($row_count1==0)
		{
			//echo "Seller Company does not exist!";
			$status='Seller Company does not exist!';
		}
		else
		{
			$row1=$sql1->fetch_assoc();
			$seller_id=$row1['company_id'];
			$query="INSERT INTO transaction(buyer_id,seller_id,amount) VALUES('$buyer_id','$seller_id','$amount');";
			$sql=mysqli_query($con,$query);
			/*if(!$sql)
			{
				//echo "Not inserted";
				$status = 'Not inserted';
			}
			else
			{*/
				//echo "Insertion successful";
				$status = 'Insertion successful';
				$query2="SELECT COUNT(buyer_id) AS buy_count FROM transaction WHERE buyer_id='$buyer_id';";
				$sql2=mysqli_query($con,$query2);
				$row2=$sql2->fetch_assoc();
				$count_buyer=$row2['buy_count'];
				$query3="UPDATE transaction SET count_buyer=$count_buyer WHERE buyer_id=$buyer_id";
				if($count_buyer>5)
					$query3="UPDATE transaction SET isValid=0 WHERE buyer_id=$buyer_id";
				$sql3=mysqli_query($con,$query3);
				/*if(!$sql3)
				{
					//echo "Not inserted";
					$status = 'Not inserted';
				}
				else
				{
					//echo "Count inserted";
					$status = 'Count inserted';	
				}*/
				$query2="SELECT COUNT(buyer_id) AS buy_count FROM transaction WHERE buyer_id='$buyer_id' and seller_id=$seller_id;";
				$sql2=mysqli_query($con,$query2);
				$row2=$sql2->fetch_assoc();
				$count_seller=$row2['buy_count'];
				$query3="UPDATE transaction SET count_pair=$count_seller WHERE seller_id=$seller_id and buyer_id=$buyer_id";
				if($count_seller>3)
					$query3="UPDATE transaction SET isValid=0 WHERE buyer_id=$buyer_id";
				$sql3=mysqli_query($con,$query3);
				/*if(!$sql3)
				{
					//echo "Not inserted";
					$status = 'Not inserted';
				}
				else
				{
					//echo "Count inserted";
					$status = 'Count inserted';	
				}*/
				$coins=$amount/1000;
				$query7="SELECT * FROM premium_user WHERE premium_id=$buyer_id;";
				$sql7=mysqli_query($con,$query7);
				$row7=$sql7->fetch_assoc();
				$addc=$coins+$row7['coins'];
				$query6="UPDATE premium_user SET coins=$addc WHERE premium_id=$buyer_id;";
				
				
				
				$sql6=mysqli_query($con,$query6);
				/*if($sql6)
				{
					//echo "$coins coins inserted";
					$status = 'Coins inserted';
				}
				else
				{
					//echo "Coins not inserted";
					$status = 'Coins not inserted';
				}*/
				$query3="SELECT * FROM transaction WHERE buyer_id=$buyer_id AND seller_id=$seller_id";
				$sql3=mysqli_query($con,$query3);
				$row=$sql3->fetch_assoc();
				$row_count=mysqli_num_rows($sql3);
				if($row_count==1)				
				{
					$query4="INSERT INTO transact_key(buyer_id,seller_id) VALUES($buyer_id,$seller_id)";
					$sql4=mysqli_query($con,$query4);
					/*if(!$sql4)
						echo "Transaction Key not inserted";
					else
						echo "Transaction Key successfully inserted";		
					*/
				}
			//}
		}
	}
	echo $status;
?>