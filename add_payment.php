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
        
        $error = $_GET['error'];  

        $msg = '';

        
        $id             = $_GET['id'];
        $customer_id    = $_GET['customer_id'];
        $task           = $_GET['task'];

        if($_POST)
        {
            $s = (!$id) ? 'Added' : 'Updated';
            $r = $helper->addPayment();
            if($r)
            {
                $msg='<div data-animate="fadeInRight" class="box success-box fx animated fadeInRight" style="">
						<a href="#" class="close-box"><i class="fa fa-times"></i></a>
						<h3>Payment '.$s.' Successfully.</h3>
					  </div>';
            }
            else
            {
                if($id)
                {
                    $msg='<div data-animate="fadeInLeft" class="box error-box fx animated fadeInLeft" style="">
    						<a href="#" class="close-box"><i class="fa fa-times"></i></a>
    						<h3>Payment Not '.$s.'.</h3>
    					  </div>';
                }
            }
        }
        
        $data   = $helper->payment_info($id);
        ?>
        <script type="text/javascript">
        function validate_form()
        {
            var date = document.getElementById("date").value;
            var amount = document.getElementById("amount").value;
            
            var validnum = /^[0-9]+$/;
            
            if(date=='')
            {
                alert("Please Select Date.");
                return false;   
            }
            else if(amount=='')
            {
                alert("Please Enter Amount.");
                return false;  
            }
            else if(!validnum.test(amount))
            {
                alert("Please Enter Valid Amount.");
                return false;  
            }
        }
        </script>
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
								<h1 class="fx" data-animate="fadeInLeft"><?php echo ($id) ? 'Edit' : 'Add';?> Payment</h1>
								<div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
									<span class="bold">You Are In:</span><a href="#">Home</a><span class="line-separate">/</span><span><?php echo ($id) ? 'Edit' : 'Add';?> Payment</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="sectionWrapper">
					<div class="container">
						<div class="row">
							<div class="cell-12 contact-form" >
			    				<h3 class="block-head"><?php echo ($id) ? 'Edit' : 'Add';?> Payment</h3>
                                <p><?php echo $msg;?></p>
                                <div class="cell-4">
    			    				<form action="" id="reg-form" method="post" onsubmit="return validate_form();">
    			    					<div class="form-input">
    			    						<label>Date<span class="red">*</span></label>
                                            <input class="form-control" id="date" name="date" type="date" value="<?php echo $data->date;?>" />
    			    					</div>
    			    					<div class="form-input">
    			    						<label>Amount <span class="red">*</span></label>
                                            <input id="amount" name="amount" type="text" value="<?php echo $data->amount;?>"/>
    			    					</div>
    			    					<div class="form-input">
                                            <input type="hidden" id="id" name="id" value="<?php echo $id;?>" />
                                            <input type="hidden" id="customer_id" name="customer_id" value="<?php echo $customer_id;?>" />
    			    						<input type="submit" class="btn btn-large main-bg" value="<?php echo ($id) ? 'Update' : 'Save';?> "/>&nbsp;&nbsp;
    			    					</div>
    			    				</form>
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