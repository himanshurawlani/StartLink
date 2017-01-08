<?php session_start(); ?>
<html>
<head>
<title>StartLink</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="w3.css">
  <link rel="stylesheet" href="w3-theme-black.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
  </script>
</head>
<body class="w3-light-grey">

<!-- Navbar (sit on top) -->
  <!-- Navbar -->
  <div class="w3-top">
   <ul class="w3-navbar w3-theme-d2 w3-left-align" id="myNavbar">
    <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
    <a class="w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
    </li>
    <li><a href="../Himanshu/homepage.php" class="w3-teal"><i class="fa fa-home w3-margin-right"></i>STARTLINK</a></li>
    <li class="w3-hide-small"><a href="startup_profile.php" class="w3-hover-white">Profile</a></li>
    <li class="w3-hide-small"><a href="#work" class="w3-hover-white">Work</a></li>
    <li class="w3-hide-small"><a href="#pricing" class="w3-hover-white">Price</a></li>
    <li class="w3-hide-small"><a href="#contact" class="w3-hover-white">Contact</a></li>
    <li class="w3-hide-small">
    <button class="w3-btn w3-hover-teal" style="height:38px;" name="" id="transactbtn" onclick="document.getElementById('id01').style.display='block'" style="display:none;">Transact</button>
    </li>
	<li class="w3-hide-small" id="coins" style="height:38px;"></li>
	
    <li class="w3-hide-small w3-right"><button style="height:38px;" class="w3-btn w3-black w3-hover-teal" onclick="showSearchForm();" title="Search"><i class="fa fa-search">
    </i></button></li>
	<form class="w3-right-align" id="searchForm" name="MyTrySearchForm" action="searchpage.php" method="GET" style="display:none;">
	<input class="w3-btn w3-hover-teal w3-right" type="Submit" onsubmit="validateCreds();" ></input>
    <input class="w3-input w3-animate-right w3-validate w3-right-align" type="text" name="desc" required></input>
  </form>
   </ul>

    <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium">
    <ul class="w3-navbar w3-left-align w3-theme">
      <li><a href="#">Profile</a></li>
      <li><a href="#work">Work</a></li>
      <li><a href="#pricing">Price</a></li>
      <li><a href="#contact">Contact</a></li>
	  <li>
    <button class="w3-btn w3-hover-teal w3-left-align" style="height:38px;width:100%;" id="transactbtn" onclick="document.getElementById('id01').style.display='block'" style="display:none;">Transact</button>
    </li>
	  <li><button style="height:38px;width:100%;" class="w3-btn w3-black w3-hover-teal w3-left-align" onclick="showSearchForm();" title="Search">Search</button></li>
    </ul>
    </div>
  </div>
	<!-- Page Container -->
  <br>
  <br>

  <!--<button name="" id="transactbtn" onclick="document.getElementById('id01').style.display='block'" style="display:none;">Transact</button>-->
  <script>
  
	function dispcoins()
	{
		$.ajax({
			type:'POST',
			url:'getCoins.php',
			success:function (msg){
				console.log(msg);
				document.getElementById('coins').innerHTML="<button class='w3-btn'>Coins:"+msg+" <i class='fa fa-database'></i></button>";
			}
		});
	}
    var pre="<?php echo $_SESSION['isPremium'];?>";
    if(pre=="YES")
    {
      document.getElementById('transactbtn').style.display="block";
	  document.getElementById('coins').style.display="block";
	  dispcoins();
    }
    else
    {
      document.getElementById('transactbtn').style.display="none";
	  document.getElementById('coins').style.display="none";
    }

    function submittransact(){

      var buyer = document.getElementById('buyer_name').value;
      var seller = document.getElementById('seller_name').value;
      var amount = document.getElementById('amount').value;
	  var response;
		
		if(buyer=="" || seller=="" || amount=="")
		{
			document.getElementById("invalidcreds").innerHTML="<p class='w3-text-red'>Please fill out all the fields...</p>";
		}
		else if (buyer==seller)
		{
			document.getElementById("invalidcreds").innerHTML="<p class='w3-text-red'>Buyer and Seller fields cannot be same...</p>";
		}
		  else
		  {
			  $.ajax({
					type: 'POST',
					url: 'transaction.php',
					data: { 
						'buyer_name': buyer, 
						'seller_name': seller,
						'amount' : amount 
					},
					cache:false,
					beforeSend:function()
					{
						$("#loginSpin").html("<p><i class='fa fa-spinner fa-spin' style='font-size:24px'></i>Verifying</p>");
					},
					success: function(msg){
						console.log(msg);
						response=String(msg);
						if(response=="Buyer Company does not exist!")
							document.getElementById("invalidcreds").innerHTML="<p class='w3-text-red'>Buyer Company does not exist!</p>";
						else if(response=="Seller Company does not exist!")
							document.getElementById("invalidcreds").innerHTML="<p class='w3-text-red'>Seller Company does not exist!</p>";
						else
						{
							document.getElementById("invalidcreds").innerHTML="<p class='w3-text-green'>Transaction Sucessfull !</p>";
							document.getElementById('id01').style.display="none";
							document.getElementById('id02').style.display="block";
							getEarnedCoins();
						}
					}
				});
		  }
  }
  
  function getEarnedCoins(){
	  $.ajax({
		  type:'post',
		  url:'getCoins.php',
		  success:function(msg){
			 
			 var curr = document.getElementById('coins').innerHTML;
			 var splitted = curr.split(":");
			 var cc = splitted[1];
			 var ccoins = cc.substr(0,cc.length - 39);
			  console.log("Cc coins "  + ccoins);
			  var old = ccoins;
			  
			   var net = Number(msg) - Number(old);
			   console.log("Old " + old);
			   console.log("msg " + msg);
			   console.log("Net coins " + net);
			   document.getElementById('earned_coins').innerHTML="You earned " + net + " coins";
			   
			   
		  }
	  });
  }
  </script>

  <!--Transact Modal-->
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-8 w3-animate-top">
      <header class="w3-container w3-teal">
        <span onclick="document.getElementById('id01').style.display='none';" class="w3-closebtn">&times;</span>
        <h4>Welcome to StartLink...</h4>
        <h5>Because we can <i class="fa fa-smile-o"></i></h5>
      </header>
      <form class="w3-container">
        <p>
        <input class="w3-input" id="buyer_name" type="text" value="<?php echo $_SESSION['company_name'];?>" name="buyer_name" disabled>
        <label class="w3-label">From Company (Name)</label></p>
        <p>
        <!--<input class="w3-input" id="seller_name" type="text" name="seller_name" required>-->
		<select class="w3-input" id="seller_name" name="seller_name" required>
		<?php    
			include '../Himanshu/connect.php';
			$cname=$_SESSION['company_name'];
			$query = "SELECT * FROM company WHERE company_name<>'$cname'";
			$retval=mysqli_query($con,$query);
			$display_string='';
			while($row=$retval->fetch_assoc())
			{
				$display_string.="<option>{$row['company_name']}</option>";
			}
			echo $display_string;
		?>
		</select>
        <label class="w3-label w3-validate">To Company (Name)</label></p>
        <p>
        <input class="w3-input" id="amount" type="number" name="amount" required>
        <label class="w3-label w3-validate">Amount</label></p>
        <div id="invalidcreds"></div>
        <p>
        <input type="button" class="w3-btn w3-teal" value="Transact" onclick="submittransact();"></input></p>
      </form>
      <footer class="w3-container w3-teal">
        <p><i class="fa fa-copyright"></i>STARTLINK TECHNOLOGIES</p>
      </footer>
    </div>
  </div>

  <!--Success Transact Modal-->
  <div id="id02" class="w3-modal">
		<div class="w3-modal-content w3-card-8 w3-animate-top">
			<header class="w3-container w3-teal">
				
				<h4>Welcome to StartLink...</h4>
				<h5>Because we can <i class="fa fa-smile-o"></i></h5>
			</header>
			<div class="w3-container">
			  <div class="w3-panel w3-green">
				  <h3> Success !</h3>
				  <p> Transaction was Sucessful </p>
			  </div>
			  <div>
				<p class="w3-text-green w3-xlarge">Congratulations</p>
				<p class="w3-large" id="earned_coins">
				</p>
			  </div>
			  <input type="button" class="w3-btn w3-teal" onclick="location.reload();" value="Close"></input></p>
			</div>
			<footer class="w3-container w3-teal">
				<p><i class="fa fa-copyright"></i>STARTLINK TECHNOLOGIES</p>
			</footer>
		</div>
	</div>
  
