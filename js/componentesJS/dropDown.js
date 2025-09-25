document.addEventListener("DOMContentLoaded", () => {
  var buttons = document.getElementsByClassName("dropdown-btn");

  for (var i = 0; i < buttons.length; i++) {
    buttons[i].onclick = function(event) {
      event.stopPropagation();
      var dropdown = this.nextElementSibling;
      if (dropdown.classList.contains("mostrar")) {
        dropdown.classList.remove("mostrar");
      } else {
        dropdown.classList.add("mostrar");
      }
    }
  }

  document.onclick = function() {
    var abertos = document.getElementsByClassName("dropdown-content");
    for (var j = 0; j < abertos.length; j++) {
      abertos[j].classList.remove("mostrar");
    }
  }
});
