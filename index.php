<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/eventos.controlador.php";


require_once "extensiones/vendor/autoload.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/eventos.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();

