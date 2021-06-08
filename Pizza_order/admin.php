<?php include "query.php"; ?>
<?php
    $con = mysqli_connect("localhost", "root", "", "food_order");
    if(!$con)
    {
        echo "Unable to establish connection ".mysqli_error();
    }
    $sql = "SELECT * FROM `pizza_order`";
    $results = mysqli_query($con, $sql);
?>

<?php 
        
    if(isset($_GET['refreshpageSet']))
    {
        unset($_POST['today']);
        //set($_POST['login']);
        $_SESSION['login'] = "login";
        header('location: admin.php');
            //header("Refresh:0; url=query.php");
    }
?>

<?php 
        
    if(isset($_GET['logoutpageSet']))
    {
        $_SESSION['message'] = " Logout Successfully!!!";
        header('location: index.php');
            //header("Refresh:0; url=query.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js"></script>
    <style>
        {box-sizing: border-box;}
    </style>
</head>
<body>
    <div class=header>
        <a href="#default" class="logo">PizzaMart</a>
        <div class="header-right">
            <a class="active" href="index.php">Home</a>
            <!-- <a  href="#contact">Contact</a> -->
            <a  href="admin.php?refreshpageSet=true">Refresh</a>
            <a  href="admin.php?logoutpageSet=true">Logout</a>
        </div>
    </div>
    <?php 
        if(isset($_GET['edit']))
        {
            $ids = $_GET['edit'];
            echo $_GET['edit'];
            mysqli_query($con, "DELETE FROM `pizza_order` WHERE `Id` = '$ids'");
            mysqli_query($con, "UPDATE `delivered` SET `Order_Status`= 'delivered' WHERE `Id` = '$ids'");
        }
    ?>
    
    <div class="form">
    <?php if($_SESSION['login']=="login"){ ?>
    <div class="container"><h2>Orders</h2></div>
    <div class="container">
        <table class="center">
            <tr>
                <th>ID</th>
                <th>Customer-Name</th>
                <th>Customer Phone No</th>
                <th>NIC No</th>
                <th>Delivery Date</th>
                <th>Pizza Type</th>
                <th>Pizza Size</th>
                <th>Quantity</th>
                <th>Order_Status</th>
                <!-- <th>Delete Order</th> -->
            </tr>

            <?php while($row = mysqli_fetch_array($results)) { ?>

            <tr>
                <td><?php echo $row['Id']; ?></td>
                <td><?php echo $row['Customer Name']; ?></td>
                <td><?php echo $row['Phone_no']; ?></td>
                <td><?php echo $row['NIC_no']; ?></td>
                <td><?php echo $row['Date']; ?></td>
                <td><?php echo $row['Type']; ?></td>
                <td><?php echo $row['Size']; ?></td>
                <td><?php echo $row['Quantity']; ?></td>
                <td><?php echo $row['Order_Status']; ?></td>
                <!-- <td><a href="today_order.php? id=<?php //echo $row['Id']; ?>" class="edit_btn"><?php //echo $row['Order_Status']; ?></a></td>
                <td><a href="login_query.php? deliver=<?php //echo $row['Id']; ?>" class="del_btn"> Deliver</a></td> -->
            </tr>

            <?php } ?>
        </table>
    </div>

    <div class=container>
        <form action="admin.php" method="post">
            <label for="today"><h2>Enter date to view today orders</h2></label><br>
            <input class="inputto" type="date" name="today" id="today">
            <input type="submit" name="submit" value="Pizza Orders">
        </form>
    </div>
    <div class="container">
        <?php 
            if(isset($_POST['submit'])){
                $date = $_POST['today'];
                $list = mysqli_query($con, "SELECT * FROM `delivered` WHERE `Date` = '$date'");

        ?>
        <table class="center">
            <tr>
                <th>ID</th>
                <th>Customer-Name</th>
                <th>Customer Phone No</th>
                <th>NIC No</th>
                <th>Delivery Date</th>
                <th>Pizza Type</th>
                <th>Pizza Size</th>
                <th>Quantity</th>
                <th>Order_Status</th>
                <th>Bill</th>
                <th>Delivery Coformation</th>
            </tr>

            <?php while($row1 = mysqli_fetch_array($list)) { ?>

            <tr>
                <td><?php echo $row1['Id']; ?></td>
                <td><?php echo $row1['Customer Name']; ?></td>
                <td><?php echo $row1['phone_No']; ?></td>
                <td><?php echo $row1['NIC_no']; ?></td>
                <td><?php echo $row1['Date']; ?></td>
                <td><?php echo $row1['Type']; ?></td>
                <td><?php echo $row1['Size']; ?></td>
                <td><?php echo $row1['Quantity']; ?></td>
                <td><?php echo $row1['Order_Status']; ?></td>
                <td>
                    <?php
                        $idd = $row1['Id'];
                        $type = $row1['Type'];
                        $size = $row1['Size'];
                        $price = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `pricelist` WHERE `Pizza_type` = '$type' and `Pizza_size` = '$size'"));
                        $bill = $price['price'] * $row1['Quantity'];
                        mysqli_query($con, "UPDATE `delivered` SET `Bill`='$bill' WHERE `Id` = '$idd'");
                        echo $bill;
                    ?>
                </td>
                <td><a href="admin.php?edit=<?php echo $row1['Id']; ?>"> Delivered?</a></td>
            </tr>
            <?php } ?>
        </table>
        <?php } ?>
    </div>

    <div class=container>
        <h2>Enter date to view today orders</h2>
        <form action="admin.php" method="post">
            <label for="to_date">Delivery Date</label><br>
            <input class="inputto" type="date" name="to_date" id="to_date">
            <label for="type">Pizza Type</label>
            <select name="type" id="type">
                <option value="Tandoor Chicken">Tandoor Chicken</option>
                    <option value="Fiery Chicken">Fiery Chicken</option>
                    <option value="Chicken BBQ">Chicken BBQ</option>
                    <option value="Chicken Trio">Chicken Trio</option>
                    <option value="Mighty Meat - Chicken">Mighty Meat - Chicken</option>
                    <option value="Seafood Supremo">Seafood Supremo</option>
            </select>
            <input type="submit" name="revenue" value="Revenue">
        </form>
    </div>
    <div class="container">
        <?php   if(isset($_POST['revenue'])){
            
                $date = $_POST['to_date'];
                $type = $_POST['type'];
                $rev = mysqli_query($con, "SELECT sum(Bill) FROM `delivered` WHERE `Date` = '$date' and `Type` = '$type' and `Order_Status` = 'delivered'");
                $revenue = mysqli_fetch_array($rev);
        ?>
        <h2>Revenenue of <?php echo $type; ?> Pizza in <?php echo $date; ?> is <?php echo $revenue['sum(Bill)']; ?> /=</h2>
        <?php } ?>
        
    </div>
    <?php } ?>
    </div>
</body>
</html>