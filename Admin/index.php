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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/tailwind.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="flex" id="adminIndex">
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
            <button id="profile-menu-button" class="text-4xl text-green-400 absolute top-0 right-0 mr-4 mt-4"><img src="<?php echo isset($_SESSION['image']) ? '../assets/img/' . $_SESSION['image'] : ''; ?>" alt="default" style="height:35px;width:35px;border-radius: 40px;"></i></button>

            <div class="flex items-center space-x-4">

                <!-- Number of Customers -->
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <div class="flex items-center space-x-4">
                        <div class="bg-green-500 text-white p-3 rounded-full">
                            <i class="fas fa-users"></i>
                        </div>
                        <div>
                            <p class="text-xl font-semibold">Customers</p>
                            <p class="text-3xl font-bold">{{ customerLength }}</p>
                        </div>
                    </div>
                </div>

                <!-- Number of Sellers -->
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <div class="flex items-center space-x-4">
                        <div class="bg-green-500 text-white p-3 rounded-full">
                            <i class="fas fa-store"></i>
                        </div>
                        <div>
                            <p class="text-xl font-semibold">Sellers</p>
                            <p class="text-3xl font-bold">{{ sellerLength }}</p>
                        </div>
                    </div>
                </div>

                <!-- Number of Complaints -->
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <div class="flex items-center space-x-4">
                        <div class="bg-green-500 text-white p-3 rounded-full">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div>
                            <p class="text-xl font-semibold">Complaints</p>
                            <p class="text-3xl font-bold">{{ reportsLength }}</p>
                        </div>
                    </div>
                </div>

                </div>

                <div class="mt-6 flex items-center">
                <div class="mr-4">
                    <canvas id="pieChart" width="400" height="500"></canvas>
                </div>

                <div class="mr-4 ml-4">
                    <canvas id="myChart" width="500" height="500"></canvas>
                </div>

                </div>

        </div>
    </div>



    <script src="../assets/services/axios.js"></script>
    <script src="../assets/services/vue.3.js"></script>
    <script src="../assets/services/adminIndex.js"></script>
    <script src="../assets/chart.js"></script>
</body>

</html>