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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/tailwind.css">
  <link rel="stylesheet" href="../assets/css/sweetalert.css">
  <link rel="stylesheet" href="../assets/css/modal.css">
  <link rel="stylesheet" href="../assets/css/css.css">
  <link rel="stylesheet" href="../assets/css/floating.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <title>Home</title>
</head>

<body>
  <div id="CusIndex">
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto relative">
        <div class="flex items-center">
          <img src="../assets/img/FloraFusion.jpg" class="h-8 mr-3" alt="Plant Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FloraFusion Market</span>
        </div>
        <div class="flex items-center md:order-2">
          <ul class="flex" style="margin: 0;padding: 0;list-style: none;display: flex;">
            <li>
              <a href="wishlist.php" class="text-gray">
                <i class="fas fa-heart"></i>
                <span class="text-sm text-gray-600 font-normal" v-if="wishlistLength > 0">{{wishlistLength}}</span>
              </a>
            </li>
            <li>
              <a href="mycart.php" class="text-gray ">
                <i class="fas fa-shopping-cart"></i>
                <span class="text-sm text-gray-600 font-normal" v-if="allcarts > 0">{{allcarts}}</span>
              </a>
            </li>
            <!-- Profile Dropdown Trigger -->
            <li style="margin-right: 15px;">
              <button id="profile-menu-button"><img
                  src="<?php echo isset($_SESSION['image']) ? '../assets/img/'.$_SESSION['image'] : ''; ?>"
                  alt="default" style="height:35px;width:35px;border-radius: 40px;"></i></button>
            </li>
          </ul>
        </div>
        <!-- Profile Dropdown -->
        <ul id="profile-menu"
          class="absolute mt-3 top-10 right-0 hidden bg-white text-gray-800 shadow-md rounded-lg w-48 space-y-2 py-2">
          <li><a href="tracker.php"><i class="mr-2 text-blue-500 fas fa-map-marker-alt ml-5"></i>Order Tracker</a></li>
          <li><a href="his_purchase.php"><i class="mr-2 text-green-500 fas fa-shopping-cart ml-5"></i>Purchase
              History</a></li>
          <li><a href="become_seller.php"><i class="mr-2 text-purple-500 fas fa-store ml-5"></i>Become a Seller</a></li>
          <li><a href="upd_profile.php"><i class="mr-2 text-purple-500 fas fa-user-edit ml-5"></i>Update Profile</a>
          </li>
          <li><a href="help_center.php"><i class="mr-2 text-purple-500 fas fa-question-circle ml-5"></i>Help Center</a></li>

          <li><a href="../includes/logout.php"><i class="mr-2 text-gray-500 fas fa-sign-out-alt ml-5"></i>Logout</a>
          </li>
        </ul>
        <!-- End Profile Dropdown -->
        <div class="items-center justify-between hidden md:flex md:w-auto md:order-1" id="mobile-menu-2">
          <ul
            class="flex flex-col font-medium md:p-0  md:flex-row md:space-x-8 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700"
            style="margin: 0;padding: 0;list-style: none;display: flex;">
            <li style="margin-right: 15px;">
              <a href="index.php"
                class="block py-2 pl-3 pr-4 text-gray-900 font-bold transition duration-300 ease-in-out transform hover:bg-gray-100 hover:text-gray-600 rounded md:hover:bg-transparent md:p-0 dark:text-white md:dark:hover:text-gray-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                style="text-decoration: none;color: #333;font-weight: bold;transition: color 0.3s ease;">Home</a>
            </li>
            <li style="margin-right: 15px;">
              <a href="products.php"
                class="block py-2 pl-3 pr-4 text-gray-900 font-bold transition duration-300 ease-in-out transform hover:bg-gray-100 hover:text-gray-600 rounded md:hover:bg-transparent md:p-0 dark:text-white md:dark:hover:text-gray-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                style="text-decoration: none;color: #333;font-weight: bold;transition: color 0.3s ease;">Plants</a>
            </li>
          </ul>
        </div>

      </div>
    </nav>

    <!-- section1 -->
    <section id="section1" class="bg-green-600 py-8 bg-cover bg-center h-screen flex items-center justify-center">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-10">
      <div class="mt-10 ml-6">
        <h2 class="text-4xl font-bold text-center text-white mt-10">FloraFusion Market</h2>
        <p class="text-white text-center mt-10 ml-6 mr-6">
          Welcome to our plant online marketplace, where nature's wonders are just a click away.
          Embark on a botanical adventure, transform your living spaces into tranquil havens,
          and revel in the beauty and serenity that plants effortlessly bestow. Let the
          enchantment begin!
        </p>
        <div class="flex justify-center mt-10">
          <button class="text-white bg-green-800 hover:bg-green-900 focus:ring-4 mb-10 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover-bg-blue-700 dark:focus:ring-blue-800">
            <i class="fas fa-shopping-cart w-5 h-5 mr-2 -ml-1"></i>
            <a id="OpenButton" href="products.php" onclick="toggleModal('pleaseLoginModal', 'loginModal')" class="no-underline text-white">Shop now</a>
          </button>
        </div>
      </div>

      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="width:80%">
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img src="../assets/img/Cactus.jpg" style="width:100%">
    </div>
    <div class="carousel-item">
    <img src="../assets/img/Chrysanthemum.jpg" style="width:100%">
    </div>
    <div class="carousel-item">
    <img src="../assets/img/Dracaena1.jpg" style="width:100%">
    </div>
    <div class="carousel-item">
    <img src="../assets/img/Jasmine1.jpg" style="width:100%">
    </div>
    <div class="carousel-item">
    <img src="../assets/img/Lavender1.jpg" style="width:100%">
    </div>
    <div class="carousel-item">
    <img src="../assets/img/Orchids2.jpg" style="width:100%">
    </div>
    <div class="carousel-item">
    <img src="../assets/img/Philodendron1.jpg" style="width:100%">
    </div>
    <div class="carousel-item">
    <img src="../assets/img/Rosemary2.jpg" style="width:100%">
    </div>
    <div class="carousel-item">
    <img src="../assets/img/Spider Plant1.jpg" style="width:100%">
    </div>
    <div class="carousel-item">
    <img src="../assets/img/Sun Flower.jpg" style="width:100%">
    </div>
    <div class="carousel-item">
    <img src="../assets/img/Venus Flytrap1.jpg" style="width:100%">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

      </div>
    </section>

    <!-- section 2-->
    <div id="CusIndex">
      <div class="bg-gray-100 py-8 bg-cover bg-center">
        <section id="section2" class="bg-cover bg-center flex items-center justify-center mt-8">
          <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-4 text-center">Featured Plants</h2>
            <div class="max-w-5xl mx-auto p-4 mb-20">
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                <div class="p-2 w-64 m-2" v-for="product in products" :key="(product.product_ID)">
                  <div class="bg-white rounded-lg shadow-md relative">
                  <img @click="handleImageClick(product.product_ID)" data-bs-toggle="modal" data-bs-target="#View" :src="'../assets/img/' + product.image"alt="plant" class="w-full h-36 object-cover cursor-pointer"/>
                    <div class="p-3 text-center">
                      <h3 class="text-lg font-semibold mb-2">{{ product.name }}</h3>
                      <p class="text-gray-600">{{ product.des }}</p>
                      <div class="mt-2">
                        <span class="text-blue-500 font-semibold">P{{ product.price }}</span>
                      </div>
                      <div class="mt-2">
                        <span v-if="product.qty > 0" class="text-blue-500 font-semibold">Stocks: {{ product.qty }}</span>
                        <span v-else class="text-red-500 font-semibold">Sold out</span>
                      </div>
                      <div class="mt-3 flex justify-center">
                        <button class="text-gray-500 hover:text-red-500" @click="addToWishlist(product.product_ID)">
                          <i class="fas fa-heart"></i>
                        </button>
                        <button class="text-gray-500 hover:text-green-600 ml-2" v-if="product.qty > 0" @click="addToCart(product.product_ID)">
                          <i class="fas fa-cart-plus"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- Modal for view Plant -->
        <div class="modal fade mt-10 overflow-y-auto" id="View" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4 relative">
              <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800" onclick="closeModal('View')">
                <i class="fas fa-times"></i>
              </button>
              <!-- Seller Profile -->
              <div class="flex gap-2 pt-2 pb-3">
              <a @click="getSellerID(userID)" href="seller_profile.php" class="flex items-center text-dark text-decoration-none px-2 ">
                  <img :src="userImage" alt="Shop Profile Image" class="rounded-full h-10 w-10 object-cover">
                  <h5 class="modal-title text-2xl font-semibold text-black-500">  {{ shop_name }}</h5>
              </a>
          </div>

              <form>
                <!-- Carousel -->
                <div id="demo" class="carousel slide" data-bs-ride="carousel">

                  <!-- Indicators/dots -->
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                  </div>

                  <!-- The slideshow/carousel -->
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img :src="image" alt="Los Angeles" class="d-block" style="width:100%">
                    </div>
                    <div class="carousel-item">
                      <img :src="image2" alt="Chicago" class="d-block" style="width:100%">
                    </div>
                    <div class="carousel-item">
                      <img :src="image3" alt="New York" class="d-block" style="width:100%">
                    </div>
                  </div>

                  <!-- Left and right controls/icons -->
                  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                  </button>
                </div>

                <div class="table">
                  <div class="table-row">
                    <div class="table-cell">
                      <h2 class="text-2xl font-semibold" name="name" id="name">{{ name }}</h2>
                    </div>
                    <div class="table-cell">
                      <p class="text-lg font-bold text-green-500" name="price" id="price">P{{ price }}</p>
                    </div>
                    <!-- <div class="table-cell">
                      <a href="#" class="text-gray-500 hover:text-red-500" name="wishlist" id="wishlist" @click="WL(product_ID)"><i class="fas fa-heart"></i></button>
                    </div>
                    <div class="table-cell">
                      <a href="#" class="text-gray-500 hover:text-green-600 ml-2" @click="addToCart(product_ID)"><i class="fas fa-cart-plus"></i></a>
                    </div> -->
                  </div>
                </div>
                <div class="modal-body">
                  <p class="my-4" name="desc" id="desc">Description: <br> {{ desc }}</p>
                  <h3 class="text-xl font-semibold my-2">Reviews</h3>
                    <div class="border-t border-gray-300" style="max-height: 400px; overflow-y: auto;">
                      <div v-for="r in revs" class="d-flex flex-row align-items-center mb-4">
                        <img :src="'../assets/img/' + r.revImage" style="height: 35px; width: 35px; border-radius: 50%; margin-right: 10px;">
                        <div class="d-flex flex-column">
                          <p class="text-gray-800 font-semibold">{{ r.revFullname }}</p>
                          <p class="text-gray-600">{{ r.comment }}</p>
                          <input type="hidden" name="seller_id" id="seller_id" :value="r.seller">
                         
                        </div>
                      </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Message:</label>
                            <textarea name="reviewText" id="message" v-model="reviewText" class="w-full h-24 p-2 border rounded-lg"></textarea>
                            <button @click="addReview" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Type Message</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>




           <!-- section 3 -->
           <section id="section3" class="bg-white py-8 bg-cover bg-center flex items-center justify-center relative mt-8 mb-20">
        <div class="container mx-auto px-4">
          <h2 class="text-3xl font-bold mb-4 text-center">Best Selling Stores</h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <div class="bg-white shadow rounded-lg p-4 flex items-center mt-12"  v-for="v in votings">
              <!-- Seller Profile -->
              <div class="mr-4">
                <img :src="'../assets/img/'+v.sellerImage" alt="Seller Profile" class="w-12 h-12 rounded-full">
              </div>
              <!-- Seller Information -->
              <div>
                <!-- Seller Store Name -->
                <h3 class="text-xl font-semibold mb-2">{{v.shop_name}}</h3>
                <!-- Seller Address -->
                <p class="text-gray-700 mb-2">{{v.janah}}</p>
                <p class="text-gray-700 mb-2">{{v.sellerAddress}}</p>
                <!-- Seller Ratings -->
                <div class="flex items-center">
                  <div class="star-rating text-yellow-500">
                  <template v-for="i in 5">
                  <span v-if="i * 5 <= v.rating">&#9733;</span>
                    <span v-else>&#9734;</span>
                </template>
                  </div>
                  <div class="ml-1 text-gray-700">{{v.rating}} rating </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>


<!-- Floating chat icon -->
<div id="chat-icon" class="shadow-lg">
    <a href="../chat/chat.php">
        <i class="fas fa-comment-dots fa-3x"></i>
    </a>
</div>



  <script src="../assets/services/vue.3.js"></script>
  <script src="../assets/services/axios.js"></script>
  <script src="../assets/services/CusIndex.js"></script>
  <script src="../assets/css/bootstrap.js"></script>
  <script src="../assets/productsmodal.js"></script>
  <script src="../assets/drop_down.js"></script>
  <script src="../assets/css/sweetalert.js"></script>
  <script src="../assets/css/toastr.js"></script>
  <!-- <script src="../assets/services/product.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</body>

</html>