<?php


require_once "conexion.php";

class ModeloVideos{

    static public function mdlMostrarVideo($tabla, $item,$valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }
        
        $stmt -> close();   

        $stmt = null;

    }

    static public function mdlCrearVideo($tabla,$datos){

                
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_video,link,area,usuario_registro) VALUES ( :nombre, :link, :area, :usuario) ");

        $stmt -> bindParam(":nombre",$datos["nombre_video"], PDO::PARAM_STR);
        $stmt -> bindParam(":link",$datos["link"], PDO::PARAM_STR);
        $stmt -> bindParam(":area",$datos["area"], PDO::PARAM_STR);
        $stmt -> bindParam(":usuario",$datos["usuario_registro"], PDO::PARAM_STR);


        if($stmt->execute()){

            return "ok";
        }else{

            return "error".$stmt->error();
        }
        $stmt -> close();

        $stmt = null;

    }

    static public function mdlEditarVideo($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_video = :nombre, link = :link, area = :area, usuario_registro = :usuario, fech_modificada = :fech_update WHERE id = :id");

        $stmt -> bindParam(":nombre",$datos["nombre_video"], PDO::PARAM_STR);
        $stmt -> bindParam(":link",$datos["link"], PDO::PARAM_STR);
        $stmt -> bindParam(":area",$datos["area"], PDO::PARAM_STR);
        $stmt -> bindParam(":usuario",$datos["usuario_registro"], PDO::PARAM_STR);
        $stmt -> bindParam(":fech_update",$datos["fech_modificada"], PDO::PARAM_STR);
        $stmt -> bindParam(":id",$datos["id"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";
        }else{

            return "error";
        }   
        $stmt -> close();

        $stmt = null;

    }

    static public function mdlBorrarVideo($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id= :id");
        $stmt -> bindParam(":id",$datos, PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";
        }else{

            return "error";
        }
        $stmt -> close();

        $stmt = null; 
        
    }

}