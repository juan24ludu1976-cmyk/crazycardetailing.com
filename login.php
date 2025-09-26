<?php 
session_start();
//include('config.php');
require_once 'funciones/conexion.php';
$MiConexion=ConexionBD();

$Mensaje='';
if (!empty($_POST['BotonLogin'])) {

    require_once 'funciones/login.php';
    $UsuarioLogueado = DatosLogin($_POST['email'], $_POST['password'], $_POST['newpassword'], $MiConexion);

    //la consulta con la BD para que encuentre un usuario registrado con el usuario y clave brindados
    if ( !empty($UsuarioLogueado)) {
       // $Mensaje ='ok! ya puedes ingresar';

       //generar los valores del usuario (esto va a venir de mi BD)
        $_SESSION['Usuario_Nombre']         =   $UsuarioLogueado['NOMBRE'];
        $_SESSION['Usuario_Apellido']       =   $UsuarioLogueado['APELLIDO'];
        $_SESSION['Usuario_Nivel']          =   $UsuarioLogueado['NIVEL'];
        $_SESSION['Usuario_Img']            =   $UsuarioLogueado['IMG'];
        $_SESSION['Usuario_Token']          =   $UsuarioLogueado['TOKEN'];
        $_SESSION['Usuario_Id']             =   $UsuarioLogueado['ID'];
        $_SESSION['Usuario_Nombre_Nivel']   =   $UsuarioLogueado['NOMBRE_NIVEL'];

        if ($UsuarioLogueado['ACTIVO']==0) {
            $Mensaje ='Ud. no se encuentra activo en el sistema.';
        }else if($UsuarioLogueado['ACTIVO']==1 && $UsuarioLogueado['NIVEL']!=2){
            header('Location: sistema.php');
            exit;
        }else {
            header('Location: index.php');
            exit;
        }

    }else {
        $Mensaje='Datos incorrectos, ingresa nuevamente.';
    }

}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        <?php
        if(!empty($_POST['BotonRecupera'])){?>
             /* Opcional: estilo para el input oculto */
            #newpassword{
                display: none; /* Oculto inicialmente */
            } 
            #password{
                display: block;
            }
        <? } else{?>
            /* Opcional: estilo para el input oculto */
            #newpassword{
                display: block;
            } 
            #password{
                display: none; /* Oculto inicialmente */
            }
        <?php } ?>
    </style>
</head>
<body class="form-body">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="text"><strong>INGRESA TUS DATOS<strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="center">
                            <img src="images/logo1.jpg" alt="user-login">
                        </div>
                        <div id="signup">
                        <form role="form" method="post">
                            <?php if (!empty ($Mensaje)) { ?>
                                <div class="form-group text">
                                    <label><?php echo $Mensaje; ?></label>
                                </div>
                            <?php } ?>                  
                            <?php
                                include('msjs.php');
                            ?>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus value=''>
                                </div>
                                <div class="form-group text">
                                    <input class="form-control" placeholder="Password" name="password" type="password" id="password" >
                                </div>
                                <div class="form-group text">
                                    <input class="form-control" placeholder="New Password" name="newpassword" type="password" id="newpassword">
                                </div>
                                <div class="form-group text">
                                    Si no tienes cuenta, puedes registrarte <a href="registro.php" title="Registrar"> aqui</a>
                                </div>
                                <div class="form-group text">
                                    <button type="submit" class="btn btn-default" value="Login" name="BotonLogin" >Ingresar</button>                                 
                                </div>
                                <div class="form-group text">
                                    <a href="#" id="olvidar" title="Recuperar Clave">Recuperar Clave</a>
                                </div>
                        </form>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="recuperarclave">
                            <h1 class="form-group text">
                                Recuperar tu Clave
                            </h1>
                                
                            <form action="recuperarClave.php" method="post">
                                <div class="form-group text">
                                    <label>Correo</label>
                                    <input type="email" name="email" required autocomplete="off"/>
                                    <br>
                                </div>
                            
                                <input type="submit" class="button button-block miBtn mt-5" id="BotonRecupera" value="RECUPERAR CLAVE"/>

                                <div class="form-group text">
                                <a href="#" id="volver" class="mt-3 mb-4" title="Volver">Volver</a>
                                <br><br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
        $('#recuperarclave').hide(); 

        $('#olvidar').on('click', function() {
            $('#signup').hide(); //para ocultar
            $("#recuperarclave").fadeIn("slow"); //mostrar
        });

        $('#volver').on('click', function() {
            $('#recuperarclave').hide(); //para ocultar
            $('#newpassword').hide();
            $("#signup").fadeIn("slow"); //mostrar
        });
    </script>
    <script>
        // Obtener referencias a los elementos del HTML
        const boton = document.getElementById('BotonRecupera');
        const miInput = document.getElementById('newpassword');
        const priInput = document.getElementById('password');

        // Función para mostrar u ocultar el input
        function toggleInput() {
        // Si el input está oculto (display: none), lo mostramos
        if (miInput.style.display === 'none' && priInput.style.display === 'block') {
            miInput.style.display === 'block'; // O 'block' si es un div o textarea
            priInput.style.display === 'none';
        } else {
            // Si el input está visible, lo ocultamos
            miInput.style.display === 'none';
            priInput.style.display === 'block';
        }
        }

        // Añadir el evento 'click' al botón
        boton.addEventListener('click', toggleInput);
    </script>
</body>
</html>