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
              <a href="seller_wishlist.php" class="text-gray">
                <i class="fas fa-heart"></i>
                <span class="text-sm text-gray-600 font-normal" v-if="wishlistLength > 0">{{wishlistLength}}</span>
              </a>
            </li>
            <li>
              <a href="seller_cart.php" class="text-gray ">
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
                style="text-decoration: none;color: #333;font-weight: bold;transition: color 0.3s ease;">Plants</a>
            </li>
          </ul>
        </div>

      </div>
    </nav>

    <div class="bg-gray-100 p-20">
      <div class="max-w-md mx-auto bg-white p-8 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Help Center</h2>

        <form @submit.prevent="reports">
          <!-- Select Query Type -->
          <div class="mb-4">
            <label for="queryType" class="block text-sm font-medium text-gray-600">Select Query Type</label>
            <select id="queryType" name="queryType" v-model="queryType" class="mt-1 p-2 w-full border rounded-md" required>
              <option value="1">Complaint/Feedback</option>
              <option value="2">Pre-order Inquiry</option>
              <option value="3">Post-order Inquiry</option>
              <option value="4">Website Issue</option>
            </select>
          </div>

          <!-- Select Type -->
          <div class="mb-4">
            <label for="selectType" class="block text-sm font-medium text-gray-600">Select Type</label>
            <select id="selectType" name="selectType" v-model="selectType" class="mt-1 p-2 w-full border rounded-md" required>
              <option value="1">Non-Delivery</option>
              <option value="2">Partial Delivery</option>
              <option value="3">Late/Early Delivery</option>
              <option value="4">Wrong Product Delivered</option>
              <option value="5">Quality Issue</option>
              <option value="6">Behavior Issue - Delivery Boy</option>
              <option value="7">Others</option>
            </select>
          </div>

          <!-- Other Input Fields -->
          <div class="mb-4">
            <label for="shopName" class="block text-sm font-medium text-gray-600">Shop Name</label>
            <input type="text" id="shopName" v-model="shopName" name="shopName" class="mt-1 p-2 w-full border rounded-md" required>
          </div>
          <div class="mb-4">
            <label for="seller" class="block text-sm font-medium text-gray-600">Seller Name</label>
            <input type="text" id="sellerName"v-model="sellerName" name="sellerName" class="mt-1 p-2 w-full border rounded-md" required>
          </div>
          <div class="mb-4">
            <label for="orderNo" class="block text-sm font-medium text-gray-600">Order No.</label>
            <input type="text" id="orderNo"v-model="orderNo" name="orderNo" class="mt-1 p-2 w-full border rounded-md" required>
          </div>

          <div class="mb-4">
            <label for="yourName" class="block text-sm font-medium text-gray-600">Your Name</label>
            <input type="text" id="yourName" v-model="yourName" name="yourName" class="mt-1 p-2 w-full border rounded-md" required>
          </div>

          <div class="mb-4">
            <label for="yourEmail" class="block text-sm font-medium text-gray-600">Your Email</label>
            <input type="email" id="email" v-model="email" name="email" class="mt-1 p-2 w-full border rounded-md" required>
          </div>

          <div class="mb-4">
            <label for="yourPhone" class="block text-sm font-medium text-gray-600">Your Phone No.</label>
            <input type="tel" id="phoneNo" v-model="phoneNo" name="phoneNo" class="mt-1 p-2 w-full border rounded-md" required>
          </div>

          <div class="mb-4">
            <label for="comment" class="block text-sm font-medium text-gray-600">Comment</label>
            <textarea id="comments" name="comments" v-model="comments" rows="4" class="mt-1 p-2 w-full border rounded-md" required></textarea>
          </div>

          <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-600">Upload Pictures (optional)</label>
            <input type="file" id="image"  ref="image" name="image" accept="image/*" class="mt-1" required>
          </div>

          <!-- Submit Button -->
          <div>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="../assets/services/vue.3.js"></script>
  <script src="../assets/services/axios.js"></script>
  <script src="../assets/sellerService/Bseller.js"></script>
  <script src="../assets/css/sweetalert.js"></script>
  <script src="../assets/drop_down.js"></script>
</body>

</html>