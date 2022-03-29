<?php
  session_start();

  session_unset();

  session_destroy();

  header('Location: /prod_limpieza/index.php');
?>
