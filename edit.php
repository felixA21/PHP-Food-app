<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["food_id"])) {
    $food_id_to_edit = $_GET["food_id"];

    // Retrieve food details for editing
    $edit_query = "SELECT * FROM food WHERE food_id = $food_id_to_edit";
    $edit_result = mysqli_query($con, $edit_query);

    if ($edit_result) {
        $edit_row = mysqli_fetch_assoc($edit_result);

        echo "
        <form action='edit.php' method='post'>
            <input type='hidden' name='food_id' value='{$edit_row['food_id']}'>
            <label>Food Name:</label>
            <input type='text' name='food_name' value='{$edit_row['food_name']}' required>

            <label>Carbohydrates:</label>
            <input type='number' name='food_carb' value='{$edit_row['food_carb']}' required>

            <label>Protein:</label>
            <input type='number' name='food_protein' value='{$edit_row['food_protein']}' required>

            <label>Fat:</label>
            <input type='number' name='food_fat' value='{$edit_row['food_fat']}' required>

            <button type='submit' name='update'>Update</button>
        </form>";
    } else {
        echo "Error fetching food details: " . mysqli_error($con);
    }
}

// Handle form submission for updating
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update"])) {
    $food_id_to_update = $_POST["food_id"];
    $food_name = $_POST["food_name"];
    $food_carb = $_POST["food_carb"];
    $food_protein = $_POST["food_protein"];
    $food_fat = $_POST["food_fat"];

    // Update the database with the edited information
    $update_query = "UPDATE food 
                     SET food_name = '$food_name', 
                         food_carb = $food_carb, 
                         food_protein = $food_protein, 
                         food_fat = $food_fat 
                     WHERE food_id = $food_id_to_update";

    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
        header("Location: food_list.php");
        exit();
    } else {
        echo "Error updating food item: " . mysqli_error($con);
    }
}
?>