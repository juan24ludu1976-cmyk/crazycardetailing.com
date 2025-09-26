<?php
function Validar_Productos(){
    $vMensaje='';
    
    if (strlen($_POST['Nombre']) < 3) {
        $vMensaje.='Debes ingresar un nombre con al menos 3 caracteres. <br />';
    }
    if (strlen($_POST['Descripcion']) < 3) {
        $vMensaje.='Debes ingresar la descripcion del producto. <br />';
    }
    if (empty($_POST['Precio'])) {
        $vMensaje.='Debes ingresar el precio del articulo. <br />';
    }
    if (empty($_POST['Stock'])) {
        $vMensaje.='Debes ingresar cantidad de articulos. <br />';
    }
    if (strlen($_POST['Categoria']) < 3) {
        $vMensaje.='Debes ingresar la categoria del articulo. <br />';
    }

    //con esto aseguramos que limpiamos espacios y limpiamos de caracteres de codigo ingresados
    foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }

    return $vMensaje;
}
?>