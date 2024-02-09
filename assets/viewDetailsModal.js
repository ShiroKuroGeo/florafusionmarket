
// table display orders
$(document).ready(function () {
  var data = new FormData();
  data.append("method", "displayAllOrders");

  axios.post('../includes/router.php', data)
    .then(function (r) {
      // alert(r.data);
      var parent = document.querySelector('#orders');
      var data = r.data;
      parent.innerHTML = '';
      
      data.forEach(function (order) {
        var row = document.createElement('tr');
        row.innerHTML = `
        <td class=""> <a href="../assets/img/${order.plant_image}" target="_blank"><img src="../assets/img/${order.plant_image}" width="70" height="70"></a></td>
                <td class="text-center">${order.product_name}</td>
                <td class="text-center">${order.user_name}</td>
                <td class="text-center">${order.date}</td>
                <td class="text-center">P${order.amount}</td>
                <td class="text-center">${order.paymethod == '1' ? "Gcash" : order.paymethod == '2' ? "COD" : "NO PAYMENT"}</td>
                <td class="text-center"><span ${order.status == '0' ? "class='badge bg-danger text-white'" : "class='badge bg-success text-white'"}>${order.status == '0' ? 'Pending' : order.status == 1 ? 'Delivered' : order.status == 2 ? 'Packed' : order.status == 3 ? 'shipped' :  'Receive'}</span></td>
               
                <td>
                    <button class="bt view-order" data-id="${order.id}" data-bs-toggle="modal" data-bs-target="#exampleModal">👁️</button>
                    <button class="btn delete-order" data-id="${order.id}">🗑️</button>
                </td>
              `;
        parent.appendChild(row);
      });
      $('#der').DataTable({
        "paging": true,
        "searching": true,
        "lengthMenu": [10, 25, 50, 100],
        "order": [[0, 'asc']]
      });
    })
    .catch(function (error) {
      console.error(error);
    });
});

// delete orders detatails
$(document).on('click', '.delete-order', function () {
  var id = $(this).data('id');
  var data = new FormData();
  data.append('method', 'deletesellersOrders');
  data.append('id', id);

  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!"
  }).then((result) => {
    if (result.isConfirmed) {

      axios.post('../includes/router.php', data)
        .then(function (response) {
          if (response.status === 200) {
            Swal.fire("Saved!", "", "success").then(() => {
              location.reload();
            });
          } else {
            Swal.fire("Error", "Failed to save changes", "error");
          }
        })
        .catch(function (error) {
          console.error(error);
          Swal.fire("Error", "An error occurred", "error");
        });
    }
    else if (result.isDenied) {
      Swal.fire("Delete Cancel", "", "warning").then(() => {
        location.reload();
      });
    }
  });






});


// view  orders detatails
$(document).on('click', '.view-order', function () {
  var id = $(this).data('id');
  var data = new FormData();
  data.append('method', 'viewsellersOrders');
  data.append('id', id);
  axios.post('../includes/router.php', data)
      .then(function (r) {
        console.log(r.data)
          var data = r.data;

          var parenttable = document.querySelector('#product-info');
          var payDetailsContainer = document.getElementById('payDetails');

          // Clear both containers before populating them
          parenttable.innerHTML = "";
          payDetailsContainer.innerHTML = "";

          data.forEach(function (order) {
            console.log('image',order.image);
              var orderid = document.getElementById('orderNumber');
              orderid.innerHTML = order.id;

              var cname = document.getElementById('cname');
              cname.innerHTML = order.order_name;

              var orderdate = document.getElementById('orderDate');
              orderdate.innerHTML = order.date;

              var add = document.getElementById('add');
              add.innerHTML = order.current_add;

              var packed = document.getElementById('packed');
              packed.setAttribute('data-id', order.id);

              var shipped = document.getElementById('shipped');
              shipped.setAttribute('data-id', order.id);

              var received = document.getElementById('received');
              received.setAttribute('data-id', order.id);

              var delivered = document.getElementById('delivered');
              delivered.setAttribute('data-id', order.id);

              // var delivered = document.getElementById('delivered');
              // delivered.setAttribute('data-id', order.order_id);
              // if (order.status === 1) {
              //   delivered.setAttribute('disabled', 'disabled');
              // } else {
              //   delivered.removeAttribute('disabled');
              // }
              var status = order.status;
              var deliveredButton = document.getElementById('delivered');
              var packedButton = document.getElementById('packed');
              var shippedButton = document.getElementById('shipped');
              var receivedButton = document.getElementById('received');

              // Set initial visibility
              deliveredButton.style.display = 'none';
              packedButton.style.display = 'none';
              shippedButton.style.display = 'none';
              receivedButton.style.display = 'none';

              // Check the status and show the corresponding button
              if (status === 0) {
                  deliveredButton.style.display = 'inline-block';
              } else if (status === 1) {
                  packedButton.style.display = 'inline-block';
              } else if (status === 2) {
                  shippedButton.style.display = 'inline-block';
              } else if (status === 3) {
                  receivedButton.style.display = 'inline-block';
              } 

              var add = document.getElementById('cnum');
              add.innerHTML = order.contact_no;

              var image = document.getElementById('image');
              image.src ='/florafusionmarket/assets/img/' + order.ProofOFPayment;

              var child = document.createElement('tr');
              child.innerHTML = `<tr>
                  <td class="border px-4 py-2">${order.product_name}</td>
                  <td class="border px-4 py-2">${order.quantity}</td>
                  <td class="border px-4 py-2">${order.product_price}</td>
                  <td class="border px-4 py-2">${order.amount}</td>
              </tr>`;
              parenttable.appendChild(child);

              var payDetails = document.createElement('div');
              payDetails.innerHTML = `<div>
                  <p><strong>Mode of Payment:</strong> ${order.paymethod == '1' ? "Gcash" : order.paymethod == '2' ? "COD" : "NO PAYMENT"}</p>
                  <p><strong>Total Amount:</strong> ${order.amount}</p>
              </div>`;
              payDetailsContainer.appendChild(payDetails).empty();
          });
      })
      
      .catch(function (error) {
          console.error(error);
      });
});


