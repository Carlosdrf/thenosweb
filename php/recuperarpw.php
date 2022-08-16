<?php
include_once('conexion_be.php');

class Recuperar extends DB{
	public function recuperarUser($correo){
		$query = $this->connect()->prepare("SELECT * FROM usuarios WHERE correo = :correo");
		$query->bindParam(':correo', $correo);
		$query->execute();

			foreach ($query as $currentUser) {
				$this->pass = $currentUser['pass'];
			}		
		}
	
	public function getPass(){
		return $this->pass;
	}
}

$recuperar = new Recuperar();

if(!empty($_POST['txtcorreo'])){ 
    $correo = $_POST['txtcorreo'];

    $recuperar->recuperarUser($correo);
	$hello = "hola ";

	$to = $correo;
	$titulo = "recuperar contraseña";
	$mensaje = $recuperar->getPass();
	$headers = "From: thenosinc@gmail.com";

	if(mail($to, $titulo, $mensaje, $headers)){
		echo "<script> alert('$mensaje'); </script>";
		echo "<script> alert('Contraseña enviada exitosamente, revise su correo ');window.location= '../Sign_Up.php' </script>";
	}
}
