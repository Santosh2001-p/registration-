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
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <title>login june 29

    </title>
</head>
<body>
    <div class=" my-5 part3">
        <h1>login in here!</h1>
        <?php
        require_once "database.php";
        if(isset($_POST["login"]))
        {
            $email=$_POST["email"];
            $password=$_POST["password"];

            $sql="SELECT * FROM users WHERE email='$email'" ;// whenever the existed(already stored) in database will match with currently given email at login page
            $result=mysqli_query($conn,$sql);
            $user=mysqli_fetch_array($result,MYSQLI_ASSOC);
            if($user)
            {
                if($password==$user["password"])
                {
                    require_once "database.php";
                    $data_sess= "SELECT * FROM users WHERE email= '$email'";

                    $data_res = mysqli_query($conn, $data_sess);
                    $rows = mysqli_fetch_assoc($data_res);
                    $name= $rows["full_name"];
                      $email =$rows["email"];
                      $number=$rows["number"];
                      $address=$rows["address"];
                      $id=$rows["id"];

                    session_start();
                   $_SESSION["user"] = "yes";
                   $_SESSION["full_name"]=$name;
                   $_SESSION["id"]=$id;
                   $_SESSION["email"]=$email;
                   $_SESSION["number"]=$number;
                   $_SESSION["address"]=$address;
                    
                    header('Location: DASHBOARD.php');
                   die();
                }
                else
            {
                echo "<div class='alert alert-danger'>password mismatch</div>";
            }
                
            }
            else{
                echo "<div class='alert alert-danger'>Email does not exists!</div>";
            }
        }
        ?>
    <form action="login.php" method="post">
             
             <div >
                <input type="email"  name="email" placeholder="Email:">
             </div> 
             <div >
                <input type="password"  name="password" placeholder="password:">
             </div> 
             
             <div >
                <input type="submit"  value="Login" name="login">
             </div>   
        </form>
        <p>If  you don't have an account? 
         <a href="registration.php " > Register</a>
     
         </p>
    </div>
    
</body>
</html>