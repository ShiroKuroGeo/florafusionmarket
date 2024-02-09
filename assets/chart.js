
// const ctx = document.getElementById('myChart').getContext('2d');
//   const myChart = new Chart(ctx, {
//     type: 'bar', // You can choose the chart type you prefer (e.g., 'bar', 'line', 'pie', etc.)
//     data: {
//       labels: ['January', 'February', 'March', 'April', 'May', 'June', ],
//       datasets: [
//         {
//           label: 'Data',
//           data: [12, 19, 3, 5, 2, 3],
//           backgroundColor: 'rgba(75, 192, 192, 0.2)',
//           borderColor: 'rgba(75, 192, 192, 1)',
//           borderWidth: 1,
//         },
//       ],
//     },
//     options: {
//       scales: {
//         y: {
//           beginAtZero: true,
//         },
//       },
//     },
//   });

// // $(document).ready(function () {

// //   const ctx = document.getElementById('myChart').getContext('2d');
// //   const myChart = new Chart(ctx, {
// //     type: 'bar',
// //     data: {
// //       labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
// //       datasets: [
// //         {
// //           label: 'Total Amount',
// //           data: Array(12).fill(0),
// //           backgroundColor: 'rgba(75, 192, 192, 0.2)',
// //           borderColor: 'rgba(75, 192, 192, 1)',
// //           borderWidth: 1,
// //         },
// //       ],
// //     },
// //     options: {
// //       scales: {
// //         y: {
// //           beginAtZero: true,
// //         },
// //       },
// //     },
// //   });

// //   var data = new FormData();
// //   data.append("method", "doDSchart");

// //   axios.post('/florafusionmarket/includes/router.php', data)
// //     .then(function (response) {
// //       const monthData = response.data;

      
// //       const labels = myChart.data.labels.slice(); 
// //       const totalAmounts = Array(12).fill(0);

    
// //       monthData.forEach(function (monthItem) {
// //         const monthName = monthItem.month;
// //         const totalAmount = parseFloat(monthItem.total_amount);

// //         const monthIndex = labels.indexOf(monthName);
// //         if (monthIndex !== -1) {
// //           totalAmounts[monthIndex] += totalAmount;
// //         }
// //       });

     
// //       myChart.data.datasets[0].data = totalAmounts;

    
// //       myChart.update();
// //     })
// //     .catch(function (error) {
// //       console.log(error);
// //     });
// // });





// // $(document).ready(function(){
// //  // COUNT NUMBER OF PLANTS 
// //   var data = new FormData(); 
// //   data.append("method", "doPScount");
// //   axios.post('/florafusionmarket/includes/router.php', data)
// //       .then(function (r) {

// //         var data = r.data;
// //           var plant = document.querySelector('.productnumber');
// //           data.forEach((items)=>{
// //             plant.innerHTML = items.productcount;
            
// //           })
// //       })
// //       .catch(function (error) {
// //           console.log(error);
// //       });

// //   // COUNT NUMBER OF ORDER 
// //   var data = new FormData(); 
// //   data.append("method", "doDScount");
// //   axios.post('/florafusionmarket/includes/router.php', data)
// //       .then(function (r) {
// //           var data = r.data;
// //           console.log(data);
// //           var order =  document.querySelector('.ordernumber');

// //           data.forEach((item)=>{
// //             order.innerHTML = item.orderscount
// //           });


// //       })
// //       .catch(function (error) {
// //           console.log(error);
// //       });

// // })