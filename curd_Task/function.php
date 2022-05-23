<?php
include("config.php");

 if(isset($_POST['submit']))
   {
       $name = $_POST['name'];
       $password = $_POST['password'];
       $gender = $_POST['gender'];
       $Gmail = $_POST['Gmail'];

       $result = mysqli_query($mysqli,"INSERT INTO form values('','$name', '$password', '$gender', '$Gmail')");

       if($result)
       {
           header("Location:index.html");
       }
       else{
           echo "failed to insert file";
       }
   }




?>
