$(document).ready(function () {
  var data = new FormData();
  data.append("method", "displaySellReport");
  axios.post('/florafusionmarket/includes/router.php', data)
    .then(function (r) {
      var data = r.data;

      var parent = document.querySelector('#sales_reports');
      data.forEach((item) => {
        var child = document.createElement('tbody');

        child.innerHTML = `
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap" value="${item.month}">${item.month}</td>
                        <td class="px-6 py-4 whitespace-nowrap">${item.orderyear}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <button id="viewEdip" data-id="${item.orderdate}" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">View</button>
                        </td>
                      </tr>
                    `;

        parent.appendChild(child);

      });
      $('#sales_reports').DataTable({
        "paging": true,
        "searching": true,
        "lengthMenu": [10, 25, 50, 100],
        "order": [[0, 'asc']]
      });
    });
});






$(document).on('click', '#viewEdip', function () {
  var id = $(this).data('id');
  var data = new FormData();
  data.append("method", "displayViewReport");
  data.append("id", id);
  axios.post('/florafusionmarket/includes/router.php', data)
    .then(function (r) {
      var data = r.data;
      var parent = document.querySelector('.modal-view');


      data.forEach((item) => {
        var monthyeartitle = document.getElementById('monthandyear');

        var child = document.createElement('tbody');

        monthyeartitle.textContent = item.monthname + ' ' + item.year;


        child.innerHTML = `
          <tr>
          <td class="border px-4 py-2">${item.product_name}</td>
          <td class="border px-4 py-2">${item.quantity}</td>
          <td class="border px-4 py-2">${item.amount}</td>
          </tr>`;

        parent.appendChild(child);
      })


    });
});
// displayTotalAmount
$(document).on('click', '#viewEdip', function () {
  var id = $(this).data('id');
  var data = new FormData();
  data.append("method", "displayTotalAmount");
  data.append("id", id);
  axios.post('/florafusionmarket/includes/router.php', data)
    .then(function (r) {

      var data = r.data;

      var totalamount = document.getElementById('totalamount');

      data.forEach((item) => {
        totalamount.innerHTML = '₱' + ' ' + item.totalamount;
      })


    });
});
document.getElementById('close').addEventListener('click', function () {
  location.reload();
});

document.getElementById('close-b').addEventListener('click', function () {
  location.reload();
})

$(document).ready(function () {


  $('#exampleModal').on('click', function (e) {
    if (!$(e.target).closest('.modal-content').length) {
      $('#exampleModal').modal('hide');
      setTimeout(function () {
        location.reload();
      }, 1000);
    }
  });
});