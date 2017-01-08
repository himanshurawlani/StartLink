<!DOCTYPE html>
<html>

<head>
	<title>Pricing</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="w3.css">
	<link rel="stylesheet" href="w3-theme-black.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<script src="formValidateProject.js"></script>
</head>

<body id="myPage">

	<!-- Navbar -->
	<div class="w3-top">
	 <ul class="w3-navbar w3-theme-d2 w3-left-align">
	  <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
		<a class="w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
	  </li>
	  <li><a href="homepage.php" class="w3-teal"><i class="fa fa-home w3-margin-right"></i>STARTLINK</a></li>
	  <li class="w3-hide-small"><a href="#" class="w3-hover-white">Price</a></li>
	  <li class="w3-hide-small"><a href="homepage.php#contact" class="w3-hover-white">Contact</a></li>
	 </ul>

	  <!-- Navbar on small screens -->
	  <div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium">
		<ul class="w3-navbar w3-left-align w3-theme">
		  <li><a href="#pricing">Price</a></li>
		  <li><a href="#contact">Contact</a></li>
		  
		</ul>
	  </div>
	</div>
	


<!-- Pricing Row -->
	<div class="w3-row-padding w3-center w3-padding-64" id="pricing">
		<h2>PRICING</h2>
		<p>Choose a pricing plan that fits your needs.</p><br>
		<div class="w3-third w3-margin-bottom">
		  <ul class="w3-ul w3-border w3-hover-shadow">
			<li class="w3-theme">
			  <p class="w3-xlarge">Basic</p>
			</li>
			<li class="w3-padding-16"><b>10GB</b> Storage</li>
			<li class="w3-padding-16"><b>10</b> Emails</li>
			<li class="w3-padding-16"><b>10</b> Domains</li>
			<li class="w3-padding-16"><b>Endless</b> Support</li>
			<li class="w3-padding-16">
			  <h2 class="w3-wide"><i class="fa fa-usd"></i> 10</h2>
			  <span class="w3-opacity">per month</span>
			</li>
			<li class="w3-theme-l5 w3-padding-24">
			  <button class="w3-btn w3-teal w3-padding-large"><i class="fa fa-check"></i> Sign Up</button>
			</li>
		  </ul>
		</div>

		<div class="w3-third w3-margin-bottom">
		  <ul class="w3-ul w3-border w3-hover-shadow">
			<li class="w3-theme-l2">
			  <p class="w3-xlarge">Pro</p>
			</li>
			<li class="w3-padding-16"><b>25GB</b> Storage</li>
			<li class="w3-padding-16"><b>25</b> Emails</li>
			<li class="w3-padding-16"><b>25</b> Domains</li>
			<li class="w3-padding-16"><b>Endless</b> Support</li>
			<li class="w3-padding-16">
			  <h2 class="w3-wide"><i class="fa fa-usd"></i> 25</h2>
			  <span class="w3-opacity">per month</span>
			</li>
			<li class="w3-theme-l5 w3-padding-24">
			  <button class="w3-btn w3-teal w3-padding-large"><i class="fa fa-check"></i> Sign Up</button>
			</li>
		  </ul>
		</div>

		<div class="w3-third w3-margin-bottom">
		  <ul class="w3-ul w3-border w3-hover-shadow">
			<li class="w3-theme">
			  <p class="w3-xlarge">Premium</p>
			</li>
			<li class="w3-padding-16"><b>50GB</b> Storage</li>
			<li class="w3-padding-16"><b>50</b> Emails</li>
			<li class="w3-padding-16"><b>50</b> Domains</li>
			<li class="w3-padding-16"><b>Endless</b> Support</li>
			<li class="w3-padding-16">
			  <h2 class="w3-wide"><i class="fa fa-usd"></i> 50</h2>
			  <span class="w3-opacity">per month</span>
			</li>
			<li class="w3-theme-l5 w3-padding-24">
			  <button class="w3-btn w3-teal w3-padding-large"><i class="fa fa-check"></i> Sign Up</button>
			</li>
		  </ul>
		</div>
	</div>
	
	<!-- Footer -->
	<footer class="w3-container w3-padding-32 w3-theme-d1 w3-center">
	  <h4>Follow Us</h4>
	  <a class="w3-btn-floating w3-teal" href="javascript:void(0)" title="Facebook"><i class="fa fa-facebook"></i></a>
	  <a class="w3-btn-floating w3-teal" href="javascript:void(0)" title="Twitter"><i class="fa fa-twitter"></i></a>
	  <a class="w3-btn-floating w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-google-plus"></i></a>
	  <a class="w3-btn-floating w3-teal w3-hide-small" href="javascript:void(0)" title="Linkedin"><i class="fa fa-linkedin"></i></a>
	  <p>Powered by <a href="homepage.php">StartLink</a></p>

	  <div style="position:relative;bottom:100px;z-index:1;" class="w3-tooltip w3-right">
		<span class="w3-text w3-padding w3-teal w3-hide-small">Go To Top</span>
		<a class="w3-btn w3-theme" href="#myPage"><span class="w3-xlarge">
		<i class="fa fa-chevron-circle-up"></i></span></a>
	  </div>
	</footer>
	
	<script>
	// Used to toggle the menu on smaller screens when clicking on the menu button
	function openNav() 
	{
		var x = document.getElementById("navDemo");
		if (x.className.indexOf("w3-show") == -1) {
			x.className += " w3-show";
		} else {
			x.className = x.className.replace(" w3-show", "");
		}
	}
</script>
</body>
</html>