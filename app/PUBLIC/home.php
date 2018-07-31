<?php
$app = new MensajeSistema();
try { 
    if(isset($_GET['message']))
        throw new UserException($_GET['message'], UserException::ERROR);
} catch(UserException $e){
    $app->addMessage($e->getMessage(), $e->getCode());
} catch(Exception $e){
    PHPLogger::LogError($e->getMessage(),$e->getCode(), PHPLogger::ERROR, $e);   
}
?>
<div role="main" class="main">
    <div class="slider-container rev_slider_wrapper" style="height: 677px;">
        <div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options='{"delay": 6000, "gridwidth": 800, "gridheight": 677}'>
            <ul>
                <li data-transition="fade">
                    <img src="recursos/imagenes/slides/slide-bg-4.jpg"  
                         alt=""
                         data-bgposition="center center" 
                         data-bgfit="cover" 
                         data-bgrepeat="no-repeat" 
                         class="rev-slidebg">
                    <div class="tp-caption featured-label"
                         data-x="center"
                         data-y="center" data-voffset="-45"
                         data-start="500"
                         style="z-index: 5"
                         data-transform_in="y:[100%];s:500;"
                         data-transform_out="opacity:0;s:500;">BIENVENIDO A DRYSOFT!</div>
                    
                    <div class="tp-caption bottom-label"
                         data-x="center"
                         data-y="center" data-voffset="5"
                         data-start="1000"
                         data-transform_idle="o:1;"
                         data-transform_in="y:[100%];z:0;rZ:-35deg;sX:1;sY:1;skX:0;skY:0;s:600;e:Power4.easeInOut;"
                         data-transform_out="opacity:0;s:500;"
                         data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                         data-splitin="chars" 
                         data-splitout="none" 
                         data-responsive_offset="on"
                         style="font-size: 23px; line-height: 30px; z-index: 5"
                         data-elementdelay="0.05">Buscando administrar su Empresa?</div>					
                </li>
                <li data-transition="fade">
                    <img src="recursos/imagenes/slides/slide-bg-3.jpg"  
                         alt=""
                         data-bgposition="center center" 
                         data-bgfit="cover" 
                         data-bgrepeat="no-repeat" 
                         class="rev-slidebg">
                    <div class="tp-caption"
                         data-x="center" data-hoffset="-150"
                         data-y="center" data-voffset="-95"
                         data-start="1000"
                         style="z-index: 5"
                         data-transform_in="x:[-300%];opacity:0;s:500;"><img src="recursos/imagenes/slides/slide-title-border.png" alt=""></div>
                    
                    <div class="tp-caption top-label"
                         data-x="center" data-hoffset="0"
                         data-y="center" data-voffset="-95"
                         data-start="500"
                         style="z-index: 5"
                         data-transform_in="y:[-300%];opacity:0;s:500;">DRYSOFT OFRECE</div>
                    
                    <div class="tp-caption"
                         data-x="center" data-hoffset="150"
                         data-y="center" data-voffset="-95"
                         data-start="1000"
                         style="z-index: 5"
                         data-transform_in="x:[300%];opacity:0;s:500;"><img src="recursos/imagenes/slides/slide-title-border.png" alt=""></div>
                    
                    <div class="tp-caption main-label"
                         data-x="center" data-hoffset="0"
                         data-y="center" data-voffset="-45"
                         data-start="1500"
                         data-whitespace="nowrap"						 
                         data-transform_in="y:[100%];s:500;"
                         data-transform_out="opacity:0;s:500;"
                         style="z-index: 5"
                         data-mask_in="x:0px;y:0px;">Soluciones Administrativas</div>
                    
                    <div class="tp-caption bottom-label"
                         data-x="center" data-hoffset="0"
                         data-y="center" data-voffset="5"
                         data-start="2000"
                         style="z-index: 5"
                         data-transform_in="y:[100%];opacity:0;s:500;">Para todo tipo de empresas</div>
                    
                    <a class="tp-caption btn btn-lg btn-primary btn-slider-action"
                       data-hash
                       data-hash-offset="85"
                       href="#contacto"
                       data-x="center" data-hoffset="0"
                       data-y="center" data-voffset="80"
                       data-start="2200"
                       data-whitespace="nowrap"						 
                       data-transform_in="y:[100%];s:500;"
                       data-transform_out="opacity:0;s:500;"
                       style="z-index: 5"
                       data-mask_in="x:0px;y:0px;">Cont&aacute;ctenos ahora!</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="home-intro">
        <div class="container">
            <div id="empresa"></div>
            <div class="row">
                <div class="col-md-4">
                    <p>
                        Mant&eacute;ngase al d&iacute;a con las <a href="https://softwaredrysoft.wordpress.com/" target="_blank"><em>Noticias</em></a>
                        <span>Checkeando nuestro blog <a href="https://softwaredrysoft.wordpress.com/" target="_blank">aqu&iacute;</a></span>
                    </p>
                </div>
                <div class="col-md-8">
                    <div class="get-started">
                        <a title="Facturacion Electronica" href="https://softwaredrysoft.wordpress.com/informativo-de-sistema-de-facturacion-electronica-drysoft/" target="_blank" class="btn btn-lg btn-primary inline-object mr-lg">Facturaci&oacute;n Electr&oacute;nica</a>
                        <a title="Normas IFRS" href="https://softwaredrysoft.wordpress.com/normas-internacionales-de-informacion-financiera-ifrs/" target="_blank" class="btn btn-lg btn-primary inline-object">Normas IFRS</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row center">
            <div class="col-md-12">
                <h2 class="mb-sm word-rotator-title">
                    Drysoft es una empresa de <strong>Software Development</strong>
                </h2>
                <p class="lead">
                    Con nuestros softwares puede tomar control de su empresa en un 100%, cada m&oacute;dulo esta pensado en la administraci&oacute;n f&aacute;cil y eficiente de una empresa.
                </p>
            </div>
        </div>
    </div>
    <section class="section mb-none">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="feature-box feature-box-style-2">
                                <div class="feature-box-icon">
                                    <i class="fa fa-file"></i>
                                </div>
                                <div class="feature-box-info">
                                    <h4 class="mb-none">Facturaci&oacute;n Electr&oacute;nica</h4>
                                    <p class="tall">Genera la contabilidad y evita doble digitaci&oacute;n. Sin detener el proceso de ventas y envia facturas a los clientes en PDF.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-box feature-box-style-2">
                                <div class="feature-box-icon">
                                    <i class="fa fa-check"></i>
                                </div>
                                <div class="feature-box-info">
                                    <h4 class="mb-none">100% Seguro</h4>
                                    <p class="tall">Los datos son guardados en el PC del usuario en forma confidencial y segura.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-box feature-box-style-2">
                                <div class="feature-box-icon">
                                    <i class="fa fa-group"></i>
                                </div>
                                <div class="feature-box-info">
                                    <h4 class="mb-none">Soporte</h4>
                                    <p class="tall">Soporte gratuito entregado via telef&oacute;nica y por email exclusivamente.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="call-to-action call-to-action-primary pt-lg pb-lg">
        <div class="row pt-lg pb-lg">
            <div class="counters text-color-light">
                <div class="col-md-3 col-sm-6">
                    <div class="counter">
                        <i class="fa fa-user"></i>
                        <strong data-to="1000" data-append="+">0</strong>
                        <div id="productos"></div>
                        <label>Clientes Felices</label> 
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="counter">
                        <i class="fa fa-globe"></i>
                        <strong data-to="27">0</strong>
                        <label>A&ntilde;os en el mercado</label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="counter">
                        <i class="fa fa-laptop"></i>
                        <strong data-to="4">0</strong>
                        <label>Sistemas Especializados</label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="counter">
                        <i class="fa fa-desktop"></i>
                        <strong data-to="7">0</strong>
                        <label>Soluciones Desarrolladas</label>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row mt-xl">
            <div class="col-md-12 center">
                <h2 class="mt-xl mb-none">Nuestros <strong>Productos</strong></h2>
                <div class="divider divider-primary divider-small divider-small-center mb-xl">
                    <hr>
                </div>
                <p class="lead">Drysoft ofrece sistemas modulares, estos pueden ser implementados en forma integrada para controlar completamente los procesos administrativos de la empresa, o por modulos independientes para administrar ciertas &aacute;reas. Nuestros softwares permiten administrar los procesos de las &aacute;reas de contabilidad, finanzas, personal, ventas, adquisiciones y bodega.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="tabs tabs-bottom tabs-center tabs-simple mt-xl mb-xl">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tabsNavigationSimpleIcons1" data-toggle="tab">
                                <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                    <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                        <span class="box-content p-none m-none">
                                            <span class="icon-featured icons">C</span>
                                        </span>
                                    </span>
                                </span>									
                                <p class="mb-none pb-none">Contabilidad</p>
                            </a>
                        </li>
                        <li>
                            <a href="#tabsNavigationSimpleIcons2" data-toggle="tab">
                                <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                    <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                        <span class="box-content p-none m-none">
                                            <span class="icon-featured icons">R</span>
                                        </span>
                                    </span>
                                </span>									
                                <p class="mb-none pb-none">Remuneraciones</p>
                            </a>
                        </li>
                        <li>
                            <a href="#tabsNavigationSimpleIcons3" data-toggle="tab">
                                <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                    <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                        <span class="box-content p-none m-none">
                                            <span class="icon-featured icons">G</span>
                                        </span>
                                    </span>
                                </span>									
                                <p class="mb-none pb-none">Gesti&oacute;n Comercial</p>
                            </a>
                        </li>
                        <li>
                            <a href="#tabsNavigationSimpleIcons4" data-toggle="tab">
                                <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                    <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                        <span class="box-content p-none m-none">
                                            <span class="icon-featured icons">A</span>
                                        </span>
                                    </span>
                                </span>									
                                <p class="mb-none pb-none">Activo Fijo</p>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabsNavigationSimpleIcons1">
                            <div class="center">
                                <p title="Programa de contabilidad">Maneja una o mas contabilidades en forma integral, a nivel de saldos de cuentas o de detalle de documentos.</p>
                                <a href="<?=Link::getRutaHref('PUBLIC', 'vistasHtml/contabilidad'); ?>#ifrs" class="page-scroll">+ Sistema de Contabilidad con IFRS</a><br>
                                <a href="<?=Link::getRutaHref('PUBLIC', 'vistasHtml/contabilidad'); ?>#ifrs-fac" class="page-scroll">+ Sistema de Contabilidad con Facturaci&oacute;n Electr&oacute;nica</a>
                                <br><br>
                                <a href="<?=Link::getRutaHref('PUBLIC', 'vistasHtml/contabilidad'); ?>" class="btn btn-primary page-scroll">Ver m&aacute;s</a>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabsNavigationSimpleIcons2">
                            <div class="center">
                                <p title="Programa para remuneraciones">Esta dise&ntilde;ado para controlar en forma integral los aspectos contractuales, de sueldos y previsi&oacute;n de los trabajadores.
                                </p>
                                <p>Listados previsionales, para las AFP, Isapres, Fonasa, Mutual de Accidentes, caja de Compensaci&oacute;n.</p>
                                <a href="<?=Link::getRutaHref('PUBLIC', 'vistasHtml/remuneraciones'); ?>" disabled="disabled" class="btn btn-primary page-scroll">Ver m&aacute;s</a>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabsNavigationSimpleIcons3">
                            <div class="center">
                                <p title="Programa para gestion comercial">Esta dise&ntilde;ado para controlar el inventario de productos por bodega, costos, compras, ventas y cuentas corrientes de clientes y proveedores.</p>
                                <!--<a href="gestion.html#ges-fac" disabled="disabled" class="page-scroll">+ Sistema de Gesti&oacute;n con Facturaci&oacute;n Electr&oacute;nica</a>-->
                                <br><br>
                                <a href="<?=Link::getRutaHref('PUBLIC', 'vistasHtml/gestion'); ?>" disabled="disabled" class="btn btn-primary page-scroll">Ver m&aacute;s</a>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabsNavigationSimpleIcons4">
                            <div class="center">
                                <p title="Programa para administrar lo activos fijos">Este Sistema administra los activos de una o mas empresas, en el &aacute;mbito tributario y contable.</p>
                                <p>Permite Revalorizaci&oacute;n y Depreciaci&oacute;n Normal y Acelerada de los Activos en cada Ejercicio y sus acumulados.</p>
                                <a href="<?=Link::getRutaHref('PUBLIC', 'vistasHtml/activofijo'); ?>" class="btn btn-primary page-scroll">Ver m&aacute;s</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="servicios"></div>
            </div>
        </div>
    </div>
    <section class="call-to-action call-to-action-primary mb-none">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="call-to-action-content align-left pb-lg pt-xlg ml-none">
                        <h2 class="text-color-light mb-none mt10">Tambi&eacute;n tenemos <strong>ofertas comprando por internet...</strong></h2>
                    </div>
                    <div class="call-to-action-btn">
                        <a href="<?=Link::getRutaHref('PUBLIC', 'ofertas/ofertas'); ?>" class="btn btn-lg btn-primary btn-primary-scale-2 mr-md">Ver Ofertas</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section pt-md mt-none">
        <div class="container">
            <div class="row center">
                <div class="col-md-12">
                    <h2 class="mb-none word-rotator-title mt-xl">
                        Desarrollo y <strong>Servicios</strong>
                    </h2>
                    <div class="divider divider-primary divider-small divider-small-center mb-xl">
                        <hr>
                    </div>
                    <p class="lead mb-xl mt-md">
                        Drysoft ofrece sistemas personalizados, utilizando lo &uacute;ltimo en tecnolog&iacute;as y metodolog&iacute;as de desarrollo de software. Este servicio es ideal para quienes necesiten un software especializado que cumpla con sus requerimientos espec&iacute;ficos.
                    </p>
                </div>
            </div>
            <div class="row text-left mt-lg">
                <div class="col-sm-5 col-sm-offset-1">
                    <div class="feature-box">
                        <div class="feature-box-icon">
                            <i class="fa fa-group"></i>
                        </div>
                        <div class="feature-box-info">
                            <h5 class="heading-primary mb-none">Respaldos de Informaci&oacute;n</h5>
                        </div>
                    </div>
                    <div class="feature-box">
                        <div class="feature-box-icon">
                            <i class="fa fa-file"></i>
                        </div>
                        <div class="feature-box-info">
                            <h5 class="heading-primary mb-none">Recuperaci&oacute;n de datos e Informaci&oacute;n</h5>
                        </div>
                    </div>
                    <div class="feature-box">
                        <div class="feature-box-icon">
                            <i class="fa fa-google-plus"></i>
                        </div>
                        <div class="feature-box-info">
                            <h5 class="heading-primary mb-none">Capacitaci&oacute;n en la Operaci&oacute;n de Sistemas</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="feature-box">
                        <div class="feature-box-icon">
                            <i class="fa fa-film"></i>
                        </div>
                        <div class="feature-box-info">
                            <h5 class="heading-primary mb-none">Desinstalaci&oacute;n y Traslado de Sistemas</h5>
                        </div>
                    </div>
                    <div class="feature-box">
                        <div class="feature-box-icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="feature-box-info">
                            <h5 class="heading-primary mb-none">An&aacute;lisis de Informaci&oacute;n</h5>
                        </div>
                    </div>
                    <div class="feature-box">
                        <div class="feature-box-icon">
                            <i class="fa fa-bars"></i>
                        </div>
                        <div class="feature-box-info">
                            <h5 class="heading-primary mb-none">Configuraci&oacute;n de Sistemas en Redes</h5>
                            <div id="clientes"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row center">
            <div class="col-md-12">
                <h2 class="mb-none word-rotator-title mt-lg">
                    Nuestros clientes
                    <strong>
                        <span class="word-rotate" data-plugin-options='{"delay": 3500, "animDelay": 400}'>
                            <span class="word-rotate-items">
                                <span>confian</span>
                                <span>creen</span>
                                <span>sonrien</span>
                            </span>
                        </span>
                    </strong>
                    en Drysoft
                </h2>
                <p class="lead mt-md">Drysoft posee una gran cartera de clientes en el mercado chileno. Tiene clientes en todos los rubros del mercado desde el sector productivo, de comercio y servicios.</p>
            </div>
        </div>
        <div class="row center mt-xl">
            <div class="owl-carousel owl-theme" data-plugin-options='{"items": 6, "autoplay": true, "autoplayTimeout": 3000}'>
                <div>
                    <img class="img-responsive" src="recursos/imagenes/logos/logo-1.png" alt="">
                </div>
                <div>
                    <img class="img-responsive" src="recursos/imagenes/logos/logo-2.png" alt="">
                </div>
                <div>
                    <img class="img-responsive" src="recursos/imagenes/logos/logo-3.png" alt="">
                </div>
                <div>
                    <img class="img-responsive" src="recursos/imagenes/logos/logo-4.png" alt="">
                </div>
                <div>
                    <img class="img-responsive" src="recursos/imagenes/logos/logo-5.png" alt="">
                </div>
                <div>
                    <img class="img-responsive" src="recursos/imagenes/logos/logo-6.png" alt="">
                </div>
            </div>
            <div id="contacto"></div>
        </div>
    </div>
    <section class="call-to-action call-to-action-default with-button-arrow call-to-action-in-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Servicio de Soporte</h2>
                    <p>Drysoft en su permanente preocupaci&oacute;n por sus clientes ofrece un completo servicio de soporte y mantenci&oacute;n de sus sistemas. En esta secci&oacute;n usted encontrar&aacute; todas las alternativas para recibir el completo soporte de sus sistemas.</p>
                </div>
                <div class="col-md-6">				
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        <i class="fa fa-usd"></i>
                                        SOPORTE GRATUITO
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="accordion-body collapse in">
                                <div class="panel-body">
                                    Soporte gratuito entregado via telef&oacute;nica y por email exclusivamente. <br>
                                    Telefono: +562 2639 8076 - +562 2639 0876 
                                    Email: soporte@drysoft.cl
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        <i class="fa fa-laptop"></i>
                                        SOPORTE MENSUAL
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="accordion-body collapse">
                                <div class="panel-body">
                                    Contrato mensual de soporte y mantenci&oacute;n de sistemas Drysoft, a convenir seg&uacute;n sus requerimientos, incluye visitas a terreno, mantenciones, actualizaciones, etc.                             
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                        <i class="fa fa-comment"></i>
                                        COTIZACI&Oacute;N DE SOPORTE
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="accordion-body collapse">
                                <div class="panel-body">
                                    Cotizaci&oacute;n de servicios de soporte por trabajo puntual, puede ser en modalidad de asistencia remota por internet, o por visita presencial en terreno.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
