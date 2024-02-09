$(document).ready(function () {
  var data = new FormData();
  data.append("method", "displayOrderInfo");

  axios.post('../includes/router.php', data)
    .then(function (r) {
      var parent = document.querySelector('#orders');
      var data = r.data;
      // console.log(data);
      parent.innerHTML = '';

      data.forEach(function (order) {
        var row = document.createElement('tr');
        row.innerHTML = `
              <td class="text-center">${order.product_name}</td>
              <td class="text-center">${order.quantity}</td>
              <td class="text-center">${order.product_price}</td>
              <td class="text-center">P${order.amount}</td>
              <td><span ${order.status == '0' ? "class='badge bg-danger text-black'" : "class='badge bg-success text-black'"}>${order.status == '0' ? "Pending" : "Delivered"}</span></td>
              <td>
                  <button class="btn btn-primary view-order" class="text-center" data-id="${order.id}" data-bs-toggle="modal" data-bs-target="#exampleModal">View</button>
                  
              </td>
            `;
        parent.appendChild(row);
      });
      $('#page').DataTable({
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



// view  orders detatails
$(document).on('click', '.view-order', function () {
  var id = $(this).data('id');
  var data = new FormData();
  data.append('method', 'viewOrderInfo');
  data.append('id', id);
  axios.post('../includes/router.php', data)
    .then(function (r) {
      var data = r.data;
      // console.log(data);

          var parenttable = document.querySelector('#product-info');
          var payDetailsContainer = document.getElementById('payDetails');

          // Clear both containers before populating them
          parenttable.innerHTML = "";
          payDetailsContainer.innerHTML = "";

      data.forEach(function (order) {
        var orderid = document.getElementById('orderNumber');
        orderid.innerHTML = order.id;

        var cname = document.getElementById('cname');
        cname.innerHTML = order.order_name;

        var orderdate = document.getElementById('orderDate');
        orderdate.innerHTML = order.date;

        var add = document.getElementById('add');
        add.innerHTML = order.current_add;

        var add = document.getElementById('cnum');
        add.innerHTML = order.contact_no;

        var child = document.createElement('tr');

        child.innerHTML = `     <tr>
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

$(document).on('click', '#delivered', function () {
  var id = $(this).data('id');
  // alert(id);
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