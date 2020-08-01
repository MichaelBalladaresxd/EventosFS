<?php

class ControladorVideos{

    static public function ctrMostrarVideo($item, $valor){

        
        $tabla="videos";

        $respuesta = ModeloVideos::mdlMostrarVideo($tabla, $item,$valor);

        return $respuesta;

    }

    static public function ctrCrearVideo(){

        if(isset($_POST["nuevoTituloEvento"])){

            $tabla = "videos";
            $datos = array("nombre_video" => $_POST["nuevoTituloEvento"],
                "link" => $_POST["nuevoLinkVideo"],
                "area" => $_POST["nuevoAreaVideo"],
                "usuario_registro" => $_POST["txtUsuarioRegistro"]);

            $respuesta = ModeloVideos::mdlCrearVideo($tabla, $datos);

            if($respuesta == "ok"){
    

                echo '<script>
                swal({
                
                    type: "success",
                    title: "Se Guardaron los Datos!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                
                }).then((result)=>{

                    if(result.value){

                        window.location = "videos";
                }


                });

                </script>';

            }else if($respuesta == "error"){

                echo '<script>
                
                swal({

                            type:"error",
                            title: "¡Ups! Ocurrio un problema.",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false


                    }).then((result)=>{

                        if(result.value){

                                window.location = "videos";
                        }


                    });
                
                
                </script>';
            }else{
                echo '<script>
                
                swal({

                            type:"error",
                            title: "¡Ups!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false


                    }).then((result)=>{

                        if(result.value){

                                window.location = "videos";
                        }


                    });
                
                
                </script>';
            }

        }

    }

    static public function ctrEditarVideo(){

        if(isset($_POST["editarTituloEvento"])){


             /* OBTENER FECHA DE ACTUALIZACION */
             date_default_timezone_set("America/Lima");
             $fecha = date('Y-m-d');
             $hora= date('H:i:s');

             $FechaUpdate = $fecha.' '.$hora;


            $tabla = "videos";
            $datos = array(
                "nombre_video" => $_POST["editarTituloEvento"],
                "link" => $_POST["editarLinkVideo"],
                "area" => $_POST["editarAreaVideo"],
                "usuario_registro" => $_POST["txtUsuarioRegistro"],
                "fech_modificada" => $FechaUpdate,
                "id" => $_POST["txtidEvento"]
            );

            $respuesta = ModeloVideos::mdlEditarVideo($tabla, $datos);

            if($respuesta == "ok"){
    

                echo '<script>
                swal({
                
                    type: "success",
                    title: "Cambios Guardados con Exito!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                
                }).then((result)=>{

                    if(result.value){

                        window.location = "videos";
                }


                });

                </script>';

            }else{

                echo '<script>
                
                swal({

                            type:"error",
                            title: "¡Ups! Ocurrio un problema.",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false


                    }).then((result)=>{

                        if(result.value){

                                window.location = "videos";
                        }


                    });
                
                
                </script>';
            }

        }
    }

    static public function ctrBorrarVideo(){
        if(isset($_GET["idVideo"])){
            
            $tabla="videos";
            $datos= $_GET["idVideo"];

            $respuesta = ModeloVideos::mdlBorrarVideo($tabla, $datos);

            if($respuesta == "ok"){
  

                echo '<script>
                swal({
                
                    type: "success",
                    title: "El video a sido borrado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                   
                  }).then((result)=>{

                    if(result.value){

                           window.location = "videos";
                   }


               });

                </script>';

            }
        }
    }

}