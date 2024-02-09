<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location: ./index.php');
    $role = $_SESSION['role'];
    if ($role == 1) {
        header('location: /FloraFusion/Customer/cus_info.php');
    } else if ($role == 2) {
        header('location: /FloraFusion/seller/index.php');
    } else {
        echo "You Need To logged in!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../FloraFusionMarket/assets/css/bootstrap.css">
    <link rel="stylesheet" href="../FloraFusionMarket/assets/css/tailwind.css">
    <title>Reviews</title>
</head>

<body class="bg-gray-100">
    <div id="userinfo">
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <div class="flex items-center">
                    <img src="../FloraFusion/assets/img/FloraFusion.jpg" class="h-8 mr-3" alt="Plant Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FloraFusion
                        Market</span>
                </div>
            </div>
        </nav>


        <div class="flex justify-center items-center min-h-screen bg-gray-100">
            <div class="bg-gray-200 p-8 rounded shadow-md w-full max-w-md">
                <h1>
                    Before proceeding, please fill up your information below.
                </h1>
                <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
                    <h1 class="text-2xl font-semibold mb-4">Customer Details</h1>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="profileImage">
                            Profile Image
                        </label>
                        <input type="file" id="file" name="file">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="currentAddress">
                            Current Address
                        </label>
                        <input class="border rounded w-full py-2 px-3" id="currentAddress" type="text"
                            placeholder="Enter your current address">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="permanentAddress">
                            Permanent Address
                        </label>
                        <input class="border rounded w-full py-2 px-3" id="permanentAddress" type="text"
                            placeholder="Enter your permanent address">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="contactNo">
                            Contact No.
                        </label>
                        <input class="border rounded w-full py-2 px-3" id="contactNo" type="text"
                            placeholder="Enter your contact number">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Gender</label>
                        <div class="mt-2">
                            <select id="gender">
                                <option value="1">Male</option>
                                <option value="2">Famale</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="birthday">
                            Birthday
                        </label>
                        <input class="border rounded w-full py-2 px-3" id="birthday" type="date" name="birthday">
                    </div>
                    <div class="mt-6">
                        <button @click="CSInfo" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none">Proceed</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="assets/drop_down.js"></script> -->
    <script src="assets/services/axios.js"></script>
    <script src="assets/services/vue.3.js"></script>
    <script src="assets/services/userinfo.js"></script>
</body>

</html>