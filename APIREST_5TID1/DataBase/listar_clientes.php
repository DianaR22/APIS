<?php include("header.php");?>

<marquee class="alert alert-primary"><h2> LISTADO DE CLIENTES</h2></marquee>

<div class="container" >

<table class="table table-bordered" id="userTable"> <!-- Mostrar tabla se agrega el id--> 
    <thead><!-- Secciones o cabeceros -->
        <tr> <!-- filas -->
            <th>Nombre completo</th> <!-- ENcabezados de las tablas-->
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Correo electrónico</th>
            <th>Acciones</th>
        </tr>
    </thead>

<tbody><!-- Cuerpo de la tabla, se llena con la BDD-->
<?php

    include("database.php");
    $alta_cliente = new Database();
    $listaclientes = $alta_cliente->read();
?>

<?php
while($row=mysqli_fetch_object($listaclientes)){ //antes del = es la variable del form, después es la de BDD
 
    $id=$row->id;
    $nombrecompleto =$row->nombre. " ".$row->apellidos; 
    $telefono=$row->telefono;
    $direccion=$row->direccion;
    $email=$row->email;


?>
        <tr>
            <td><?php echo $nombrecompleto; ?></td>   <!-- Muestra-->
            <td><?php echo $telefono; ?></td>
            <td><?php echo $direccion; ?></td>
            <td><?php echo $email; ?></td>
            <td>
            <center>
                    <!-- ACCIONESSS-->
            <a  type="button" class="btn btn-outline-dark" href="delete.php?id=<?php echo $id;?>">Borrar</a>  <!-- LLAMA FUNCIÓN PARA BORRAR-->
                <a  href="update.php?id=<?php echo $id;?>"type="button" class="btn btn-outline-dark" >Editar</a>     <!-- EDITAR-->
               
            
                
            </td>        
</tr>
<?php
}
?>
</tbody>


</table>
</div>









<?php include("footer.php");?>