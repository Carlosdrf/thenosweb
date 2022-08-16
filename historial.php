<?php

include_once 'php/registro_login.php';
include_once 'php/updateprofile.php';
include_once 'php/nutricion.php';
$x=0;
if(!isset($_SESSION['correo'])){
    echo '
    <script>
    alert("por favor debes iniciar sesion");
    window.location = "Sign_Up.php";
    </script>';
}
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
                    <button class="nav-btn" id="nav-btn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="nav-icon"></span>
                    </button>
                 </div>
                <div class="collapse" id="collapse">
                    <ul>
                        <li class="navitem"><a class="navlink" href="entrenamientos.php"> Entrenamientos</a></li>
                        <li class="navitem"><a class="navlink" href="alimentacion.php"> Alimentacion</a></li>
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

        <div class="encabezado" >
            <div class="portada">
                <section class="text" style="height: 250px;">
                    <div>
                        <div>
                            <h1><?php echo $user->getNombre();?> <?php echo $user->getApellido();?></h1>
                            <p>@<?php echo $user->getUsername();?></p>
                        </div>
                        <div>
                            <a href="account.php" class='linkhistory'><b>Volver</b></a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="cuerpo">
            <section class="descripcion">
            <div class="container">
                <div class="card-lista shadow"> 
                    <div class="list-body">
                        <h3>Historial de modificaciones de tu perfil</h3>
                    </div>
                    <div class="list-group list-group-flush">
                    <?php                        
                        foreach($user->showHistorial($user->getUserId()) as $mostrar){
                            echo"<a class='list-group-item'>";
                                echo"<div class='content-container'>";
                                    echo "<div class='videocont'>";
                                        echo "<h3 class='media-body-title'>$mostrar[fechaingreso]</h3>";
                                    echo "</div>";
                                    echo "<div class='media-body'>";
                                        echo "<p class='media-body-text'><b>Edad:</b> $mostrar[edadhistorial] años </p>";
                                    echo "</div>";
                                    echo "<div class='media-body'>";
                                        echo "<p class='media-body-text'><b>Peso:</b> $mostrar[pesohistorial] kg </p>";
                                    echo "</div>";
                                    echo "<div class='media-body'>";
                                        echo "<p class='media-body-text'><b>Genero:</b> $mostrar[generohistorial] </p>";
                                    echo "</div>";
                                    echo "<div class='media-body'>";
                                        echo "<p class='media-body-text'><b>Objetivo:</b> $mostrar[objetivohistorial] </p>";
                                    echo "</div>";
                                    echo "<div class='media-body'>";
                                        echo "<p class='media-body-text'><b>Nivel:</b> $mostrar[nivelhistorial] </p>";
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
                    <p class="copy"><a href="aboutus.php"> Sobre nosotros</a></p>
                </div>       
            </div>
            <hr style="border-top-color: rgba(255, 255, 255, 0.2)">
            <div>
                <p class="copy">Copyright © Sthenos Project Online 2022</p>
            </div>
        </div>
    </footer>     
    <script src="assets/js/desplegable.js"></script>
    <script src="assets/js/responsivenav.js"></script>
</body>
</html>
