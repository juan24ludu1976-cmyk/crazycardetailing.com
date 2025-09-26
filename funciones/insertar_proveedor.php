<?php 
function InsertarProveedor($vConexion){

    $SQL_Insert="INSERT INTO proveedores (Nombre, Email, Telefono, Direccion, FechaAlta, UsuarioId)
    VALUES ('{$_POST['Nombre']}', '{$_POST['Email']}', '{$_POST['Telefono']}', '{$_POST['Direccion']}', NOW(), 1)";


    if (!mysqli_query($vConexion, $SQL_Insert)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}
?>