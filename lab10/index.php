<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
</head>
<body>
    <h2>Form Submission</h2>
    <form action="writefile.php" method="post">
        <label for="firstname">Firstname:</label>
        <input type="text" id="firstname" name="firstname" required><br><br>
        <label for="lastname">Lastname:</label>
        <input type="text" id="lastname" name="lastname" required><br><br>
        <input type="submit" value="ส่งข้อมูล">
    </form>
</body>
</html>
