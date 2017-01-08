<?php session_start(); ?>
<html>
<head>
	<title>StartLink</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="w3.css">
	<link rel="stylesheet" href="w3-theme-black.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script>
		function displayModal()
		{
			document.getElementById("id01").style.display="block";
		}
		function logOut(){
			$.ajax({
				type:"POST",
				url:"logout.php",
				success:function(){
					location.reload();
				}
			})
		}
		
	</script>
	<style>
		/* Create a Parallax Effect */
		.bgimg-1, .bgimg-2, .bgimg-3 
		{
			opacity: 0.7;
			background-attachment: fixed;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}
		body,html
		{
			height: 100%;
			color: black;
			line-height: 1.8;
		}
		/* First image (Logo. Full height) */
		.bgimg-1 
		{
			background-image: url('sailboat.jpg');
			min-height: 100%;
		}
		/* Second image (Portfolio) */
		.bgimg-2 
		{
			background-image: url("Banner_Group-of-Business-People.jpg");
			min-height: 400px;
		}
		/* Third image (Contact) */
		.bgimg-3 
		{
			background-image: url("contact_1080p.jpg");
			min-height: 400px;
		}
		/* Turn off parallax scrolling for tablets and phones */
		@media only screen and (max-width: 1024px) 
		{
			.bgimg-1, .bgimg-2, .bgimg-3 
			{
				background-attachment: scroll;
			}
		}
	</style>
	
</head>

