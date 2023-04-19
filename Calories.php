<?php
session_start();
// // Connect to the MySQL database
// $conn = mysqli_connect('localhost', 'root', '', 'foodcorner');

// // Check if the connection was successful
// if (!$conn) {
//     die('Connection failed: ' . mysqli_connect_error());
// }

$servername='localhost';
$username="root";
$password="";
 
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
// $search = '';

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
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="food_tracker.html">FOOD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">EXERCISE</a>
                </li>
                <li class="nav-item"><a class="nav-link" aria-current="page" href="signup.html"><span
                            class="glyphicon glyphicon-user"></span> SIGN UP</a></li>
                <li class="nav-item"><a class="nav-link" target="_blank" aria-current="page" href="#"><span
                            class="glyphicon glyphicon-log-in"></span> LOGIN</a></li>
            </ul>
        </div>
    </div>
</nav>
 <form method="POST" >
  <div class="input-group input-group-lg">
  <span class="input-group-text" id="inputGroup-sizing-lg">Quantity</span>
  <input type="text" class="form-control" pattern="^[0-9]" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
</div>

<div class="input-group mb-3">
  <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Units</button>
  <!-- <ul class="dropdown-menu"> -->
  <select name="dropdown" id="dropdown" value="" style="font-size:10px;" onchange="food_info()">
  <?php
                      $uniques=array();
  foreach($result as $key=>$value)
  {
               if ( in_array($value['unit'], $uniques) ) {
                        continue;
                    }

                    $uniques[] =$value['unit'];
                    $option_val=$value['unit'];
                    // echo $value['unit'];
      ?>
      <option style="font-size:10px;"
      value="<?php echo $option_val;?>">
          <?php echo $option_val;?>

    
    </option>
    <!-- <li> -->
      <?php
      //  echo $value['unit'];
       ?>
    <!-- </li> -->
    <?php
  }
  ?>
    </select>
  <!-- </ul> -->
  <?php
if (is_array($result) || is_object($result))
{
    foreach ($result as $key=>$value)
    {
      ?>
      <!-- <input type="text" class="form-control" value= "-->

      <?php 
      // echo $value['unit'];
      ?>
      
      <!--" aria-label="Text input with dropdown button">; -->
      <?php
    }
}
?>
  <!-- foreach($result as $key=>$value)
  { -->
    
  <!-- <input type="text" class="form-control" value="<?php echo $value['unit'];?>" aria-label="Text input with dropdown button"> -->
  <?php
  
  // }
  ?>
</div>
    <button type="submit" name="submit" class="btn btn-dark" >Submit</button>
  </div>
</form>
<br/><br/>
    <h3><u>CCalories</u></h3><br/>
    <div class="table-responsive">          
      <table class="table">
        <thead>
          <tr>
            <th>Sr. no.</th>
            <th>FOOD ITEM</th>
            <th>QUANTITY</th>
            <th>CALORIE</th>
            <th>UNIT</th>
          </tr>
        </thead>
        <tbody>
                <?php
                 if(!$result)
                 {
                    echo '<tr>No data found</tr>';
                 }
                 else{
                  // $uniques=array();
                    foreach($result as $key=>$value)
                    {
                    //   if ( in_array($value['unit'], $uniques) ) {
                    //     continue;
                    // }

                    // $uniques[] =$value['unit'];
                    // echo $value['unit'];
                        ?>
                    <tr>
                        <td><?php echo $key+1;?></td>
                        <td>
                        <!-- href="Calories.php" -->
                          <a href="Calories.php"> <?php echo $value['food_items'];?></a>

                      </td>
                        <td><?php echo $value['quantity'];?></td>
                        <td><?php echo $value['calorie'];?></td>
                        <td><?php echo $value['unit'];?></td>
                    </tr>
                         
                        <?php
                        // $str=array($value['unit']);
                        // echo gettype($str);
                        // echo gettype($value['unit']);
                        $arr = array($value['unit']);




                        // $arrayString=  explode(" ", $str); 
                        
                        // $arr=array($arrayString);
                        // echo count($arr);
                        // $arr=array($);
                        
                        // for($i = 0;$i < count($arr);$i++){
                        //     echo "normal array: ";
                        //     echo $arr[$i];
                        //     echo "  unique:  ";
                            // print_r(array_unique($str));
                        // }
                         
                        //  foreach(array_unique($str) as $arr_item){
                        //     // echo "another array: ";
                        //     echo $arr_item;
                        //  }

                    }
                     
                 }
                ?>
             
         </tbody>
      </table>
    </div>

<script>
  function food_info(){
    var e = document.getElementById("#dropdown");
var value = e.value;
var text = e.options[e.selectedIndex].text;
console.log(text);
  }
</script>
</body>
</html>