<?php

class Conexion{

    static public function conectar(){
       
        try{
            $link = new PDO("mysql:host=localhost;dbname=foodsp_web",
            "foodsp_web", 
            "63plz5pdp2");

            $link -> exec("set names utf8");

            return $link;

        } catch (Exception $e) {

            echo $e->getMessage();
            
        }
    }

}
