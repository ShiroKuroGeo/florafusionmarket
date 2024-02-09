const { createApp } = Vue;
createApp({
    data(){
        return{
            purchase: [],
            id: 0,
            rating : '',
            reviewText : '',
            carts:[],
            allcarts: 0,
            wishlist: [],
            wishlistLength:0,
            
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
                        // vue.calculateTotalPrice(); // Move this line up to be executed
                        return vue.cartlistLength;
                    });
            }, 
               displayPurchace:function(){
            const vue = this;
            var data = new FormData();
            data.append("method","displayPurchace");
            axios.post('../includes/router.php',data)
            .then(function(r){
                vue.purchase = [];
                for(const v of r.data){
                    console.log(r.data)
                    vue.purchase.push({
                        order_id : v.id,
                        image:v.product_image,
                        name:v.product_name,
                        order_date : v.created_date,
                        paymethod : v.paymethod,
                        amount : v.amount,
                        status : v.status,

                    })
                }
            })
        },
        // displayPurchace:function(){
        //     const vue = this;
        //     var data = new FormData();
        //     data.append("method","displayPurchace");
        //     axios.post('../includes/router.php',data)
        //     .then(function(r){
        //         vue.purchase = [];
        //         for(const v of r.data){
        //             console.log(r.data)
        //             vue.purchase.push({
        //                 order_id : v.id,
        //                 date : v.date,
        //                 paymethod : v.paymethod,
        //                 amount : v.amount,
        //                 status : v.status,

        //             })
        //         }
        //     })
        // },
        histoDelete:function(){
            const vue = this;
            var data = new FormData();
            data.append("method","DeleteHISTO");
            data.append("id",vue.id);
            axios.post('../includes/router.php',data)
            .then(function (r) {
                console.log("response",r.data);
                if (r.data == 200) {
                    toastr.success('Succsessfully Deleted');
                }else{
                    toastr.error('fail to Delete!');
                }
            })
        },
        // getOrder:function(id){
        //     const vue = this;
        //     var data = new FormData();
        //     data.append("method","getOrder");
        //     data.append("id",id);
        //     axios.post('../includes/router.php',data)
        //     .then(function(r){
        //         console.log(r.data);
        //         for(const v of r.data){
        //             vue.purchase.push({
        //                 order_id : v.order_id,
        //                 product_id : v.product_id,
        //             })
        //         }
        //     })
        // },
        addReview:function(e){
            e.preventDefault();
            const vue = this;
            var data = new FormData(e.currentTarget);
            data.append("method","addReviews");
            data.append("rating",vue.rating);
            data.append("reviewText",vue.reviewText);
            axios.post('../includes/router.php',data)
            .then(function(r){
                if(r.data == 200){
                    toastr.success('massage inserted');
                }else{
                    toastr.error('fail to insert massage!');
                }
            })
        }
    },
    created:function(){
        this.displayPurchace();
        this.dipslayWishlist();
        this.displayCart();
    }
}).mount('#purchase')