﻿<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Smart Pigmy Collection</title>
		<meta name="description" content="">
		
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		
		<!-- CSS StyleSheets -->
		<link rel="stylesheet" href="css/font-awesome.min.css"/>
		<link rel="stylesheet" href="css/animate.css"/>
		<link rel="stylesheet" href="css/prettyPhoto.css"/>
		<link rel="stylesheet" href="css/slick.css"/>
		<link rel="stylesheet" href="rs-plugin/css/settings.css"/>
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" href="css/responsive.css"/>
        
		<!--[if lt IE 9]>
	    	<link rel="stylesheet" href="css/ie.css">
	    	<script type="text/javascript" src="js/html5.js"></script>
	    <![endif]-->

		<link rel="stylesheet" id="skinCSS" href="css/skins/default.css"/>
        <script type="text/javascript">
        function validate_form()
        {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            
            if(username=='')
            {
                alert("Please Enter User Name.");
                return false;
            }
            else if(password=='')
            {
                alert("Please Enter Password.");
                return false;
                
            }
        }
        </script>
        <?php
        require_once "pigmyhelper.php";
        $helper = new PigmyHelper();
        
        ?>
    </head>
	<body style="overflow:hidden" class="bg3">
	    
	    <!-- site preloader start -->
	    <div class="page-loader">
	    	<div class="loader-in"></div>
	    </div>
	    <!-- site preloader end -->
	    
	    <div class="pageWrapper fixedPage">
		    
		    <?php
                require_once "header.php";
            ?>
			
			<!-- Content Start -->
			<div id="contentWrapper">
				<div class="page-title title-1">
					<div class="container">
						<div class="row">
							<div class="cell-12">
								<h1 class="fx" data-animate="fadeInLeft">Customer Login</h1>
								<div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
									<span class="bold">You Are In:</span><a href="#">Home</a><span class="line-separate">/</span><span>Customer Login</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="sectionWrapper">
					<div class="container">
						<div class="row">
							<div class="cell-7 contact-form " >
			    				<h3 class="block-head">Customer Login</h3>
                                <?php
                                if($_GET['error'])
                                {
                                    ?>
                                    <div data-animate="fadeInLeft" class="box error-box fx animated fadeInLeft" style="">
                						<a href="#" class="close-box"><i class="fa fa-times"></i></a>
                						<h3 style="text-transform: none;">Login Failed! Please enter valid details.</h3>
                					  </div>
                                    <?php
                                }
                                ?>
			    				<form action="check_customer.php" id="reg_form" method="post" onsubmit="return validate_form();">
			    					<div class="form-input">
			    						<label>User Name<span class="red">*</span></label><input type="text" id="username" name="username" />
			    					</div>
			    					<div class="form-input">
			    						<label>Password<span class="red">*</span></label><input type="password" id="password" name="password" />
			    					</div>
			    					<div class="form-input">
			    						<input type="submit" class="btn btn-large main-bg" value="Login"/>&nbsp;&nbsp;
			    					</div>
			    				</form>
			    			</div>
		    			
						</div>
					</div>
				</div>
				
			</div>
			<!-- Content End -->
			
			<?php
                require_once "footer.php";
            ?>
		    
		    <!-- Back to top Link -->
	    	<div id="to-top" class="main-bg"><span class="fa fa-chevron-up"></span></div>
	    	
	    </div>
	    
	    
	    <script type="text/javascript" src="js/jquery.min.js"></script>
	    <script type="text/javascript" src="js/waypoints.min.js"></script>
		<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		<script type="text/javascript" src="js/jquery.animateNumber.min.js"></script>
		<script type="text/javascript" src="js/slick.min.js"></script>
		<script type="text/javascript" src="js/jquery.easypiechart.min.js"></script>
		<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
		<script type="text/javascript" src="js/jquery.sharrre.min.js"></script>
		<script type="text/javascript" src="js/jquery.elevateZoom-3.0.8.min.js"></script>
		<script type="text/javascript" src="js/jquery.placeholder.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>