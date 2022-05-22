<?php

session_start();
require 'database.php';

foreach($_SESSION["shopping_cart"] as $key => $value){

  if(intval($value["item_id"])){
    unset($_SESSION["shopping_cart"][$key]);
  }
}

?>





<!DOCTYPE html>
<html lang="es">
<head>
  <?php require 'partials/head.php' ?>
  <title> Carrito </title>
</head>

<body>
<!-- HEADER -->
<?php require 'partials/header.php' ?>
<br><br><br><br><br><br>

<section class="container_success">
    
    <br><br>
    <img class="success_png" src="./static/imgs/resources/success.png" alt="shopping_cart">
    <br><br>
    <h1> Gracias por tu compra </h1>
</section>

</body>
</html>