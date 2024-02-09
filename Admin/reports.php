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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

    <title>Admin Dashboard</title>
</head>

<body>
    <div class="flex" id="cusReport">
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
            <!-- Profile Icon in the top right corner -->
            <button id="profile-menu-button" class="text-4xl text-green-400 absolute top-0 right-0 mr-4 mt-4"><img
                    src="<?php echo isset($_SESSION['image']) ? '../assets/img/' . $_SESSION['image'] : ''; ?>"
                    alt="default" style="height:35px;width:35px;border-radius: 40px;"></i></button>
            <!-- <i class="fas fa-user-circle text-4xl text-green-400 absolute top-0 right-0 mr-4 mt-4"></i> -->

            <div class="container mt-5">
                <div class="overflow-x-auto mt-5">
                    <table class="min-w-full bg-white border border-gray-300 mt-5" id="reportsTable">
                        <thead>
                            <tr>
                                <th  class="py-2 px-6 border-b">ID</th>
                                <th class="py-2 px-6 border-b">Query Type</th>
                                <th class="py-2 px-6 border-b">Issue</th>
                                <th class="py-2 px-6 border-b">Shop Name</th>
                                <th class="py-2 px-6 border-b">Seller Name</th>
                                <th class="py-2 px-6 border-b">Order No.</th>
                                <th class="py-2 px-6 border-b"> Customer Name</th>
                                <th class="py-2 px-6 border-b">Email</th>
                                <th class="py-2 px-6 border-b">Phone No.</th>
                                <th class="py-2 px-6 border-b">Comment</th>
                                <th class="py-2 px-6 border-b">Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="report in reports">
                                <td class="py-2 px-4 border-b">{{report.report_id}}</td>
                                <td class="py-2 px-4 border-b">{{  report.typeOfComplaints === 1 ? "Complaint/Feedback" : report.typeOfComplaints === 2 
                                    ? "Pre-order Inquiry" : report.typeOfComplaints === 3 ? "Post-order Inquiry" : "Website Issue" }}</td>
                                <td class="py-2 px-4 border-b">{{ report.selectType === 1 ? "Non-Delivery" : report.selectType === 2
                                    ? "Partial Delivery" : report.selectType === 3 ? "Late/Early Delivery" : report.selectType === 4 ? "Wrong Product Delivered" : report.selectType === 5 
                                ? "Quality Issue" : report.selectType === 6 ? "Behavior Issue - Delivery Boy" : "Others" }}</td>
                                <td class="py-2 px-4 border-b">{{ report.shopName }}</td>
                                <td class="py-2 px-4 border-b">{{ report.sellerName }}</td>
                                <td class="py-2 px-4 border-b">{{ report.orderNo }}</td>
                                <td class="py-2 px-4 border-b">{{ report.yourName }}</td>
                                <td class="py-2 px-4 border-b">{{ report.email }}</td>
                                <td class="py-2 px-4 border-b">{{ report.phoneNo }}</td>
                                <td class="py-2 px-4 border-b">{{ report.comments }}</td>
                                <td class="py-2 px-4 border-b">
                                <a :href="'../assets/img/' +report.image" target="_blank">
                                    <img :src="'../assets/img/' + report.image" alt="Image"
                                        class="h-8 w-8 object-cover rounded-full"></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<script src="../assets/services/vue.3.js"></script>
<script src="../assets/services/axios.js"></script>
<script src="../assets/sellerService/cusReport.js"></script>
<script src="../assets/services/jquery.js"></script>
                <script src="../assets/services/dataTables.js"></script>
</body>

</html>