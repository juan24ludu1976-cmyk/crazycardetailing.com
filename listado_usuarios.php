<?php 
session_start();

//si tengo vacio mi elemento de sesion me tiene q redireccionar al login.. 
//al cerrarsesion para que mate todo de la sesion y el se encarga de ubicar en el login
if (empty($_SESSION['Usuario_Nombre']) ) {
    header('Location: cerrarsesion.php');
    exit;
}


//voy a necesitar la conexion: incluyo la funcion de Conexion.
require_once 'funciones/conexion.php';

//genero una variable para usar mi conexion desde donde me haga falta
//no envio parametros porque ya los tiene definidos por defecto
$MiConexion = ConexionBD();

//ahora voy a llamar el script con la funcion que genera mi listado
require_once 'funciones/selectusuario.php';


//voy a ir listando lo necesario para trabajar en este script: 
$ListadoUsuarios = Listar_Usuarios($MiConexion);
$CantidadUsuarios = count($ListadoUsuarios);

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listado Usuarios</title>
        <link rel="stylesheet" href="css/listados.css">
    </head>
<body>
    <div class="container">
        <div class="panel-body">
                            
                            
                            <?php if (!empty($_SESSION['Mensaje'])) { ?>
                                        <div class="alert alert-<?php echo $_SESSION['Estilo']; ?> alert-dismissable">
                                        <?php echo $_SESSION['Mensaje'] ?>
                                        </div>
                            <?php } ?>


                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Dni</th>
                                            <th>Email</th>
                                            <th>Cuit</th>
                                            <th>Id Nivel</th>
                                            <th>Localidad</th>
                                            <th>Sexo</th>
                                            <th>Activo</th>
                                            <th>Acciones</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i=0; $i<$CantidadUsuarios; $i++) { ?>
                                            <tr>
                                            <td><?php echo $ListadoUsuarios[$i]['ID']; ?></td>
                                            <td><?php echo $ListadoUsuarios[$i]['NOMBRE']; ?></td>
                                            <td><?php echo $ListadoUsuarios[$i]['APELLIDO']; ?></td>
                                            <td><?php echo $ListadoUsuarios[$i]['DNI']; ?></td>
                                            <td><?php echo $ListadoUsuarios[$i]['EMAIL']; ?></td>
                                            <td><?php echo $ListadoUsuarios[$i]['CUIT']; ?></td>
                                            <td><?php echo $ListadoUsuarios[$i]['ID_NIVEL']; ?></td>
                                            <td><?php echo $ListadoUsuarios[$i]['LOCALIDAD']; ?></td>
                                            <td><?php echo $ListadoUsuarios[$i]['SEXO']; ?></td>
                                            <td><?php echo $ListadoUsuarios[$i]['ACTIVO']; ?></td>
                                            <td>
                                                <a class="btn btn-success btn-circle btn-info " 
                                                    href="ver_usuario.php?ID_USER=<?php echo $ListadoUsuarios[$i]['ID']; ?>" role="button" title="Ver datos">
                                                    <i class="fa fa-info-circle"></i>
                                                </a>

                                                <?php if ($_SESSION['Usuario_Nivel'] == 1 ) { ?>
                                                    <a class="btn btn-success btn-circle btn-<?php echo $ListadoUsuarios[$i]['ACTIVO']==1 ? 'success':'warning';?>" 
                                                        onclick="if (confirm('Esta seguro de cambiar el acceso?')) {return true; } else {return false;}"
                                                        href="anular_acceso_usuario.php?ACTIVE=<?php echo $ListadoUsuarios[$i]['ACTIVO'];  ?>&ID_USER=<?php echo $ListadoUsuarios[$i]['ID']; ?>" 
                                                        role="button" title="Modificar acceso">
                                                        <i class="fa fa-lock"></i>
                                                    </a>
                                                    <a class="btn btn-success btn-circle btn-danger " href="#" role="button" title="Borrar">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                <?php } ?>

                                            </td>
                                            </tr>  
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
        </div>
    </div>
</body>
</html>