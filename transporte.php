<?php

session_start();

if (empty($_SESSION['Usuario_Nombre']) ) {
    header('Location: cerrarsesion.php');
    exit;
}

//voy a necesitar la conexion: incluyo la funcion de Conexion.
require_once 'funciones/conexion.php';
$MiConexion = ConexionBD();


require_once 'funciones/validar_registro_transporte.php';
require_once 'funciones/insertar_transporte.php';

$Mensaje = '';
$Estilo = 'warning';
if (!empty($_POST['BotonRegistrarTransporte'])) {
    //estoy en condiciones de poder validar los datos
    $Mensaje = validar_transporte();
    if (empty($Mensaje)) {
        if (InsertarTransportes($MiConexion) != false) {
            $Mensaje = '<p style="color: #ff0000">'.'Se ha registrado correctamente.' .'</p><br>';
            $_POST = array();
            $Estilo = 'success';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registro de Transporte</title>
    <link rel="stylesheet" href="css\abm_transporte.css">
</head>
<body>
    <div id="container">
        <h1>Registro Transporte</h1>
        
        <form role="form" method="post">
            <div class="elem-group-dato">
                <?php if (!empty($Mensaje)) { ?>
                    <div class="alert alert-<?php echo $Estilo; ?> alert-dismissable">
                        <?php echo $Mensaje; ?>
                    </div>
                <?php } ?>
                <div>
                    <label>Nombre del Transporte:</label>
                    <input type="text" id="nombre" name="Nombre" 
                    value="<?php echo !empty($_POST['Nombre']) ? $_POST['Nombre'] : ''; ?>" 
                    placeholder="Ej: Noa Trans">
                </div>
                <br>
                <div>
                    <label>Email:</label>
                    <input type="email" id="email" name="Email" value="<?php echo !empty($_POST['Email']) ? $_POST['Email'] : ''; ?>"
                    placeholder="jose@gmail.com">
                </div>
                <br>
                <div>
                    <label>Domicilio:</label>
                    <input type="text" name="Direccion" id="direccion" value="<?php echo !empty($_POST['Direccion']) ? $_POST['Direccion'] : ''; ?>"
                        placeholder="San Martin 59 Centro">
                </div>
                <br>
                <div>
                    <label>Cuit:</label>
                    <input type="text" name="Cuit" id="cuit" value="<?php echo !empty($_POST['Cuit']) ? $_POST['Cuit'] : ''; ?>"
                        placeholder="Ingrese el Cuit">
                </div>
                <br>
                <div>
                    <label>Ingresos Brutos:</label>
                    <input type="text" name="IngresoBruto" id="ingresoBruto" value="<?php echo !empty($_POST['IngresoBruto']) ? $_POST['IngresoBruto'] : ''; ?>"
                        placeholder="Ingrese el dato.">
                </div>
                <br>
                <div>
                    <label>N&uacute;mero Telef&oacute;nico:</label>
                    <input type="tel" name="Telefono" id="telefono" value="<?php echo !empty($_POST['Telefono']) ? $_POST['Telefono'] : ''; ?>"
                        placeholder="3513447819">
                </div>
                <br>
                <div>
                    <label>Horario:</label>
                    <input type="text" name="Horario" id="horario" value="<?php echo !empty($_POST['Horario']) ? $_POST['Horario'] : ''; ?>"
                        placeholder="De 8:30 a 14 hs.">
                </div>
                <br>
                <div>
                    <label>Observaciones</label>
                    <textarea name="Observaciones" id="observaciones" rows="4" cols="50"><?php echo !empty($_POST['Observaciones']) ? $_POST['Observaciones'] : ''; ?></textarea>
                </div>
                <br>
                <div class="botonera">
                    <button type="submit" class="button" value="Registrar" name="BotonRegistrarTransporte">Guardar Registro</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>