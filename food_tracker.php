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
$logged_in=true;
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
//u can sill access
$logged_in=false;
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
        $stmt = $con->prepare("select * from food_data where food_items like '%$search%'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    else
    {
        $searchErr = "Please enter the information";
    }
}
if(isset($_POST['addmeal']))
// if(!empty($_POST['addmeal']))
{   
  // echo $_POST['addmeal'];
  if($logged_in){
        $display=false;
        $addmeal = $_POST['addmeal'];
        $stmt2 = $con->prepare("update food_tracker set cals=cals+'$addmeal' where tracker_id='$id'");
        $stmt2->execute();
        $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        // if($result2)
        // {
          echo '<script>alert("'.$addmeal.' calories were added to your daily calorie budget!");
          </script>';
          //  echo '<script>alert(';
          //  echo $addmeal;
          //  echo '"calories were added to your daily calorie budget!");
          //  </script>';


        // }
}
else{
  echo '<script>alert("You must login to avail this feature!");
           </script>';
}

}

if(isset($_POST['calc']))
{
    if(!empty($_POST['qty_input']))
    {   
        $qty = $_POST['qty_input'];//user entered qty
        $unit1 = $_POST['dropdown'];
        // $stmt1 = $con->prepare("select * from food_data where food_items = '$qty'");
        // $stmt1->execute();
        // $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        // $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        $item = $_POST['item_name'];//user entered item
        $stmt1 = $con->prepare("select quantity,calorie,unit from food_data where 
        food_items = '$item' and unit='$unit1'");
        $stmt1->execute();
        // $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        foreach($result1 as $key=>$value)
        {
                          $qty_col=$value['quantity'];
                          $cal_col=$value['calorie'];
                          $calculated_Cal=$qty*($cal_col/$qty_col);
                        
         }
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
    <title>Track Meal</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="food_tracker.css">
    <link rel="stylesheet" href="homepage.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Phudu:wght@400;500&family=Sulphur+Point:wght@300&family=Suwannaphum&family=Tilt+Neon&display=swap" rel="stylesheet">

    <script type="text/javascript" src="food_tracker.js"></script>
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
  #dropdown{
    /* background-color: lightpink; */
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
  #addmeal{
    /* background-color: #ff44a8; */
    background-color: lightpink;
    /* color: white; */
    /* color: #ff44a8; */
    border-color:#ff44a8;
    margin-left:5%;
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
  #addmeal:hover {
    /* background-color: lightpink; */
    background-color: white;
    color:#ff44a8;
  }
</style>


</head>
<body class="fs-4">
  <nav class="navbar  navbar-expand-md" id="main_nav" aria-label="Second navbar example">
    <div class="container-fluid ">
        <a class="navbar-brand" href="homepage.html" style="color: white; font-weight: 500; font-size: xx-large;">
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
                            <li class="nav-item"><a class="nav-link" aria-current="page" href="help.php"><span
                            class="glyphicon glyphicon-user"></span>HELP</a></li>
                <li class="nav-item"><a class="nav-link" target="_blank" aria-current="page" href="logout.php"><span
                            class="glyphicon glyphicon-log-in"></span> LOGOUT</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- action="#" -->
 <form method="POST" >
  <div style="width: 50%;  border-style:outset; margin-left: 25%;margin-right: 25%;margin-top: 2%; ">
  <div class="input-group mb-2" style="width: 100%;  border-style:outset;">
    <input type="text" class="form-control fs-3" placeholder="Search for a food item" name="search" style="" aria-label="Search food" aria-describedby="basic-addon2" >
    <button type="submit" name="submit" id="search" class="btn fs-3">Search</button>
    </div>
    <!-- <div id="item_name" class="fs-3" style="color: #ff44a8;" hidden>
  </div> -->
  </form>
  <form method="POST" action="#">
  <input type="text" class="form-control fs-3" value="" id="item_name" name="item_name" 
  style="color: #ff44a8; border:none;" hidden readonly>
    <div class="input-group mb-3" style="width: 100%; border-style: outset;">
  <span class="input-group-text fs-3" id="inputGroup-sizing-lg" > Quantity</span>
  <!-- <button class="btn btn-outline-secondary " type="button"  aria-expanded="false">Units</button> -->
  <input type="number" class="form-control fs-3" pattern="^[0-9]" id="qty" name="qty_input"
  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" disabled>
  <!-- javascript writes into id dropdown and php gets value from name dropdown so both
are necesssary in both buttons lawl -->
  <input name="dropdown" class="dropdown1" type="text" class="fs-3 border b-0 fw-bold" value="" hidden>
  <!-- disabled one is just for show and hidden one is for value. bcus disabled ka input doesnt go in post -->
  <input name="dropdown" class="dropdown1" type="button" class=" fs-3" value="unit"
  style="border-style:none; background-color:white">
  </div>

  </div> 

</div>
    <!-- <button type="submit" name="submit" class="btn btn-dark" >Calculate</button> -->
  </div >
<!-- </form> -->
<div style="padding:2%;">
<div class="fs-1 fw-bold" style="color:rgb(236, 77, 143);">
  <?php
  if($display){
    echo "That would be ";
    echo $calculated_Cal;
    echo " Calories!"; 
    ?> 
    <!-- <div> -->
    <button type="submit" name="addmeal" value="<?php echo $calculated_Cal; ?>" class="btn fs-3" id="addmeal"> 
     Add
        </button>
    <!-- </div> -->

    <?php
  }
  ?> 

</div>
<br>
<br>
<h3 id="head"><u>Search Result</u></h3><br/>
    <div class="table-responsive">          
      <table class="table" id="table" >

        <thead>
          <tr>
            <th>Sr. no.</th>
            <th>FOOD ITEM</th>
            <!-- <th>QUANTITY</th>
            <th>CALORIE</th>-->
            <th>UNIT</th> 
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
  // $uniques1=array();
   foreach($result as $key=>$value)
   {
    // if ( in_array($value['food_items'], $uniques1) ) {
    //   continue;
  
  // $uniques1[] =$value['food_items'];
  $food=$value['food_items'];
  $unit=$value['unit'];
  // $foodunit=array($food,$unit);
  ?>

  <!-- // $index++; -->
       <!-- ?> -->
   <tr>
       <td><?php 
       echo $key+1;
      // echo $index;
      $minuskey=-($key)-1;
       ?></td>
       <td>
  <button type="button" onclick="activate(this.id)"  
  class="foodbtn" value="<?php echo $food;?>" id="<?php echo $key+1;?>">
  <?php echo $food;?>
  </button>

<!-- warning:id for repeated button echo $index;
id="-->

     </td>
     <td>
     <input type="text" class="form-control fs-4" value="<?php echo $unit;?>" 
     id="<?php echo $minuskey;?>" name="unit_input" hidden>
      <?php 
      echo $unit;
      // echo $value['unit'];
      // $unit=$value['unit'];
      ?>
    </td> 
   </tr>
       <?php
       $arr = array($value['unit']);

   }
}
?>
     </tbody>
</table>

    </div>
    </div>
    <!-- onclick="calories()"   -->
    <button type="submit" name="calc" class="btn fs-3" id="calc"  hidden> 
     Calculate Calories
        </button>
</form>

    <button type="button" class="btn fs-3" style="" id="back" hidden> 
    <a href="food_tracker.php " style="text-decoration: none; color:white">Back</a>
        </button>

<script>
  function calories(){
  var u = document.getElementById("dropdown");
  var value = u.options[u.selectedIndex].value;
  var text = u.options[u.selectedIndex].text;
  unit=value;
  var qty_entered = document.getElementById("qty").value;
  console.log(qty_entered);
  console.log(unit);
  console.log(item);
}
</script>



</body>
</html>