<?php
function Listar_Transportes($vConexion) {

    $Listado=array();

    //1) genero la consulta que deseo
    $SQL = "SELECT * FROM transportes ORDER BY Nombre";

    //2) a la conexion actual le brindo mi consulta, y el resultado lo entrego a variable $rs
     $rs = mysqli_query($vConexion, $SQL);
        
     //3) el resultado deberá organizarse en una matriz, entonces lo recorro
     $i=0;
    while ($data = mysqli_fetch_array($rs)) {
            $Listado[$i]['ID'] = $data['Id'];
            $Listado[$i]['NOMBRE'] = $data['Nombre'];
            $Listado[$i]['EMAIL'] = $data['Email'];
            $Listado[$i]['DIRECCION'] = $data['Direccion'];
            $Listado[$i]['CUIT'] = $data['Cuit'];
            $Listado[$i]['INGRESO_BRUTO'] = $data['IngresoBruto'];
            $Listado[$i]['TELEFONO'] = $data['Telefono'];
            $Listado[$i]['FECHA_ALTA'] = $data['FechaAlta'];
            $Listado[$i]['HORARIO'] = $data['Horario'];
            $Listado[$i]['OBSERVACIONES'] = $data['Observaciones'];
            $Listado[$i]['ACTIVO'] = $data['Activo'];
            $i++;
    }


    //devuelvo el listado generado en el array $Listado. (Podra salir vacio o con datos)..
    return $Listado;

}
?>