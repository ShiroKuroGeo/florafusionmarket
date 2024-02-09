<?php
 session_start();  
 if(!isset($_SESSION['id'])){
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
    <link rel="stylesheet" href="./assets/css/sweetalert.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <title>Seller List</title>
</head>

<body>
    <div id="sellerInfo">
        <div class="flex">
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


            <!-- Main Content -->
            <div class="flex-1 p-28 relative">
                <!-- Profile Icon in the top right corner -->
        <button id="profile-menu-button" class="text-4xl text-green-400 absolute top-0 right-0 mr-4 mt-4"><img src="<?php echo isset($_SESSION['image']) ? '../assets/img/' . $_SESSION['image'] : ''; ?>"
                                    alt="default" style="height:35px;width:35px;border-radius: 40px;"></i></button>
                <!-- <i class="fas fa-user-circle text-4xl text-green-400 absolute top-0 right-0 mr-4 mt-4"></i> -->

                <!-- Right Side Content -->
                <div class="flex items-center">
                    <p class="text-xl font-semibold">Sellers</p>
                </div>

                <!-- Sellers Table -->
                <div class="mt-6">
                    <table class="min-w-full divide-y divide-gray-200" id="ordersTable">
                    <thead class="bg-gray-50">
    <tr>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            ID
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Image
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Name
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Email
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Address
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Contact Number
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            GCash Image
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Shop Name
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Gender
        </th>
                                <!-- lock or unlock user -->
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Status
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Actions
        </th>
    </tr>
</thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Add your table rows for sellers here -->
                            <tr v-for=" s in seller">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ s.id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                <a :href="'../assets/img/' +s.image" target="_blank">
                                    <img :src="'../assets/img/'+s.image" alt="Seller Image" class="h-8 w-8"></a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ s.name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ s.email }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ s.permanent_add }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ s.contact_no }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                <a :href="'../assets/img/' +s.qr_image" target="_blank">
                                <img :src="'../assets/img/'+s.qr_image" alt="Seller Image" class="h-8 w-8"></a>
                                    <!-- {{ s.gcash_image }} -->
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ s.shop_name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">    
                                {{s.gender == 1 ? 'MALE' : s.gender == 2 ? 'FEMALE'  :  ''}}
                            </td>

                                <!-- lock or unlock user -->
                                <td>
                            <span v-if="s.disabled >= 1" class="text-red-500">
                               Account Locked
                            </span>
                            <span v-else class="text-green-500">
                                Active
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <button v-if="s.disabled >= 1" class="fa fa-unlock mx-3 text-red-500"  @click="UnlockAccount(s.id)"></button>
                            <button v-else @click="LockAccount(s.id)" class="fas fa-lock mx-3 text-green-500" ></button>
                        </td>
                            </tr>                     
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <script src="../assets/services/axios.js"></script>
        <script src="../assets/services/vue.3.js"></script>
        <script src="../assets/services/sellerInfo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="../assets/services/jquery.js"></script>
                <script src="../assets/services/dataTables.js"></script>
</body>
</html>