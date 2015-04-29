<?php ob_start();

$dirSitio = "ControlStock";

#directorio para utilizar en los includes
$docRootSitio = $_SERVER['DOCUMENT_ROOT'] . "/" . $dirSitio . "/";

#directorio para utilizar en los location de header, href de imágenes y action de formularios
$httpHostSitio = "http://" . $_SERVER['HTTP_HOST'] . "/" . $dirSitio . "/";

$serverName = $_SERVER['SERVER_NAME']; 

?>




