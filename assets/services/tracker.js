const { createApp } = Vue;
createApp({
    data(){
        return{
            carts:[],
            allcarts: 0,
            wishlist: [],
            wishlistLength:0
        }
    },
    methods:{
        dipslayWishlist: function() {
            const vue = this;
            var data = new FormData();
            data.append("method", "dipslayWishlist"); 
            axios.post('../includes/router.php', data)
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
                axios.post('../includes/router.php', data)
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
    },
    created:function(){
        this.dipslayWishlist();
        this.displayCart();
    }
}).mount('#tracker')