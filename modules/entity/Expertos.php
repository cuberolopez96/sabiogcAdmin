<?php 
/**
* 
*/
class Expertos
{
	
	public function Login($usuario,$password){
		$id = "8";
		$pdo = ConnectDB::getInstance();
		$login = $pdo->prepare("SELECT * FROM expertos WHERE id = :id");
		$login->bindParam(':id',$id);
		$login->execute();
		$admin = $login->fetchAll();
		print_r($admin);
		$admin = $admin[0];
		if($usuario != $admin['usuario'] || md5($password) != $admin['password']){
			throw new Exception("Error de Autentificación", 1);
			
		}else{
			return $admin;
		}
	}

}
 ?>