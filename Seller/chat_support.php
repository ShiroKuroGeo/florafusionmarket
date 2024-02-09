<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location: index.php');
}
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/tailwind.css">
    <title>Sold History</title>
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
                        <a href="../Seller/sold_his.php" class="flex items-center space-x-2">
                            <i class="fas fa-history h-5 w-5 fill-current text-white"></i>
                            <span class="text-white font-medium hover:text-gray-300">Sold History</span>
                        </a>
                    </li>
                    <li class="hover:bg-green-700 p-2 rounded-md cursor-pointer">
                        <a href="../Seller/chat_support.php" class="flex items-center space-x-2">
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

</body>

</html>