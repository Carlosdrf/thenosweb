<?php
class alimentos extends DB{
    public function mostrarAlimentos(){
        $query = $this->connect()->prepare('SELECT * FROM alimentos');
        $query->execute();
        $resultado = $query->fetchAll();
        return $resultado;  
    }
    public function searchFood($nombre){
        $query = $this->connect()->prepare("SELECT * FROM `alimentos` WHERE nombrealimento LIKE :nombre");
        $query->bindParam(':nombre', $nombre);
        $query->execute();
        $resultado = $query->fetchAll();
        return $resultado;
    }

    public function setFood($idcomida){
        $query = $this->connect()->prepare('SELECT * FROM alimentos WHERE id_food = :id');
        $query->execute(['id' => $idcomida]);
        
        foreach ($query as $currentFood) {
            $this->idcomida = $currentFood['id_food'];
            $this->nombre = $currentFood['nombrealimento'];
            $this->energetico = $currentFood['valorenergetico'];
            $this->carbs = $currentFood['carbs'];
            $this->prote = $currentFood['prote'];
            $this->grasas = $currentFood['grasas'];
        }
    }
    public function foodExists($idalimentos, $idsusercomida){
        $query = $this->connect()->prepare('SELECT * FROM comidas WHERE comidas.idalimentos = :idalimentos AND comidas.id_usercomida = :id_usercomida');
        $query->bindParam(':idalimentos', $idalimentos);
        $query->bindParam(':id_usercomida', $idsusercomida);
        $query->execute();

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }
    public function editFood($porcioncomidagr, $valorcomida, $carbscomida, $protecomida, $grasascomida, $idalimentos, $idsusercomida){
        $query = $this->connect()->prepare('UPDATE comidas  SET porcioncomidagr =:porcioncomidagr, valorcomida = :valorcomida, 
        carbscomida = :carbscomida, protecomida = :protecomida, grasascomida = :grasascomida, idalimentos = :idalimentos, id_usercomida =  :id_usercomida
        WHERE idalimentos = :idalimentos1 AND id_usercomida = :id_usercomida1');
        $query->execute(array(
            ':porcioncomidagr' => $porcioncomidagr,
            ':valorcomida' => $valorcomida,
            ':carbscomida' => $carbscomida,
            ':protecomida' => $protecomida,
            ':grasascomida' => $grasascomida,
            ':idalimentos' => $idalimentos,
            ':id_usercomida' => $idsusercomida,
            ':idalimentos1' => $idalimentos,
            ':id_usercomida1' => $idsusercomida
        ));
        
    }
    public function addFood($porcioncomidagr, $valorcomida, $carbscomida, $protecomida, $grasascomida, $idalimentos, $idsusercomida){
        $query = $this->connect()->prepare('INSERT INTO comidas (porcioncomidagr, valorcomida, carbscomida, protecomida, grasascomida, idalimentos, id_usercomida) 
        VALUES (:porcioncomidagr, :valorcomida, :carbscomida, :protecomida, :grasascomida, :idalimentos, :id_usercomida);');
        $query->execute(array(
            ':porcioncomidagr' => $porcioncomidagr,
            ':valorcomida' => $valorcomida,
            ':carbscomida' => $carbscomida,
            ':protecomida' => $protecomida,
            ':grasascomida' => $grasascomida,
            ':idalimentos' => $idalimentos,
            ':id_usercomida' => $idsusercomida,
        ));
        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }
    public function showDiet($idcomida){
        $query = $this->connect()->prepare('SELECT * FROM comidas INNER JOIN alimentos ON comidas.idalimentos = alimentos.id_food
        INNER JOIN usuarios ON comidas.id_usercomida = usuarios.id WHERE id_usercomida = :id');
        $query->bindParam(':id', $idcomida);
        $query->execute();
        $resultado = $query->fetchAll();
        return $resultado;
    }
    public function deleteFood($idcomida){
        $query = $this->connect()->prepare('DELETE FROM comidas WHERE id_comida = :idcomida');
        $query->bindParam(':idcomida', $idcomida);
        $query->execute();
    }

    public function getIdFood(){
        return $this->idcomida;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getValor(){
        return $this->energetico;
    }
    public function getCarbs(){
        return $this->carbs;
    }
    public function getProte(){
        return $this->prote;
    }
    public function getGrasas(){
        return $this->grasas;
    }
    
}
?>
                