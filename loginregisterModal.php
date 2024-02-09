<div class="flex items-center md:order-2" id="CSLoginRegister">
    <!-- Login Button -->
    <button id="loginButton" class="bg-blue-500 text-white rounded-md py-2 px-4 hover:bg-blue-600">Login</button>


    <div id="pleaseLoginModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="modal-container relative w-2/5">
        <div class="modal-content bg-white p-6 rounded-lg shadow-lg relative">
            <button class="absolute right-5 text-gray-600 hover:text-gray-800" onclick="closeModal('pleaseLoginModal')">
                <i class="fas fa-times"></i>
            </button>
            <h6 class="font-semibold mb-4"> Please <a href="#" onclick="toggleModal('loginModal', 'pleaseLoginModal')" class="text-blue-500 hover:text-darkblue-500">Login</a>
 to Continue</h6>
        </div>
    </div>
</div>

   <!-- Modal for Login -->
<div id="loginModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="modal-container relative w-2/5">
        <div class="modal-content bg-white p-6 rounded-lg shadow-lg relative">
            <button class="absolute right-5 text-gray-600 hover:text-gray-800" onclick="closeModal('loginModal')">
                <i class="fas fa-times"></i>
            </button>
            <h2 class="text-2xl font-semibold mb-4">Login</h2>
            <form onsubmit="return login()" @submit="login">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium font-bold text-gray-600">Email</label>
                    <input type="text" id="email" name="email" class="mt-1 p-2 w-full border rounded" placeholder="Enter your Email" required>
                </div>
                <div class="mb-4">
                    <label for="login-password" class="block text-sm font-medium font-bold text-gray-600">Password</label>
                    <input type="password" id="login-password" name="password"
                        class="mt-1 p-2 w-full border rounded" placeholder="Enter your Password" required>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Login</button>
            </form>
            <div class="mt-4 text-sm font-bold text-gray-600" onclick="toggleModal('createAccountModal', 'loginModal')">
                Don't have an account? <a href="#" id="create-account-link"
                    class="text-blue-500 hover:underline">Create one</a>.
            </div>
        </div>
    </div>
</div>


    <!-- Modal for Create Account -->
    <div id="createAccountModal" class="fixed inset-0 flex overflow-y-auto items-center justify-center z-50 hidden">
    <div class="fixed inset-0 flex items-center justify-center z-50 relative">
        <div class="bg-white p-8 rounded shadow-md max-w-screen-sm w-full flex flex-col" id="CSLoginRegister">
    <button class="absolute top-4 right-4 text-gray-600 hover:text-gray-800" onclick="closeModal('createAccountModal')">
        <i class="fas fa-times"></i>
    </button>
            <h2 class="text-2xl font-semibold mb-4">Create Account</h2>
            <form @submit="Register" class="flex flex-wrap">
                <div class="w-1/2 pr-4"> <!-- Right Side -->
                    <div class="mb-4">
                    <label for="account-type" class="block text-sm font-medium font-bold text-gray-600">Account Type</label>
                    <select id="account-type" name="role" class="mt-1 p-2 w-full border rounded" onchange="showImageInput()">
                        <option value="1">Become A Customer</option>
                        <option value="2">Become A Seller</option>
                    </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="profileImage">
                            Profile Image
                        </label>
                        <input type="file" id="file" name="image" required>
                    </div>

                <div id="gcashImageDiv" class="hidden">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="gcashFile">GCash Image</label>
                    <input type="file" id="gcashFile" name="gcash_image" accept="image/*" onchange="displaySellerQRCode()">
                </div>

                    <div class="mb-4">
                    <label for="username" class="block text-sm font-medium font-bold text-gray-600">Name</label>
                    <input type="text" id="username" name="username" class="mt-1 p-2 w-full border rounded" placeholder="Enter your Name" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium font-bold text-gray-600">Email</label>
                    <input type="text" id="email" name="email" class="mt-1 p-2 w-full border rounded" placeholder="Enter your Email" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium font-bold text-gray-600">Password</label>
                    <input type="password" id="password" name="password" class="mt-1 p-2 w-full border rounded" placeholder="Enter your Password" required>
                </div>
                </div>
                <div class="w-1/2 pl-4"> <!-- Left Side -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="currentAddress">
                            Current Address
                        </label>
                        <input class="border rounded w-full py-2 px-3" id="current_add" name="current_add" type="text" placeholder="Enter your current address" required>
                    </div>
                    <div id="shopNameDiv" class="hidden">
                    <label class="block text-sm font-medium font-bold text-gray-600" for="shopName">Shop Name</label>
                    <input type="text" id="shopName" name="shop_name" class="mt-1 p-2 w-full border rounded" placeholder="Enter your Shop Name">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="permanentAddress">
                            Permanent Address
                        </label>
                        <input class="border rounded w-full py-2 px-3" id="permanent_add" name="permanent_add" type="text" placeholder="Enter your permanent address" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="contactNo">
                            Contact No.
                        </label>
                        <input class="border rounded w-full py-2 px-3" id="contact_no" name="contact_no" type="text" placeholder="Enter your contact number" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Gender</label>
                        <div class="mt-2">
                            <select id="gender" name="gender" required>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="birthday">
                            Birthday
                        </label>
                        <input class="border rounded w-full py-2 px-3" id="birthday" type="date" name="birthday" required>
                    </div>
                </div>
                <button type="submit" class="w-full bg-green-500 text-white p-2 rounded hover:bg-green-600 mt-4">Sign Up</button>
            </form>
            
            <div class="mt-4 text-sm text-center font-bold text-gray-600">
                Already have an account? <a href="#" id="login" class="text-blue-500 hover:underline"
                    onclick="toggleModal('loginModal', 'createAccountModal')">Login</a>
            </div>
        </div>
    </div>
</div>


</div>
</div>
</div>

<script>
    function showImageInput() {
        var accountType = document.getElementById("account-type");
        var gcashImageDiv = document.getElementById("gcashImageDiv");
        var shopNameDiv = document.getElementById("shopNameDiv");
        var currentAddressLabel = document.querySelector("label[for='currentAddress']");
        var permanentAddressLabel = document.querySelector("label[for='permanentAddress']");

        if (accountType.value == 2) {
            gcashImageDiv.style.display = "block";
            shopNameDiv.style.display = "block";
            currentAddressLabel.innerText = "Address";
            permanentAddressLabel.innerText = "Shop Address";
        } else {
            gcashImageDiv.style.display = "none";
            shopNameDiv.style.display = "none";
            currentAddressLabel.innerText = "Current Address";
            permanentAddressLabel.innerText = "Permanent Address";
        }
    }

    function displaySellerQRCode() {
        var gcashImageInput = document.getElementById("gcashFile");
        var displayedQRCode = document.getElementById("displayedQRCode");

        displayedQRCode.src = URL.createObjectURL(gcashImageInput.files[0]);
        displayedQRCode.style.display = "block";

        // Add code to update shop name display if needed
    }
</script>



<script src="assets/close_modal.js"></script>
<script src="assets/services/axios.js"></script>
<script src="assets/services/vue.3.js"></script>
<script src="assets/services/CSLogin.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>