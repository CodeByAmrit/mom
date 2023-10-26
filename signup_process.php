<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "momDB";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, username, password) VALUES ('$name','$username', '$password')";
        try {
            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("Account Created Successfully !!")</script>';
                
        
            }
        } 
        catch (Exception $sql) {
            echo '<script>alert("Error | There may be dublicated entry found ! ")</script>';
            // header("Location: index.html");
    
            // exit;
        }
    
    }


    $conn->close();

?>
<script>
  
    window.location.replace("index.html");
</script>
</body>
</html>