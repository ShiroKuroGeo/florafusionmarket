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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/tailwind.css">
    <link rel="stylesheet" href="../assets/css/toastr.css">
    <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/floating.css">
    <title>Wishlist</title>
</head>

<body class="bg-gray-100">
    <div id="wishlist">
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto relative">
                <div class="flex items-center">
                    <img src="../assets/img/FloraFusion.jpg" class="h-8 mr-3" alt="Plant Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FloraFusion
                        Market</span>
                </div>
                <div class="flex items-center md:order-2">
                    <ul class="flex space-x-4">
                        <li>
                            <a href="seller_wishlist.php" class="text-gray">
                                <i class="fas fa-heart"></i>
                                <span class="text-sm text-gray-600 font-normal"
                                    v-if="wishlistLength > 0">{{wishlistLength}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="seller_cart.php" class="text-gray ">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="text-sm text-gray-600 font-normal" v-if="allcarts > 0">{{allcarts}}</span>
                            </a>
                        </li>
                        <!-- Profile Dropdown Trigger -->
                        <li>
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
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
                    <ul
                        class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="seller_index.php"
                                class="block py-2 pl-3 pr-4 text-gray-900 font-bold transition duration-300 ease-in-out transform hover:bg-gray-100 hover:text-gray-600 rounded md:hover:bg-transparent md:p-0 dark:text-white md:dark:hover:text-gray-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Home</a>
                        </li>
                        <li>
                            <a href="seller_products.php"
                                class="block py-2 pl-3 pr-4 text-gray-900 font-bold transition duration-300 ease-in-out transform hover:bg-gray-100 hover:text-gray-600 rounded md:hover:bg-transparent md:p-0 dark:text-white md:dark:hover:text-gray-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Plants</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    


        <div class="mt-20">
            <div class="p-6">
                <h2 class="text-2xl font-semibold mb-4 text-center">My Wishlist</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mx-auto mt-8 p-4">
                    <div class="bg-white rounded-lg shadow-md p-4" v-for="w in wishlist">
                        <img :src="'/florafusionmarket/assets/img/' + w.product_image" alt="Plant Product"
                            class="mx-auto h-40 rounded-md">
                        <div class="text-center mt-2">
                            <h3 class="text-lg font-semibold">{{ w.product_name }}</h3>
                            <p class="text-gray-600">P{{ w.product_price }}</p>
                        </div>
                        <div class="flex justify-center mt-4 space-x-4">
                            <button @click="deleteWishlist(w.id)" class="text-red-600 hover:text-gray-500"><i
                                    class="fas fa-heart"></i></button>
                            <button class="text-gray-500 hover:text-green-600 ml-2"><a href="mycart.php"><i
                                        class="fas fa-cart-plus"></i></a></button>
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

    <script src="../assets/services/vue.3.js"></script>
    <script src="../assets/services/axios.js"></script>
    <script src="../assets/services/wishlist.js"></script>
    <script src="../assets/drop_down.js"></script>
    <script src="../assets/css/sweetalert.js"></script>
    <script src="../assets/css/jquery.js"></script>
    <script src="../assets/css/toastr.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</body>

</html>