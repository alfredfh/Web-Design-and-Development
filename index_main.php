<?php
  include 'connection.php';
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

  <title> flower shop</title>
</head>

<body>
<body>
  <header class="header">
    <div class="flex">
      <a href="admin.php" class="logo">Flora<span> Express</span> <span>Shop</span> </a>
      <nav class="navbar">
        <a></a>
        <a></a>
        <a></a>
        <a></a>
        <a></a>
        <a></a>
        <a></a>
        <a></a>
        <a></a>
        <a></a>
        <a></a>
        <a></a>
        <a></a>
        <a></a>
        <a></a>
        <a></a>
        <a href="login.php" >Login</a>
        <a href="registration.php">Register</a>
      </nav>
      <div class="icons">
     
        
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
  
    <div class="slider-section">
      <div class="slide-show-container">
        <div class="wrapper-one">
          <div class="wrapper-text">inspired by nature</div>

        </div>
        <div class="wrapper-two">
          <div class="wrapper-text">fresh flower for you</div>

        </div>
        <div class="wrapper-three">
          <div class="wrapper-text">inspired by nature</div>

        </div>

      </div>
    </div>

    
    <div class="row">
      <div class="card">
        <div class="detail">
          <span>30% OFF TODAY</span>
          <h1> simple & elegant</h1>
          <a href="shop.php">shop now</a>
        </div>
      </div>
      <div class="card">
        <div class="detail">
          <span>35% OFF TODAY</span>
          <h1> simple & elegant</h1>
          <a href="shop.php">shop now</a>
        </div>
      </div>
      <div class="card">
        <div class="detail">
          <span>40% OFF TODAY</span>
          <h1> simple & elegant</h1>
          <a href="shop.php">shop now</a>
        </div>
      </div>

    </div>
    <div class="categories">
      <h1 class="title">TOP CATEGORIES</h1>
      <div class="box-container">
        <div class="box">
          <img src="images/flower-bouquet7.jpg">
          <span>birthday</span>
        </div>
        <div class="box">
          <img src="images/flower-bouquet4.jpg">
          <span>next day</span>
        </div>
        <div class="box">
          <img src="images/flower-bouquet8.jpg">
          <span>plant</span>
        </div>
        <div class="box">
          <img src="images/flower-bouquet5.jpg">
          <span>wedding</span>
        </div>
        <div class="box">
          <img src="images/flower-bouquet6.jpg">
          <span>sympathy</span>
        </div>
        
      </div>
    </div>
    <div class="banner3">
        <div class="detail">
          <span>BETTER THAN CAKE</span>
          <h1>BIRTHDAY BOUQUET</h1>
          <p>Believe in birthday magic? (you will.) Celebrate with party-ready blooms</p>
          <a href="shop.php">explore <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
    <div class="shop">
      <h1 class="title">shop best sellers</h1>
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
    <div class="box-container">
      <?php
          $select_products = mysqli_query($conn, "SELECT * FROM products") or die ('query failed');
          if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
          
      
      ?>
      <form action="" method="post" class="box">
        <img src="images/<?php echo $fetch_products['image']; ?>">
        <div class="price">$ <?php echo $fetch_products['price'];  ?> -/ </div>
        <div class="name"><?php echo $fetch_products['name'];  ?> </div>
        <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
        <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
        <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
        <input type="hidden" name="product_quantity" value="1" min ="0">
        <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
       

      </form>

      <?php 
            }
          }else{
            echo '<p class="empty">no products added yet!</p>';
          }
            
      ?>
    </div>
    
    </div>
    <?php include 'footer.php'; ?>
    <script type="text/javascript" src="script2.js"></script>
</body>
</html>