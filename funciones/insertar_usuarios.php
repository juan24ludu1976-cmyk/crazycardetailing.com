<?php 
function InsertarUsuarios($vConexion){

    // Ejemplo en PHP con el driver mysqli

    $email_a_registrar = $_POST['Email']; // El email que viene del formulario

    // 1. Conectar a la base de datos (asumiendo que $conexion ya está establecida)

    // 2. Consultar si el email ya existe
    $sql_verificar = "SELECT Id FROM usuarios WHERE Email = ?";
    if ($stmt = $vConexion->prepare($sql_verificar)) {
        $stmt->bind_param("s", $email_a_registrar);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // El email ya existe
            echo "Error: Este correo electrónico ya está registrado.";
        } else {
            // El email no existe, puedes proceder a la inserción
            // ... código para insertar el nuevo usuario ...
            //para guardar la clave encriptada uso el MD5 en el campo de clave
            $SQL_Insert="INSERT INTO Usuarios (Nombre, Apellido, Email, Clave, Direccion, Telefono,
            IdNivel, IdProvincia, IdLocalidad, FechaCarga, Imagen, Sexo, Activo)
            VALUES ('{$_POST['Nombre']}', '{$_POST['Apellido']}','{$_POST['Email']}', MD5('{$_POST['Clave']}'),
            '{$_POST['Direccion']}', '{$_POST['Telefono']}',
            2, '{$_POST['Provincia']}', '{$_POST['Localidad']}', NOW(), '{$_POST['Imagen']}', '{$_POST['Sexo']}', 1)";


            if (!mysqli_query($vConexion, $SQL_Insert)) {
                //si surge un error, finalizo la ejecucion del script con un mensaje
                die('<h4>Error al intentar insertar el registro.</h4>');
            }

            return true;
        }
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta de verificación.";
    }

    // 3. Cerrar conexión
    // $conexion->close();
}
?>