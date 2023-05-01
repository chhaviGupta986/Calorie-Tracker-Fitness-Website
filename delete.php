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
try
{
    $con=new PDO("mysql:host=$servername;dbname=rfit",$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo '<br>'.$e->getMessage();
}
if(isset($_POST['del_btn']))
{
    // echo "inside isset";
    $id=$_SESSION['id'];
    // $query = " ";
    // $query_run = mysqli_query($connection, $query);
    $stmt = $con->prepare("DELETE FROM client WHERE user_id='$id'");
$stmt->execute();
}
echo "Your account has been deleted successfully."
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
</head>
<body>
<button type="button" name="submit"> 
    <a href="homepage.html">Ok</a>
        
        </button> 
</body>
</html>