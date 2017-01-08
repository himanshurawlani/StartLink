<!DOCTYPE html>
<html>

<head>
	<title>Register</title>
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
	  <li class="w3-hide-small"><a href="pricing.php" class="w3-hover-white">Price</a></li>
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
	
	<br>
	<br>
	<div class="w3-content w3-card-8 w3-animate-top">
		<header class="w3-container w3-teal">
			<h4>Welcome to StartLink...</h4>
			<h5>Because we can  <i class="fa fa-smile-o"></i></h5>
		</header>
		<form name="registration" onSubmit="return formValidate();" action="insert.php" method="POST" class="w3-container">
		  <p>
		  <label class="w3-label w3-text-red" id="lbl_company_name"></label>
		  <input class="w3-input" type="text" name="company_name" id="companyname" required>
		  <label class="w3-label w3-validate">Company Name</label></p>
		  <p>
		  <input class="w3-input" type="email" name="email_id" id="email_id" required>
		  <label class="w3-label w3-validate">Email ID</label></p>
		  <p>
		  <label class="w3-label w3-text-red" id="lbl_passwd"></label>
		  <input class="w3-input" type="password" name="password" id="passwd" required>
		  <label class="w3-label w3-validate">Password</label></p>
		  <p>
		  <label class="w3-label w3-text-red" id="lbl_repasswd"></label>
		  <input class="w3-input" type="password" name="repassword" id="repasswd" required>
		  <label class="w3-label w3-validate">Re-enter Password</label></p>
		  <p>
		  <label class="w3-label w3-text-red" id="lbl_phone"></label>
		  <input class="w3-input" type="text" name="phone" id="phn" required>
		  <label class="w3-label w3-validate">Phone</label></p>
		  <p>
		  <input class="w3-input" type="textarea" name="description" id="description" required>
		  <label class="w3-label w3-validate">Description</label></p>
		  <p>
		  <input class="w3-input" type="textarea" name="address" id="address" required>
		  <label class="w3-label w3-validate">Address</label></p>
		  <p>
		  <input class="w3-input" type="text" name="product" id="product" required>
		  <label class="w3-label w3-validate">Product</label></p>
		  <p>
		  <label class="w3-label w3-text-red" id="lbl_country"></label>
		  <input class="w3-input" type="text" name="country" id="cntry" required>
		  <label class="w3-label w3-validate">Country</label></p>
		  <p>
		  <label class="w3-label w3-validate">Do you wish to register for premium account?</label>
		  <input class="w3-radio" type="radio" name="isPremium" id="YES" value="YES"><label for="YES">YES</label>&nbsp;
		  <input class="w3-radio" type="radio" name="isPremium" id="NO" value="NO"><label for="NO">NO</label>&nbsp;</p>
		  <br>
		  <p><input class="w3-btn w3-teal" type="submit" name="register" value="Register"></input></p>
		</form>
		<footer class="w3-container w3-teal">
			<p><i class="fa fa-copyright"></i> Copyright StartLink Technologies</p>
		</footer>
	</div>
	<!--modal-->
	<div id="id01" class="w3-modal" style="display:none;">
		<div class="w3-modal-content w3-card-8 w3-animate-top">
			<header class="w3-container w3-teal">
				<span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn"><i class="fa fa-remove"></i></span>
				<h4>Welcome to StartLink...</h4>
				<h5>Because we can <i class="fa fa-smile-o"></i></h5>
			</header>
			<form class="w3-container">
			  <p>
			  <input class="w3-input" type="email" name="email" required>
			  <label class="w3-label w3-validate">Email</label></p>
			  <p>
			  <input class="w3-input" type="password" name="email" required>
			  <label class="w3-label w3-validate">Password</label></p>
			  <p>
			  <button class="w3-btn w3-teal">Log In</button></p>
			</form>
			<footer class="w3-container w3-teal">
				<p><i class="fa fa-copyright"></i>STARTLINK TECHNOLOGIES</p>
			</footer>
		</div>
	</div>
	<br>
	<br>
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