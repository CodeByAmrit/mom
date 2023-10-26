<?php
    function getMenu() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "momdb";
        
        // Create a connection
        $conn = new mysqli($servername, $username, $password, $database);
        
        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // SQL query to retrieve menu items
        $sql = "SELECT * FROM menu";
        
        // Execute the query
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            
            while ($row = $result->fetch_assoc()) {
                echo '<li>';
                echo '<span>' . $row['name'] . '</span>';
                echo '<span>$' . number_format($row['price'], 2) . '</span>';
                echo '<button>Add to Cart</button>';
                echo '</li>';
            }
            
        } else {
            echo 'No menu items available.';
        }
        
        // Close the connection
        $conn->close();
    }
        
    
?>