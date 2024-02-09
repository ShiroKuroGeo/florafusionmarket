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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Orderlist</title>
</head>

<body>
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
                <button id="profile-menu-button" class="text-4xl text-green-400 absolute top-0 right-0 mr-4 mt-4"><img src="<?php echo isset($_SESSION['image']) ? '../assets/img/' . $_SESSION['image'] : ''; ?>" alt="default" style="height:35px;width:35px;border-radius: 40px;"></i></button>
                  <div class="flex justify-between items-center mt-28">
                    <div class="relative ml-auto">
                    </div>
                </div>

                <div id="CusOrders">
                    <table id="ordersTable">
                        <thead>
                            <tr>
                            <th>Order ID</th>
                            <th>Order Image</th>
                            <th>Customer Name</th>
                            <th>Date</th>
                            <th>Quantity</th>
                            <td>Amount</th>
                            <td>Payment Method</th>
                            <td>Payment Status</th>
                            <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr  v-for="(o, index) in orders">
                                <td>{{index + 1}}</td>
                                <td><img :src="'../assets/img/' + o.image"  width="100" height="100"></td>
                                <td class="text-center"><span class="badge rounded-pill bg-primary">{{o.name}}</span></td>
                                <td>{{o.date}}</td>
                                <td>{{o.quantity}}</td>
                                <td>{{o.amount}}</td>
                                <td>{{o.payment == 1 ? 'GCASH' : o.payment == 2 ? 'COD'  :  'NO PAYMENT'}}</td>
                                <td><span class="badge rounded-pill bg-success">{{o.status == 0 ? 'PENDING' : o.status == 1 ? 'Approved' : o.status == 2 ? 'PACKED' : o.status == 3 ? 'SHIPPED' : o.status == 4 ? 'ARRIVED'  :  'RECEIVE'}}</span></td>
                                <td>
                                <button class="btn view-order"  @click="fnGetDataProducts(o.id)" data-bs-toggle="modal" data-bs-target="#exampleModal">👁️</button>
                                <button class="btn delete-order"  @click="DeleteOrders(o.id)">🗑️</button>
                             </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="modal fade theme-modal" id="exampleModal" tabindex="-1"  aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header d-block text-center">
                                    <h5 class="modal-title w-100 text-primary">Orders Details</h5>
                                </div>
                            <div class="modal-body p-4">  
                                <form>
                                    <div>
                                        <p>Order Number: {{id}}</p>
                                        <p>Order Date: {{date}}</p>
                                        <p>Customer Name: {{name}}</p>
                                        <p>Address: {{address}}</p>
                                        <p>Contact Number: {{contact_no}}</p>
                                        <p>Proof Of Payment <a :href="'../assets/img/' + image" target="_blank"><img :src="'../assets/img/' + image" class="your-image-class w-40 ml-8 mb-3 mt-3"alt="Product Image"></p></a></td>
                                        <!-- <p>Quantity : {{quantity}}</p>
                                        <p>PRICE : {{price}}</p>
                                        <p>TOTAL : {{amount}}</p>                             -->
                                        <button v-if="status == 0" @click.prevent="StatusApprove(id)" class="btn btn-info text-light btn-md fw-bold float-end mt-3">Approved</button>
                                        <button v-if="status == 1" @click.prevent="StatusPacked(id)" class="btn btn-success text-light btn-md fw-bold float-end mt-3">Packed</button>
                                        <button v-if="status == 2" @click.prevent="StatusShipped(id)" class="btn btn-warning text-light btn-md fw-bold float-end mt-3">Mark as Shipped</button>
                                        <button v-if="status == 3" @click.prevent="StatusArrived(id)" class="btn btn-primary text-light btn-md fw-bold float-end mt-3">Mark as Arrived</button>
                                        <button v-if="status == 4" @click.prevent="StatusReceive(id)" class="btn btn-primary text-light btn-md fw-bold float-end mt-3">Mark as Receive</button>
                                        <button type="button" class="btn  btn-dark float-end mt-3 me-2" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <div>


          <script src="../assets/services/vue.3.js"></script>
            <script src="../assets/services/axios.js"></script>
            <script src="../assets/services/CusOrders.js"></script>
            <script src="../assets/css/bootstrap.js"></script>
                 <script src="../assets/productsmodal.js"></script>
                <script src="../assets/drop_down.js"></script>
            <script src="../assets/css/sweetalert.js"></script>
                <script src="../assets/services/jquery.js"></script>
                <script src="../assets/services/dataTables.js"></script>
</body>

</html>