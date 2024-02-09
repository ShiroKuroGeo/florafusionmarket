const { createApp } = Vue;
createApp({
    data() {
        return {
            p_name: '',
            p_price: '',
            p_quantity: '',
            p_totalPrice: '',
            qrCoding: '',
            selectedqrCoding: '',
            pimage: '',
            image: 0,
            idOfCart: 0,
            ids: [],
            shopCartsMap: {},
            inte: 1,
            c: [],
            shopname: [],
            carts: [],
            wishlist: [],
            cartlistLength: 0,
            wishlistLength: 0,
            id: 0,
            order_id: 0,
            paymentMethodModel: '',
            proofPayment: '',
            checkOUt: [],
            cartData: [],
            // selectedCartItemId: null,
        }
    },
    methods: {
        decrement(item) {
            if (item.p_quantity > 1) {
                item.p_quantity--;
                this.updateTotalPrice(item);
            }
        },
        increment(item) {
            item.p_quantity++;
            this.updateTotalPrice(item);
        },
        updateTotalPrice(item) {
            const data = new FormData();
            const vue = this;

            data.append("method", "updateCartIdPrice");
            data.append("quantity", item.p_quantity); // Use item.p_quantity instead of cartItem.quantity
            data.append("cart_id", item.id); // Use item.id instead of cartItem.cart_id

            axios.post('/florafusionmarket/includes/router.php', data)
                .then(function (r) {
                    if (r.data === 1) {
                        vue.displayCart();
                    }
                })
                .catch(function (error) {
                    console.error(error);
                });

            item.p_totalPrice = item.p_price * item.p_quantity;
            this.calculateTotalPrice();
        },
        handleFileChange(event) {
            this.image = event.target.files[0];
        },
        displayCart: function () {
            const vue = this;
            var data = new FormData();
            data.append("method", "DisplayCart");

            axios.post('/florafusionmarket/includes/router.php', data)
                .then(function (r) {
                    // Initialize vue.carts, vue.shopname, and vue.ids arrays
                    vue.carts = [];
                    vue.shopname = [];
                    vue.ids = [];

                    // Initialize an object to store IDs grouped by shop name
                    const shopIdsMap = {};

                    for (var v of r.data) {
                        const shopName = v.shop_name;
                        const cartId = v.cart_id;

                        // Group IDs by shop name
                        if (!shopIdsMap.hasOwnProperty(shopName)) {
                            shopIdsMap[shopName] = [cartId];
                        } else {
                            shopIdsMap[shopName].push(cartId);
                        }

                        // Push cart details to vue.carts array
                        vue.carts.push({
                            pimage: v.product_image,
                            p_name: v.product_name,
                            p_price: v.product_price,
                            shop_name: shopName,
                            p_quantity: v.quantity,
                            p_totalPrice: v.totalPrice,
                            id: cartId,
                            stats: v.status
                        });
                    }
                    
                    for (const [shopName, ids] of Object.entries(shopIdsMap)) {
                        vue.shopname.push({
                            shop_name: shopName,
                            ids: ids.map(id => ({ id }))
                        });
                    }

                    vue.calculateTotalPrice();
                    console.log("Cart data successfully retrieved:", vue.carts);
                    console.log("Shop names:", vue.shopname);
                })
                .catch(function (error) {
                    console.error("Error fetching cart data:", error);
                });
        },
        // displayCart: function () {
        //     const vue = this;
        //     var data = new FormData();
        //     data.append("method", "DisplayCart");
        //     axios.post('/florafusionmarket/includes/router.php', data)
        //         .then(function (r) {
        //             var shopCartsMap = {};

        //             for (var v of vue.shopname) {
        //                 var shopName = v.shop_name;
        //                 if (!shopCartsMap[shopName]) {
        //                     shopCartsMap[shopName] = [];
        //                 }
        //                 for (var cart of vue.carts) {
        //                     if (cart.shop_name === shopName) {
        //                         shopCartsMap[shopName].push(cart);
        //                     }
        //                 }
        //             }
        //             // vue.carts = [];
        //             // vue.shopname = [];

        //             // for (var v of r.data) {
        //             //     vue.qrCoding = v.qr_image;
        //             //     vue.usid = v.userID;
        //             //     vue.ids.push(v.cart_id);
        //             //     vue.shopname.push({
        //             //         shop_name:v.shop_name,
        //             //     })
        //             // }

        //             // for (var v of r.data) {
        //             //     vue.carts.push({
        //             //         pimage: v.product_image,
        //             //         p_name: v.product_name,
        //             //         p_price: v.product_price,
        //             //         shop_name:v.shop_name,
        //             //         p_quantity: v.quantity,
        //             //         p_totalPrice: v.totalPrice,
        //             //         id: v.cart_id,
        //             //         stats: v.status
        //             //     })
        //             // }

        //             vue.cartlistLength = r.data.length;
        //             vue.calculateTotalPrice();
        //             return vue.cartlistLength;
        //         });
        // },
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
        calculateTotalPrice: function () {
            const totalCartPrice = this.carts.reduce((total, item) => total + item.p_totalPrice, 0);
            const t = document.getElementById('f');
            t.textContent = totalCartPrice;
        },
        deleteCart: function (id) {
            const vue = this;
            var data = new FormData();
            data.append("method", "DeleteCart");
            data.append("id", id);

            axios.post('/florafusionmarket/includes/router.php', data)
                .then(function (r) {
                    if (r.data == 200) {
                        vue.displayCart();
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted to Cart',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                })
        },
        paymethod: function () {
            const vue = this;
            var data = new FormData();
            data.append("method", "payMethod");
            data.append("id", this.selectedCartItemId);
            data.append("paymethod", vue.paymentMethodModel);
            data.append("image", vue.image);
            axios.post('../includes/router.php', data)
                .then(function (r) {
                    if (r.data == 200) {
                        vue.displayCart();
                        console.log(r.data);
                        toastr.success('Successfully paid');
                        //   window.location.reload();
                    } else {
                        toastr.error('Failed to pay!');
                        console.log(r.data);
                    }
                })
                .catch(function (error) {
                    console.error('Error uploading file: ', error);
                });
        },
        checkout: function (id) {
            for(var v = 0; v < id.length; v++){

                const vue = this;
                var data = new FormData();
                data.append("method", "selectID");
                data.append("id", id[v].id);
                axios.post('../includes/router.php', data)
                    .then(function (r) {
                        vue.cartData.push(r.data);
                        for (var v of r.data) {
                            vue.selectedqrCoding = v.qr_image;
                            vue.idOfCart = v.cart_id;
                        }
                    })
            }
        },
        handleFileProofImg: function (event) {
            this.proofPayment = event.target.files[0];
        },
        processPlaceOrder: function () {
            // alert();
            for(var i = 0; i < this.cartData.length; i++){
                const vue = this;
                var data = new FormData();
                data.append("method", "placeOrder");
                data.append("paymethod", vue.paymentMethodModel);
                data.append("image", vue.proofPayment);
                data.append("cartData", JSON.stringify(this.cartData[i]));
    
                axios.post('../includes/router.php', data)
                    .then(function (r) {
                        console.log(r.data);
    
                        var orderDetailsModal = document.getElementById('order-details-modal');
    
                        if (orderDetailsModal) {
                            orderDetailsModal.style.display = 'none';
                        }
    
                        window.location.reload();
    
                        alert(r.data);
                    })
            }

        },

        //   checkout:function(id) {
        //     const vue = this;
        //     var data = new FormData();
        //     data.append("method", "itemCheckOut");
        //     data.append("id",id);
        //     axios.post('../includes/router.php', data)
        //     .then(function (r) {
        //     console.log(r.data);
        //     })
        //     .catch(function (error) {
        //     console.error('Error: ', error);
        //     });
        //   },
        //   getID(id) {
        //     this.selectedCartItemId = id;
        //   },
    },
    created: function () {
        this.displayCart();
        // this.checkout();
        this.dipslayWishlist();
    }
}).mount('#cart')