<?php
session_start();

if (empty($_SESSION['Usuario_Nombre']) ) {
    header('Location: cerrarsesion.php');
    exit;
}

require_once 'funciones/conexion.php';
$MiConexion = ConexionBD();

$DatosClienteActual=array();
require_once 'funciones/selectgeneral.php';

if (!empty($_POST['BotonConfirmar'])) {
    Validar_Consulta();

    if (empty($_SESSION['Mensaje'])) {
        
        if (Listar_Clientes($MiConexion) != false) {
            $_SESSION['Mensaje'] = "Tu consulta se ha realizado correctamente!";
            $_SESSION['Estilo']='success';
            header ('Location: datoscliente.php');
            exit;
        }

    }else {  //hay errores, se deben completar campos...
        $_SESSION['Estilo']='warning';
        $DatosClienteActual['ID'] = !empty($_POST['Id']) ? $_POST['Id'] :'';
        $DatosClienteActual['USUARIO_NOMBRE'] = !empty($_POST['Usuario_Nombre']) ? $_POST['Usuario_Nombre'] :'';
        $DatosClienteActual['DIRECCION'] = !empty($_POST['Direccion']) ? $_POST['Direccion'] :'';
        $DatosClienteActual['LOCALIDAD'] = !empty($_POST['Localidad']) ? $_POST['Localidad'] :'';
        $DatosClienteActual['CP'] = !empty($_POST['CP']) ? $_POST['CP'] :'';
    }

}else if (!empty($_GET['ID'])) {
    //verifico que traigo el nro de consulta por GET
    //busco los datos de esta consulta y los muestro
    $DatosConsultaActual = Listar_Clientes($MiConexion , $_POST['ID']);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta X-Content-Type-Options="nosniff">
    <title>Documento</title>
    <link rel="stylesheet" href="css\estilodocu.css">
    <script><?php require_once 'js/ventanas.js';?></script>
    <script><?php require_once 'js/resizabletable.js';?></script>
</head>
<body>
    <div id="container">
        <header id="header">
            <hgroup>
                <label>PRESUPUESTO</label>
            </hgroup>
        </header>
        <div class="panel-body">
            <form role="form" method='post'>
                <fieldset>
                    <div class="form-group1">
                        <button type="submit" class="btn btn-default" role="button" value="BuscarCliente" name="buscarCliente" onclick="buscar_Cliente();">Buscar</button>
                        <button type="submit" class="btn btn-default" value="DatosCliente" name="datosCliente" onclick="datos_Cliente();">Cliente</button>
                        <label><?php 
                        if($_SESSION['Usuario_Nivel']==2){
                            echo $_SESSION['Usuario_Nombre'].' '.$_SESSION['Usuario_Apellido'];
                        } else{
                           echo 'CONSUMIDOR FINAL';
                        }
                         ?></label><br>
                        <br>
                        <label>Comprobante</label>
                        <input tipe="text" id="UsuarioResponsable" name="usuarioResponsable" value="" placeholder="PR">
                    </div>
                    <div class="form-group2">
                        <label>Forma de pago</label>
                        <input tipe="text" id="Pago" name="pago" value="">
                        <label>Contado</label><br>
                        <label>Vendedor</label>
                        <input tipe="text" id="Vendedor" name="vendedor" value="">
                        <label>NO ASIGNADO</label><br>
                        <label>Lista de Precios</label>
                        <input tipe="text" id="ListaPrecios" name="listaPrecios" value="">
                        <label>Lista de precios 1</label><br>
                    </div>
                    <div class="form-group3" border="1" cellspacing="0" cellpadding="5">
                        <table id="miTabla">
                            <thead>
                                <tr>
                                    <th class="resizable">Codigo</th>
                                    <th class="resizable">Marca </th>
                                    <th class="resizable">Descripcion </th>
                                    <th class="resizable">Cantidad</th>
                                    <th class="resizable">Unid.</th>
                                    <th class="resizable">Precio</th>
                                    <th class="resizable"><strong>Bonificacion</strong></th>
                                    <th class="resizable"><strong>Diferencia </strong></th>
                                    <th class="resizable">Precio Final</th>
                                    <th class="resizable">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                </tr>
                                <tr>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                </tr>
                                <tr>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                </tr>
                                <tr>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                </tr>
                                <tr>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                </tr>
                                <tr>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                </tr>
                                <tr>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                </tr>
                                <tr>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                </tr>
                                <tr>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                </tr>
                                <tr>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                </tr>
                                <tr>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                </tr>
                                <tr>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                </tr>
                                <tr>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                    <td><input></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group4">
                            <div class="secc-1">
                                <input tipe="text-area" id="Detalle" name="detalle" value="">
                            </div>
                        <div class="secc-2">
                            <div class="list-1">
                                <ul>
                                    <li>
                                        <input tipe="text" id="Neto" name="neto" value=""><br>
                                        <label>Neto</label>
                                    </li>
                                    <li>
                                        <input tipe="text" id="IvaExento" name="ivaExento" value=""><br>
                                        <label>Exento</label>
                                    </li>
                                    <li>
                                        <input tipe="text" id="Iva1" name="iva1" value=""><br>
                                        <label>IVA 1</label>
                                    </li>
                                    <li>
                                        <input tipe="text" id="Iva2" name="iva2" value=""><br>
                                        <label>IVA 2</label>
                                    </li>
                                    <li>
                                        <input tipe="text" id="ImporteInt" name="importeInt" value=""><br>
                                        <label>Imp. Int.</label>
                                    </li>
                                    <li>
                                        <input tipe="text" id="Total" name="total" value=""><br>
                                        <label>Total</label><br>
                                    </li>
                                </ul>
                            </div>
                            <div class="list-2">                      
                                <ul>
                                    <li>
                                        <label>Obser.</label>
                                    </li>
                                    <li>
                                        <input tipe="text" id="Observaciones" name="observaciones" value=""><br>
                                    </li>
                                </ul>
                            </div>
                            <div class="list-3">
                                <ul>
                                    <li>
                                        <button type="submit" class="btn btn-default" value="Aceptar" name="aceptar">Aceptar</button>
                                    </li>
                                    <li>
                                        <label>Buscar RX o PR</label>
                                    </li>
                                    <li>
                                        <input tipe="text" id="Documento" name="documento" value="" placeholder="PR">
                                    </li>
                                    <li>
                                        <input tipe="text" id="NumeroDoc" name="numeroDoc" value="" placeholder="0">
                                    </li>
                                    <li>
                                        <button type="submit" class="btn btn-default" value="Buscar" name="buscar">Buscar</button>
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-default" value="salir" name="salir" onclick="cerrar();">Salir >></button>
                                    </li>
                                </ul>
                            </div>
                        </div>    
                    </div>
                </div>
                </fieldset>
            </form>
        </div>
    </div>
    <?php $_SESSION['Mensaje']=''; ?>
</body>
</html>