<?php
  session_start();
  require 'database.php';

  // echo $_SESSION["total"];


  if(!empty($_POST['btn_make_payment']) && count($_SESSION["shopping_cart"]) > 0){

    $card_data = array(
      'item_id'       => $_POST['email'],
      'card_number'       =>  $_POST["card_number"],
      'card_mm_aa'       =>  floatval($_POST["card_mm_aa"]),
      'card_cvc'       =>  intval($_POST["card_cvc"]),
      'name'       =>  intval($_POST["name"]),
      'country'       =>  intval($_POST["country"]),
      'city'       =>  intval($_POST["city"]),
      'address'       =>  intval($_POST["address"])
    );
  
  
    // get products
    $products = $_SESSION["shopping_cart"];

    // var_dump($products);
    $user_id =  $_SESSION['user_id'];
    $status_id = 1;
    $total = $_SESSION["total"];
    $status_id = 1;

    // INSERT
    $stmt = $conn->prepare('
      INSERT INTO promedik.order (customer_id, total_amount, status_id, inserted_at)
      VALUES (:customer_id, :total_amount, :status_id, NOW());
    ');

    $stmt->bindParam(':customer_id', $user_id);
    $stmt->bindParam(':total_amount', $total);
    $stmt->bindParam(':status_id', $status_id);


    if($stmt->execute()){ // se insertaron los valores exitosamente

      $stmt = $conn->prepare('SELECT LAST_INSERT_ID() as order_id;');
      
      if($stmt->execute()){
        // retorna el id de la orden
        $response = $stmt->fetch(PDO::FETCH_ASSOC);
        $order_id = $response["order_id"];

        foreach ( $products as $clave => $valor) {
  
          $product_id = intval($valor["item_id"]);
          // $item_name = $valor["item_name"];
          // $item_price = floatval($valor["item_price"]);
          $item_quantity = intval($valor["item_quantity"]);
      

          // $total_amount = $item_price * $item_quantity;
          $record = $conn->prepare('
            INSERT INTO order_line (order_id, product_id, quantity, inserted_at)
            VALUES (:order_id, :product_id, :quantity, NOW());
          ');
      
          $record->bindParam(':order_id', $order_id);
          $record->bindParam(':product_id', $product_id);
          $record->bindParam(':quantity', $item_quantity);
          $res = $record->execute();

          foreach ( $products as $key => $valor) {
            unset($_SESSION["shopping_cart"][$key]);
          }
        }
      }
        
    }else{
      echo "Error!";
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


    <?php 
        if($res){
          ?>
          <div class="success">
            <img class="success_png" src="./static/imgs/resources/success.png" alt="shopping_cart">
            <br><br>
            <h1> Gracias por tu compra </h1>
            <p> En breve un agente te contactará por WhatsApp para informate de tu pedido</p>
            <a href="index.php"> Seguir comprando </a>
          </div>
    <?php 
        }else{
          echo "Error al añadir el producto!";
        }
    ?>
    <br>

</section>

</body>
</html>