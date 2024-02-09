<?php
session_start();
if (!isset($_SESSION['id'])) {
  header('location: index.php');
}
$role = $_SESSION['role'];
$role = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/tailwind.css">
  <link rel="stylesheet" href="../assets/css/sweetalert.css">
  <link rel="stylesheet" href="../assets/css/modal.css">
  <link rel="stylesheet" href="../assets/css/css.css">
  <link rel="stylesheet" href="../assets/css/floating.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <title>Home</title>
</head>

<body>
  <div id="Bseller">
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto relative">
        <div class="flex items-center">
          <img src="../assets/img/FloraFusion.jpg" class="h-8 mr-3" alt="Plant Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FloraFusion Market</span>
        </div>
        <div class="flex items-center md:order-2">
          <ul class="flex" style="margin: 0;padding: 0;list-style: none;display: flex;">
            <li>
              <a href="wishlist.php" class="text-gray">
                <i class="fas fa-heart"></i>
                <span class="text-sm text-gray-600 font-normal" v-if="wishlistLength > 0">{{wishlistLength}}</span>
              </a>
            </li>
            <li>
              <a href="mycart.php" class="text-gray ">
                <i class="fas fa-shopping-cart"></i>
                <span class="text-sm text-gray-600 font-normal" v-if="cartlistLength > 0">{{cartlistLength}}</span>
              </a>
            </li>
            <!-- Profile Dropdown Trigger -->
            <li style="margin-right: 15px;">
              <button id="profile-menu-button"><img
                  src="<?php echo isset($_SESSION['image']) ? '../assets/img/' . $_SESSION['image'] : ''; ?>"
                  alt="default" style="height:35px;width:35px;border-radius: 40px;"></i></button>
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
          <ul
            class="flex flex-col font-medium md:p-0  md:flex-row md:space-x-8 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700"
            style="margin: 0;padding: 0;list-style: none;display: flex;">
            <li style="margin-right: 15px;">
              <a href="index.php"
                class="block py-2 pl-3 pr-4 text-gray-900 font-bold transition duration-300 ease-in-out transform hover:bg-gray-100 hover:text-gray-600 rounded md:hover:bg-transparent md:p-0 dark:text-white md:dark:hover:text-gray-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                style="text-decoration: none;color: #333;font-weight: bold;transition: color 0.3s ease;">Home</a>
            </li>
            <li style="margin-right: 15px;">
              <a href="products.php"
                class="block py-2 pl-3 pr-4 text-gray-900 font-bold transition duration-300 ease-in-out transform hover:bg-gray-100 hover:text-gray-600 rounded md:hover:bg-transparent md:p-0 dark:text-white md:dark:hover:text-gray-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                style="text-decoration: none;color: #333;font-weight: bold;transition: color 0.3s ease;">Plants</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <form @submit.prevent="becomeSeller" class="bg-gray-100 p-20">
      <div class="container mx-auto mt-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-md shadow-md">
          <h2 class="text-2xl font-semibold mb-6">Become a Seller</h2>
          <!-- Shop Name Field -->
          <div class="mb-4">
            <label for="shopName" class="block text-gray-600 text-sm font-medium mb-2">Shop Name</label>
            <input v-model="shop_name" type="text" id="shop_name" name="shop_name"
              class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-400"
              placeholder="Enter your shop name" required>
          </div>
          <!-- Shop Address Field -->
          <div class="mb-4">
            <label for="shopAddress" class="block text-gray-600 text-sm font-medium mb-2">Shop Address</label>
            <textarea v-model="permanent_add" id="permanent_add" name="permanent_add"
              class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-400"
              placeholder="Enter your shop address" required></textarea>
          </div>
          <!-- GCash Image Upload Field -->
          <div class="mb-6">
            <label for="gcashImage" class="block text-gray-600 text-sm font-medium mb-2">GCash Image</label>
            <input type="file" id="qr_image" ref="qr_image" name="qr_image" class="w-full" accept="image/*" required>
          </div>
          <!-- Submit Button -->
          <button type="submit"
            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue"
            type="submit">Proceed</button>
        </div>
      </div>
    </form>

   <!-- Floating chat icon -->
    <div id="chat-icon" class="shadow-lg">
      <a href="../chat/chat.php">
        <i class="fas fa-comment-dots fa-3x"></i>
      </a>
    </div>
  </div>


  <script src="../assets/services/vue.3.js"></script>
  <script src="../assets/services/axios.js"></script>
  <script src="../assets/sellerService/Bseller.js"></script>
  <script src="../assets/css/sweetalert.js"></script>
  <script src="../assets/drop_down.js"></script>

</body>

</html>