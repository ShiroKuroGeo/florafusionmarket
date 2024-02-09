const { createApp } = Vue;
createApp({
    data(){
        return{
            queryType: '',
            selectType: '',
            shopname: '',
            sellername: '',
            orderNo: '',
            comment: '',
            name: '',
            image: '',
            image2: '',
            image3: '',
            userImage : '',
            price: '',
            desc: '',
            fullname: '',
            rating : '',
            revImage : '',
            comment : '',
            revs: [],
            carts:[],
            allcarts: 0,
            wishlist: [],
            wishlistLength:0,
            product: [],
            products : [],
            product_ID: 0,
            search: '',
            shop_name:'',
            id:0,
        }
    },
    methods:{
        dipslayWishlist: function() {
            const vue = this;
            var data = new FormData();
            data.append("method", "dipslayWishlist"); 
            axios.post('/FloraFusionMarket/includes/router.php', data)
                .then(function(r) {
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
        GetProductFromIndex:function(){
            const vue = this;
            var data = new FormData();
            data.append("method", "getAllProductFromIndex");
            axios.post('/FloraFusionMarket/includes/router.php', data)
            .then(function(r){
                vue.products = [];
                for(const v of r.data){
                    vue.products.push({
                        id:v.userID,
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
        fnGetDataProducts: function(product_ID) {
            const vue = this;
            var data = new FormData();
            data.append("method", "getProductById");
            data.append("product_ID", product_ID);
            axios.post('/FloraFusionMarket/includes/router.php', data)
            .then(function(response) {
                console.log(response);
                if (response.data.length > 0) {
                  var product = response.data[0];
                  vue.name = product.product_name;
                  vue.desc = product.product_des; 
                  vue.price = product.product_price;
                  vue.product_ID = product.product_ID;
                  vue.image = '/FloraFusionMarket/assets/img/' + product.product_image;
                  vue.image2 = '/FloraFusionMarket/assets/img/' + product.product_image2;
                  vue.image3 = '/FloraFusionMarket/assets/img/' + product.product_image3;
                  vue.userImage = '/FloraFusionMarket/assets/img/' + product.image;
                  vue.shop_name = product.shop_name !== '0' ? product.shop_name : 'Unknown Seller';
                  vue.userID = product.userID;
               
                } else {
                  console.error('No data returned from the server.');
                }
              })
            
        },
        displayCart: function () {
            const vue = this;
            var data = new FormData();
            data.append("method", "DisplayCart");
            axios.post('/FloraFusionMarket/includes/router.php', data)
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
                    vue.calculateTotalPrice(); // Move this line up to be executed
                    return vue.cartlistLength;
                });
        }, 
        calculateTotalPrice: function () {
            const totalCartPrice = this.carts.reduce((total, item) => total + item.p_totalPrice, 0);
            const t = document.getElementById('f');
            t.textContent = totalCartPrice;
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
        handleImageClick(productID) {
            this.fnGetDataProducts(productID);
            this.getDataProductReview(productID);
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
                    vue.getDataProductReview();
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
        handleFileChange(event) {
            this.image = event.target.files[0];
          },
          addReport:function() {
            const data = new FormData();
            data.append("method", "AddReport");
            data.append("queryType", this.queryType);
            data.append("selectType", this.selectType);
            data.append("shopname", this.shopname);
            data.append("sellername", this.sellername);
            data.append("orderNo", this.orderNo);
            data.append("comment", this.comment);
      
            if (this.image) {
              data.append("image", this.image);
            }
      
            axios.post('/FloraFusionMarket/includes/router.php', data)
              .then((response) => {
                if (response.data === 1) {
                  alert("Reported");
                  setTimeout(() => {
                    window.location.reload();
                  }, 2000);
                } else {
                  alert("Report submission failed");
                }
              })
              .catch((error) => {
                console.error("Error:", error);
                alert("An error occurred while reporting");
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
    computed:{
        searchData(){
            if(!this.search){
                return this.products;
            }
            return this.products.filter(product => product.name.toLowerCase().includes(this.search.toLowerCase()) );
        }
    },
    created:function(){
        this.dipslayWishlist();
        this.GetProductFromIndex();
        this.productReview();
        this.displayCart();
    }
}).mount('#product')