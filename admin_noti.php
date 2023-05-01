<?php
include 'connect.php';
session_start();
error_reporting(0);
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
 exit();
  }

  else{
    
    $user=$_SESSION['username'];

    $sql1="SELECT * FROM `notification`";
    $result1 = mysqli_query($conn, $sql1);

    if(isset($_POST['send'])){
      
        $send = $_POST['send'];
        $reply_msg=$_POST[$_POST['send']];
        // $reply_msg=$_POST['reply_txt'];
        // echo $send;
        // echo $reply_msg;
        // $user=$_POST['noti_username'];
        // echo $reply_msg;
        $sql2="UPDATE `notification` SET reply='$reply_msg' WHERE  noti_id='$send'";
        $result2 = mysqli_query($conn, $sql2);
      }
  }  
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="feedshow.css" type="text/css">
    <link
        href="https://fonts.googleapis.com/css2?family=Phudu:wght@400;500&family=Sulphur+Point:wght@300&family=Suwannaphum&family=Tilt+Neon&display=swap"
        rel="stylesheet"> 
</head>
<body >
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
  <a href="admindash.php" style="color:white;text-decoration: none" >DASHBOARD</a></button>
  <button class="btn me-md-2" style="background-color:darkgreen" type="button">
  <a href="feedbackview_admin.php" style="color: white;text-decoration: none;"> FEEDBACKS</a></button>
  <button class="btn me-md-3" style="background-color: #ff44a8" type="button">
  <a href="logout.php" style="color: white;text-decoration: none;"> LOGOUT</a></button>
</div>

  </div>

<form method="post">

<div class="table-responsive p-2">          

      <table class="table table-striped table-bordered" style="background-color: pink;border-color: darkgreen;">

        <thead>

          <tr>

            <th>Sr. no.</th>

            <th>user</th>

            <th>Notifications</th>

            <th>Reply</th>
          </tr>
        </thead>
        <tbody>
                <?php
                    foreach($result1 as $key=>$value)

                    {

                        ?>

                    <tr>

                        <td><?php echo $key+1;?></td>

                        <td><?php echo $value['noti_user'];?></td>

                        <td><?php echo $value['noti_txt'];?></td>

                        <td>
                        <!-- <input type="hidden" name="id_noti" value=''> -->
                  <!-- <input type="text" name="reply_txt" value=""> -->
                  Existing reply:
                  <div style="display:inline; color:maroon;"><?php if($value['reply']==NULL){
                    echo '<div style="display:inline; color:red; font-weight:bold;">NO REPLY YET! PLEASE ADD A REPLY!</div>';
                  }
                  else{
                    echo $value['reply'];
                  }?></div>
                  
                  
                  <br>
                  <input type="text" style="width:100%; margin-bottom:10px;margin-top:10px;"name="<?php echo $value['noti_id'];?>" value="">

                  <!-- <button type="submit" name="send" value='<?php echo $value['noti_id'];?>' 
                  class="btn btn-success"> -->
                  <button type="submit" name="send" value='<?php echo $value['noti_id'];?>' 
                  class="btn btn-success">
                  Edit Reply</button>                 
                </td>
                    </tr>
                    
                     <?php    

 

                 }

                ?>

             

         </tbody>

      </table>
      
    </div>
   
    </form>
    </section>
</body>

</html>