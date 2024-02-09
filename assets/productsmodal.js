const openModalButton = document.getElementById('openModalButton');
const closeModalButton = document.getElementById('closeModalButton');
const plantModal = document.getElementById('plantModal');

openModalButton.addEventListener('click', () => {
    plantModal.style.display = 'block';
});

function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = "none";
    document.body.classList.remove("modal-open");
    var modalBackdrop = document.getElementsByClassName("modal-backdrop")[0];
    document.body.removeChild(modalBackdrop);
}