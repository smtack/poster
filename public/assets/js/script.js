document.querySelector('#toggle-menu').addEventListener('click', function() {
  var menuItems = document.getElementsByClassName('menu-item');

  for (var i = 0; i < menuItems.length; i++) {
      var menuItem = menuItems[i];
      menuItem.classList.toggle("hidden");
  }
})