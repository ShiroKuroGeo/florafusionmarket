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
    <link rel="stylesheet" href="../assets/css/sweetalert.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/tailwind.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include DataTables from the DataTables CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> -->
    <title>Inventory</title>
</head>

<body>
    <div class="flex" id="displayProd">
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


            <div class="mb-4 mt-20">
                <div class="relative ml-auto">
                    <button type="button" class="btn bg-green-600 hover:bg-green-700 text-white" data-bs-toggle="modal" data-bs-target="#addproduct">Add Plants</button>
                    <!-- <button class="btn bg-green-600 hover:bg-green-700 text-white"><a href="inventoryprod.php" class="text-white no-underline">View</a></button> -->
                </div>
            </div>
            <!-- table -->
            <table class="table text-center" id="inventorytable">
                <thead>
                    <tr>
                        <th scope="col">Plant ID</th>
                        <th scope="col">Plant Image</th>
                        <th scope="col">Plant Name</th>
                        <th scope="col">Plant Description</th>
                        <th scope="col">Plant Price</th>
                        <th scope="col">Total Plant</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- Modal for Add products -->
        <div class="modal fade" id="addproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="addprod" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="pname" class="form-control" value="" id="floatingInput" placeholder="name@example.com" required>
                                            <label for="floatingInput">Plant Name</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" name="pprice" value="" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                                            <label for="floatingInput">₱</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" value="" name="pquantity" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                                            <label for="floatingInput">Plant quantity</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="pfile">Plant Image</label>
                                        <input type="file" name="file" class="form-control upimage" required>
                                        <input type="file" name="file2" class="form-control upimage2" required>
                                        <input type="file" name="file3" class="form-control upimage3" required>
                                    </div>
                                </div>
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" value="" name="desc" placeholder="Leave a comment here" id="floatingTextarea" required></textarea>
                                            <label for="floatingTextarea">Plant Description</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="saveprod" class="btn btn-primary">Add</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal update -->
        <div class="modal fade" id="updateproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="updateprod" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="pname" class="form-control upname" value="" id="floatingInput" placeholder="name@example.com" required>
                                            <label for="floatingInput">Plant Name</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" name="pprice" value="" class="form-control upprice" id="floatingInput" placeholder="name@example.com" required>
                                            <label for="floatingInput">₱</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" value="" name="pquantity" class="form-control upquantity" id="floatingInput" placeholder="name@example.com" required>
                                            <label for="floatingInput">Plant quantity</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="pfile">Plant Image</label>
                                        <input type="file" name="fileToUpload" class="form-control upimage" required>
                                        <input type="file" name="fileToUpload2" class="form-control upimage2" required>
                                        <input type="file" name="fileToUpload3" class="form-control upimage3" required>
                                    </div>
                                </div>
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control updesc" name="desc" value="" placeholder="Leave a comment here" id="floatingTextarea" required></textarea>
                                            <label for="floatingTextarea">Plant Description</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <select name="status" id="status" class="form-control">
                                            <option value="" selected hidden>Select</option>
                                            <option value="1">Standard Product</option>
                                            <option value="2">Best Seller Product</option>
                                        </select>
                                    </div>
                                </div>
                            </div> -->

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script src="../assets/css/sweetalert.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/services/axios.js"></script>
    <script src="../assets/services/vue.3.js"></script>
    <script src="../assets/services/inventory_1.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</body>

</html>