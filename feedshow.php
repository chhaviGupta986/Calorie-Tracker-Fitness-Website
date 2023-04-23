<?php
require 'connect.php';
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$result='';
try
{
    $con=new PDO("mysql:host=$servername;dbname=rfit",$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo '<br>'.$e->getMessage();
}
$stmt = $con->prepare("select * from feedback");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo $result;

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FEEDBACKS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="feedshow.css" type="text/css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Phudu:wght@400;500&family=Sulphur+Point:wght@300&family=Suwannaphum&family=Tilt+Neon&display=swap"
        rel="stylesheet"> 
</head>
<body>

<section class="main">
        <nav class="navbar  navbar-expand-md" id="main_nav" aria-label="Second navbar example">
            <div class="container-fluid ">
                <a class="navbar-brand" href="#" style="color: white; font-weight: 500; font-size: xx-large;">
                    <img src="images/logo.PNG" alt="Logo" height="50vh" class="d-inline-block"
                        style="padding-right:0vh ; padding-bottom: 0.1em; margin: 0px,0px,0px,0px;">

                    <h2
                        style="display: inline; font-family: 'Sulphur Point', sans-serif; font-size: larger; font-weight: bold;">
                        RFiT</h2>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#horizontalNavbar" aria-controls="navbarsExample02" aria-expanded="true"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse  justify-content-end" id="horizontalNavbar">
                    <ul class="navbar-nav text-nowrap d-flex">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="about.html">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="food_tracker.php">FOOD</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="exercise_tracker.php">EXERCISE</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="signup.php"><span
                                    class="glyphicon glyphicon-user"></span> SIGN UP</a></li>
                        <li class="nav-item"><a class="nav-link" target="_blank" aria-current="page"
                                href="login.php"><span class="glyphicon glyphicon-log-in"></span> LOGIN</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <!-- <div class="row row-cols-md-2 row-cols-1"> -->
            <div class="d-flex justify-content-center" style="font-size:4rem; color:#ff44a8; 
      background-color: rgba(211, 211, 211, 0.324);">Feedbacks by Our Users</div>
        <div class="container-fluid">
            <div class="row row-cols-md-2 row-cols-1" style="padding-top:0%;">
                <div class="col" style="padding-top:0%; padding-left: 4%; margin-bottom: 5%; ">
                    <img src="images/for feedback if u need in future.svg" alt="" width="80%">
                </div>
<div class="col" style=" padding-right: 2%; padding-top:3%;">
    <!-- <div class="table-responsive">           -->
      <!-- <table class="table table-striped table-bordered" style="background-color: pink;border: 4px;border-style: dashed;border-color: darkgreen;"> -->
        <!-- <thead> -->
          <!-- <tr> -->
            <!-- <th>Sr. no.</th>
            <th>feedback</th> -->
<!-- 
          </tr>
        </thead>
        <tbody> -->
                <?php
                
                 
                    foreach($result as $key=>$value)
                    {

$text=$value['feedback_txt']; $date=$value['feedback_date'];$user=$value['feedback_username'];
                        echo '<div class="card p-1 fs-3" style="border-radius:25px;
                        border-width:2px; border-style:solid; border-color:#ff44a8;">
                        <div style="margin-left:15px;">@
                        '. $user.' says
                        </div>
                        <div class="card-body fs-1">
                          <blockquote class=" mb-0">
                            <p>'. $text.'</p>
                            <footer class="blockquote-footer fs-4">
                            '. $date.'</footer>
                            </blockquote>
                        </div>
                      </div><br>
                      '; 
                        ?>
                    <!-- <tr> -->
                        <!-- <td><?php echo $key+1;?></td>
                        <td><?php echo $value['feedback_txt'];?></td>
                        <td><?php echo $value['feedback_date'];?></td>
                        <td><?php echo $value['feedback_user'];?></td> -->
                        

                    <!-- </tr> -->
                     <?php    
  
                 }
                ?>
<!--              
         </tbody>
      </table> -->
    </div>
<br>
                </div>
            </div>
                
    
</body>
</html>