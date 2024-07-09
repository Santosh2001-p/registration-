 <?php
      // include "database.php";
      //    $id=$_GET['id'];
      //    echo "id is ".$id;
      //    $s= "SELECT * FROM users WHERE id='$id";

      //       $result = mysqli_query($conn, $s);
      //      $row = mysqli_fetch_assoc($result);
      //      echo $row['full_name'];
            ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <title>students data</title>

</head>
<body>
    
        
        <div class="part1">
        <h1>hii students</h1>
     <?php
           if(isset($_POST["add"]))
           {
           
            
            $cid=$_GET["id"];
            
            $sname= $_POST["sname"];
            $smail= $_POST["smail"];
            $class=$_POST["class"];
            

            
            $errors=array();

            if(empty($sname) OR empty($smail) OR empty($class))
            {
               array_push($errors,"ALL FIELDS ARE REQUIRED");
            }
            if(!filter_var($smail,FILTER_VALIDATE_EMAIL))
            {
               array_push($errors,"Email is not valid");
            }
            
            
            require_once "database.php";
            $s="SELECT * FROM students WHERE smail='$smail'";
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
            $sql = "INSERT INTO students (sname,smail,class,cid) VALUES ('$sname','$smail','$class','$cid)";
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
        <form action="students_data.php" method="post">
             <div >
                <input type="text"  name="sname" placeholder="student name:">
             </div> 
             <div >
                <input type="email"  name="smail" placeholder="Email:">
             </div> 
             <div >
                <input type="text"  name="class" placeholder="class:">
             </div>
             
             <div >
                <input type="submit"  value="add student" name="add">
             </div>   

        </form>
        
    </div>

  
</body>
</html>