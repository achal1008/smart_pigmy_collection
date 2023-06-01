<!DOCTYPE html>
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
				
				<!-- Revolution slider start -->
				<div class="tp-banner-container">
					<div class="tp-banner" >
						<ul>
							 <li data-slotamount="7" data-transition="zoomin" data-masterspeed="1000" data-saveperformance="on">
								<img alt="" src="images/slider/slide1.jpg" data-lazyload="images/slider/slide1.jpg">
								
							</li>
                           <li data-slotamount="7" data-transition="zoomin" data-masterspeed="1000" data-saveperformance="on">
								<img alt="" src="images/slider/slide1.jpg" data-lazyload="images/slider/slide1.jpg">
							</li>
						</ul>
					</div>
				</div>
				<!-- Revolution slider end -->
								
				<!-- Welcome Box start -->
				<div class="dark-bg" style="padding: 20px 0;">
					<div class="container">
						<div class="row">
							<div class="cell-12">
								<h2 align="center"><span class="main-color text-center">Welcome To Smart Pigmy Collection</span></h2>
							</div>
							
						</div>
					</div>
				</div>
				<!-- Welcome Box end -->
				
				<div class="sectionWrapper">
					<div class="container">
						<div class="row">
							<div class="cell-3 service-box-2 fx" data-animate="fadeInDown">
								<div class="box-2-cont">
									<i class="fa fa-check-square-o"></i>
									<h4>Pigmy Collector Login</h4>
									<a class="r-more main-color" href="#">Read More</a>
								</div>
							</div>
							<div class="cell-3 service-box-2 fx" data-animate="fadeInDown" data-animation-delay="200">
								<div class="box-2-cont">
									<i class="fa fa-check-square-o"></i>
									<h4>Collect Payments</h4>
									<a class="r-more main-color" href="#">Read More</a>
								</div>
							</div>
							<div class="cell-3 service-box-2 fx" data-animate="fadeInDown" data-animation-delay="400">
								<div class="box-2-cont">
									<i class="fa fa-check-square-o"></i>
									<h4>Customer Login</h4>
									<a class="r-more main-color" href="#">Read More</a>
								</div>
							</div>
							<div class="cell-3 service-box-2 fx" data-animate="fadeInDown" data-animation-delay="600">
								<div class="box-2-cont">
									<i class="fa fa-check-square-o"></i>
									<h4>View Payments</h4>
									<a class="r-more main-color" href="#">Read More</a>
								</div>
							</div>		
						</div>
					</div>
				</div>
			
				
				
			</div>
			<!-- Content End -->
			
			<?php
                require_once "footer.php";
            ?>
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