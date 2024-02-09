 // JavaScript function to close a modal
 function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add('hidden');
    }
}

// JavaScript function to toggle between modals
function toggleModal(openModalId, closeModalId) {
    closeModal(closeModalId);
    var modal = document.getElementById(openModalId);
    if (modal) {
        modal.classList.remove('hidden');
    }
}

//close for products
function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'none';
    }
}

// close for rate
function openModal() {
    document.getElementById('rateModal').classList.remove('hidden');
  }
  document.getElementById('closeModalButton').addEventListener('click', function () {
    document.getElementById('rateModal').classList.add('hidden');
  });
  