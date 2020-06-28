<?php

require_once '../controladores/porFecha.controlador.php';
require_once '../modelos/porFecha.modelo.php';

class porFecha{
    static public function mostrarTablaPorFecha ($FechaInicial,$FechaFinal){ 
       
            // $FechaInicial = $_GET["FechaInicial"];
            // $FechaFinal = $_GET["FechaFinal"];

            // }else{

            // $FechaInicial = null;
            // $FechaFinal = null;

            // }
            $respuesta = ControladorPorFecha::ctrRangoFecha($FechaInicial,$FechaFinal);

            $datosJson= '{
                    "data": [';

                    
                     for ($i=0; $i < count($respuesta) ; $i++) {                      
                        $datosJson.='
                           [
                              "'.($i+1).'",
                              "'.$respuesta[$i]["idrecib"].'",
                              "'.$respuesta[$i]["num_ingr"].'",
                              "'.$categorias["caja"].'",
                              "'.$categorias["periodo"].'",
                              "'.$categorias["año"].'",
                              "'.$categorias["tipo"].'",
                              "'.$categorias["fec_pago"].'",
                              "'.$categorias["monto"].'",
                              "'.$respuesta[$i]["tipo_docu"].'",
                              "'.$respuesta[$i]["num_docu"].'",
                              "'.$respuesta[$i]["operador"].'",
                              "'.$categorias["estacion"].'",
                              "'.$categorias["fechor_ing"].'"
                           ],';
                           // fin variable datosJson


                           // idrecib
                           // num_ingr
                           // caja
                           // periodo
                           // año
                           // tipo
                           // fec_pago
                           // monto 
                           // tipo_docu
                           // num_docu
                           // operador
                           // estacion
                           // fechor_ing
                     }
    }

}    
 if(isset($_GET["FechaInicial"])){
    $FechaInicial = $_GET["FechaInicial"];
    $FechaFinal = $_GET["FechaFinal"];
 }else{
    $FechaInicial=null;
    $FechaFinal=null;
 }



$disparar = new porFecha();
$disparar->mostrarTablaPorFecha($FechaInicial,$FechaFinal);