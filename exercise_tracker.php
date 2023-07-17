<?php
session_start();
include 'connect.php'; 
$servername='localhost';
$username="root";
$password="";
                                  //  dont click on item names with double quotes bcus php gets confused
try
{
    $con=new PDO("mysql:host=$servername;dbname=rfit",$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo 'connected';
}
catch(PDOException $e)
{
    echo '<br>'.$e->getMessage();
}
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: login.php");
  exit;
}
else{
  $user=$_SESSION['username'];
  $id=$_SESSION['id'];
}    


$display=false;
// Initialize the search query variable
$search = '';

// Check if the search form was submitted
// include 'connect_test_db.php';
$searchErr = '';
$result='';
if(isset($_POST['submit']))
{ $display=false;
    if(!empty($_POST['search']))
    {
        $search = $_POST['search'];
        $stmt = $con->prepare("select * from exercise_data where workout like '%$search%'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    else
    {
        $searchErr = "Please enter the information";
    }
}
if(isset($_POST['addex']))
// if(!empty($_POST['addex']))
{   
  // echo $_POST['addex'];
        $display=false;
        $addex = $_POST['addex'];
        $stmt2 = $con->prepare("update exercise_tracker set cals=cals+'$addex' where tracker_id='$id'");
        $stmt2->execute();
        $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        // if($result2)
        // {
           echo '<script>alert("'.$addex.' calories were added to your daily calorie budget!");
           </script>';
          //  echo '<script>alert(';
          //  echo $addex;
          //  echo '"calories were added to your daily calorie budget!");
          //  </script>';
          // echo '<script language="javascript">';
          // echo 'alert("message successfully sent")';
          // echo '</script>';

        // }
}
if(isset($_POST['calc']))
{

    if(!empty($_POST['qty_input']))
    {   
        $qty = $_POST['qty_input'];//user entered qty //time
        // $stmt1 = $con->prepare("select * from food_data where food_items = '$qty'");
        // $stmt1->execute();
        // $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        // $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        $item = $_POST['item_name'];//user entered item //exercise name
        $stmt1 = $con->prepare("select MET from exercise_data where workout = '$item'");
        $stmt1->execute();
        $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        $stmt2 = $con->prepare("select weight from client where username = '$user'");
        $stmt2->execute();
        $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        foreach($result1 as $key=>$value)
        {
                          // $workout_col=$value['workout'];
                          $MET=$value['MET'];
                          //find weight of user now to do formula
                          // $calculated_Cal=$qty*($cal_col/$qty_col);
                        
         }
        foreach($result2 as $key=>$value)
        {
                          // $workout_col=$value['workout'];
                          $weight=$value['weight'];
                          //find weight of user now to do formula
                          // $calculated_Cal=$qty*($cal_col/$qty_col);
                        
         }
         $calculated_Cal=$qty*$MET*$weight*3.5/200;
        //  echo $calculated_Cal;
         $display=true;
    }
    else
    {
        $searchErr = "Please enter the information";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Exercise</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="food_tracker.css">
    <link rel="stylesheet" href="homepage.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Phudu:wght@400;500&family=Sulphur+Point:wght@300&family=Suwannaphum&family=Tilt+Neon&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
<style>
  .foodbtn{
    border:none;
    background-color:white;
  }
  .foodbtn:hover{
color:grey;
  }
  #back{
    float:right;
    margin-right:25%;
    background-color: #ff44a8;
    color: white;
  }
  #calc{
    float:left;
    margin-left:25%;
    background-color: #ff44a8;
    color: white;
  }
  #item_name{
    font-size:10px;
    display:inline-block;
  }
  #back:hover {
    background-color: lightpink;
  }
  #calc:hover {
    background-color: lightpink;
  }
  #addex{
    /* background-color: #ff44a8; */
    background-color: lightpink;
    /* color: white; */
    /* color: #ff44a8; */
    border-color:#ff44a8;
    margin-left:5%;
  }
  #addex:hover {
    /* background-color: lightpink; */
    background-color: white;
    color:#ff44a8;
  }
</style>


