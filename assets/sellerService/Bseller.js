const { createApp } = Vue;
createApp({
    data(){
        return{
            shop_name: '',
            permanent_add: '',
            queryType: '',
            selectType : '',
            shopName : '',
            sellerName : '',
            orderNo : '',
            yourName : '',
            email : '',
            phoneNo : '',
            comments :'',
            carts:[],
            allcarts: 0,
            wishlist: [],
            wishlistLength:0,
        }
    },
    methods:{
        becomeSeller:function(){
            const vue = this;
            var data = new FormData();
            data.append("method","becomeS");
            data.append("shop_name", this.shop_name);
            data.append("permanent_add", this.permanent_add);
            const qr_image = this.$refs.qr_image.files[0];
            data.append("qr_image", qr_image);
            axios.post('../includes/router.php',data)
            .then(function(r){
                console.log(r.data)
                Swal.fire({
                    icon: 'success',
                    title: 'CONGRATS YOUR NOW A SELLER YOU NEED TO LOG OUT FIRST TO START YOUR NEW JOURNEY',
                    showConfirmButton: false,
                    timer: 1500
                })
            })
        },
        reports: function () {
            const vue = this;
            var data = new FormData();
        
            // Append form data to the FormData object
            data.append("method", "reports");
            data.append("queryType", this.queryType);
            data.append("selectType", this.selectType);
            data.append("shopName", this.shopName);
            data.append("sellerName", this.sellerName);
            data.append("orderNo", this.orderNo);
            data.append("yourName", this.yourName);
            data.append("email", this.email);
            data.append("phoneNo", this.phoneNo);
            data.append("comments", this.comments);
            
            // Handle file input if needed
            const image = this.$refs.image.files[0];
            if (image) {
                data.append("image", image);
            }
            axios.post('../includes/router.php', data)
            .then(function(r){
                console.log(r.data)
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully Submitted',
                    showConfirmButton: false,
                    timer: 1500
                })
            })
        },
        displayCart: function () {
            const vue = this;
            var data = new FormData();
            data.append("method", "DisplayCart");
            axios.post('../includes/router.php', data)
                .then(function (r) {
                    vue.carts = [];
                    // vue.allcarts = r.data.length;
                    for (var v of r.data) {
                        vue.qrCoding = v.qr_image;
                        vue.usid = v.userID;
                        vue.ids.push(v.cart_id);
                        vue.carts.push({
                            product_image : v.product_image,
                            p_name: v.product_name,
                            p_price: v.product_price,
                            p_quantity: v.quantity,
                            p_totalPrice: v.totalPrice,
                            id: v.cart_id,
                            stats: v.status
                        })
                    }
                    vue.cartlistLength = r.data.length;
                    //  Move this line up to be executed
                    return vue.cartlistLength;
                });
        },
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
    },
    created:function(){
        this.displayCart();
        this.dipslayWishlist();
    }
}).mount('#Bseller')