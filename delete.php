<?php
require_once "database.php";
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $s = " DELETE FROM users WHERE id= $id ";
     $result= mysqli_query($conn,$s);
     if($result)
     {
  
       header('Location: registration.php');

     }
     else{
        die("error".mysqli_error($conn));
     }

}
?> 



