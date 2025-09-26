<?php
function Listar_Productos($vConexion) {

    $Listado=array();

    //1) genero la consulta que deseo
    $SQL = "SELECT * FROM productos ORDER BY Id, Nombre";

    //2) a la conexion actual le brindo mi consulta, y el resultado lo entrego a variable $rs
     $rs = mysqli_query($vConexion, $SQL);
        
     //3) el resultado deberá organizarse en una matriz, entonces lo recorro
     $i=0;
    while ($data = mysqli_fetch_array($rs)) {
            $Listado[$i]['ID'] = $data['Id'];
            $Listado[$i]['NOMBRE'] = $data['Nombre'];
            $Listado[$i]['DESCRIPCION'] = $data['Descripcion'];
            $Listado[$i]['PRECIO'] = $data['Precio'];
            $Listado[$i]['STOCK'] = $data['Stock'];
            $Listado[$i]['CATEGORIA'] = $data['Categoria'];
            $Listado[$i]['FECHA_ALTA'] = $data['FechaAlta'];
            $Listado[$i]['ACTIVO'] = $data['Activo'];
            $i++;
    }

    //devuelvo el listado generado en el array $Listado. (Podra salir vacio o con datos)..
    return $Listado;
}

?>