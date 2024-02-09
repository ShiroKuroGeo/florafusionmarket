<?php
 session_start();  
if(!isset($_SESSION['id'])){
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


        <div class="flex-1 bg-white p-4 shadow-md">
            <button id="profile-menu-button" class="text-4xl text-green-400 absolute top-0 right-0 mr-4 mt-4"><img
                    src="<?php echo isset($_SESSION['image']) ? '../assets/img/' . $_SESSION['image'] : ''; ?>"
                    alt="default" style="height:35px;width:35px;border-radius: 40px;"></i></button>

        <div id="histo">
            <h2 class="text-xl font-semibold mt-20">Sold History</h2>
            <div class="flex p-8 space-x-8">

                <div class="w-60 relative">
                    <input type="search" v-model="search" class="w-full border rounded-md py-2 px-3 pl-10" placeholder="Search...">
                </div>
                <!-- Sorting Options -->
                <!-- <div class="flex justify-end mr-8">
                    <label class="mr-2">Sort By:</label>
                    <select class="border rounded-md py-2 px-3 focus:outline-none focus:shadow-outline">
                        <option value="date">Date</option>
                        <option value="category">Category</option>
                    </select>
                </div> -->
            </div>

                <table class="w-full border-collapse mt-4 mx-8">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2 px-4 text-left">Transaction Image</th>
                            <th class="py-2 px-4 text-left">Plant Name</th>
                            <th class="py-2 px-4 text-left">Qty</th>
                            <th class="py-2 px-4 text-left">Price</th>
                            <th class="py-2 px-4 text-left">Total Price</th>
                            <th class="py-2 px-4 text-left">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b" v-for="h in searchData">
                            <td class="py-2 px-4 text-left"> <img :src="'../assets/img/' + h.image"  width="50" height="50"></td>
                            <td class="py-2 px-4">{{ h.name }}</td>
                            <td class="py-2 px-4">{{ h.qty }}</td>
                            <td class="py-2 px-4">{{ h.amount }}</td>
                            <td class="py-2 px-4">{{ h.TP }}</td>
                            <td class="py-2 px-4">{{ h.date }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="flex justify-between mx-8 mt-4">
                    <div>
                        <p class="font-semibold">Unit Sold:
                            <span id="unit-sold">{{ lengthSold }}</span>
                        </p>
                    </div>
                    <div>
                        <p class="font-semibold">Total Sales:
                            <span id="total-sales">{{ SumTP }}</span>
                        </p>
                    </div>
                </div>
            </div>
            


        </div>
    </div>
    <script src="../assets/services/vue.3.js"></script>
    <script src="../assets/services/axios.js"></script>
    <script src="../assets/services/history.js"></script>
</body>

</html>