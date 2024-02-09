<?php
session_start();
if (!isset($_SESSION['id'])) {
  header('location: index.php');
}

if (!isset($_SESSION['sellerID'])) {
  header('location: products.php');
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
  <link rel="stylesheet" href="../assets/css/stars.css">
  <title>Seller Shop</title>
</head>

<body class="bg-gray-100" id="cs">
  <nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto relative">
      <div class="flex items-center">
        <img src="../assets/img/FloraFusion.jpg" class="h-8 mr-3" alt="Plant Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FloraFusion Market</span>
      </div>
      <div class="flex items-center md:order-2">
        <ul class="flex space-x-4" style="margin: 0;padding: 0;list-style: none;display: flex;">
          <li>
            <a href="wishlist.php" class="text-gray">
              <i class="fas fa-heart"></i>
              <span class="text-sm text-gray-600 font-normal" v-if="wishlistLength > 0">{{wishlistLength}}</span>
            </a>
          </li>
          <li>
            <a href="mycart.php" class="text-gray ">
              <i class="fas fa-shopping-cart"></i>
              <span class="text-sm text-gray-600 font-normal" v-if="allcarts > 0">{{allcarts}}</span>
            </a>
          </li>
          <!-- Profile Dropdown Trigger -->
          <li style="margin-right: 15px;">
            <button id="profile-menu-button"><img src="<?php echo isset($_SESSION['image']) ? '../assets/img/' . $_SESSION['image'] : ''; ?>" alt="default" style="height:35px;width:35px;border-radius: 40px;"></i></button>
          </li>
        </ul>
      </div>
      <!-- Profile Dropdown -->
      <ul id="profile-menu"
          class="absolute mt-3 top-10 right-0 hidden bg-white text-gray-800 shadow-md rounded-lg w-48 space-y-2 py-2">
          <li><a href="tracker.php"><i class="mr-2 text-blue-500 fas fa-map-marker-alt ml-5"></i>Order Tracker</a></li>
          <li><a href="his_purchase.php"><i class="mr-2 text-green-500 fas fa-shopping-cart ml-5"></i>Purchase
              History</a></li>
          <li><a href="become_seller.php"><i class="mr-2 text-purple-500 fas fa-store ml-5"></i>Become a Seller</a></li>
          <li><a href="upd_profile.php"><i class="mr-2 text-purple-500 fas fa-user-edit ml-5"></i>Update Profile</a>
          </li>
          <li><a href="help_center.php"><i class="mr-2 text-purple-500 fas fa-question-circle ml-5"></i>Help Center</a></li>

          <li><a href="../includes/logout.php"><i class="mr-2 text-gray-500 fas fa-sign-out-alt ml-5"></i>Logout</a>
          </li>
        </ul>
      <!-- End Profile Dropdown -->
      <div class="items-center justify-between hidden md:flex md:w-auto md:order-1" id="mobile-menu-2">
        <ul class="flex flex-col font-medium md:p-0  md:flex-row md:space-x-8 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700" style="margin: 0;padding: 0;list-style: none;display: flex;">
          <li style="margin-right: 15px;">
            <a href="index.php" class="block py-2 pl-3 pr-4 text-gray-900 font-bold transition duration-300 ease-in-out transform hover:bg-gray-100 hover:text-gray-600 rounded md:hover:bg-transparent md:p-0 dark:text-white md:dark:hover:text-gray-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" style="text-decoration: none;color: #333;font-weight: bold;transition: color 0.3s ease;">Home</a>
          </li>
          <li style="margin-right: 15px;">
            <a href="products.php" class="block py-2 pl-3 pr-4 text-gray-900 font-bold transition duration-300 ease-in-out transform hover:bg-gray-100 hover:text-gray-600 rounded md:hover:bg-transparent md:p-0 dark:text-white md:dark:hover:text-gray-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" style="text-decoration: none;color: #333;font-weight: bold;transition: color 0.3s ease;">Plants</a>
          </li>
        </ul>
      </div>

    </div>
  </nav>

  <div class="flex mt-16 justify-center bg-gray-200" v-for="s in seller">
    <div class="flex mt-5 mb-5">
      <div class="w-5/6 p-4 border rounded relative" style="background-image: url('../assets/img/FloraFusion.jpg');">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('../assets/img/FloraFusion.jpg'); filter: blur(3px);"></div>
        <div class="flex items-center justify-center relative z-10 mb-4">
          <img :src="'../assets/img/' + s.image" alt="Seller Picture" class="w-12 h-12 rounded-full mr-4">
          <h2 class="text-lg font-semibold text-black">{{ s.shop_name !== '0' ? s.shop_name : 'Unknown Seller' }}</h2>
        </div>
      </div>
      <div class="w-full p-5">
  <div class="mb-4">
    <h3 class="text-lg font-semibold mb-2">Total Plants: <span class="font-bold">{{ s.productCount }}</span></h3>
    <p class="text-gray-500 mb-2">
      <i class="fas fa-inbox mr-2"></i>{{ s.email }}
    </p>
    
    <div class="mb-2 flex items-center">
  </span>
 <div class="rating">
   <input type="radio" v-model="rating" name="rating" value="5" id="5"><label for="5">☆</label>
    <input type="radio" v-model="rating"  name="rating" value="4" id="4"><label for="4">☆</label> 
    <input type="radio" v-model="rating"  name="rating" value="3" id="3"><label for="3">☆</label>
    <input type="radio"  v-model="rating"  name="rating" value="2" id="2"><label for="2">☆</label>
    <input type="radio" v-model="rating"  name="rating" value="1" id="1"><label for="1">☆</label>
</div>
<span v-if="rating >0 ">{{rating}}</span>
<span class="text-blue-500 hover:text-blue-700 cursor-pointer" @click="startVote(s.id)">Rating</span>
</div>
    
    <!-- Chat Section -->
    <div @click="startChat(s.id)" class="flex items-center">
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
        <ul class="flex flex-col font-medium md:p-0  md:flex-row md:space-x-8 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700" style="margin: 0;padding: 0;list-style: none;display: flex;">
          <li style="margin-right: 15px;">
            <a href="seller_shop.php" class="block py-2 pl-3 pr-4 text-gray-900 font-bold transition duration-300 ease-in-out transform hover:bg-gray-100 hover:text-gray-600 rounded md:hover:bg-transparent md:p-0 dark:text-white md:dark:hover:text-gray-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" style="text-decoration: none;color: #333;font-weight: bold;transition: color 0.3s ease;">Plants</a>
          </li>
          <li style="margin-right: 15px;">
            <a href="seller_profile.php" class="block py-2 pl-3 pr-4 text-gray-900 font-bold transition duration-300 ease-in-out transform hover:bg-gray-100 hover:text-gray-600 rounded md:hover:bg-transparent md:p-0 dark:text-white md:dark:hover:text-gray-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" style="text-decoration: none;color: #333;font-weight: bold;transition: color 0.3s ease;">Profile</a>
          </li>
        </ul>
      </div>

    </div>
  </div>
  </div>


  <!-- Seller Profile Section -->
  <div class="flex mt-5 justify-center mb-20" v-for="sn in seller">
    <div class="md:w-1/3 px-4">
      <div class="bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700 rounded-lg p-4">
        <!-- Seller Name -->
        <div class="mb-4">
          <h3 class="text-xl font-bold text-gray-900 dark:text-white">Seller Name:</h3>
          <p class="text-gray-700 dark:text-gray-300">{{sn.name}}</p>
        </div>
      </div>
    </div>
    <div class="md:w-1/3 px-4">
      <div class="bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700 rounded-lg p-4">
        <!-- Shop Location -->
        <div class="mb-4">
          <h2 class="text-xl font-bold text-gray-900 dark:text-white">Location:</h2>
          <p class="flex items-center text-gray-700 dark:text-gray-300">
            <i class="fas fa-map-marker-alt mr-2"></i> {{sn.permanent_add}}
          </p>
        </div>
      </div>
    </div>
  </div>

<!-- Floating chat icon -->
<div id="chat-icon" class="shadow-lg">
    <a href="../chat/chat.php">
        <i class="fas fa-comment-dots fa-3x"></i>
    </a>
</div>


  <script src="../assets/services/axios.js"></script>
  <script src="../assets/services/vue.3.js"></script>
  <script src="../assets/sellerService/cusSeller.js"></script>
  <script src="../assets/css/sweetalert.js"></script>
  <script src="../assets/drop_down.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</body>

</html>