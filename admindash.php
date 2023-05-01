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
    // echo "inside isset";
    $admin_name = $_POST['delete_name'];
    // echo $admin_name;
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
    <link rel="stylesheet" href="homepage.css" type="text/css">
    <!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Phudu:wght@400;500&family=Sulphur+Point:wght@300&family=Suwannaphum&family=Tilt+Neon&display=swap"
        rel="stylesheet">
<style>
/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */

    </style>

</head>
<body>


<section class="main" style="padding-top:1%;">

  <div >
  <a class="navbar-brand m-2" href="#" style="color: white;font-weight: 500; font-size: xx-large;">
            <img src="images/pink_logo.PNG" alt="Logo" height="50vh" class="d-inline-block"
                style="padding-right:0vh ; padding-bottom: 0.1em; margin: 0px,0px,0px,0px;">

                <h2 style="display: inline; font-family: 'Sulphur Point', sans-serif; font-size: 
                  larger; font-weight: bold; color:black;">RFiT</h2>
                  
        </a>
        <div class="gap-2 d-inline" style="align-items:right; position:absolute; right:0;">
  <button class="btn me-md-2" style="background-color:darkgreen" type="button">
  <a href="admin_noti.php" style="color:white;text-decoration: none" >NOTIFICATIONS</a></button>
  <button class="btn me-md-2" style="background-color:darkgreen" type="button">
  <a href="feedbackview_admin.php" style="color: white;text-decoration: none;"> FEEDBACKS</a></button>
  <button class="btn me-md-3" style="background-color: #ff44a8" type="button">
  <a href="logout.php" style="color: white;text-decoration: none;"> LOGOUT</a></button>
</div>

  </div>


<form method="post">
<h1 class="text-center m-2" style="color: #ff44a8; font-family: 'Suwannaphum', serif;"> ADMIN DASHBOARD</h1>
        <div class="container-fluid m-2" style="display: flex;font-family: 'Suwannaphum', serif;">
            
                
                <h2>No. of registerations:</h2>&nbsp;
                <input type="number" class="form-control" name="register_count" 
                value="<?php echo $number_of_rows;  ?>" aria-describedby="basic-addon1" 
                style="font-size: 30px;border-color:darkgreen;border-style:dashed;border-width: 4px;"
                 readonly/>
  <!-- <span class="input-group-text" id="basic-addon1">@</span> -->

                
                
</div>

<div class="container-fluid m-2">
            <div >
                <div class="col medi" style="padding-top:0%; padding-right: 7%; 
                font-family: 'Suwannaphum', serif;margin-bottom: 3%;display: flex ">
                <h2>No. of Admins:</h2>&nbsp;
                <input type="number" class="form-control" name="admin_count" value="<?php echo $number_of_rows2;  ?>" aria-describedby="basic-addon1" style="font-size: 30px;border-color:darkgreen;border-style:dashed;border-width: 4px;" readonly/>
  <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
  

                </div>
                
</div>

<form method="POST">
  <h2 >ADMIN ACCOUNTS</h2>
    <div class="table-responsive">          
      <table class="table table-striped table-bordered" style="background-color: pink;border-color: darkgreen;">
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
    </form>
<br>
    
</body>
</html>