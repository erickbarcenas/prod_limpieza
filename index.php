<?php
  session_start();

  require 'database.php';

  // HEADER
  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT users.id, users.name, users.email, users.password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }

  // FORM


if(isset($_POST["add_to_cart"])){

  if(isset($_SESSION["shopping_cart"])){
      $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");

      var_dump($_SESSION["shopping_cart"]);

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
          $_SESSION["shopping_cart"][ $count] = $item_array;
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
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
  <link
    href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@500;600;700;900&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="static/css/style.css">
  <link rel="stylesheet" href="static/css/medias.css">
  <title>Promedik Textil</title>

</head>
<body>
  <!-- HEADER -->
  <!--<header class="hero">
    <nav class="border__bottom">
      <a href="index.html" class="logo">Promedik Textil</a>
      <form class="search">
          <div class="input__group">
              <input type="text" class="form__search" style="width:60%;" placeholder="Search">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </div>
          </div>
      </form> 
      <ul class="nav_ul">
        <li><a href="nosotros.html">Nosotros</a></li>
      </ul>
    </nav>
  </header>-->

  <?php require 'partials/header.php' ?>


  <!---->

  

  <!---->

  <!-- MAIN -->
  <main class='main__container mt-2'>
    
    

    <section class="container__carousel">
      <div id="carousel">
        <img name="slider" width="500" height="250">
      </div>
    </section>

<!--
    <section class="list_horizontal_container">
      <ul class="render__items">
        <li class="chip">
          Todo
        </li>
        <li class="chip">
          Cubrebocas
        </li>
        <li class="chip">
          Batas
        </li>
      </ul>
    </section>
-->

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


    <h1> Productos </h1>
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

    <h1> Carrito </h1>
    <div id="cart"></div>
    <section class="container__cart">
        <div class="">

        </div>

    </section>

  </main>

  <br>
  <br>

  <!-- FOOTER -->
  <!-- <div data-sal="fade" class="sticky-cta sal-animate" data-sal-delay="1000" id="modal__index">
    <div class="cta-container">
        <div class="cta">
        <button class="btn__transparent btn__text_gray" onclick="show_products()" >
          Ver productos
        </button>
        </div>
        <div class="cta whatsapp-color">
          <a rel="noopener noreferrer" target="_blank" href="https://api.whatsapp.com/send?phone=5212221495577&amp;text=¡Hola equipo Promedik! Quiero saber más sobre sus productos">
            Chatea con nosotros</a>
          </div>
    </div>
  </div> -->

  <footer>
    <div class='social__icons'>
        <a href="">
          <i class="fab fa-facebook-f icon"></i>
        </a>
        <a href="">
          <i class="fab fa-twitter icon"></i>
        </a>
        <a href="">
          <i class="fab fa-instagram icon"></i>
        </a>
    </div>

    

    <div class="policies">
        <a href="/politica_de_privacidad.html">Política de privacidad</a>
        <a href="/condiciones_de_uso.html">Condiciones de uso</a>
    </div>
    <div class="attribution">
        © 2022 Promedik Textil
        <!--<a href="#">Your Name Here</a>. -->
    </div>

    
  </footer>
  <script type="text/javascript" src="static/js/app.js"></script>
</body>
</html>




