<?php

$conn = new mysqli('localhost', 'root', '', 'mystore');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

 
    $sql = "INSERT INTO customer (Customer_Name, Customer_LastName, Gender, Age, Birthdata, Address, Province, Zipcode, PhoneNumber, Customer_Description, Username, password)
            VALUES ('$name', '$lastname', '$gender', $age, '$birthdate', '$address', '$province', '$zipcode', '$phonenumber', '$description', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New customer added successfully";
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
    <title>Add Customer</title>
    <script>
        function validateForm() {
            let name = document.forms["customerForm"]["Customer_Name"].value;
            let lastName = document.forms["customerForm"]["Customer_LastName"].value;
            let gender = document.forms["customerForm"]["Gender"].value;
            let age = document.forms["customerForm"]["Age"].value;
            let birthdate = document.forms["customerForm"]["Birthdata"].value;
            let address = document.forms["customerForm"]["Address"].value;
            let province = document.forms["customerForm"]["Province"].value;
            let zipcode = document.forms["customerForm"]["Zipcode"].value;
            let phoneNumber = document.forms["customerForm"]["PhoneNumber"].value;
            let username = document.forms["customerForm"]["Username"].value;
            let password = document.forms["customerForm"]["password"].value;


            if (name == "" || lastName == "" || gender == "" || age == "" || birthdate == "" || address == "" || province == "" || zipcode == "" || phoneNumber == "" || username == "" || password == "") {
                alert("Please fill out all fields.");
                return false;  // หยุดการส่งฟอร์ม
            }
            return true;
        }







    </script>
</head>
<body>

<h2>Add New Customer</h2>
<form  name="customerForm" method="POST" action="" onsubmit="return validateForm()">
    Name: <input type="text" name="name" required><br><br>
    Last Name: <input type="text" name="lastname" required><br><br>
    Gender: 
    <select name="gender" required>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select><br><br>
    Age: <input type="number" name="age" required><br><br>
    Birthdate: <input type="date" name="birthdate" required><br><br>
    Address: <input type="text" name="address" required><br><br>
    
    Province:
    <select name="province" required>
        <option value="เชียงใหม่">เชียงใหม่</option>
        <option value="เชียงราย">เชียงราย</option>
        <option value="ลำพูน">ลำพูน</option>
        <option value="ลำปาง">ลำปาง</option>
        <option value="พะเยา">พะเยา</option>
        <option value="แพร่">แพร่</option>
        <option value="น่าน">น่าน</option>
        <option value="แม่ฮ่องสอน">แม่ฮ่องสอน</option>
    </select><br><br>
    
    Zipcode: <input type="text" name="zipcode" required><br><br>
    Phone Number: <input type="text" name="phonenumber" required><br><br>
    Description: <textarea name="description"></textarea><br><br>
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <input type="submit" value="Add Customer">
</form>

<a href="show_customer.php">Back to Customer List</a>

</body>
</html>
