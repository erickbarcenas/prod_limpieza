<?php
  session_start();

  require 'database.php';

  // HEADER
  // if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT users.id, users.name, users.email, users.password FROM users WHERE id = :id');
    $user_id = 5;
    $records->bindParam(':id', $user_id);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  // }

if(isset($_POST["add_to_cart"])){

  if(isset($_SESSION["shopping_cart"])){
      $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");

      if(in_array($_GET["id"], $item_array_id)){
        echo '<script> alert("Item Already Added") </script>';
        echo '<script> window.location="index.php" </script>';
      }else{

          $count = count($_SESSION["shopping_cart"]);
        
          $item_array = array(
              'item_id'       => intval($_GET["id"]),
              'item_name'       =>  $_POST["hidden_name"],
              'item_price'       =>  floatval($_POST["hidden_price"]),
              'item_quantity'       =>  intval($_POST["quantity"]),
          );
          $_SESSION["shopping_cart"][$count] = $item_array;
      }
  }else{
      $item_array = array(
          'item_id'       =>  intval($_GET["id"]),
          'item_name'       =>  $_POST["hidden_name"],
          'item_price'       =>  floatval($_POST["hidden_price"]),
          'item_quantity'      =>  intval($_POST["quantity"]),
      );
      $_SESSION["shopping_cart"][0] = $item_array;
  }
}
  

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <?php require 'partials/head.php' ?>
  <title>Promedik Textil</title>
</head>

<body>
  <!-- HEADER -->
  <?php require 'partials/header.php' ?>


  <!-- MAIN -->
  <main class='main__container mt-2'>

    <section class="container__carousel">
      <div id="carousel">
        <img name="slider" width="500" height="250">
      </div>
    </section>


    <div class="input__group">
      <input type="search" 
      id="searchbox" 
      class="form__search" 
      style="width:60%;" 
      placeholder="Buscar">
  
      <div class="input-group-append">
        <button class="btn__search"
          onclick="seach_product()"
        >
          <i class="fa fa-search"></i>
        </button>
      </div>
    </div>


    
    <div class="container_title">
      <h1> Productos </h1>
    </div>
    <div id="products"></div>
    <section class="container__cards">
      <?php
        $records = $conn->prepare('SELECT * FROM product ORDER BY id ASC');
        $records->execute();
        $results = $records->fetchAll(PDO::FETCH_ASSOC);

        if($results > 0){
          foreach($results as $result){
            echo "
            <div class='card'>
              
              <img class='product__img' src={$result['image']}  width=200 height=100/>
              <div class='inline_flex'>
                <p> {$result['name']} </p>
              </div>
              <div class='inline_flex'>
                <p> $ {$result['price']} </p>
              </div>

              <form class='cart__form' method='POST' action='index.php?action=add&id={$result['id']}'>
                <input class='cart__cuantity' type='number' name='quantity' class='form-control' value='1'/>
                <input type='hidden' name='hidden_name' value={$result['name']} />
                <input type='hidden' name='hidden_price' value={$result['price']} />
                <input class='cart__btn_add' type='submit' name='add_to_cart' class='' value='Añadir'/>
              </form>
              <span class='is-hidden'>secret</span> 
            </div>
            ";
          }
        }
      ?>
    </section>
  </main>
  <br>
  <br>

  <!-- FOOTER -->
  <!--   <script type="text/javascript" src="static/js/app.js"></script> -->
  <?php require 'partials/footer.php' ?>
</body>
</html>
