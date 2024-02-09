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
    <link rel="stylesheet" href="../assets/css/purchase.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/floating.css">
    <title>Purchase History</title>
</head>

<body class="bg-gray-100">
    <div id="purchase">
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

        <div id="purchase" class="mt-20">
            <div class="max-w-5xl mx-auto mt-8 p-4 bg-white rounded shadow">
                <h2 class="text-2xl text-center font-semibold mb-4">Purchase History</h2>

                <!-- Purchase History Table -->
                <table class="w-full border-collapse table" id="mytable">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2 px-4 text-left">Plant Image</th>
                            <th class="py-2 px-4 text-left">Plant Name</th>
                            <th class="py-2 px-4 text-left">Order No.</th>
                            <th class="py-2 px-4 text-left">Date</th>
                            <th class="py-2 px-4 text-left">Paid By</th>
                            <th class="py-2 px-4 text-left">Total Price</th>
                            <th class="py-2 px-4 text-left">Status</th>
                            <!-- <th class="py-2 px-4 text-left">Actions</th> -->
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-400 hover:divide-y-8">

                        <!-- Purchase History Item 1 -->
                        <tr class="border-b" v-for="p in purchase">
                        <td><img :src="'../assets/img/' + p.image" alt="Product Image" width="50" height="50"></td>
                        
                        <td class="py-2 px-4">{{p.name}}</td>
                        <td class="py-2 px-4">{{ p.order_id }}</td>
                        <td class="py-2 px-4">{{ p.order_date }}</td>
                            <!-- <td class="py-2 px-4">{{ p.order_date }}</td> -->
                            <td class="py-2 px-4">{{ p.paymethod == 1 ? 'Gcash' : p.paymethod == 2 ? 'Gcash': 'COD' }}
                            </td>
                            <td class="py-2 px-4">{{ p.amount }}</td>
                            <td class="py-2 px-4">{{ p.status == 5 ? 'COMPLETE' : 'NOT COMPLETE' }}</td>
                            <td class="py-2 px-4">
                                <!-- <button class="text-red-500 hover:text-red-700 focus:outline-none">
                                    <i class="fas fa-trash-alt mr-2"></i>
                                </button>
                                <button id="openModalButton"
                                    class="text-blue-500 hover:text-blue-700 ml-2 focus:outline-none"
                                    onclick="openRateModal()">
                                    <i class="fas fa-star mr-2"></i>
                                </button> -->
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>



            <!-- Rating Modal (Initially hidden) -->
            <div id="rateModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
                <div class="bg-white w-1/2 p-4 rounded-lg shadow-lg relative">
                    <button id="closeModalButton" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times fa-lg"></i>
                    </button>

                    <div class="flex items-center mb-4">
                        <div class="mr-4">
                            <img src="<?php echo isset($_SESSION['image']) ? '../assets/img/'.$_SESSION['image'] : ''; ?>"
                                alt="default" style="height:35px;width:35px;border-radius: 40px;">
                        </div>
                        <p class="text-lg font-semibold">
                            <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>
                        </p>
                    </div>
                    <form @submit.prevent="addReview">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Rating:</label>
                            <div class="star-rating" name="rating">

                                <input type="radio" id="star1" name="rating" value="1" v-model="rating" class="hidden" />
                                <label for="star1" class="text-3xl cursor-pointer text-gray-500"></label>

                                <input type="radio" id="star2" name="rating" value="2" v-model="rating" class="hidden" />
                                <label for="star2" class="text-3xl cursor-pointer text-gray-500"></label>

                                <input type="radio" id="star3" name="rating" value="3" v-model="rating" class="hidden" />
                                <label for="star3" class="text-3xl cursor-pointer text-gray-500"></label>

                                <input type="radio" id="star4" name="rating" value="4" v-model="rating" class="hidden" />
                                <label for="star4" class="text-3xl cursor-pointer text-gray-500"></label>

                                <input type="radio" id="star5" name="rating" value="5" v-model="rating" class="hidden" />
                                <label for="star5" class="text-3xl cursor-pointer text-gray-500"></label>

                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Message:</label>
                            <textarea name="reviewText" id="message" v-model="reviewText"
                                class="w-full h-24 p-2 border rounded-lg"></textarea>
                        </div>

                        <button id="submitRating" type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                            Submit
                        </button>
                    </form>
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

<script src="../assets/services/vue.3.js"></script>
<script src="../assets/services/axios.js"></script>
<script src="../assets/services/purchase.js"></script>
<script src="../assets/css/jquery.js"></script>
<script src="../assets/css/toastr.js"></script>
<script src="../assets/drop_down.js"></script>
<script src="../assets/close_modal.js"></script>
<script src="../assets/rateModal.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</body>

</html>