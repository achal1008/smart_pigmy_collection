<?php
error_reporting(0);
require_once "pigmyhelper.php";
$helper = new PigmyHelper();
if($_POST)
{
    $r = $helper->checkCustomerLogin();
    if($r)
    {
        $_SESSION['customerid'] = $r->id;
        $_SESSION['username']         = $r->username;
        echo "<script>window.location='customer_dashboard.php';</script>";
    }
    else
    {
        $_SESSION['customerid']= '';
        $_SESSION['username']        = '';
        echo "<script>window.location='customer_login.php?error=1';</script>";
    }
}
?>    

