<?php

include_once '../php/registro_login.php';
include_once '../php/play.php';
$play = new Play();
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
                    <button class="nav-btn" id="nav-btn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="nav-icon"></span>
                    </button>
                 </div>
                <div class="collapse" id="collapse">
                    <ul>
                        <li class="navitem"><a class="navlink active" href="../entrenamientos.php"> Entrenamientos</a></li>
                        <li class="navitem"><a class="navlink" href="../alimentacion.php"> Alimentacion</a></li>
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
                            <?php }else {?>
                            <a class="navlink active loginnav" href="../Sign_Up.php"> Iniciar sesión</a>                   
                        <?php }?>                   
                    </ul>
                </div>
            </div>
        </div>
        <div class="encabezado">
            <div class="portada">
                <section class="text">
                    <div class="col">
                        <h1>Libreria de Rutinas & Entrenamientos </h1>
                    </div>
                </section>
            </div>
            
        </div>
        <div class="cuerpo">
            <section class="container">
                <h2>Libreria de entrenamientos</h2>
                <div class="sugeridos">
                    <?php 
                    
                    foreach($play->datoRutinas() as $res){
                        echo "<div class='suggested'>";
                            echo "<a href='workouts/10$res[routineid].php' class='relative'>";
                                echo "<img src='../$res[portada]' alt=''>";
                                echo "<div class='backcolor'></div>";
                                echo "<div class='absolute'>";
                                foreach($play->grupoRutina($res['routineid']) as $res){
                                    echo "<span class='etiqueta'>$res[grupo]</span>";
                                }
                                echo "</div>";
                                echo "<div class='textoverdiv'>";
                                    echo "<p class='text-white m0'>$res[categoria]</p>";
                                    echo "<span class='textover'>$res[objetivorutina]</span>";
                                echo "</div>";
                            echo "</a>";
                        echo "</div>";
                    }
                    
                    ?>
                </div>
            </section>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-container">
            <div class="footerrow">
                <div class="footercol">
                    <p class="copy"><a href="../aboutus.php"> Sobre nosotros</a></p>
                </div>       
            </div>
            <hr style="border-top-color: rgba(255, 255, 255, 0.2)">
            <div>
                <p class="copy">Copyright © Sthenos Project Online 2022</p>
            </div>
        </div>
    </footer>      
    <script src="../assets/js/desplegable.js"></script>
    <script src="../assets/js/responsivenav.js"></script>
</body>
</html>