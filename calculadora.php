<?php
    include_once 'php/registro_login.php';

    $actividadf = array('Poco o nada','Poco (1-3 dias a la semana)',
    'Promedio (3-5 dias a la semana)','Mucho (6-7 dias a la semana)',
    'Pesado (Dos veces por dia)'); 

    $peso=70;
    $altura=170;
    $edad=25;    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <title>Thenos</title>
</head>
<body>
    <div class="contenedor">
        <div class="nav fixed-top">
            <div class="menu">
                <span class="brand"><a href="index.php" class="navlink active">THENOSWEB</a></span>
                <div>
                    <button class="nav-btn collapsed" id="nav-btn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="nav-icon"></span>
                    </button>
                 </div>
                <div class="collapse" id="collapse">
                    <ul>
                        <li class="navitem"><a class="navlink" href="entrenamientos.php"> Entrenamientos</a></li>
                        <li class="navitem"><a class="navlink" href="alimentacion.php"> Alimentacion</a></li>
                        <li class="navitem"><a class="navlink active" href="calculadora.php"> Calculadoras</a></li>
                        <li class="separation"></li>
                        <?php 
                            if(isset($_SESSION['correo'])){?>
                            <div class="dropdown">
                                <button class="navlink active loginnav drop-button" id="drop-button" ><?php echo $user->getNombre();?></button>
                                <div id="mydropdown" class="accountoption">
                                    <a href="account.php">Cuenta</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="php/logout.php">Cerrar sesión</a>
                                </div>
                            </div>
                            <?php }else {?>
                            <a class="navlink active loginnav" href="Sign_Up.php"> Iniciar sesión</a>                   
                        <?php }?>                   
                    </ul>
                </div>
            </div>
        </div>
        <div class="cuerpo">
            <div class="calculadora">
                <div class="col">
                    <div id="caloriasform">
                        <div class="light">
                            <h2>Calculadora de calorias</h2>
                        </div>
                        <form class="transparent" action="calculadora.php" method="get">
                            <div>
                                <h3>Edad:</h3>
                                <td><input type="text" value="25" id="edad" name="edad" onkeyup="sumar();" onclick="this.select();" onkeypress='return (event.charCode >= 48 && event.charCode <= 57)'></td>
                                <td><span>años</span></td>
                            </div>    
                            <div>
                                <h3>Peso:</h3>
                                <td><input value="65" type="text" name="peso" id="peso" onkeyup="sumar();" onclick="this.select();" onkeypress='return (event.charCode >= 48 && event.charCode <= 57)'></td>
                                <td><select name="kg-lb" id="kg/lb" onchange="sumar();">
                                    <option value="kg">kg</option>
                                    <option value="lb">lb</option>
                                </select></td>
                            </div>
                            <div>
                                <h3>Altura:</h3>
                                <td><input value="170" type="text" name="altura" id="altura" onkeyup="sumar();" onclick="this.select();" onkeypress='return (event.charCode >= 48 && event.charCode <= 57)'></td>
                                <td><span>cm</span></td>
                            </div>
                            <div >
                                <h3>Sexo</h3>
                                <div class="sexselect">
                                    <td><input type="radio" value="1" id="female" checked name="genderselect" onclick="sumar();"></td>
                                    <td>Mujer</td>
                                </div>
                                <div class="sexselect">
                                    <td><input type="radio" value="2" id="male" name="genderselect" onclick="sumar();"></td>
                                    <td>Hombre</td>
                                </div>
                            </div>
                                <div>
                                    <h3>Actividad fisica</h3>
                                    <form action="calculadora.php" method="get">
                                        <select name="actividad" id="actividad" class="actselect" onchange="sumar();">
                                            <option value="1">Poco o nada de ejercicio</option>
                                            <option value="2">Poco ejercicio (1-3 dias a la semana)</option>
                                            <option value="3">Promedio (3-5 dias a la semana)</option>
                                            <option value="4">Mucho ejercicio (6-7 dias a la semana)</option>
                                            <option value="5">Pesado (2 veces al dia)</option>
                                        </select>
                                    </form>
                                </div>
                            <div class="formulalabel light">
                                <div class="texto">
                                    <h4>Calorias diarias necesarias para mantener su peso:</h4>
                                </div>
                                <div class="resultadolabel">
                                    <div>
                                        <p>
                                        <span id="spTotal">1711</span>
                                        </p>
                                    </div>
                                </div>
                            </div>    
                            <div class="formulalabel light">
                                <div class="texto">
                                    <h4>Calorias diarias necesarias para perder 1 libra en promedio a la semana:</h4>
                                </div>
                                <div class="resultadolabel">
                                    <div>
                                        <p>
                                            <span id="spTotal1lb">1461</span>
                                        </p>
                                    </div>
                                </div>
                            </div>  
                            <div class="formulalabel light">
                                <div class="texto">
                                    <h4>Calorias diarias necesarias para perder 2 libras en promedio a la semana:</h4>
                                </div>
                                <div class="resultadolabel">
                                    <p>
                                        <span id="spTotal2lb">1211</span>
                                    </p>
                                </div>
                            </div> 
                            <div class="transparent">
                                <div class="formulainfo">
                                    <h3>Formula</h3>
                                    <p>
                                        <span>Esta calculadora de calorías se basa en la ecuación de Mifflin-St Jeor,
                                            que calcula la tasa metabólica basal (TMB), y sus resultados se basan 
                                            en un promedio estimado. La TMB es la cantidad de energía consumida 
                                            por día
                                            <br><br>
                                        </span>
                                        <span>
                                        Hombres:
                                        <br>
                                        </span>
                                        <span>
                                        TMB = 10 × peso (kg) + 6.25 × estatura (cm) - 5 × edad (y) + 5
                                        <br><br>
                                        </span>
                                        <span>
                                        Mujeres:
                                        <br>
                                        </span>
                                        <span>
                                        BMR = 10 × peso (kg) + 6.25 × estatura (cm) - 5 × edad (y) - 161
                                        <br><br>
                                        </span>
                                        <span>
                                        Nota: la determinación precisa de las calorías que quema
                                         solo se puede lograr mediante pruebas fisiológicas individuales
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col">
                    <div id="proteinform">
                        <div class="light">
                            <h2>Calculadora de proteinas</h2>
                        </div>  
                        <form  action="calculadora.php" method="POST">
                            <div class="transparent">
                                <h3>Actividad:</h3>
                                <div class="actselect">
                                    <td><input type="radio" value="1" checked id="bajolvl" name="actividadselect" onclick="proteinadiaria();"></td>
                                    <td>Nivel bajo de entrenamiento</td>
                                </div>
                                <div class="actselect">
                                    <td><input type="radio" value="2" id="resistencialvl" name="actividadselect" onclick="proteinadiaria();"></td>
                                    <td>Entrenamiento de resistencia</td>
                                </div>
                                <div class="actselect">
                                    <td><input type="radio" value="3" id="fuerzalvl" name="actividadselect" onclick="proteinadiaria();"></td>
                                    <td>Entrenamiento de fuerza</td>
                                </div>
                                <div class="transparent">
                                    <h3>Peso:</h3> 
                                    <td><input type="text" value="68" id="pesoprotes" name="peso" onkeyup="proteinadiaria();" onclick="this.select();" onkeypress='return (event.charCode >= 48 && event.charCode <= 57)'></td>
                                    <td><select id="kglb" onchange="proteinadiaria();">
                                        <option value="kg">kg</option>
                                        <option value="lb">lb</option>
                                    </select></td>
                                </div>
                                <hr style="border-top-color: rgba(255, 255, 255, 0.2); width: 85%; margin: 20px">    
                            </div>
                            <div class="formulalabel light">
                                <div class="texto">
                                    <h3>Ingesta de proteina diaria:</h3>
                                </div>
                                <div class="resultadolabel">
                                    <p>
                                        <span id="protestotal">53.7</span><span> gr</span>
                                    </p>
                                </div>
                            </div>        
                        </form>
                    </div>
                    <div id="proteinform" >
                        <div class="light">
                            <h2>Indice de masa corporal</h2>
                        </div>
                        <form action="calculadora.php" method="POST">
                            <div class="transparent">
                                <h3>Peso:</h3>
                                <td><input type="text" name="peso" value="75" id="pesoimc" onkeyup="imc();" onclick="this.select();" onkeypress='return (event.charCode >= 48 && event.charCode <= 57)'></td>
                                <td><select id="kglbimc" onchange="imc();">
                                    <option value="kg">kg</option>
                                    <option value="lb">lb</option>
                                </select></td>
                            </div> 
                            <div class="transparent">
                                <h3>Altura:</h3>
                                <td><input type="text" name="altura" value="178" id="alturaimc" onkeyup="imc();" onclick="this.select();" onkeypress='return (event.charCode >= 48 && event.charCode <= 57)'></td>
                                <td><span>cm</span></td>
                            </div>
                            <hr style="border-top-color: rgba(255, 255, 255, 0.2); width: 85%; margin: 20px">                                
                            <div class="formulalabel light">
                                <div class="texto">
                                    <h3>Su indice de masa corporal es:</h3>
                                </div>
                                <div class="resultadolabel">
                                    <div>
                                        <p>
                                            <span id="imctotal">23.7</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="transparent">
                                <h4>Categorias</h4>
                                <div class="categoria">
                                    <p>
                                        <span>15-15.9: Desnutrición <br></span>
                                        <span>16-18.5: Bajo peso <br></span>
                                        <span>18.5 - 24.9: Rango Normal (saludable) <br></span>
                                        <span>25-26.9: Sobrepeso tipo I <br></span>
                                        <span>27-29.9: Sobrepeso tipo II <br></span>
                                        <span>30 - 34.9: Obesidad Clase I: Bajo riesgo <br></span>
                                        <span>35 - 39.9: Obesidad Clase II: Riesgo moderado <br></span>
                                        <span>+40: Obesidad clase III: Morbida (Alto riesgo) <br></span>
                                    </p>
                                </div>
                            </div>    
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-container">
            <div class="footerrow">
                <div class="footercol">
                    <p class="copy"><a href="aboutus.php"> Sobre nosotros</a></p>
                </div>       
            </div>
            <hr style="border-top-color: rgba(255, 255, 255, 0.2)">
            <div>
                <p class="copy">Copyright © Sthenos Project Online 2022</p>
            </div>
        </div>
    </footer>        