<body id="myPage" >
	
	<!-- Navbar (sit on top) -->
	<!-- Navbar -->
	<div class="w3-top">
	 <ul class="w3-navbar" id="myNavbar">
	  <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
		<a class="w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
	  </li>
	  <li><a href="#" class="w3-teal"><i class="fa fa-home w3-margin-right"></i>STARTLINK</a></li>
	  <?php 
			if(isset($_SESSION['company_id']))
			{
				echo "<li class='w3-hide-small'><a href='../Jayesh/startup_profile.php' class='w3-hover-white'>Profile</a></li>";
			}
			else
			{
				echo "<li class='w3-hide-small'><button style='height:43px;' onclick='displayModal();' class='w3-btn w3-hover-white'>Profile</button></li>";
			}
		?>
	  <li class="w3-hide-small"><a href="#work" class="w3-hover-white">Work</a></li>
	  <li class="w3-hide-small"><a href="pricing.php" class="w3-hover-white">Price</a></li>
	  <li class="w3-hide-small"><a href="#contact" class="w3-hover-white">Contact</a></li>
	 </ul>

	  <!-- Navbar on small screens -->
	  <div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium">
		<ul class="w3-navbar w3-left-align w3-theme">
		  <li><a href="#team">Team</a></li>
		  <li><a href="#work">Work</a></li>
		  <li><a href="#pricing">Price</a></li>
		  <li><a href="#contact">Contact</a></li>
		  
		</ul>
	  </div>
	</div>
	
	<!-- First Parallax Image with Logo Text -->
	<div class="bgimg-1 w3-opacity w3-display-container">
		<div class="w3-display-middle" style="white-space:nowrap;">
			<br><br>
			<div class="w3-center" id="loginoutbtns">
			<?php 
			if(!isset($_SESSION['company_id']))
			{
				echo "<span class='w3-center w3-padding-xlarge w3-black w3-xlarge w3-wide w3-animate-opacity'>STARTLINK<span class='w3-hide-small'>-for startups</span></span>
				<br><br><button id='loginbtn' onclick='displayModal();' class='w3-btn w3-theme-d2 w3-xlarge w3-hover-teal'>LOG IN</button>&nbsp;
				<a id='signinbtn' href='register.php' class='w3-btn w3-theme-d2 w3-xlarge w3-hover-teal'>SIGN UP</a>";
			}
			else
			{
				/*function logOut()
				{
					unset($_SESSION['company_id']);
					session_destroy();
					location.reload();
				}*/
				echo "<p class='w3-center w3-padding-xlarge w3-black w3-xlarge w3-wide w3-animate-opacity' class='w3-animate-zoom'> Welcome - " . $_SESSION['company_name'] . "</p>";
				echo "<center><button id='logoutbtn' onclick='logOut();' class='w3-btn w3-theme-d2 w3-xlarge w3-hover-teal' style='display:block;'>LOGOUT</a><center>";
			}
			
			?>
			</div>
		</div>
	</div>
	<!-- Modal 1 -->
	<div id="id01" class="w3-modal">
		<div class="w3-modal-content w3-card-8 w3-animate-top">
			<header class="w3-container w3-teal">
				<span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn"><i class="fa fa-remove"></i></span>
				<h4>Welcome to StartLink...</h4>
				<h5>Because we can <i class="fa fa-smile-o"></i></h5>
			</header>
			<form class="w3-container">
			  <p>
			  <input class="w3-input" id="log_email" type="email" name="login_email" required>
			  <label class="w3-label w3-validate">Email</label></p>
			  <p>
			  <input class="w3-input" id="log_passwd" type="password" name="login_password" required>
			  <label class="w3-label w3-validate">Password</label></p>
			  <div id="loginStatus"></div>
			  <p>
			  <input type="button" class="w3-btn w3-teal" onclick="validateCreds();" value="Log In"></input></p>
			</form>
			<footer class="w3-container w3-teal">
				<p><i class="fa fa-copyright"></i>STARTLINK TECHNOLOGIES</p>
			</footer>
		</div>
	</div>
	
	
	<!-- Team Container -->
	<div class="w3-content w3-container w3-padding-64 w3-center" id="team">
		<h2>OUR TEAM</h2>
		<p>Meet the team - our office stars:</p>

		<div class="w3-row"><br>

			<div class="w3-quarter">
				<img src="avatars/img_avatar1.png" alt="Co-Founder" style="width:45%" class="w3-circle w3-hover-opacity">
				<h3>Jayesh Saita</h3>
				<p>Software Designer</p>
			</div>

			<div class="w3-quarter">
				<img src="avatars/img_avatar3.png" alt="Co-Founder" style="width:45%" class="w3-circle w3-hover-opacity">
				<h3>Himanshu Rawlani</h3>
				<p>Web Designer</p>
			</div>

			<div class="w3-quarter">
				<img src="avatars/img_avatar2.png" alt="Co-Founder" style="width:45%" class="w3-circle w3-hover-opacity">
				<h3>Mihir Joshi</h3>
				<p>System Analyst</p>
			</div>

			<div class="w3-quarter">
				<img src="avatars/img_avatar6.png" alt="Co-Founder" style="width:45%" class="w3-circle w3-hover-opacity">
				<h3>Simran Rohira</h3>
				<p>Support</p>
			</div>

		</div>
	</div>
	
	<!-- Second Parallax Image with Portfolio Text -->
	<div class="bgimg-2 w3-display-container">
		<div class="w3-display-middle">
			<span class="w3-xxlarge w3-text-light-grey w3-wide">PORTFOLIO</span>
		</div>
	</div>
	
	<!-- Container (About Section) -->
	<div class="w3-content w3-container w3-padding-64">
		<h3 class="w3-center">ABOUT US</h3>
		<p class="w3-center"><em>We love Startups</em></p>
		<p><center>The main objectives of the StartLink Technologies are to:<br>
