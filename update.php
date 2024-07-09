<?php
include 'database.php';
$id=$_GET['id'];
$s= "SELECT * FROM users WHERE id=$id";


$result = mysqli_query($conn, $s);
$row = mysqli_fetch_assoc($result);
$name= $row["full_name"];
  $email =$row["email"];
  


if(isset($_POST["submit"]))
{
  $name= $_POST["name"];
  $email =$_POST["email"];
 
  
  $sql = " update users set id=$id,full_name='$name', email='$email' where id=$id";
  $result =mysqli_query($conn, $sql);

  if($result)
  {
    echo "updated successfully";

   header('Location: registration.php');
}
else {
  echo "failed ".mysqli_error($con);
}

// header("Location: connect.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <title>santosh php operations</title>
</head>
<body>
    <div class="part4">
    <h2>update details</h2>
        <form action="" method="post"> 
            <div >
              <label >Name:</label>
              <input type="text"  id="name" autocomplete="off" name="name" aria-describedby="emailHelp" value="<?php echo $name ?>" >
             
            </div>
            <div >
                <label for="desc">Email:</label>
                <input type="email"  id="email" autocomplete="off" name="email" aria-describedby="emailHelp" value="<?php echo $email ?>">

              </div>
              
            
            <input type="submit" value="Update" name="submit">
          </form>
    </div>
</body>
</html>