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

                <p>"Keeping track of your calorie intake is a powerful and empowering step towards a healthier, more balanced lifestyle. Just as a pilot meticulously monitors the fuel gauge of an aircraft for a smooth journey, understanding and managing your caloric consumption is crucial for your body's optimal performance. It serves as a compass guiding you toward your health and wellness goals, whether it be weight management, increased energy levels, or overall well-being. By acknowledging and recording what you consume, you gain a profound awareness of your nutritional choices, fostering a mindful relationship with food. In this journey, every entry becomes a small victory, a conscious decision towards a healthier version of yourself. Tracking calories is not about restriction but rather a tool for informed and intentional nourishment, empowering you to make choices that align with your health aspirations. As you embark on this journey of self-care, remember that the commitment to monitoring your caloric intake is a commitment to yourself, a pledge to fuel your body with the respect and care it deserves."</P>
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