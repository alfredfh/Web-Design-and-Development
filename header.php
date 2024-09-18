

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

</head>

<body>
  <header class="header">
    <div class="flex">
      <a href="index_main.php" class="logo">Flora<span> Express</span> <span>Shop</span> </a>
      <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="shop.php">shop</a>
        <a href="order.php">orders</a>
        <a href="about.php">about us</a>
        <a href="contact.php">contact</a>
      </nav>
      <div class="icons">
      <i class="bi bi-person" id="user-btn"></i>
       <?php
          $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id'") or die('query failed');
          $cart_num_rows = mysqli_num_rows($select_cart);
        ?>
        <a href="cart.php"><i class="bi bi-cart"></i><span>(<?php echo $cart_num_rows; ?>)</span></a>
        <i class="bi bi-list" id="menu-btn"></i>
      </div>
      <div class="user-box">
          <p>username : <span><?php echo $_SESSION['user_name'];?></span></p>
          <p>email : <span><?php echo $_SESSION['user_email'];?></span></p>
          <form method="post" class="logout">
              <button name="logout" class="logout-btn">LOG OUT</button>
          </form>
      </div>

    </div>
  </header>



  

</body>
</html>