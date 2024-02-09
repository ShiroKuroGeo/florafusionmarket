const { createApp }  = Vue;
createApp({
    data(){
        return{
            customer: [],
            customerLength : 0,
            id : 0
        }
    },
    methods:{
        UnlockAccount: function(id) {
            const vm = this;
            Swal.fire({
                title: 'Are you sure?',
                text: 'You want to unlock this user?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: 'Yes, unlock it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    const data = new FormData();
                    data.append("method", "UnlockAccount");
                    data.append("id", id);
                    data.append("disabled", 0);
        
                    axios.post('../includes/router.php', data)
                        .then(function(r) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Account unlocked successfully',
                            });
                            vm.getCustomer(0);
                        })
                        .catch(function(error) {
                            console.error(error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed to unlock account',
                            });
                        });
                }
            });
        },
        
        LockAccount: function(id) {
            const vm = this;
            Swal.fire({
                title: 'Are you sure?',
                text: 'You want to lock this user?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: 'Yes, lock it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    const data = new FormData();
                    data.append("method", "LockAccount");
                    data.append("id", id);
                    data.append("disabled", 1);
        
                    axios.post('../includes/router.php', data)
                        .then(function(r) {
                            if (r.data === "SuccessfullyUpdated") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'User locked successfully',
                                });
                                vm.getCustomer();
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Failed to lock user',
                                });
                            }
                        })
                        .catch(function(error) {
                            console.error(error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed to lock user',
                            });
                        });
                }
            });
        },
        
        getCustomer:function(){
            const vue = this;
            var data = new FormData();
            data.append("method","displayCustomerInfo");
            axios.post('../includes/router.php',data)
            .then(function(r){
                vue.customer = [];
                for(const v of r.data){
                    vue.customer.push({
                        id: v.id,
                        name: v.name,
                        role: v.role,
                        status: v.status,
                        image: v.image,
                        email:v.email,
                        gender:v.gender,
                        contact_no: v.contact_no,
                        disabled:v.disabled,
                        permanent_add: v.permanent_add,
                    })
                }
                setTimeout(function(){
                    if (!$.fn.DataTable.isDataTable('#ordersTable')) {
                      $('#ordersTable').dataTable();
                    }
                }, 100);
                vue.customerLength = r.data.length;
                return vue.customerLength;
            })
        },
        deleteCustomer:function(id){
            const vue = this;
            var data = new FormData();
            data.append("method", "DeleteCus");
            data.append("id", id)
            axios.post('/florafusionmarket/includes/router.php', data)
                .then(function (r) {
                    if (r.data == 200) {
                        vue.getCustomer();
                        toastr.success('Deleted to Cart');
                        console.log(r.data);
                    }
                })
        }
    },
    created:function(){
        this.getCustomer();
    }
}).mount('#customerInfo')