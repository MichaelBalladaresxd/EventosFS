<?php

require_once 'conexion.php';

class ModeloEventos{

    static public function mdlMostrarEventos($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT *  FROM $tabla WHERE $item = :$item ");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_archivos DESC limit 10");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }
        
        $stmt -> close();   

        $stmt = null;

    }


    static public function mdlMostrarEventosCompleto($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT *  FROM $tabla WHERE $item = :$item ");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }
        
        $stmt -> close();   

        $stmt = null;

    }
}