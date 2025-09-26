<?php
function Listar_General($vConexion , $vTabla) {

    $Listado=array();

    //1) genero la consulta que deseo con la tabla que especifico
    $SQL = "SELECT * FROM $vTabla ORDER BY Descripcion"; //ordeno por el campo denominacion

    //2) a la conexion actual le brindo mi consulta, y el resultado lo entrego a variable $rs
     $rs = mysqli_query($vConexion, $SQL);
        
     //3) el resultado deberá organizarse en una matriz, entonces lo recorro
     $i=0;
    while ($data = mysqli_fetch_array($rs)) {
            $Listado[$i]['ID'] = $data['Id'];
            $Listado[$i]['NOMBRE'] = $data['Descripcion'];
            $i++;
    }


    //devuelvo el listado generado en el array $Listado. (Podra salir vacio o con datos)..
    return $Listado;

}

function Listar_Clientes($vConexion) {

    $Listado=array();

    //1) genero la consulta que deseo
    //ojo que segun el nivel de usuario debo ver cierto listado.
    //Si soy admin o asesor, vere todas
    
    $SQL = "SELECT U.Id, U.Nombre, U.Apellido, U.Dni, U.Cuit, 
            N.Id as Id_Nivel
        FROM usuarios U, niveles N
        WHERE U.IdNivel=N.Id
        ORDER BY U.Apellido, U.Nombre";
        
        /*
        if($_SESSION['Usuario_Nivel'] == 2) {
        //si soy usuario Analista vere las otras (las de tipo Reportes de Errores y Desarrollo de nuevas funcionalidades)
        $SQL.=" AND N.Id = ".($_SESSION['Usuario_Id']==2);
        }
        $SQL.="  ORDER BY U.Apellido, U.Nombre ASC "; 
        */
  
    //2) a la conexion actual le brindo mi consulta, y el resultado lo entrego a variable $rs
     $rs = mysqli_query($vConexion, $SQL);
        
     //3) el resultado deberá organizarse en una matriz, entonces lo recorro
     $i=0;
    while ($data = mysqli_fetch_array($rs)) {
            $Listado[$i]['ID'] = $data['Id'];
            $Listado[$i]['USUARIO_NOMBRE'] = $data['Nombre'].' '.$data['Apellido'];
            $Listado[$i]['DNI'] = $data['Dni'];
            $Listado[$i]['CUIT'] = $data['Cuit'];
            $Listado[$i]['ID_NIVEL'] = $data['Id_Nivel'];
            $i++;
    }


    //devuelvo el listado generado en el array $Listado. (Podra salir vacio o con datos)..
    return $Listado;

}

function Validar_Consulta(){
    $_SESSION['Mensaje']='';
    if (empty($_POST['Id'])) {
        $_SESSION['Mensaje'].= "Debe ingresar el Id. <br />";
    }
    if (empty($_POST['Nombre'])) {
        $_SESSION['Mensaje'].= "Debe ingresar el Nombre.<br />";
    }
    if (empty($_POST['Localidad'])) {
        $_SESSION['Mensaje'].= "Debe ingresar la Localidad.<br />";
    }
    if (empty($_POST['CP'])) {
        $_SESSION['Mensaje'].= "Debe ingresar el Codigo Postal.<br />";
    }
    return $_SESSION['Mensaje'];
}