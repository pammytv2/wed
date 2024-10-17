<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

  
    $content = "ชื่อ: $firstname\nนามสกุล: $lastname\n";

   
    $file = fopen("myfile.txt", "w");
    if ($file) {
        fwrite($file, $content);
        fclose($file);
        echo "บันทึกข้อมูลสำเร็จ!";
    } else {
        echo "ไม่สามารถสร้างไฟล์ได้.";
    }
}
?>
