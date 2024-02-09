const { createApp } = Vue;
createApp({
    data() {
        return {
            name: '',
            image: '',
            image2: '',
            image3: '',
            price: '',
            desc: '',
            userImage: '',
            sellerImage:'',
            fullname: '',
            rating: '',
            comment: '',
            revs: [],
            carts: [],
            allcarts: 0,
            wishlist: [],
            wishlistLength: 0,
            reviews: [],
            votings: [],
            products: [],
            product_ID: 0,
            id: 0,
            prod_id: 0,
            shop_name: '',
            revImage: '',
            revFullname: '',
            reviewText:'',
            seller_id: 0,
        }
    },
    methods: {
        dipslayWishlist: function () {
            const vue = this;
            var data = new FormData();
            data.append("method", "dipslayWishlist");
            axios.post('/florafusionmarket/includes/router.php', data)
            .then(function (r) {
                vue.wishlist = [];
                for (var v of r.data) {
                    vue.wishlist.push({
                        product_name: v.product_name,
                        product_price: v.product_price,
                        product_image: v.product_image,
                        id: v.wishlist_id,
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
                // vue.calculateTotalPrice(); // Move this line up to be executed
                return vue.cartlistLength;
            });
        },
        indexReview: function () {
            const vue = this;
            var data = new FormData();
            data.append("method", "displayReview");
            axios.post('../includes/router.php', data)
            .then(function (r) {
                vue.reviews = [];
                for (const v of r.data) {
                    vue.reviews.push({
                        userImage: v.userImage,
                        shop_name: v.shop_name,
                        rating: v.rating_count,
                        permanent_add: v.permanent_add,
                    })
                }
            })
        },
        displayBestStore: function () {
            const vue = this;
            var data = new FormData();
            data.append("method", "displayBestStore");
            axios.post('../includes/router.php', data)
            .then(function (r) {
                console.log(r.data);
                vue.votings = [];
                for (const v of r.data) {
                    vue.votings.push({
                        id: v.store_id,
                        sellerImage: v.sellerImage,
                        shop_name: v.sellerShopname,
                        sellerAddress:v.sellerAddress,
                        rating: v.totalRating,
                        janah:v.sellerFullname,
                    })
                }
            })
        },
        // indexReview: function () {
        //     const vue = this;
        //     var data = new FormData();
        //     data.append("method", "displayReview");
        //     data.append("productid", vue.product_ID);
        //     axios.post('../includes/router.php', data)
        //     .then(function (r) {
        //         vue.reviews = [];
        //         for (const v of r.data) {
        //             vue.reviews.push({
        //                 userImage: v.userImage,
        //                 shop_name: v.shop_name,
        //                 rating: v.rating,
        //                 permanent_add: v.permanent_add,
        //                 product_ID: v.p_id // Assuming 'p_id' is the correct property name
        //             })
        //         }
        //     })
        // },
        GetProductFromIndex: function () {
            const vue = this;
            var data = new FormData();
            data.append("method", "getAllProductFromIndex");
            axios.post('/florafusionmarket/includes/router.php', data)
            .then(function (r) {
                vue.products = [];
                for (const v of r.data) {
                    vue.products.push({
                        id: v.userID,
                        product_ID: v.product_ID,
                        image: v.product_image,
                        name: v.product_name,
                        price: v.product_price,
                        status: v.status,
                        qty: v.product_qty,
                        des: v.product_des,
                        data: v.created_date,
                    })
                }
            })
        },
        fnGetDataProducts: function (product_ID) {
            const vue = this;
            var data = new FormData();
            data.append("method", "getProductById");
            data.append("product_ID", product_ID);
            axios.post('/florafusionmarket/includes/router.php', data)
            .then(function (response) {
                console.log(response);  
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
        handleImageClick(productID) {
            this.fnGetDataProducts(productID);
            this.getDataProductReview(productID);
          },
        getDataProductReview: function (product_ID) {
            const vue = this;
            var data = new FormData();
            data.append("method", "getRevBYproductID");
            data.append("product_ID",product_ID); 
            axios.post('../includes/router.php', data)
            .then(function (r) {
                // console.log(r.data)
                // alert(r.data);  
                vue.revs = [];
                for (var v of r.data) {
                    vue.revs.push({
                        seller:v.userID,
                        revImage: v.revImage,
                        revFullname: v.revFullname,
                        comment: v.review_text,
                        product_ID:v.actual_product_id,//
                        customer_id :v.customer_id,
                        review_id: v.review_id,
                        product_id: v.product_id,
                        date_created: v.review_date,
                    })
                }
            })
        },
        addReview: function () {
            const vue =  this;
            const data = new FormData();
            data.append("method", "addReview");
            data.append("review_id", vue.review_id);
            data.append("product_ID", vue.product_ID);
            // Other values from Vue data properties
            data.append('seller_id', vue.seller_id);
            data.append("reviewText", vue.reviewText); 
          
             axios.post('../includes/router.php', data)
              .then((r) => {
                // alert(r.data);
                if (r.data === 200) { // Assuming your server sends '1' on success
                    window.location.reload();
                    // vue.getDataProductReview();
                } else {
                  alert("Review submission failed");
                }
              })
              .catch((error) => {
                console.error("Error:", error);
                alert("An error occurred while adding the review");
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
        WL: function(){
            const vue = this;
            var data = new FormData();
            data.append("method", "wl");
            data.append("product_ID", vue.product_ID)
            axios.post('/florafusionmarket/includes/router.php', data)
            .then(function (r) {
                console.log("product_ID", product_ID);
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
        getSellerID(userID) {
            var data = new FormData();
            data.append("method","getSellerID");
            data.append("userID",userID);

            axios.post('../includes/router.php', data)
            .then(function(response){
                console.log(response);
            })
        },
    },
    created: function () {
        this.indexReview();
        this.GetProductFromIndex();
        this.getDataProductReview();
        this.dipslayWishlist();
        this.displayCart();
        this.displayBestStore();
    }
}).mount('#CusIndex')