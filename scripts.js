// function loadFoodList() {
//   var xhttp = new XMLHttpRequest();
//   xhttp.onreadystatechange = function () {
//     if (this.readyState == 4 && this.status == 200) {
//       document.getElementById("dynamic-content").innerHTML = this.responseText;
//     }
//   };
//   xhttp.open("GET", "food_list.php", true);
//   xhttp.send();
// }

// function loadContent(url, targetElementId) {
//   var xhttp = new XMLHttpRequest();
//   xhttp.onreadystatechange = function () {
//     if (this.readyState == 4 && this.status == 200) {
//       // Replace the content of the specified HTML element with the retrieved content
//       document.getElementById(targetElementId).innerHTML = this.responseText;
//     }
//   };
//   xhttp.open("GET", url, true);
//   xhttp.send();
// }

// function addFood() {
//   var form = document.getElementById("addFoodForm");
//   var formData = new FormData(form);

//   // Use AJAX to submit the form data
//   var xhttp = new XMLHttpRequest();
//   xhttp.onreadystatechange = function () {
//     if (this.readyState == 4 && this.status == 200) {
//       // Update the content dynamically after successfully adding the food item
//       loadContent("food_list.php");
//     }
//   };
//   xhttp.open("POST", "add_food.php", true);
//   xhttp.send(formData);
// }

// function deleteFood(foodId) {
//   // Use AJAX to send a request to delete the food item
//   var xhttp = new XMLHttpRequest();
//   xhttp.onreadystatechange = function () {
//     if (this.readyState == 4 && this.status == 200) {
//       // Reload the entire page after successfully deleting the food item
//       loadContent("food_list.php");
//     }
//   };
//   xhttp.open("GET", "delete_food.php?food_id=" + foodId, true);
//   xhttp.send();
// }

// function addToToday(foodId) {
//   // Use AJAX to send a request to add the food item to today's list
//   var xhttp = new XMLHttpRequest();
//   xhttp.onreadystatechange = function () {
//     if (this.readyState == 4 && this.status == 200) {
//       // Update the content dynamically after successfully adding to today's list
//       loadContent("food_list.php");
//     }
//   };
//   xhttp.open("GET", "add_to_today.php?food_id=" + foodId, true);
//   xhttp.send();
// }

// document
//   .getElementById("foodListButton")
//   .addEventListener("click", function () {
//     loadContent("food_list.php");
//   });
