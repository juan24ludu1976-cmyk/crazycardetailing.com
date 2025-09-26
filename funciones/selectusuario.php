<?php
function Listar_Usuarios($vConexion) {

    $Listado=array();

    //1) genero la consulta que deseo
    $SQL = "SELECT U.Id, U.Nombre, U.Apellido, U.Dni, U.Email, U.Cuit, N.Denominacion as Nivel, 
                   N.Id as Id_Nivel, L.Descripcion as Localidad, U.Sexo, U.Activo
        FROM usuarios U, niveles N, localidades L
        WHERE U.IdLocalidad=L.Id AND U.IdNivel=N.Id
        ORDER BY U.Apellido, U.Nombre";

    //2) a la conexion actual le brindo mi consulta, y el resultado lo entrego a variable $rs
     $rs = mysqli_query($vConexion, $SQL);
        
     //3) el resultado deberá organizarse en una matriz, entonces lo recorro
     $i=0;
    while ($data = mysqli_fetch_array($rs)) {
            $Listado[$i]['ID'] = $data['Id'];
            $Listado[$i]['NOMBRE'] = $data['Nombre'];
            $Listado[$i]['APELLIDO'] = $data['Apellido'];
            $Listado[$i]['DNI'] = $data['Dni'];
            $Listado[$i]['EMAIL'] = $data['Email'];
            $Listado[$i]['CUIT'] = $data['Cuit'];
            $Listado[$i]['ID_NIVEL'] = $data['Id_Nivel'];
            $Listado[$i]['LOCALIDAD'] = $data['Localidad'];
            $Listado[$i]['SEXO'] = $data['Sexo'];
            $Listado[$i]['ACTIVO'] = $data['Activo'];

            $i++;
    }


    //devuelvo el listado generado en el array $Listado. (Podra salir vacio o con datos)..
    return $Listado;

}

//function Buscar_Usuarios($vPatronApellido='', $vIdPais='', $vDNI=0 , $vConexion) {
function Buscar_Usuarios( $vPatronNombre='', $vId='', $vDni=0, $vConexion ) {
     $Listado = array();

    //1) genero la consulta que deseo
    $SQL = "SELECT U.Id, U.Nombre, U.Apellido, U.Email, U.Cuit, U.Dni, N.Denominacion as Nivel, 
    U.Activo, U.Imagen
        FROM usuarios U, niveles N
        WHERE U.IdNivel=N.Id ";  //hasta aqui es lo mismo que el listado visto anteriormente
        
    //ahora voy a concatenar los patrones ingresados para afinar la busqueda
    if (!empty($vPatronNombre)) {
        $SQL.=" AND U.Nombre like '%$vPatronNombre%' ";
    }
    
   /* if (!empty($vPatronApellido)) {
        $SQL.=" AND U.Apellido like '%$vPatronApellido%' ";
    }*/
        
    //ahora voy a concatenar los patrones ingresados para afinar la busqueda
    if (!empty($vId) && is_numeric($vId) && $vId > 0) {
        $SQL.=" AND U.Id = $vId";
    }
    
    if (!empty($vDni) && is_numeric($vDni) && $vDni > 0) {
         $SQL.=" AND U.Dni = $vDni";
    }
         
    
    //echo $SQL; exit; 
    
    //finalizo la sql con el orden por apellido y nombre
    $SQL.=" ORDER BY U.Apellido, U.Nombre";

    //2) a la conexion actual le brindo mi consulta, y el resultado lo entrego a variable $rs
    $rs = mysqli_query($vConexion, $SQL);

    //3) el resultado deberá organizarse en la matriz
    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {
        $Listado[$i]['ID'] = $data['Id'];
        $Listado[$i]['NOMBRE_COMPLETO'] = $data['Nombre'].' '.$data['Apellido'];
        $Listado[$i]['EMAIL'] = $data['Email'];
        $Listado[$i]['NIVEL'] = $data['Nivel'];
        $Listado[$i]['CUIT'] = $data['Cuit'];
        $Listado[$i]['DNI'] = $data['Dni'];
        $Listado[$i]['ACTIVO'] = $data['Activo'];
        //operador ternario que pregunta si el campo viene vacio, le asigna una imagen por defecto para mostrar, sino muestra la registrada
        $Listado[$i]['IMG'] = (empty($data['Imagen'])) ? 'user.png' : $data['Imagen']; 
        $i++;
    }


    //devuelvo el listado generado en el array $Listado. (Podra salir vacio o con datos)..
    return $Listado;
}


