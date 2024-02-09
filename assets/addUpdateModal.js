  
  document.getElementById('updateButton').addEventListener('click', function() {
    document.getElementById('updatePlantModal').classList.remove('hidden');
  });

  
  function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
  }
  
  
document.getElementById('addCategoryButton').addEventListener('click', function() {
    document.getElementById('addCategoryModal').classList.remove('hidden');
  });