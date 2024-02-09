const rateModal = document.getElementById('rateModal');
  const closeModalButton = document.getElementById('closeModalButton');

  function openRateModal() {
    rateModal.classList.remove('hidden');
  }

  function closeRateModal() {
    rateModal.classList.add('hidden');
  }

  closeModalButton.addEventListener('click', closeRateModal);