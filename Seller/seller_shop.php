<?php
session_start();
if(!isset($_SESSION['id'])) {
  header('location: index.php');
}
$role = $_SESSION['role'];
$role = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="../assets/css/tailwind.css">
  <link rel="stylesheet" href="../assets/css/sweetalert.css">
  <link rel="stylesheet" href="../assets/css/modal.css">
  <link rel="stylesheet" href="../assets/css/css.css">
  <link rel="stylesheet" href="../assets/css/floating.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <title>SellerShop</title>
</head>

<body class="bg-gray-100" id="sellerShop">
  <div>
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto relative">
        <div class="flex items-center">
          <img src="../assets/img/FloraFusion.jpg" class="h-8 mr-3" alt="Plant Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FloraFusion Market</span>
        </div>
        <div class="flex items-center md:order-2">
          <ul class="flex space-x-4" style="margin: 0;padding: 0;list-style: none;display: flex;">
            <li>
              <a href="seller_wishlist.php" class="text-gray">
                <i class="fas fa-heart"></i>
                <span class="text-sm text-gray-600 font-normal" v-if="wishlistLength > 0">{{wishlistLength}}</span>
              </a>
            </li>
            <li>
              <a href="seller_cart.php" class="text-gray ">
                <i class="fas fa-shopping-cart"></i>
                <span class="text-sm text-gray-600 font-normal" v-if="allcarts > 0">{{allcarts}}</span>
              </a>
            </li>
            <!-- Profile Dropdown Trigger -->
            <li style="margin-right: 15px;">
              <button id="profile-menu-button"><img
                  src="<?php echo isset($_SESSION['image']) ? '../assets/img/'.$_SESSION['image'] : ''; ?>"
                  alt="default" style="height:35px;width:35px;border-radius: 40px;"></i></button>
            </li>
          </ul>
        </div>
        <!-- Profile Dropdown -->
        <ul id="profile-menu"
          class="absolute mt-3 top-10 right-0 hidden bg-white text-gray-800 shadow-md rounded-lg w-48 space-y-2 py-2">
          <li><a href="index.php"><i class="mr-2 text-blue-500 fas fa-chart-line ml-5"></i>Seller
              Dashboard</a></li>
          <li><a href="seller_tracker.php"><i class="mr-2 text-blue-500 fas fa-map-marker-alt ml-5"></i>Order
              Tracker</a></li>
          <li><a href="seller_purchase.php"><i class="mr-2 text-green-500 fas fa-shopping-cart ml-5"></i>Purchase
              History</a></li>
          <li><a href="seller_profile.php"><i class="mr-2 text-blue-500 fas fa-user-circle ml-5"></i>Seller
              Profile</a></li>
          <li><a href="seller_up_profile.php"><i class="mr-2 text-purple-500 fas fa-user-edit ml-5"></i>Update
              Profile</a></li>
          <li><a href="seller_help_center.php"><i class="mr-2 text-purple-500 fas fa-question-circle ml-5"></i>Help Center</a></li>
          <li><a href="../includes/logout.php"><i class="mr-2 text-gray-500 fas fa-sign-out-alt ml-5"></i>Logout</a>
          </li>
        </ul>
        <!-- End Profile Dropdown -->
        <div class="items-center justify-between hidden md:flex md:w-auto md:order-1" id="mobile-menu-2">
          <ul
            class="flex flex-col font-medium md:p-0  md:flex-row md:space-x-8 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700"
            style="margin: 0;padding: 0;list-style: none;display: flex;">
            <li style="margin-right: 15px;">
              <a href="seller_index.php"
                class="block py-2 pl-3 pr-4 text-gray-900 font-bold transition duration-300 ease-in-out transform hover:bg-gray-100 hover:text-gray-600 rounded md:hover:bg-transparent md:p-0 dark:text-white md:dark:hover:text-gray-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                style="text-decoration: none;color: #333;font-weight: bold;transition: color 0.3s ease;">Home</a>
            </li>
            <li style="margin-right: 15px;">
              <a href="seller_products.php"
                class="block py-2 pl-3 pr-4 text-gray-900 font-bold transition duration-300 ease-in-out transform hover:bg-gray-100 hover:text-gray-600 rounded md:hover:bg-transparent md:p-0 dark:text-white md:dark:hover:text-gray-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                style="text-decoration: none;color: #333;font-weight: bold;transition: color 0.3s ease;">Product</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="flex mt-16 justify-center bg-gray-200" v-for="seller in sellers">
      <div class="flex mt-5 mb-5">
        <div class="w-5/6 p-4 border rounded relative" style="background-image: url('../assets/img/FloraFusion.jpg');">
          <div class="absolute inset-0 bg-cover bg-center"
            style="background-image: url('../assets/img/FloraFusion.jpg'); filter: blur(3px);"></div>
          <div class="flex items-center justify-center relative z-10 mb-4">
            <img :src="'../assets/img/' + seller.image" alt="Seller Picture" class="w-20 h-20 rounded-full mr-4">
            <h2 class="text-lg font-semibold text-black">{{ seller.shop_name !== '0' ? seller.shop_name : 'Unknown Seller' }}</h2>
          </div>
        </div>
        <div class="w-5/6 p-5">
          <div class="mb-4">
            <h3 class="text-lg font-semibold mb-2">Plants: <span class="font-bold">{{ productLength }}</span></h3>
            <p class="text-gray-500 font-bold mb-2">
              <i class="fas fa-inbox mr-2"></i>{{ seller.email }}
            </p>
            <div class="mb-2 flex items-center">
  </span>
  <span class="text-gray-500">Rating:</span>
  <span class="mr-2 ml-2 text-yellow-500">
    <!-- Display four yellow stars -->
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <!-- Display one gray star -->
    <i class="far fa-star"></i>
