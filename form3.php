<?php
include 'connect.php'; 
session_start(); 
// include("include/signup_part2.php");
    //Initializing the session
    // session_start();

             //Creating a custom session id
            //  session_id("my-id");
             //Starting the session
  
            //  print("Id: ".session_id());

// $user=$_SESSION['username'];
// $mail=$_SESSION['email'];
// $pass=$_SESSION['pass'];
// $lname=$_POST['lname'];
// $fname=$_POST['fname'];
// $dob=$_POST['dob'];
// $gender= $_POST['gender'][0];
// $weight=$_POST['weight']; 
// $height=$_POST['height'];
$user=$_SESSION['username'];
$mail=$_SESSION['email'];
$pass=$_SESSION['pass'];
$lname=$_SESSION['lname'];
$fname=$_SESSION['fname'];
$dob=$_SESSION['dob'];
$gender= $_SESSION['gender'];
$weight=$_SESSION['weight']; 
$height=$_SESSION['height'];

    // print_r($_SESSION);
    $hash = password_hash($_SESSION['pass'], PASSWORD_DEFAULT);
    // session_destroy();
    //writing MySQL Query to insert the details
    // $insert_query = 'insert into client (
    //                 username,
    //                 email,
    //                 password,
    //                 fname,
    //                 lname,
    //                 gender,
    //                 dob,
    //                 weight,
    //                 height,
    //                 ) values (
    //                 ' . $_SESSION['username'] . ",
    //                 " . $_SESSION['email'] . ",
    //                 " . $hash . ",
    //                 " . $_POST['fname']. ",
    //                 " . $_POST['lname']. ",
    //                 " . $_POST['gender'][0]. ",
    //                 " . $_POST['dob']. ",
    //                 " . $_POST['weight']. ",
    //                 " . $_POST['height']. "
    //                 );";
  
    //let's run the query
    // mysql_query($insert_query);
// echo "hi1";
// print_r($_SESSION);
    $sql = "INSERT INTO `client`( `password`,`fname`, `email`,`username`,`lname`,`dob`, `gender`,`weight`, `height`) 
    VALUES (
     '$hash',  
     '$fname',     
     '$mail',
     '$user',
     '$lname', 
    '$dob',
    '$gender',
    '$weight', 
    '$height')";
$result = mysqli_query($conn, $sql);

// session_destroy();  
if ($result){
// session_start();
// session_unset();
// session_destroy();
$sql1="SELECT height,weight FROM `client` WHERE username='$user'";
$result1 = mysqli_query($conn, $sql1);
// print_r($result1);
if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()) {

         $ht= $row["height"]; 
          $wt=$row["weight"]; 
        //   $g=$row["gender"];               
    }
    // echo $ht;
    // echo $wt;
    // echo $g;
    $bmi=($wt*10000)/($ht*$ht);
    ?>
 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete sign-up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <!-- <link rel="stylesheet" href="signup_part2.css" type="text/css"> -->
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
</style>
</head>

<body>

    <!-- <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom: 0px;"> -->

    <section class="h-100" style="display:flex; justify-content: center; ">
    <div class="row row-cols-md-2 row-cols-1">
                <div class="col" style="padding-top:3%; padding-right: 2%; padding-bottom:1%; ">
                    <img src="undraw_exciting_news_re_y1iw.svg" alt="" width="62%">
                </div>
                <div class="col" style="padding-top:15%;  padding-right: 0px;">
                    <!-- <div class="container"> -->

                    <!-- </div> -->
                    <span class="glyphicon glyphicon-ok-sign fs-2"></span>
        <strong class="fs-2"> Registeration Successfull!</strong> 
    <div class="fs-3">
    <?php
    echo "<br>";
    echo "Your BMI is:";
    echo $bmi;
    echo "<br>";
    echo "The healthy BMI range for adults is 18.5-24.9.";
    echo "<br>";
    if($bmi<18.5){
        $target="Gain Weight";
        $sql2="UPDATE `client` SET `target`='$target' WHERE `client`.`username`='$user'";
        $result2 = mysqli_query($conn, $sql2);
        echo "Since your bmi falls in the underweight range, we are setting you target as-";
        echo $target;
    }
    elseif ($bmi>24.9) {
        $target="Lose Weight";
        $sql2="UPDATE `client` SET `target`='$target' WHERE `client`.`username`='$user'";
        $result2 = mysqli_query($conn, $sql2);
        echo "Since your bmi falls in the overweight range, we are setting you target as-";
        echo $target;
    }
    else{
        $target="Maintain Weight";
        $sql2="UPDATE `client` SET `target`='$target' WHERE `client`.`username`='$user'";
        $result2 = mysqli_query($conn, $sql2);
        echo "Your bmi is in the healthy range! We are setting you target as-";
        echo $target;
    }
 } 
    // header("Location:homepage.html");
    // <pre>Successfully Registered</pre>
}
echo "<br>";
    ?>
    <br>
    <h2>
        You can now <a href="login.php">log into your account</a>  and begin tracking!
    </h2>
    </div>
    <button type="button" class="btn fs-3" id="ok"> 
        <a style="color:white" href="homepage.html">Ok</a>
        </button>

                </div>
            </div>
    
    
    </section>

 <script type="text/javascript" src="signup_part2.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script> 
   
</body>

</html>