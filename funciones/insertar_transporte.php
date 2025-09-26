<?php 
function InsertarTransportes($vConexion){

    $SQL_Insert="INSERT INTO transportes (Nombre, Email, Direccion, Cuit, IngresoBruto, Telefono, FechaAlta, Horario, Observaciones, Activo)
    VALUES ('{$_POST['Nombre']}', '{$_POST['Email']}', '{$_POST['Direccion']}', '{$_POST['Cuit']}', '{$_POST['IngresoBruto']}', '{$_POST['Telefono']}', NOW(), '{$_POST['Horario']}', '{$_POST['Observaciones']}', 1)";


    if (!mysqli_query($vConexion, $SQL_Insert)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}
?>