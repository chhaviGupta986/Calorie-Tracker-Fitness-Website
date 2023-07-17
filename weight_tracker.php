<?php
include 'connect.php'; 
session_start(); 
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){

  }
  else{
    $user=$_SESSION['username'];
    
  }   
  $sql1="SELECT user_id,date_of_joining,weight FROM `client` WHERE username='$user'";
  $result1 = mysqli_query($conn, $sql1);
  if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()) {    
        $id=$row["user_id"]; 
        $joined=$row["date_of_joining"]; 
        $weight=$row["weight"];              
    }
}


// $sql3="SELECT updated_on,weight FROM `weight_tracker` WHERE tracker_id='$id'";
// $result3 = mysqli_query($conn, $sql3);  


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['submit'])){
        // { echo "hi";
            if(!empty($_POST['wt_input']))
            {
                // echo "bye"; 
                $current_date = date("Y-m-d");
                // echo $current_date; 
            $new_wt = $_POST['wt_input'];
            $sql4="INSERT INTO `weight_tracker`( `tracker_id`, `weight`, `updated_on`) 
            VALUES ('$id', '$new_wt','$current_date')";
            $result4 = mysqli_query($conn, $sql4);
            // echo $result4;
            }
            else
            {
                $searchErr = "Please enter the information";
            }
        }
    }
    $sql3="SELECT updated_on,weight FROM `weight_tracker` WHERE tracker_id='$id'";
$result3 = mysqli_query($conn, $sql3);  
?>
 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weight Log</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <link rel="stylesheet" href="homepage.css" type="text/css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Phudu:wght@400;500&family=Sulphur+Point:wght@300&family=Suwannaphum&family=Tilt+Neon&display=swap"
        rel="stylesheet">

<style>
    #ok{
    float:right;
    /* margin-right:7%; */
    background-color: #ff44a8;
    color: white;
  }
  #ok:hover {
    /* border-color: lightpink; */
    background-color: lightpink;
    /* color:black; */
  }
  .card-body{
    background-color:white;
    text-align:left;
  }
</style>
</head>

<body>
<nav class="navbar  navbar-expand-md" id="main_nav" aria-label="Second navbar example">
    <div class="container-fluid ">
        <a class="navbar-brand" href="#" style="color: white; font-weight: 500; font-size: xx-large;">
            <img src="images/logo.PNG" alt="Logo" height="50vh" class="d-inline-block"
                style="padding-right:0vh ; padding-bottom: 0.1em; margin: 0px,0px,0px,0px;">

                <h2 style="display: inline; font-family: 'Sulphur Point', sans-serif; font-size: larger; font-weight: bold;">RFiT</h2>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#horizontalNavbar" aria-controls="navbarsExample02" aria-expanded="true"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse  justify-content-end" id="horizontalNavbar">
            <ul class="navbar-nav text-nowrap d-flex">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="welcome.php">HOME</a>
                </li>
                <li class="nav-item"><a class="nav-link" aria-current="page" href="myacc.php"><span
                            class="glyphicon glyphicon-user"></span>PROFILE</a></li>
                            <li class="nav-item"><a class="nav-link" aria-current="page" href="help.php">HELP</a></li>
                <li class="nav-item"><a class="nav-link" target="_blank" aria-current="page" href="logout.php"><span
                            class="glyphicon glyphicon-log-in"></span> LOGOUT</a></li>
            </ul>
        </div>
    </div>
</nav>
    <!-- <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom: 0px;"> -->
    <section class=" fs-2" style="justify-content: center; padding-left:10%;padding-right:10%;padding-top:5%;">

<!-- <div class="card">
  <div class="card-header">
    DATE
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p></p>
      </blockquote>
  </div>
</div> -->
<div class="row">
    <div class="col">
    <?php
        while($row = $result3->fetch_assoc()) {
            $weight1=$row["weight"];                
           $date=$row["updated_on"]; 
           echo '<div class="card">
           <div class="card-header">
           '. $date.'
           </div>
           <div class="card-body fs-1">
             <blockquote class=" mb-0">
               <p>'. $weight1.'</p>
               </blockquote>
           </div>
         </div><br>
         ';         
      }
    ?>
    <br>
    </div>
    <div class="col">
    <div class="card">
  <h5 class="card-header fs-4">Add new log</h5>
  <div class="card-body">
    <h5 class="card-title">Enter weight:</h5>
    <form method="POST">
    <!-- action="weight_data.php" -->
    <input type="number" class="form-control fs-3" pattern="^[0-9]" id="wt_input" name="wt_input"
  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
  <button type="submit" name="submit" class="fs-3 btn m-3" id="ok"> Update Weight
        </button>     
</form>


  </div>
</div> 
<div class="row" style="font-family: 'Sulphur Point', sans-serif;">
<div style="display:inline" class="col-7"><h1 style="margin-bottom:4px;">Target weight</h1>
    <h3 style="font-weight: 600;">to enter the healthy BMI range:</h3></div>

    <div style="color:#ff44a8; font-size:6.5rem; padding-top:2rem; padding-left:2rem; font-weight: 500;" class="col">
    <?php
      $sql5="SELECT target_weight FROM `weight_tracker` WHERE tracker_id='$id'";
      $result5 = mysqli_query($conn, $sql5);
      if ($result5->num_rows > 0) {
        while($row = $result5->fetch_assoc()) {  
            $t_wt=$row["target_weight"];  
            if($row["target_weight"]!=NULL){
                echo $t_wt;
            }    
        }
    }
    ?>
    </div>
</div>
<p class="fs-3 fw-lighter fst-italic">
Track your progress till you reach your target, by logging your weight here from time to time.

</p>   
    </div>
</div>


    </section>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script> 

    <!-- ONG THIS PREVENTS FORM RESUBMISSION SO WELL -->
   <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>

</html>