</body>

<script>
    function imc(){
        var total = 0;
        var pesovalue = parseFloat(document.getElementById("pesoimc").value);
        var altura = parseFloat(document.getElementById("alturaimc").value);
        var kglb = document.getElementById("kglbimc").value;

        if(kglb == "lb"){
            peso = pesovalue / 2.20462;
        }else{
            peso = pesovalue;
        }

        if(isNaN(peso) || isNaN(altura)){
            total =+ 0;
        }else{
            altura= altura/100;
            total = peso / Math.pow(altura,2);
        }
        document.getElementById('imctotal').innerHTML = parseFloat(total).toFixed(1);
    }
</script>
<script>        
    function proteinadiaria(){
        var total = 0;
        var pesovalue = parseFloat(document.getElementById("pesoprotes").value);
        var kglb = document.getElementById("kglb").value;

        if(kglb == "lb"){
            pesoprotes = pesovalue / 2.20462;
        }else{
            pesoprotes = pesovalue;
        }

        if(isNaN(pesoprotes)){
            total =+0;
        }else{
            if(document.getElementById("bajolvl").checked == true){
                console.log("", document.getElementById("pesoprotes").value);
                total = pesoprotes * 0.79
            }else if(document.getElementById("resistencialvl").checked == true){
                console.log("", document.getElementById("pesoprotes").value);
                total = pesoprotes * 1.3;
            }else{
                console.log("", document.getElementById("pesoprotes").value);
                total = pesoprotes * 1.64;
            }
        }
    document.getElementById('protestotal').innerHTML = parseFloat(total).toFixed(1);
    }
