<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location:login.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    name : <?php echo $_SESSION['user']['name']; ?><br><br>
    email : <?php echo $_SESSION['user']['email']; ?><br><br>
    <br><br>
    <a href="logout.php">logout</a>

    <br><br>
    <a href="index.php">home</a>
</body>
</html>