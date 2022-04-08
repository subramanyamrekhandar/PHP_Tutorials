<?php
include("config.php");
  if(isset($_POST['submit']) {
   
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phoneCode = $_POST['phoneCode'];
    $phone = $_POST['phone'];

    $result=mysqli_query($mysqli,"INSERT INTO register values('$username', '$password', '$gender', '$email', '$phoneCode','$phone')");
   }
    if($result)
    {
    header("Location:insert.php");
    } 
    else{
        echo "failed"
    }
   
}



?>