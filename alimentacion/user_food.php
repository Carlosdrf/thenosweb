<?php

include_once '../php/registro_login.php';
include_once '../php/nutricion.php';
include_once '../php/modificarporcion.php';
include_once '../php/delete_food.php';

if(!isset($_SESSION['correo'])){
    echo '<script>
    window.location.replace("../index.php");
    </script>';
}

$alimentos = new alimentos();
$x=0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <title>Thenos</title>
</head>
<body>
    <div class="contenedor">
        <div class="nav fixed-top">
            <div class="menu">
                <span class="brand"><a href="../index.php" class="navlink active">THENOSWEB</a></span>
                <div>
                    <button class="nav-btn " id="nav-btn" type="button" data-toggle="collapse" >
                        <span class="nav-icon"></span>
                    </button>
                 </div>
                <div class="collapse" id="collapse">
                    <ul>
                        <li class="navitem"><a class="navlink" href="../entrenamientos.php"> Entrenamientos</a></li>
                        <li class="navitem"><a class="navlink active" href="../alimentacion.php"> Alimentacion</a></li>
                        <li class="navitem"><a class="navlink" href="../calculadora.php"> Calculadoras</a></li>
                        <li class="separation"></li>
                        <?php 
                            if(isset($_SESSION['correo'])){?>
                            <div class="dropdown">
                                <button class="navlink active loginnav drop-button" id="drop-button" ><?php echo $user->getNombre();?></button>
                                <div id="mydropdown" class="accountoption">
                                    <a href="../account.php">Cuenta</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="../php/logout.php">Cerrar sesión</a>
                                </div>
                            </div>
                            <?php }else{?>
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
                        <h4><a href="../alimentacion.php" class="food-lib">Volver a Libreria</a></h4>
                    </div>
                </div>
            </div>
            <?php 
            }else{
                echo '<script>
                window.location.replace("index.php");
                </script>';
            }
            ?> 
            <div class="container">
                <form action="" method="post">
                    <div class="card-lista shadow">
                        <div class="list-body">
                            <h3>¡Hola, <?php echo $user->getNombre(); ?>! la siguiente informacion se refiere al valor nutricional de cada 
                            alimento por cada cantidad de gramos ingresadas por ti</h3>
                        </div>
                        <div class="list-group list-group-flush">
                            <?php
                                $amountcal = 0;
                                $alimentos = new alimentos();
                                foreach($alimentos->showDiet($user->getUserId()) as $mostrar){
                                    echo"<a class='list-group-item'>";
                                        echo"<div class='content-container'>";
                                            echo "<div class='videocont'>";
                                                echo "<h3 class='media-body-title'>$mostrar[nombrealimento]</h3>";
                                                $alimentos->setFood($mostrar['id_food']);
                                                echo "<img class='roundedimg' src='../img/alimentacion/".$mostrar['imagen'].".png' controls height='auto' width='200px'></video>";
                                            echo "</div>";
                                            echo "<div class='media-body'>";
                                                echo "<p class='media-body-text'><b>Gramos ingresados:</b> $mostrar[porcioncomidagr] gr</p>";
                                                echo "<p class='media-body-text'><b>Valor energetico:</b> $mostrar[valorcomida] kcal</p>";
                                                echo "<p class='media-body-text'><b>Carbohidratos:</b> $mostrar[carbscomida] gr</p>";
                                                echo "<p class='media-body-text'><b>Proteinas:</b> $mostrar[protecomida] gr</p>";
                                                echo "<p class='media-body-text'><b>Grasas:</b> $mostrar[grasascomida] gr</p>";
                                            echo "</div>";
                                            echo "<div class='food-menu'>";
                                                echo "<div class='food-btn'>";
                                                    echo "<span class='icon-food modify-icon' id='$x'></span>";
                                                echo "</div>";
                                                echo "<div>";
                                                    echo "<form action='../php/delete_food.php' method='post'>";
                                                        echo "<input type='text' hidden name='idcomida[]' class='idcomida' value='";echo $mostrar['id_comida'];echo "'>";
                                                        echo "<button class='delete-icon'></button>";
                                                    echo "</form>";
                                                echo"</div>";
                                            echo "</div>";
                                        echo "</div>";
                                        echo "<div class='add-diet'>";
                                            echo "<form action='' method='post'>";
                                                echo "<div>";
                                                    echo "<input type='text' name='idfood[]' hidden class='idcomida' value='";echo $alimentos->getIdFood();echo "'>";
                                                    echo "<input type='text' name='valor[]' hidden class='valor' value='";echo $alimentos->getValor();echo "'>";
                                                    echo "<input type='text' name='carbs[]' hidden class='carbs' value='";echo $alimentos->getCarbs();echo "'>";
                                                    echo "<input type='text' name='prote[]' hidden class='prote' value='";echo $alimentos->getProte();echo "'>";
                                                    echo "<input type='text' name='grasas[]' hidden class='grasas' value='";echo $alimentos->getGrasas();echo "'>";
                                                    echo "<h3>Ingresa la cantidad en gramos que usarás:</h3>";

                                                    echo "<input type='text' name='gramosusar[]' id='$x' value='' placeholder='cantidad en gramos' class='gramos-usar'
                                                    onkeypress='return (event.charCode >= 48 && event.charCode <= 57)'>";
                                                echo "</div>";
                                                echo "<div>";
                                                    echo "<p>";
                                                        echo "<span>Valor energetico: </span>";
                                                        echo "<span id='kcaltotal' class='kcaltotal'>0</span>";
                                                        echo "<span> kcal</span>";
                                                    echo "</p>";
                                                    echo "<p>";
                                                        echo "<span>Carbohidratos: </span>";
                                                        echo "<span class='carbstotal'>0</span>";
                                                        echo "<span> gr</span>";
                                                    echo "</p>";
                                                    echo "<p>";
                                                        echo "<span>Proteinas: </span>";
                                                        echo "<span class='protetotal'>0</span>";
                                                        echo "<span> gr</span>";
                                                    echo "</p>";
                                                    echo "<p>";
                                                        echo "<span>Grasas: </span>";
                                                        echo "<span class='grasastotal'>0</span>";
                                                        echo "<span> gr</span>";
                                                    echo "</p>";
                                                echo "</div>";
                                                echo "<button class='btndark'>Guardar</button>";
                                            echo "</form>";
                                            
                                        echo "</div>";
                                    echo "</a>"; 
                                    $amountcal = $amountcal + $mostrar['valorcomida'];
                                    $x++;
                                }
                            ?>
                            <div class='list-group-item'>
                                <div class="content-container">
                                    <div class="media-body">
                                        <p>
                                            <span><b>Consumo calorico actual: </b></span>
                                            <span id="amountcal"><b><?php echo $amountcal;?> kcal </b></span>
                                        </p>
                                    </div>
                                    <div class="media-body">
                                        <p>
                                            <span><b>Cantidad de calorias necesarias:</b> </span>
                                            <span id="needcal"><b><?php echo $user->getCaloria();?> kcal</b></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-container">
            <div class="footerrow">
                <div class="footercol">
                    <p class="copy">Sobre nosotros</p>
                </div>    
                <div class="footercol">
                    <p class="copy">Redes Sociales</p>
                </div>    
            </div>
            <hr style="border-top-color: rgba(255, 255, 255, 0.2)">
            <div>
                <p class="copy">Copyright © Sthenos Project Online 2022</p>
            </div>
        </div>
    </footer>
</body>
<script src="../assets/js/desplegable.js"></script>
<script src="../assets/js/responsivenav.js"></script>
<script src="../assets/js/planfood.js"></script>
<script>
    var addedcal = <?php echo $amountcal;?>;
    var needcal = <?php echo $user->getCaloria();?>;

    if(addedcal >= needcal -200 && addedcal <= (needcal + 150)){
        amountcal.style.color = 'green';
    }else if(addedcal >= needcal -500 && addedcal <= (needcal + 200)){
        amountcal.style.color = '#CDAB00';
    }else{
        amountcal.style.color = 'red';
    }
</script>
</html>