<?php

require_once 'funciones/conexion.php';
$MiConexion=ConexionBD(); 

require_once 'funciones/select_localidades.php';
$ListadoLocalidades = Listar_Localidades($MiConexion);
$CantidadLocalidades= count($ListadoLocalidades);

require_once 'funciones/select_provincias.php';
$ListadoProvincias = Listar_Provincias($MiConexion);
$CantidadProvincias= count($ListadoProvincias);

require_once 'funciones/validacion_registro_usuario_comun.php'; 
require_once 'funciones/insertar_usuarios.php';


$Mensaje='';
$Estilo='warning';
if (!empty($_POST['BotonRegistrar'])) {
    //estoy en condiciones de poder validar los datos
    $Mensaje=Validar_Datos();
    if (empty($Mensaje)) {
        if (InsertarUsuarios($MiConexion) != false) {
            $Mensaje = 'Se ha registrado correctamente.';
            $_POST = array(); 
            $Estilo = 'success'; 
        }
    }
}

require_once 'header.inc.php';

?>
</head>
<body class="form-body">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Formulario de Registraci&oacute;n</h>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                        <div class="panel-body">
                            <form role="form" method='post'>

                                <div class="row">
                                    <div class="col-lg-4" style="text-align: center;">
                                        <img src="images/registro.jpeg" />
                                        <br />
                                    </div>
                                    <div class="col-lg-6">
                                        
                                        <?php if (!empty($Mensaje)) { ?>
                                        <div class="alert alert-<?php echo $Estilo; ?> alert-dismissable">
                                        <?php echo $Mensaje; ?>
                                        </div>
                                        <?php } ?>
                                        
                                        <div class="form-group">
                                            <label>Nombre:</label>
                                            <input class="form-control" type="text" name="Nombre" id="nombre" 
                                            value="<?php echo !empty($_POST['Nombre']) ? $_POST['Nombre'] : ''; ?>"
                                            placeholder="Jose Daniel">
                                        </div>

                                        <div class="form-group">
                                            <label>Apellido:</label>
                                            <input class="form-control" type="text" name="Apellido" id="apellido" 
                                            value="<?php echo !empty($_POST['Apellido']) ? $_POST['Apellido'] : ''; ?>"
                                            placeholder="Castro">
                                        </div>

                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input class="form-control" type="email" name="Email" id="email" 
                                            value="<?php echo !empty($_POST['Email']) ? $_POST['Email'] : ''; ?>"
                                            placeholder="jose@gmail.com">
                                        </div>

                                        <div class="form-group">
                                            <label>Clave:</label>
                                            <input class="form-control" type="password" name="Clave" id="clave" value=""
                                            placeholder="Ingrese Clave">
                                        </div>

                                        <div class="form-group">
                                            <label>Reingresa la clave:</label>
                                            <input class="form-control" type="password" name="ReClave" id="reclave" value=""
                                            placeholder="Repita Clave">
                                        </div>

                                        <div class="form-group">
                                            <label>Domicilio:</label>
                                            <input class="form-control" type="text" name="Direccion" id="direccion" 
                                            value="<?php echo !empty($_POST['Direccion']) ? $_POST['Direccion'] : ''; ?>"
                                            placeholder="San Martin 59 Centro">
                                        </div>

                                        <div class="form-group">
                                            <label>N&uacute;mero Telef&oacute;nico:</label>
                                            <input class="form-control" type="tel" name="Telefono" id="telefono" 
                                            value="<?php echo !empty($_POST['Telefono']) ? $_POST['Telefono'] : ''; ?>"
                                            placeholder="3513447819">
                                        </div>

                                        <div class="form-group">
                                            <label>Subi tu avatar</label>
                                            <input type="file" name="Imagen" id="imagen"
                                            value="<?php echo !empty($_POST['Imagen']) ? $_POST['Imagen'] : ''; ?>"
                                            placeholder="Ingrese su Avatar">
                                        </div>

                                         <div class="form-group">
                                            <label>Provincia</label>
                                            <select class="form-control" name="Provincia" id="provincia">
                                                <option value="">Selecciona...</option>
                                                <?php 
                                                $selected='';
                                                for ($i=0 ; $i < $CantidadProvincias ; $i++) {
                                                    if (!empty($_POST['Provincia']) && $_POST['Provincia'] ==  $ListadoProvincias[$i]['ID']) {
                                                        $selected = 'selected';
                                                    }else {
                                                        $selected='';
                                                    }
                                                    ?>
                                                    <option value="<?php echo $ListadoProvincias[$i]['ID']; ?>" <?php echo $selected; ?> >
                                                        <?php echo $ListadoProvincias[$i]['NOMBRE']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Localidad</label>
                                            <select class="form-control" name="Localidad" id="localidad">
                                                <option value="">Selecciona...</option>
                                                <?php 
                                                $selected='';
                                                for ($i=0 ; $i < $CantidadLocalidades ; $i++) {
                                                    if (!empty($_POST['Localidad']) && $_POST['Localidad'] ==  $ListadoLocalidades[$i]['ID']) {
                                                        $selected = 'selected';
                                                    }else {
                                                        $selected='';
                                                    }
                                                    ?>
                                                    <option value="<?php echo $ListadoLocalidades[$i]['ID']; ?>" <?php echo $selected; ?> >
                                                        <?php echo $ListadoLocalidades[$i]['NOMBRE']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label class="sexo">Sexo:</label>
                                            <br />
                                            <label class="radio-inline">
                                                <input type="radio" name="Sexo" id="SexoF" 
                                                value="F" 
                                                <?php echo (!empty($_POST['Sexo']) && $_POST['Sexo'] == 'F') ? 'checked':''; ?>  >Femenino
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="Sexo" id="SexoM" 
                                                value="M" 
                                                <?php echo (!empty($_POST['Sexo']) && $_POST['Sexo'] == 'M') ? 'checked':''; ?>>Masculino
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="Sexo" id="SexoO" 
                                                value="O"
                                                <?php echo (!empty($_POST['Sexo']) && $_POST['Sexo'] == 'O') ? 'checked':''; ?>>Otro
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Condiciones del sitio:</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="Condiciones"  value="SI"
                                                    <?php echo (!empty($_POST['Condiciones']) && $_POST['Condiciones'] == 'SI') ? 'checked':''; ?>
                                                    >Acepto los T&eacute;rminos y Condiciones.
                                                </label>
                                            </div>
                                        </div>
                                        <button type="button" class="button" value="Regresar" name="regresar"><a class="navbar-brand" href="login.php">Ingresar al panel</a></button>
                                        <button type="submit" class="button" value="Registrar" name="BotonRegistrar" >Registrarme</button>
                                    </div>
                                    <!-- /.row (nested) -->
                                </div>
                            </form>

                            <!-- /.panel-body -->
                        </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
</body>
</html>
