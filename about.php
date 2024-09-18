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

  <title>about us</title>
  <script type="text/javascript" src="script2.js"></script>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="banner">
      <h1>about us</h1>
    

    </div>
    <div class="about">
      <div class="row">
        <div class="detail">
          <h1>visit out beautiful showroom</h1>
          <p>
             The flower shop showroom is a beautifully decorated space that exudes a sense of charm and elegance. The room is adorned with an array of colorful flowers and foliage, creating a lush and inviting atmosphere. The walls are painted in soft pastel shades that complement the natural beauty of the flowers.
             As you enter the showroom, you are greeted by a delightful aroma of fresh blooms. The space is arranged in an organized and thoughtful manner, with each type of flower displayed in its own section. The arrangement of the blooms and foliage is done in such a way that it feels like an art display.
             The showroom features a wide variety of flowers, including roses, lilies, carnations, daisies, orchids, and many more. The flowers are arranged in vases, baskets, and bouquets, all of which are available for purchase. The space is well-lit, allowing the colors and details of each flower to be appreciated.
           </p>
          <a href="shop.php" class="btn2">shop now</a>
          
        </div>
      </div>
    </div>
    <div class="banner-2">
      <h1>Let Us Make Your Wedding Flowerful</h1>
      <a href="shop.php" class="btn2">shop now</a>
    </div>
    <div class="services">
      <h1 class="title">our services</h1>
        <div class="box-container">
          <div class="box">
            <i class="bi bi-percent"></i>
            <h3>30% OFF + FREE SHIPPING</h3>
            <p>Register for 36£/mo. Get 120£ credit on regular orders</p>
          </div>
          <div class="box">
            <i class="bi bi-asterisk"></i>
            <h3>FRESH BLOOMS</h3>
            <p>Exclusive offers of freshly delivered flowers - daily!</p>
          </div>
          <div class="box">
            <i class="bi bi-alarm"></i>
            <h3>SUPER FLEXIBLE</h3>
            <p>Customise orders to tailor your needs. Skip and cancel anytime.</p>
          </div>
        </div>

    </div>
    <div class="stylist">
      <h1 class="title">Floral Stylist</h1>
      <p>Meet the Team That Make Everything Happen</p>
      <div class="box-container">
        <div class="box">
          <div class="img-box">
            <img src="images/hazel.webp">
            <div class="social-links">
              <i class="bi bi-instagram"></i>
              <i class="bi bi-youtube"></i>
              <i class="bi bi-twitter"></i>
              <i class="bi bi-whatsapp"></i>
            </div>
          </div>
          <h3>Hazel Black</h3>
          <p>Developer</p>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/hazel2.webp">
            <div class="social-links">
              <i class="bi bi-instagram"></i>
              <i class="bi bi-youtube"></i>
              <i class="bi bi-twitter"></i>
              <i class="bi bi-whatsapp"></i>
            </div>
          </div>
          <h3>Hazel Green</h3>
          <p>Florist</p>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/ben.jpg">
            <div class="social-links">
              <i class="bi bi-instagram"></i>
              <i class="bi bi-youtube"></i>
              <i class="bi bi-twitter"></i>
              <i class="bi bi-whatsapp"></i>
            </div>
          </div>
          <h3>Ben Green</h3>
          <p>Florist</p>
        </div>
      </div>
    </div>
    <div class="testimonial-container">
        <h1 class="title">what people say</h1>
        <div class="container">
          <div class="testimonial-item active">
            <img src="images/human.jpg">
            <h3>hazel green</h3>
            <p>
            Speraverimusque audaxque lucabamus, dardanidae, carpentem. Ingratique infertur, 
            inueneresque, flecterim ob ad levaverunt. Duodenosque conuertemus hortareris 
            umentes imperavereque. Optaremus uoluerat permittimus. Insidentisque prospexerunt. 
            Iamdudum renuntiavique clam a et inextricabilis. Inous pateretur. 
            </p>
          </div>
          <div class="testimonial-item">
            <img src="images/human2.jpg">
            <h3>ben green</h3>
            <p>
            Speraverimusque audaxque lucabamus, dardanidae, carpentem. Ingratique infertur, 
            inueneresque, flecterim ob ad levaverunt. Duodenosque conuertemus hortareris 
            umentes imperavereque. Optaremus uoluerat permittimus. Insidentisque prospexerunt. 
            Iamdudum renuntiavique clam a et inextricabilis. Inous pateretur. 
            </p>
          </div>
          <div class="testimonial-item">
            <img src="images/human3.jpg">
            <h3>hazel smith</h3>
            <p>
            Speraverimusque audaxque lucabamus, dardanidae, carpentem. Ingratique infertur, 
            inueneresque, flecterim ob ad levaverunt. Duodenosque conuertemus hortareris 
            umentes imperavereque. Optaremus uoluerat permittimus. Insidentisque prospexerunt. 
            Iamdudum renuntiavique clam a et inextricabilis. Inous pateretur. 
            </p>
          </div>
          <div class="left-arrow"><i class="bi bi-arrow-left" onclick="prevSlide()"></i></div>
          <div class="right-arrow"><i class="bi bi-arrow-right" onclick="nextSlide()"></i></div>
        
        </div>
    </div>

    <script>
        let slides = document.querySelectorAll('.testimonial-item');
        let index = 0;

        function nextSlide() {
          slides[index].classList.remove('active');
          index = (index + 1) % slides.length;
          slides[index].classList.add('active');
        }

        function prevSlide() {
          slides[index].classList.remove('active');
          index = (index - 1 + slides.length) % slides.length;
          slides[index].classList.add('active');
        }
    </script>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
    
   
    <?php include 'footer.php'; ?>
    
</body>

<script type="text/javascript" src="script2.js"></script>
</html>