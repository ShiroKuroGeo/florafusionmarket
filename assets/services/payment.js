const { createApp } = Vue;
createApp({
    data(){
        return{

        }
    },
    methods:{
        payment:function(){
            const vue = this;
            var data = new FormData();
            data.append("method","payment");
            axios.post('../includes/routerpayment.php',data)
            .then(function(r){
                if(r.data == 200){
                    toastr.success('Payment Successfully');
                }
            })
        }
    }
})