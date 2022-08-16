<?php

include_once 'php/registro_login.php';
include_once 'php/nutricion.php';
include_once 'php/agregarporcion.php';

$alimentos = new alimentos();
$x=0;
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
                    <button class="nav-btn " id="nav-btn" type="button" data-toggle="collapse" >
                        <span class="nav-icon"></span>
                    </button>
                 </div>
                <div class="collapse" id="collapse">
                    <ul>
                        <li class="navitem"><a class="navlink" href="entrenamientos.php"> Entrenamientos</a></li>
                        <li class="navitem"><a class="navlink active" href="alimentacion.php"> Alimentacion</a></li>
                        <li class="navitem"><a class="navlink" href="calculadora.php"> Calculadoras</a></li>
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
        <div class="encabezado">
            <div class="portada">
                <section class="text">
                    <div class="col">
                        <h1>Libreria de alimentos</h1>
                        <p>Planifica tu consumo necesario segun tus objetivos</p>
                    </div>
                </section>
            </div>
        </div>
        <div class="cuerpo">
            <?php if(isset($_SESSION['correo'])){?>
            <div class="container" style="margin-top: 15px; padding-bottom: 0;">
                <div class="card-lista shadow">
                    <div class="content-container">
                        <h4><a href="alimentacion/user_food.php" class="food-elements">Verifica tus resultados</a></h4>
                    </div>
                </div>
            </div> 
            <?php }?> 
            <div class="container">
                <div class="card-lista shadow">
                    <form action="" method="post">
                        <div class="list-body">
                            <h3>La siguiente informacion se refiere al valor nutricional de cada 
                            alimento por cada 100 gramos del mismo </h3>
                        </div>
                        <div class="list-body">
                            <div class="searchgroup flex">
                                <?php if(!empty($_POST['search-food'])){
                                    $srchinput = $_POST['search-food'];
                                }else{
                                    $srchinput = "";
                                }?>
                                <input type="text" name="search-food"  value="<?php echo $srchinput;?>" onkeypress="return soloLetras(event)" onclick="this.select();" class="searchbar">
                                <div class="flex">
                                    <?php
                                        if(empty($_POST['search-food'])){
                                            echo '<button class="searchbtn">Buscar</button>';
                                        }else{
                                            echo '<button class="searchbtn">Buscar</button>';
                                            echo '<div class="center">';
                                                echo '<a href="alimentacion.php" class="btnsalir">Volver</a>';
                                            echo '</div>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>   
                    </form> 
                    <div class="list-group list-group-flush">
                    <?php
                        $alimentos = new alimentos();
                        if(!empty($_POST['search-food'])){
                            $busqueda = "%".$_POST['search-food']."%";
                            foreach($alimentos->searchFood($busqueda) as $mostrar){
                                echo"<a class='list-group-item'>";
                                    echo"<div class='content-container'>";
                                        echo "<div class='videocont'>";
                                            echo "<h3 class='media-body-title'>$mostrar[nombrealimento]</h3>";
                                            $alimentos->setFood($mostrar['id_food']);
                                            echo "<img class='roundedimg' src='img/alimentacion/".$mostrar['imagen'].".png' controls height='auto' width='200px'></video>";
                                        echo "</div>";
                                        echo "<div class='media-body'>";
                                            echo "<p class='media-body-text'><b>Valor energetico:</b> $mostrar[valorenergetico] kcal</p>";
                                            echo "<p class='media-body-text'><b>Carbohidratos:</b> $mostrar[carbs] gr</p>";
                                            echo "<p class='media-body-text'><b>Proteinas:</b> $mostrar[prote] gr</p>";
                                            echo "<p class='media-body-text'><b>Grasas:</b> $mostrar[grasas] gr</p>";
                                        echo "</div>";
                                        echo "<div class='food-btn' style='margin-left: auto;'>";
                                            echo "<span class='add-icon icon-food' id='$x'></span>";
                                        echo "</div>";
                                    echo "</div>";
                                    echo "<div class='add-diet'>";
                                    if(isset($_SESSION['correo'])){
                                        echo "<form action='' method='post'>";
                                            echo "<div>";
                                                echo "<input type='text' name='idfood[]' hidden class='idcomida' value='";echo $alimentos->getIdFood();echo "'>";
                                                echo "<input type='text' name='valor[]' hidden class='valor' value='";echo $alimentos->getValor();echo "'>";
                                                echo "<input type='text' name='carbs[]' hidden class='carbs' value='";echo $alimentos->getCarbs();echo "'>";
                                                echo "<input type='text' name='prote[]' hidden class='prote' value='";echo $alimentos->getProte();echo "'>";
                                                echo "<input type='text' name='grasas[]' hidden class='grasas' value='";echo $alimentos->getGrasas();echo "'>";
                                                echo "<h3>Ingresa la cantidad en gramos que usarás:</h3>";

                                                echo "<input type='text' name='gramosusar[]' required id='$x' value='' placeholder='cantidad en gramos' class='gramos-usar'
                                                onkeypress='return (event.charCode >= 48 && event.charCode <= 57)'>";
                                            echo "</div>";
                                            echo "<div>";
                                                echo "<p>";
                                                    echo "<span id='kcaltotal' class='kcaltotal'>0</span>";
                                                    echo "<span> kcal</span>";
                                                echo "</p>";
                                                echo "<p>";
                                                    echo "<span class='carbstotal'>0</span>";
                                                    echo "<span> gr</span>";
                                                echo "</p>";
                                                echo "<p>";
                                                    echo "<span class='protetotal'>0</span>";
                                                    echo "<span> gr</span>";
                                                echo "</p>";
                                                echo "<p>";
                                                    echo "<span class='grasastotal'>0</span>";
                                                    echo "<span> gr</span>";
                                                echo "</p>";
                                            echo "</div>";
                                            echo "<button class='btndark'>Aceptar</button>";
                                        echo "</form>";
                                        
                                    }else{
                                        echo "<div class='media-body'>";
                                            echo "<p class='media-body-text'><b>Si quieres usar la herramienta para añadir alimentos,
                                            es necesario iniciar sesion.</b></p>";
                                        echo "</div>";    
                                    }
                                    echo "</div>";
                                echo "</a>";  
                                $x++;
                                
                            }

                        }else{
                            foreach($alimentos->mostrarAlimentos() as $mostrar){
                                echo"<a class='list-group-item'>";
                                    echo"<div class='content-container'>";
                                        echo "<div class='videocont'>";
                                            echo "<h3 class='media-body-title'>$mostrar[nombrealimento]</h3>";
                                            $alimentos->setFood($mostrar['id_food']);
                                            echo "<img class='roundedimg' src='img/alimentacion/".$mostrar['imagen'].".png' controls height='auto' width='200px'></video>";
                                        echo "</div>";
                                        echo "<div class='media-body'>";
                                            echo "<p class='media-body-text'><b>Valor energetico:</b> $mostrar[valorenergetico] kcal</p>";
                                            echo "<p class='media-body-text'><b>Carbohidratos:</b> $mostrar[carbs] gr</p>";
                                            echo "<p class='media-body-text'><b>Proteinas:</b> $mostrar[prote] gr</p>";
                                            echo "<p class='media-body-text'><b>Grasas:</b> $mostrar[grasas] gr</p>";
                                        echo "</div>";
                                        echo "<div class='food-btn' style='margin-left: auto;'>";
                                            echo "<span class='icon-food add-icon' id='$x'></span>";
                                        echo "</div>";
                                    echo "</div>";
                                    echo "<div class='add-diet'>";
                                    if(isset($_SESSION['correo'])){
                                        echo "<form action='' method='post'>";
                                            echo "<div>";
                                                echo "<input type='text' name='idfood[]' hidden class='idcomida' value='";echo $alimentos->getIdFood();echo "'>";
                                                echo "<input type='text' name='valor[]' hidden class='valor' value='";echo $alimentos->getValor();echo "'>";
                                                echo "<input type='text' name='carbs[]' hidden class='carbs' value='";echo $alimentos->getCarbs();echo "'>";
                                                echo "<input type='text' name='prote[]' hidden class='prote' value='";echo $alimentos->getProte();echo "'>";
                                                echo "<input type='text' name='grasas[]' hidden class='grasas' value='";echo $alimentos->getGrasas();echo "'>";
                                                echo "<h3>Ingresa la cantidad en gramos que usarás:</h3>";

                                                echo "<input type='text' name='gramosusar[]' required id='$x' value='' placeholder='cantidad en gramos' class='gramos-usar'
                                                onkeypress='return (event.charCode >= 48 && event.charCode <= 57)'>";
                                            echo "</div>";
                                            echo "<div>";
                                                echo "<p>";
                                                    echo "<span id='kcaltotal' class='kcaltotal'>0</span>";
                                                    echo "<span> kcal</span>";
                                                echo "</p>";
                                                echo "<p>";
                                                    echo "<span class='carbstotal'>0</span>";
                                                    echo "<span> gr</span>";
                                                echo "</p>";
                                                echo "<p>";
                                                    echo "<span class='protetotal'>0</span>";
                                                    echo "<span> gr</span>";
                                                echo "</p>";
                                                echo "<p>";
                                                    echo "<span class='grasastotal'>0</span>";
                                                    echo "<span> gr</span>";
                                                echo "</p>";
                                            echo "</div>";
                                            echo "<button class='btndark'>Aceptar</button>";
                                        echo "</form>";
                                        
                                    }else{
                                        echo "<div class='media-body'>";
                                            echo "<p class='media-body-text'><b>Si quieres usar la herramienta para añadir alimentos,
                                            es necesario iniciar sesion.</b></p>";
                                        echo "</div>";    
                                    }
                                    echo "</div>";
                                echo "</a>"; 
                                $x++;
                            }
                        }
                    ?>
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
    function soloLetras(letra) {

        tecla = (document.all) ? letra.keyCode : letra.which;

        //Tecla de retroceso para borrar, y espacio siempre la permite
        if (tecla == 8 || tecla == 32) {
            return true;
        }

        // Patrón de entrada
        patron = /[A-Za-z]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
    }
</script>
<script src="assets/js/desplegable.js"></script>
<script src="assets/js/responsivenav.js"></script>
<script src="assets/js/planfood.js"></script>
</html>