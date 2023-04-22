<?php
include 'connect.php';     
session_start();
// error_reporting(0);
// print_r($_SESSION);
// session_destroy();
$showError = false;
// $_SESSION['username']=$_POST['username'];
// $_SESSION['email']=$_POST['email'];
// $_SESSION['pass']=$_POST['password'];
// print_r($_SESSION);
if($_SERVER["REQUEST_METHOD"] == "POST"){    
// include 'connect.php';
echo "why is it not entering heree";
echo "hiiiiii";
         //Creating a custom session id
        //  session_id("my-id");
         //Starting the session
        // session_start(); 
        //  print("Id: ".session_id());
        // print_r($_SESSION);

// $_SESSION['username']=$_POST['username'];
// $_SESSION['email']=$_POST['email'];
// $_SESSION['pass']=$_POST['password'];

// echo $hash;
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$weight=$_POST['weight'];
$height=$_POST['height'];
$dob=$_POST['dob'];
print_r($_SESSION);
// $user=$_SESSION['username'];
  
// $mail=$_SESSION['email'];
  
// $pass=$_SESSION['pass'];

// $sql = "INSERT INTO `client` ( `username`, `password`, `email`) VALUES ('$user', '$hash', '$mail')";
    
// echo $user;
// print_r($_SESSION);
if(!isset($_POST['gender'])){
    $showError="Please select gender";                                               
}
// elseif(!isset($_POST['reason1']) && !isset($_POST['reason2']) && !isset($_POST['reason3']) && !isset($_POST['reason4']) ){
//     $showError="Please check atleast 1 reason";  
// }
// else{
// $showError = false;   
// $gender=$_POST['gender'];
// $reason1=$_POST['reason1'];
// $reason2=$_POST['reason2'];
// $reason3=$_POST['reason3'];
// $reason4=$_POST['reason4'];

// foreach ($gender as $g){ 
//     echo $g."<br />";
// }
else{
    $gender=$_POST['gender'][0];

    $_SESSION['fname']=$_POST['fname'];
    $_SESSION['lname']=$_POST['lname'];
    $_SESSION['gender']=$_POST['gender'][0];
    $_SESSION['weight']=$_POST['weight'];
    $_SESSION['height']=$_POST['height'];
    $_SESSION['dob']=$_POST['dob'];
    print_r($_SESSION);

//     // $sql = "INSERT INTO `client`(`username`, `password`, `email`,`fname`,`lname`,`dob`, `gender`,`weight`, `height`) 
//     // VALUES ('$_SESSION['username']', '$hash', '$_SESSION['email']','$fname', '$lname', '$dob','$gender','$weight', '$height')";
    
//     // $sql = "INSERT INTO `client`(`fname`,`lname`,`dob`, `gender`,`weight`, `height`) 
//     // VALUES ('$fname', '$lname', '$dob','$gender','$weight', '$height')";
    
//     // $result = mysqli_query($conn, $sql);
//     // echo "hi i am below result";
// // if ($result){
//     echo '<script>
// 	document.getElementById("form2").submit();
// </script>';

    header("Location:form3.php");
 }

//             // $stmt1=$conn->prepare("insert into client(fname,lname,dob, gender,weight, height) values(?,?,?,?,?,?)");
//             // // $stmt1->free_result();
//             // $stmt1->bind_param("ssssii",$fname, $lname,$dob, $gender,$weight,$height);
//             // $stmt1->execute();
//             // // echo "Registeration Succesfull...";
//             // header("Location:signup_part2.html");
//             // $stmt1->close();

}


// $sql = "INSERT INTO `client` ( `fname`, `lname`,`dob`, `gender`,`weight`, `height`, `loseweight`,`countcals`,`improvediet`,`gainweight`) 
// VALUES (`$fname`, `$lname`, `$gender`,`$weight`,`$dob`, `$height`, `$reason1[0]`,`$reason2[0]`,`$reason3[0]`,`$reason4[0]`)";
// $result2 = mysqli_query($conn, $sql);
// if ($result2){
//     header("homepage.html");
// }
// }

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
    <link rel="stylesheet" href="signup_part2.css" type="text/css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Phudu:wght@400;500&family=Sulphur+Point:wght@300&family=Suwannaphum&family=Tilt+Neon&display=swap"
        rel="stylesheet">
</head>

