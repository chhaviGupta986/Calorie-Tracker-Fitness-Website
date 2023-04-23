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
    <link rel="stylesheet" href="homepage.css" type="text/css">
    <link
        href="https://fonts.googleapis.com/css2?family=Phudu:wght@400;500&family=Sulphur+Point:wght@300&family=Suwannaphum&family=Tilt+Neon&display=swap"
        rel="stylesheet">  
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
  <a href="admindash.php" style="color: white;text-decoration: none;"> DASHBOARD</a></button>
  <button class="btn me-md-3" style="background-color: #ff44a8" type="button">
  <a href="logout.php" style="color: white;text-decoration: none;"> LOGOUT</a></button>
</div>
  </div>
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
</body>
</html>