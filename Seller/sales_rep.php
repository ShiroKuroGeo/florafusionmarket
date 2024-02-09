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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
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
            <h2 class="text-xl font-semibold mt-20">Sales Report</h2>
            <div class="flex p-8 space-x-8">
            </div>

                <table class="w-full border-collapse mt-4 mx-8" id="salesReportTable">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2 px-4 text-left">Customer Name</th>
                            <th class="py-2 px-4 text-left">MONTH</th>
                            <th class="py-2 px-4 text-left">YEAR</th>
                            <th class="py-2 px-4 text-left">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="sp in salesReport">
                            <td><span class="badge bg-success py-2 px-4">{{ sp.name }}</span></td>
                            <td class="py-2 px-4">{{ sp.month }}</td>
                            <td class="py-2 px-4">{{ sp.year }}</td>
                            <td class="py-2 px-4"><a @click="Customer(sp.name,sp.month,sp.year)"class="btn btn-success">VIEW</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            


        </div>
    </div>
    <script src="../assets/services/vue.3.js"></script>
    <script src="../assets/services/axios.js"></script>
    <script src="../assets/services/history.js"></script>
    <script src="../assets/css/bootstrap.js"></script>
                 <script src="../assets/productsmodal.js"></script>
                <script src="../assets/drop_down.js"></script>
            <script src="../assets/css/sweetalert.js"></script>
                <script src="../assets/services/jquery.js"></script>
                <script src="../assets/services/dataTables.js"></script>
</body>

</html>