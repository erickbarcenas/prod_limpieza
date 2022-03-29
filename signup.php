<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Successfully created new user';
      header('Location: /prod_limpieza/index.php');
    } else {
      $message = 'Sorry there must have been an issue creating your account';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro</title>
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
  </head>
  <body>

    <?php require 'partials/header_auth.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

   
    

    <form action="signup.php" method="POST" class="auth__form">
      <input name="email" type="text" placeholder="Correo">
      <input name="password" type="password" placeholder="Contraseña">
      <input name="confirm_password" type="password" placeholder="Confirma contraseña">
      <input type="submit" value="Enviar">
    </form>
    <script type="text/javascript" src="static/js/hamburguer.js"></script>
  </body>
</html>
