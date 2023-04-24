<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: login.php");
  exit;
}
else{
  $user=$_SESSION['username'];
  $id=$_SESSION['id'];
}  
$conn = new mysqli('localhost', 'root', '', 'rfit');
if ($conn->connect_error) {
  die('Connection Failed : ' . $conn->connect_error);
}

if (isset($_POST['submit'])) {

  $message = $_POST['message'];
  // $name = $_POST['name'];
  $current_date = date("Y-m-d");

  $sql = "INSERT INTO feedback(feedback_username, feedback_txt,feedback_user_id,feedback_date) 
  VALUES('$user', '$message','$id','$current_date')";
  $res = mysqli_query($conn, $sql);


}


?>





<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
        </script>
     <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Phudu:wght@400;500&family=Sulphur+Point:wght@300&family=Suwannaphum&family=Tilt+Neon&display=swap"
        rel="stylesheet">
    <style>
    body {
        /* display: flex; */
        /* align-items: center; */
        /* justify-content: center; */
        /* min-height: 100vh; */
        font-family: "Lato", sans-serif;
        /* background-image:url('images/for feedback if u need in future.svg'); */
    }
    html, body {overflow-x: hidden}
    input,
    textarea {
        display: block;
        width: 300px;
        font-size: 18px;
        margin: 7px 20px;
    }

    label {
        display: block;
        padding: 2px 20px;
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
</head>

<body>
<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <div style="padding-left:27px;">
  <img src="images/pfp2.png" style="opacity:100%; width:150px;" alt="">
  </div>

  <a href="myacc.php">My Account</a>
  <a href="weight_tracker.php">Weight Logs</a>
  <!-- <a href="#">Exercise Diary</a> -->
  <a href="feedback.php">Share Feedback</a>
  <a href="logout.php">Logout</a>
  <a href="help_user.php">Help</a>
</div>
  <!-- style="visibility: visible" -->
<div id="main" style="padding: 0px;">
  <div class="openbtn" id="openbtn">
  <button id="btn1" style="background-color: #ff44a8;
  color: white;
  border: none; font-size:x-large;"
  onclick="openNav()">☰</button>  

  <a class="navbar-brand" href="welcome.php" style="color: white; font-weight: 500; 
  font-size: x-large; float:right">

<h2 style="display: inline; font-family: 'Sulphur Point', 
sans-serif; font-size: xx-large; font-weight: bold; margin-right:10px">
                        RFiT</h2>
                        <img src="images/logo.PNG" alt="Logo" height="40vh" class="d-inline-block"
                        style="padding-right:0vh ; padding-top:0vh ;padding-bottom: 0.2em;">
                        

                </a>
</div>
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

    <div class="row">
    <div class="col" >
      <img src="images/undraw_posts_re_ormv.svg" alt="" width="100%">
      </div>
      <div class="col">
      <form method="post" class="fs-3">
      <label style="color: #ff44a8;font-size: 37px ;">We appreciate your feedbacks!</label>
        <!-- <label style="color: #ff44a8;font-size: 30px">Name:</label>
        <input type="text" placeholder="type your name here--" name="name"> -->
        <div style="margin-left:2.2rem;">
        <?php
        echo "Submitting feedback as @";
        echo $user;
        ?>
        </div>

        <!-- <label style="color: #ff44a8;font-size: 30px">Give feeedback:</label> -->
        <textarea cols="500" rows="10" placeholder="Leave a feedback--" name="message"></textarea>

        <input type="submit" style="background-color: #ff44a8;" name="submit">
    </form>
      </div>
    </div>

  <br><br>    
        
        <!-- Footer -->
        <footer class="text-center text-lg-start text-white" style="background-color: #000000
        ">
            <!-- Grid container -->
            <div class="container p-0 pb-0" style="background-color: #000000">
                <!-- Section: Links -->
                <section class="">
                    <!--Grid row-->
                    <div class="row" >
                        <!-- Grid column -->
                        <div class="col-md-3
                                col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4
                                    font-weight-bold" id="about">About RFIT </h6>
                            <p> RFiT aims to provide an easy and hassle free online solution to help people integrate healthy habits into their busy lives. Get fitter with our amazing features such as
                                food tracker, weight tracker and water
                                tracker.  </p>
                        </div> <!-- Grid column -->
                        <hr class="w-100 clearfix d-md-none" /> <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto
                                mt-3">
                            <h6 class="text-uppercase mb-4
                                    font-weight-bold">Follow Us</h6>
                            <p> <a class="text-white" href="https://instagram.com/vermabhavya183?igshid=ZDdkNTZiNTM=">Instagram</a>
                            </p>
                            <p> <a class="text-white" href="https://www.facebook.com/bhavya.verma.9849912?mibextid=ZbWKwL">Facebook</a> </p>
                            <p> <a class="text-white" href="https://www.linkedin.com/in/bhavya-verma-754983247">LinkedIn</a>
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
                    <!-- Section: Links -->
            </div> <!-- Grid container -->
        </footer>
        <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>

</html>