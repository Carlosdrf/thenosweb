<?php
include_once 'sesion_user.php';
include_once 'user.php';


    $user = new User();
    $userSession = new UserSession();
    if(isset($_SESSION['correo'])){
        // echo "hay sesion";
        $user->setUser($userSession->getCurrentUser());
      
    }else if (!empty($_POST['nombre']) || !empty($_POST['correo']) && !empty($_POST['contrasena'])){
        
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $username = $_POST['usuario'];
        $pass = $_POST['contrasena'];
        $peso = $_POST['peso'];
        $edad = $_POST['edad'];
        $altura = $_POST['altura'];
        $genero = $_POST['genero'];
        $nivel = $_POST['nivel'];
        $objetivo = $_POST['objetivo'];
        $actividad = $_POST['actividad'];

        if($genero == 1){
            $gastocal = 10*$peso + 6.25*$altura - 5*$edad -161;
            if($actividad ==1){
                $calneed = $gastocal * 1.2;
            }elseif($actividad == 2){
                $calneed = $gastocal * 1.375;
            }elseif($actividad == 3){
                $calneed = $gastocal * 1.55;
            }elseif($actividad == 4){
                $calneed = $gastocal * 1.725;
            }else{
                $calneed = $gastocal * 1.9;
            }
        }else{
            $gastocal = 10*$peso + 6.25*$altura - 5*$edad +5;
            if($actividad ==1){
                $calneed = $gastocal * 1.2;
            }elseif($actividad == 2){
                $calneed = $gastocal * 1.375;
            }elseif($actividad == 3){
                $calneed = $gastocal * 1.55;
            }elseif($actividad == 4){
                $calneed = $gastocal * 1.725;
            }else{
                $calneed = $gastocal * 1.9;
            }
        }
        if($objetivo==1){
            $protesneed = $peso * 1.3;
        }elseif($objetivo==2){
            $protesneed = $peso * 1.64;
        }elseif($objetivo == 3){
            $protesneed = $peso * 0.79;
        }elseif($objetivo == 4){
            $protesneed = $peso * 1.3;
        }else{
            $protesneed = $peso * 1.64;
        }
        
        if($user->userExists($correo, $pass, $username)){
            echo "<script>alert('ya existe el usuario');</script>";
        }else{
            $user->registrar($nombre, $apellido, $correo, $pass, $peso, $edad, $altura, $genero, $nivel, $username, $calneed, $protesneed, $objetivo, $actividad);
                echo 
                "<script>
                alert('Nuevo usuario creado exitosamente');
                </script>";
            $userSession->setCurrentUser($correo);
            $user->setUser($correo);
            $user->addHistorial($user->getUserId(), $user->getPeso(), $user->getEdad(), $user->getGenero(), $user->getNivel(), $user->getObjetivo());

        }
    }else if(isset($_POST['correol']) && isset($_POST['contrasenal'])){
        
        $userForm = $_POST['correol'];
        $passForm = $_POST['contrasenal'];

        if($user->userExists($userForm, $passForm, $userForm)){
            // echo "Existe el usuario";
            if($user->logear($userForm, $passForm, $userForm)){
                // logear
                
                $user->setUser($userForm);
                $userSession->setCurrentUser($user->getCorreo());
            }else{
                $msgerror = 'Usuario o contraseña equivocados';
                echo "<script>
            alert('$msgerror');
            </script>"; 
            }
        }else{
            //echo "No existe el usuario";
            $msgerror = 'registrate en el portal';
            echo 
            "<script>
            alert('$msgerror');
            </script>";            
        }
    }else{
        //echo "login";  
    }
?>