<?php
	$conn = mysql_connect('localhost','root','');
	mysql_select_db('startlink');
	$cname = $_GET['desc'];
	$query = "select * from reviews where review_startup='$cname'";
	$display_string = '';
	$retval = mysql_query($query,$conn);
	while($row=mysql_fetch_assoc($retval)){
	  $display_string .="<h4 class='w3-opacity' id='review_title_1'><b>{$row['reviewing_startup']} says</b></h4>";
	  $display_string .= "<h5 class='w3-opacity' id='review_title_1'><b>{$row['review_title']}</b></h5>";
	  $display_string .="<p id='review_1'>{$row['review_description']}</p>";
	  $display_string .="<hr>";
	}

	if($display_string==''){
	  $display_string = "<h4 class='w3-opacity' id='review_title_1'><b>No Reviews yet...</b></h4>";
	}
	mysql_close($conn);
	echo $display_string;
?>	