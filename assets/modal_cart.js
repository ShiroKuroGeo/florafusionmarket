const orderDetailsButton = document.getElementById('order-details-button');
const orderDetailsModal = document.getElementById('order-details-modal');
const closeOrderDetailsButton = document.getElementById('close-order-details');
const placeOrderButton = document.getElementById('place-order-button');
const orderViewModal = document.getElementById('order-view-modal');
const closeOrderViewButton = document.getElementById('close-order-view');


function openOrderDetailsModal() {
    orderDetailsModal.classList.remove('hidden');
}


function closeOrderDetailsModal() {
    orderDetailsModal.classList.add('hidden');
}

function openOrderViewModal() {
    orderViewModal.classList.remove('hidden');
}


function closeOrderViewModal() {
    orderViewModal.classList.add('hidden');
}


orderDetailsButton.addEventListener('click', openOrderDetailsModal);
closeOrderDetailsButton.addEventListener('click', closeOrderDetailsModal);
placeOrderButton.addEventListener('click', openOrderViewModal);
closeOrderViewButton.addEventListener('click', closeOrderViewModal);