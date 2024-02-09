document.addEventListener('DOMContentLoaded', function () {
    // Get the profile menu button and the profile menu
    var profileMenuButton = document.getElementById('profile-menu-button');
    var profileMenu = document.getElementById('profile-menu');

    // Add a click event listener to the profile menu button
    profileMenuButton.addEventListener('click', function () {
      // Toggle the 'hidden' class to show/hide the profile menu
      profileMenu.classList.toggle('hidden');
    });

    // Close the profile menu if clicked outside of it
    document.addEventListener('click', function (event) {
      var isClickInsideProfileMenu = profileMenu.contains(event.target);
      var isClickInsideProfileMenuButton = profileMenuButton.contains(event.target);
      if (!isClickInsideProfileMenu && !isClickInsideProfileMenuButton) {
        // If the click is outside of the profile menu and the button, hide the profile menu
        profileMenu.classList.add('hidden');
      }
    });
  });