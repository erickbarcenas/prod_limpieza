<?php

  session_start();

  require 'database.php';


if(isset($_GET["action"]) && $_GET["action"] == "delete"){
  foreach($_SESSION["shopping_cart"] as $key => $value){

    if(intval($value["item_id"]) == intval($_GET["id"])){
      unset($_SESSION["shopping_cart"][$key]);
      echo '<script> alert("Producto fuera del carrito")</script>';
    }
  }

  
}



if(isset($_POST["show_form_pay"])){
  echo '<script> window.location="payment.php"</script>';
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

<div id="cart"></div>
<br><br><br><br><br><br>
    
    <?php if( count($_SESSION["shopping_cart"]) > 0) { ?>
    <div class="container_title">
      <h1 class="ml4"> Carrito </h1>
    </div>
    <section class="container__cart">
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <th width="40%"> Nombre </th>
              <th width="10%"> Cantidad </th>
              <th width="20%"> Precio </th>
              <th width="15%"> Total </th>
              <th width="5%"> Acción </th>
            </tr>
            <?php
              if(!empty($_SESSION["shopping_cart"])){
                $total = 0;
                foreach($_SESSION["shopping_cart"] as $keys => $values) {
              
            ?>

            <tr>
              <td><?php echo $values["item_name"]; ?></td>
              <td><?php echo $values["item_quantity"]; ?></td>
              <td><?php echo $values["item_price"]; ?></td>
              <td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
              <td><a class="remove" href="shopping_cart.php?action=delete&id=<?php echo $values["item_id"]; ?>">Quitar</td>

              <?php
                $total = (intval($values["item_quantity"]) *  floatval($values["item_price"]));
                $_SESSION["total"] = $total;

                }
              ?>
            </tr>

            <tr>
              <td colspan="3" align="center" class="total"> Total </td>
              <td align="center">$ <?php echo number_format($total, 2) ?></td>
              <td>
              <form method="POST" action="shopping_cart.php?total=<?php echo number_format($total, 2) ?>">
                 <input class='order' type='submit' name='show_form_pay' class='' value='Pagar'/> 
                <!-- <button class="order" onclick="show_payment_form(true)"> Pagar </button> -->
              </form>  
              </td>
            </tr>

            <?php
            }
            ?>
          </table>
        </div>
    </section>
    

    <?php } else { ?>
      <div class="container_no_products"> 
        <br><br><br>
        <h1> Sin productos </h1>
        <br>
        <a href="index.php"> Adquirir productos</a>    
      </div>
    <?php } ?>
  </body>
</html>