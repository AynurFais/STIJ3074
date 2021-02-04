<?php

$name = $_GET['FoodName'];
$price = $_GET['FoodPrice']; 
$quantity = $_GET['FoodQuantity'];
$calorie = $_GET['FoodCalorie'];

$servername = "sql304.epizy.com";
$username = "epiz_27068073";
$passworddb = "3lrA1mmTQrAHf";
$dbname = "epiz_27068073_foodmenu";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $passworddb);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $sql = "INSERT INTO orders(FoodID, FoodName, FoodPrice, FoodQuantity, FoodCalorie)
  VALUES ('', '$name', '$price', '$quantity', '$calorie')";

  $conn->exec($sql);
  echo "Your data has been recorded in database!";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
  echo "Wrong Data!";
}

$conn = null;

?>