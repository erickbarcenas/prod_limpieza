<nav class="">
    <div id="burger-menu">
      <span></span>
    </div>
    <div id="menu">
        <ul>
          <li><a href="index.html">Inicio</a></li>
          <li><a href="#">Productos</a></li>
          <li><a href="nosotros.html">Nosotros</a></li>
          <li><a onclick="go_to_anchor('contact')">Contacto</a></li>

          <?php if(!empty($user)): ?>
            <br> Welcome. <?= $user['email']; ?>
            <br>You are Successfully Logged In
            <a href="logout.php">
              Logout
            </a>
          
          <?php else: ?>
            <li> <a href="login.php">Iniciar sesión</a> </li>
            <li> <a href="signup.php">Registrarse</a> </li>
          <?php endif; ?>
        </ul>
    </div>

    <a href="index.php" class="logo">Promedik Textil</a>

    <div class="shopping_cart">
      
    </div>
</nav>