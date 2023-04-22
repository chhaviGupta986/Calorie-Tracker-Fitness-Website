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
    echo "inside isset";
    $id=$_SESSION['id'];
    // $query = " ";
    // $query_run = mysqli_query($connection, $query);
    $stmt = $con->prepare("DELETE FROM client WHERE user_id='$id'");
$stmt->execute();
 
}

?>