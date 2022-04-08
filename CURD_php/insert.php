<?php
include ("config.php");
$result=mysqli_query($mysqli,"SELECT* from register ORDER by id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
 <form action="function.php" method="POST">
  <table>
   <tr>
    <td>Name :</td>
    <td><input type="text" name="username" required></td>
   </tr>
   <tr>
    <td>Password :</td>
    <td><input type="password" name="password" required></td>
   </tr>
   <tr>
    <td>Gender :</td>
    <td>
     <input type="radio" name="gender" value="m" required>Male
     <input type="radio" name="gender" value="f" required>Female
    </td>
   </tr>
   <tr>
    <td>Email :</td>
    <td><input type="email" name="email" required></td>
   </tr> 
   <tr>
    <td>Phone no :</td>
    <td>
     <select name="phoneCode" required>
      <option selected hidden value="">Select Code</option>
      <option value="91+">91+</option>
      <option value="91+">91+</option>
      <option value="01+">01+</option>
      
     </select>
     <input type="phone" name="phone" required>
    </td>
   </tr>
   <tr>
    <td><input type="submit" value="Submit" name="submit"></td>
   </tr>
  </table>
 </form>
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





       
  
</body>
</html>
        
       