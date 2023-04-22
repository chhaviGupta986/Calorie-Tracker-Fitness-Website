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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FEEDBACKS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="feedshow.css" type="text/css">
<style>
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

</head>
<body>



<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="#">My Account</a>
  <a href="#">Weight Logs</a>
  <a href="#">Exercise Diary</a>
  <a href="feedbackview_admin.php">View Feedbacks</a>
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
<form method="post">
<h1>DASHBOARD</h1>
        <div class="container-fluid" style="display: flex">
            
                
                <h2>No. of registerations:</h2>&nbsp;
                <input type="number" class="form-control" name="register_count" value="<?php echo $number_of_rows;  ?>" aria-describedby="basic-addon1" style="font-size: 30px;border-color:darkgreen;border-style:dashed;border-width: 4px;" readonly/>
  <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
  

                
                
</div>

<div class="container-fluid">
            <div >
                <div class="col medi" style="padding-top:0%; padding-right: 7%; margin-bottom: 3%;display: flex ">
                <h2>No. of Admins:</h2>&nbsp;
                <input type="number" class="form-control" name="admin_count" value="<?php echo $number_of_rows2;  ?>" aria-describedby="basic-addon1" style="font-size: 30px;border-color:darkgreen;border-style:dashed;border-width: 4px;" readonly/>
  <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
  

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
<br>
    
</body>
</html>