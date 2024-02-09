const { createApp } = Vue;
createApp({
    data(){
        return{
            image: '',
            id: 0,
            name: '',
            qty: '',
            price: '',
            desc: '',
            up: [],
            userProduct: [],
            selectedId: 0,
            search: '',
            
        }
    },
    methods:{
        addUserProduct:function(e){
            e.preventDefault();
            var form = e.currentTarget;  
            const vue = this;
            var data = new FormData(form); 
            data.append("method","AddProduct");
            axios.post('/florafusionmarket/includes/router.php',data)
            .then(function(r) {
                if(r.data == 200) {
                    vue.getUserProduct();
                    toastr.success('Successfully Added');
                    window.location.reload();
                }
            })
        },
        getUserProduct:function(){
            const vue = this;
            var data = new FormData();
            data.append("method", "getAllProducts");
            axios.post('/florafusionmarket/includes/router.php', data)
            .then(function(r){
                vue.userProduct = [];
                for(const v of r.data){
                    vue.userProduct.push({
                        id : v.product_ID,
                        image : v.product_image,
                        name: v.product_name,
                        price: v.product_price,
                        qty: v.product_qty,
                        desc: v.product_des,
                        data: v.created_date,
                    })
                }
            })
        },
        GETselectedId:function(id){
            this.selectedId = id;
        },
        updateProduct:function(){
            // if(confirm('Are you sure you want to update')){
                const vue = this;
                var data = new FormData();
                data.append("method","getThisUpdateProduct");
                data.append("product_ID",vue.selectedId);
                data.append("qty",document.getElementById('qytUpt').value);
                data.append("price",document.getElementById('priceUpt').value);
                axios.post('../includes/router.php',data)
                .then(function(r){
                    alert(r.data);
                    if(r.data == "SuccessfullyUpdated"){
                        vue.GetProduct();
                        alert("SuccessfullyUpdated");
                    }
                })
            // }
        },
        deleteProduct: function(id) {
            Swal.fire({
                title: 'Are you sure you want to delete this product?',
                // text: 'This action cannot be undone!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#FF0000', 
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    const vue = this;
                    var data = new FormData();
                    data.append("method", "deleteProduct");
                    data.append("product_ID", id);
                    axios.post('../includes/router.php', data)
                        .then(function(r) {
                            if (r.data == 200) {
                                vue.getUserProduct();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Successfully Deleted',
                                    showConfirmButton: false,
                                    timer: 1500  
                                }).then(function() {
                                
                                    window.location.reload();
                                });
                            }
                        });
                }
            });
        },
    },
    computed:{
        searchData(){
            if(!this.search){
                return this.userProduct;
            }
            return this.userProduct.filter(up => up.name.toLowerCase().includes(this.search.toLowerCase()) );
        }
    },
    created:function(){
        this.getUserProduct();
    }
}).mount('#displayProd')