/*
function EncontrarUsuario($vIDUsuario, $vConexion){
    $Usuario=array();
    
    $SQL="SELECT U.*, P.Id as Id_Provincia, P.Descripcion as Provincia, 
                N.Id as Id_NIVEL, N.Descripcion as Nivel, L.Id as Id_Localidad, L.Descripcion as Localidad
     FROM usuarios U, provincia P, niveles N, localidades L
     WHERE U.Id = $vIDUsuario
     AND U.IdNivel=N.Id
     AND U.IdProvincia=P.Id
     AND U.IdLocalidad=L.Id";


    $rs = mysqli_query($vConexion, $SQL);
        
    $data = mysqli_fetch_array($rs) ;
    if (!empty($data)) {
        $Usuario['NOMBRE']             = $data['Nombre'];
        $Usuario['APELLIDO']           = $data['Apellido'];
        $Usuario['DOMICILIO']          = $data['Domicilio'];
        $Usuario['NIVEL']              = $data['Nivel'];
        $Usuario['LOCALIDAD']          = $data['Localidad'];
        $Usuario['ID_LOCALIDAD']       = $data['Id_Localidad'];
        $Usuario['CODIGOPOSTAL']       = $data['CodigoPostal'];
        $Usuario['ID_PROVINCIA']       = $data['Id_Provincia'];
        $Usuario['PROVINCIA']          = $data['Provincia'];
        $Usuario['IVA']                = $data['Iva'];
        $Usuario['CUIT']               = $data['Cuit'];
        $Usuario['INGBRUTO']           = $data['IngBruto'];
        $Usuario['ID']                 = $data['Id'];
        $Usuario['ID_ROL']             = $data['Id_Rol'];
        $Usuario['DNI']                = $data['Dni'];
        if (empty( $data['Imagen'])) {
            $data['Imagen'] = 'user.png'; 
        }
        $Usuario['IMG']        = $data['Imagen'];
        $Usuario['ACTIVO']     = $data['Activo'];
    }
    return $Usuario;
}
*/

function EncontrarUsuario($vIDUsuario, $vConexion){
    $Usuario=array();
    
    $SQL="SELECT U.*, N.Id as Id_Nivel, N.Denominacion as Nivel, L.Id as Id_Localidad, L.Descripcion as Localidad,
     P.Id as Id_Provincia, P.Codigo as CodigoProvincia, P.Denominacion as Provincia, 
     I.CodigoIva as CodigoIva, I.Denominacion as Iva, I.Id as Id_Iva
     FROM usuarios U, niveles N, localidades L, provincia P, iva I
     WHERE U.Id = $vIDUsuario
     AND U.IdNivel=N.Id
     AND U.IdIva=I.Id
     AND U.IdProvincia=P.Id
     AND U.IdLocalidad=L.Id";


    $rs = mysqli_query($vConexion, $SQL);
        
    $data = mysqli_fetch_array($rs) ;
    if (!empty($data)) {
        $Usuario['NOMBRE']             = $data['Nombre'];
        $Usuario['APELLIDO']           = $data['Apellido'];
        $Usuario['DOMICILIO']          = $data['Direccion'];
        $Usuario['NIVEL']              = $data['Nivel'];
        $Usuario['LOCALIDAD']          = $data['Localidad'];
        $Usuario['CODIGO_PROVINCIA']   = $data['CodigoProvincia'];
        $Usuario['NOMBRE_PROVINCIA']   = $data['Provincia'];
        $Usuario['CP']                 = $data['Cp'];
        $Usuario['ID_LOCALIDAD']       = $data['Id_Localidad'];
        $Usuario['IVA']                = $data['Iva'];
        $Usuario['CODIGO_IVA']         = $data['CodigoIva'];
        $Usuario['CUIT']               = $data['Cuit'];
        $Usuario['INGBRUTO']           = $data['IngresoBruto'];
        $Usuario['ID']                 = $data['Id'];
        $Usuario['ID_NIVEL']           = $data['Id_Nivel'];
        $Usuario['DNI']                = $data['Dni'];
        if (empty( $data['Imagen'])) {
            $data['Imagen'] = 'user.png'; 
        }
        $Usuario['IMG']        = $data['Imagen'];
        $Usuario['ACTIVO']     = $data['Activo'];
    }
    return $Usuario;
}

function Modificar_Acceso_Usuario($vIdUsuario, $vActivo, $vConexion){
    
    $SQL="UPDATE Usuarios SET Activo = $vActivo WHERE Id = $vIdUsuario";
    
    if (!mysqli_query($vConexion, $SQL)) {
        return false;
    }
    
    return true;
}

?>