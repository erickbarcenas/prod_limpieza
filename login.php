<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /prod_limpieza/index.php');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /prod_limpieza/index.php");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
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
    

    <form action="login.php" method="POST" class="auth__form">
      <input name="email" type="text"  placeholder="Correo">
      <input name="password" type="password" placeholder="Contraseña">
      <input type="submit" value="Enviar">
    </form>
    <script type="text/javascript" src="static/js/hamburguer.js"></script>
  </body>
</html>
