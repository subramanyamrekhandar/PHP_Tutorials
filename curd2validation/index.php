<?php
    include "config.php";
    if(isset($_POST['submit'])){
        if(empty($_POST['name'])){
            $errName = "Name is required";
        }else{
            $name = mysqli_real_escape_string($conn, $_POST['name']);
        }
        if(empty($_POST['password'])){
            $errPass = "Password is required";
        }else{
            $email = mysqli_real_escape_string($conn, $_POST['email']);
        }
        if(empty($_POST['gender'])){
            $errGender = "Gender is required";
        }else{
            $password = mysqli_real_escape_string($conn, $_POST['name']);
            $password = md5($password);
        }
        if(empty($_POST['email'])){
            $errEmail = "Email is required";
        }else{
            $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        }
        if(empty($_POST['phone'])){
            $errPhone = "Phone is required";
        }else{
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        }

        $country_code = mysqli_real_escape_string($conn, $_POST['country_code']);

        if(empty($errName) && empty($errPass) && empty($errGender) && empty($errEmail) && empty($errPhone)){

            $sqlCheck = "SELECT * FROM user WHERE email = '{$email}' OR phone = '{$phone}'";
            $resultCheck = mysqli_query($conn, $sqlCheck) or die("Query Failed:SQL Check");

            if(mysqli_num_rows($resultCheck) > 0){
                echo "<script>alert('Email or Phone is already exits!');</script>";
            }else{
                $sql = "INSERT INTO user (name, password, gender, email, country_code, phone) VALUES ('{$name}', '{$password}', '{$gender}', '{$email}', '{$country_code}', '{$phone}')";
                $result = mysqli_query($conn, $sql) or die("Query Failed!");
                if($result){
                    echo "<script>alert('Data inserted successfully!'); ";
                }else{
                    echo "<script>alert('Something went wrong!');</script>";
                }
            } 
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="main.css" rel="stylesheet" >
</head>
<body>

<div class="container">
  <h2>Registration</h2> 

  <form action="" method="POST">
    <div class="">
      <label for="email">Name:</label>
      <input type="text" class="" id="" name="name" placeholder="Enter name">
      <?php if(isset($errName)){ ?> <span class="text-danger"><?php echo $errName; ?></span> <?php } ?>
    </div>
    <div class="form-group">
      <label for="email">Password:</label>
      <input type="password" class="" id="password" name="password" placeholder="Enter password">
      <?php if(isset($errPass)){ ?> <span class="text-danger"><?php echo $errPass; ?></span> <?php } ?>
    </div>
    <div class="form-group">
      <label for="email">Gender:</label>
      Male &nbsp;<input type="radio" name="gender" id="gender" value="male" checked>
      Female &nbsp;<input type="radio" name="gender" id="gender" value="female" placeholder="Enter gender"><br>
      <?php if(isset($errGender)){ ?> <span class="text-danger"><?php echo $errGender; ?></span> <?php } ?>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="" id="" placeholder="Enter email" name="email">
      <?php if(isset($errEmail)){ ?> <span class="text-danger"><?php echo $errEmail; ?></span> <?php } ?>
    </div>
    <div class="form-group">
      <label for="email">Phone:</label>
      <select name="country_code">
          <option value="91">+91</option>
          <option value="92">+99</option>
      </select>
      <input class="" type="number" class="" id="" placeholder="Enter phone" name="phone" min="1111111111" max="9999999999">
      <?php if(isset($errPhone)){ ?> <span class="text-danger"><?php echo $errPhone; ?></span> <?php } ?>
    </div>
    <button type="submit" class="btn btn-success" name="submit">Register</button>
  </form>
</div>



<?php
    include "config.php";
    $sql = "SELECT * FROM user ORDER BY id DESC";
    $result = mysqli_query($conn, $sql) or die("Query Failed!");
?>

<?php if(mysqli_num_rows($result) > 0){ ?>

<div class="container1">
  <h2></h2>
 
  <table class="table">
        <thead>
        <tr>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>PHONE</th>
            <th>GENDER</th>
           
        </tr>
        </thead>
        <tbody>
        <?php
            while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo "+".$row['country_code']."-".$row['phone']; ?></td>
            <td><?php echo ucfirst($row['gender']); ?></td>
            <td>
             
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


<?php
    }else{
        echo "<h2>No Records Found!</h2>";
        echo "<br>";
        echo "<a href='http://localhost/projects/samplecrud/'>Go Back</a>";
    }
?>
</html>
</body>
</html>