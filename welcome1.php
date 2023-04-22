<?php
// session_start();
// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
//     header("location: login.php");
//     exit;
// $host = "localhost";
// $user = "username";
// $password = "";
// $dbname = "database_name";

// $servername='localhost';
// $username="root";
// $password="";
require 'connect.php';
$servername = "localhost";
$username = "root";
$password = "";

try
{
    $con=new PDO("mysql:host=$servername;dbname=rfit",$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo 'connected';
}
catch(PDOException $e)
{
    echo '<br>'.$e->getMessage();
}
$count = '';
$result='';
$user=$_SESSION['username'];
$sql1="SELECT user_id FROM `client` WHERE username='$user'";
$result1 = mysqli_query($conn, $sql1);
// print_r($result1);
if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()) {     
        $id=$row["user_id"];                 
    }
  }
if(isset($_POST['submit']))
{
  // echo "inside isset";
   
      // echo "inside empty";

        $count = $_POST['count'];
        // echo $count;
        $stmt = $con->prepare("UPDATE water_tracker SET no_of_glasses = '$count' WHERE tracker_id='$id'");
        $stmt->execute();

  }


?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFIT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
        </script>
    <link rel="stylesheet" href="homepage.css" type="text/css">
    <link rel="stylesheet" href="welcome.css" type="text/css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Phudu:wght@400;500&family=Sulphur+Point:wght@300&family=Suwannaphum&family=Tilt+Neon&display=swap"
        rel="stylesheet">
        <style>
body {
  font-family: "Lato", sans-serif;
}

.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  /* background-color: #111; */
  background-color: #ff44a8;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  /* color: #818181; */
  color: whitesmoke;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  /* color: #f1f1f1; */
  color: rgba(54, 1, 33, 0.66);
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #ff44a8;
  color: white;
  padding: 10px 15px;
  border: none;
}
#openbtn{
    visibility: visible;
}
.openbtn:hover {
  background-color: #444;
}

#main {
  transition: margin-left .5s;
  /* padding: 16px; */
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>
<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="#">My Account</a>
  <a href="#">Weight Logs</a>
  <a href="#">Exercise Diary</a>
  <a href="feedback.html">Share Feedback</a>
  <a href="homapage.html">Logout</a>
  <a href="homapage.html#about">Help</a>
</div>
  <!-- style="visibility: visible" -->
<div id="main" style="padding: 0px;">
  <!-- <button class="openbtn" onclick="openNav()">☰ Open Sidebar</button>    onclick="openNav()" -->
  <button class="openbtn" id="openbtn" style="width:200px;"
  onclick="openNav()">☰</button>  
  
  <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
  data-bs-target="#mySidebar" aria-controls="navbarsExample02" aria-expanded="true"
  aria-label="Toggle navigation"onclick="openNav()">☰ Open Sidebar</button>
  <h2>Collapsed Sidebar</h2>
  <p>Click on the hamburger menu/bar icon to open the sidebar, and push this content to the right.</p> -->
  <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
 aria-controls="navbarsExample02" aria-expanded="true" 

  aria-label="Toggle navigation">☰ Open Sidebar</button>
  <h2>Collapsed Sidebar</h2>
  <p>Click on the hamburger menu/bar icon to open the sidebar, and push this content to the right.</p>
</div> -->
 <!-- onclick="openNav()" data-bs-target="#mySidebar" -->
<script>
var open=true;
function openNav() {
document.getElementById("mySidebar").style.width = "250px";
document.getElementById("main").style.marginLeft = "250px";
document.getElementById("openbtn").style.visibility = 'hidden';
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.getElementById("openbtn").style.visibility = 'visible';
}
</script>

                <!-- <a class="navbar-brand" href="#" style="color: white; font-weight: 500; font-size: xx-large;">
                    <img src="pink_logo.PNG" alt="logo" height="50vh" class="d-inline-block"
                        style="display:block;float:right;">
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
                                    class="glyphicon glyphicon-off"></span> LOGOUT</a></li>
                    </ul>
                </div> -->

 
 

        <h1>TRACKERS</h1>
        <form method="POST">
        <div class="container-fluid">
        
        <div class="row row-cols-1 row-cols-md-2 g-4">
          <div class="col">
            <div class="card h-100"> <img src="apple1.png" class="card-img-top" alt="..." style="width: 49%; align-self:
                        center;">
                <div class="card-body">
                    <h2 class="card-title">Food Tracker</h2>
                    <button class="btn btn-primary fs-3"  type="button"><a href="food_tracker.php" style="color:white;">Track Meal</a></button>
                </div>
            </div>
        </div>
 
  <div class="col">
    <div class="card h-100"> <img src="weigh2.jpg" class="card-img-top" alt="..." style="width: 48%;
                align-self:center; margin-top:
                1.5%;margin-bottom: 2%; margin-right:
                0%; padding-right: 0%;">
        <div class="card-body">
            <h2 class="card-title">Exercise Tracker</h2>
            <button class="btn btn-primary fs-3" type="button"><a href="food_tracker.html" style="color:white;">Track Exercise</a></button>
        </div>
    </div>
</div>
<div class="col">
    <div class="card h-100" style="width: 150%"> <img src="water.jpg" class="card-img-top" alt="..." style="width: 48%;
                align-self:center; margin-top:
                1.5%;margin-bottom: 2%; margin-right:
                0%; padding-right: 0%;">
        <div class="card-body">
            <h2 class="card-title">Water Tracker</h2>
            <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
  <input  type="number" id="number" value="0" name="count" />
 <div class="value-button" id="increase" onclick="increaseValue()"  name="increment">+</div><br>
   <!-- <div><button class="value-button" type="button" name="increment" onclick="increaseValue()">+</button></div> -->
  <button type="submit" name="submit" class="btn btn-dark">Submit</button>
        </div>
       <!-- <div class="input-group mb-3" style="width: 130px;padding-left: 45px">
  <input type="button" class="input-group-text decrement-btn" name="minus"  onclick="decrease()">-</button>
  <input type="text" class="form-control fs-3 text-center bg-white" disabled id="number" placeholder="0" >
  <input type="button" class="input-group-text increment-btn" name="add"  onclick="increase()">+</button><br>
  <button type="submit" name="submit" class="btn btn-dark">Submit</button>
</div> -->
    </div>
</div>
</div>                      
  
</form>

                
        </div>
        <script type="text/javascript" src="welcome.js"></script>
<!-- <footer> FIND FOOTER LATER ON follow us on instgagrhrjrjrj</footer> -->
 <!-- <div class="container my-5"> -->
        <!-- Footer -->
        <footer class="text-center text-lg-start text-white" style="background-color: #000000">
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
                                        font-weight-bold">Trackers</h6>
                            <p> <a class="text-white">Food Tracker</a>
                            </p>
                            <p> <a class="text-white">Weight
                                    Tracker</a> </p>
                            <p> <a class="text-white">Water Tracker</a>
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
                            <p><i class="fas fa-phone mr-3"></i> + 91
                                9874568254</p>
                            <p><i class="fas fa-print
                                            mr-3"></i> + 91 9852471598</p>
                        </div> <!-- Grid column -->
                        <!-- Grid column -->
                        
                    </div>
                    <!--Grid row-->
                </section> <!-- Section: Links -->
            </div> <!-- Grid container -->
        </footer> <!-- Footer -->
    <!-- End of .container -->
</body>

</html>