// doUpdateStatus
$(document).on('click', '#packed', function () {
  var id = $(this).data('id');  // Assuming you have the data-id attribute set correctly on the button
  var data = new FormData();
  data.append('method', 'updatestatusPacked');
  data.append('id', id);

  Swal.fire({
    title: "Do you want to packed this product?",
    showDenyButton: true,
    confirmButtonText: "Yes",
  }).then((result) => {
    if (result.isConfirmed) {
      axios.post('../includes/router.php', data)
        .then(function (response) {
          if (response.status === 200) {
            Swal.fire("Saved!", "", "success").then(() => {
              console.log(response.data);
              location.reload();
            });
          } else {
            Swal.fire("Error", "Failed to save changes", "error");
          }
        })
        .catch(function (error) {
          console.error(error);
          Swal.fire("Error", "An error occurred", "error");
        });
    } else if (result.isDenied) {
      Swal.fire("Delivered Cancel", "", "warning").then(() => {
        location.reload();
      });
    }
  });
});

$(document).on('click', '#shipped', function () {
  var id = $(this).data('id');  // Assuming you have the data-id attribute set correctly on the button
  var data = new FormData();
  data.append('method', 'updatestatusShipped');
  data.append('id', id);

  Swal.fire({
    title: "Do you want to shipped this product?",
    showDenyButton: true,
    confirmButtonText: "Yes",
  }).then((result) => {
    if (result.isConfirmed) {
      axios.post('../includes/router.php', data)
        .then(function (response) {
          if (response.status === 200) {
            Swal.fire("Saved!", "", "success").then(() => {
              console.log(response.data);
              location.reload();
            });
          } else {
            Swal.fire("Error", "Failed to save changes", "error");
          }
        })
        .catch(function (error) {
          console.error(error);
          Swal.fire("Error", "An error occurred", "error");
        });
    } else if (result.isDenied) {
      Swal.fire("shipped Cancel", "", "warning").then(() => {
        location.reload();
      });
    }
  });
});
$(document).on('click', '#received', function () {
  var id = $(this).data('id');  // Assuming you have the data-id attribute set correctly on the button
  var data = new FormData();
  data.append('method', 'updatestatusReceive');
  data.append('id', id);

  Swal.fire({
    title: "Do you want to received this product?",
    showDenyButton: true,
    confirmButtonText: "Yes",
  }).then((result) => {
    if (result.isConfirmed) {
      axios.post('../includes/router.php', data)
        .then(function (response) {
          if (response.status === 200) {
            Swal.fire("Saved!", "", "success").then(() => {
              console.log(response.data);
              location.reload();
            });
          } else {
            Swal.fire("Error", "Failed to save changes", "error");
          }
        })
        .catch(function (error) {
          console.error(error);
          Swal.fire("Error", "An error occurred", "error");
        });
    } else if (result.isDenied) {
      Swal.fire("receive Cancel", "", "warning").then(() => {
        location.reload();
      });
    }
  });
});


$(document).on('click', '#delivered', function () {
  var id = $(this).data('id');
  var data = new FormData();
  data.append('method', 'updatestatusOrders');
  data.append('id', id);

  Swal.fire({
    title: "Do you want to deliver this product?",
    showDenyButton: true,
    confirmButtonText: "Yes",
  }).then((result) => {
    if (result.isConfirmed) {
      axios.post('../includes/router.php', data)
        .then(function (response) {
          if (response.status === 200) {
            Swal.fire("Saved!", "", "success").then(() => {
              console.log(response.data)
              location.reload();
            });
          } else {
            Swal.fire("Error", "Failed to save changes", "error");
          }
        })
        .catch(function (error) {
          console.error(error);
          Swal.fire("Error", "An error occurred", "error");
        });
    } else if (result.isDenied) {
      Swal.fire("Delivered Cancel", "", "warning").then(() => {
        location.reload();
      });
    }
  });
});