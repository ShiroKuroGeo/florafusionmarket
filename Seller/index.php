<?php
session_start();
$shopName = $_SESSION['shop_name'];
if (!isset($_SESSION['id'])) {
    header('location: index.php');
}
// var_dump($_SESSION);
$role = $_SESSION['role'];
$role = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/tailwind.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>Seller Dashboard</title>
</head>

<body>
<div class="flex" id="sellerIndex">
      <div class="bg-green-600 text-black p-4">
        <div class="bg-green-600 text-black h-screen w-64 flex flex-col">
            <div class="mt-10 mb-8 flex items-center gap-2">
                <img src="../assets/img/FloraFusion.jpg" class="rounded-full w-14" alt="Plant Logo" />
                <h2 class="text-2xl text-white font-bold">FloraFusion <span class="font-normal">Market</span></h2>
            </div>
            <ul class="flex flex-col space-y-3">
                <li class="hover:bg-green-700 p-2 rounded-md cursor-pointer">
                    <a href="../Seller/index.php" class="flex items-center space-x-2">
                        <i class="fas fa-tachometer-alt h-5 w-5 fill-current text-white"></i>
                        <span class="text-white font-medium hover:text-gray-300">Dashboard</span>
                    </a>
                </li>
                <li class="hover:bg-green-700 p-2 rounded-md cursor-pointer">
                    <a href="../Seller/Inventory.php" class="flex items-center space-x-2">
                        <i class="fas fa-box h-5 w-5 fill-current text-white"></i>
                        <span class="text-white font-medium hover:text-gray-300">Inventory</span>
                    </a>
                </li>
                <li class="hover:bg-green-700 p-2 rounded-md cursor-pointer">
                    <a href="../Seller/orders.php" class="flex items-center space-x-2">
                        <i class="fas fa-shopping-cart h-5 w-5 fill-current text-white"></i>
                        <span class="text-white font-medium hover:text-gray-300">Orders</span>
                    </a>
                </li>
                <li class="hover:bg-green-700 p-2 rounded-md cursor-pointer">
                    <a href="../Seller/sales_rep.php" class="flex items-center space-x-2">
                        <i class="fas fa-chart-bar h-5 w-5 fill-current text-white"></i>
                        <span class="text-white font-medium hover:text-gray-300">Sales Report</span>
                    </a>
                </li>
                <li class="hover:bg-green-700 p-2 rounded-md cursor-pointer">
                    <a href="../Chats/chat.php" class="flex items-center space-x-2">
                        <i class="fas fa-comments h-5 w-5 fill-current text-white"></i>
                        <span class="text-white font-medium hover:text-gray-300">Chat Support</span>
                    </a>
                </li>
                <li class="hover:bg-green-700 p-2 rounded-md cursor-pointer">
                    <a href="../includes/logout.php" class="flex items-center space-x-2">
                        <i class="fas fa-sign-out-alt h-5 w-5 text-white"></i>
                        <span class="text-white font-medium hover:text-gray-300">Log out</span>
                    </a>
                </li>
            </ul>
        </div>
         </div>
    

        <div class="flex-1 bg-white p-4 mt-28 shadow-md">
            <div id="profile-menu-button" class="text-4xl absolute top-0 mt-4 py-4 whitespace-nowrap flex items-center">
                <img src="<?php echo isset($_SESSION['image']) ? '../assets/img/' . $_SESSION['image'] : ''; ?>" alt="default" class="w-8 h-8 rounded-full mr-2" style="height:35px;width:35px;border-radius: 40px;"></i>
                <span><?php echo isset($_SESSION['shop_name']) ? $_SESSION['shop_name'] : "Session variable not set";?></span>
            </div>
            <a href="./seller_index.php">
                <div class="mb-4 flex items-center gap-2">
                    <svg class="w-5 h-[14px] text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M13 5H1m0 0 4 4M1 5l4-4" />
                    </svg>
                    <span>Go To Seller Page</span>
                </div>
            </a>

            <div class="flex items-center">
                <div class="bg-green-500 p-4 rounded-md text-white mr-2">
                    <h3 class="text-xl font-semibold">Number of Plants</h3>
                    <p class="text-4xl">{{ plantlength }}</p>
                </div>
                <div class="bg-blue-500 p-4 rounded-md text-white ml-2">
                    <h3 class="text-xl font-semibold">Number of Orders</h3>
                    <p class="text-4xl">{{ orderlength }}</p>
                </div>
                <div class="bg-blue-500 p-4 rounded-md text-white ml-2">
                    <h3 class="text-xl font-semibold">Total Sales</h3>
                    <p class="text-4xl">{{ totalsales }}</p>
                </div>
            </div>
            <div class="mt-6">
                <canvas id="myChart" width="400" height="200"></canvas>
            </div>
        </div>

        <script src="../assets/services/vue.3.js"></script>
        <script src="../assets/services/axios.js"></script>
        <script src="../assets/services/sellerIndex.js"></script>
</body>

</html>