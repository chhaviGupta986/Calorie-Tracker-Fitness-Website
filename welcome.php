<?php
include 'connect.php'; 
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
$user=$_SESSION['username'];
$id=$_SESSION['id'];
$sql1="SELECT * FROM `food_tracker` WHERE tracker_id='$id'";
$result1 = mysqli_query($conn, $sql1);
if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()) {     
        $target_food=$row["target_cals"];                 
        $cals_food=$row["cals"];                 
    }
  }
$sql2="SELECT * FROM `exercise_tracker` WHERE tracker_id='$id'";
$result2 = mysqli_query($conn, $sql2);
if ($result2->num_rows > 0) {
    while($row = $result2->fetch_assoc()) {     
        $target_exercise=$row["target_cals"];                 
        $cals_exercise=$row["cals"];                 
    }
  }
$sql3="SELECT * FROM `water_tracker` WHERE tracker_id='$id'";
$result3 = mysqli_query($conn, $sql3);
if ($result3->num_rows > 0) {
    while($row = $result3->fetch_assoc()) {     
        $no_of_glasses=$row["no_of_glasses"];                                 
    }
  }
$sql4="SELECT * FROM `weight_tracker` WHERE tracker_id='$id'";
$result4 = mysqli_query($conn, $sql4);
if ($result4->num_rows > 0) {
    while($row = $result4->fetch_assoc()) {   
        if($row["target_weight"]!=NULL){
          $target_weight=$row["target_weight"]; 
        }
        $current_weight=$row["weight"];                      
    }
  }
  // $count = '';
  // $result='';
  
  if(isset($_POST['submit']))
  {
          $water = $_POST['water'];
          // echo $count;
          $sql5="UPDATE `water_tracker` SET `no_of_glasses`='$water' WHERE `water_tracker`.`tracker_id`='$id'";
          $result5 = mysqli_query($conn, $sql5);
          if ($result5) {
              // while($row = $result5->fetch_assoc()) {     
              //     $no_of_glasses=$row["no_of_glasses"];                                 
              // }
          }
          // $stmt = $con->prepare("UPDATE water_tracker SET no_of_glasses = '$count' WHERE tracker_id='$id'");
          // $stmt->execute();
  
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
                    <img src="images/pink_logo.PNG" alt="logo" height="50vh" class="d-inline-block"
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
                <div>
 
 <div class="row row-cols-md-2 p-5 gx-5">
       
     <div class="col w-25"> 
             <div class="card h-100">
                 
                 <img src="images/apple1.png" class="card-img-top" alt="..."
                     style="width: 87%; align-self: center;">
                 <div class="card-body">
                     <h2 class="card-title">Food Tracker</h2>
                     <!-- <h1><?php echo $cals_food."/".$target_food; ?></h1> -->
                     <p style="color:#ff44a8;"><?php echo $cals_food?></p>
                 <p ><?php echo "/".$target_food; ?></p>
                     <div class="card-text"> calories eaten</div>
                     <br><br>
        <button class=" fs-3 fw-bold button"  type="button">
        <a href="food_tracker.php">Add Meal</a></button>
  
                 </div>
                 
             
             </div>
         
     </div>
     <div class="col w-25">
         <div class="card h-100">
             <img src="images/ex_Tracker1.png" class="card-img-top" alt="..."
                 style="width: 110%; align-self:center;">
             <div class="card-body">
                 <h2 class="card-title">Exercise Tracker</h2>
                 <p style="color:#ff44a8;"><?php echo $cals_exercise?></p>
                 <p><?php echo "/".$target_exercise; ?></p>
                 <!-- <h1><?php echo $cals_exercise."/".$target_exercise; ?></h1> -->
                     <div class="card-text"> calories burnt</div>
                     <br><br>
                     <button class=" fs-3 fw-bold button"  type="button">
        <a href="exercise_tracker.php">Add Workout</a></button>
  
             </div>
         </div>
     </div>
     <div class="col w-25">
         <div class="card h-100">
             <img src="images/wat2.png" class="card-img-top " alt="..."
                 style="width: 82%; padding-top:4%; padding-bottom:2%;align-self:center;">
             <div class="card-body">
                 <h2 class="card-title">Water Tracker</h2>        
                <p style="color:#ff44a8;"><?php echo $no_of_glasses?></p>
                 <p><?php echo "/8"?></p>
                 <div class="card-text">glasses drank </div>
                 <br><br>
                 <form method="POST">   
                 <div class="fs-4 ">
<div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
  <input type="number" id="number" name="water" value="<?php echo $no_of_glasses?>" />
  <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
 <button class=" fs-3 fw-bold button" name="submit" type="submit">Update</button>
                 </div>
 </form>
             </div>
         </div>

     </div>
     <div class="col w-25">
         <div class="card h-100">
             <img src="images/weigh2.jpg" class="card-img-top" alt="..."
                 style="width: 84%; align-self:center; 
                 padding-top:3%; padding-bottom:4%;">
             <div class="card-body">
                 <h2 class="card-title">Weight Tracker</h2>

                 <div class="card-text">
                  Current weight: <br>
                  <p style="color:#ff44a8;"><?php echo $current_weight?></p>
                  <br>
                  Target weight:   <br>             
                 <p><?php echo $target_weight;?></p>
                 <br>
                 <button class=" fs-3 fw-bold button"  type="button">
                <a href="weight_tracker.php">Update</a></button>
             </div>
                 </div>
             </div>
         </div>
    
            </section>
            <script type="text/javascript" src="welcome.js"></script>
</body>

</html>