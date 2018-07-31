 <?php 
$app = new MensajeSistema();
$debugObj = null;
try{
    $debugObj = new Debuger();
    $carritoDao = new CarritoDAO();
    $tokenCarrito = $carritoDao->getTokenCarritoUsuario($_SESSION['USER'][UsuarioDAO::SESSION_ID]);
    $carrito = $carritoDao->getPintadoCarritosByToken($tokenCarrito);
 } catch (Exception $e) {
    $app->addMessage($e->getMessage(), UserException::WARNING);
    PHPLogger::LogError($e->getMessage(),$e->getCode(), PHPLogger::ERROR, $e);
}
 ?>
<?php 
if(!isset($_GET['noFoot'])){ ?>
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="footer-ribbon">
                    <span>Estemos en contacto!</span>
                </div>
                <div class="col-md-4">
                    <div class="contact-details">
                        <h4>Cont&aacute;ctenos</h4>
                        <ul class="contact">
                            <li><p><i class="fa fa-map-marker"></i> <strong>Direcci&oacute;n:</strong> Almirante Pastene 185, of 307. Providencia.</p></li>
                            <li><p><i class="fa fa-phone"></i> <strong>Tel&eacute;fono:</strong> +562 2639 8076 - +562 2639 0876</p></li>
                            <li><p><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:ventas@drysoft.cl">ventas@drysoft.cl</a></p></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="newsletter">
                        <h4>Env&iacute;enos un mensaje</h4>
                        <div title="Formulario de contacto" id="contact-area" class="row">
                            <form method="post" action="<?=Link::getRutaHref('PUBLIC', 'vistasHtml/contactengine'); ?>">
                                <div class="col-md-6 form-group">
                                    <label for="Name">Nombre *</label>
                                    <input class="form-control" type="text" name="Name" id="Name" />
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="Tel">Tel&eacute;fono *</label>
                                    <input class="form-control" type="text" name="Tel" id="Tel" />
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="Email">Email *</label>
                                    <input class="form-control" type="text" name="Email" id="Email" />
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="Message">Mensaje *</label><br />
                                    <textarea class="form-control" name="Message" rows="1" cols="20" id="Message"></textarea>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input class="btn btn-primary submit-button" type="submit" name="submit" value="Enviar" />
                                </div>
                            </form>
                        </div>	
                    </div>
                </div>
                <div class="col-md-2">
                    <h4>S&iacute;ganos:</h4>
                    <ul class="social-icons">
                        <li class="social-icons-facebook"><a href="http://www.facebook.com/Software.Drysoft" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li class="social-icons-twitter"><a href="http://www.twitter.com/SoftwareDrysoft" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li class="social-icons-linkedin"><a href="https://www.linkedin.com/company/drysoft-ltda." target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-1">
                        <a href="index.html" class="logo">
                            <img alt="Drysoft" class="img-responsive" src="recursos/imagenes/logo-default-slim-dark.png">
                        </a>
                    </div>
                    <div class="col-md-2 col-md-offset-1">
                        <p><a href="http://www.orangelab.cl/" target="_blank" style="color: grey;">Diseñado por OrangeLab</a></p>
                    </div>
                    <div class="col-md-7">
                        <nav id="sub-menu">
                            <ul>
                                <li><a href="#" data-toggle="modal" data-target="#actualizaciones">Actualizaciones</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#licencias">Licencias</a></li>
                                <li><a href="https://softwaredrysoft.wordpress.com" target="_blank">Noticias</a></li>
                                <li><a href="faqs.html">Preguntas Frecuentes</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            <?php
            if($debugObj != null){
                if($debugObj->isDebug()){
                    $debug = array(
                        'SESSION' => !empty($_SESSION) ? $_SESSION : "NO SESSION",
                        'COOKIE'  => !empty($_COOKIE) ? $_COOKIE : "NO COOKIE",
                        'POST'    => !empty($_POST) ? $_POST : "NO POST",
                        'GET'     => !empty($_GET) ? $_GET : "NO GET",
                        'SERVER'  => !empty($_SERVER) ? $_SERVER : "NO SERVER"
                    ); 
                    echo "<h4>--DEBUG--</h4>";
                    printArray($debug);
                }
            }
            ?>
    </footer>
</div>
<?php } ?>
<script>    
    $(document).ready(function() {
        $('li.productos-carrito').click(function (){
            $('#modal-carrito').modal('show');
        });  
        $('li.historial-compra').click(function(){
            
        });
        $('#pagar-transbank').click(function() {
            $('#form-modal-carrito').submit();
        });  
        $('#enlaceIngresar').click(function (){
            $('.text-danger.ingresar').text("");
            $('.text-danger.registrar').text("");
            $('#LoginModal').modal('show');
        });
        $('#enlaceRegistrar').click(function (){
            $('.text-danger.ingresar').text("");
            $('.text-danger.registrar').text("");
            $('#RegistrarModal').modal('show');
        });

        $('#cerrarSesion').click(function (){
            $.ajax({
                method:'POST',
                cache: false,
                url:"<?=Link::getRuta('PUBLIC', 'rest/cerrarSesion'); ?>",
            }).done(function (data, textStatus, jqXHR){
                data = JSON.parse(data);
                if(data.success){
                    window.location = "index.php";
                }else{
                    notificar(data.mensaje,"danger",5000);
                }
            }).fail(function( jqXHR, textStatus, errorThrown ) {
                console.error(jqXHR,errorThrown);
                notificar("Error inesperado.","danger",5000);
            });
        });
    });
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-18564934-1', 'auto');
    ga('send', 'pageview');
