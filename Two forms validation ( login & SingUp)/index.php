<DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="main.css">
</head>
<script>
    function validateForm(){
        let x = document.forms["myForm"]["username","Email"].value;
        if (x=="") {
            alert("Name is empty");
            return false;
        }   
    }

 </script>

<body>
    
 <div class="container">
     <h2>Register Form</h2>
     <div class="GrpCtn">
            <form action="function.php" method="post" name="myForm" onsubmit="return validateForm()">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" > <br/><br/>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password"><br/><br/>
                <label for="password">Email:</label>
                <input type="Email" name="Email" id="Email" class="GrpBtn"><br/><br/>
                <input type="submit" value="Submit" name="Submit" class="GrpBtn1">
                <a href="login.php"><p class="GrpBtn2">u have already account/logIn</p></a>
            </form>
     </div>
 </div>
</body>   
</html>    