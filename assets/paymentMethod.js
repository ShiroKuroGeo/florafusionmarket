const paymentMethodSelect = document.getElementById('mode-of-payment');

placeOrderButton.addEventListener('click', function () {
    const selectedPaymentMethod = paymentMethodSelect.value;

    if (selectedPaymentMethod === 'gcash') {
        location.href = '../Customer/gcash_payment.php';
    } else if (selectedPaymentMethod === 'cod') {
        location.href = '../Customer/cod_payment.php';
    }
});

document.getElementById('cancel-order-button').addEventListener('click', function() {
    // Close the modal when the "Cancel" button is clicked
    var modal = document.getElementById('order-details-modal');
    modal.classList.add('hidden');
  });
  