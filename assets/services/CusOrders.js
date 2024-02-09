const { createApp } = Vue;
createApp({
    data() {
        return {
            id:0,
            name: '',
            image: '',
            orders:[],
            revs: [],
            carts: [],
            allcarts: 0,
            wishlist: [],
            wishlistLength: 0,
            customerOrders:[],
            order_id:0,
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
        StatusApprove: function (id) {
            const vm = this;
            
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to Approve this Order?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Approve it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const data = new FormData();
                    data.append('method', 'updatestatusOrders');
                    data.append('status', 'status');
                    data.append('id', id);
        
                    axios.post('../includes/router.php', data).then(r => {
                        console.log(r.data);
                        if (r.data.success) {
                            Swal.fire({
                                title: 'Approve',
                                text: r.data.message,
                                icon: 'success',
                                timer: 2000, 
                                showConfirmButton: false
                            });
                            setTimeout(() => {
                                window.location.reload();
                            }, 2000);
                        } else {
                            Swal.fire('Error', r.data.message, 'error');
                        }
                    });
                }
            });
        },  
        StatusPacked: function (id) {
            const vm = this;
            
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to packed this Orders?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, mark as packed!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const data = new FormData();
                    data.append('method', 'updatestatusPacked');
                    data.append('status', 'status');
                    data.append('id', id);
        
                    axios.post('../includes/router.php', data).then(r => {
                        console.log(r.data);
                        if (r.data.success) {
                            Swal.fire({
                                title: 'Packed',
                                text: r.data.message,
                                icon: 'success',
                                timer: 2000, 
                                showConfirmButton: false
                            });
                            setTimeout(() => {
                                window.location.reload();
                            }, 2000);
                        } else {
                            Swal.fire('Error', r.data.message, 'error');
                        }
                    });
                }
            });
        },  
        StatusShipped: function (id) {
            const vm = this;
            
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to Shipped this Orders?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, mark as Shipped!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const data = new FormData();
                    data.append('method', 'updatestatusShipped');
                    data.append('status', 'status');
                    data.append('id', id);
        
                    axios.post('../includes/router.php', data).then(r => {
                        console.log(r.data);
                        if (r.data.success) {
                            Swal.fire({
                                title: 'Shipped',
                                text: r.data.message,
                                icon: 'success',
                                timer: 2000, 
                                showConfirmButton: false
                            });
                            setTimeout(() => {
                                window.location.reload();
                            }, 2000);
                        } else {
                            Swal.fire('Error', r.data.message, 'error');
                        }
                    });
                }
            });
        },         
        StatusArrived: function (id) {
            const vm = this;
            
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to Arrived this Orders?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, mark as Arrived!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const data = new FormData();
                    data.append('method', 'updatestatusArrived');
                    data.append('status', 'status');
                    data.append('id', id);
        
                    axios.post('../includes/router.php', data).then(r => {
                        console.log(r.data);
                        if (r.data.success) {
                            Swal.fire({
                                title: 'Receive',
                                text: r.data.message,
                                icon: 'success',
                                timer: 2000, 
                                showConfirmButton: false
                            });
                            setTimeout(() => {
                                window.location.reload();
                            }, 2000);
                        } else {
                            Swal.fire('Error', r.data.message, 'error');
                        }
                    });
                }
            });
        }, 

        StatusReceive: function (id) {
            const vm = this;
            
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to Receive this Orders?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, mark as Receive!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const data = new FormData();
                    data.append('method', 'updatestatusReceive');
                    data.append('status', 'status');
                    data.append('id', id);
        
                    axios.post('../includes/router.php', data).then(r => {
                        console.log(r.data);
                        if (r.data.success) {
                            Swal.fire({
                                title: 'Receive',
                                text: r.data.message,
                                icon: 'success',
                                timer: 2000, 
                                showConfirmButton: false
                            });
                            setTimeout(() => {
                                window.location.reload();
                            }, 2000);
                        } else {
                            Swal.fire('Error', r.data.message, 'error');
                        }
                    });
                }
            });
        },  
              
      //seller
        Orders: function () {
            const vue = this;
            var data = new FormData();
            data.append("method", "displayAllOrders");
            axios.post('../includes/router.php', data)
            .then(function (r) {
                vue.orders = [];
                for (const v of r.data) {
                    vue.orders.push({
                        id: v.id,
                        quantity:v.quantity,
                        image:v.product_image,
                        profile:v.profile_image,
                        name :v.order_name,
                        date:v.date,
                        status:v.status,
                        payment:v.paymethod,
                        amount:v.amount,
                    })
                }
            })
            setTimeout(function(){
                if (!$.fn.DataTable.isDataTable('#ordersTable')) {
                  $('#ordersTable').dataTable();
                }
            }, 100);
        },
        CustomerOrders: function () {
            const vue = this;
            var data = new FormData();
            data.append("method", "displayAllMyOrders");
            axios.post('../includes/router.php', data)
            .then(function (r) {
                vue.customerOrders = [];
                for (const v of r.data) {
                 
                    const orderDate = new Date(v.order_date);
                    
                  
                    const formattedDate = orderDate.toLocaleDateString('en-US', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });      
                    vue.customerOrders.push({
                        order_id: v.order_id,
                        image: v.product_image,
                        name: v.order_name,
                        productname: v.product_name,
                        orderstatus: v.orders_status,
                        date: formattedDate, // Use the formatted date
                        quantity: v.quantity,
                        amount: v.total_amount,
                    });
                }
            })
        },
        DeleteOrders(id) {
            Swal.fire({
              title: 'Are you sure?',
              text: 'You are about to delete this Orders',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                const data = new FormData();
                const vm = this;
                data.append("method", "deletesellersOrders");
                data.append("id", id);
                axios.post('../includes/router.php', data)
                  .then(function (r) {
                    Swal.fire(
                      'Deleted!',
                      'Orders successfully deleted',
                      'success'
                    );
                    setTimeout(function() {
                      window.location.reload();
                    }, 3000);
                  })
                  .catch(function (error) {
                    Swal.fire(
                      'Error!',
                      'An error occurred while deleting Orders',
                      'error'
                    );
                  });
              }
            });
          },    
          fnGetDataProducts: function(id) {
            const vm = this;
            const data = new FormData();
            data.append("method", "viewsellersOrders");
            data.append("id", id);
        
            axios.post('../includes/router.php', data)
                .then(function(r) {
                    if (r.data.length > 0) {
                        const v = r.data[0]; 
                        vm.id = v.id ;
                        vm.name = v.order_name;
                        vm.date = v.date;
                        vm.price = v.product_price;
                        vm.amount = v.amount;
                        vm.image = v.ProofOFPayment;
                        vm.quantity = v.quantity;
                        vm.status = v.status;
                        vm.contact_no = v.contact_no;
                        vm.address = v.current_add;

                    }
                })
                .catch(function(error) {
                    console.error('Error:', error);
                });
        },
    },
    created: function () {
        this.Orders();
        this.CustomerOrders();
        this.dipslayWishlist();
        this.displayCart();
    }
}).mount('#CusOrders')