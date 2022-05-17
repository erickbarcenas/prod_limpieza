<nav class="">
    <div id="burger-menu">
      <span></span>
    </div>
    <div id="menu">
        <ul>
          <li><a href="index.php">Inicio</a></li>
          <li><a onclick="go_to_anchor('products')">Productos</a></li>
          <li><a onclick="go_to_anchor('about')">Nosotros</a></li>
          <li>
            <a target="_blank" href="https://api.whatsapp.com/send/?phone=+5212284806275&text=Hola Promedik me interesaría conocer más de ustedes">
            Contacto
            </a>
          </li>

          

          <?php if(!empty($user)): ?>
            <li> ¡Hola.<?= $user['name']; ?>. Nos alegra verte! </li>
    
            <li> <a href="logout.php">Cerrar sesión </a> </li>
          
          <?php else: ?>
            <li> <a href="login.php">Iniciar sesión</a> </li>
            <li> <a href="signup.php">Registrarse</a> </li>                                                                                                            
          <?php endif; ?>
     </div>

    <a href="index.php" class="logo">Promedik Textil</a>

      <div class="shopping_cart">
      <?php if(!empty($user)): ?>
        
      <?php endif; ?>
      <!-- <a href="shopping_cart.php"></a> -->
      <a onclick="go_to_anchor('cart')" class="cursor_pointer">
        <img src="./static/imgs/resources/shopping_cart.png" alt="shopping_cart">
      </a>
    </div>
</nav>