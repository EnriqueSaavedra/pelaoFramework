<?php
session_start();  
require_once(Link::include_file('clases/utilidad/UserException.php'));
require_once(Link::include_file('clases/utilidad/MensajeSistema.php'));
require_once(Link::include_file('clases/utilidad/Errores.php'));
require_once(Link::include_file('clases/utilidad/PHPLogger.php'));
require_once(Link::include_file('clases/utilidad/Debuger.php'));
require_once(Link::include_file('clases/utilidad/HtmlUtiles.php'));
require_once(Link::include_file('clases/DAO/UsuarioDAO.php'));
require_once(Link::include_file('clases/DAO/CarritoDAO.php'));
require_once(Link::include_file('clases/DAO/ProductoDAO.php'));
/*
 * Metodos globales
 */
       
function printArray($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
function unicode2html($str){
    return str_replace("u00f3", "ó", $str);
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">	
        <title>Drysoft Inicio</title>	
        <meta name="keywords" content="desarrollo, sistemas, programas, software, administracion, empresa, digital, santiago, chile, a, e, o, u, tu, el, la, los,   un, uos, con, y, para, por, contabilidad, remuneraciones, gestion, bodegas" />
        <meta name="description" content="Aplicaciones para administracion digital. Proveemos confiables programas para manejar contabilidad, remuneraciones, gestion comercial y los activos de una empresa.">
        <meta name="author" content="www.drysoft.com">
        <!-- Favicon -->
        <link rel="shortcut icon" href="recursos/imagenes/favicon.ico" type="recursos/imagenes/x-icon" />
        <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
        <link rel="icon" type="recursos/imagenes/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
        <link rel="icon" type="recursos/imagenes/png" sizes="32x32" href="favicon/favicon-32x32.png">
        <link rel="icon" type="recursos/imagenes/png" sizes="96x96" href="favicon/favicon-96x96.png">
        <link rel="icon" type="recursos/imagenes/png" sizes="16x16" href="favicon/favicon-16x16.png">
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
        <!-- Vendor CSS -->
        <link rel="stylesheet" href="recursos/css/bootstrap.min.css">
        <link rel="stylesheet" href="recursos/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.min.css">
        <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.min.css">
        <!-- Theme CSS -->
        <link rel="stylesheet" href="recursos/css/theme.css">
        <link rel="stylesheet" href="recursos/css/theme-elements.css">
        <link rel="stylesheet" href="recursos/css/theme-blog.css">
        <link rel="stylesheet" href="recursos/css/theme-shop.css">
        <link rel="stylesheet" href="recursos/css/theme-animate.css">
        <!-- Current Page CSS -->
        <link rel="stylesheet" href="vendor/rs-plugin/css/settings.css" media="screen">
        <link rel="stylesheet" href="vendor/rs-plugin/css/layers.css" media="screen">
        <link rel="stylesheet" href="vendor/rs-plugin/css/navigation.css" media="screen">
        <link rel="stylesheet" href="vendor/circle-flip-slideshow/css/component.css" media="screen">
        <!-- Skin CSS -->
        <link rel="stylesheet" href="recursos/css/skins/default.css">
        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="recursos/css/custom.css">
        <!-- Head Libs -->
        <script src="vendor/modernizr/modernizr.min.js"></script>
        <!-- Vendor -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/jquery.appear/jquery.appear.min.js"></script>
        <script src="vendor/jquery.easing/jquery.easing.min.js"></script>
        <script src="vendor/jquery-cookie/jquery-cookie.min.js"></script>
        <script src="recursos/js/bootstrap.min.js"></script>
        <script src="recursos/js/bootstrap-select.min.js"></script>
        <script src="recursos/js/jquery.rut.min.js"></script>
        <script src="vendor/common/common.min.js"></script>
        <script src="vendor/jquery.validation/jquery.validation.min.js"></script>
        <script src="vendor/jquery.stellar/jquery.stellar.min.js"></script>
        <script src="vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
        <script src="vendor/jquery.gmap/jquery.gmap.min.js"></script>
        <script src="vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
        <script src="vendor/isotope/jquery.isotope.min.js"></script>
        <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
        <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
        <script src="vendor/vide/vide.min.js"></script>
        
        <script src="recursos/js/theme.js"></script>
        <!-- Current Page Vendor and Views -->
        <script src="vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
        <script src="vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
        <script src="vendor/circle-flip-slideshow/js/jquery.flipshow.min.js"></script>
        <script src="recursos/js/views/view.home.js"></script>
        <script src="recursos/js/bootstrap-notify-master/bootstrap-notify.min.js"></script>
        <!-- Theme Custom -->
        <script src="recursos/js/custom.js"></script>
        <!-- Theme Initialization Files -->
        <script src="recursos/js/theme.init.js"></script>
        <!-- Google Analytics -->

        <script src="recursos/js/jquery.rut.min.js"></script>
    </head>
    <body>
        <?php if(!isset($_GET['noHead'])) { ?>
        <div class="body">
            <header id="header" class="header-narrow header-semi-transparent header-transparent-sticky-deactive header-transparent-bottom-border" data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 1, "stickySetTop": "1"}'>
                <div class="header-body">
                    <div class="header-container container">
                        <div class="header-row">
                            <div class="header-column">
                                <div class="header-logo">
                                    <a href="index.php">
                                        <img alt="Drysoft" width="146" height="45" src="recursos/imagenes/logo-default-slim-dark.png">
                                    </a>
                                </div>
                            </div>
                            <div class="header-column">
                                <div class="header-row">
                                    <div class="header-nav header-nav-dark-dropdown">
                                        <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
                                            <i class="fa fa-bars"></i>
                                        </button>
                                        <div class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1 collapse">
                                            <nav>
                                                <ul class="nav nav-pills" id="mainNav">
                                                    <li class="hidden">
                                                        <a href="#page-top"></a>
                                                    </li>
                                                    <li>
                                                        <a title="Acerca de Drysoft" class="fadeInDown appear-animation-visible" href="index.php#empresa" data-appear-animation="fadeInDown" data-appear-animation-delay="300" style="animation-delay: 300ms;">Empresa</a>
                                                    </li>
                                                    <li>
                                                        <a title="Sistemas y softwares" class="fadeInDown appear-animation-visible" href="index.php#productos" data-appear-animation="fadeInDown" data-appear-animation-delay="300" style="animation-delay: 300ms;">Productos</a>
                                                    </li>
                                                    <li>
                                                        <a title="Ofertas por Internet" class="fadeInDown appear-animation-visible" href="<?=Link::getRutaHref('PUBLIC', 'ofertas/ofertas'); ?>" data-appear-animation="fadeInDown" data-appear-animation-delay="300" style="animation-delay: 300ms;">Ofertas</a>
                                                    </li>
                                                    <li>
                                                        <a title="Instalacion y desarrollo" class="fadeInDown appear-animation-visible" href="index.php#servicios" data-appear-animation="fadeInDown" data-appear-animation-delay="300" style="animation-delay: 300ms;">Servicios</a>
                                                    </li>
                                                    <li>
                                                        <a title="Clientes" class="fadeInDown appear-animation-visible" href="index.php#clientes" data-appear-animation="fadeInDown" data-appear-animation-delay="300" style="animation-delay: 300ms;">Clientes</a>
                                                    </li>
                                                    <li>
                                                        <a title="Contactenos" class="fadeInDown appear-animation-visible" href="index.php#contacto" data-appear-animation="fadeInDown" data-appear-animation-delay="300" style="animation-delay: 300ms;">Contacto</a>
                                                    </li>
                                        <?php
                                        if(empty($_SESSION['USER'])){
                                        ?>
                                                    <li>
                                                        <a title="Login" class="fadeInDown appear-animation-visible" href="#" data-appear-animation="fadeInDown" data-appear-animation-delay="300" id="enlaceIngresar" style="animation-delay: 300ms;">Ingresar</a>
                                                    </li>
                                                    <li>
                                                        <a title="Login" class="fadeInDown appear-animation-visible" href="#" data-appear-animation="fadeInDown" data-appear-animation-delay="300" id="enlaceRegistrar" style="animation-delay: 300ms;">Registrate</a>
                                                    </li>
                                        <?php
                                        }else{
                                            ?>
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"  ><?= $_SESSION['USER'][UsuarioDAO::SESSION_EMAIL] ?></a>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="<?=Link::getRutaHref('PUBLIC', 'historial/historial'); ?>">Historial de compra</a></li>
                                                            <li class="productos-carrito"><a href="#">Productos en Carrito <span class="badge"><?=$cantidad?></span></a></li>
                                                            <li><a id="cerrarSesion" href="#">Cerrar Sesión</a></li>
                                                        </ul>
                                                    </li>
                                       <?php } ?>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        <?php } ?>