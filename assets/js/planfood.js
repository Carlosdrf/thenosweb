var addIcon = document.getElementsByClassName('icon-food');
var addDiet = document.getElementsByClassName('add-diet');

var keyprss = document.getElementsByClassName('gramos-usar');
var calspan = document.getElementsByClassName('kcaltotal');
var protespan = document.getElementsByClassName('protetotal');
var carbsspan = document.getElementsByClassName('carbstotal');
var grasaspan = document.getElementsByClassName('grasastotal');

for(var i = 0;i <addIcon.length; i++){
    addIcon[i].addEventListener('click', addInfo);
}
for(var x = 0;i <addIcon.length; x++){
    keyprss[i].addEventListener('keyup', keypress);
}

function addInfo(e) { 
   console.log("Clicked " + this.id);
   addDiet[this.id].classList.toggle("show");
   
}

function keypress(e){
    var valor = parseFloat(document.getElementsByClassName("valor")[this.id].value);
    var carbs = parseFloat(document.getElementsByClassName("carbs")[this.id].value);
    var prote = parseFloat(document.getElementsByClassName("prote")[this.id].value);
    var grasas = parseFloat(document.getElementsByClassName("grasas")[this.id].value);

    var cantCal = parseFloat(document.getElementsByClassName("gramos-usar")[this.id].value);
    console.log("Clicked " + [this.id]);
    if(isNaN(cantCal)){
        calspan[this.id].innerHTML = "0";
        protespan[this.id].innerHTML = 0;
        carbsspan[this.id].innerHTML = 0;
        grasaspan[this.id].innerHTML = 0;
    }else{
        var kcaltotal = cantCal*valor /100 ;
        var proteres = cantCal*prote /100 ;
        var carbsres = cantCal*carbs /100 ;
        var grasasres = cantCal*grasas /100 ;

        calspan[this.id].innerHTML = parseFloat(kcaltotal).toFixed(1);
        protespan[this.id].innerHTML = parseFloat(proteres).toFixed(2);
        carbsspan[this.id].innerHTML = parseFloat(carbsres).toFixed(2);
        grasaspan[this.id].innerHTML = parseFloat(grasasres).toFixed(2);
    }

}


