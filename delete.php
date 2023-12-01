<?php

include("connection.php");

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

?>