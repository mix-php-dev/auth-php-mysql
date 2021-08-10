<?php
session_start();
if(isset($_SESSION['user'])){
    header('location:profile.php');
    exit();
}
if(isset($_POST['submit'])){
 include 'conn-db.php';
   $password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
   $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);

   $errors=[];
   

   // validate email
   if(empty($email)){
    $errors[]="يجب كتابة البريد الاكترونى";
   }


   // validate password
   if(empty($password)){
        $errors[]="يجب كتابة  كلمة المرور ";
   }



   // insert or errros 
   if(empty($errors)){
   
      // echo "check db";

    $stm="SELECT * FROM users WHERE email ='$email'";
    $q=$conn->prepare($stm);
    $q->execute();
    $data=$q->fetch();
    if(!$data){
       $errors[] = "خطأ فى تسجيل الدخول";
    }else{
        
         $password_hash=$data['password']; 
         
         if(!password_verify($password,$password_hash)){
            $errors[] = "خطأ فى تسجيل الدخول";
         }else{
            $_SESSION['user']=[
                "name"=>$data['name'],
                "email"=>$email,
              ];
            header('location:profile.php');

         }
    }
     
    
   }
}

?>



<form action="login.php" method="POST">
<?php 
        if(isset($errors)){
            if(!empty($errors)){
                foreach($errors as $msg){
                    echo $msg . "<br>";
                }
            }
        }
    ?>
    <input type="text" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" name="email" placeholder="email"><br><br>
    <input type="password" name="password" placeholder="password"><br><br>
    <input type="submit" name="submit" value="Login">
    <br><br>
    <a href="register.php">register</a><br><br><br>
</form>