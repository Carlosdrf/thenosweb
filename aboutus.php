<?php

include_once 'php/registro_login.php';

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
        
        <div class="encabezado">
            <div class="portada">
                <section class="text">
                    <div class="col">
                        <h1>Portal de disciplina y entrenamiento <br> para la fuerza funcional</h1>
                        <p>Obten la mejor version de ti</p>
                    </div>
                </section>
            </div>
        </div>
        <div class="cuerpo">
            <section class="descripcion">
                <div class="container">
                    <div class='columna'>
                        <h2>Sobre ThenosWeb Online</h2>
                        <p>ThenosWeb es un proyecto enfocado en promover el cuidado de la salud y la actividad fisica 
                            con entrenamientos que puedes realizar tanto en el gimnasio como en casa o incluso plazas y 
                            parques, sin necesidad de tener experiencia previa.
                        </p>
                        <br>
                        <p>Esta web va dirigida tanto para personas ya avanzadas como para principiantes, tambien ofreciendo
                            herramientas que le permitan al usuario conocer aspectos generales sobre lo que puede significar 
                            su peso actual y asi poder darle un cambio a su vida sin necesidad de un gimnasio o equipo de entrenamiento
                        </p>
                    </div>
                </div>
            </section>
            <!-- <section class="descripcion dark">
                <div class="container">
                    <div class="sugeridos ">
                        <div class='suggested'>
                            <div class='profile'>
                                <img src='img/alan.jpg' alt=''>
                                <div class='absolute'>
                                    <span class='etiqueta'>20 años</span>
                                </div>
                                <div class='textoverdiv'>
                                    <span class='textover'>Cañizalez, Alan</span>
                                </div>
                            </div>
                            
                        </div>
                        <div class='suggested'>
                            <div class='profile'>
                                <img src='img/alan.jpg' alt=''>
                                <div class='absolute'>
                                    <span class='etiqueta'>21 años</span>
                                </div>
                                <div class='textoverdiv'>
                                    <span class='textover'>Marquez, Gabriel</span>
                                </div>
                            </div>
                            
                        </div>
                        <div class='suggested'>
                            <div class='profile'>
                                <img src='img/alan.jpg' alt=''>
                                <div class='absolute'>
                                    <span class='etiqueta'>21 años</span>
                                </div>
                                <div class='textoverdiv'>
                                    <span class='textover'>Rivas, Carlos</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section> -->
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