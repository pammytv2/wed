<?php 
session_start();


$conn = new mysqli('localhost', 'root', '', 'mystore');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM customer WHERE Username = '$username'";
    $result = $conn->query($sql);


  if ($result->num_rows > 0) {
       
        $row = $result->fetch_assoc();
        
       
        if (password_verify($password, $row['password'])) {
          
            $_SESSION['username'] = $username;
            
           
            header('Location: show_customer.php');
            exit();
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "Username not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form method="POST" action="">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <input type="submit" value="Login">
</form>

</body>
</html>