</script>
<div class="modal fade in" id="actualizaciones" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h1 class="m-none pt-sm pb-sm">Actualizaciones</h1>
            </div>
            <div class="modal-body p-xlg">
                <p class="text-center col-md-12">Para la mejor atenci&oacute;n de sus clientes, Drysoft ofrece actualizaciones que solo pueden ser instaladas sobre el sistema original correspondiente. Es decir, para una actualizaci&oacute;n de Contabilidad con IFRS, se debe tener instalado previamente el Sistema de Contabilidad General, de una versi&oacute;n anterior, ya sea para ambiente DOS o Windows.<p>							
                <div class="col-md-12"><hr></div>
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h4>Objetivo</h4>
                        <p>
                            El objetivo de las actualizaciones, es realizar un upgrade al Sistema Drysoft que posee el cliente, con la finalidad de ponerlo al d&iacute;a en todos los cambios legales, formales y tecnol&oacute;gicos que se hayan producido en el &uacute;ltimo per&iacute;odo, reconociendo y manteniendo toda la informaci&oacute;n y los datos contenidos en el sistema original. 
                        </p>
                    </div>
                    <div class="col-md-6 text-left">
                        <h4>Requerimientos</h4>
                        <ol>
                            <li><p>Sistema desarrollado en ambiente Windows de 32 bits.</p></li>
                            <li><p>Windows 10, 8, 7, Vista, XP, 2000, Milenium, 98, 95.</p></li>
                            <li><p>Windows Server 2012, 2008, 2003 , Server 2000 y NT.</p></li>
                            <li><p>Para PCs monousuario, y redes locales y remotas.</p></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="licencias" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h1 class="m-none pt-sm pb-sm">Licencias</h1>
            </div>
            <div class="modal-body">
                <p class="text-center">Drysoft dentro de sus pol&iacute;ticas de licenciamiento, ofrece la posibilidad a sus clientes que ya poseen un m&oacute;dulo determinado, de adquirir licencias adicionales de ese m&oacute;dulo, a precios mas bajos que el valor de un sistema, para equipos o usuarios adicionales, integrados en una red de &Aacute;rea local, o en una red remota, o simplemente para equipos o usuarios ubicados en el mismo recinto o en otros lugares, sin conexi&oacute;n en red.</p>
                <p class="text-center">Para acceder a la compra de una licencia se debe cumplir estrictamente con el requisito b&aacute;sico, de haber adquirido con anterioridad el sistema versi&oacute;n full respectivo. En caso contrario, el cliente solo podr&aacute; adquirir un m&oacute;dulo o sistema full a precio de lista.</p>							
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<form id="form-modal-carrito" name="proceder-pago" action="<?=Link::getRutaHref('PUBLIC', 'transbank/pagarTransbank'); ?>" method="POST">
    <div class="modal fade in" id="modal-carrito" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-center ">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 class="m-none pt-sm pb-sm">Carrito de compra</h3>
                </div>
                <div class="modal-body p-xlg producto-container" >
                    <div class="row">
                        <?php
                        if(count($carrito) >0 ){ 
                            /*@var $value Carrito*/
                            foreach ($carrito as $key => $value) { ?>
                                <div class="col-md-10 col-md-offset-1 producto" style="border-bottom: 1px solid #F5F3F3;margin-bottom: 10px;padding-bottom: 10px;">
                                    <div class="col-md-offset-2 col-md-2">
                                        <img width="90%" src="./recursos/imagenes/productos/<?=$value->getProducto()->getRuta_imagen()?>" />
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <?=$value->getProducto()->getNombre()?>
                                            <br>
                                            Precio unitario: $ <?php
                                            if(!empty($value->getProducto()->getMontoOferta())){
                                                echo number_format($value->getProducto()->getMontoOferta(),0,'','.');
                                            }else{
                                                echo number_format($value->getProducto()->getMonto(),0,'','.');
                                            } ?>
                                            <br>
                                            <!--Cantidad: <input type="number" class="form-control cantidad-producto-<?=$value->getId_prod()?>" style="width: 65px;" max="99" min="1" maxlength="2" name="cantidad" value="<?=$value->getCantidad()?>"/>-->
                                            Cantidad: <?=$value->getCantidad()?>
                                            <br>
                                            <button data-id-prod="<?=$value->getId_prod()?>" type="button" class="btn btn-danger btn-block quitarElemento"> <span class="glyphicon glyphicon-remove"></span> Quitar Elemento</button>
                                        </p>
                                    </div>
                                <br>
                                <hr/>
                                <br>
                                </div>
                           <?php }
                        }else{ ?>
                            <p class="text-center">Sin Productos en Carrito.</p>
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <!--<input type="submit"--> 
                    <?=count($carrito) > 0 ? '<button id="pagar-transbank" type="submit" class="btn btn-primary transbank-compra" data-dismiss="modal">Pagar via Transbank</button>' : '' ?>
                </div>
            </div>
        </div>
    </div>
</form>
<!--Ingresar-->
<form action="#" method="POST" name="login" >
    <div class="modal fade bs-example-modal-sm" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Ingresar</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="loginUser">Email</label>
                        <input class="form-control login-input" required placeholder="email@email.cl" autocomplete="off" id="loginUser" type="email" name="loginUser" />
                    </div>
                    <div class="form-group">
                        <label for="loginPass">Contraseña</label>
                        <input class="form-control login-input" required id="loginPass" type="password" name="loginPass" />
                    </div>
                    <div class="form-group">
                        <span class="text-danger ingresar"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" name="SubmitType" value="Ingresar">Ingresar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Registrar-->
    <div class="modal fade  bs-example-modal-sm" id="RegistrarModal" tabindex="-1" role="dialog" aria-labelledby="RegistrarLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Registrar</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="siginUser">Email</label>
                        <input class="form-control sigin-input" placeholder="email@email.cl" autocomplete="off" id="siginUser" type="email" name="siginUser" />
                    </div>
                    <div class="form-group">
                        <label for="reSiginUser">Repetir Email</label>
                        <input class="form-control sigin-input" placeholder="email@email.cl" autocomplete="off" id="reSiginUser" type="email" name="reSiginUser" />
                    </div>

                    <div class="form-group">
                        <label for="siginPass">Contraseña</label>
                        <input class="form-control sigin-input" id="regPass" type="password" name="siginPass" />
                    </div>
                    <div class="form-group">
                        <label for="reSiginPass">Repetir Contraseña</label>
                        <input class="form-control sigin-input" id="reRegPass" type="password" name="reSiginPass" />
                    </div>
                    <div class="form-group">
                        <label for="siginRut">Rut</label>
                        <input class="form-control sigin-input" id="siginRut" type="text" name="siginRut" />
                    </div>
                    <div class="checkbox">
                        <label>
                            <input class="sigin-input" type="checkbox" name="empresa"> Empresa
                        </label>
                    </div>
                    <div class="form-group">
                        <span class="text-danger registrar"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary"  name="SubmitType" value="Registrar">Registrar</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="tokenCarrito" value="<?=$tokenCarrito?>" />
</form>
<script>
    (function($){
        var rutValido = false;
        $("input#siginRut").rut({
            formatOn: 'keyup',
            minimumLength: 8, // validar largo mínimo; default: 2
            validateOn: 'change' // si no se quiere validar, pasar null
        }).on('rutInvalido', function(e) {
            rutValido = false;
            $(this).closest("div.form-group").addClass('has-error');
        }).on('rutValido',function(e){
            rutValido = true;
            $(this).closest("div.form-group").removeClass('has-error');
        });
        
        $('li.productos-carrito').click(function (){
            $('#modal-carrito').modal('show');
        });
        
        $('button.quitarElemento').click(function() {
            var btn = $(this);
            var prod = $(this).data("id-prod");
            var restQuitarElemento = "<?=Link::getRuta('PUBLIC', 'rest/quitarElementoCarrito'); ?>";
            $.ajax({
                method:'POST',
                cache: false,
                url:restQuitarElemento,
                data:{
                    idProd:prod
                }
            }).done(function (data, textStatus, jqXHR){
                data = JSON.parse(data);
                if(data.success == true){
                    $(btn).closest('div.producto').remove();
                    if(data.data.total != '0'){
                        $('li.productos-carrito').find('.badge').text(data.data.total);
                    }  else{
                        $('.producto-container').find('div.row').append($('<p class="text-center">Sin Productos en Carrito.</p>'));
                        $('li.productos-carrito').find('.badge').text("");
                        $('#pagar-transbank').remove();
                    }
                    notificar('Producto Eliminado.','success',5000);
                }else{
                    notificar('Problemas al eliminar producto.','danger',5000);
                }
            }).fail(function( jqXHR, textStatus, errorThrown ) {
                console.error(jqXHR,errorThrown);
                notificar("Error inesperado.","danger",5000);
            });
        });
        
        function recargarCarrito(token){
            var restRecargarCarrito = "<?=Link::getRuta('PUBLIC', 'rest/recargarCarrito'); ?>";
            $.ajax({
                method:'POST',
                cache: false,
                url:restRecargarCarrito,
                data:{
                    token:token
                }
            }).done(function (data, textStatus, jqXHR){
                data = JSON.parse(data);
                if(data.success == true){
                    $('span.badge').text(data.data.totalCarrito);
                }
            }).fail(function( jqXHR, textStatus, errorThrown ) {
                notificar("Error inesperado.","danger",5000);
                console.error(jqXHR,errorThrown);
            });
        }
        
        var tokenCarrito = $('input[name=tokenCarrito]').val();
        
        if(tokenCarrito !== ""){
            recargarCarrito(tokenCarrito);
        }
        

        $('button[name=SubmitType]').click(function(event){
            var formulario = $(this).closest('form');
            $('.text-danger.ingresar').empty();
            $('.text-danger.registrar').empty();
            var inputs = $(formulario).find('.login-input');
            var signinInputs = $(formulario).find('.sigin-input');
            var submitear = true;
            var message = "";
            if($(this).val() == "Registrar"){
                if(!rutValido){
                    submitear = false;
                    if(message == "")
                        message = "**Rut Invalido.";
                    else
                        message += "<br>**Rut Invalido";
                    
                }
                $.each(signinInputs,function(i,e) {
                    if($(e).val() == ""){
                        submitear = false;
                        message = "**Necesita llenar todos los campos.";
                    }
                });
            }else{

                $.each(inputs,function(i,e) {
                    if($(e).val() == ""){
                        submitear = false;
                        message = "**Necesita llenar todos los campos.";
                    }
                });
            }
            if(!submitear){
                $('.text-danger.ingresar').text(message);
                $('.text-danger.registrar').text(message);
                return false;
            }
            
            var restLoginUserRest = "<?=Link::getRuta('PUBLIC', 'rest/loginUsuario'); ?>";
            var submitType = $(this).val();
            var loginUser = $('input[name=loginUser]').val();
            var loginPass = $('input[name=loginPass]').val();
            //parametros registro
            var siginUser = $('input[name=siginUser]').val();
            var reSiginUser = $('input[name=reSiginUser]').val();
            var siginPass = $('input[name=siginPass]').val();
            var reSiginPass = $('input[name=reSiginPass]').val();
            var siginRut = $('input[name=siginRut]').val();
            var empresa = $('input[name=empresa]').val();
            $.ajax({
                method:'POST',
                cache: false,
                url:restLoginUserRest,
                data:{
                    SubmitType:submitType,
                    loginUser:loginUser,
                    loginPass:loginPass,
                    siginUser:siginUser,
                    reSiginUser:reSiginUser,
                    siginPass:siginPass,
                    reSiginPass:reSiginPass,
                    siginRut:siginRut,
                    empresa:empresa
                }
            }).done(function (data, textStatus, jqXHR){
                data = JSON.parse(data);
                if(data.success == true){
                    notificar(data.mensaje+", Recargando sesion","success",5000);
                    $('button[name=SubmitType]').text("Cargando...");
                    $('button[name=SubmitType]').attr("disabled",true);
                    setTimeout(function(){
                        location.reload();
                    },2000);
                }else{
                    notificar(data.mensaje,"warning",5000);
                }
            }).fail(function( jqXHR, textStatus, errorThrown ) {
                notificar("Error inesperado.","danger",5000);
                console.error(jqXHR,errorThrown);
            });
        });
        
        
        window.notificar = function(mensaje,tipo,tiempo){
            $.notify({
                // options
                icon: 'glyphicon glyphicon-warning-sign',
                title: '<strong>Mensaje de Drysoft:</strong>',
                message: mensaje
            },{
                // settings
                element: 'body',
                position: null,
                type: tipo,
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: false,
                placement: {
                        from: "bottom",
                        align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: tiempo,
                timer: 1000,
                url_target: '_blank',
                mouse_over: null,
                animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                },
                onShow: null,
                onShown: null,
                onClose: null,
                onClosed: null,
                icon_type: 'class',
                template: '<div data-notify="container" class="text-center col-xs-11 col-sm-5 alert alert-{0}" role="alert">' +
                        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                        '<span data-notify="icon"></span> ' +
                        '<span data-notify="title">{1}</span> ' +
                        '<span data-notify="message">{2}</span>' +
                        '<div class="progress" data-notify="progressbar">' +
                                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                        '</div>' +
                        '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>' 
            });
        };
    })(jQuery);
</script>
</body>
</html>