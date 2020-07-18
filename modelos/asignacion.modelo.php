<?php
    require_once 'https://www.grupofs.com/Connections/conexion.php';

    Class ModeloAsignacion{
        static public function mdlIngresarAsignacion($tabla,$datos){
            $smtp=Conexion::conectar()->prepare("INSERT INTO $tabla (asignador,id_usuario,asunto,descripcion,fec_limite,archivo) VALUES (:asignador,:usuario,:asunto,:descripcion,:fec_limite,:archivo)");
            $smtp -> bindParam(":asignador",$datos["asignador"],PDO::PARAM_STR);
            $smtp -> bindParam(":usuario",$datos["id_usuario"],PDO::PARAM_STR);
            $smtp -> bindParam(":asunto",$datos["asunto"],PDO::PARAM_STR);
            $smtp -> bindParam(":descripcion",$datos["descripcion"],PDO::PARAM_STR);
            $smtp -> bindParam(":fec_limite",$datos["fec_limite"],PDO::PARAM_STR);
            $smtp -> bindParam(":archivo",$datos["archivo"],PDO::PARAM_STR);


            if ($smtp->execute()) {
                return "ok";
            } else {
                return "error";
            }

            $smtp->close();
            $smtp=null;
            
        }//FIN DE LA FUNCION

        static public function mdlMostrarAsignacion($tabla,$item,$valor){

            if ($item != null) {
                $smtp=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                $smtp->bindParam(":".$item,$valor,PDO::PARAM_STR);
          
                
                $smtp-execute();
                return $smtp->fetch();
            } else {
                $smtp=Conexion::conectar()->prepare("SELECT * FROM $tabla");
                $smtp->execute();
                return $smtp->fetchAll();
            }
            $smtp->close();
            $smtp=null;
            
        } 


        static public function mdlEliminarAsignacion($tabla,$datos){
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
?>