<?php
  session_start();
  require 'database.php';

  // echo $_SESSION["total"];





  
  if(isset($_POST["btn_make_payment"])){

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
    $user_id = $user["id"];
    $status_id = 1;
    $total = $_SESSION["total"];
    $order_id = 1;
  
    var_dump($total);
    /*
    foreach ( $products as $clave => $valor) {
  
      $product_id = intval($valor["item_id"]);
      // $item_name = $valor["item_name"];
      // $item_price = floatval($valor["item_price"]);
      $item_quantity = intval($valor["item_quantity"]);
  
      // $total_amount = $item_price * $item_quantity;
      $record = $conn->prepare('
        INSERT INTO order_line (order_id, product_id, quantity)
        VALUES (:order_id, :product_id, :quantity);
      ');
  
      $record->bindParam(':order_id', $order_id);
      $record->bindParam(':product_id', $product_id);
      $record->bindParam(':quantity', $item_quantity);
      $record->execute();
    }

    */
  
  
   
    
   /*
    $_SESSION["card_data"] = $card_data;
   
    $records = $conn->prepare('
                    INSERT INTO order (customer_id, total_amount, status_id)
                    VALUES (:customer_id, :total_amount, :status_id);
                    ');
  
    $records->bindParam(':customer_id', $user_id);
    $records->bindParam(':total_amount', $total_amount);
    $records->bindParam(':status_id', $status_id);
  
    if($records->execute()) {
      
      
    }
   
   */
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

<section id="payment_form" class="">
      <div class="col content_payment">
        <h1> Total </h1>
        <h2> <?php echo $_SESSION["total"] ?> MXN</h2>
      </div>     
      <div class="col">
        <form method="POST" action="success.php?action=make_payment">

          <div class="form_row">
            <label class="form_label" for="email"> Correo electrónico </label> <br>
            <input class="form_input" type="email" id="email" name="email" placeholder="juan@example.com.mx" />
          </div>

          <div class="form_row">
            <label class="form_label" for="card_number"> Información de la tarjeta </label> <br>
            <div>  
              <input class="form_input_card" type="number" id="card_number" name="card_number"  placeholder="1234 1234 1234 1234"/>
            </div>
            <div class="flex_item">
            <input class="form_input_inline_left" type="number" id="card_number" name="card_mm_aa" placeholder="MM/AA"/>
            <input class="form_input_inline_right" type="number" id="card_number" name="card_cvc" placeholder="CVC" />
            </div>
          </div>

          <div class="form_row">
            <label class="form_label" for="name"> Nombre del titular de la tarjeta </label> <br>
            <input class="form_input" type="text" id="name" name="name" placeholder="Juan Pérez"/>
          </div>
          
          <div class="form_row">
            <label class="form_label" for="country"> País </label> <br>
            <input class="form_input" type="text" id="country" name="country" placeholder="México"/>
          </div>
          <div class="form_row">
            <label class="form_label" for="city"> Ciudad </label> <br>
            <input class="form_input" type="text" id="city" name="city" placeholder="CDMX"/>
          </div>

          <div class="form_row">
            <label class="form_label" for="address"> Dirección </label> <br>
            <input class="form_input" type="text" id="address" name="address" placeholder="Col. del Valle"/>
          </div>

          <div class="form_row">
            <input class="form_btn_pay" type="submit"  
            name="btn_make_payment" class="" value="Pagar" />
          </div>
        </form>
      </div>
    </section>

    </body>
</html>