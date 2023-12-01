<?php



include("connection.php");
include("add_food.php");
include("delete.php");

// Retrieve existing food items from the database
$query = "SELECT * FROM food";
$result = mysqli_query($con, $query);



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
                <form action='food_list.php' method='get'>
                    <input type='hidden' name='action' value='delete'>
                    <input type='hidden' name='food_id' value='{$row['food_id']}'>
                    <button type='submit' class='btn-delete'>Delete</button>
                </form>
                <form action='edit.php' method='get'>
                    <input type='hidden' name='action' value='edit'>
                    <input type='hidden' name='food_id' value='{$row['food_id']}'>
                    <button type='submit' class='btn-edit'>Edit</button>
                </form>
                <form action='today.php' method='get'>
                    <input type='hidden' name='action' value='add'>
                    <input type='hidden' name='food_id' value='{$row['food_id']}'>
                    <button type='submit' class='btn-atdy'>Add to Today</button>
                </form>
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


