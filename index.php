<?php
session_start();
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
    <br><br><br>
    <?php 
        if(isset($_SESSION['user'])){
            ?>
            
            <a href="profile.php">profile</a><br><br><br>
            <?php
        }else{
            ?>
            <a href="register.php">register</a><br><br><br>
            <a href="login.php">login</a>
            <?php
        }
    ?>
    
    <br><br><br>
</body>
</html>