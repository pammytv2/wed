<!-- index2.php -->
<?php
    // ฟังก์ชันในการตรวจสอบรหัสผ่าน
    function checkPassword($password, $confirm_password) {
        return $password === $confirm_password;
    }

    // ฟังก์ชันในการจัดรูปแบบวันเดือนปี
    function formatDate($day, $month, $year) {
        return "$day $month $year";
    }

    // รับค่าจากฟอร์ม
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];
    $terms = isset($_POST['terms']) ? true : false;

    // ตรวจสอบการกรอกข้อมูล
    if (!$terms) {
        echo "ไม่ได้ยอมรับข้อตกลง!!<br>";
    } elseif (!checkPassword($password, $confirm_password)) {
        echo "รหัสผ่านไม่ตรงกัน!!<br>";
    } else {
        // แสดงผลข้อมูลที่กรอก
        echo "<h2>ข้อมูลผู้ใช้:</h2>";
        echo "ชื่อ - สกุล: " . $first_name . " " . $last_name . "<br>";
        echo "เพศ: " . $gender . "<br>";
        echo "วันเกิด: " . formatDate($day, $month, $year) . "<br>";
        echo "Username: " . $username . "<br>";
        echo "Password: ****<br>";  // ไม่แสดงรหัสผ่านจริงเพื่อความปลอดภัย
        echo "E-mail: " . $email . "<br>";

        // ใช้ฟังก์ชันวันที่และเวลา
        echo "วันส่งแบบฟอร์ม: " . date("l F d, Y h:i:s A") . "<br>";
    }
?>
