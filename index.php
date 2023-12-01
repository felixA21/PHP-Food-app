<?php
// Initialize the session
session_start();

include("connection.php");

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Fetch user data
$username = $_SESSION['username'];
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Food App</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    -->
    <style>
        <?php include "styles.css" ?>
    </style>


</head>

<body>
    <div class="header">
        <div class="header-content">
            <img src="logo.png" alt="logo img"> 
         
            <h2>Let's build your calory plan for today!</h2> 
            <div class="current-datetime">
                <div class="current-date"> <?php echo date("Y-m-d"); ?></div>
                <div class="current-time"> <?php echo date("H:i:s"); ?></div>
            </div>
        </div>    
    </div>
    
    <div class="main">
     
        <div class="sidebar">
        
            <p>What is your plan?</p>
            <ul>
                <li>Visit <a href="food_list.php">Food List</a></li>
                <li>Visit <a href="today.php">Today</a></li>

            </ul>
        </div>        

        <div class="content">
            <div class="content-paragraph">

                <img class="body-img" src="meal1.jpg" alt="meal img">
            </div>
        </div>    

    </div>
    
    
    <footer>
        <p><a href="logout.php" class="">Sign Out of Your Account</a></p>
        <p>© All rights reserved by Diet Plan App, 2023</p>
    </footer>
     <script src="scripts.js"></script>
</body>
</html>