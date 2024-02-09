const { createApp }  = Vue;
createApp({
    data(){
        return{
            seller : [],
            shop_name:'',
            sellerLength : 0,
            id : 0
        }
    },
    methods:{
        displaySellerInfo:function(){
            const vue = this;
            var data = new FormData();
            data.append("method","displaySellerInfo");
            axios.post('../includes/router.php',data)
            .then(function(r){
                vue.seller = [];
                for(const v of r.data){
                    vue.seller.push({
                        id: v.id,
                        name: v.name,   
                        role: v.role,
                        status: v.status,
                        gender:v.gender,
                        image: v.image,
                        email:v.email,
                        shop_name:v.shop_name,
                        qr_image:v.qr_image,
                        disabled:v.disabled,
                        contact_no: v.contact_no,
                        permanent_add: v.permanent_add,
                    })
                }
                setTimeout(function(){
                    if (!$.fn.DataTable.isDataTable('#ordersTable')) {
                      $('#ordersTable').dataTable();
                    }
                }, 100);
                vue,sellerLength = r.data.length;
                return this.sellerLength;

            })
        },
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
                            vm.displaySellerInfo(0);
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
                                vm.displaySellerInfo();
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
        
        deleteSeller:function(id){
            const vue = this;
            var data = new FormData();
            data.append("method", "DeleteSeller");
            data.append("id", id)
            axios.post('/florafusionmarket/includes/router.php', data)
                .then(function (r) {
                    if (r.data == 200) {
                        vue.displaySellerInfo();
                        toastr.success('Deleted to Cart');
                        console.log(r.data);
                    }
                })
        }
    },
    created:function(){
        this.displaySellerInfo();
    }
}).mount('#sellerInfo')