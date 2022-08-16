document.getElementById("next-exercise1").addEventListener("click", myFunctionB1);

function myFunctionB1() {
  var w1 = document.getElementById("warmup");
  var w2 = document.getElementById("warmup1");
  var w3 = document.getElementById("warmup2");
  var w4 = document.getElementById("warmup3");
  var w5 = document.getElementById("warmup4");
  var w6 = document.getElementById("warmup5");
  var w7 = document.getElementById("warmup6");
  var w8 = document.getElementById("warmup7");
  if (w1.style.display == "block") {
    w1.style.display = "none";
    w2.style.display = "block";
    w3.style.display = "none";
    w4.style.display = "none";
    w5.style.display = "none";
    w6.style.display = "none";
    w7.style.display = "none";
    w8.style.display = "none";
    document.getElementById("next-exercise1").innerHTML = "Siguiente (2/8)";
  }else if (w2.style.display == "block") {
    w1.style.display = "none";
    w2.style.display = "none";
    w3.style.display = "block";
    w4.style.display = "none";
    w5.style.display = "none";
    w6.style.display = "none";
    w7.style.display = "none";
    w8.style.display = "none"; 
    document.getElementById("next-exercise1").innerHTML = "Siguiente (3/8)"; 
  } else if(w3.style.display == "block") {
    w1.style.display = "none";
    w2.style.display = "none";
    w3.style.display = "none";
    w4.style.display = "block";
    w5.style.display = "none";
    w6.style.display = "none";
    w7.style.display = "none";
    w8.style.display = "none";    
    document.getElementById("next-exercise1").innerHTML = "Siguiente (4/8)";   
  } else if(w4.style.display == "block") {
    w1.style.display = "none";
    w2.style.display = "none";
    w3.style.display = "none";
    w4.style.display = "none";
    w5.style.display = "block";
    w6.style.display = "none";
    w7.style.display = "none";
    w8.style.display = "none";    
    document.getElementById("next-exercise1").innerHTML = "Siguiente (5/8)";    
  }else if(w5.style.display == "block") {
    w1.style.display = "none";
    w2.style.display = "none";
    w3.style.display = "none";
    w4.style.display = "none";
    w5.style.display = "none";
    w6.style.display = "block";
    w7.style.display = "none";
    w8.style.display = "none";      
    document.getElementById("next-exercise1").innerHTML = "Siguiente (6/8)";
  }else if(w6.style.display == "block") {
    w1.style.display = "none";
    w2.style.display = "none";
    w3.style.display = "none";
    w4.style.display = "none";
    w5.style.display = "none";
    w6.style.display = "none";
    w7.style.display = "block";
    w8.style.display = "none";   
    document.getElementById("next-exercise1").innerHTML = "Siguiente (7/8)";   
  }else if(w7.style.display == "block") {
    w1.style.display = "none";
    w2.style.display = "none";
    w3.style.display = "none";
    w4.style.display = "none";
    w5.style.display = "none";
    w6.style.display = "none";
    w7.style.display = "none";
    w8.style.display = "block";  
    document.getElementById("next-exercise1").innerHTML = "Listo (8/8)";    
  }else{
    w1.style.display = "none";
    w2.style.display = "none";
    w3.style.display = "none";
    w4.style.display = "none";
    w5.style.display = "none";
    w6.style.display = "none";
    w7.style.display = "none";
    w8.style.display = "none";  
    document.getElementById("next-exercise1").style.display="none"; 
    document.getElementById("warmup-title").innerHTML="Calentamiento - Ya puedes comenzar con el entrenamiento";
  }
}