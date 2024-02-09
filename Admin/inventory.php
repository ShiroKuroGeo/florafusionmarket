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
    <!-- <link rel="stylesheet" href="../assets/css/bootstrap.css"> -->
    <link rel="stylesheet" href="../assets/css/tailwind.css">
    <title>Inventory</title>
</head>

<body>
    <div class="flex" id="adminInventory">
        <div class="bg-green-600 text-black p-4">
            <div class="bg-green-600 text-black h-screen w-64 flex flex-col">
                <div class="mt-10 mb-8 flex items-center gap-2">
                    <img src="../assets/img/FloraFusion.jpg" class="rounded-full w-14" alt="Plant Logo" />
                    <h2 class="text-2xl text-white font-bold">FloraFusion <span class="font-normal">Market</span></h2>
                </div>
                <ul class="flex flex-col space-y-3">
    <li class="hover:bg-green-700 p-2 rounded-md cursor-pointer">
        <a href="../Admin/index.php" class="flex items-center space-x-2">
            <i class="fas fa-chart-line h-5 w-5 fill-current text-white"></i>
            <span class="text-white font-medium hover:text-gray-300">Dashboard</span>
        </a>
    </li>
    <li class="hover:bg-green-700 p-2 rounded-md cursor-pointer">
        <a href="../Admin/cus_profile.php" class="flex items-center space-x-2">
            <i class="fas fa-address-book h-5 w-5 fill-current text-white"></i>
            <span class="text-white font-medium hover:text-gray-300">Customer Profiles</span>
        </a>
    </li>
    <li class="hover:bg-green-700 p-2 rounded-md cursor-pointer">
        <a href="../Admin/seller_profile.php" class="flex items-center space-x-2">
            <i class="fas fa-user-circle h-5 w-5 fill-current text-white"></i>
            <span class="text-white font-medium hover:text-gray-300">Seller Profiles</span>
        </a>
    </li>
    <li class="hover:bg-green-700 p-2 rounded-md cursor-pointer">
        <a href="../Admin/inventory.php" class="flex items-center space-x-2">
            <i class="fas fa-boxes h-5 w-5 fill-current text-white"></i>
            <span class="text-white font-medium hover:text-gray-300">Inventory</span>
        </a>
    </li>
    <li class="hover:bg-green-700 p-2 rounded-md cursor-pointer">
        <a href="../Admin/reports.php" class="flex items-center space-x-2">
            <i class="fas fa-chart-pie h-5 w-5 fill-current text-white"></i>
            <span class="text-white font-medium hover:text-gray-300">Reports</span>
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



        <div class="flex-1 p-28 relative">
            <button id="profile-menu-button" class="text-4xl text-green-400 absolute top-0 right-0 mr-4 mt-4"><img
                    src="<?php echo isset($_SESSION['image']) ? '../assets/img/'.$_SESSION['image'] : ''; ?>"
                    alt="default" style="height:35px;width:35px;border-radius: 40px;"></i></button>
            <!-- <i class="fas fa-user-circle text-4xl text-green-400 absolute top-0 right-0 mr-4 mt-4"></i> -->


            <div class="flex-1 bg-white p-4 shadow-md">
                <h2 class="text-xl font-semibold mb-4">All Products</h2>
                <div class="flex justify-between items-center mb-4">
                    <div class="relative ml-auto">
                        <input type="search" v-model="search"
                            class="border border-gray-300 rounded-md px-3 py-2 pr-10 placeholder-gray-400 focus:outline-none focus:ring focus:border-blue-500"
                            placeholder="Search">
                    </div>
                </div>


                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Seller Shop</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Total
                                Products</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="tbl">
                        <tr v-for="product in searchData">
                            <td class="px-6 py-4 whitespace-nowrap flex items-center">
                                <!-- Seller Image -->
                                <img :src="'../assets/img/'+product.revImage" alt="Seller Profile"
                                    class="w-8 h-8 rounded-full mr-2">
                                <!-- Seller Shop Name -->
                                <span>{{ product.shop_name }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ product.total_products }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-md ml-2">
                                    <a @click="viewShopName(product.shop_name)" class="btn btn-primary">VIEW</a>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <script src="../assets/css/bootstrap.js"></script>
            <script src="../assets/services/axios.js"></script>
            <script src="../assets/services/vue.3.js"></script>
            <script src="../assets/services/adminInventory.js"></script>
</body>

</html>