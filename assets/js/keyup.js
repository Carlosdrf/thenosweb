var addIcon = document.getElementsByClassName('add-icon');
var addDiet = document.getElementsByClassName('add-diet');

var valor = document.getElementsByClassName("valor");

var cantCal = parseFloat(document.getElementsByClassName("gramos-usar").value);
var gramosusar = document.getElementsByClassName('gramos-usar');

var kcaltotal = document.getElementsByClassName('kcaltotal');

var cantCal = parseFloat(document.getElementsByClassName("gramos-usar").value);
// var valor = parseFloat(document.getElementsByClassName("valor").value);


for(var i = 0;i <addIcon.length; i++){
    gramosusar[i].addEventListener('keypress', comida);    
}


function comida(e) { 
    var kcalresultado = 300;

   console.log("Clicked " + this.id);
   console.log("Clicked " + cantCal[i]);
   valor[this.id].value = parseFloat(kcalresultado).toFixed(1);
   kcaltotal[this.id].innerHTML = parseFloat(kcalresultado).toFixed(1);

   
}

// function keypress(e){
//     var kcalresultado = 0;
//     console.log("Clicked " + this.id);
//     gramosusar[this.id].classList.toggle("show");

//     kcalresultado = valor[this.id] + cantCal[this.id];
//     kcaltotal[this.id].innerHTML = parseFloat(kcalresultado).toFixed(1);
// }