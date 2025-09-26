<?php
session_start();

if (empty($_SESSION['Usuario_Nombre']) ) {
    header('Location: cerrarsesion.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta property="og:type" content="website">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistema</title>
    <link rel="stylesheet" href="css\estilo.css">
</head>
<body>
    <div id="container">
        <header id="header">
            <hgroup>
                <img src="images\logo.jpg" id="logo" alt = "logo">
                <label>Crazycardetailing</label>
            </hgroup>
            <nav class="navegacion">
                    <ul class="menu">
                        <li><a href="#">Ventas</a>
                            <ul class="submenu">
                                <li><a href="#">Presupuesto Dolar</a>
                                <li><a href="#">Facturacion</a></li>
                                <li><a href="documento.php" target="cuerpo">Presupuesto</a></li>
                                <li><a href="#">Consulta de Comprobantes</a></li>
                                <li><a href="#">Facturacion: Reimpresion</a></li>
                                <li><a href="#">Notas de Ventas</a></li>
                                <li><a href="#">Informes</a></li>
                                <li><a href="#">Pedidos</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Ctas Ctes</a>
                            <ul class="submenu">
                                <li><a href="#">Resumen de Cuenta</a></li>
                                <li><a href="#">Ficha del Cliente</a></li>
                                <li><a href="#">Agenda Llamadas</a></li>
                                <li><a href="#">Informes</a>
                                    <ul class="submenus">
                                        <li><a href="#">Facturacion: Reimpresion</a></li>
                                        <li><a href="#">Notas de Ventas</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Pedidos</a>
                                    <ul class="submenus">
                                        <li><a href="#">Facturacion: Reimpresion</a></li>
                                        <li><a href="#">Notas de Ventas</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#">Depositos</a>
                            <ul class="submenu">
                                <li><a href="#">Remitos</a></li>
                                <li><a href="#">Remitos Nota de Venta</a></li>
                                <li><a href="#">Remitos de Entrega</a></li>
                                <li><a href="#">Remitos Devolucion</a></li>
                                <li><a href="#">Baucher Devolucion</a></li>
                                <li><a href="#">Remito Control de Mercaderia</a></li>
                                <li><a href="#">Archivos</a>
                                    <ul class="submenus">
                                        <li><a href="#">Facturacion: Reimpresion</a></li>
                                        <li><a href="#">Notas de Ventas</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Informes</a>
                                    <ul class="submenus">
                                        <li><a href="#">Facturacion: Reimpresion</a></li>
                                        <li><a href="#">Notas de Ventas</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Reclamos</a>
                                    <ul class="submenus">
                                        <li><a href="#">Facturacion: Reimpresion</a></li>
                                        <li><a href="#">Notas de Ventas</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#">Compras</a>
                            <ul class="submenu">
                                <li><a href="#">Orden de Compra</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Proveedores</a></li>
                        <li><a href="#">Fondos</a></li>
                        <li><a href="#">Contabilidad</a></li>
                        <li><a href="#">Administracion del Sistema</a>
                            <ul class="submenu">
                                <li><a href="#">ABM</a>
                                    <ul class="submenus">
                                        <li><a href="usuario.php" target="cuerpo">Usuarios</a></li>
                                        <li><a href="productos.php" target="cuerpo">Productos</a></li>
                                        <li><a href="proveedores.php" target="cuerpo">Proveedores</a></li>
                                        <li><a href="transporte.php" target="cuerpo">Transportes</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Listados</a>
                                    <ul class="submenus">
                                        <li><a href="#">Usuarios</a>
                                            <ul class="submenus">
                                                <li><a href="listado_usuarios.php" target="cuerpo">Usuarios</a></li>
                                                <li><a href="listado_usuario_baja.php" target="cuerpo">Usuarios dados de Baja</a></li>
                                            </ul>    
                                        </li>
                                        <li><a href="listado_productos.php" target="cuerpo">Productos</a></li>
                                        <li><a href="listado_proveedores.php" target="cuerpo">Proveedores</a></li>
                                        <li><a href="listado_transportes.php" target="cuerpo">Transportes</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#">Informes Gerenciales</a></li>
                        <li><a href="#">Salir</a>
                            <ul class="submenu">
                                <li><a href="cerrarsesion.php">Salir</a></li>
                            </ul>
                        </li>
                    </ul>
            </nav>
        </header>
        <div id="cuerpo">
            <iframe name="cuerpo" width="100%" height="100%" style="border:1px solid #ccc;"></iframe>
        </div>
    </div>
    <?php $_SESSION['Mensaje']=''; ?>
</body>
</html>