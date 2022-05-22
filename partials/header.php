<?php
  session_start();

  require 'database.php';

  // HEADER
  // if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, name, email FROM customer WHERE id = :id');
    $user_id = 5;
    $records->bindParam(':id', $user_id);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

  
    if (count($results) > 0) {
      $user = $results;
    }else{
      $user = null;
    }

?>



<nav class="">
    <div id="burger-menu">
      <span></span>
    </div>
    <div id="menu">
        <ul>
          <!-- <?php if(!empty($user)): ?>
            <li class="menu_hambuerguer_text"> ¡Hola.<?= $user['name']; ?>. Nos alegra verte! </li>
    
             <li> <a href="logout.php">Cerrar sesión </a> </li> 
          
          <?php else: ?>
             <li> <a href="login.php">Iniciar sesión</a> </li>
             <li> <a href="signup.php">Registrarse</a> </li>                                                                                                     
          <?php endif; ?>  -->      

          <li><a href="index.php"> ¡Hola.<?= $user['name']; ?>. Nos alegra verte! </a></li>
          <li><a onclick="go_to_anchor('products')">Productos</a></li>
          <li><a href="nosotros.php">Nosotros</a></li>
          <li>
            <a target="_blank" href="https://api.whatsapp.com/send/?phone=+5212284806275&text=Hola Promedik me interesaría conocer más de ustedes">
            Contacto
            </a>
          </li>

          
          
          
     </div>

    <a href="index.php" class="logo">Promedik Textil</a>

      <div class="shopping_cart">
      <strong> ¡Hola <?= $user['name']; ?>! </strong>
      <!-- <a ></a> -->
      <!--  onclick="go_to_anchor('cart')" -->
      <a href="shopping_cart.php" class="ml1 cursor_pointer">
        <img src="./static/imgs/resources/shopping_cart.png" alt="shopping_cart">
      </a>
    </div>
</nav>