</head>
<body class="fs-4">
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

 <form method="POST" >
  <div style="width: 50%;  border-style:outset; margin-left: 25%;margin-right: 25%;margin-top: 2%; ">
  <div class="input-group mb-2" style="width: 100%;  border-style:outset;">
    <input type="text" class="form-control fs-3" placeholder="Search for a workout" name="search" style="" aria-label="Search food" aria-describedby="basic-addon2" >
    <button type="submit" name="submit" id="search" class="btn fs-3">Search</button>
    </div>
    <!-- <div id="item_name" class="fs-3" style="color: #ff44a8;" hidden>
  </div> -->
  </form>
  <form method="POST" >
  <input type="text" class="form-control fs-3" value="" id="item_name" name="item_name" 
  style="color: #ff44a8; border:none;" hidden readonly>
    <div class="input-group mb-2" style="width: 100%; border-style: outset;">
  <span class="input-group-text fs-3" id="inputGroup-sizing-lg" >How many minutes?</span>
  <!-- <button class="btn btn-outline-secondary " type="button"  aria-expanded="false">Units</button> -->
  <input type="number" class="form-control fs-3" pattern="^[0-9]" id="qty" name="qty_input"
  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" disabled>
  
  </div>

  </div>

 

  
<!-- <div class="input-group mb-3"> -->
<?php
// if (is_array($result) || is_object($result))
// {
//     foreach ($result as $key=>$value)
//     {

//     }
// }
?>



<!-- </form> -->
<br>
<div style="padding:2%;">
<div class="fs-1 fw-bold" style="color:rgb(236, 77, 143);">
  <?php
  if($display){
    echo "You burnt ";
    echo $calculated_Cal;
    echo " Calories!";
    ?> 
    <button type="submit" name="addex" value="<?php echo $calculated_Cal; ?>" class="btn fs-3" id="addex"> 
     Add
        </button>
    <?php  
  }
  ?> 
      
</div>
<div class="row">
      <div class="col-12 fs-3 fw-lighter fst-italic" style="margin-top:2rem;">
      Exercise calorie estimates are based upon your body weight and other details.
          </div>
            </div>
<br>

<h3 id="head"><u>Search Result</u></h3><br/>
    <div class="table-responsive">          
      <table class="table" id="table" >

        <thead>
          <tr>
            <th>Sr. no.</th>
            <th>Exercise</th>
            <!-- <th>QUANTITY</th>
            <th>CALORIE</th>
            <th>UNIT</th> -->
          </tr>
        </thead>
        <tbody>
<?php
$index=0;
if(!$result)
{
   echo '<tr>No data found</tr>';
}
else{
   foreach($result as $key=>$value)
   {
    $ex=$value['workout'];
    $index++;
    ?>
   <tr>
       <td><?php 
      //  echo $key+1;
      echo $index;
       ?></td>
       <td>
<!-- warning:id for repeated button -->
         <button type="button" onclick="activate(this.id)"  id="<?php echo $index;?>"
         class="foodbtn" value="<?php echo $ex;?>">
         <?php echo $ex;?>
       </button>
     </td>
   </tr>       
       <?php
       $arr = array($value['workout']);
   }
  }
// ?>





         </tbody>
      </table>

    </div>
    </div>  
    <button type="submit" name="calc" class="btn fs-3" id="calc" onclick="calories()" hidden> 
     Calculate Calories Burnt
        </button>
</form>

    <button type="button" class="btn fs-3" style="" id="back" hidden> 
    <a href="exercise_tracker.php " style="text-decoration: none; color:white">Back</a>
        </button>

        <?php
  // foreach($result1 as $key=>$value)
  // {
  //                   $qty_col=$value['quantity'];
  //                   $cal_col=$value['calorie'];
  //                   $calculated_Cal=$qty*($cal_col/$qty_col);
                  
  //  }
  //  echo $calculated_Cal;

  ?>

<script>
function activate(clicked_id){
  document.getElementById("qty").disabled=false;
  let btn = document.getElementById(clicked_id);
  let val = btn.value; //stores item name
  item=val;
  document.getElementById("table").hidden = true;
  document.getElementById("head").hidden = true;
  document.getElementById("back").hidden = false;
  document.getElementById("calc").hidden = false;
  document.getElementById("item_name").hidden = false;
  document.getElementById("item_name").value = val;
}
</script>



</body>
</html>