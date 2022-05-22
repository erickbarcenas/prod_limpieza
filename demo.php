<?php
  session_start();

  require 'database.php';

  $products = $_SESSION["shopping_cart"][0];

  $order_id = 15;
  $product_id = intval($products["item_id"]);
          // $item_name = $valor["item_name"];
          // $item_price = floatval($valor["item_price"]);
          $item_quantity = intval($products["item_quantity"]);

$record = $conn->prepare('
            INSERT INTO order_line (order_id, product_id, quantity)
            VALUES (:order_id, :product_id, :quantity);
          ');
      
          $record->bindParam(':order_id', $order_id);
          $record->bindParam(':product_id', $product_id);
          $record->bindParam(':quantity', $item_quantity);
          $res = $record->execute();

          if($res){
            var_dump("Se ha añadido el producto!");
          }else{
            echo "Error al añadir el producto!";
          }

?>