const { createApp } = Vue;
createApp({
    data(){
        return{
            image : '',
            shop_name: '',
            name: '',
            permanent_add : '',
            productLength : '',
            allcarts: 0,
            wishlistLength:0,
            sellers: [],
            sn: [],
            products: [],
            wishlistLength: 0,
            allcarts: 0,
            rating:0,
            stores_id:0,
        }
    },
    methods: {
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
        displayINFO:function(){
            const vue = this;
            var data = new FormData();
            data.append("method","displayINFO");
            axios.post('../includes/router.php',data)
            .then(function(r){
                vue.sellers = [];
                for(var v of r.data){
                    vue.sellers.push({
                        image : v.image,
                        name : v.name,
                        shop_name : v.shop_name,
                        email: v.email,
                        permanent_add : v.permanent_add,
                    })
                }
            })
        },
        displayName:function(){
            const vue = this;
            var data = new FormData();
            data.append("method","displayINFO");
            axios.post('../includes/router.php',data)
            .then(function(r){
                vue.sn = [];
                for(var v of r.data){
                    vue.sn.push({
                        name : v.name,
                        permanent_add : v.permanent_add
                    })
                }
            })
        },
        displayProdUsers:function(){
            const vue = this;
            var data = new FormData();
            data.append("method","displayAllinve");
            axios.post('../includes/router.php',data)
            .then(function(r) {
                vue.products = [];
                for (var v of r.data) {
                    vue.products.push({
                        product_ID : v.product_ID,
                        image : v.product_image,
                        name: v.product_name,
                        price: v.product_price,
                        qty: v.product_qty,
                        des: v.product_des,
                    })
                }
                vue.productLength = r.data.length;
                return vue.productLength;
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
                        vue.carts.push({
                            p_name: v.product_name,
                            p_price: v.product_price,
                            p_quantity: v.quantity,
                            p_totalPrice: v.totalPrice,
                            id: v.cart_id,
                            stats: v.status
                        });
                    }
                    vue.allcarts = r.data.length;
                    return vue.allcarts;
                });
        }, 
    },
    created:function(){
        this.displayINFO();
        this.displayProdUsers();
        this.displayName();
        this.dipslayWishlist();
        this.displayCart();
    }
}).mount('#sp')