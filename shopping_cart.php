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

if(isset($_POST["add_to_cart"])){
    if(isset($_SESSION["shopping_cart"])){
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_GET["id"], $item_array_id)){
            $count = $count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'       =>  $_GET["id"],
                'item_name'       =>  $_GET["hidden_name"],
                'item_price'       =>  $_GET["hidden_price"],
                'item_quantity'       =>  $_GET["quantity"],
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        }else{
            echo '<script> alert("Item Already Added") </script>';
            echo '<script> window.location="index.php" </script>';
        }
    }else{
        $item_array = array(
            'item_id'       =>  $_GET["id"],
            'item_name'       =>  $_GET["hidden_name"],
            'item_price'       =>  $_GET["hidden_price"],
            'item_quantity'       =>  $_GET["quantity"],
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

?>

<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
      <?php
        $query = "SELECT * FROM shopping_cart ORDER BY id ASC";
        $result = mysqli_query($connect, query);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
      ?>
      <div class="">
          <form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">
            <div style="border:1px solid #333; background-color: #f1f1f1; border-radius: 5px; padding: 16px;" align="center">
                <img src="<?php echo $row["image"]; ?>" class="img-resposive" /><br/>
                <h4 class="text-info"><?php echo $row["name"]; ?></h4>
                <h4 class="text-danger">$<?php echo $row["price"]; ?></h4>
                <input type="text" name="quantity" value="1"/>
                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>"/>
                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>"/>
                <input type="submit" name="add_to_cart" value="add_to_cart" />
            </div>
          </form>
      </div>
      <?php
            }
        }
        ?>
      
      
  </body>
</html>
