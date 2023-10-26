
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
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    
   
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
       
        if (password_verify($password, $row['password'])) {
            // header("Location: dashboard.php");
            if (isset($_SESSION['Name'])) {
                session_destroy();
            }else{
                session_start();
                $_SESSION['Name']= $row["name"];
                $_SESSION['UserName'] = $username;
                include 'dashboard.php';
            }
            
            
        }
        else {
            echo '<script>alert("| Invalid Password |")</script>';
        }
    }
    else{
        echo '<script>alert("| Email Not Found |")</script>';
    }
    
    
    
}
else{
    if (isset($_SESSION['Name'])) {
        header("Location: dashboard.php");
    }
    header("Location: index.html");
}
$conn->close();
?>