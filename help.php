<?php
session_start();
include 'connect.php'; 
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: login.php");
  exit;
}
else{
  $user=$_SESSION['username'];
  $id=$_SESSION['id'];
}  
if (isset($_POST['submit'])) {

  $query = $_POST['message'];
  // $name = $_POST['name'];


  // $sql = "INSERT INTO `notification` ('noti_user', 'noti_txt') values('$user','$query')"; 
  $sql1 = "INSERT INTO notification(noti_user, noti_txt) values('$user','$query')"; 

  $res = mysqli_query($conn, $sql1);


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
  /* max-width:100%; */
}
html{
  max-width:100%;
  overflow-x:hidden;
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
  /* background-color: #444; */
}
/* #btn1:hover{
  background-color: #444;
} */
#main {
  transition: margin-left .5s;
  /* padding: 16px; */
}

.card-body{
  background-color: lightpink;
}
.card-body p{
  font-size:xx-large;
  font-weight:1000;
  display:inline;
}
.button{
  background-color:#ff44a8;
  /* border-color:lightpink; */
}
.button a{
  color:black;
  text-decoration:none;
}
.button:hover{
   /* border-color:lightpink; */
  background-color:white;
}
.value-button{
  /* position:relative; */
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
<section class="main">
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
  <a href="help.php">Help</a>
</div>
  <!-- style="visibility: visible" -->
<div id="main" style="padding: 0px;">
  <!-- <button class="openbtn" onclick="openNav()">☰ Open Sidebar</button>    onclick="openNav()" -->
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

<form method="post" style="font-size:2rem">
        <label style="color: #ff44a8;font-size: 5rem; font-family: 'Phudu', cursive;">ASK FOR HELP</label>
        <br>
        <!-- <label style="color: #ff44a8;font-size: 30px">Name:</label>
        <input type="text" placeholder="type your name here--" name="name"> -->

We try to respond to your queries at the earliest. Please keep checking the 
        Help section of your Account to view our replies.


        <br><br>
        <!-- <label style="color: #ff44a8;font-size: 30px">type here:</label> -->
        <textarea cols="100" rows="8" placeholder="Type here--" name="message"></textarea>
        <br><br>
        <button type="submit" class="btn fs-2" style="background-color: #ff44a8; color:white" name="submit">Submit</button>
        <br>
        <br>

    <h1 style="color: #ff44a8; text-align:left; margin-left:3%;">HISTORY:</h1>
        <?php 
    $sql3="SELECT * FROM `notification` WHERE noti_user='$user'";
    $result3 = mysqli_query($conn, $sql3);
    ?>
    
            <?php
            
             
                foreach($result3 as $key=>$value)
                {
                    ?>
               <br>
                    <div class="border border-3 p-2" style="text-align:left; width:90%; margin-left:3%;">
                   <?php echo "Query ";  echo $key+1; echo ": "; echo $value['noti_txt'];?><br>
              <?php echo "Reply: "; echo $value['reply'];?>
                
                </div>  
               
                 <?php    

             }
            ?>
            <br><br>
      </form>

            </section>
            <script type="text/javascript" src="welcome.js"></script>
            <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>

</html>