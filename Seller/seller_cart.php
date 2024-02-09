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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/tailwind.css">
    <link rel="stylesheet" href="../assets/css/sweetalert.css">
    <link rel="stylesheet" href="../assets/css/toastr.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/floating.css">
    <title>Cart</title>
</head>

<body class="bg-gray-100">
    <div id="cart">
        <div>
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
                                    <span class="text-sm text-gray-600 font-normal"
                                        v-if="allcarts > 0">{{allcarts}}</span>
                                </a>
                            </li>
                            <!-- Profile Dropdown Trigger -->
                            <li>
                                <button id="profile-menu-button"><img
                                        src="<?php echo isset($_SESSION['image']) ? '../assets/img/' . $_SESSION['image'] : ''; ?>"
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
                    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
                        id="mobile-menu-2">
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
        </div>

        <div class="mt-20">
            <div class="max-w-5xl mx-auto mt-8 p-4 bg-white rounded shadow">
                <h2 class="text-2xl font-semibold mb-4 text-center">My Cart</h2>

                 <!-- Cart Table -->
            <table class="w-full border-collapse">
                <thead>
                    <tr>
                        <th colspan="6" class="py-2 px-4 text-left border-b flex items-center">
                            <i class="fas fa-store mr-2"></i><a href="seller_shop.php">
                                Green Gardens</a>
                        </th>
                    </tr>
                    <tr class="border-b">
                        <th class="py-2 px-4 text-left">Plant Image</th>
                        <th class="py-2 px-4 text-left">Plant Name</th>
                        <th class="py-2 px-4 text-left">Price</th>
                        <th class="py-2 px-4 text-left">Quantity</th>
                        <th class="py-2 px-4 text-left">Total Price</th>
                        <th class="py-2 px-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <tr class="border-b" v-for="c in carts">
                        <td class="py-2 px-4">
                        <img :src="'../assets/img/' + c.pimage" class="your-image-class w-40">
                        </td>


                        <td class="py-2 px-4">
                            <h3 class="text-lg font-semibold mt-2">{{ c.p_name }}</h3>
                        </td>
                        <td class="py-2 px-4">P{{ c.p_price }}</td>

                        <td class="py-2 px-4">
                            <div class="flex items-center">
                                <button @click="decrement(c)"
                                    class="text-gray-500 hover:text-blue-500 focus:outline-none">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <span class="w-12 text-center">{{ c.p_quantity }}</span>
                                <button @click="increment(c)"
                                    class="text-gray-500 hover:text-blue-500 focus:outline-none">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </td>

                        <td class="py-2 px-4">{{ c.p_totalPrice }}</td>
                        <td class="py-2 px-4">
                            <button class="text-red-500 hover:text-red-700 focus:outline-none"
                                @click="deleteCart(c.id)">
                                <i class="fas fa-trash"></i>
                            </button>
                                <button @click="checkout(c.id)" id="order-details-button" class="bg-blue-500 text-white py-2 px-4 ml-3 rounded hover:bg-blue-600 focus:outline-none">
                                    Checkout
                                </button>
                        </td>
                    </tr>
                </tbody>
            </table>




                <!-- Modal for Checkout -->
                <div id="order-details-modal" class="fixed inset-0 z-10 flex items-center justify-center hidden">
                    <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>
                    <div
                        class="modal-container bg-white w-10/12 md:max-w-2xl mx-auto rounded shadow-lg z-50 overflow-y-auto flex flex-col md:flex-row">
                        <div class="modal-content py-4 text-left px-6 flex-1">
                            <h2 class="text-2xl font-semibold mb-4">Order Details</h2>
                            <div class="payment-method-container flex-1 bg-gray-100 py-4 px-6">
                                <h1 class="text-2xl font-semibold mb-4">Select Payment Method</h1>
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="mode-of-payment">
                                        Mode of Payment
                                    </label>
                                    <select name="paymethod" v-model="paymentMethodModel" required
                                        class="form-select border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="mode-of-payment" onchange="displayQRCode()">
                                        <option selected disabled value="0">Select Payment Method</option>
                                        <option value="1">GCash</option>
                                        <option value="2">Cash on Delivery</option>
                                    </select>
                                </div>
                                <div id="qrCodeContainer" class="hidden">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">QR Code Image</label>
                                    <img :src="'../assets/img/' + qrCoding" alt="Displayed QR Code" width="100">
                                </div>
                                <div id="proof-of-payment" class="hidden mt-5">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" required>Proof of
                                        Payment</label>
                                    <input type="file" id="proofOfPaymentFile" @change="handleFileProofImg" name="image"
                                        accept="image/*">
                                </div>
                                <div class="text-center mt-5">
                                    <button @click="processPlaceOrder"
                                        class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none">
                                        Place Order
                                    </button>

                                    <!-- Cancel button -->
                                    <button id="close-order-details"
                                        class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600 ml-3 focus:outline-none">Cancel</button>
                                </div>
                            </div>
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

    <script>
        function displayQRCode() {
            var paymentMode = document.getElementById("mode-of-payment").value;
            var qrCodeContainer = document.getElementById("qrCodeContainer");
            var displayedQRCode = document.getElementById("displayedQRCode");
            var proofOfPayment = document.getElementById("proof-of-payment");

            // Show the QR code container when a payment mode is selected
            qrCodeContainer.style.display = "block";
            proofOfPayment.style.display = "block";
        }
    </script>
    <script>
        // function closeModal() {
        //     var modal = document.getElementById('order-details-modal');
        //     modal.style.display = 'none';
        // }
    </script>
    <script src="../assets/services/vue.3.js"></script>
    <script src="../assets/services/axios.js"></script>
    <script src="../assets/services/cart.js"></script>
    <script src="../assets/css/sweetalert.js"></script>
    <script src="../assets/css/jquery.js"></script>
    <script src="../assets/css/toastr.js"></script>
    <script src="../assets/modal_cart.js"></script>
    <!-- <script src="../assets/paymentMethod.js"></script> -->
    <script src="../assets/drop_down.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</body>

</html>