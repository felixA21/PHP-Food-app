
<?php
    include("today.php");   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pie Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            display: flex;
            flex-direction:column;
            align-items: center;
            justify-content: center;
            height: 100vh; 
            margin: 0;
        }
        #myPieChart {
            width: 450px;
            height: 450px;
        }
    </style>
</head>
<body>

<body>
    <h2>Total Macronutrients Pie Chart</h2>
    <canvas id="myPieChart" ></canvas>

    <script>
        // Get the total values from PHP
        var totalCarb = <?php echo $total_carb; ?>;
        var totalProtein = <?php echo $total_protein; ?>;
        var totalFat = <?php echo $total_fat; ?>;

        // Use Chart.js to create a pie chart
        var ctx = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Carbohydrates', 'Protein', 'Fat'],
                datasets: [{
                    data: [totalCarb, totalProtein, totalFat],
                    backgroundColor: ['#FF5733', '#3385FF', '#FFD633']
                }]
            }, options: {
                responsive: false
            }
        });
    </script>
</body>
</html>