<div class="w3-container w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding" style="margin:0 -16px">
  
    <!-- Left Column -->
    <div class="w3-third">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          <img src="img/fb_logo.png" style="width:100%" alt="Avatar">
          <div class="w3-display-bottomleft w3-container w3-text-black">
            <h2 style="color:white;" id="company_name"><?php echo $_SESSION['company_name']; ?></h2>
          </div>
        </div>
        <div class="w3-container">
          
          <p id="country"><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $_SESSION['country']; ?>
          <p id="email_id"><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $_SESSION['email_id']; ?>
          <p id="phone"><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $_SESSION['phone']; ?>
          <hr>

          <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Rating</b></p>
          <p>Product Quality</p>
          <div class="w3-progress-container w3-round-xlarge w3-small">
            <div class="w3-progressbar w3-round-xlarge w3-teal" style="width:90%">
              <div class="w3-center w3-text-white">90%</div>
            </div>
          </div>
          <p>Customer Service</p>
          <div class="w3-progress-container w3-round-xlarge w3-small">
            <div class="w3-progressbar w3-round-xlarge w3-teal" style="width:80%">
              <div class="w3-center w3-text-white">80%</div>
            </div>
          </div>
          <p>Customer Satisfaction</p>
          <div class="w3-progress-container w3-round-xlarge w3-small">
            <div class="w3-progressbar w3-round-xlarge w3-teal" style="width:75%">
              <div class="w3-center w3-text-white">75%</div>
            </div>
          </div>
          <p>Overall Rating</p>
          <div class="w3-progress-container w3-round-xlarge w3-small">
            <div class="w3-progressbar w3-round-xlarge w3-teal" style="width:50%">
              <div class="w3-center w3-text-white">50%</div>
            </div>
          </div>
          <br>
          <br>
        </div>
      </div><br>

    <!--End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
    
      <div class="w3-container w3-card-2 w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Information</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>Description</b></h5>
          <!--<h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Jan 2015 - <span class="w3-tag w3-teal w3-round">Current</span></h6>-->
          <p id="description"><?php echo $_SESSION['description']; ?></p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>Address</b></h5>
          <!--<h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Mar 2012 - Dec 2014</h6>-->
          <p id="address"><?php echo $_SESSION['address']; ?></p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>Product</b></h5>
          <!--<h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Jun 2010 - Mar 2012</h6>-->
          <p id="product_type"><?php echo $_SESSION['product']; ?></p><br>
        </div>
      </div>

      <div class="w3-container w3-card-2 w3-white" style="height:493px;">

      <div class="w3-panel">  
        <h2 class="w3-text-grey" style="float:left;">Reviews</h2>
        <!--<input type="image" src="img/plus.png" style="float:right;margin-top:1.5%;height:35px;width:35px;" 
        onclick="document.getElementById('review_modal').style.display='block'" 
        />-->
      </div>
                
        <div class="w3-container" style="overflow-y:scroll;height:75%;" id="reviews_div">
          
          <script type="text/javascript">
            var ajaxrequest = new XMLHttpRequest();
            ajaxrequest.onreadystatechange = function(){
              if(ajaxrequest.readyState==4){
                var ajaxDisplay = document.getElementById('reviews_div');
                ajaxDisplay.innerHTML = ajaxrequest.responseText;
              }
            }
            
            //var x = getCookie('cname');
              var cname = "<?php echo $_SESSION['company_name']; ?>";
              ajaxrequest.open('GET', '../Jayesh/getreviews.php?desc=' + cname, true);
              ajaxrequest.send(null);
          </script>



          <!--<h5 class="w3-opacity" id="review_title_1"><b>Sample review title 1</b></h5>-->
          <!--<h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Forever</h6>-->
          <!--<p id="review_1">Lorem ipsum bla bla bla</p>
          <hr>-->
        </div>
      </div>

    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->

  <!--Review Modal-->
  <div id="review_modal" class="w3-modal" action="addreview.php" method="GET">
    <div class="w3-modal-content w3-modal-top">
      <span style="float:right;" onclick="document.getElementById('review_modal').style.display='none'" class="w3-close-btn">&times;</span>
      <div class="w3-container">
      <br>
      <form name="review form">
      <input type="hidden" value="document.getCookie('cname')">
      <input type="text" name="review_title" placeholder="Title">
      <br>
      <input type="text" name="review_description" placeholder="Description">
      <input type="hidden" name="desc" value="<?php echo $_SESSION['comp_name']; ?>">
      <br>  

      <input type="Submit" value="Submit" onclick="insertReview();">
      </form>
      </div>
    </div>
  </div>
  <!--End of review modal-->
  
