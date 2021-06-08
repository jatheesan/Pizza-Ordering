<?php 
    include('query.php');
    // session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Order</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <a href="#default" class="logo">PizzaMart</a>
        <div class="header-right">
            <a class="active" href="index.php">Home</a>
            <a  href="#contact">Contact</a>
            <a  href="order.php?orderpageSet=true">Order here</a>
            <a  href="order.php?loginpageSet=true">Login</a>
        </div>
    </div>

    <?php if(isset($_GET['orderpageSet'])) { ?>
    <div class="mediumform">
        <form method="post" action="query.php">
            
            <label for="name">Customer Name</label>
            <input type="text" name="name" id="name" placeholder="Customer Name">

            <label for="pno">Customer Phone No</label>
            <input type="text" name="pno" id="pno" placeholder="Customer Phone No">

            <label for="nic">NIC No</label>
            <input type="text" name="nic" id="nic" placeholder="NIC No">

            <label for="date">Delivery Date</label>
            <input type="date" name="date" id="date">
                
            <label for="type">Pizza Type</label>
            <select name="type" id="type">
                <option value="Tandoor Chicken">Tandoor Chicken</option>
                    <option value="Fiery Chicken">Fiery Chicken</option>
                    <option value="Chicken BBQ">Chicken BBQ</option>
                    <option value="Chicken Trio">Chicken Trio</option>
                    <option value="Mighty Meat - Chicken">Mighty Meat - Chicken</option>
                    <option value="Seafood Supremo">Seafood Supremo</option>
            </select>

            <label>Pizza Size</label>
            <select name="size" id="size">
                <option value="personal">Personal</option>
                <option value="medium">Medium</option>
                <option value="large">Large</option>
            </select>
            <!-- <label></label><input type="checkbox" name="size[]" id="size" value="personal">Personal</label>
            <label></label><input type="checkbox" name="size[]" id="size" value="medium">Medium</label>
            <label></label><input type="checkbox" name="size[]" id="size" value="large">Large</label>   -->
            
            <label for="qyt">Quantity</label></td>
            <input type="number" name="qyt" id="qyt"></td>

            <div style="display:none">
                <label>Order_Status</label></td>
                <label><input type="checkbox" name="status" id="status" value="new order" checked>New Order</label>
                <label><input type="checkbox" name="status" id="status" value="`delivered`">Delivered</label>
            </div>
                <!-- <td>&nbsp;</td> -->
                <!-- <td><input type="submit" name="order" value="order"></td> -->
            <button type="submit" name="order" >Order</button>
        </form>
    </div>
    <?php } ?>

    <?php if(isset($_GET['loginpageSet']) || ($_SESSION['loginadmin']=="loginanmin")) { ?> 
        <div class="smallform">
            <form action="query.php" method="post">
                <label for="uname">User Name</label>
                <input type="text" name="uname" id="uname" placeholder>

                <label for="password">Password</label>
                <input type="text" name="password" id="password" placeholder>

                <button type="submit" name="login" >login</button>
            </form>
        </div>
    <?php } ?>

    <?php if(isset($_SESSION['message'])): ?>
        <div class="meg">
            <?php 
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
    </div>
    <?php endif;  ?>
</body>
</html>