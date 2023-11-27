<?php



include("connection.php");
include("add_food.php");


// Retrieve existing food items from the database
$query = "SELECT * FROM food";
$result = mysqli_query($con, $query);

// Check if the delete action is requested
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["action"]) && $_GET["action"] == "delete" && isset($_GET["food_id"])) {
    $food_id_to_delete = $_GET["food_id"];

    // Perform the deletion in the database
    $delete_query = "DELETE FROM food WHERE food_id = $food_id_to_delete";
    $delete_result = mysqli_query($con, $delete_query);

    if ($delete_result) {
        
        echo "Food item deleted successfully!";
    } else {
        
        echo "Error deleting food item: " . mysqli_error($con);
    }
}

// Display existing food items
echo "<div class='table-container'>";
echo "<h2>Food List</h2>";
echo "<table border='1'>";
echo "<tr>
        <th>Food ID</th>
        <th>Food Name</th>
        
        <th>Carbohydrates</th>
        <th>Protein</th>
        <th>Fat</th>
      </tr>";

while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr id='dynamic-content'>
                <td>{$row['food_id']}</td>
                <td>{$row['food_name']}</td>
                <td>{$row['food_carb']}</td>
                <td>{$row['food_protein']}</td>
                <td>{$row['food_fat']}</td>
                <td>
                <a href='food_list.php?action=delete&food_id={$row['food_id']}'>Delete</a>
                </td>
                <td>
                <a href='today.php?action=add&food_id={$row['food_id']}'>Add to Today</a>
                </td>
              </tr>";
    }
echo "</table>";      
echo "</div>";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food List</title>
    <style>
        <?php include "styles.css" ?>
    </style>
</head>
<body>
<br>
<br>

<form action="food_list.php" method="post" class="form-foodAdd">
    <label for="food_name"></label>
    <input placeholder="Food Name" type="text" name="food_name" required>

    <label for="food_carb"></label>
    <input placeholder="Carbohydrate" type="number" name="food_carb" required>

    <label for="food_protein"></label>
    <input placeholder="Protein" type="number" name="food_protein" required>

    <label for="food_fat"></label>
    <input placeholder="Fat" type="number" name="food_fat" required>

   

    <button type="submit" class="btn-form">Add Food</button>
</form>

<footer>

    <a href="index.php">Home</a>
    <a href="today.php">Today</a>

    <p>© All rights reserved by Diet Plan App, 2023</p>
</footer>


</body>
</html>


