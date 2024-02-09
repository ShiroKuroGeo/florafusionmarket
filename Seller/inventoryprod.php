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
    <link rel="stylesheet" href="../assets/css/toastr.css">
    <link rel="stylesheet" href="../assets/css/sweetalert.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/tailwind.css">
    <title>Inventory</title>
</head>

<body>
    <div id="displayProd">
        <div class="flex">
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
                            <a href="../Seller/list_orders.php" class="flex items-center space-x-2">
                                <i class="fas fa-list-alt h-5 w-5 fill-current text-white"></i>
                                <span class="text-white font-medium hover:text-gray-300">List of Orders</span>
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
                <button id="profile-menu-button" class="text-4xl text-green-400 absolute top-0 right-0 mr-4 mt-4"><img src="<?php echo isset($_SESSION['image']) ? '../assets/img/' . $_SESSION['image'] : ''; ?>" alt="default" style="height:35px;width:35px;border-radius: 40px;"></i></button>
                <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md mb-4 mt-28"><a href="inventory.php" class="text-white no-underline">Back</a></button>
                <div class="flex justify-between items-center mb-4">
                    <div class="relative ml-auto">
                        <!-- <button class="bg-green-500 hoverbg-green-600 text-white px-4 py-2 rounded-md mr-3"
                            data-bs-toggle="modal" data-bs-target="#addprod">+</button> -->
                        <input type="search" v-model="search" class="border border-gray-300 rounded-md px-3 py-2 pr-10 placeholder-gray-400 focus:outline-none focus:ring focus:border-blue-500" placeholder="Search">
                    </div>
                </div>



                <!-- Table -->
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead>
                        <tr>
                            <th class="py-2 px-3 bg-gray-200">Plant Image</th>
                            <th class="py-2 px-3 bg-gray-200">ID Number</th>
                            <th class="py-2 px-3 bg-gray-200">Plant Name</th>
                            <th class="py-2 px-3 bg-gray-200">Quantity</th>
                            <th class="py-2 px-3 bg-gray-200">Price</th>
                            <th class="py-2 px-3 bg-gray-200">Description</th>
                            <!-- <th class="py-2 px-3 bg-gray-200">Actions</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample inventory items (you can use a loop to populate these) -->
                        <tr v-for="up in searchData">
                            <td class="py-2 px-3"><img :src="'../assets/img/' + up.image" alt="" class="w-16 h-16" />
                            </td>
                            <td class="py-2 px-3">{{ up.id }}</td>
                            <td class="py-2 px-3">{{ up.name }}</td>
                            <td class="py-2 px-3">{{ up.qty }}</td>
                            <td class="py-2 px-3">{{ up.price }}</td>
                            <td class="py-2 px-3">{{ up.desc }}</td>
                            <!-- <td class="py-2 px-3">
                                <button @click="GETselectedId(up.id)"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-md ml-2"
                                    data-bs-toggle="modal" data-bs-target="#updateprod">Update</button>
                                <button @click="deleteProduct(up.id)"
                                 class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md ml-2">Delete</button>
                            </td> -->
                        </tr>
                    </tbody>
                </table>
            </div>


            <!-- Modal for Add Category -->
            <div class="modal fade" id="addprod" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content p-4">
                        <div class="modal-header">
                            <h5 class="modal-title text-2xl font-semibold mb-4" id="addprod">Add Products</h5>
                        </div>
                        <form @submit="addUserProduct" class="productform">
                            <!-- Image -->
                            <input type="file" class="mt-1 p-2 w-full border rounded" name="file" id="image">
                            <!-- Product -->
                            <input type="text" placeholder="Product Name" class="mt-1 p-2 w-full border rounded" name="name">
                            <!-- Total Products -->
                            <input type="text" placeholder="Total Products" class="mt-1 p-2 w-full border rounded" name="qty">
                            <!-- Total Products -->
                            <input type="text" placeholder="Total Price" class="mt-1 p-2 w-full border rounded" name="price">
                            <!-- Description -->
                            <input type="text" placeholder="Description" class="mt-1 p-2 w-full border rounded" name="desc">
                            <!-- Add Button -->
                            <div class="d-flex flex-row-reverse">
                                <button class="bg-green-500 mt-3 text-white rounded-md py-2 px-4 mx-2 my-2 hover:bg-green-600">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Modal for Update Plant -->
            <div class="modal fade" id="updateprod" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content p-4">
                        <div class="modal-header">
                            <h5 class="modal-title text-2xl font-semibold mb-4" id="updateprod">Update</h5>
                        </div>
                        <form>
                            <!-- Total Products -->
                            <input type="number" placeholder="Total Products" class="mt-1 p-2 w-full border rounded" name="qty" id="qytUpt">
                            <!-- Total Price -->
                            <input type="number" placeholder="Total Price" class="mt-1 p-2 w-full border rounded" name="price" id="priceUpt">
                            <!-- Update Button -->
                            <div class="d-flex flex-row-reverse">
                                <button type="submit" @click="updateProduct" class="bg-blue-500 text-white rounded-md py-2 px-4 mx-2 my-2 hover:bg-blue-600" data-bs-dismiss="modal" aria-label="Close">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../assets/css/jquery.js"></script>
    <script src="../assets/css/toastr.js"></script>
    <script src="../assets/css/sweetalert.js"></script>
    <script src="../assets/css/bootstrap.js"></script>
    <script src="/florafusionmarket/assets/services/axios.js"></script>
    <script src="/florafusionmarket/assets/services/vue.3.js"></script>
    <script src="/florafusionmarket/assets/services/displayProd.js"></script>
</body>

</html>