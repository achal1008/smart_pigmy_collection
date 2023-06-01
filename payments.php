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
        
        if(!$_SESSION['pigmycollecterid'])
        {
            echo "<script>window.location ='index.php';</script>";
        }
        
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
								<h1 class="fx" data-animate="fadeInLeft">Payments</h1>
								<div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
									<span class="bold">You Are In:</span><a href="#">Home</a><span class="line-separate">/</span><span>Payments</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="sectionWrapper">
					<div class="container">
						<div class="row">
							<div class="cell-12 contact-form fx" data-animate="fadeInLeft">
			    				<h3 class="block-head">Payments</h3>
			    			</div>
                            <div class="cell-12">
                                <form action="" id="reg-form" method="post">
                                    <div class="row contact-form">
                                        <div class="cell-3">
                                            <div class="form-input">
            		    						<input placeholder="Customer Name" id="name" name="name" type="text" value="<?php echo $_POST['name'];?>" />
            		    					</div>
                                        </div>
                                        <div class="cell-3">
                                            <div class="form-input">
                                                <input type="submit" class="btn btn-small main-bg" value="Search"/>
                                            </div>
                                            <div class="cell-12">
                                            <div class="form-input">
            		    						<input placeholder="Date" id="date" name="date" type="date" value="<?php echo $_POST['date'];?>" />
            		    					</div>
                                        </div>
                                        <div class="cell-12">
                                            <div class="form-input">
                                                <input type="submit" class="btn btn-small main-bg" value="Search"/>
                                            </div>
                                            </div>
                                    </div>
                                </form>
        						<div class="row">
                                    <div class="cell-12">
        							<?php
                                        $helper->getPaymentsList();
                                    ?>
                                    </div>
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