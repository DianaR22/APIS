<?php 

require_once '../clases/users.class.php';
require_once '../clases/response.class.php';

$_user = new users;
$_respuestas = new response;

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $datos = $_POST;
    $dataArray = $_user->post($datos);
    echo $dataArray;
    if($dataArray > 0){
        header("Location:/APIREST_5TID1/views/users.php"); 
    }
    else{
        header("Location:/APIREST_5TID1/views/users.php?err=1;"); 
    }

}elseif($_SERVER['REQUEST_METHOD'] == "GET"){
    print_r($_GET);
}else{
    echo "Método no permitido";

}
?>
