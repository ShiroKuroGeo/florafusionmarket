const { createApp } = Vue;
createApp({
    data() {
        return {
            totalsales:0,
            totalsaleslength:0,
            order: [],
            plant: [],
            plantlength: 0,
            orderlength: 0,
        }
    },
    methods: {
        getUserProduct: function () {
            const vue = this;
            var data = new FormData();
            data.append("method", "getAllProducts");
            axios.post('../includes/router.php', data)
                .then(function (r) {
                    vue.plant = [];
                    for (const v of r.data) {
                        vue.plant.push({
                            id: v.product_ID,
                            image: v.product_image,
                            name: v.product_name,
                            price: v.product_price,
                            qty: v.product_qty,
                            desc: v.product_des,
                            data: v.created_date,
                        })
                    }
                    vue.plantlength = r.data.length;
                    return vue.plantlength;
                })
        },
        getUserOrder: function () {
            const vue = this;
            var data = new FormData();
            data.append("method", "displayAllOrders");
            axios.post('../includes/router.php', data)
                .then(function (r) {
                    vue.order = [];
                    for (const v of r.data) {
                        vue.order.push({
                            id: v.id,
                            amount: v.total_amount,
                            stat: v.status,
                        })
                    }
                    vue.orderlength = r.data.length;
                    return vue.orderlength;
                })
        },
        getchart: function () {
            const vue = this;
            var data = new FormData();
        
            data.append("method", "doDSchart");
            axios.post('../includes/router.php', data)
                .then(function (r) {
                    const ctx = document.getElementById('myChart').getContext('2d');
                    const response = r.data;
        
                    const labels = response.map(item => item.month);
                    const dataValues = response.map(item => item.total_sum);
        
                    const totalSum = dataValues.reduce((acc, value) => acc + value);
                    vue.totalsales = totalSum; 
        
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [
                                {
                                    label: 'Total Sales',
                                    data: dataValues,
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 1,
                                },
                            ],
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true,
                                },
                            },
                        },
                    });
                });
        }
             
    },
    created: function () {
        this.getUserOrder();
        this.getUserProduct();
        this.getchart();
    }

}).mount('#sellerIndex')