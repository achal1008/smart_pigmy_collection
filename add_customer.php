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

        
        $id         = $_GET['id'];

        $task=$_GET['task'];

        if($_POST)
        {
            $s = (!$id) ? 'Added' : 'Updated';
            $r = $helper->addCustomer();
            if($r)
            {
                $msg='<div data-animate="fadeInRight" class="box success-box fx animated fadeInRight" style="">
						<a href="#" class="close-box"><i class="fa fa-times"></i></a>
						<h3>Customer '.$s.' Successfully.</h3>
					  </div>';
            }
            else
            {
                if($id)
                {
                    $msg='<div data-animate="fadeInLeft" class="box error-box fx animated fadeInLeft" style="">
    						<a href="#" class="close-box"><i class="fa fa-times"></i></a>
    						<h3>Customer Not '.$s.'.</h3>
    					  </div>';
                }
                else
                {
                    $msg='<div data-animate="fadeInLeft" class="box error-box fx animated fadeInLeft" style="">
    						<a href="#" class="close-box"><i class="fa fa-times"></i></a>
    						<h3>User Name already exists.</h3>
    					  </div>';
                }
            }
        }
        
        $data   = $helper->customer_info($id);
        
        ?>
        <script type="text/javascript">
        function validate_form()
        {
            var name = document.getElementById("name").value;
            var mobileno = document.getElementById("mobileno").value;
            var email = document.getElementById("email").value;
            var address = document.getElementById("address").value;
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            
            var validchar = /^[A-Z a-z]+$/;
            
            var typeValue = false;
    
            if(name=='')
            {
                alert("Please Enter Name.");
                return false;   
            }
            else if(!validchar.test(name))
            {
                alert("Name should not be numeric.");
                return false;
            }
            else if(mobileno=='')
            {
                alert("Please Enter Mobile Number.");
                return false;  
            }
            else if(isNaN(mobileno))
            {
                alert("Mobile Number should be numeric.");
                return false;  
            }
            else if(checkInternationalPhone(mobileno)==false)
            {
                alert("Please Enter a Valid Mobile Number");
        		return false;
                
            }
            else if(email=='')
            {
                alert("Please Enter Email Address.");
                return false;
            }
            else if(validateEmail(email))
            {
                alert("Please Enter Valid Email Address.");
                return false;
            }
            else if(address=='')
            {
                alert("Please Enter Address.");
                return false;
            }
            else if(username=='')
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
        
        function validateEmail(email)
        {
            var atpos  = email.indexOf("@");   // The indexOf() method returns the position of the first occurrence of a specified value in a string. // Default value of start is 0  
            //alert(atpos);
            var dotpos = email.lastIndexOf(".");  // The lastIndexOf() method returns the position of the last occurrence of a specified value in a string. // Default value of start is 0  
            //alert(dotpos);
            
            if((atpos<1) || (dotpos<(atpos+2)) || (dotpos+2>=email.length))  
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        
        // Declaring required variables
        var digits = "0123456789";
        // non-digit characters which are allowed in phone numbers
        var phoneNumberDelimiters = "()- ";
        // characters which are allowed in international phone numbers
        // (a leading + is OK)
        var validWorldPhoneChars = phoneNumberDelimiters + "+";
        // Minimum no of digits in an international phone no.
        var minDigitsInIPhoneNumber = 10;
        
        function isInteger(s)
        {   var i;
            for (i = 0; i < s.length; i++)
            {   
                // Check that current character is number.
                var c = s.charAt(i);
                if (((c < "0") || (c > "9"))) return false;
            }
            // All characters are numbers.
            return true;
        }
        
        function trim(s)
        {   var i;
            var returnString = "";
            // Search through string's characters one by one.
            // If character is not a whitespace, append to returnString.
            for (i = 0; i < s.length; i++)
            {   
                // Check that current character isn't whitespace.
                var c = s.charAt(i);
                if (c != " ") returnString += c;
            }
            return returnString;
        }
        
        function stripCharsInBag(s, bag)
        {   var i;
            var returnString = "";
            // Search through string's characters one by one.
            // If character is not in bag, append to returnString.
            for (i = 0; i < s.length; i++)
            {   
                // Check that current character isn't whitespace.
                var c = s.charAt(i);
                if (bag.indexOf(c) == -1) returnString += c;
            }
            return returnString;
        }
        
        function checkInternationalPhone(strPhone){
            var bracket=3;
            strPhone=trim(strPhone);
            if(strPhone.indexOf("+")>1) return false;
            if(strPhone.indexOf("-")!=-1)bracket=bracket+1;
            if(strPhone.indexOf("(")!=-1 && strPhone.indexOf("(")>bracket)return false;
            var brchr=strPhone.indexOf("(");
            if(strPhone.indexOf("(")!=-1 && strPhone.charAt(brchr+2)!=")")return false;
            if(strPhone.indexOf("(")==-1 && strPhone.indexOf(")")!=-1)return false;
            s=stripCharsInBag(strPhone,validWorldPhoneChars);
            return (isInteger(s) && s.length >= minDigitsInIPhoneNumber);
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
								<h1 class="fx" data-animate="fadeInLeft"><?php echo ($id) ? 'Edit' : 'Add';?> Customer</h1>
								<div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
									<span class="bold">You Are In:</span><a href="#">Home</a><span class="line-separate">/</span><span><?php echo ($id) ? 'Edit' : 'Add';?> Customer</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="sectionWrapper">
					<div class="container">
						<div class="row">
							<div class="cell-7 contact-form" >
			    				<h3 class="block-head"><?php echo ($id) ? 'Edit' : 'Add';?> Customer</h3>
                                <p><?php echo $msg;?></p>
			    				<form action="" id="reg-form" method="post" onsubmit="return validate_form();">
			    					<div class="form-input">
			    						<label>Name<span class="red">*</span></label><input id="name" name="name" type="text" value="<?php echo $data->name;?>" />
			    					</div>
			    					<div class="form-input">
			    						<label>Mobile No. <span class="red">*</span></label><input id="mobileno" name="mobileno" type="text" maxlength="10" value="<?php echo $data->mobileno;?>"/>
			    					</div>
			    					<div class="form-input">
			    						<label>Email<span class="red">*</span></label><input id="email" name="email" type="text" value="<?php echo $data->email;?>"/>
			    					</div>
                                    <div class="form-input">
			    						<label>Address<span class="red">*</span></label><input id="address" name="address" type="text" value="<?php echo $data->address;?>"/>
			    					</div>
                                    <div class="form-input">
			    						<label>User Name <span class="red">*</span></label><input id="username" name="username" type="text" value="<?php echo $data->username;?>"/>
			    					</div>
                                    <div class="form-input">
			    						<label>Password<span class="red">*</span></label><input id="password" name="password" type="password" value="<?php echo $data->password;?>"/>
			    					</div>
			    					<div class="form-input">
                                        <input type="hidden" name="id" value="<?php echo $id;?>" />
			    						<input type="submit" class="btn btn-large main-bg" value="<?php echo ($id) ? 'Update' : 'Save';?> "/>&nbsp;&nbsp;
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