</script>
<script>
    var total = 0;
    var totalcal = 0;

    function sumar(){
        var edad = parseFloat(document.getElementById("edad").value);
        var pesovalue = parseFloat(document.getElementById("peso").value);
        var altura = parseFloat(document.getElementById("altura").value);
        var actividad = parseFloat(document.getElementById("actividad").value);
        var kglb = document.getElementById("kg/lb").value;

        if(kglb == "lb"){
            peso = pesovalue / 2.20462;
        }else{
            peso = pesovalue;
        }

        if(isNaN(peso) || isNaN(edad) || isNaN(altura)){
            total = 0;
        }else{
            
            if(document.getElementById("male").checked == true){
                console.log("", document.getElementById("male").value);
                total = 10*peso + 6.25*altura - 5*edad +5;
                if(document.getElementById("actividad").value == 1){
                    totalcal = total * 1.2;
                }else if(document.getElementById("actividad").value == 2){
                    totalcal = total *1.375;
                }else if(document.getElementById("actividad").value == 3){
                    totalcal = total * 1.55;
                }else if(document.getElementById("actividad").value == 4){
                    totalcal = total * 1.725;
                }else if(document.getElementById("actividad").value == 5){
                    totalcal = total * 1.9;                
                }
            }else if(document.getElementById("male").checked == false){
                console.log("", document.getElementById("kg/lb").value);
                total = 10*peso + 6.25*altura - 5*edad -161;
                if(document.getElementById("actividad").value == 1){
                    totalcal = total * 1.2;
                }else if(document.getElementById("actividad").value == 2){
                    totalcal = total *1.375;
                }else if(document.getElementById("actividad").value == 3){
                    totalcal = total * 1.55;
                }else if(document.getElementById("actividad").value== 4){
                    totalcal = total * 1.725;
                }else{
                    totalcal = total * 1.9;                
                }
            }
        }
        document.getElementById('spTotal').innerHTML = parseInt(totalcal);
        document.getElementById('spTotal1lb').innerHTML = parseInt(totalcal-250);
        document.getElementById('spTotal2lb').innerHTML = parseInt(totalcal-500);
    }
</script>
<script src="assets/js/desplegable.js"></script>
<script src="assets/js/responsivenav.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</html>