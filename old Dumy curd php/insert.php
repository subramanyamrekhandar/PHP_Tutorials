<?php
//include ("config.php");
//$result=mysqli_query($mysqli,"SELECT* from register ORDER by id DESC");



$usernameErr = $passwordErr = $genderErr = $emailErr = $phoneErr = "";
$username = $password = $gender = $email = $phone = "";

$flag = true;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "Name is required";
    $flag = false;
  } else {
    $username = test_input($_POST["username"]);
  }
  
  if (empty($_POST["password"])) {
    $passwordErr = "Name is required";
    $flag = false;
  } else {
    $password = test_input($_POST["password"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
    $flag = false;
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $flag = false;
  } else {
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST["phone"])) {
    $phone = "";
    $flag = false;
  } else {
    $phone = test_input($_POST["phone"]);
  }
}

/// database connection
if ($flag) {
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "formphp";

$mysqli =mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
if(isset($_POST['submit']))
    {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
   // $phoneCode = $_POST['phoneCode'];
    $phone = $_POST['phone'];
    
    $result=mysqli_query($mysqli,"INSERT INTO register values('$username', '$password', '$gender', '$email','','$phone','')");
  
    if($result)
    {
     
    } 
    else{
        echo "failed";
    }
   
    }
}   
$result=mysqli_query($mysqli,"SELECT* from register ORDER by id DESC");


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet"  href="main.css">
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
  <table>
   <tr>
    <td>Name :</td>
    <td><input type="text" name="username" required></td>
     <span class="error"> <?php echo $usernameErr;?></span>
   </tr><br>
   <tr>
    <td>Password :</td>
    <td><input type="password" name="password" required></td>
        <span class="error"> <?php echo $passwordErr;?></span>
   </tr>
   <tr>
    <td>Gender :</td>
    <td>
     <input type="radio" name="gender" value="m" required>Male
     <input type="radio" name="gender" value="f" required>Female
     <span class="error"> <?php echo $genderErr;?></span>
    </td>
   </tr>
   <tr>
    <td>Email :</td>
    <td><input type="email" name="email" required></td>
    <span class="error"> <?php echo $emailErr;?></span>
   </tr> 
   <tr>
    <td>Phone no :</td>
     <td><input type="phone" name="phone" required></td>
     <span class="error"><?php echo $phoneErr;?></span>
   </tr>
   <tr>
    <td><input type="submit" value="Submit" name="submit"></td>
   </tr>
  </table>
 </form>
 <?php if(mysqli_num_rows($result) > 0){ ?>

<div class="container1">
  <h2></h2>
 <table border="2">
     <tr>
        <th>Name</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Mobile</th>
     </tr>
    <?php
    while ($res = mysqli_fetch_array($result)){

        echo "<tr>";
        echo "<td>".$res['username']."</td>";
        echo "<td>".$res['gender']."</td>";
        echo "<td>".$res['email']."</td>";
        echo "<td>".$res['phone']."</>";
        echo "<tr>";
    }
    ?>
     </table>

<?php
      }else{
      echo "<h2>No Records Found!</h2>";
       
       }
?>



       
  
</body>
</html>
        