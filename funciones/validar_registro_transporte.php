<?php
function validar_transporte() {
    $vMensaje="";

    if(strlen($_POST['Nombre']) < 3){
        $vMensaje = "Debes ingresar un nombre con al menos 3 caracteres. <br />";
    }

    if(strlen($_POST['Direccion']) < 5){
        $vMensaje = "Debes ingresar un Domicilio con al menos 3 caracteres. <br />";
    }

    if(strlen($_POST['Email']) < 5){
        $vMensaje = "Debes ingresar un Email con al menos 3 caracteres. <br />";
    }

    if (strlen($_POST['Cuit']) > 11) {
        $vMensaje.='Debes ingresar un CUIT correcto. <br />';
    }

    if (empty($_POST['IngresoBruto'])) {
        $vMensaje.='Debes ingresar un Ingreso Bruto. <br />';
    }

    if (strlen($_POST['Telefono']) < 5 || strlen($_POST['Telefono']) > 11) {
        $vMensaje.='Debes ingresar un telefono correcto. <br />';
    }

    if (empty($_POST['Horario'])) {
        $vMensaje.='Debes ingresar un Horario de atencion. <br />';
    }

    if (empty($_POST['Observaciones'])) {
        $vMensaje.='Debes ingresar una Observacion para la correcta comunicacion. <br />';
    }

    //con esto aseguramos que limpiamos espacios y limpiamos de caracteres de codigo ingresados
    foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }

    return $vMensaje;
}
?>