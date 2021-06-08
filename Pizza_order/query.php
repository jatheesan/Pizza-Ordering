<?php 
    session_start();

    $con = mysqli_connect("localhost", "root", "", "food_order");
    if(!$con)
    {
        echo "Unable to establish connection ".mysqli_error();
    }

        $name = "";
        $pno = "";
        $nic = "";
        $date = "";
        $type = "";
        $size = "";
        $qyt = "";
        $status = "";

    if(isset($_POST['order']))
    {
        $name = $_POST['name'];
        $pno = $_POST['pno'];
        $nic = $_POST['nic'];
        $date = $_POST['date'];
        $type = $_POST['type'];
        $size = $_POST['size'];
        $qyt = $_POST['qyt'];
        $status = $_POST['status'];

       //$sql = "INSERT INTO `pizza_order`(`name`, `pno`, `nic`, `date`, `type`, `size`, `qyt`) VALUES ('$name', '$pno', '$nic', '$date', '$type', '$size', '$qyt')";
        $sql1 = "INSERT INTO `pizza_order`(`Customer Name`, `Phone_no`, `NIC_no`, `Date`, `Type`, `Size`, `Quantity`, `Order_Status`) VALUES ('$name', '$pno', '$nic', '$date', '$type', '$size', '$qyt', '$status')";
        $result1 = mysqli_query($con, $sql1);
        $sql2 =  "INSERT INTO `delivered`(`Customer Name`, `phone_No`, `NIC_no`, `Date`, `Type`, `Size`, `Quantity`, `Order_Status`) VALUES ('$name', '$pno', '$nic', '$date', '$type', '$size', '$qyt', '$status')";
        $result2 = mysqli_query($con, $sql2);
        $_SESSION['message'] = "Your Order is Successfully Added!!!";
        header('location: index.php');
    }
        $uname = "";
    if(isset($_POST['login']))
    {
        $uname = $_POST['uname'];
        //$password = $_POST['password'];
        //echo $uname;
        $sql = "SELECT * FROM `admin` WHERE username = '$uname'";
        $un = mysqli_query($con, $sql);
        //$row = mysqli_fetch_array($un);
        //echo $row['username'];

        if(mysqli_fetch_row($un) != 0)
        {
            $password = $_POST['password'];
             $sqls = "SELECT `password` FROM `admin` WHERE username = '$uname'";
             $paw = mysqli_query($con,$sqls);
             $pw = mysqli_fetch_array($paw);
             //echo $pw['password'];
            if($pw['password'] == $password)
            {
                $_SESSION['login'] = "login";
                header('location: admin.php');
            }
            else{
                $_SESSION['message'] = "Password Incorrect!";
                $_SESSION['loginadmin'] = "loginanmin";
                header('location: order.php');
            }
        }
        else{
            $_SESSION['message'] = "You are not allowed here! Add admin menualy then you are allowed here!!!";
            $_SESSION['loginadmin'] = "loginanmin";
            header('location: order.php');
        }
    }

    // if(isset($_POST['update']))
    // {
    //     $id = $_POST['id'];
    //     $status = $_POST['status'];

    //     $sql = "UPDATE `pizza_order` SET `Order_Status`= '$status' WHERE Id = '$id'";
    //     $result = mysqli_query($con, $sql);
    //     $_SESSION['message'] = "Order status is Successfully Updated!!!";
    //     header('location: admin.php');
    // }

    if(isset($_GET['deliver']))
    {
        $id = $_GET['deliver'];
        $sql = "DELETE FROM `pizza_order` WHERE Id = $id";
        $result = mysqli_query($con, $sql);
        $_SESSION['message'] = "Order Delevered Successfully!!!";
        header('location: admin.php');
    }
?>