<?php

session_start();

if(!isset($_SESSION['username'])){
    header('location: login.php');
    exit();
}







$conn = new mysqli('localhost', 'root', '', 'mystore');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM customer";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer List</title>
</head>
<body>

<h2>Customer List</h2>

<a href="add_customer.php">Add New Customer</a><br><br>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Age</th>
        <th>Birthdate</th>
        <th>Address</th>
        <th>Province</th>
        <th>Zipcode</th>
        <th>Phone Number</th>
        <th>Description</th>
        <th>Username</th>
        <th>Action</th>
    </tr>
    <?php
    // แสดงข้อมูลลูกค้าในตาราง
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['Customer_id']}</td>
                    <td>{$row['Customer_Name']}</td>
                    <td>{$row['Customer_LastName']}</td>
                    <td>{$row['Gender']}</td>
                    <td>{$row['Age']}</td>
                    <td>{$row['Birthdata']}</td>
                    <td>{$row['Address']}</td>
                    <td>{$row['Province']}</td>
                    <td>{$row['Zipcode']}</td>
                    <td>{$row['PhoneNumber']}</td>
                    <td>{$row['Customer_Description']}</td>
                    <td>{$row['Username']}</td>
                    <td>
                        <a href='edit_customer.php?id={$row['Customer_id']}'>Edit</a>
                        <a href='delete_customer.php?id={$row['Customer_id']}' onclick='return confirm(\"Are you sure you want to delete this customer?\");'>Delete</a>
                    </td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='13'>No customers found</td></tr>";
    }
    ?>
</table>

</body>
</html>

<?php
$conn->close();
?>
