<?php      
function Validar_Datos() {
    $vMensaje='';
    
    if (strlen($_POST['Nombre']) < 3) {
        $vMensaje.='Debes ingresar un nombre con al menos 3 caracteres. <br />';
    }
    if (strlen($_POST['Apellido']) < 3) {
        $vMensaje.='Debes ingresar un apellido con al menos 3 caracteres. <br />';
    }

    if (strlen($_POST['Dni']) < 8) {
        $vMensaje.='Debes ingresar un Dni con 8 caracteres. <br />';
    }

    if (strlen($_POST['Direccion']) < 5) {
        $vMensaje.='Debes ingresar un Domicilio con al menos 5 caracteres. <br />';
    }

    if (strlen($_POST['Cp']) < 4) {
        $vMensaje.='Debes ingresar un Codigo Postal correcto. <br />';
    }

    if (strlen($_POST['Email']) < 5) {
        $vMensaje.='Debes ingresar un correo con al menos 5 caracteres. <br />';
    }

    if (strlen($_POST['Telefono']) < 5 || strlen($_POST['Telefono']) > 11) {
        $vMensaje.='Debes ingresar un telefono correcto. <br />';
    }

    if (strlen($_POST['Cuit']) > 11) {
        $vMensaje.='Debes ingresar un CUIT correcto. <br />';
    }

    if (strlen($_POST['IngresoBruto'])) {
        $vMensaje.='Debes ingresar un Ingreso Bruto. <br />';
    }

    if (strlen($_POST['Clave']) ==0 ) {
        $vMensaje.='Debes ingresar la clave. <br />';
    }

     if (empty($_POST['Provincia']) ) {
        $vMensaje.='Debes seleccionar tu Provincia. <br />';
    }
    
    if (empty($_POST['Localidad']) ) {
        $vMensaje.='Debes seleccionar tu Localidad. <br />';
    }

     if (empty($_POST['Iva']) ) {
        $vMensaje.='Debes seleccionar tu correspondiente Iva. <br />';
    }
    if (empty($_POST['Sexo'])) {
        $vMensaje.='Debes seleccionar el sexo. <br />';
    }
    
    //con esto aseguramos que limpiamos espacios y limpiamos de caracteres de codigo ingresados
    foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }


    return $vMensaje;

}

function Validar_Datos_Modificacion(){
  $vMensaje='';
    
    if (strlen($_POST['Nombre']) < 3) {
        $vMensaje.='Debes ingresar un nombre con al menos 3 caracteres. <br />';
    }
    if (strlen($_POST['Apellido']) < 3) {
        $vMensaje.='Debes ingresar un apellido con al menos 3 caracteres. <br />';
    }
    
    if (empty($_POST['Pais']) ) {
        $vMensaje.='Debes seleccionar tu pais. <br />';
    }
    if (empty($_POST['Sexo'])) {
        $vMensaje.='Debes seleccionar el sexo. <br />';
    }  

    foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
    return $vMensaje;
}


function Validar_Buscador_Usuarios(){
  $vMensaje='';
   if (empty($_POST['Nombre'])  && empty($_POST['Dni'])  && empty($_POST['Id']) ) {
        $vMensaje.='Debes ingresar al menos 3 caracteres para el Nombre, o  seleccionar un Id <br />';
    }
    foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
    return $vMensaje;
}
?>