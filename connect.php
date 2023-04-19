<?php
// $user=$_POST['username'];
// $mail=$_POST['email'];
// $pass=$_POST['password'];
$conn=new mysqli('localhost','root','','rfit');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}
// else{

//         // Check whether this username exists
//         $existSql = "SELECT * FROM `client` WHERE username = '$user'";
//         $result = mysqli_query($conn, $existSql);
//         $numExistRows = mysqli_num_rows($result);
//         // Check whether this email exists
//         $existSql1 = "SELECT * FROM `client` WHERE email = '$mail'";
//         $result1 = mysqli_query($conn, $existSql1);
//         $numExistRows1 = mysqli_num_rows($result1);
//         if($numExistRows > 0){
//             // $exists = true;
//             $showError = "Username Already Exists";
//             // header("Location:signup.html");
//         }
// elseif($numExistRows1 > 0){
//     $showError = "This email is already registered";
// }
//         else{
//             $stmt=$conn->prepare("insert into client(username,email,password) values(?,?,?)");
//             $stmt->bind_param("sss",$user,$mail,$pass);
//             $stmt->execute();
//             // echo "Registeration Succesfull...";
//             header("Location:signup_part2.html");
//             $stmt->close();
//         }
// }
?>

<?php
    // if($showError){
    // // echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
    // //     <strong>Error!</strong> '. $showError.'
    // //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    // //         <span aria-hidden="true">&times;</span>
    // //     </button>
    // // </div> ';
    // echo "<script>alert('$showError' );</script>";
    // }
    ?>



