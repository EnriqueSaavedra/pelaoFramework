<?php
require_once('./clases/utilidad/Link.php');
require_once(Link::include_file('app/PUBLIC/header.php'));
?>
<div id="contenido-sitio">
    <?php
        $ctx = isset($_GET["ctx"]) ? $_GET["ctx"] : null;
        $app = isset($_GET["app"]) ? $_GET["app"] : null;
        try{
            if(!file_exists(Link::include_file(Link::getRuta($ctx,$app)))){
                throw new Exception;
            }
            require_once(
                    Link::include_file(
                            Link::getRuta($ctx,$app)
                        )
                );
        } catch (Exception $ex) {
            require_once(
                    Link::include_file(
                            Link::getRuta(null,null)
                        )
                );
        }
    ?>
</div>
<?php
require_once(Link::include_file('app/PUBLIC/footer.php'));
?>