<?php
session_start();
if(isset($_SESSION["user"]))
{
   header("Location: dashboard.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <title>june 29 reg and locale_get_display_name</title>
</head>
<body>
    <div class="part1">
     <h1>Registration</h1>

      <?php
           if(isset($_POST["submit"]))
           {
            $fullname= $_POST["fullname"];
            $email= $_POST["email"];
            $number=$_POST["number"];
            $address=$_POST["address"];
            $password= $_POST["password"];
            $passwordRepeat= $_POST["repeat_password"];

            $passwordHash =password_hash($password,PASSWORD_DEFAULT);
            $errors=array();

            if(empty($fullname) OR empty($email) OR empty($number) OR empty($address) OR empty($password) OR empty($passwordRepeat) )
            {
               array_push($errors,"ALL FIELDS ARE REQUIRED");
            }
            if(!filter_var($email,FILTER_VALIDATE_EMAIL))
            {
               array_push($errors,"Email is not valid");
            }
            if(strlen($password)<8)
            {
               array_push($errors,"password must be eight cahr long");
            }
            if($password!=$passwordRepeat)
            {
               array_push($errors,"password does not match");
            }
            require_once "database.php";
            $s="SELECT * FROM users WHERE email='$email'";
            $r=mysqli_query($conn,$s);
            $num=mysqli_num_rows($r);
            if($num>0)
            {
               array_push($errors,"email alredy exist");
            }
           if(count($errors)>0)
           {
            foreach($errors as $err)
            {
               echo "<div class='alert alert-danger'>$err</div>";
            }
           }
           else{
           require_once "database.php";
            //we will insert data into our database
            $sql = "INSERT INTO users (full_name,email,number,address,password) VALUES ('$fullname','$email','$number','$address','$password')";
            $res= mysqli_query($conn,$sql);
            if($res)
            {
               echo "<div class='alert alert-success'>You are registerd successfully</div>";
            }
            else{
               echo "not successfull";
            }
           

           }
           }
      ?>
        <form action="registration.php" method="post">
             <div >
                <input type="text"  name="fullname" placeholder="Full name:">
             </div> 
             <div >
                <input type="email"  name="email" placeholder="Email:">
             </div> 
             <div >
                <input type="text"  name="number" placeholder="Phone Number:">
             </div>
             <div >
                <input type="text"  name="address" placeholder="Full address:">
             </div>
             <div >
                <input type="password"   name="password" placeholder="password:">
             </div> 
             <div >
                <input type="password"  name="repeat_password" placeholder="repeat password:">

             </div>
             <div >
                <input type="submit"  value="register" name="submit">
             </div>   

        </form>
        <p>DO you have an account alerdy? 
         <a href="login.php " class="text-white "> login</a>
     
         </p>
    </div>


    <!-- second contianer -->
    <div class="container part2">
       <h1>TOTAL STUDENTS</h1>

        <table class="table" >
   <thead>
    <tr class="text-center">
      <th scope="col">S.No</th>
      <th scope="col">Name</th>
      <th scope="col">email</th>
    
      
      <th scope="col">operations</th>
      
    </tr>
  </thead>
  <tbody>

  <?php

      require_once "database.php";

        $sql = "SELECT * FROM users";

        $result = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_array($result))
        {
            $id=$row['id'];
        ?>
        
          
       <tr  class="text-center"> <th> <?php echo $row['id']; ?> </th>
       <td><?php echo $row['full_name']; ?></td>
          <td><?php echo $row['email']; ?></td>
          
        
          <td><button class="btn btn-success" ><a href="update.php?id=<?php  echo $row['id']?>" class="text-white">edit</a></button> <button class="btn btn-danger" > <a href="delete.php?id=<?php  echo $row['id']?>" class="text-white" >delete</a></button></td>
          <!-- <td><button class='btn-danger btn color-white'> <a href="delete.php?id=<?php  echo $row['id']?>" class="text-white" >Delete</a></td>
          <td><button class='btn-primary btn color-white'> <a href='edit.php?id=<?php  echo $row['id']?>'  class="text-white">Edit</a></td> -->
        </tr>
        <?php
        }
       
        ?>
     

    
  </tbody>
  
</table>
    </div>
</body>
</html>