const { createApp } = Vue;
createApp({
    data(){
        return{
            name:'',
            h: [],
            history:[],
            lengthSold: 0,
            SumTP: 0,
            search: '',
            salesReport:[]
        }
    },
    methods:{
        getHistory: function () {
            const params = new URLSearchParams(new URL(window.location.href).search);
            const customerName = params.get("customerName");
            const ordermonth = params.get("ordermonth");
            const orderyear = params.get("orderyear");
            const vue = this;
            var data = new FormData();
            data.append("method", "history");
        
            axios.post('../includes/router.php', data)
                .then(function (r) {
                    vue.history = [];
                    let totalQuantitySold = 0;
                    let totalPriceSum = 0;
        
                    for (var v of r.data) {
                        if (v.customerName == customerName && v.ordermonth == ordermonth && v.orderyear == orderyear) {
                            vue.history.push({
                                name: v.product_name,
                                cusname:v.customerName,
                                qty: v.quantity,
                                amount: v.total_amount,
                                TP: v.totalPrice,
                                date: v.order_date,
                                id: v.customerId,
                                image: v.product_image,
                                mount: v.ordermonth,
                                year: v.orderyear,
                            });
        
                            totalQuantitySold += parseInt(v.quantity);
                            totalPriceSum += parseFloat(v.totalPrice);
                        }
                    }
        
                    if (vue.history.length > 0) {
                        vue.lengthSold = totalQuantitySold;
                        vue.SumTP = totalPriceSum;
                    } else {
                        console.log("No records found for customer with id:", id);
                    }
                });
        },
        
        Customer(customerName,month, year) {
            window.location.href = `sold_his.php?&customerName=${customerName}&ordermonth=${month}&orderyear=${year}`;
        },
        getSalesReport: function () {
            const vue = this;
            var data = new FormData();
            data.append("method", "displaySellReport");
            axios.post('../includes/router.php', data)
                .then(function (r) {
                    vue.salesReport = [];
        
                    for (var v of r.data) {
                        vue.salesReport.push({
                            id:v.customerId,
                            name: v.customerName,
                            month: v.ordermonth,
                            year: v.orderyear,
                            date: v.orderdate,
                        });
                    }
                })
                setTimeout(function(){
                    if (!$.fn.DataTable.isDataTable('#salesReportTable')) {
                      $('#salesReportTable').dataTable();
                    }
                }, 100);
        },
    },
    computed:{
        searchData(){
            if(!this.search){
                return this.history;
            }

            console.log(this.search);
            return this.history.filter(h => h.name.toLowerCase().includes(this.search.toLowerCase()) );
        }
    },
    created:function(){
        this.getHistory();
        this.getSalesReport();

    }
}).mount('#histo');