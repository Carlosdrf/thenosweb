<?php
$alimentos = new alimentos();

    // agregar nueva porcion
    if(!empty($_POST["gramosusar"])){
        $valor = $_POST["valor"];
        $protes = $_POST["prote"];
        $carbs = $_POST["carbs"];
        $grasas = $_POST["grasas"];
        $gringresados = $_POST["gramosusar"];
        $idfood = $_POST["idfood"];

        foreach($idfood as $id){
            $id;     
        }
        foreach($gringresados as $gr){
            $gr;     
        }
        foreach($valor as $v){
            $v;
        }
        foreach($protes as $p){
            $p;
        }
        foreach($carbs as $c){
            $c;
        }
        foreach($grasas as $g){
            $g;
        }
        if(is_numeric($gr)){
            $resenergetico = $gr*$v/100;
            $resprotes = $gr*$p/100;
            $rescarbs = $gr*$c/100;
            $resgrasas = $gr*$g/100;
            $idcurrentuser = $user->getUserId();
            // verificar si ya el alimento fue agregado anteriormente
            if($alimentos->foodExists($id, $idcurrentuser)){
                echo "<script>
                    alert('Este elemento ya se encuentra en tu cuenta, intenta mejor modificar el consumo en tu planificacion');
                </script>";
            }else{
                // agregar nueva porcion
                $alimentos->addFood($gr, $resenergetico, $rescarbs, $resprotes, $resgrasas, $id, $user->getUserId());
                echo "<script>alert('ejecutado exitosamente'); </script>";
            }
            
        }else{
            echo "<script>alert('El campo no puede estar vacio');</script>";
        }
    }else{
        
    }

?>