</div>
            <div @click="startChat(seller.id)" class="flex items-center cursor-pointer">
              <i class="fas fa-comment mr-2 text-blue-500"></i>
              <span class="text-blue-500 hover:text-blue-700 cursor-pointer">Chat with us</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Products and Profile Section -->
    <div class="flex justify-center bg-white border-gray-200 dark:bg-gray-900">
      <div class="flex mt-2 mb-2">
        <div class="items-center justify-between hidden md:flex md:w-auto md:order-1" id="mobile-menu-2">
          <ul
            class="flex flex-col font-medium md:p-0  md:flex-row md:space-x-8 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700"
            style="margin: 0;padding: 0;list-style: none;display: flex;">
            <li style="margin-right: 15px;">
              <a href="seller_shop.php"
                class="block py-2 pl-3 pr-4 text-gray-900 font-bold transition duration-300 ease-in-out transform hover:bg-gray-100 hover:text-gray-600 rounded md:hover:bg-transparent md:p-0 dark:text-white md:dark:hover:text-gray-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                style="text-decoration: none;color: #333;font-weight: bold;transition: color 0.3s ease;">Plants</a>
            </li>
            <li style="margin-right: 15px;">
              <a href="seller_profile.php"
                class="block py-2 pl-3 pr-4 text-gray-900 font-bold transition duration-300 ease-in-out transform hover:bg-gray-100 hover:text-gray-600 rounded md:hover:bg-transparent md:p-0 dark:text-white md:dark:hover:text-gray-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                style="text-decoration: none;color: #333;font-weight: bold;transition: color 0.3s ease;">Profile</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    </div>
    
    <div class="mt-5">
      <div class="p-2">
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mx-auto mt-8 p-4">
              <div class="bg-white rounded-lg shadow-md p-4" v-for="product in products" :key="product.id">
                  <img :src="'/florafusionmarket/assets/img/' + product.image" alt="Plant Product" class="mx-auto h-40 rounded-md">
                  <div class="p-3 text-center">
                    <h3 class="text-lg font-semibold mb-2">{{ product.name }}</h3>
                    <p class="text-gray-600">{{ product.des }}</p>
                    <div class="mt-2">
                      <span class="text-blue-500 font-semibold"> P{{ product.price }}</span>
                    </div>
                  </div>
                  <div class="flex justify-center mt-4 space-x-4">
                  <button class="text-gray-500 hover:text-red-500" @click="addToWishlist(product.product_ID)">
                    <i class="fas fa-heart"></i>
                  </button>
                  <button class="text-gray-500 hover:text-green-600 ml-2" @click="addToCart(product.product_ID)">
                    <i class="fas fa-cart-plus"></i>
                  </button>
                  </div>
              </div>
          </div>
      </div>
    </div>
  
  </div>

  <!-- Floating chat icon -->
  <div id="chat-icon" class="shadow-lg">
    <a href="../Chats/chat.php">
      <i class="fas fa-comment-dots fa-3x"></i>
    </a>
  </div>

<script src="../assets/services/axios.js"></script>
<script src="../assets/services/vue.3.js"></script>
<script src="../assets/sellerService/sellerShop.js"></script>
<script src="../assets/css/sweetalert.js"></script>
<script src="../assets/css/jquery.js"></script>
<script src="../assets/drop_down.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</body>

</html>