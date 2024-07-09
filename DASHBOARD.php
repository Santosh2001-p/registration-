<?php

       include 'database.php';
session_start();
        $sql = "SELECT * FROM users";

        $result = mysqli_query($conn, $sql);
        
        
       while($row = mysqli_fetch_array($result))


       {
        if($row['id']==$_SESSION['id'])
        break;
       }
        
            
        
      
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dash_board_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <title>dashboard</title>
</head>
<body>
    <div class="container">
        <div class="main">
            <div class="topbar">
                <a href="logout.php">logout</a>
                <a href="#">Support</a>
                <a href="">work</a>
                <a href="">home</a>

            </div>
            <div class="row">
                <div class="col-md-4 mt-1">
                    <div class=" text-center sidebar ">
                        <div class="card-body">
                            <img src="image.png" class="rounded-circle" width ="150">
                            <div class="mt-3">
                                <h3>BURK MACLIN</h3>
                                <a href="">Home</a>
                               
                                <a href="students_data.php?id=<?php  echo $row['id']?> ">work</a>
                                <a href="">support</a>
                                <a href="">settings</a>
                                <a href="logout.php">sign out</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mt-1">
                    <div class="mb-3 content">
                        <h1 class="m-3 pt-3">About</h1>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <h5> Name:  </h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                <?php
                                       // session_start();
                                         echo   $_SESSION['full_name'] ;
                                         ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Email</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                <?php
                                        //session_start();
                                         echo   $_SESSION['email'] ;
                                         ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>phone number</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                <?php
                                        //session_start();
                                         echo   $_SESSION['number'] ;
                                         ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>address</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                <?php
                                        //session_start();
                                         echo   $_SESSION['address'] ;
                                         ?>
                                </div>
                            </div>
                             
                            
                        </div>
                    </div>
                    <div class=" mb-3 content">
                        <h1 class="m-3">recent projects</h1>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>project name</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                   FOODCOURT
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>