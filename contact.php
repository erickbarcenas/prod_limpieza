<?php

  session_start();
  require 'database.php';

  if (
    
    !empty($_POST['name'])
    && !empty($_POST['email']) 
    && !empty($_POST['whatsapp'])
    && !empty($_POST['message'])
    
    
    ) {



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