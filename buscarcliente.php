<?php
session_start();

if (empty($_SESSION['Usuario_Nombre']) ) {
    header('Location: cerrarsesion.php');
    exit;
}

  require_once 'funciones/conexion.php';
  $MiConexion = ConexionBD();

  $ListadoUsuarios = array();
  //aqui el buscador toma vida cuando pulso el boton de busqueda, habiendo ingresado algunos patrones.
  if (!empty($_POST['BuscarUsuarios'])) {
    //valido que al menos llene un filtro
    require_once 'funciones/validacion_registro_usuario.php';


    $_SESSION['Mensaje'] = Validar_Buscador_Usuarios();
    if (empty($_SESSION['Mensaje'])) {

        //llamo al script con la funcion que usaré para buscar los registros
        require_once 'funciones/selectusuario.php';
        //uso la funcion para buscar y le envio los parametros
        $ListadoUsuarios = Buscar_Usuarios($_POST['Nombre'], $_POST['Id'], $_POST['Dni'],  $MiConexion);
        $CantidadUsuarios = count($ListadoUsuarios);

        
        //exporto la info de esta busqueda en un csv
        //ExportarDatos($ListadoUsuarios);
        

        if (empty($ListadoUsuarios)) {
            $_SESSION['Mensaje'] = 'No hay datos de usuarios para esta búsqueda.';
            $_SESSION['Estilo'] = 'warning';
        }
    } else {
        $_SESSION['Estilo'] = 'warning';
    }
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
<title>Buscar Datos Clientes</title>
<link rel="stylesheet" href="css/estiloform.css">
</head>
<body>
    <div id="container">
        <header id="header">
            <?php if (!empty($_SESSION['Mensaje'])) { ?>
            <div class="alert alert-<?php echo $_SESSION['Estilo']; ?> alert-dismissable">
            <?php echo $_SESSION['Mensaje'] ?>
            </div>
            <?php } ?>
          <form role="form" method='post'>
              <div class="elem-group">
                <label class="label">Nombre</label>
                <input class="form-control1" type="text" name="Nombre" id="nombre" autofocus="true" tabindex="1" 
                accesskey="*" value="<?php echo !empty($_POST['Nombre']) ? $_POST['Nombre'] : ''; ?>">
                <label class="label">N&#176; Cliente</label>
                <input class="form-control2" type="numero" name="Id" id="id" tabindex="2"
                value="<?php echo !empty($_POST['Id']) ? $_POST['Id'] : ''; ?>"><br>
                <label class="label">DNI</label>
                <input class="form-control3" type="text" name="Dni" id="dni" tabindex="3"
                value="<?php echo !empty($_POST['Dni']) ? $_POST['Dni'] : ''; ?>">
                <label class="label">CUIT</label>
                <input class="form-control4" type="cuit" name="Cuit" id="cuit" tabindex="4">
              </div>
              <div class="elem-group1">
                <button type="submit" class="btn btn-default" value="Buscar" name="BuscarUsuarios">Buscar</button><br>
                <script><?php require_once 'js/ventanas.js';?></script>
                <button type="button" class="btn btn-default" value="Salir" name="BotonSalir" tabindex="6" onClick="cerrar();">Salir >></button>
              </div>
          </form>
        </header>
        <?php
          if (!empty($ListadoUsuarios)) {
        ?>
        <div class="panel-body">
          <div class="table-responsive table-bordered">
            <table class="table" border="1" cellpadding="1px" cellspacing="0px">
              <thead class="thead">
                <tr>
                    <th>N&#176; Cliente</th>
                    <th>Nombre / Raz&oacute;n Social</th>
                    <th>CUIT</th>
                    <th>DNI</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php for ($i = 0; $i < $CantidadUsuarios; $i++) { ?>
                <tr>
                  <td><input value="<?php  echo $ListadoUsuarios[$i]['ID']; ?>"></td>
                  <td><input value="<?php  echo $ListadoUsuarios[$i]['NOMBRE_COMPLETO']; ?>"></td>
                  <td><input value="<?php  echo $ListadoUsuarios[$i]['CUIT']; ?>"></td>
                  <td><input value="<?php  echo $ListadoUsuarios[$i]['DNI']; ?>"></td>
                  <td>
                    <a class="btn btn-default" 
                    href="datoscliente.php?ID_USER=<?php echo $ListadoUsuarios[$i]['ID']; ?>" role="button" title="Ver datos">
                    <i class="fa fa-info-circle"> Ver Datos</i>
                    </a>
                  </td>
                <?php } ?>
                </tr>
                </tbody>
                <?php } ?>
                <tr>
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
                  </tr>
                  <tr>
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
                  </tr>
                  <tr>
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
                  </tr>
                  <tr>
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
                  </tr>
                  <tr>
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
                  </tr>
                  <tr>
                    <td><input></td>
                    <td><input></td>
                    <td><input></td>
                    <td><input></td>
                  </tr>
            </table>
          </div>
        </div> 
    </div>
    <?php $_SESSION['Mensaje']=''; ?>
</body>
</html>