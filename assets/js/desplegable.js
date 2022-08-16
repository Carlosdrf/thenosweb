document.getElementById("drop-button").addEventListener("click", myFunction);



var mydropdown = document.getElementById("mydropdown");

var show = document.getElementsByClassName("show");
var dropbutton = document.getElementsByClassName("drop-button");
var accountoption = document.getElementsByClassName("accountoption");



function myFunction() {   
  //Añade una clase al elemento que tenga el id myDropdown
  mydropdown.classList.toggle("show");
}
  
  //Cierra el submenu si se clica fuera
  window.onclick = function(event){
    if(!event.target.matches("drop-button")) {
      var dropdowns = accountoption;
      var i;
      for (i = 0;  i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        //Busca dentro de drop-content los elementos con la clase show
        if (openDropdown.classList.contains(show)){
          //elimina la clase show de los elementos dentro de drop-content
          openDropdown.classList.remove(show);
        }
      }
    }
  }