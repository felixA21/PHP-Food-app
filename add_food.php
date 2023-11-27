<?php


include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $food_name = $_POST["food_name"];
    $food_carb = $_POST["food_carb"];
    $food_protein = $_POST["food_protein"];
    $food_fat = $_POST["food_fat"];

    

  
    $query = "INSERT INTO food (food_name, food_carb, food_protein, food_fat) VALUES ('$food_name', '$food_carb', '$food_protein', '$food_fat')";
    
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "Food item added successfully!";
    } else {
        echo "Error adding food item: " . mysqli_error($con);
    }

    
    // mysqli_close($con);
}
?>