<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h1>welcome man</h1>
     <?php
     session_start();
      echo  "name is:" . $_SESSION['full_name'] ."<br>". "email is :". $_SESSION['email'] ;
      ?>     
    <div class="btn btn-warning"><a href="logout.php" class="text-white">logout</a></div>
    </div></body>
</html>