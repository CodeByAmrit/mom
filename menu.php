<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Coffee Shop Menu</title>
    <link rel="stylesheet" href="styles2.css" />
    <link rel="icon" href="img/LOGO.ico" type="image/icon type">
  </head>
  <body>
    <div class="container">
      <h1>Coffee Shop Menu</h1>
      <ul class="menu-list">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "momDB";
            
            
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) { die("Connection failed: " .
        $conn->connect_error); } $sql = "SELECT coffee_name, price FROM menu";
        $result = $conn->query($sql); if ($result->num_rows > 0) { while($row =
        $result->fetch_assoc()) { echo "
        <li>
          "; echo "<strong>" . strtoupper($row["coffee_name"]) . "</strong><br />"; echo
          "Price: $" . $row["price"] . "<br />"; echo "
        </li>
        "; } } else { echo "No items in the menu."; } $conn->close(); ?>
      </ul>
    </div>
  </body>
</html>
