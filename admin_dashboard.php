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
// $stmt = $con->prepare("SELECT COUNT(feedback_user)FROM feedback");
// $stmt->execute();
// $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo $result;
$sql = "SELECT count(*) FROM `client`WHERE role='user'"; 
$result = $con->prepare($sql); 
$result->execute(); 
$number_of_rows = $result->fetchColumn(); 


$sql2 = "SELECT count(*) FROM `client`WHERE role='admin'"; 
$result2 = $con->prepare($sql2); 
$result2->execute(); 
$number_of_rows2 = $result2->fetchColumn();
// select * from feedback where role_as=1
$stmt = $con->prepare("select username,fname,lname from client WHERE role='admin'");
$stmt->execute();
$result1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo $result;

?>

<?php

if(isset($_POST['del_btn']))
{
    echo "inside isset";
    $admin_name = $_POST['delete_name'];
    echo $admin_name;
    // $query = " ";
    // $query_run = mysqli_query($connection, $query);
    $stmt = $con->prepare("DELETE FROM client WHERE username='$admin_name'");
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
  <a href="help_user.php">Help</a>
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
<form method="post">
<h1>DASHBOARD</h1>
        <div class="container-fluid">
            
                <div >
                <h2 class="d-inline">No. of registerations:</h2>
                <input type="number" class="d-inline" name="register_count" value="<?php echo $number_of_rows;  ?>" aria-describedby="basic-addon1" 
                style="font-size: 30px;border-color:darkgreen;border-style:dashed;border-width: 4px;" readonly/>
  <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
                </div>
                
  <div>
  <h2>No. of Admins:</h2>
                <input type="number" class="" name="admin_count" value="<?php echo $number_of_rows2;  ?>" aria-describedby="basic-addon1" 
                style="font-size: 30px;border-color:darkgreen;border-style:dashed;border-width: 4px;" readonly/>
  <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
  
  </div>

<!-- </div> -->

<!-- <div class="container-fluid"> -->
            

        </div>
                
</div>

<form method="POST">
  <h2>ADMIN ACCOUNTS</h2>
    <div class="table-responsive">          
      <table class="table table-striped table-bordered" style="background-color: pink;">
        <thead>
          <tr>
            <th></th>
            <th>Username</th>
            <th>Name</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
                <?php
                    foreach($result1 as $key=>$value)
                    {
                        ?>
                    <tr>
                        <td><?php echo $key+1;?></td>
                        <td><?php echo $value['username'];?></td>
                        <td><?php echo $value['fname'];echo " "; echo $value['lname'];?></td>
                        <td><form method="post">
                  <input type="hidden" name="delete_name" value="<?php echo $value['username']; ?>">
                  <button type="submit" name="del_btn" class="btn btn-danger">DELETE</button>
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
                </form>

            </section>
            <script type="text/javascript" src="welcome.js"></script>
</body>

</html>