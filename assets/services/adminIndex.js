const { createApp } = Vue;
createApp({
    data(){
        return{
            customer: [],
            seller : [],
            customerLength : 0,
            sellerLength : 0,
            reports:[],
            reportsLength : 0,
        }
    },
    methods:{
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
                        contact_no: v.contact_no,
                        permanent_add: v.permanent_add,
                    })
                }
                vue.customerLength = r.data.length;
                return vue.customerLength;
            })
        },
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
                        image: v.image,
                        contact_no: v.contact_no,
                        permanent_add: v.permanent_add,
                    })
                }
                vue.sellerLength = r.data.length;
                return this.sellerLength;
            })
        },
        getReport:function(){
            const vue = this;
            var data = new FormData();
            data.append("method","displayReportInfo");
            axios.post('../includes/router.php',data)
            .then(function(r){
                vue.reports = [];
                for(const v of r.data){
                    vue.reports.push({
                        id: v.id,
                        name: v.name,
                        role: v.role,
                        status: v.status,
                        image: v.image,
                        contact_no: v.contact_no,
                        permanent_add: v.permanent_add,
                    })
                }
                vue.reportsLength = r.data.length;
                return vue.reportsLength;
            })
        },
        createPieChart: function () {
            this.$nextTick(() => {
              const ctx = document.getElementById('pieChart').getContext('2d');
          
              
              const chartData = {
                labels: ['Customers', 'Sellers', 'Complaints'],
                datasets: [{
                  data: [this.customerLength, this.sellerLength, this.reportsLength],
                  backgroundColor: ['blue', 'orange', 'yellowgreen'],
                }]
              };
              const chartOptions = {
                responsive: true,
                maintainAspectRatio: false,
              };
          
              new Chart(ctx, {
                type: 'pie', 
                data: chartData,
                options: chartOptions
              });
            });
          },          
        getchart:function () {
            const vue = this;
            var data = new FormData();
            const chartData = [];

            data.append("method", "doAdminchart");
            axios.post('../includes/router.php', data)
            .then(function (r) {
                const ctx = document.getElementById('myChart').getContext('2d');
                const response = r.data;
                    const labels = response.map(item => item.month);
                    const dataValues = response.map(item => item.Sellers);

                    new Chart(ctx, {
                        type: 'bar', // You can choose the chart type you prefer (e.g., 'bar', 'line', 'pie', etc.)
                        data: {
                            labels: labels,
                            datasets: [
                                {
                                    label: 'OVERALL SELL OF SELLERS',
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
                })
        }
    },
    created:function(){
        // this.createChart();
        this.getReport();
        this.getCustomer();
        this.displaySellerInfo();
        this.getchart();
        this.$watch(
            () => this.customerLength + this.sellerLength + this.reportsLength,
            () => {
              if (this.customerLength > 0 && this.sellerLength > 0 && this.reportsLength > 0) {
                this.createPieChart();
              }
            }
          );
    }
}).mount('#adminIndex')