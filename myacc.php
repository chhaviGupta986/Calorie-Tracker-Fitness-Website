<?php
include 'connect.php'; 
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
$user=$_SESSION['username'];
// $mail=$_SESSION['email'];
// $pass=$_SESSION['pass'];
// $lname=$_SESSION['lname'];
// $fname=$_SESSION['fname'];
// $dob=$_SESSION['dob'];
// $gender= $_SESSION['gender'];
// $weight=$_SESSION['weight']; 
// $height=$_SESSION['height'];
$sql1="SELECT fname,lname,email,gender,dob,target,date_of_joining FROM `client` WHERE username='$user'";
$result1 = mysqli_query($conn, $sql1);
// print_r($result1);
if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()){
         $target= $row["target"];             
         $mail= $row["email"];             
         $fname= $row["fname"];             
         $lname= $row["lname"];             
         $dob= $row["dob"];             
         $gender= $row["gender"];
         $date_of_joining=  $row["date_of_joining"];                       
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <!-- <link rel="stylesheet" href="signup_part2.css" type="text/css"> -->
    <link rel="stylesheet" href="homepage.css" type="text/css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Phudu:wght@400;500&family=Sulphur+Point:wght@300&family=Suwannaphum&family=Tilt+Neon&display=swap"
        rel="stylesheet">

<style>
   .pink{
    color:rgb(236, 77, 143);
   }
   html, body {margin: 0; height: 120%; overflow: hidden}
</style>
</head>

<body>

    <!-- <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom: 0px;"> -->
    <!-- display:flex; -->
    <!-- <section class="" style=" justify-content: center; "> -->
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
                <li class="nav-item"><a class="nav-link" aria-current="page" href="help.php">HELP</a></li>
                <li class="nav-item"><a class="nav-link" aria-current="page" href="logout.php"><span
                            class="glyphicon glyphicon-log-in"></span> LOGOUT</a></li>
            </ul>
        </div>
    </div>
</nav>
    <div class="d-flex justify-content-center" style="font-size:5rem; color:#ff44a8; 
      background-color: rgba(211, 211, 211, 0.324);">My Account</div>
    <div class="row" style="padding-left:15%;  padding-right:15%; ">
                <div class="col-4 d-flex justify-content-center" style="padding-top:1%;
                 padding-right: 2%; padding-bottom:0%; margin-right:13%;">
                 
                 <?php 
                 if($gender=="M"){
                    echo '<img src="images/pfp_male.png" alt="" height=55%;>'; 

                 }
                 elseif($gender=="F"){
                    echo '<img src="images/pfp_female.png" alt="" height=55%;>'; 
                 }
                 else{
                    echo '<img src="images/pfp2.png" alt="" height=60%; style="margin-top:15%">';
                 }
                 ?>
                    <!-- <img src="images/pfp2.png" alt="" height=70%;> -->
                </div>
                <div class="col" style="padding-top:4%;  padding-right: 5%;">
                    <!-- <div class="container"> -->

                    <!-- </div> -->
    <div class="fs-1 lh-lg" style="margin-bottom:10%;">
    <div class="pink fw-bold" style="display:inline;">
        Name:
</div>
    <?php echo $fname; ?>
    <?php     echo $lname; ?>
    <br>
    <div class="pink fw-bold" style="display:inline;">
        Username:
</div>
    <?php     echo $user;; ?>
    <br>
    <div class="pink fw-bold" style="display:inline;">
        Gender:
</div>
    <?php         echo $gender;?>
    <br>
    <div class="pink fw-bold" style="display:inline;">
        Date of Birth:
</div>
    <?php    echo $dob ?>
    <br>
    <div class="pink fw-bold" style="display:inline;">
        Member since:
</div>
    <?php    echo $date_of_joining?>
    <br>
    <div class="pink fw-bold" style="display:inline;">
        Target:
</div>
To
    <?php        echo $target; ?>
    <br>
    </div >
    <h2>
        <form action="delete.php" method="post" style="margin-bottom:0px;">
        <!-- <button type="submit" name="del_btn" class="btn btn-danger">Delete Account</button> -->
        <input type="submit" name="del_btn" value="Delete Account">
        </form>
        
    </h2>
</div>
            </div>    
    <!-- </section> -->

 <!-- <script type="text/javascript" src="signup_part2.js"></script> -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script> 
   
</body>

</html>