<?php

if(array_key_exists('update', $_POST)) {

    $objetivo = $_POST['objetivo'];
    $correo = $_POST['correo'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
    $edad = $_POST['edad'];
    $genero = $_POST['genero'];
    $nivel = $_POST['nivel'];
    $objetivo = $_POST['objetivo'];
    $usuario = $_POST['usuario'];
    $actividad = $_POST['actividad'];

    if($genero == "Mujer"){
        $gastocal = 10*$peso + 6.25*$altura - 5*$edad -161;
        if($actividad == "Poco o nada de ejercicio"){
            $calneed = $gastocal * 1.2;
        }elseif($actividad == "Poco ejercicio (1-3 dias a la semana)"){
            $calneed = $gastocal * 1.375;
        }elseif($actividad == "Promedio (3-5 dias a la semana)"){
            $calneed = $gastocal * 1.55;
        }elseif($actividad == "Mucho ejercicio (6-7 dias a la semana)"){
            $calneed = $gastocal * 1.725;
        }else{
            $calneed = $gastocal * 1.9;
        }
    }else{
        $gastocal = 10*$peso + 6.25*$altura - 5*$edad +5;
        if($actividad == "Poco o nada de ejercicio"){
            $calneed = $gastocal * 1.2;
        }elseif($actividad == "Poco ejercicio (1-3 dias a la semana)"){
            $calneed = $gastocal * 1.375;
        }elseif($actividad == "Promedio (3-5 dias a la semana)"){
            $calneed = $gastocal * 1.55;
        }elseif($actividad == "Mucho ejercicio (6-7 dias a la semana)"){
            $calneed = $gastocal * 1.725;
        }else{
            $calneed = $gastocal * 1.9;
        }
    }
    if($objetivo== "Bajar de peso/definicion"){
        $protesneed = $peso * 1.3;
    }elseif($objetivo== "Aumento de masa muscular"){
        $protesneed = $peso * 1.64;
    }elseif($objetivo == "Flexibilidad/Mantener salud"){
        $protesneed = $peso *0.79;
    }elseif($objetivo == "Resistencia"){
        $protesneed = $peso * 1.3;
    }else{
        $protesneed = $peso * 1.64;
    }
    $user->addHistorial($user->getUserId(), $peso, $edad, $genero, $nivel, $objetivo);
    $user->modificar($nombre, $apellido, $correo, $peso, $edad, $altura, $genero, $nivel, $usuario, $calneed, $protesneed, $objetivo, $actividad);
    echo '<script>
    window.location.replace("account.php");
    </script>';
}

?>