
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="main.css">
<body>
<table border="2">
     <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>mobile</th>
        <th>Email</th>
		
     </tr>
    <?php
   // include ("index.php");
	
    while ($res = mysqli_fetch_array($sql)){

        echo "<tr>";
        echo "<td>".$res['firstname']."</td>";
        echo "<td>".$res['lastname']."</td>";
        echo "<td>".$res['phone']."</td>";
        echo "<td>".$res['email']."</>";
        echo "<tr>";
    }


    ?>
     </table>






    
</body>    
</html>    