const { createApp } = Vue;
createApp({
    data(){
        return {
            image : '',
            image2 : '',
            image3 : '',
            userImage: '',
            shop_name: '',
            name: '',
            price: '',
            desc: '',
            revs:[],
            permanent_add : '',
            productLength : '',
            allcarts: 0,
            wishlistLength:0,
            id : 0,
            sellers: [],
            products: [],
            product_ID: '',
            wishlistLength:0,
            allcarts: 0
        }
    },
    methods : {
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
                        shop_name : v.shop_name,
                        email: v.email,
                        permanent_add : v.permanent_add,
                    })
                }
            })
        },
        fnGetDataProducts: function (product_ID) {
            const vue = this;
            var data = new FormData();
            data.append("method", "sellerProduct");
            data.append("product_ID", product_ID);
            axios.post('/florafusionmarket/includes/router.php', data)
                .then(function (response) {
                    if (response.data && response.data.length > 0) {
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
                    } else {
                        console.error('No data returned from the server.');
                    }
                })
        },        
        displayProdUsers() {
            const vue = this;
            var data = new FormData();
            data.append("method", "displayAllinve");
            axios.post('../includes/router.php', data)
              .then(function (response) {
                vue.products = response.data.map(v => ({
                  product_ID: v.product_ID,
                  image: v.product_image,
                  name: v.product_name,
                  price: v.product_price,
                  qty: v.product_qty,
                  des: v.product_des,
                }));
                vue.productLength = vue.products.length;
                return vue.productLength;
              })
              .catch(function (error) {
                console.error('Error fetching data:', error);
              });
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
                });
        }, 

    },
    created:function(){
        this.displayINFO();
        this.displayProdUsers();
        this.dipslayWishlist();
        this.displayCart();
    }
}).mount('#sellerShop')