<?php 

require_once 'conexion/conexion.php';
require_once 'response.class.php';

class users extends conexion{

	private $nombre = "";
	private $apellidos = "";
	private $rfc = "";
	private $nickName = "";
	private $tipoUsuario = "";
	private $personActive = "";
	private $userActive = "";

	public function listaUsuarios(){ //listaUsuarios(2) $pagina = 1
		/*$inicio = 0;
		$cantidadItems = 5;
		if($pagina > 1 ){ // val = 2
			$inicio = ($cantidadItems * ($pagina -1));  //(5*(2-1))= 5
 			$cantidadItems = $cantidadItems * $pagina; //5*2 = 10 
		}*/
		$query = "SELECT * FROM userdata"; // limit $inicio,$cantidad;
		$datos = parent::getData($query);
		return ($datos);

		foreach($datos as $index => $value){

			$nombre = $value['Name'];
			$apellidos = $value['Lastname'];
			$rfc = $value['RFC'];
			$nickName = $value['personActive'];
			$tipoUsuario = $value['user'];
			$personActive = $value['userType'];
			$userActive = $value['userActive']; 
		}
	}

	

	public function buscarUsuarioNombre($userName){ 
		$query = "SELECT * FROM userdata where Name =  '$userName'"; 
		$datos = parent::getData($query);
		return ($datos);

	}
	public function post($datos){
		$datos = $datos;
		$name =$datos['nw_userName'];
		$lastNames = $datos['nw_apellidos'];
		$rfc = $datos['nw_rfc'];
		$nickname =$datos['nw_nickName'];
		$userType = $datos['userType'];
		$pass = $datos['nw_pass'];
		$bActivo=1;

		$query = "INSERT INTO `personas` (`personName`, `personLastName`, `personRFC`, `bActive`)
		VALUES ('$name','$lastNames','$rfc','$bActivo')";
		 $lastId=parent::postDataId($query);

		 $query2="INSERT INTO `users` (`personId`, `user`, `pass`, `userType`, `bActive`) 
		 VALUES ( '$lastId','$nickname ',md5('$pass'),'$userType','$bActivo')"; 
			$result = parent::postData($query2);
			return $result;
	}


}


?>
