<?php 

require_once '../clases/users.class.php';
require_once '../clases/response.class.php';
require_once "../clases/conexion/conexion.php";


$con = new conexion;
$_user = new users;
$_respuestas = new response;

if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST) && !empty($_POST)){ //con esto valido dos cosas isset es para verificar si la acción post está declarado y para saber si se encuentra vacio
            $name =$_POST['nw_userName'];
            $lastNames = $_POST['nw_apellidos'];
            $rfc = $_POST['nw_rfc'];
            $nickname = $_POST['nw_nickName'];
            $userType = $_POST['userType'];
            $pass = $_POST['nw_pass'];
            $bActivo=1;

            $query = "INSERT INTO `personas` (`personName`, `personLastName`, `personRFC`, `bActive`)
            VALUES ('$name','$lastNames','$rfc','$bActivo')";
             $lastId=($con->postDataId($query));

             $query2="INSERT INTO `users` (`personId`, `user`, `pass`, `userType`, `bActive`) 
             VALUES ( '$lastId','$nickname ',md5('$pass'),'$userType','$bActivo')"; 
             $con->postData($query2);
            header("Location:../views/users.php"); 
        }
        }
    else if($_SERVER['REQUEST_METHOD'] == "GET"){
       
        echo "Próximamente disponible:D";
    }
    else{
        echo "Método no permitido";
    }
    

?>