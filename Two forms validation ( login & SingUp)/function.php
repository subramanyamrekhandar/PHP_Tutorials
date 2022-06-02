<?php
include("config.php");

 if(isset($_POST['Submit']))
   {
       $username = $_POST['username'];
       $password = $_POST['password'];
  
       $Email = $_POST['Email'];

       $result = mysqli_query($mysqli,"INSERT INTO register values('','$username', '$password',  '$Email')");

       if($result)
       {
           header("Location:index.php");
       }
       else{
           echo "failed to insert file";
       }
   }




?>
