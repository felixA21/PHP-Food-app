<?php
include("connection.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["action"]) && $_GET["action"] == "add" && isset($_GET["food_id"])) {
    $food_id_to_add = $_GET["food_id"];

    // Retrieve the selected food item from the database based on $food_id_to_add
    $query = "SELECT * FROM food WHERE food_id = $$";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $selected_food = mysqli_fetch_assoc($result);

        // Store the selected food item in the session
        if (!isset($_SESSION["today_food_list"])) {
            $_SESSION["today_food_list"] = [];
        }

        $_SESSION["today_food_list"][] = $selected_food;
    }
}


// Check if the action is to remove a food item
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["action"]) && $_GET["action"] == "remove" && isset($_GET["index"])) {
    $index_to_remove = $_GET["index"];

    // Remove the selected food item from the session
    if (isset($_SESSION["today_food_list"][$index_to_remove])) {
        unset($_SESSION["today_food_list"][$index_to_remove]);

        // Reset array keys after removal
        $_SESSION["today_food_list"] = array_values($_SESSION["today_food_list"]);
    }
}

$total_carb = $total_protein = $total_fat = 0;

foreach ($_SESSION["today_food_list"] as $selected_food) {
    $total_carb += $selected_food['food_carb'];
    $total_protein += $selected_food['food_protein'];
    $total_fat += $selected_food['food_fat'];
}

// mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Today</title>
    <style>
        <?php include "styles.css" ?>
    </style>
</head>
<body>
<div class="table-container"> 
    <h2>Today's Food List</h2>
    <table border='1'>
        <tr>
            <th>Food ID</th>
            <th>Food Name</th>
            <th>Carbohydrates</th>
            <th>Protein</th>
            <th>Fat</th>
        </tr>
        
        <?php
    if (isset($_SESSION["today_food_list"])) {
        foreach ($_SESSION["today_food_list"] as $key => $selected_food) {
            echo "<tr>
            <td>{$selected_food['food_id']}</td>
            <td>{$selected_food['food_name']}</td>
            <td>{$selected_food['food_carb']}</td>
            <td>{$selected_food['food_protein']}</td>
            <td>{$selected_food['food_fat']}</td>
            <td><a href='today.php?action=remove&index={$key}'>Remove</a></td>
            
            </tr>"
            ;
        }
    }
    
    echo "<tr>
    <td colspan='2'>Total:</td>
    <td>{$total_carb}</td>
    <td>{$total_protein}</td>
    <td>{$total_fat}</td>
    <td></td>  <!-- Placeholder for the 'Action' column -->
    </tr>";
    ?>
</table>
</div>    



<br>
<br>

<a href="index.php">home</a>
<a href="food_list.php">food list</a>
<a href="piechart.php">View Pie Chart</a>

</body>
</html>