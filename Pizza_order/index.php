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
            <a  href="#contact">Contact</a>
            <a  href="order.php?orderpageSet=true">Order here</a>
            <a  href="order.php?loginpageSet=true">Login</a>
        </div>
    </div>
    <div>
        <div class="image">
            <img class="mySlides" src="pizza1.jpg">
            <img class="mySlides" src="pizza2.jpg">
            <img class="mySlides" src="pizza3.jpg">
            <img class="mySlides" src="pizza4.jpg">
        </div>
        <script>
            var myIndex = 0;
            carousel();
        </script>
    </div>
    
    <div class="footer">
        <div class="meg">
            <?php 
            if(isset($_SESSION['message']))
            {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
            }
            ?>
            <!-- <?php //endif; ?> -->
        </div>
        <footer>&copy; Copyright 2020 SJ_Creative Sites</footer>
    </div>
    <!-- <div class="row">
        <div class="column">
            <div class="card">
                <img src="/w3images/jeans3.jpg" alt="Denim Jeans" style="width:100%">
                <h1>Tailored Jeans</h1>
                <p class="price">$19.99</p>
                <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
                <p><button>Add to Cart</button></p>
            </div>
        </div> -->
        
</body>
</html>