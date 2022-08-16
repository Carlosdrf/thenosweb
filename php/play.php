<?php

class Play extends DB{

    public function mostrarvideos(){
        $query = $this->connect()->prepare('SELECT * FROM exercises ORDER BY nombreplay');
        $query->execute();
        $resultado = $query->fetchAll();
        return $resultado;  
    }

    public function searchExercise($nombre){
        $query = $this->connect()->prepare("SELECT * FROM `exercises` WHERE  nombreplay LIKE :nombreplay;");
        $query->bindParam(':nombreplay', $nombre);
        $query->execute();
        $resultado = $query->fetchAll();
        return $resultado;
    }
    public function searchGrupo($grupo){
        $query = $this->connect()->prepare("SELECT * FROM `grupomuscular` INNER JOIN grupoejercicio on grupomuscular.idgrupo = grupoejercicio.id_grupo
        INNER JOIN exercises on exercises.idejercicio = grupoejercicio.id_ejercicio where grupomuscular.grupo LIKE :grupo;");
        $query->bindParam(':grupo', $grupo);
        $query->execute();
        $resultado = $query->fetchAll();
        return $resultado;
    }
    

    public function mostrarGrupo($id){
        $query = $this->connect()->prepare('SELECT grupo FROM `grupomuscular` INNER JOIN grupoejercicio on grupomuscular.idgrupo = grupoejercicio.id_grupo
        INNER JOIN exercises on exercises.idejercicio = grupoejercicio.id_ejercicio where idejercicio = :idejercicio');
        $query->bindParam(':idejercicio', $id);
        $query->execute();
        $group = $query->fetchAll();
        return $group;
    }
    public function mostrarEjercicioRutina($id_rutina){
        $query = $this->connect()->prepare('SELECT * FROM `exercises` INNER JOIN rutinaejercicio 
        on exercises.idejercicio = rutinaejercicio.id_ejercicio where id_rutina = :id_rutina');
        $query->bindParam(':id_rutina', $id_rutina);
        $query->execute();
        $resultado = $query->fetchAll();
        return $resultado;
    }
    public function datoRutinas(){
        $query = $this->connect()->prepare('SELECT * FROM `rutinas`');
        $query->execute();
        $resultado = $query->fetchAll();
        return $resultado;
    }
    public function getRutinaObjetivo($routineid){
        $query = $this->connect()->prepare('SELECT * FROM `rutinas` where routineid = :routineid');
        $query->bindParam(':routineid', $routineid);
        $query->execute();
        $resultado = $query->fetchAll();
        return $resultado;
    }
    public function grupoRutina($idrutina){
        $query = $this->connect()->prepare('SELECT * FROM `rutinas` INNER JOIN rutinasmuscular ON rutinas.routineid 
        = rutinasmuscular.id_rutina INNER JOIN grupomuscular ON grupomuscular.idgrupo = rutinasmuscular.id_grupo 
        WHERE id_rutina = :rutinaid;');
        $query->bindParam(':rutinaid', $idrutina);
        $query->execute();
        $resultado = $query->fetchAll();
        return $resultado;
    }
    public function recommendedRutinas($objetivo1, $objetivo2){
        $query = $this->connect()->prepare('SELECT * FROM rutinas WHERE objetivorutina = :objetivo1 or objetivorutina = :objetivo2;');
        $query->bindParam(':objetivo1', $objetivo1);
        $query->bindParam(':objetivo2', $objetivo2);
        $query->execute();
        $resultado = $query->fetchAll();
        return $resultado;
    }
    public function recommendedCategoria($categoria){
        $query = $this->connect()->prepare('SELECT * FROM rutinas WHERE nivelrutina = :nivel');
        $query->bindParam(':nivel', $categoria);
        $query->execute();
        $resultado = $query->fetchAll();
        return $resultado;
    }

    public function getRounds($idrutina){
        $query = $this->connect()->prepare("SELECT * FROM rutinas WHERE routineid = :routineid");
        $query->bindParam(':routineid', $idrutina);
        $query->execute();
        foreach($query as $currentround){
            $this->round = $currentround['defaultrounds'];
        }
        return $this->round;
    }
}

?>
