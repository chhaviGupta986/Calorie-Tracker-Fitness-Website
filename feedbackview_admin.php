<?php
require 'connect.php';
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$result='';
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
  }
  elseif($_SESSION['role']!="admin"){
    // echo "ACCCESS DENIED! YOU ARE NOT AN ADMIN.";
    die("ACCCESS DENIED!  YOU ARE NOT AN ADMIN!");
  }
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
<?php

if(isset($_POST['del_btn']))
{
    echo "inside isset";
    $sr_no = $_POST['del_btn'];
    echo $sr_no;
    // $query = " ";
    // $query_run = mysqli_query($connection, $query);
    $stmt = $con->prepare("DELETE FROM feedback WHERE sr_no='$sr_no'");
    $stmt->execute();

}

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
</head>
<body>

<section class="main">
        <svg id="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ff44a8" fill-opacity="1"
                d="M0,160L34.3,181.3C68.6,203,137,245,206,224C274.3,203,343,117,411,112C480,107,549,181,617,213.3C685.7,245,754,235,823,218.7C891.4,203,960,181,1029,160C1097.1,139,1166,117,1234,138.7C1302.9,160,1371,224,1406,256L1440,288L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z">
            </path>
        </svg><!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#03794E" fill-opacity="1"
                d="M0,192L26.7,170.7C53.3,149,107,107,160,106.7C213.3,107,267,149,320,160C373.3,171,427,149,480,165.3C533.3,181,587,235,640,256C693.3,277,747,267,800,229.3C853.3,192,907,128,960,122.7C1013.3,117,1067,171,1120,192C1173.3,213,1227,203,1280,197.3C1333.3,192,1387,192,1413,192L1440,192L1440,0L1413.3,0C1386.7,0,1333,0,1280,0C1226.7,0,1173,0,1120,0C1066.7,0,1013,0,960,0C906.7,0,853,0,800,0C746.7,0,693,0,640,0C586.7,0,533,0,480,0C426.7,0,373,0,320,0C266.7,0,213,0,160,0C106.7,0,53,0,27,0L0,0Z">
            </path>
        </svg> -->
        <!-- fixed-top -->
        <nav class="navbar  navbar-expand-md" id="main_nav" aria-label="Second navbar example">
            <div class="container-fluid ">
                <a class="navbar-brand" href="#" style="color: white; font-weight: 500; font-size: xx-large;">
                    <img src="logo.PNG" alt="Logo" height="50vh" class="d-inline-block"
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
                            <a class="nav-link " aria-current="page" href="#">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="food_tracker.html">FOOD</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">EXERCISE</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="signup.php"><span
                                    class="glyphicon glyphicon-user"></span> SIGN UP</a></li>
                        <li class="nav-item"><a class="nav-link" target="_blank" aria-current="page" href="login.php"><span
                                    class="glyphicon glyphicon-log-in"></span> LOGIN</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row row-cols-md-2 row-cols-1">
                <div class="col medi" style="padding-top:6%; padding-right: 7%; margin-bottom: 0%; ">
                <h1>FEEDBACKS</h1>
                </div>
</div>
<form method="POST">
    <div class="table-responsive">          
      <table class="table table-striped table-bordered" style="background-color: pink;border: 4px;border-style: dashed;border-color: darkgreen;">
        <thead>
          <tr>
            <th>Sr. no.</th>
            <th>username</th>
            <th>feedback</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
                <?php
                
                 
                    foreach($result as $key=>$value)
                    {
                        ?>
                    <tr>
                        <td><?php echo $key+1;?></td>
                        <td><?php echo $value['feedback_username'];?></td>
                        <td><?php echo $value['feedback_txt'];?></td>
                        <td><form method="post">
                  <input type="hidden" name="delete_name" value="<?php echo $value['feedback_username']; ?>">
                  <button type="submit" name="del_btn" value="<?php echo $value['sr_no'];?>" class="btn btn-danger">DELETE</button>
                </form></td>
                        
                    </tr>
                     <?php    
  
                 }
                ?>
             
         </tbody>
      </table>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <button class="btn btn-primary me-md-2" style="background-color: #ff44a8" type="button"><a href="admindash.php" style="color:white;text-decoration: none" >Admin Dashboard</a></button>
  <button class="btn btn-primary me-md-5" style="background-color: #ff44a8" type="button"><a href="feedback.php" style="color: white;text-decoration: none;"> Add feedback</a></button>
</div>
                </form><br>
    <footer class="text-center text-lg-start text-white " style="background-color: #000000;position: relative;">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Links -->
                <section class="">
                    <!--Grid row-->
                    <div class="row">
                        <!-- Grid column -->
                        <div class="col-md-3
                                    col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4
                                        font-weight-bold" id="about">About RFIT </h6>
                            <p> This
                                website is basically a fitness website
                                which has some amazing features like
                                food tracker, weight tracker and water
                                tracker. </p>
                        </div> <!-- Grid column -->
                        <hr class="w-100 clearfix d-md-none" /> <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto
                                    mt-3">
                            <h6 class="text-uppercase mb-4
                                        font-weight-bold">Follow us</h6>
                            <p> <a class="text-white" href="https://instagram.com/vermabhavya183?igshid=ZDdkNTZiNTM=">Instagram</a>
                            </p>
                            <p> <a class="text-white" href="https://www.facebook.com/bhavya.verma.9849912?mibextid=ZbWKwL" >Facebook</a> </p>
                            <p> <a class="text-white" href="https://www.linkedin.com/in/bhavya-verma-754983247" >LinkedIn</a>
                            </p>
                        </div> <!-- Grid column -->
                        <hr class="w-100 clearfix d-md-none" /> <!-- Grid column -->
                        <hr class="w-100 clearfix d-md-none" /> <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto
                                    mt-3">
                            <h6 class="text-uppercase mb-4
                                        font-weight-bold" id="contact">Contact Us</h6>
                            <p><i class="fas fa-envelope mr-3"></i>
                                helping_hand@gmail.com</p>
                            <p><i class="fas fa-phone mr-3"></i> + 91 9892907159</p>
                            <p><i class="fas fa-print
                                            mr-3"></i> + 91 9867929151</p>
                        </div> <!-- Grid column -->
                        <!-- Grid column -->
                        
                    </div>
                    <!--Grid row-->
                </section> <!-- Section: Links -->
            </div> <!-- Grid container -->
        </footer>
</body>
</html>