<?php

include_once '../../php/registro_login.php';
include_once '../../php/play.php';

$play = new Play();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/estilos.css">
    <title>Thenos</title>
</head>
<body>
    <div class="contenedor">
        <div class="nav fixed-top">
            <div class="menu">
                <span class="brand"><a href="../../index.php" class="navlink active">THENOSWEB</a></span>
                <div>
                    <button class="nav-btn " id="nav-btn" type="button" >
                        <span class="nav-icon"></span>
                    </button>
                 </div>
                <div class="collapse" id="collapse">
                    <ul>
                        <li class="navitem"><a class="navlink active" href="../../entrenamientos.php"> Entrenamientos</a></li>
                        <li class="navitem"><a class="navlink" href="../../alimentacion.php"> Alimentacion</a></li>
                        <li class="navitem"><a class="navlink" href="../../calculadora.php"> Calculadoras</a></li>
                        <li class="separation"></li>
                        <?php 
                            if(isset($_SESSION['correo'])){?>
                            <div class="dropdown">
                                <button class="navlink active loginnav drop-button" id="drop-button" ><?php echo $user->getNombre();?></button>
                                <div id="mydropdown" class="accountoption">
                                    <a href="../../account.php">Cuenta</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="../../php/logout.php">Cerrar sesión</a>
                                </div>
                            </div>
                            <?php }else {?>
                            <a class="navlink active loginnav" href="../../Sign_Up.php"> Iniciar sesión</a>                   
                        <?php }?>                   
                    </ul>
                </div>
            </div>
        </div>
        <div class="encabezado">
            <div class="contenedor-portada">
                <section class="section-portada">
                    <div class="col">
                        <?php
                        foreach($play->getRutinaObjetivo(7) as $res){
                            echo "<h1 class='text-white'>$res[objetivorutina]</h1>";
                            echo "<p class='text-white'>$res[nivelrutina]</p>";
                            echo "<p class='text-white'>$res[categoria]</p>";
                            foreach($play->grupoRutina(7) as $res){
                                echo "<span class='etiqueta'>$res[grupo] </span>";
                            } 
                        }
                        ?>
                    </div>
                </section>
            </div>
        </div>
        <div class="cuerpo">
            <section class="suggcontainer">
                <div class="container-exercise">
                    <div class="card-lista shadow">
                        <div class="list-body">
                            <h2 class="card-title m0" id="warmup-title">Calentamiento</h2>
                        </div>
                        <div class="list-group list-group-flush">
                            <a class='list-group-item ' id="warmup" style="display:block;">
                                <div class='content-container'>
                                    <div id='videocontenedor' class='videocont'>
                                        <video class='roundedimg' src='../../warmup/1.mp4' controls height='auto' width='350px'></video>
                                    </div>
                                    <div class='media-body'>
                                        <h6 class='media-body-text'>Muñecas</h6>
                                        <p class='media-body-text' style='font-size: 1.2rem'>Al menos 15 seg de cada movimiento</p>
                                    </div> 
                                </div>
                            </a>
                            <a class='list-group-item ' id="warmup1" style="display:none;">
                                <div class='content-container'>
                                    <div id='videocontenedor' class='videocont'>
                                        <video class='roundedimg' src='../../warmup/2.mov' controls height='auto' width='350px'></video>
                                    </div>
                                    <div class='media-body'>
                                        <h6 class='media-body-text'>Codos</h6>
                                        <p class='media-body-text' style='font-size: 1.2rem'>al menos 15 seg cada lado</p>
                                    </div> 
                                </div>
                            </a>
                            <a class='list-group-item' id="warmup2" style="display:none;">
                                <div class='content-container'>
                                    <div id='videocontenedor' class='videocont'>
                                        <video class='roundedimg' src='../../warmup/3.mov' controls height='auto' width='350px'></video>
                                    </div>
                                    <div class='media-body'>
                                        <h6 class='media-body-text'>Hombros</h6>
                                        <p class='media-body-text' style='font-size: 1.2rem'>Al menos 15 seg cada lado</p>
                                    </div>
                                </div>
                            </a>
                            <a class='list-group-item' id="warmup3" style="display:none;">
                                <div class='content-container'>
                                    <div id='videocontenedor' class='videocont'>
                                        <video class='roundedimg' src='../../warmup/4.mov' controls height='auto' width='350px'></video>
                                    </div>
                                    <div class='media-body'>
                                        <h6 class='media-body-text'>Cuello</h6>
                                        <p class='media-body-text' style='font-size: 1.2rem'>Al menos 15 seg de cada movimiento</p>
                                    </div>
                                </div>
                            </a>
                            <a class='list-group-item' id="warmup4" style="display:none;">
                                <div class='content-container'>
                                    <div id='videocontenedor' class='videocont'>
                                        <video class='roundedimg' src='../../warmup/5.mov' controls height='auto' width='350px'></video>
                                    </div>
                                    <div class='media-body'>
                                        <h6 class='media-body-text'>Girar la espalda</h6>
                                        <p class='media-body-text' style='font-size: 1.2rem'>Al menos 8 veces cada lado</p>
                                    </div>
                                </div>
                            </a>
                            <a class='list-group-item' id="warmup5" style="display:none;">
                                <div class='content-container'>
                                    <div id='videocontenedor' class='videocont'>
                                        <video class='roundedimg' src='../../warmup/6.mov' controls height='auto' width='350px'></video>
                                    </div>
                                    <div class='media-body'>
                                        <h6 class='media-body-text'>Cuerpo hacia adelante</h6>
                                        <p class='media-body-text' style='font-size: 1.2rem'>Al menos 15 seg</p>
                                    </div>
                                </div>
                            </a>
                            <a class='list-group-item' id="warmup6" style="display:none;">
                                <div class='content-container'>
                                    <div id='videocontenedor' class='videocont'>
                                        <video class='roundedimg' src='../../warmup/7.mov' controls height='auto' width='350px'></video>
                                    </div>
                                    <div class='media-body'>
                                        <h6 class='media-body-text'>Muslos y oblicuos</h6>
                                        <p class='media-body-text' style='font-size: 1.2rem'>Al menos 15 seg cada lado</p>
                                    </div>
                                </div>
                            </a>
                            <a class='list-group-item' id="warmup7" style="display:none;">
                                <div class='content-container'>
                                    <div id='videocontenedor' class='videocont'>
                                        <video class='roundedimg' src='../../warmup/8.mp4' controls height='auto' width='350px'></video>
                                    </div>
                                    <div class='media-body'>
                                        <h6 class='media-body-text'>Isquiotibilaes</h6>
                                        <p class='media-body-text' style='font-size: 1.2rem'>Al menos 15 seg cada lado</p>
                                    </div>
                                </div>
                            </a>
                            <div>
                                <span class='btndark' id='next-exercise1'>Siguiente (1/8)</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-lista shadow">
                        <div class="list-body">
                            <h4 class="card-title">Realizar <?php echo $play->getRounds(7); ?> rondas - El tiempo de descanso se hace entre series y ejercicios de entre 45 
                            seg hasta 4 minutos en base a lo que mejor se ajuste a tu comodidad</h4>
                        </div>
                        <div class="list-group list-group-flush">
                            <?php
                                foreach($play->mostrarEjercicioRutina(7) as $res){
                                    echo"<a class='list-group-item' data-toggle='modal' data-target='#js-modal' data-remote='true' href='../../$res[url]'>";
                                        echo"<div class='content-container'>";
                                            echo "<div id='videocontenedor' class='videocont'>";
                                                echo "<video class='roundedimg' src='../../$res[url]' controls height='auto' width='350px'></video>";
                                            echo "</div>";                                                    
                                            echo "<div class='media-body'>";
                                                echo "<h6 class='media-body-text'>$res[nombreplay]</h6>";
                                                echo "<p class='media-body-text' style='font-size: 1.2rem'>$res[defaultreps] $res[metodoreps]</p>";
                                                echo "<p class='media-body-text'><b>Equipamiento:</b> $res[equipamiento]</p>";
                                            echo "</div>";
                                        echo "</div>";
                                    echo "</a>"; 
                                }
                            ?>                                
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-container">
            <div class="footerrow">
                <div class="footercol">
                    <p class="copy"><a href="../../aboutus.php"> Sobre nosotros</a></p>
                </div>       
            </div>
            <hr style="border-top-color: rgba(255, 255, 255, 0.2)">
            <div>
                <p class="copy">Copyright © Sthenos Project Online 2022</p>
            </div>
        </div>
    </footer> 
    <script src="../../assets/js/desplegable.js"></script>
    <script src="../../assets/js/responsivenav.js"></script>
    <script src="../../assets/js/playvid.js"></script>
</body>
</html>