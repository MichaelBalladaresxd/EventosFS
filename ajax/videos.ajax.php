
<?php

require_once "../controladores/videos.controlador.php";
require_once "../modelos/videos.modelo.php";


class AjaxVideos{

    /*EDITAR Videos*/
    public $idVideo;

    public function ajaxEditarVideo(){

        $item= "id";
        $valor= $this->idVideo;
        $respuesta = ControladorVideos::ctrMostrarVideo($item, $valor);

        echo json_encode($respuesta);
    }

}

if(isset($_POST["idVideo"])){
    $editar = new AjaxVideos();
    $editar->idVideo  = $_POST["idVideo"];
    $editar->ajaxEditarVideo();
}
