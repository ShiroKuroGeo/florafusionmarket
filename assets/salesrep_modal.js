// Function to open a modal
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.remove('hidden');
}

// Function to close a modal
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.add('hidden');
}

// Open addSalesReportModal
const openAddModalButton = document.getElementById('openAddModal');
openAddModalButton.addEventListener('click', () => {
    openModal('addSalesReportModal');
});

// Close addSalesReportModal
const addSalesReportButton = document.getElementById('addSalesReport');
addSalesReportButton.addEventListener('click', () => {
    closeModal('addSalesReportModal');
});

// Close addSalesReportModal on cancel
const cancelAddSalesReportButton = document.getElementById('cancelAddSalesReport');
cancelAddSalesReportButton.addEventListener('click', () => {
    closeModal('addSalesReportModal');
});

// Open salesReportModal
document.getElementById('viewSalesButton').addEventListener('click', () => {
    console.log('Button clicked'); // Add this line for debugging
    openModal('salesReportModal');
});


// Event listener to close modal when clicking outside of it
const modals = document.querySelectorAll('.modal');
modals.forEach((modal) => {
    modal.addEventListener('click', (event) => {
        if (event.target === modal) {
            closeModal(modal.id);
        }
    });
});

// Event listener to close modal on 'Escape' key press
document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
        modals.forEach((modal) => {
            closeModal(modal.id);
        });
    }
});
