<html>
<head>
	<title>Search</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1" />
	 <link rel="stylesheet" href="w3.css">
	<link rel="stylesheet" href="w3-theme-black.css">
	  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato" />
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" />
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body class="w3-light-grey">
<!-- Navbar -->
	<!-- Navbar (sit on top) -->
  <!-- Navbar -->
  <script>
  function showSearchForm()
  {
    var stat=document.getElementById('searchForm').style.display;
    if(stat=="block")
      document.getElementById('searchForm').style.display="none";
    else
      document.getElementById('searchForm').style.display="block";
  }
  </script>
  <div class="w3-top">
   <ul class="w3-navbar w3-theme-d2 w3-left-align" id="myNavbar">
    <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
    <a class="w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
    </li>
    <li><a href="../Himanshu/homepage.php" class="w3-teal"><i class="fa fa-home w3-margin-right"></i>STARTLINK</a></li>
    <li class="w3-hide-small"><a href="startup_profile.php" class="w3-hover-white">Profile</a></li>
    <li class="w3-hide-small"><a href="#pricing" class="w3-hover-white">Price</a></li>
    <li class="w3-hide-small"><a href="#contact" class="w3-hover-white">Contact</a></li>
    <li class="w3-hide-small w3-right"><button style="height:38px;" class="w3-btn w3-black w3-hover-teal" onclick="showSearchForm();" title="Search"><i class="fa fa-search">
    </i></button></li>
   </ul>

    <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium">
    <ul class="w3-navbar w3-left-align w3-theme">
      <li><a href="startup_profile.php">Profile</a></li>
      <li><a href="#pricing">Price</a></li>
      <li><a href="#contact">Contact</a></li>
      <li><a href="#">Search</a></li>
    </ul>
    </div>
  </div>
<!--<div class="w3-container w3-content w3-margin-top" style="max-width:1400px;">
<div class="w3-top">
	<ul class="w3-navbar w3-black">
		<li class="w3-hide-small">Home</li>
		<li class="w3-hide-small">My Profile</li>
	</ul>
</div>-->
<br>
<br>
<form class="w3-right" id="searchForm" name="MyTrySearchForm" action="searchpage.php" method="GET" style="display:none;">
    <input class="w3-input w3-animate-right" type="text" name="desc" required></input>
    <input class="w3-btn w3-hover-teal" type="Submit"></input>
  </form>
<br>
<span style="color:#008080;font-size:42px;">Search Results</span>
<br>
<br>

<?php
	$key = $_GET['desc'];
	if($key==null){
		echo "No data found";
	}
	else{
			$conn = mysql_connect('localhost','root','');

			mysql_select_db('startlink');	
			$query = "SELECT * FROM company WHERE description LIKE '%$key%'";
			$retval = mysql_query($query,$conn);

			session_start();
			$logged = $_SESSION['company_name'];
			while($row=mysql_fetch_assoc($retval))
			{
				echo "<div class='w3-card-2 w3-white' style='width:100%;padding:2%;'>";
				$curr_user = $row['company_name'];
				$link='';
				
				if($curr_user==$logged){
					$link = "startup_profile.php";
				}else{
					$link = "startup_profile - other.php?desc=$curr_user";
				}
				echo "<span style='color:#008080;font-size:32px;float:left'><a href='$link' style='text-decoration:none;'>{$row['company_name']}</a></span>";
				//echo "<span style='color:#008080;float:right;'>Overall Rating:</span>";
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "<span style='font-size:18px;'>{$row['description']}</span>";
				echo "</div>";
				echo "<br>";
			}
			echo "<center><b>End of Results</b></center><br><br>";
		mysql_close($conn);
	}
?>
</div>
<!-- Footer -->
	<footer class="w3-container w3-padding-32 w3-theme-d1 w3-center">
	  <h4>Follow Us</h4>
	  <a class="w3-btn-floating w3-teal" href="javascript:void(0)" title="Facebook"><i class="fa fa-facebook"></i></a>
	  <a class="w3-btn-floating w3-teal" href="javascript:void(0)" title="Twitter"><i class="fa fa-twitter"></i></a>
	  <a class="w3-btn-floating w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-google-plus"></i></a>
	  <a class="w3-btn-floating w3-teal w3-hide-small" href="javascript:void(0)" title="Linkedin"><i class="fa fa-linkedin"></i></a>
	  <p>Powered by <a href="../Himanshu/homepage.php" target="_blank">StartLink</a></p>

	  <div style="position:relative;bottom:100px;z-index:1;" class="w3-tooltip w3-right">
		<span class="w3-text w3-padding w3-teal w3-hide-small">Go To Top</span>
		<a class="w3-btn w3-theme" href="#myPage"><span class="w3-xlarge">
		<i class="fa fa-chevron-circle-up"></i></span></a>
	  </div>
	</footer>
</body>
</html>