<body>
<?php
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" style="margin-bottom: 0px;"
    role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>
    <!-- <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
    <span class="glyphicon glyphicon-ok-sign"></span>
        <strong> Registeration Successfull!</strong> Please tell us some more details about you, so we can serve you
        better.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> -->

    <!-- form -->
    <section class="h-100" style="display:flex; justify-content: center; ">
        <div class="card rounded-4 opacity-100">

        <div class="card-body p-sm-5 text-black fs-3">
            <img src="images/pink_logo.PNG" alt="Logo" height="50vh" class="d-inline-block"
                style="margin-right: 3px; opacity: 100%; ">
            <h1 style="display: inline; 
                    font-family: 'Sulphur Point', sans-serif; font-size:4rem; 
                    color: rgba(0, 0, 0, 0.765); font-weight: 550;
                    vertical-align:middle;">
                RFiT</h1>
            <br><br>
            <!-- onsubmit="dateval()" -->
            <h3 style="color: #ff44a8;">
            <!-- style=" color:rgb(2, 186, 2)" -->
            
            <span class="glyphicon glyphicon-pencil"></span>
        <!-- <strong>Registeration Successfull!</strong>  -->
        Please tell us some more details about you, so we can serve you better.
            </h3>
            <br>
            <!-- onsubmit="return checkfunc()"
        action="form3.php"
        -->
            <form class="row g-8" name="Form2"  id="form2" method="post" >
                    <div class="col-md-6">
                        <label for="validationServer01" class="form-label">First name:</label>
                        <input type="text" class="form-control fs-4 border border-2" name="fname"
                        id="validationServer01" value="Andrew" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationServer02" class="form-label">Last name:</label>
                        <input type="text" class="form-control fs-4 border border-2" name="lname"
                        id="validationServer02" value="Tate" required>
                    </div>
                    <div class="col-md-6 ">
                        <label for="validationServer03" class="form-label"> Gender:</label>
<!-- KEEP NAME OF RADIO BUTTONS SAME -->

<!-- stored as M/F/O  -->
<br>
<input type="radio" class="form-check-input" style="border-width:1.2px; border-color:rgba(128, 128, 128, 0.459);"
id="male"name="gender[]" value="M" style="margin-left: 0%;">
<label for="yes" class="fs-4"style="margin-right: 10%;"> Male </label>
<input type="radio" class="form-check-input" style="border-width:1.2px; border-color:rgba(128, 128, 128, 0.459);"
id="female" name="gender[]" value="F">
<label for="no" class="fs-4"style="margin-right: 10%;" >Female</label>
<input type="radio" class="form-check-input" style="border-width:1.2px; border-color:rgba(128, 128, 128, 0.459);"
id="other" name="gender[]" value="O">
<label for="no" class="fs-4" >Other</label>

                    </div>
                    <div class="col-md-6" onclick="return dateval()">
                        <label for="validationServer04" class="form-label">Date of Birth:</label>
                        <input type="date" class="form-control fs-4 border border-2" id="datefield"
                        value="" max="" min="1920-01-01" name="dob"
                        aria-describedby="validationServer04Feedback" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationServer05" class="form-label">Current Weight:</label>
                        <input type="number" class="form-control fs-5 border border-2"
                        name="weight" min=20 max="220" id="validationServer04"
                            aria-describedby="validationServer05Feedback" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationServer06" class="form-label">Your Height (in cms):</label>
                        <input type="number" class="form-control fs-5 border border-2" name="height"
                        min="20" max="220"
                        id="validationServer06"
                            aria-describedby="validationServer06Feedback" required>
                    </div>
                    <!-- <div class="col-12">
                        <br>
                        <img src="images/target2.jpg" alt="" height="26px" style=" margin-right: 2px;"> 
                        <label for="validationServer07" class="form-label" style=" display:inline;vertical-align: middle; 
                        margin-top: 1rem; color: deeppink;">
                           Why do you want to join RFit?
                            </label>
    <br> -->
    <!-- <div class="choice_list">
        <input type="checkbox" class="form-check-input" 
        style="vertical-align:baseline; width: 0.9em; height: 0.9em; border-width:1.2px; border-radius:0.2em;
         border-color:rgba(128, 128, 128, 0.459);" 
        id="reason1" name="reason1" value="loseweight">
        <label for="reason1"> To lose weight</label>
        <input type="checkbox"         style="vertical-align:baseline; width: 0.9em; height: 0.9em; border-width:1.2px; border-radius:0.2em;
        border-color:rgba(128, 128, 128, 0.459);"
        class="form-check-input" id="reason2" name="reason2" value="countcals">
        <label for="reason2">To count calories </label>
        <input type="checkbox" class="form-check-input" 
        style="vertical-align:baseline; width: 0.9em; height: 0.9em; border-width:1.2px; border-radius:0.2em;
        border-color:rgba(128, 128, 128, 0.459);"
        id="reason3" name="reason3" value="improvediet">
        <label for="reason3">To improve diet</label>
        <input type="checkbox" class="form-check-input"
        style="vertical-align:baseline; width: 0.9em; height: 0.9em; border-width:1.2px; border-radius:0.2em;
        border-color:rgba(128, 128, 128, 0.459);"
         id="reason4" name="reason4" value="gainweight">
        <label for="reason4">To gain weight</label>
    </div> -->
                   
                    <div class="col-12" style="">
                        <button class="btn fs-3" name="submit" type="submit" style="display:block; float:right;">Submit</button>
                    </div>
            </form>
        </div>
</div>
        
    </section>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>  -->
 <script type="text/javascript" src="signup_part2.js"></script>
 <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script> 
   
</body>

</html>


