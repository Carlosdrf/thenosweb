<?php

include_once '../alimentacion/user_food.php';

if(!empty($_POST["idcomida"])){
    
    $idfood = $_POST["idcomida"];
    foreach($idfood as $id){
        $id;     
    }
    $alimentos->deleteFood($id);
    echo '<script>
    alert(eliminado con exito)
    </script>';
    echo '<script>
    window.location.replace("../alimentacion/user_food.php");
    </script>';
}
?>