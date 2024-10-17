<?php

$conn = new mysqli('localhost', 'root', '1234', 'mystore');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];

  
    $sql = "SELECT * FROM customer WHERE Customer_id = $id";
    $result = $conn->query($sql);
    $customer = $result->fetch_assoc();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $birthdate = $_POST['birthdate'];
    $address = $_POST['address'];
    $province = $_POST['province'];
    $zipcode = $_POST['zipcode'];
    $phonenumber = $_POST['phonenumber'];
    $description = $_POST['description'];
    $username = $_POST['username'];

    $sql = "UPDATE customer 
            SET Customer_Name = '$name', Customer_LastName = '$lastname', Gender = '$gender', Age = $age, Birthdata = '$birthdate', 
                Address = '$address', Province = '$province', Zipcode = '$zipcode', PhoneNumber = '$phonenumber', 
                Customer_Description = '$description', Username = '$username' 
            WHERE Customer_id = $id";

    // ตรวจสอบการอัปเดต
    if ($conn->query($sql) === TRUE) {
        echo "Customer updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Customer</title>
</head>
<body>

<h2>Edit Customer</h2>
<form method="POST">
    Name: <input type="text" name="name" value="<?php echo $customer['Customer_Name']; ?>" required><br><br>
    Last Name: <input type="text" name="lastname" value="<?php echo $customer['Customer_LastName']; ?>" required><br><br>
    Gender: 
    <select name="gender" required>
        <option value="Male" <?php if ($customer['Gender'] == 'Male') echo 'selected'; ?>>Male</option>
        <option value="Female" <?php if ($customer['Gender'] == 'Female') echo 'selected'; ?>>Female</option>
    </select><br><br>
    Age: <input type="number" name="age" value="<?php echo $customer['Age']; ?>" required><br><br>
    Birthdate: <input type="date" name="birthdate" value="<?php echo $customer['Birthdata']; ?>" required><br><br>
    Address: <input type="text" name="address" value="<?php echo $customer['Address']; ?>" required><br><br>
    
    Province:
    <select name="province" required>
        <option value="เชียงใหม่" <?php if ($customer['Province'] == 'เชียงใหม่') echo 'selected'; ?>>เชียงใหม่</option>
        <option value="เชียงราย" <?php if ($customer['Province'] == 'เชียงราย') echo 'selected'; ?>>เชียงราย</option>
        <option value="ลำพูน" <?php if ($customer['Province'] == 'ลำพูน') echo 'selected'; ?>>ลำพูน</option>
        <option value="ลำปาง" <?php if ($customer['Province'] == 'ลำปาง') echo 'selected'; ?>>ลำปาง</option>
        <option value="พะเยา" <?php if ($customer['Province'] == 'พะเยา') echo 'selected'; ?>>พะเยา</option>
        <option value="แพร่" <?php if ($customer['Province'] == 'แพร่') echo 'selected'; ?>>แพร่</option>
        <option value="น่าน" <?php if ($customer['Province'] == 'น่าน') echo 'selected'; ?>>น่าน</option>
        <option value="แม่ฮ่องสอน" <?php if ($customer['Province'] == 'แม่ฮ่องสอน') echo 'selected'; ?>>แม่ฮ่องสอน</option>
    </select><br><br>
    
    Zipcode: <input type="text" name="zipcode" value="<?php echo $customer['Zipcode']; ?>" required><br><br>
    Phone Number: <input type="text" name="phonenumber" value="<?php echo $customer['PhoneNumber']; ?>" required><br><br>
    Description: <textarea name="description"><?php echo $customer['Customer_Description']; ?></textarea><br><br>
    Username: <input type="text" name="username" value="<?php echo $customer['Username']; ?>" required><br><br>
    <input type="submit" value="Update Customer">
</form>

<a href
