<?php

include_once 'php/registro_login.php';
include_once 'php/recuperarpw.php';

if(isset($_SESSION['correo'])){
    
    echo '<script>
    window.location.replace("index.php");
    </script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thenos</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body class="sign-up-body">
    <main>
        <div class="contenedor__todo">
            <div class="nav fixed-top">
                <div class="menu">
                    <span class="brand"><a href="index.php" class="navlink active">THENOSWEB</a></span>
                    <div>
                        <button class="nav-btn " id="nav-btn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en ThenosWeb</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión en ThenosWeb</p>
                    <button id="btn__registrarse">Regístrarse</button>
                </div>
            </div>
            <!--Formulario de Login y registro-->
            <div class="contenedor__login-register">
                <!--Login-->
                <form action="" class="formulario__login" method="POST">
                    <h2>Iniciar Sesión</h2>
                    <input type="text" placeholder="Correo Electronico" name="correol" pattern=".+\.com">
                    <input type="password" placeholder="Contraseña" name="contrasenal">
                    <div class="recuperarpw">
                        <a onclick="abrirform()" class="white">Olvide mi contraseña</a>
                    </div>
                    <button>Entrar</button>
                </form>
                <!--Register-->
                <form action="" method="POST" class="formulario__register">
                    <h2>Regístrarse</h2>
                    <div class="parte1">
                        <input type="text" placeholder="Nombre" required name="nombre">
                        <input type="text" placeholder="Apellido" required name="apellido">
                        <input type="text" placeholder="Correo Electronico" required name="correo" pattern=".+\.com">
                        <input type="text" placeholder="Usuario" required name="usuario">
                        <input type="password" placeholder="Contraseña" required name="contrasena">
                        <div class="next">
                            <span id="btnnext">Siguiente</span>
                        </div>
                    </div>
                    <div class="parte2" style="display: none">
                        <div style="display: flex">
                            <input  style="width: 49%; margin-right: auto" required type="number" placeholder="Peso" name="peso">
                            <input style="width: 48%" type="number" required placeholder="Edad" name="edad">
                        </div>
                        <input type="number" placeholder="Altura" name="altura">
                        <select name="genero" required>
                            <option value="">-Genero-</option>
                            <option value="1">Mujer</option>
                            <option value="2">Hombre</option>
                        </select>
                        <select name="actividad" required>
                            <option value="">-Actividad fisica-</option>
                            <option value="1">Poco o nada de ejercicio</option>
                            <option value="2">Poco ejercicio (1-3 dias a la semana)</option>
                            <option value="3">Promedio (3-5 dias a la semana)</option>
                            <option value="4">Mucho ejercicio (6-7 dias a la semana)</option>
                            <option value="5">Pesado (2 veces al dia)</option>
                        </select>
                        <select name="nivel" required>
                            <option value="">Nivel de condicion</option>
                            <option value="1">Principiante</option>
                            <option value="2">Intermedio</option>
                            <option value="3">Avanzado</option>
                        </select>
                        <select name="objetivo" required>
                            <option value="">Objetivo a perseguir</option>
                            <option value="1">Bajar de peso/Definir</option>
                            <option value="2">Aumento de masa muscular</option>
                            <option value="3">Flexibilidad/Por salud</option>
                            <option value="4">Resistencia</option>
                            <option value="5">Fuerza</option>
                        </select>
                        <div class="backregister">
                            <div class="back">
                                <span id="btnback">Atras</span>
                            </div>
                            <button>Regístrarse</button>
                        </div>
                    </div>        
                </form>
            </div>
        </div>
    </main>
    <div class="caja_popup" id="formrecuperar">
        <form action="php/recuperarpw.php" class="contenedor_popup" method="POST">
            <div class='tbrecover'>
                <div><h3>Recuperar contraseña</h3></div>
                <div> 
                    <td><input type="email" name="txtcorreo" required placeholder="Ingresar correo" class="cajaentradatexto" pattern=".+\.com" ></td>
                </div>
                <div> 	
                    <td>
                        <button type="button" onclick="cancelarform()" class="txtrecuperar">Cancelar</button>
                        <input class="txtrecuperar" type="submit" name="btnrecuperar" value="Enviar" onClick="javascript: return confirm('¿Deseas enviar tu contraseña a tu correo?');">
                    </td>
                </div>
            </div>
        </form>
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
    <script>
        function abrirform() {
            document.getElementById("formrecuperar").style.display = "block";
        }

        function cancelarform() {
            document.getElementById("formrecuperar").style.display = "none";
        }
    </script>

</body>
<script src="assets/js/script.js"></script>
<script src="assets/js/desplegable.js"></script>
<script src="assets/js/responsivenav.js"></script>
</html>