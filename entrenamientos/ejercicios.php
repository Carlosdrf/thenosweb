<?php

include_once '../php/registro_login.php';
include_once '../php/play.php';

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
                        <h1>Libreria de ejercicios</h1>
                    </div>
                </section>
            </div>
        </div>
        <div class="cuerpo">
            <section class="suggcontainer">
                <div class="container-exercise">
                    <form action="" method="post">
                        <div class="card-lista shadow">
                            <div class="list-body">
                                <div class="searchgroup flex">
                                    <input type="text" name="search" class="searchbar" onclick="this.select();">
                                    <div class="flex">
                                        <?php
                                        if(empty($_POST['search'])){
                                            echo '<button class="searchbtn">Buscar</button>';
                                            }else{
                                                echo '<button class="searchbtn">Buscar</button>';
                                                echo '<div class="center">';
                                                    echo '<a href="ejercicios.php" class="btnsalir">Volver</a>';
                                                echo '</div>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group list-group-flush">
                            <?php
                                $play = new Play();
                                if(!empty($_POST['search'])){
                                    $busqueda = "%".$_POST['search']."%";
                                    foreach($play->searchGrupo($busqueda) as $res){
                                        echo"<a class='list-group-item' data-toggle='modal' data-target='#js-modal' data-remote='true' href='../$res[url]'>";
                                            echo"<div class='content-container'>";
                                                echo "<div class='videocont'>";
                                                    echo "<video class='roundedimg' src='../$res[url]' controls height='auto' width='400px'></video>";
                                                echo "</div>";
                                                echo "<div class='media-body'>";
                                                    echo "<h6 class='media-body-text'>$res[nombreplay]</h6>";
                                                    echo "<p class='media-body-text'><b>Equipamiento:</b> $res[equipamiento]</p>";
                                                    echo "<p class='media-body-text'><b>Nivel de dificultad:</b> $res[nivel]</p>";
                                                    echo"<div class='musclegroup'>";
                                                        echo "<p class='media-body-text'><b>Grupo muscular:</b> </p>";
                                                        echo "<div>";
                                                            foreach($play->mostrarGrupo($res['idejercicio']) as $gru){
                                                                echo "<span class='etiqueta'>$gru[grupo] </span>";
                                                            }
                                                        echo "</div>";
                                                    echo "</div>";
                                                echo "</div>";
                                            echo "</div>";
                                        echo "</a>"; 
                                    }
                                }else{
                                    foreach($play->mostrarvideos() as $res){
                                        echo"<a class='list-group-item' id='overlay-video' data-toggle='modal' data-target='#js-modal' data-remote='true' href='../$res[url]'>";
                                            echo"<div class='content-container'>";
                                                echo "<div id='videocontenedor' class='videocont'>";
                                                    echo "<video class='roundedimg' src='../$res[url]' controls height='auto' width='400px'></video>";
                                                echo "</div>";                                                    
                                                echo "<div class='media-body'>";
                                                    echo "<h6 class='media-body-text'>$res[nombreplay]</h6>";
                                                    echo "<p class='media-body-text'><b>Equipamiento:</b> $res[equipamiento]</p>";
                                                    echo "<p class='media-body-text'><b>Nivel de dificultad:</b> $res[nivel]</p>";
                                                    echo"<div class='musclegroup'>";
                                                        echo "<p class='media-body-text'><b>Grupo muscular:</b> </p>";
                                                        echo "<div>";
                                                            foreach($play->mostrarGrupo($res['idejercicio']) as $gru){
                                                                echo "<span class='etiqueta'>$gru[grupo] </span>";
                                                            }
                                                        echo "</div>";
                                                    echo "</div>";
                                                echo "</div>";
                                            echo "</div>";
                                        echo "</a>"; 
                                    }
                                }
                            ?>  
                            </div>                              
                        </div>
                    </form>
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
    <div></div>
    <div class="modal-backdrop fade">
        
    </div>
    <script src="../assets/js/playvid.js"></script>
    <script src="../assets/js/desplegable.js"></script>
    <script src="../assets/js/responsivenav.js"></script>
</body>
</html>