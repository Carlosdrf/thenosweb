<?php
$alimentos = new alimentos();

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
        // modificar porcion
        $alimentos->editFood($gr, $resenergetico, $rescarbs, $resprotes, $resgrasas, $id, $user->getUserId());            
    }else{
        echo "<script>alert('El campo no puede estar vacio');</script>";
    }
}

?>