<?php
error_reporting(0);
session_start();

require_once "inc/config.php";
require_once "inc/dbhelper.php";


class PigmyHelper
{
    
    function checkPigmyCollectorLogin()
    {
        $username=$_POST['username'];
        $password=$_POST['password'];

        $db=new Database();
        $db->open();
        $sql="SELECT * FROM `pigmy_collector` WHERE `username` ='".$username."' and `password`='".$password."' and status = 1";
        $result=$db->query($sql);
        $row=$db->fetchobject($result);
        return $row;   
    }
    
    function checkCustomerLogin()
    {
        $username=$_POST['username'];
        $password=$_POST['password'];

        $db=new Database();
        $db->open();
        $sql="SELECT * FROM `customers` WHERE `username` ='".$username."' and `password`='".$password."' and status = 1";
        $result=$db->query($sql);
        $row=$db->fetchobject($result);
        return $row; 
    }
    
    function customer_info($id)
    {
        $db=new Database();
        $db->open();
        $sql="SELECT * FROM `customers` WHERE `id` ='".$id."'";
        $result=$db->query($sql);
        $row=$db->fetchobject($result);
        return $row; 
    }
    
    function addCustomer()
    {
        $name       = $_POST['name'];
        $mobileno   = $_POST['mobileno'];
        $email      = $_POST['email'];
        $address    = $_POST['address'];
        $username   = $_POST['username'];
        $password   = $_POST['password'];
        
        $pigmycollecterid = $_SESSION['pigmycollecterid'];
        
        $id         = $_POST['id'];
              
        $db=new Database();
        $db->open();
        $sql = "";
        
        if($id)
        {
            $sql= "UPDATE `customers` SET `pigmycollecterid`= '".$pigmycollecterid."', `name`= '".$name."', `mobileno`='".$mobileno."', `email`='".$email."',`address`='".$address."', `username`='".$username."', `password`='".$password."' WHERE `id`=".$id;   
        }
        else
        {
            $sql    = "SELECT * FROM `customers` WHERE `username` ='".$username."'";
            
            $result = $db->query($sql);
            $row = $db->fetchobject($result);
            
            if($row->id > 0)
            {
                return false;
            }
                    
            $sql= "INSERT INTO `customers` (`id`, `pigmycollecterid`, `name`, `mobileno`, `email`,`address`, `username`, `password`) 
            VALUES (NULL, '".$pigmycollecterid."','".$name."', '".$mobileno."', '".$email."','".$address."', '".$username."', '".$password."');";   
        }
    
        $result = $db->query($sql);
        
        return $result;       
    }
    
    static function getCustomersList()
    {
        $db = new Database();
        $db->open();
        
        $extraSQL ='';
        $name     = trim($_POST['name']);
        
        if($name!='')
        {
            $extraSQL = " AND (`name` LIKE '%".$name."%')";
        }

        $sql    = "SELECT * FROM `customers` WHERE 1 AND `pigmycollecterid` = ".$_SESSION['pigmycollecterid']." ".$extraSQL;
        $result = $db->query($sql);
        ?>
        <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Customer Name</th>
            <th>Mobile No.</th>
            <th>Email</th>
            <th>User Name</th>
            <th width="15%">Actions</th>
        </tr>
        <?php
        if($result)
        {
            while($row = $db->fetcharray($result))
            {
                ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['mobileno'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['username'];?></td>
                    <td style="text-align: center;">
                        <a href="add_customer.php?id=<?php echo $row['id'];?>">Edit</a> |
                        <a href="add_payment.php?customer_id=<?php echo $row['id'];?>">Add Payment</a> 
                    </td>

                </tr>
                <?php
            }
        }
        ?>
        </table>
        <?php        
    }

    public function payment_info($id)
    {
        $db=new Database();
        $db->open();
        $sql="SELECT * FROM `payments` WHERE `id` ='".$id."'";
        $result=$db->query($sql);
        $row=$db->fetchobject($result);
        return $row; 
    }
    
    public function addPayment()
    {
        $customer_id= $_POST['customer_id'];
        $date       = $_POST['date'];
        $amount     = $_POST['amount'];
        
        $pigmycollecterid = $_SESSION['pigmycollecterid'];
        
        $id         = $_POST['id'];
              
        $db=new Database();
        $db->open();
        $sql = "";
        
        if($id)
        {
            $sql= "UPDATE `payments` SET `pigmycollecterid`= '".$pigmycollecterid."', `customer_id`= '".$customer_id."', `date`='".$date."', `amount`='".$amount."' WHERE `id`=".$id;   
        }
        else
        {      
            $sql= "INSERT INTO `payments` (`id`, `pigmycollecterid`, `customer_id`, `date`, `amount`) VALUES (NULL, '".$pigmycollecterid."','".$customer_id."', '".$date."', '".$amount."');";   
        }
    
        $result = $db->query($sql);
        
        return $result; 
    }
    
    public function getPaymentsList()
    {
        $db = new Database();
        $db->open();
        
        $extraSQL ='';
        $name     = trim($_POST['name']);
        
        if($name!='')
        {
            $extraSQL = " AND (b.`name` LIKE '%".$name."%')";
        }

        $sql    = "SELECT a.*, b.name FROM `payments` as a 
                   LEFT JOIN `customers` as b ON a.customer_id = b.id 
                   WHERE a.`pigmycollecterid` =".$_SESSION['pigmycollecterid']." ".$extraSQL." ORDER BY a.date DESC";
        $result = $db->query($sql);
        ?>
        <table class="table table-bordered">
        <tr>
            <th width="10%">ID</th>
            <th width="10%">Date</th>
            <th>Amount</th>
            <th>Customer Name</th>
            <th width="15%">Actions</th>
        </tr>
        <?php
        if($result)
        {
            while($row = $db->fetcharray($result))
            {
                ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo date('d/m/Y', strtotime($row['date']));?></td>
                    <td align="center"><?php echo $row['amount'];?></td>
                    <td align="center"><?php echo $row['name'];?></td>
                    <td align="center">
                        <a href="add_payment.php?customer_id=<?php echo $row['customer_id'];?>&id=<?php echo $row['id'];?>">Edit Payment</a>   
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        </table>
        <?php
    }
    
    public function getMyPaymentsList()
    {
        $db = new Database();
        $db->open();
        
        $extraSQL ='';
        
        $sql    = "SELECT a.*, b.name FROM `payments` as a 
                   LEFT JOIN `customers` as b ON a.customer_id = b.id 
                   WHERE a.`customer_id` =".$_SESSION['customerid']." ".$extraSQL." ORDER BY a.date DESC";
        $result = $db->query($sql);
        ?>
        <table class="table table-bordered">
        <tr>
            <th width="10%">ID</th>
            <th>Date</th>
            <th>Amount</th>
        </tr>
        <?php
        if($result)
        {
            while($row = $db->fetcharray($result))
            {
                ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo date('d/m/Y', strtotime($row['date']));?></td>
                    <td align="center"><?php echo $row['amount'];?></td>
                </tr>
                <?php
            }
        }
        ?>
        </table>
        <?php
    }
    
}
?>