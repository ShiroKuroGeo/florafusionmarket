<?php
session_start();
if (isset($_SESSION['id'])) {
  header('location:index.php');
  $role = $_SESSION['role'];
  if ($role == 1) {
    header('location: /florafusionmarket/Customer/index.php');
  } else if ($role == 2) {
    header('location: /florafusionmarket/Seller/index.php');
  } else if ($role = 0) {
    header('location: /florafusionmarket/Admin/index.php');
  } else {
    echo "You Need To logged in!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../FloraFusionMarket/assets/css/tailwind.css">
  <link rel="stylesheet" href="./assets/css/sweetalert.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/modal.css">
  <link rel="stylesheet" href="assets/css/carousel.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <title>Home</title>
</head>

<body>
  <nav class="bg-white border-gray-200 dark:bg-gray-900 ">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto">
      <a href="./index.php" class="flex items-center">
        <img src="assets/img/FloraFusion.jpg" class="h-8 mr-3" alt="Plant Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FloraFusion Market</span>
      </a>
      <?php include 'loginregisterModal.php' ?>
    </div>
  </nav>


  <!-- section 1 -->
  <section id="section1" class="bg-green-600 py-8 bg-cover bg-center h-screen flex items-center justify-center">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-10">
      <div class="mt-10 ml-6">
        <h2 class="text-4xl font-bold text-center text-white mt-10">FloraFusion Market</h2>
        <p class="text-white text-center mt-10 ml-6 mr-6">
          Welcome to our plant online marketplace, where nature's wonders are just a click away.
          Embark on a botanical adventure, transform your living spaces into tranquil havens,
          and revel in the beauty and serenity that plants effortlessly bestow. Let the
          enchantment begin!
        </p>
        <div class="flex justify-center mt-10">
          <button class="text-white bg-green-800 hover:bg-green-900 focus:ring-4 mb-10 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover-bg-blue-700 dark:focus:ring-blue-800">
            <i class="fas fa-shopping-cart w-5 h-5 mr-2 -ml-1"></i>
            <a id="OpenButton" href="#" onclick="toggleModal('pleaseLoginModal', 'loginModal')">Shop now</a>
          </button>
        </div>
      </div>
      
      <div class="slideshow-container" style="width:70%">

        <div class="mySlides fade">
          <div class="numbertext">1 / 11</div>
          <img src="../FloraFusionMarket/assets/img/Cactus.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
          <div class="numbertext">2 / 11</div>
          <img src="../FloraFusionMarket/assets/img/Chrysanthemum.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
          <div class="numbertext">3 / 11</div>
          <img src="../FloraFusionMarket/assets/img/Dracaena1.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
          <div class="numbertext">4 / 11</div>
          <img src="../FloraFusionMarket/assets/img/Jasmine1.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
          <div class="numbertext">5 / 11</div>
          <img src="../FloraFusionMarket/assets/img/Lavender1.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
          <div class="numbertext">6 / 11</div>
          <img src="../FloraFusionMarket/assets/img/Orchids2.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
          <div class="numbertext">7 / 11</div>
          <img src="../FloraFusionMarket/assets/img/Philodendron1.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
          <div class="numbertext">8 / 11</div>
          <img src="../FloraFusionMarket/assets/img/Rosemary2.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
          <div class="numbertext">9 / 11</div>
          <img src="../FloraFusionMarket/assets/img/Spider Plant1.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
          <div class="numbertext">10 / 11</div>
          <img src="../FloraFusionMarket/assets/img/Sun Flower.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
          <div class="numbertext">11 / 11</div>
          <img src="../FloraFusionMarket/assets/img/Venus Flytrap1.jpg" style="width:100%">
        </div>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>

      </div>
      <br>

      <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span>
        <span class="dot" onclick="currentSlide(5)"></span>
        <span class="dot" onclick="currentSlide(6)"></span>
        <span class="dot" onclick="currentSlide(7)"></span>
        <span class="dot" onclick="currentSlide(8)"></span>
        <span class="dot" onclick="currentSlide(9)"></span>
        <span class="dot" onclick="currentSlide(10)"></span>
        <span class="dot" onclick="currentSlide(11)"></span>
      </div>
    </div>
  </section>

 

  <script src="assets/css/bootstrap.js"></script>
  <script src="./assets/css/sweetalert.js"></script>
  <script src="assets/carousel.js"></script>
  <script src="assets/services/axios.js"></script>
  <script src="assets/services/indexproduct.js"></script>
  <script src="assets/loginModal.js"></script>

</body>

</html>