-Facilitate communication between Startups and other Start Ups.<br>
-Produce statistical reports for investments and market value.<br>
-Provide platform for these new companies to collaborate and help each other in a win-win deal.<br>
-Provide product and services of one startup to other at affordable rates.<br>
Today, start ups are emerging at a rapid rate. <br>
So, our idea will connect them so that new start-ups get more customers and also more business thus creating a win-win situation.<br>
More precisely, start-ups will register with us.<br>
When any other start-up wants any service/product, instead of going to giant companies, they will communicate with other new start-ups,
hence getting the product/service at an economical rate, make a good deal and make transactions with each other without any involvement of StartLink.</center></p>
		
		<p class="w3-large w3-center w3-padding-16">We are really good at:</p>
		<p class="w3-wide">Connecting Startups</p>
		<div class="w3-progress-container">
			<div class="w3-progressbar" style="width:90%"></div>
		</div>
		<p class="w3-wide">Profits</p>
		<div class="w3-progress-container">
			<div class="w3-progressbar" style="width:85%"></div>
		</div>
		<p class="w3-wide">Investor Help</p>
		<div class="w3-progress-container">
			<div class="w3-progressbar" style="width:75%"></div>
		</div>
	</div>
	
	<!-- Third Parallax Image with Contact Text -->
	<div class="bgimg-3 w3-display-container">
		<div class="w3-display-middle">
			<span class="w3-xxlarge w3-text-light-grey w3-wide">CONTACT US</span>
		</div>
	</div>
	
	<!-- Contact Container -->
	<div class="w3-container w3-padding-64 w3-theme-l5" id="contact">
	  <div class="w3-row">
		<div class="w3-col m5">
		<div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Contact Us</span></div>
		  <h3>Address</h3>
		  <p>Swing by for a cup of coffee, or whatever.</p>
		  <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i>&nbsp; Bombay, India</p>
		  <p><i class="fa fa-phone w3-text-teal w3-xlarge"></i>&nbsp;  +91 9876543210</p>
		  <p><i class="fa fa-envelope-o w3-text-teal w3-xlarge"></i>&nbsp;  cs@startlink.com</p>
		</div>
		<div class="w3-col m7">
		  <form class="w3-container w3-card-4 w3-padding-16 w3-white">
			  <div class="w3-group">
				<input class="w3-input" type="text" required id="contact_name">
				<label class="w3-label w3-validate">Name</label>
			  </div>
			  <div class="w3-group">
				<input class="w3-input" type="text" required id="contact_email">
				<label class="w3-label w3-validate">Email</label>
			  </div>
			  <div class="w3-group">
				<input class="w3-input" type="text" required id="contact_subject">
				<label class="w3-label w3-validate">Subject</label>
			  </div>
			  <p id="contactInvalid" class="w3-text-red"></p>
			  <input class="w3-check" type="checkbox" checked>
			  <label class="w3-validate">I Like it!</label>
			  <button class="w3-btn w3-right w3-theme" type="button" onclick="displayHelpModal();">Send</button>
		  </form>
		</div>
	  </div>
	</div>
	
	<!-- Modal 2 -->
	<div id="id02" class="w3-modal">
		<div class="w3-modal-content w3-card-8 w3-animate-top">
			<header class="w3-container w3-teal">
				<span onclick="document.getElementById('id02').style.display='none'" class="w3-closebtn"><i class="fa fa-remove"></i></span>
				<h4>Welcome to StartLink...</h4>
				<h5>Because we can <i class="fa fa-smile-o"></i></h5>
			</header>
			<div class="w3-container">
			<p class="w3-text-green w3-large">Thank you for contacting us !</p>
			<p> We Will get back to you soon. </p>
			</div>
			<footer class="w3-container w3-teal">
				<p><i class="fa fa-copyright"></i>STARTLINK TECHNOLOGIES</p>
			</footer>
		</div>
	</div>
	
	<!-- Footer -->
	<footer class="w3-container w3-padding-32 w3-theme-d1 w3-center">
	  <h4>Follow Us</h4>
	  <a class="w3-btn-floating w3-teal" href="javascript:void(0)" title="Facebook"><i class="fa fa-facebook"></i></a>
	  <a class="w3-btn-floating w3-teal" href="javascript:void(0)" title="Twitter"><i class="fa fa-twitter"></i></a>
	  <a class="w3-btn-floating w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-google-plus"></i></a>
	  <a class="w3-btn-floating w3-teal w3-hide-small" href="javascript:void(0)" title="Linkedin"><i class="fa fa-linkedin"></i></a>
	  <p>Powered by <a href="#">StartLink</a></p>

	  <div style="position:relative;bottom:100px;z-index:1;" class="w3-tooltip w3-right">
		<span class="w3-text w3-padding w3-teal w3-hide-small">Go To Top</span>
		<a class="w3-btn w3-theme" href="#myPage"><span class="w3-xlarge">
		<i class="fa fa-chevron-circle-up"></i></span></a>
	  </div>
	</footer>
	
	<script>
		// Change style of navbar on scroll
		window.onscroll = function() {myFunction()};
		function myFunction() 
		{
			var navbar = document.getElementById("myNavbar");
			if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) 
			{
				navbar.className = "w3-navbar" + " w3-theme-d2" + " w3-animate-top" + " w3-left-align";
			} 
			else 
			{
				navbar.className = "w3-navbar"+ " w3-animate-top";
			}
		}
		// Used to toggle the menu on smaller screens when clicking on the menu button
		function openNav() 
		{
			var x = document.getElementById("navDemo");
			if (x.className.indexOf("w3-show") == -1) 
			{
				x.className += " w3-show";
			} 
			else 
			{
				x.className = x.className.replace(" w3-show", "");
			}
		}
		
		// Modal Image Gallery
		function onClick(element) 
		{
			document.getElementById("img01").src = element.src;
			document.getElementById("modal01").style.display = "block";
			var captionText = document.getElementById("caption");
			captionText.innerHTML = element.alt;
		}
		
		function logOut(){
			$.ajax({
				type:"POST",
				url:"logout.php",
				success:function(){
					location.reload();
				}
			})
		}
		
		function displayHelpModal()
		{
			var name = document.getElementById('contact_name').value;
			var email = document.getElementById('contact_email').value;
			var subject = document.getElementById('contact_subject').value;
			
			if(name=="" || email=="" || subject=="")
			{
				document.getElementById('contactInvalid').innerHTML="Please fill out all the fields !";
			}
			else
			{				
				$.ajax({
					type:'POST',
					data:{
						'name': name,
						'email': email,
						'subject': subject
					},
					url:'insertcontact.php',
					success:function(msg){
						if(msg=="Success"){
							document.getElementById('id02').style.display="block";
							document.getElementById('contact_name').innerHTML="";
							document.getElementById('contact_email').innerHTML="";
							document.getElementById('contact_subject').innerHTML="";
						}else{
							alert("Error occured");
						}
					}
				});
			}
			
		}
		
		function validateCreds()
		{
			
			var response;
			var mail=$('#log_email').val();
			var pwd=$('#log_passwd').val();
			
			
			//var datastring = 'login_email='+mail+'&login_password='+pwd;
			$.ajax(
			{
				type:'POST',
				url:'login.php',
				data:{
						'login_email':mail,
						'login_password':pwd
				},
				cache:false,
				beforeSend:function()
				{
					$("#loginSpin").html("<p><i class='fa fa-spinner fa-spin' style='font-size:24px'></i>Verifying</p>");
				},
				success:function (msg){
					//alert("Response is : "+msg);
					response=String(msg);
					console.log("Response is : "+response);
					if(response == "Successfull Login")
					{
						//session_start();
						//$_SESSION["company_id"]="$company_id";
						$("#loginStatus").html("<p class='w3-text-green'>"+msg+"</p>");
						location.reload();
						//alert("Success");
					}
					else{
						//console.log("Response is : "+response);
						//alert("Response is : "+response);
						$("#loginStatus").html("<p class='w3-text-red'>"+msg+"</p>");
						//alert("Failure");
					}
				}
			}
			);
		
		}
	</script>
	
</body>
</html>












