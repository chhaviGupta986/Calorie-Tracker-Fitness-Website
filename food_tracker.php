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
     


// Initialize the search query variable
$search = '';

// Check if the search form was submitted
// include 'connect_test_db.php';
$searchErr = '';
$result='';
if(isset($_POST['submit']))
{
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

if(isset($_POST['calc']))
{

    if(!empty($_POST['qty_input']))
    {   
        $qty = $_POST['qty_input'];//user entered qty
        $unit = $_POST['dropdown'];
        // $stmt1 = $con->prepare("select * from food_data where food_items = '$qty'");
        // $stmt1->execute();
        // $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        // $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        $item = $_POST['item_name'];//user entered item
        $stmt1 = $con->prepare("select quantity,calorie from food_data where food_items = '$item' and unit='$unit'");
        $stmt1->execute();
        // $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        foreach($result1 as $key=>$value)
        {
                          $qty_col=$value['quantity'];
                          $cal_col=$value['calorie'];
                          $calculated_Cal=$qty*($cal_col/$qty_col);
                        
         }
         echo $calculated_Cal;
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
</style>


</head>
<body>
  <nav class="navbar  navbar-expand-md" id="main_nav" aria-label="Second navbar example">
    <div class="container-fluid ">
        <a class="navbar-brand" href="#" style="color: white; font-weight: 500; font-size: xx-large;">
            <img src="logo.PNG" alt="Logo" height="50vh" class="d-inline-block"
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
                    <a class="nav-link " aria-current="page" href="homepage.html">HOME</a>
                </li>
                <li class="nav-item"><a class="nav-link" aria-current="page" href="signup.html"><span
                            class="glyphicon glyphicon-user"></span>PROFILE</a></li>
                <li class="nav-item"><a class="nav-link" target="_blank" aria-current="page" href="#"><span
                            class="glyphicon glyphicon-log-in"></span> LOGOUT</a></li>
            </ul>
        </div>
    </div>
</nav>
 <form method="POST" >
  <div style="width: 50%;  border-style:outset; margin-left: 25%;margin-right: 25%;margin-top: 2%; ">
  <div class="input-group mb-2" style="width: 100%;  border-style:outset;">
    <input type="text" class="form-control fs-3" placeholder="Search for a food item" name="search" style="" aria-label="Search food" aria-describedby="basic-addon2" >
    <button type="submit" name="submit" id="search" class="btn fs-3">Search</button>
    </div>
    <!-- <div id="item_name" class="fs-3" style="color: #ff44a8;" hidden>
  </div> -->
  </form>
  <form method="POST" >
  <input type="text" class="form-control fs-4" value="" id="item_name" name="item_name" 
  style="color: #ff44a8; border:none;" hidden>
    <div class="input-group mb-3" style="width: 100%; border-style: outset;">
  <span class="input-group-text fs-3" id="inputGroup-sizing-lg" > Quantity</span>
  <!-- <button class="btn btn-outline-secondary " type="button"  aria-expanded="false">Units</button> -->
  <input type="number" class="form-control fs-3" pattern="^[0-9]" id="qty" name="qty_input"
  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" disabled>
  <select name="dropdown" class="fs-3" id="dropdown" value="" disabled>
  </div>

  </div>

 

  
<!-- <div class="input-group mb-3"> -->

  <?php
                      $uniques=array();
  foreach($result as $key=>$value)
  {
               if ( in_array($value['unit'], $uniques) ) {
                        continue;
                    }

                    $uniques[] =$value['unit'];
                    $option_val=$value['unit'];
      ?>
      <option class="fs-3"
      value="<?php echo $option_val;?>">
          <?php echo $option_val;?>

    
    </option>

      <?php

       ?>

    <?php
  }
  ?>
    </select>

  <?php
if (is_array($result) || is_object($result))
{
    foreach ($result as $key=>$value)
    {
      ?>
      <?php
    }
}
?>


</div>
    <!-- <button type="submit" name="submit" class="btn btn-dark" >Calculate</button> -->
  </div>
<!-- </form> -->
<br/><br/>
<h3 id="head"><u>Search Result</u></h3><br/>
    <div class="table-responsive">          
      <table class="table" id="table" >

        <thead>
          <tr>
            <th>Sr. no.</th>
            <th>FOOD ITEM</th>
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
  $uniques1=array();
   foreach($result as $key=>$value)
   {
    ?>
    <?php
    if ( in_array($value['food_items'], $uniques1) ) {
      continue;
  }
  $uniques1[] =$value['food_items'];
  $food=$value['food_items'];
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
         class="foodbtn" value="<?php echo $food;?>">
         <?php echo $food;?>

       </button>
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
    <button type="submit" name="calc" class="btn fs-3" id="calc" onclick="calories()" hidden> 
     Calculate Calories
        </button>
</form>

    <button type="button" class="btn fs-3" style="" id="back" hidden> 
    <a href="food_tracker.php " style="text-decoration: none; color:white">Back</a>
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
// let qty = document.querySelector("#qty");
// let dropdown = document.querySelector("#dropdown");
// let search = document.querySelector("#search");
// let form = document.querySelector("form");
// qty.disabled = true;
// dropdown.disabled = true;
// form.addEventListener("submit", stateHandle);
// function stateHandle() {
//         qty.disabled = false;
//         dropdown.disabled = false;
// }
</script>

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
<?php

?>


</body>
</html>