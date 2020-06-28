<?php

    class ControladorEventos{

        static public function ctrCrearEvento(){

            // if (isset($_POST["nuevoTitulo"])) {
                
            //     $tabla = "archivos";

            //      /* OBTENER FECHA DE REGISTRO */
            //     date_default_timezone_set("America/Lima");
            //     $fechaRegistro = date('Y-m-d');
            //     $horaRegistro= date('H:i:s');

            // }
        }

        static public function ctrMostrarEvento($item, $valor){
            $tabla = "archivos";
            $respuesta = ModeloEventos::mdlMostrarEventos($tabla,$item,$valor);
            return $respuesta;
        }

        static public function ctrMostrarEventoCompleto($item, $valor){
            $tabla = "archivos";
            $respuesta = ModeloEventos::mdlMostrarEventosCompleto($tabla,$item,$valor);
            return $respuesta;
        }
    }