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
    <link rel="stylesheet" href="../assets/css/sweetalert.css">
    <link rel="stylesheet" href="../assets/css/tailwind.css">
    <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/floating.css">
    <title>Update Profile</title>
</head>

<body class="bg-gray-100">
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto relative">
            <div class="flex items-center">
                <img src="../assets/img/FloraFusion.jpg" class="h-8 mr-3" alt="Plant Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FloraFusion
                    Market</span>
            </div>
            <div class="flex items-center md:order-2">
                <ul class="flex space-x-4">
                    <li><a href="seller_wishlist.php" class="text-gray"><i class="fas fa-heart"></i></a></li>
                    <li><a href="seller_cart.php" class="text-gray "><i class="fas fa-shopping-cart"></i></a></li>
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

    <div id="userinfo" class="mt-20">
        <div class="container flex justify-center items-center min-h-screen bg-gray-100">
            <div class=" p-8 rounded w-full max-w-2xl">
                <h2 class="text-2xl font-semibold mb-4 text-center">Update Personal Information</h2>
                <div class="bg-white p-8 rounded shadow-md w-full max-w-2xl flex">
                    <!-- Left Side (Personal Information) -->
                    <div class="w-1/2 pr-4">
                        <div class="mb-4 text-center">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="profileImage">
                                Profile Image
                            </label>
                            <div class="relative inline-block">
                                <label for="file" class="cursor-pointer">
                                    <img src="<?php echo isset($_SESSION['image']) ? '../assets/img/'.$_SESSION['image'] : ''; ?>"
                                        alt="Your Profile" class="w-32 h-32 rounded-full object-cover mb-2">
                                    <div>
                                        <i class="fas fa-upload text-gray-400 text-2xl"></i>
                                    </div>
                                </label>
                                <input type="file" id="file" name="file" class="hidden" disabled>
                            </div>
                        </div>



                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                Name
                            </label>
                            <input class="border rounded w-full py-2 px-3" id="name" type="text"
                                value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : '' ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                Email
                            </label>
                            <input class="border rounded w-full py-2 px-3" id="email" type="email"
                                placeholder="Enter your email" name="email"
                                value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>" disabled>
                        </div>
                    </div>

                    <!-- Right Side (Address and Contact Information) -->
                    <div class="w-1/2 pl-4">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="current_add">
                                Current Address
                            </label>
                            <input class="border rounded w-full py-2 px-3" id="current_add" type="text"
                                placeholder="Enter your current address" name="current_add"
                                value="<?php echo isset($_SESSION['current_add']) ? $_SESSION['current_add'] : '' ?>"
                                disabled>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="permanent_add">
                                Permanent Address
                            </label>
                            <input class="border rounded w-full py-2 px-3" id="permanent_add" name="permanent_add"
                                type="text" placeholder="Enter your permanent address"
                                value="<?php echo isset($_SESSION['permanent_add']) ? $_SESSION['permanent_add'] : '' ?>"
                                disabled></input>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="contact_no">
                                Contact No.
                            </label>
                            <input class="border rounded w-full py-2 px-3" id="contact_no" type="text"
                                placeholder="Enter your contact number" name="contact_no"
                                value="<?php echo isset($_SESSION['contact_no']) ? $_SESSION['contact_no'] : '' ?>"
                                disabled>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Gender</label>
                            <div class="mt-2">
                                <select id="gender" class="form-control" name="gender" disabled>
                                    <?php
                                    $genderValue = isset($_SESSION['gender']) ? $_SESSION['gender'] : '';
                                    ?>
                                    <option value="1" <?php if($genderValue == 1)
                                        echo 'selected'; ?>>Male</option>
                                    <option value="2" <?php if($genderValue == 2)
                                        echo 'selected'; ?>>Female</option>
                                </select>

                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="birthday">
                                Birthday
                            </label>
                            <input class="border rounded w-full py-2 px-3" id="birthday" type="date" name="birthday"
                                value="<?php echo isset($_SESSION['birthday']) ? $_SESSION['birthday'] : '' ?>"
                                disabled>
                        </div>
                        <div class="mt-6 ml-28 text-center" style="display: flex; justify-content: center;">
                            <button type="button" id="edit" value="edit"
                                class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none">
                                <i class="fas fa-edit mr-2"></i> Edit
                            </button>

                            <button type="button" id="cancel" value="cancel"
                                class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none"
                                style="display: none; margin-right: 10px;">
                                <!-- <i class="fas fa-times mr-2"></i> --> Cancel
                            </button>

                            <button @click="CSInfo" id="update"
                                class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none"
                                style="display: none; margin-left: 10px;">
                                <!-- <i class="fas fa-save mr-2"></i> --> Update
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


<script src="../assets/services/vue.3.js"></script>
<script src="../assets/services/axios.js"></script>
<script src="../assets/services/userinfo.js"></script>
<script src="../assets/css/sweetalert.js"></script>
<script src="../assets/drop_down.js"></script>
<script src="../assets/updateprofilebutton.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</body>

</html>