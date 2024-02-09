const { createApp } = Vue;
createApp({
    data(){
        return {
            image:'',
            image2:'',
            image3:'',
            name:'',
            permanent_add : '',
            shop_name : '',
            userImage : '',
            price:'',
            desc:'',
            wishlistLength:'',
            allcarts:'',
            revs:[],
            seller : [],
            sellerId:0,
            sellerProducts: [],
            rating:0,
            stores_id:0,
        }
    },
    methods:{
        startVote: function(seller_id) {
            const vue = this;
            var data = new FormData();
            data.append("method", "addVote");
            data.append("stores_id", vue.stores_id);
            data.append("seller_id", seller_id);
            data.append("rating", vue.rating);
        
            axios.post('../includes/router.php', data)
                .then(function (r) {
                    if (r.data === 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Successfully rated!',
                        }).then(function () {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Rating submission failed',
                        });
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while adding the rating',
                    });
                });
        },                   
        setRating(rating) {
            this.rating = rating;
          },
        displaySellerProfile:function() {
            const vue = this;
            var data = new FormData();
            data.append("method","displaySellerProfile");
            axios.post('../includes/router.php', data)
            .then(function(r){
                vue.seller = [];
                vue.seller.push(r.data);

                console.log(r.data);
            })
        },
        dataDisplaySellerProducts:function() {
            const vue = this;
            var data = new FormData();
            data.append("method","dataDisplaySellerProducts");
            axios.post('../includes/router.php', data)
            .then(function(r){
                vue.sellerProducts = [];
                for(const v of r.data){
                    vue.sellerProducts.push({
                        product_ID : v.product_ID,
                        image : v.product_image,
                        name: v.product_name,
                        price: v.product_price,
                        qty: v.product_qty,
                        des: v.product_des,
                        data: v.created_date,
                    })
                }
            })
        },
        fnGetDataProducts: function(product_ID) {
            const vue = this;
            var data = new FormData();
            data.append("method", "getProductById");
            data.append("product_ID", product_ID);
            axios.post('../includes/router.php',data)
            .then(function(response) {
                if (response.data.length > 0) {
                  var product = response.data[0];
                  vue.name = product.product_name;
                  vue.desc = product.product_des; 
                  vue.price = product.product_price;
                  vue.product_ID = product.product_ID;
                  vue.image = '/florafusionmarket/assets/img/' + product.product_image;
                  vue.image2 = '/florafusionmarket/assets/img/' + product.product_image2;
                  vue.image3 = '/florafusionmarket/assets/img/' + product.product_image3;
                  vue.userImage = '/florafusionmarket/assets/img/' + product.image;
                  vue.shop_name = product.shop_name !== '0' ? product.shop_name : 'Unknown Seller';
                  vue.userID = product.userID;
               
                } else {
                  console.error('No data returned from the server.');
                }
              })
            
        },
        productReview:function(){
            const vue = this;
            var data = new FormData();
            data.append("method","getRevBYproductID");
            axios.post('../includes/router.php',data)
            .then(function(r){
                vue.revs = [];
                for(const v of r.data){
                    vue.revs.push({
                        revImage : v.revImage,
                        revFullname : v.revFullname,
                        comment : v.review_text,
                    })
                }
            })
        },
        dipslayWishlist: function() {
            const vue = this;
            var data = new FormData();
            data.append("method", "dipslayWishlist"); 
            axios.post('/florafusionmarket/includes/router.php', data)
                .then(function(r) {
                    vue.wishlist = [];
                    for (var v of r.data) {
                        vue.wishlist.push({
                            product_name: v.product_name,
                            product_price: v.product_price,
                            product_image: v.product_image,
                            id: v.wishlist_id,
                            product_ID:v.product_ID,
                        });
                    }
                    vue.wishlistLength = r.data.length;
                    return vue.wishlistLength;
                });
        }, 
        displayCart: function () {
            const vue = this;
            var data = new FormData();
            data.append("method", "DisplayCart");
            axios.post('/florafusionmarket/includes/router.php', data)
                .then(function (r) {
                    vue.carts = [];
                    vue.allcarts = r.data.length;
                    for (var v of r.data) {
                        vue.qrCoding = v.qr_image;
                        vue.usid = v.userID;
                        vue.ids.push(v.cart_id);
                        vue.carts.push({
                            p_name: v.product_name,
                            p_price: v.product_price,
                            p_quantity: v.quantity,
                            p_totalPrice: v.totalPrice,
                            id: v.cart_id,
                            stats: v.status
                        });
                    }
                    vue.cartlistLength = r.data.length;
                    return vue.cartlistLength;
                });
        },
        addToCart: function (product_ID) {
            const vue = this;
            var data = new FormData();
            data.append("method", "addToCart");
            data.append("product_ID", product_ID);
            
            axios.post('/florafusionmarket/includes/router.php', data)
            .then(function (r) {
                if (r.data === 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Successfully added to Cart',
                        showConfirmButton: false,
                        timer: 3000
                    }).then(function () {
                        window.location.reload();
                    });
                } else if (r.data === 202) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Product is already in the Cart',
                        showConfirmButton: false,
                        timer: 3000
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error adding to Cart',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            })
            .catch(function (error) {
                console.error('Error adding to cart:', error);
            });
        },            
        addToWishlist: function (product_ID) {
            const vue = this;
            var data = new FormData();
            data.append("method", "addToWishlist");
            data.append("product_ID", product_ID)
            axios.post('/florafusionmarket/includes/router.php', data)
            .then(function (r) {
                console.log(r.data);
                if (r.data === 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Successfully added to Wishlist',
                        showConfirmButton: false,
                        timer: 3000
                    }).then(function () {
                        window.location.reload();
                    });
                } else if (r.data === 202) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Product is already in the Wishlist',
                        showConfirmButton: false,
                        timer: 3000
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error adding to Wishlist',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            })
            .catch(function (error) {
                console.error('Error adding to Wishlist:', error);
            });
        },  
        startChat: function(seller_id) {
            const vue = this;
            var data = new FormData();
            data.append("method", "startChat");
            data.append("seller_id", seller_id);
            axios.post('/florafusionmarket/includes/router.php', data)
            .then(function (res) {
                console.log(res.data);

                if (res.data == 'success') {
                    alert('Started a conversation!');
                    window.location.href = "../chat/chat.php"
                } else {
                    alert('Existing Inbox!');
                }
            })
            .catch(function (error) {
                console.error('Error iniating conversation: ', error);
            });
        },
    },
    created:function(){
        this.displaySellerProfile();
        this.dataDisplaySellerProducts();
        this.productReview();
        this.dipslayWishlist();
        this.displayCart();
    }
}).mount('#cs')