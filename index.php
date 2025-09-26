<?php
session_start();

if (empty($_SESSION['Usuario_Nombre']) ) {
    header('Location: cerrarsesion.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal</title>
    <link rel="stylesheet" href="css/estilo1.css">
</head>
<body>
    <div id="container">
        <header id="header">
            <hgroup>
                <img src="images\logo.jpg" id="logo" alt = "logo" width = 1100>
            </hgroup>
            <nav>
                <ul id="main-nav" class="clearfix">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Quienes somos</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Galeria</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contacto</a></li>
                    <li><a href="cerrarsesion.php">Salir</a></li>
                </ul>
            </nav>
            <form id="searchform">
                <input id="s" placeholder="Busqueda..." type="search">
            </form>
        </header>
        <div id="content">
            <ul id="media1">
            <article class="post clearfix">
                <h2 class="post-title">Microbollos</h2>
                <figure class="post-imagen">
                    <img src="images\microbollo.jpg">
                    <p>El tratamiento de microbollos automotriz es una técnica que se utiliza para reparar peque&ntilde;as abolladuras 
                        en la chapa del auto. Utilizaremos varias t&eacute;cnicas para solucionar estos microbollos. 
                        Algunas de estas t&eacute;cnicas incluyen aplicar t&eacute;cnicas de detecci&oacute;n de abolladuras y luego introducir el auto en un camara para que el calor 
                        haga que el metal se expanda y las peque&ntilde;as abolladuras salten y vayan desapareciendo.</p>
                </figure>
            </article>
            <article class="post clearfix">
                <h2 class="post-title">Tratamiento Ceramico</h2>
                <figure class="post-imagen">
                    <img src="images\ceramico.jpg">
                    <p>El tratamiento cer&aacute;mico o Coating Cer&aacute;mico es una t&eacute;cnica al auge que se encarga de brindar protecci&oacute;n
                         a la pintura externa del coche, as&iacute; como otros elementos y materiales del mismo. Dicho tratamiento se 
                         aplica posteriormente despu&eacute;s de pulir un coche y consiste en la preparaci&oacute;n previa de la carrocer&iacute;a y 
                         posterior aplicaci&oacute;n de un producto sellador para aportar a la pintura del coche una mayor protecci&oacute;n.</p>
                </figure>
            </article>
            <article class="post clearfix">
                <h2 class="post-title">Tratamiento Acr&iacute;lico</h2>
                <figure class="post-imagen">
                    <img src="images\acrilico.jpg">
                    <p>El tratamiento acr&iacute;lico consiste en la aplicaci&oacute;n de una 
                        pel&iacute;cula protectora a base de acrílico, que permitir&aacute; un proceso de descontaminaci&oacute;n de la pintura, 
                        seguido por un sistema de pulido, lustre, abrillantado, encerado y sellado con Cera de Carnauba, 
                        dando como resultado un acabado final de excelencia, protecci&oacute;n contra los rayos UV y la contaminaci&oacute;n, 
                        y mayor profundidad en el color y brillo de la pintura.</p>
                </figure>
            </article>
            <article class="post clearfix">
                <h2 class="post-title">Pulido de Opticas</h2>
                <figure class="post-imagen">
                    <img src="images\optica.jpg">
                    <p>El pulido de &oacute;pticas automotrices es un proceso de restauraci&oacute;n que se utiliza para eliminar la opacidad y 
                        las manchas de los faros de un autom&oacute;vil. Con el paso del tiempo, los faros pueden volverse opacos y amarillentos, 
                        lo que puede reducir la visibilidad y la seguridad al conducir en la noche. Utilizaremos t&eacute;cnicas inovadora para devolverle
                        su estado original.</p>
                </figure>
            </article>
            <article class="post clearfix">
                <h2 class="post-title">Abrillantado</h2>
                <figure class="post-imagen">
                    <img src="images\abrillantado.jpg">
                    <p>El tratamiento de abrillantado automotriz es un proceso que se realiza en la carrocer&iacute;a de su veh&iacute;culo para mejorar su apariencia 
                        y proteger la pintura. Consiste en limpiar la superficie del coche con un paño y aplicar un producto para limpieza r&aacute;pida, 
                        como un quick detail. Luego se coloca el pulimento especial para el coche que se disponga en un pad específico y se aplica en 
                        movimientos suaves por la zona a tratar, de forma circular.</p>
                </figure>
            </article>
            </ul>
            <ul id="media2">
                <article class="post clearfix">
                    <h2 class="post-title">Limpieza de Interior</h2>
                    <figure class="post-imagen">
                        <img src="images\limpieza.jpg">
                        <p>La limpieza de interior automotriz es el proceso de limpiar el interior de un autom&oacute;vil. Esto incluye la limpieza de los asientos, 
                            alfombras, paneles de las puertas y tableros. La limpieza del interior de un autom&oacute;vil es importante para mantener su valor y
                             para asegurarse de que el autom&oacute;vil se vea y huela bien. Para limpiar el interior de un autom&oacute;vil, se pueden utilizar productos 
                             de limpieza espec&iacute;ficos para autom&oacute;viles o productos caseros.</p>
                    </figure>
                </article>
                <article class="post clearfix">
                    <h2 class="post-title">Retok/Lijado de Piezas</h2>
                    <figure class="post-imagen">
                        <img src="images\retok.jpg">
                        <p>Retok es una marca de productos de cosm&eacute;tica del autom&oacute;vil que se dedica a la reparaci&oacute;n de rayones y peque&ntilde;os da&ntilde;os en los veh&iacute;culos. 
                            La empresa tiene m&aacute;s de 3 a&ntilde;os en el mercado y ofrece una l&iacute;nea de productos de alta calidad. Las lijas para la automotriz son abrasivos especialmente diseñados 
                            para su uso en automóviles y otras superficies de similares características. Se utilizan lijas de densidad fina.</p>
                    </figure>
                </article>
                <article class="post clearfix">
                    <h2 class="post-title">Lavado Full Detail</h2>
                    <figure class="post-imagen">
                        <img src="images\lavadofull.jpg">
                        <p>El lavado Full Detail automotriz es un servicio de limpieza y mantenimiento de veh&iacute;culos que incluye una limpieza profunda y 
                            detallada del interior y exterior del veh&iacute;culo. Este servicio puede incluir la limpieza de la tapicer&iacute;a, alfombras, paneles de puertas, 
                            tablero, consola central y otros componentes interiores. Tambi&eacute;n puede incluir la limpieza y pulido de la pintura del veh&iacute;culo, llantas y rines.</p>
                    </figure>
                </article>
                <article class="post clearfix">
                    <h2 class="post-title">Lavado de Motor</h2>
                    <figure class="post-imagen">
                        <img src="images\lavadomotor.jpg">
                        <p>El lavado de motor automotriz es un procedimiento que se realiza para limpiar el motor de un veh&iacute;culo. Este proceso se puede hacer con agua y productos
                            especiales antihumedad con pincelito incluido. Sin embargo, actualmente empleamos el m&eacute;todo de lavado sin agua y con productos
                            especiales antihumedad con pincelito incluido.</p>
                    </figure>
                </article>
                <article class="post clearfix">
                    <h2 class="post-title">Productos</h2>
                    <figure class="post-imagen">
                        <img src="images\productos.jpg">
                        <p>Los productos de limpieza automotriz son aquellos que se utilizan para limpiar y mantener los veh&iacute;culos. Estos productos pueden ser espec&iacute;ficos 
                            para diferentes partes del autom&oacute;vil, como la carrocer&iacute;a, las llantas o el interior del veh&iacute;culo. Algunos de los productos m&aacute;s comunes son los champ&uacute;s 
                            para autos y carrocer&iacute;as biodegradables, los detergentes l&iacute;quidos concentrados y los abrillantadores de motores.</p>
                    </figure>
                </article>
            </ul>
        </div>
        <?php require_once 'aside.php'; ?>
        <?php require_once 'footer.php'; ?>
    </div>
    <?php $_SESSION['Mensaje']=''; ?>
</body>
</html>