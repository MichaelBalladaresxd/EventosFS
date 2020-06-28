<?php

require_once "../controladores/asignacion.controlador.php";

require_once "../modelos/asignacion.modelo.php";

class AjaxAsignacion{
    public $idAsignacion;

    public function ajaxEditarAsignacion(){
        $item = "id";
        $valor = $this->idAsignacion;
        $respuesta = ControladorAsignaciones::ctrMostrarAsignacion($item,$valor);

        echo json_encode($respuesta);
    }

    //CAMBIAR ESTADO DE LA ASIGNACION
    public $activarAsignacion;
    public $activarId;

    public function ajaxEstadoAsignacion(){
        $tabla="asignacion";
        $item1="estado";
        $valor1=$this->activarAsignacion;
        
        $item2="id";
        $valor2 = $this->activarId;

        $respuesta=ModeloAsignacion::mdlActualizarAsignacion($tabla,$item1,$valor1,$item2,$valor2);
    }



}

if(isset($_POST["idAsignacion"])){
    $editar = new AjaxAsignacion();
    $editar->idAsignacion = $_POST["idAsignacion"];

    $editar->ajaxEditarAsignacion();
}