<?php
session_start();
// session_unset();
// session_destroy();
include 'connect.php';
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
$user=$_POST['username'];
$mail=$_POST['email'];
$pass=$_POST['password'];


        // Check whether this username exists
        $existSql = "SELECT * FROM `client` WHERE username = '$user'";
        $result = mysqli_query($conn, $existSql);
        $numExistRows = mysqli_num_rows($result);
        // Check whether this email exists
        $existSql1 = "SELECT * FROM `client` WHERE email = '$mail'";
        $result1 = mysqli_query($conn, $existSql1);
        $numExistRows1 = mysqli_num_rows($result1);
        if($numExistRows > 0){
            // $exists = true;
            // header("Location:signup.html");
            $showError = "Username Already Exists";
        }
elseif($numExistRows1 > 0){
    $showError = "This email is already registered";
	} 
        else{


$_SESSION['username']=$_POST['username'];
$_SESSION['email']=$_POST['email'];
$_SESSION['pass']=$_POST['password'];

// echo '<script>
// 	document.getElementById("form1").submit();
// </script>';
            header("Location:signup_part2.php");
            // $stmt->close();
			// $sql = "INSERT INTO `client` ( `username`, `password`, `email`) VALUES ('$user', '$hash', '$mail')";
            // $result2 = mysqli_query($conn, $sql);
            // if ($result2){
				// header("Location:signup_part2.php");
            // }
        }
// }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign-up Page</title>
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="signup.css">

	<!-- <meta name="google-signin-client_id" content="78088409477-u88acurm01j7t4j5pamm688l02jmtkji.apps.googleusercontent.com"> -->
</head>
<body>

<!-- <div class="g-signin2" data-onsuccess="onSignIn"></div> -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>	

<!-- <script type="text/javascript" src="google.js"></script> -->
<!-- <script src="https://apis.google.com/js/platform.js" async defer></script> -->
<?php
    // if($showError){
    // echo "<script>alert('$showError' );</script>";
    // }
?>
    <?php
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>

    <!-- action="connect.php" --> 
	<!-- action="signup_part2.php" -->
<form method="post" auto_complete="off" class="container"  onsubmit="return validateForm()" id="form1">
	<div class="d-flex justify-content-end h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign Up</h3>
				<div class="d-flex justify-content-end social_icon">
				<a href="https://instagram.com/vermabhavya183?igshid=ZDdkNTZiNTM="><span><i class="fab fa-facebook-square"></i></span></a>
				<a href="https://www.facebook.com/bhavya.verma.9849912?mibextid=ZbWKwL"><span><i class="fab fa-google-plus-square"></i></span></a>
				<a href="https://www.linkedin.com/in/bhavya-verma-754983247"><span><i class="fab fa-twitter-square"></i></span></a>
                    
				</div>
			</div>
			<div class="card-body">
				<form>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="username" name="username" id="username">
						
					</div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-envelope"></i></span>
						</div>
						<input type="email" class="form-control" placeholder="email id" name="email" id="email">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="password" name="password" id="password">
					</div>
					<div class="input-group form-group">
						<input type="submit" value="Create Account" class="btn float-right login_btn" name="register"  > 
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Already have an account?<a href="login.php" style="color:  rgb(255, 108, 169);">Login</a>
				</div>
			</div>
		</div>
	</div>
</form>  
<script type="text/javascript" src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!-- <div class="data">
	<p>NAME</p>
	<p id="name"  style="color:black;"></p>
	<p>PROFILE PIC</p>
	<img src="images/" alt="" id="image">
	<p>EMAIL</p>
	<p id="email"></p>
</div> -->
</body>
</html>





