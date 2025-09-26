<?php
function InsertarProductos($vConexion){

    $SQL_Insert="INSERT INTO Productos (Nombre, Descripcion, Precio, Stock, Categoria, FechaAlta, Activo)
    VALUES ('{$_POST['Nombre']}', '{$_POST['Descripcion']}', '{$_POST['Precio']}', '{$_POST['Stock']}',
     '{$_POST['Categoria']}', now(), 1)";

     if(!mysqli_query($vConexion, $SQL_Insert)){
        //si surge un error, finalizo la ejecucion del script con un mensaje
         die ('<h4>Consulta: '. $SQL_Insert.'</h4> <p style="color: #ff0000">'.mysqli_error($vConexion) .'</p>'  ) ;
     }
     return true;
}

?>
