<?php
error_reporting(0);
require_once "pigmyhelper.php";
$helper = new PigmyHelper();
if($_POST)
{
    $r = $helper->checkPigmyCollectorLogin();
    if($r)
    {
        $_SESSION['pigmycollecterid'] = $r->id;
        $_SESSION['username']         = $r->username;
        echo "<script>window.location='pigmycollecter_dashboard.php';</script>";
    }
    else
    {
        $_SESSION['pigmycollecterid']= '';
        $_SESSION['username']        = '';
        echo "<script>window.location='pigmycollecter_login.php?error=1';</script>";
    }
}
?>    

