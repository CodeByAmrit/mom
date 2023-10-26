<?php 
    if (!isset($_SESSION['Name'])) {
        // header("Location: index.html");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Ordering Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="icon" href="img/LOGO.ico" type="image/icon type">
</head>
<body>
    <?php
    
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "momdb";
            
        // Create a connection
        $conn = new mysqli($servername, $username, $password, $database);

        
        
        
        function getMenu() {
            
            
            // Check the connection
            if ($GLOBALS['conn']->connect_error) {
                die("Connection failed: " . $GLOBALS['conn']->connect_error);
            }
            
            // SQL query to retrieve menu items
            $sql = "SELECT * FROM menu";
            
            // Execute the query
            $result = $GLOBALS['conn']->query($sql);
            
            if ($result->num_rows > 0) {
                
                while ($row = $result->fetch_assoc()) {
                    echo '<li>';
                    echo '<span>' . $row['coffee_name'] . '</span>';
                    echo '<span>$' . number_format($row['price'], 2) . '</span>';
                    echo '<button>Add to Cart</button>';
                    echo '</li>';
                }
                
            } else {
                echo 'No menu items available.';
            }
            
            // Close the connection
            // $GLOBALS['conn']->close();
        }
            
        
    ?>



    <header>
        <h1>Food Ordering Dashboard</h1>
        <div>
            <?php 
                echo  "Welcome  ";
                echo  $_SESSION['Name'];
            ?>
        </div>
           
    </header>
    <main>
        <form action="add_to_cart.php" method="post" class="menu">
           
            <section>
                <h2 >Menu</h2>
                <ul>
                <?php getMenu(); ?>
                </ul>
            </section>
            
        </form>
        <section class="cart">
            <h2>Cart</h2>
            <ul>
                
            </ul>
            <div class="total">
                <span>Total:</span>
                <span id="cart-total">$0.00</span>
            </div>
        </section>
    </main>
    <footer>
        <button id="checkout-button">Checkout</button>
        
        <a href="logOut.php"><button id="checkout-button">Log Out</button></a>
    </footer>

</body>
</html>
