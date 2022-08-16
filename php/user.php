<?php
include_once 'conexion_be.php';

class User extends DB{
    
    private $nombre;
    private $correo;

    public function registrar($nombre, $apellido, $correo, $pass, $peso, $edad, $altura, $genero, $nivel, $username, $calneed, $protesneed, $objetivo, $actividad){
 
        $query = $this->connect()->prepare('INSERT INTO usuarios(nombre,apellido, correo, pass, peso, edad, altura, genero, nivel, username, calneed, protesneed, objetivo, actividad) 
        VALUES(:nombre, :apellido, :correo, :pass, :peso,:edad, :altura, :genero, :nivel, :username, :calneed, :protesneed, :objetivo, :actividad)');
        $query->execute(array(
            ':nombre' => $nombre,
            ':apellido' => $apellido,
            ':correo' => $correo,
            ':pass' => $pass,
            ':peso' => $peso,
            ':edad' => $edad,
            ':altura' => $altura,
            ':genero' => $genero,
            ':nivel' => $nivel,
            ':username' => $username,
            ':calneed' => $calneed,
            ':protesneed' => $protesneed,
            ':objetivo' => $objetivo,
            ':actividad' => $actividad,
        ));
        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function modificar($nombre, $apellido, $correo, $peso, $edad, $altura, $genero, $nivel, $username, $calneed, $protesneed, $objetivo, $actividad){
        $query = $this->connect()->prepare('UPDATE usuarios SET nombre = :nombre, apellido = :apellido, peso = :peso, edad = :edad, altura = :altura, genero=:genero,
        nivel = :nivel, username = :username, calneed = :calneed, protesneed=:protesneed, objetivo= :objetivo, actividad = :actividad WHERE correo = :correo');
        $query->execute(array(
            ':nombre' => $nombre,
            ':apellido' => $apellido,
            ':correo' => $correo,
            ':peso' => $peso,
            ':edad' => $edad,
            ':altura' => $altura,
            ':genero' => $genero,
            ':nivel' => $nivel,
            ':username' => $username,
            ':calneed' => $calneed,
            ':protesneed' => $protesneed,
            ':objetivo' => $objetivo,
            ':actividad' => $actividad
        ));

    }
    public function addHistorial($id, $peso, $edad, $genero, $nivel, $objetivo){
        $query = $this->connect()->prepare('INSERT INTO historial (pesohistorial, edadhistorial, generohistorial, objetivohistorial, nivelhistorial, iduserhistorial) 
        VALUES(:pesohistorial, :edadhistorial, :generohistorial, :objetivohistorial, :nivelhistorial, :iduserhistorial)');
        $query->execute(array(
            ':pesohistorial' => $peso,
            ':edadhistorial' => $edad,
            ':generohistorial' => $genero,
            ':objetivohistorial' => $objetivo,
            ':nivelhistorial' => $nivel,
            ':iduserhistorial' => $id
        ));
    }
    public function deleteFoodUser($id){
        $query = $this->connect()->prepare('DELETE FROM comidas WHERE id_usercomida = :id_usercomida');
        $query->bindParam(':id_usercomida', $id);
        $query->execute();
    }
    public function deleteuser($correo){
        $query = $this->connect()->prepare('DELETE FROM usuarios WHERE correo = :correo');
        $query->bindParam(':correo', $correo);
        $query->execute();
    }

    public function deleteHistory($id){
        $query = $this->connect()->prepare('DELETE FROM historial WHERE iduserhistorial = :id');
        $query->bindParam(':id', $id);
        $query->execute();
    }
    public function logear($correo, $pass, $username){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE correo = :correo AND pass = :pass OR username = :username AND pass = :pass1');
        $query->bindParam(':correo', $correo);
        $query->bindParam(':pass', $pass);
        $query->bindParam(':pass1', $pass);
        $query->bindParam(':username', $username);
        $query->execute();

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }

    }
    public function userExists($correo, $pass, $username){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE correo = :correo AND pass = :pass OR username = :username 
        AND pass = :pass1 OR username = :username1 OR correo = :correo1');
        $query->bindParam(':correo', $correo);
        $query->bindParam(':correo1', $correo);
        $query->bindParam(':username1', $username);
        $query->bindParam(':username', $username);
        $query->bindParam(':pass', $pass);
        $query->bindParam(':pass1', $pass);
        $query->execute();

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function showHistorial($id){
        $query = $this->connect()->prepare('SELECT * FROM historial WHERE iduserhistorial = :id');
        $query->bindParam(':id', $id);
        $query->execute();
        $resultado = $query->fetchAll();
        return $resultado;
    }

    public function setUser($correo){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE correo = :correo or username = :username');
        $query->bindParam(':correo', $correo);
        $query->bindParam(':username', $correo);

        $query->execute();
        
        foreach ($query as $currentUser) {
            $this->id = $currentUser['id'];
            $this->nombre = $currentUser['nombre'];
            $this->correo = $currentUser['correo'];
            $this->apellido = $currentUser['apellido'];
            $this->peso = $currentUser['peso'];
            $this->edad = $currentUser['edad'];
            $this->altura = $currentUser['altura'];
            $this->genero = $currentUser['genero'];
            $this->nivel = $currentUser['nivel'];
            $this->username = $currentUser['username'];
            $this->calneed = $currentUser['calneed'];
            $this->protesneed = $currentUser['protesneed'];
            $this->objetivo = $currentUser['objetivo'];
            $this->actividad = $currentUser['actividad'];
        }
    }
    public function getUserId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getCorreo(){
        return $this->correo;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getPeso(){
        return $this->peso;
    }
    public function getEdad(){
        return $this->edad;
    }
    public function getAltura(){
        return $this->altura;
    }
    public function getGenero(){
        return $this->genero;
    }
    public function getNivel(){
        return $this->nivel;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getCaloria(){
        return $this->calneed;
    }
    public function getProtein(){
        return $this->protesneed;
    }
    public function getObjetivo(){
        return $this->objetivo;
    }
    public function getActividad(){
        return $this->actividad;
    }
}

?>