function toggleModal(modalIdToShow, modalIdToHide) {
    document.getElementById(modalIdToHide).classList.add('hidden');
    document.getElementById(modalIdToShow).classList.remove('hidden');
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
}

document.getElementById('loginButton').addEventListener('click', function() {
    toggleModal('loginModal', 'createAccountModal');
});

document.getElementById('create-account-link').addEventListener('click', function() {
    toggleModal('createAccountModal', 'loginModal');
    // alert('Login logic goes here');
});

// document.getElementById('loginModal').addEventListener('submit', function(event) {
//     event.preventDefault(); // Prevent the form from submitting
//     // Your login logic here
//     alert('Login logic goes here');
// });

  function toggleGcashField() {
    const accountType = document.getElementById('account-type');
    const gcashImageField = document.getElementById('gcashImageField');

    if (accountType.value === '2') {
        gcashImageField.style.display = 'block';
    } else {
        gcashImageField.style.display = 'none';
    }
}
