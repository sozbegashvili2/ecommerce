function myFunction() {
    document.getElementById("myDropdownone").classList.toggle("show");
  }
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtnone')) {
      var dropdowns = document.getElementsByClassName("dropdown-contentone");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }