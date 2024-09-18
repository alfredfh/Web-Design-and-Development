<?php
  include 'connection.php';
  session_start();

  $user_id = $_SESSION['user_id'];
  if(!isset($user_id)){
      header('location:login.php');
  }
  if(isset($_POST['logout'])){
    session_destroy();
    header('location:index_main.php');
  }
  /*--------------------order placed-----------*/
 if(isset($_POST['order_btn'])){
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $number = mysqli_real_escape_string($conn, $_POST['number']);
  $method = mysqli_real_escape_string($conn, $_POST['method']);
  $address = mysqli_real_escape_string($conn, 'flat no.' .$_POST['flat'].','.$_POST['street'].','.$_POST['city'].','
  .$_POST['county'].','.$_POST['postcode']);

  $placed_on = date('D-M-Y');

  $cart_total= 0;
  $cart_products[] = '';
  $cart_query = mysqli_query($conn, "SELECT * FROM cart WHERE user_id='$user_id'")or die ('query failed');

  if(mysqli_num_rows($cart_query) > 0){
    while($cart_item = mysqli_fetch_assoc($cart_query)){
      $cart_products[] = $cart_item ['name'].'('.$cart_item['quantity'].')';
      $sub_total = ($cart_item['price'] * $cart_item['quantity']);
      $cart_total += $sub_total;
    }
  }
  $total_products = implode(', ', $cart_products);
  mysqli_query($conn, "INSERT INTO  orders (user_id, name, number, email, 
  method, address, total_products, total_price, placed_on) 
  VALUES ('".$user_id."','".$name."','".$number."','".$email."','".$method."',
  '".$address."','".$total_products."','".$cart_total."','".$placed_on."')");
  mysqli_query($conn, "DELETE FROM cart WHERE user_id = '$user_id'") or die ('query failed');
  $message [] = 'order placed successfully';
  header('location:checkout.php');
 }
 


?>
<style type="text/css">
  <?php include 'main.css'; ?>
</style>

 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <title>checkout</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="banner">
      <h1>Checkout</h1>
      

    </div>

    <div class="checkout-form">
      <h1 class="title">payment process</h1>
      <?php
        if (isset($message)){
          foreach ($message as $message){
            echo '
            <div class="message">
                <span>'.$message.'</span>
                <i class="bi bi-x-circle" onclick="this.parentElement.remove()"></i>
            </div>
            ';
          }
        }
      ?>
      <div class="display-order">
        <?php 
          $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id'") or die('query failed');
          $total =0;
          $grand_total=0;
          if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart=mysqli_fetch_assoc($select_cart)){
              $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
              $grand_total = $total +=$total_price;
           
        ?>
        <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
        <?php

               }
            }

        ?>
        <span class="grand-total">Total Amount Payable : £ <?php echo $grand_total; ?></span>
      </div>
      <form method="post">
      <div class="input-field">
            <label>Your Name</label>
            <input type="text" name="name" placeholder="Enter Your Name">
          </div>
          <div class="input-field">
            <label>Your Number</label>
            <input type="text" name="number" placeholder="Enter Your Number">
          </div>
          <div class="input-field">
            <label>Your Email</label>
            <input type="text" name="email" placeholder="Enter Your Email">
          </div>
          <div class="input-field">
            <label>Select Payment Method</label>
            <select name="method">
                <option selected disabled>Select Payment Method</option>
                <option class="cash on delivery">cash on delivery</option>
                <option class="credit card">credit card</option>
                <option class="paypal">paypal</option>
                <option class="paytm">paytm</option>
            </select>
          </div>
          <div class="input-field">
            <label>Address Line 1:</label>
            <input type="text" name="flat" placeholder="e.g. flat no.">
          </div>
          <div class="input-field">
            <label>Address Line 2:</label>
            <input type="text" name="street" placeholder="e.g. street name">
          </div>
          <div class="input-field">
            <label>Address Line 3:</label>
            <input type="text" name="city" placeholder="e.g. city name">
          </div>
          <div class="input-field">
            <label>Address Line 4:</label>
            <input type="text" name="county" placeholder="e.g. county name">
          </div>
          <div class="input-field">
            <label>Postcode</label>
            <input type="number" name="postcode" placeholder="e.g. postcode number">
          </div>
          <input type="submit" name="order-btn" class="btn" value="order now">    
      </form>


    </div>
        
    
    <?php include 'footer.php'; ?>
    <script type="text/javascript" src="script2.js"></script>
</body>
</html>