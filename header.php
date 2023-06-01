<!-- Header Start -->
<div id="headWrapper" class="clearfix">
	
	<!-- top bar start -->
	<div class="top-bar">
	    <div class="container">
			<div class="row">
				<div class="cell-5">
				    
				</div>
				<div class="cell-7 right-bar">
		    		<ul class="right">
			    	    <?php if(!$_SESSION['customerid'] && !$_SESSION['pigmycollecterid']) { ?> 
                        <li><a href="admin" class=""><i class="fa fa-unlock-alt"></i> Admin Login</a></li>
                        <?php } else{ ?>
                        <li><a href="javascript:void(0);">&nbsp;</a></li>
                        <?php } ?>
			        </ul>
				</div>
			</div>
	    </div>
    </div>
    <!-- top bar end -->
    
    <header class="top-head">
	    <div class="container">
		    <div class="row">
		    	<div class="logo cell-3">
			    	<a href="index.php"></a>
			    </div>
			    <div class="cell-9 top-menu">
				    <!-- top navigation menu start -->
				    <nav class="top-nav">
					    <ul>
					      <li class="selected"><a href="index.php"><i class="fa fa-home"></i><span>Home</span></a></li>
                          <li><a href="aboutus.php"><i class="fa fa-copy"></i><span>About Us</span></a></li>
                          <?php if($_SESSION['customerid']){ ?> 
                          <li>
                            <a href="customer_dashboard.php"><i class="fa fa-copy"></i><span>Dashboard</span></a>
                            <ul>
                                <li><a href="customer_dashboard.php">Dashboard</a></li>
                                
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                          </li>
                          <li><a href="my_payments.php"><i class="fa fa-money"></i><span>My Payments</span></a></li>
                          <?php } else if($_SESSION['pigmycollecterid']) { ?>
                          <li>
                            <a href="pigmycollecter_dashboard.php"><i class="fa fa-copy"></i><span>Dashboard</span></a>
                            <ul>
                                <li><a href="pigmycollecter_dashboard.php">Dashboard</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                          </li>
                          <li>
                            <a href="customers.php"><i class="fa fa-users"></i><span>Customers</span></a>
                            <ul>
                                <li><a href="customers.php">Customers</a></li>
                                <li><a href="add_customer.php">Add Customer</a></li>
                            </ul>
                          </li>
                          <li><a href="payments.php"><i class="fa fa-money"></i><span> Payments</span></a></li>
                          <?php } else { ?>
                          
                          <li><a href="pigmycollecter_login.php"><i class="fa fa-lock"></i><span> Pigmy Collector Login</span></a></li>
                          <li><a href="customer_login.php"><i class="fa fa-lock"></i><span> Customer Login</span></a></li>
                          
                          <?php } ?>
					      <li><a href="contactus.php"><i class="fa fa-phone"></i><span>Contact Us</span></a></li>
					    </ul>
				    </nav>
				    
				</div>
		    </div>
	    </div>
    </header>
</div>
<!-- Header End -->