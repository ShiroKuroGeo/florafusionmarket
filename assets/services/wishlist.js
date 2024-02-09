const { createApp } = Vue;
createApp({
    data(){
        return{
            product_name: '',
            product_price: '',
            product_image: '',
            id: 0,
            product_ID: 0,
            wishlist: [],
            carts:[],
            allcarts: 0,
            wishlistLength:0,
        }
    },
    methods:{
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
                            product_ID :v.product_ID,
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
                    vue.calculateTotalPrice(); // Move this line up to be executed
                    return vue.cartlistLength;
                });
        }, 
        deleteWishlist:function(id){
            const vue = this;
            var data = new FormData();
            data.append("method","deleteWishlist");
            data.append("id",id);
            axios.post('../includes/router.php',data)
            .then(function (r) {
                if (r.data == 200) {
                    vue.displayCart();
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted to Wishlist',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    .then(function() {
                        window.location.reload();
                    });
                }
            })
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
    },
    created:function(){
        this.dipslayWishlist();
        this.displayCart();
    }
}).mount('#wishlist')