</div>
<!-- Footer -->
  <footer class="w3-container w3-padding-32 w3-theme-d1 w3-center">
    <h4>Follow Us</h4>
    <a class="w3-btn-floating w3-teal" href="javascript:void(0)" title="Facebook"><i class="fa fa-facebook"></i></a>
    <a class="w3-btn-floating w3-teal" href="javascript:void(0)" title="Twitter"><i class="fa fa-twitter"></i></a>
    <a class="w3-btn-floating w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-google-plus"></i></a>
    <a class="w3-btn-floating w3-teal w3-hide-small" href="javascript:void(0)" title="Linkedin"><i class="fa fa-linkedin"></i></a>
    <p>Powered by <a href="../Himanshu/homepage.php">StartLink</a></p>

    <div style="position:relative;bottom:100px;z-index:1;" class="w3-tooltip w3-right">
    <span class="w3-text w3-padding w3-teal w3-hide-small">Go To Top</span>
    <a class="w3-btn w3-theme" href="#myPage"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
    </div>
  </footer>
  <script>
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
		function showSearchForm()
  {
    var stat=document.getElementById('searchForm').style.display;
    if(stat=="inline")
      document.getElementById('searchForm').style.display="none";
    else
	{
      document.getElementById('searchForm').style.display="inline";
	}
  }
  </script>
</body>
</html>