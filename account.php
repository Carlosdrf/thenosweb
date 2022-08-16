<?php

include_once 'php/registro_login.php';
include_once 'php/updateprofile.php';

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
                            <a href="historial.php" class='linkhistory'><b>Accede aqui a tu historial de registros</b></a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="cuerpo">
            <section class="descripcion">
                <div class="container ">
                    <form action="" method="post">
                        <div class="row">
                            <div class="colgroup colsmll">
                                <div class="formgroup">
                                    <label for="name">Nombre:</label>
                                    <input type="text" name="nombre" class="formcontrol" value="<?php echo $user->getNombre(); ?>">
                                </div>
                            </div>
                            <div class="colgroup colsmll">
                                <div class="formgroup">
                                    <label for="lastname">Apellido:</label>
                                    <input type="text" name="apellido" class="formcontrol" value="<?php echo $user->getApellido(); ?>">
                                </div>
                            </div>
                            <div class="colgroup colsmll">
                                <div class="formgroup">
                                    <label for="name">Peso:</label>
                                    <input type="text" name="peso" class="formcontrol" value="<?php echo $user->getPeso(); ?>" onclick="this.select();" onkeypress='return (event.charCode >= 48 && event.charCode <= 57)'>
                                </div>
                            </div>
                            <div class="colgroup colsmll">
                                <div class="formgroup">
                                    <label for="lastname">Altura:</label>
                                    <input type="text" name="altura" class="formcontrol" value="<?php echo $user->getAltura(); ?>" onclick="this.select();" onkeypress='return (event.charCode >= 48 && event.charCode <= 57)'>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="colgroup colsmll">
                                <div class="formgroup">
                                    <label for="name">Edad:</label>
                                    <input type="text" name="edad" class="formcontrol" value="<?php echo $user->getEdad();?>" onclick="this.select();" onkeypress='return (event.charCode >= 48 && event.charCode <= 57)'>
                                </div>
                            </div>
                            <div class="colgroup colsmll">
                                <div class="formgroup">
                                    <label for="lastname">Genero:</label>
                                    <select name="genero" class="formcontrol" required>
                                        <option <?php echo ($user->getGenero() == "Mujer")?"selected":""; ?> value="Mujer">Mujer</option>
                                        <option <?php echo ($user->getGenero() == "Hombre")?"selected":""; ?> value="Hombre">Hombre</option>
                                    </select>
                                </div>
                            </div>
                            <div class="colgroup colsmll">
                                <div class="formgroup">
                                    <label for="objetivo">Objetivo:</label>
                                    <select name="objetivo" class="formcontrol" required>
                                        <option <?php echo ($user->getObjetivo() == "Bajar de peso/definicion")?"selected":""; ?> value="Bajar de peso/definicion">Bajar de peso/Definir</option>
                                        <option <?php echo ($user->getObjetivo() == "Aumento de masa muscular")?"selected":""; ?> value="Aumento de masa muscular">Aumento de masa muscular</option>
                                        <option <?php echo ($user->getObjetivo() == "Flexibilidad/Mantener salud")?"selected":""; ?> value="Flexibilidad/Mantener salud">Flexibilidad/Por salud</option>
                                        <option <?php echo ($user->getObjetivo() == "Resistencia")?"selected":""; ?> value="Resistencia">Resistencia</option>
                                        <option <?php echo ($user->getObjetivo() == "Fuerza")?"selected":""; ?> value="Fuerza">Fuerza</option>
                                    </select>
                                </div>
                            </div>
                            <div class="colgroup colsmll">
                                <div class="formgroup">
                                    <label for="name">Nivel:</label>
                                    <select name="nivel" class="formcontrol" required>
                                        <option <?php echo ($user->getNivel() == "Principiante")?"selected":""; ?> value="Principiante">Principiante</option>
                                        <option <?php echo ($user->getNivel() == "Intermedio")?"selected":""; ?> value="Intermedio">Intermedio</option>
                                        <option <?php echo ($user->getNivel() == "Avanzado")?"selected":""; ?> value="Avanzado">Avanzado</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="colgroup colgroup2">
                                <div class="formgroup">
                                    <label for="mail">Email:</label>
                                    <input type="text" name="correo" class="formcontrol" value="<?php echo $user->getCorreo(); ?>">
                                </div>
                            </div>
                            <div class="colgroup colgroup2">
                                <div class="formgroup">
                                    <label for="username">Usuario:</label>
                                    <input type="text" name="usuario" class="formcontrol" value="<?php echo $user->getUsername(); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="colgroup colgroup3">
                                <div class="formgroup">
                                    <label for="mail">Actividad:</label>
                                    <select name="actividad" class="formcontrol" required>
                                        <option <?php echo ($user->getActividad() == "Poco o nada de ejercicio")?"selected":""; ?> value="Poco o nada de ejercicio">Poco o nada de ejercicio</option>
                                        <option <?php echo ($user->getActividad() == "Poco ejercicio (1-3 dias a la semana)")?"selected":""; ?> value="Poco ejercicio (1-3 dias a la semana)">Poco ejercicio (1-3 dias a la semana)</option>
                                        <option <?php echo ($user->getActividad() == "Promedio (3-5 dias a la semana)")?"selected":""; ?> value="Promedio (3-5 dias a la semana)">Promedio (3-5 dias a la semana)</option>
                                        <option <?php echo ($user->getActividad() == "Mucho ejercicio (6-7 dias a la semana)")?"selected":""; ?> value="Mucho ejercicio (6-7 dias a la semana)">Mucho ejercicio (6-7 dias a la semana)</option>
                                        <option <?php echo ($user->getActividad() == "Muy pesado (2 veces al dia)")?"selected":""; ?> value="Muy pesado (2 veces al dia)">Muy pesado (2 veces al dia)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="colgroup colgroup2 colgroup3">
                                <div class="formgroup">
                                    <label for="username">Calorias aproximadas necesarias por dia:</label>
                                    <input type="text" name="calorias" readonly class="formcontrol" value="<?php echo $user->getCaloria(); ?>">
                                </div>
                            </div>
                            <div class="colgroup colgroup2 colgroup3">
                                <div class="formgroup">
                                    <label for="username">Proteinas aproximadas necesarias por dia:</label>
                                    <input type="text" name="proteinas" readonly class="formcontrol" value="<?php echo $user->getProtein(); ?>">
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div  style="margin-top: 12px; padding-right: 8px; padding-left: 8px;">
                                <?php 
                                    $gender = $user->getGenero();
                                    $age = $user->getEdad();
                                    $height = $user->getAltura();
                                    if($gender == "Hombre"){
                                        $pesoIdeal = $height - 100 -(($height - 150)/4) + (($age - 20)/4);
                                    }else{
                                        $pesoIdeal = $height - 100 -(($height - 150)/2.5) + (($age - 20)/2.5);

                                    }
                                ?>
                                <span><b> Tu peso ideal aproximado es: <?php echo round($pesoIdeal); ?> kg</b></span>
                                 <p>El rango de peso ideal saludable es un promedio basado en el cálculo del IMC, el cual fue 
                                    desarrollado para evaluar a todas las personas, sin tener en cuenta factores personales,
                                    como la cantidad de masa muscular, algunos problemas de salud o la densidad ósea.
                                </p>
                            </div>
                            
                        </div>
                        
                        <div class="submit-field mb-5">
                            <input type="submit" name="update" value="Guardar" class="btn" data-disable-with="Save" onclick="modificar();">
                        </div>
                    </form>
                    <div class="card-delete mb-5">
                        <div class="card-body">
                            <h3 class="card-title">Danger zone</h3>
                            <p>Esto borrará tu cuenta en Thenosweb y toda la informacion asociada. Luego de esto no podras recuperar tus datos nuevamente</p>
                            <div class="">
                                <a href="php/delete.php" name="delete" value="Eliminar cuenta" class="redbtn" data-disable-with="Save">Eliminar cuenta</a>
                            </div>
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
