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
            Aup: [],
            Aups: [],
            selectedId: 0,
            search: '',
            product_ID:0,
            
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
        GetProductDetails:function(){
            const params = new URLSearchParams(new URL(window.location.href).search);
            const seller_shop = params.get("seller_shop");
            const vue = this;
            var data = new FormData();
            data.append("method", "adminProd");
            axios.post('/florafusionmarket/includes/router.php', data)
            .then(function(r){
                // alert(r.data);
                vue.Aups = [];
                for(const v of r.data)
                if (v.shop_name == seller_shop) {
                    vue.Aups.push({
                        id:v.userID,
                        product_ID : v.product_ID,
                        image : v.product_image,
                        name: v.product_name,
                        price: v.product_price,
                        qty: v.product_qty,
                        desc: v.product_des,
                        revImage : v.revImage,
                        shop_name : v.shop_name,
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
                        toastr.success('Successfully Updated');
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
                                // vue.GetProduct();
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
                return this.Aups;
            }
            return this.Aups.filter(Aup => Aup.name.toLowerCase().includes(this.search.toLowerCase()) );
        }
    },
    created:function(){
        this.GetProductDetails();
    }
}).mount('#adminUP')