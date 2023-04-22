<?php
session_start();
session_unset();
session_destroy();
echo "You have been logged out successfully."
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body>
<button type="button" name="submit"> 
    <a href="homepage.html">Ok</a>
        
        </button> 
</body>
</html>