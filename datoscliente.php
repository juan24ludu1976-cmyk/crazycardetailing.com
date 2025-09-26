<?php
    session_start();

    if (empty($_SESSION['Usuario_Nombre']) ) {
    header('Location: cerrarsesion.php');
    exit;
    }

    require_once 'funciones/conexion.php';
    $MiConexion = ConexionBD();
    require_once 'funciones/selectusuario.php';

    if (!empty($_GET['ID_USER']))
	    $DatosUsuario = EncontrarUsuario($_GET['ID_USER'], $MiConexion);
    else {
        //me llega vacia la variable de $_POST: 
        $_SESSION['Mensaje']='Sin datos para mostrar...';
        
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="">
<meta name="author" content="">
<meta X-Content-Type-Options="nosniff">
<title>Datos del Cliente</title>
<link rel="stylesheet" href="css/estilodato.css">
<script><?php require_once 'js/ventanas.js';?></script>
</head>
<body>
    <div id="container">
            <header id="header">
                <div id="ventana" class="ventana">
                    <img src="images\logo.jpg" id="logo" alt = "logo">
                    <label>DATOS DEL CLIENTE</label>
                    <button type="button" id="close-button" value="Cerrar" name="cerrar" onClick="cerrar();">x</button>
                    <button type="button" id="minimize-button" value="Minimizar" name="minimizar" onClick="minimiza();">-</button>
                    <button type="button" id="maximize-button" value="Maximizar" name="maximizar" onClick="maximiza();">+</button>
                </div>
            </header>
            <div class="panel panel-<?php
					//si no tengo datos de usuario
						if (empty($DatosUsuario))
							echo 'default';
                            
						else {
							//el array tiene valores
                        echo $DatosUsuario['ACTIVO']==1 ? 'success' : 'warning'; 
						}?>  ">

						<?php if (!empty($_SESSION['Mensaje'])) { ?>
                        <div class="panel-heading">
                            No se encuentran datos
                        </div>
                        <form class="form">
                <div class="elem-group-dato1">
                    <label class="label1">Cliente Principal</label>
                    <input class="form-control1" type="numero" name="NumeroCliente" id="numerocliente" value="1">
                    <label class="label2">Cliente Secundario</label>
                    <input class="form-control2" type="numero" name="NumeroCliSec" id="numeroclisec" value="">
                    <label class="label3">Nombre/Raz. Social</label>
                    <input class="form-control3" type="text" name="Nombre" id="nombre" value="CONSUMIDOR FINAL">
                    <label class="label4">Direcci&oacute;n</label>
                    <input class="form-control4" type="text" name="Direccion" id="direccion" value="">
                    <label class="label5">Localidad</label>
                    <input class="form-control5" type="text" name="Localidad" id="localidad" value="CORDOBA">
                    <label class="label6">CP</label>
                    <input class="form-control6" type="codigopostal" name="CodigoPostal" id="codigopostal" value="">
                    <label class="label7">Provincia</label>
                    <input class="form-control7" type="provincia" name="Provincia" id="provincia" value="X">
                    <label class="label8">PROVINCIA</label>
                    <label class="label9">Zona</label>
                    <input class="form-control9" type="text" name="Zona" id="zona" value="999">
                    <label class="label0">Sin Dato</label>
                </div>
                <div class="elem-group-dato2">
                    <label class="label11">IVA</label>
                    <input class="form-control11" type="text" name="IVA" id="iva" value="CF">
                    <label class="label12">Consumidor Final</label>
                    <label class="label13">CUIT</label>
                    <input class="form-control13" type="text" name="Cuit" id="cuit" value="">
                    <label class="label14">Ing. Bruto</label>
                    <input class="form-control14" type="text" name="IngresoBruto" id="ingresobruto" value="">
                </div>

						<?php } else { ?>
							<div class="panel-heading">
                              El usuario <?php echo $DatosUsuario['NOMBRE']; ?> se encuentra <span style="color:red;"><?php echo $DatosUsuario['ACTIVO']==1 ? 'activo' : 'inactivo' ; ?></span>
                       		</div>
            </div>
							<!-- /.panel-heading -->
            <form class="form">
                <div class="elem-group-dato1">
                    <label class="label1">Cliente Principal</label>
                    <input class="form-control1" type="numero" name="NumeroCliente" id="numerocliente" disabled readonly value="<?php echo $DatosUsuario['ID'];?>">
                    <label class="label2">Cliente Secundario</label>
                    <input class="form-control2" type="numero" name="NumeroCliSec" id="numeroclisec" disabled readonly value="">
                    <label class="label3">Nombre/Raz. Social</label>
                    <input class="form-control3" type="text" name="Nombre" id="nombre" disabled readonly value="<?php echo $DatosUsuario['NOMBRE'].' '.$DatosUsuario['APELLIDO'];?>">
                    <label class="label4">Direcci&oacute;n</label>
                    <input class="form-control4" type="text" name="Direccion" id="direccion" disabled readonly value="<?php echo $DatosUsuario['DOMICILIO'];?>">
                    <label class="label5">Localidad</label>
                    <input class="form-control5" type="text" name="Localidad" id="localidad" disabled readonly value="<?php echo $DatosUsuario['LOCALIDAD'];?>">
                    <label class="label6">CP</label>
                    <input class="form-control6" type="codigopostal" name="CodigoPostal" id="codigopostal" disabled readonly value="<?php echo $DatosUsuario['CP'];?>">
                    <label class="label7">Provincia</label>
                    <input class="form-control7" type="provincia" name="Provincia" id="provincia" disabled readonly value="<?php echo $DatosUsuario['CODIGO_PROVINCIA'];?>">
                    <label class="label8"><?php echo $DatosUsuario['NOMBRE_PROVINCIA'];?></label>
                    <label class="label9">Zona</label>
                    <input class="form-control9" type="text" name="Zona" id="zona" disabled>
                    <label class="label0">Sin Dato</label>
                </div>
                <div class="elem-group-dato2">
                    <label class="label11">IVA</label>
                    <input class="form-control11" type="text" name="IVA" id="iva" disabled readonly value="<?php echo $DatosUsuario['CODIGO_IVA'];?>">
                    <label class="label12"><?php echo $DatosUsuario['IVA'];?></label>
                    <label class="label13">CUIT</label>
                    <input class="form-control13" type="text" name="Cuit" id="cuit" disabled readonly value="<?php echo $DatosUsuario['CUIT'];?>">
                    <label class="label14">Ing. Bruto</label>
                    <input class="form-control14" type="text" name="IngresoBruto" id="ingresobruto" disabled readonly value="<?php echo $DatosUsuario['INGBRUTO'];?>">
                </div>
                <div class="botonera">
                    <button type="button" class="btn" value="Cancelar" name="BotonCancelar" onClick="cerrar();">Cancelar</button>
                    <button type="submit" class="btn1" value="Confirmar" name="BotonConfirmar" onClick="cerrar();">Confirmar y Continuar</button>
                </div>
            </form>
            <?php } ?> 
    </div>
    <?php $_SESSION['Mensaje']=''; ?>
</body>
</html>