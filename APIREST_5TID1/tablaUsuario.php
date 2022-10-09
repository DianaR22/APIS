<?php
require_once "clases/conexion/conexion.php";
include_once 'clases/users.class.php';
$con = new conexion;


if($_SERVER['REQUEST_METHOD'] == "GET"){
    $usuario=new users();
    $res=$usuario->listaUsuarios();


if (empty($res)) {
    echo 'Tabla vacía';
}

foreach ($res as $data) {
    echo "<tr>
            <td>" . $data['Name'] . "</td>
            <td>" . $data['Lastname'] . "</td>
            <td>" . $data['RFC'] . "</td>
            <td>" . $data['personActive'] . "</td>    
            <td>" . $data['user'] . "</td>  
            <td>" . $data['userType'] . "</td>  
            <td>" . $data['userActive'] . "</td>  
        </tr>";
}

}else{

    echo "métedo no permitido";
}




