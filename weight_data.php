<?php
if(isset($_POST['submit']))
    { echo "hi";
        if(!empty($_POST['wt_input']))
        {
            echo "bye";
        $new_wt = $_POST['wt_input'];
        $sql4="INSERT INTO `weight_tracker`( `tracker_id`, `weight`, `updated_on`) 
        VALUES ('$id', '$new_wt',current_timestamp())";
        $result4 = mysqli_query($conn, $sql4);
        $sql2="INSERT INTO `weight_tracker`( `tracker_id`, `weight`, `updated_on`) VALUES ('$id', '$weight',$joined)";
        $result2 = mysqli_query($conn, $sql2);
        }
        else
        {
            $searchErr = "Please enter the information";
        }
    }
    ?>