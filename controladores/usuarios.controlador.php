<?php

 class ControladorUsuarios{

    static public function ctrIngresoUsuario(){

        if(isset($_POST["ingUsuario"])){

            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
               preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

                

                $tabla = "usuarios";

                $encriptar = crypt($_POST["ingPassword"],'$2a$07$usesomesillystringforsalt$');

                $item = "usuario";

                $valor = $_POST["ingUsuario"];

                $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla,$item,$valor);

                if($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] ==
                $encriptar){

                    if($respuesta["estado"] == "1"){
                    
                        $_SESSION["iniciarSesion"] = "ok";
                        $_SESSION["id"] = $respuesta["id"];
                        $_SESSION["nombre"] = $respuesta["nombre"];
                        $_SESSION["usuario"] = $respuesta["usuario"];
                        $_SESSION["foto"] = $respuesta["foto"];
                        $_SESSION["perfil"] = $respuesta["perfil"];
                        $_SESSION["fechaNacimiento"] = $respuesta["fechaNacimiento"];

                        //registrar fecha para saber el ultimo login

                        date_default_timezone_set("America/Lima");

                        $fecha = date('Y-m-d');
                        $hora= date('H:i:s');

                        $fechaActual= $fecha.' '.$hora;

                        $item1="ultimo_login";
                        $valor1=$fechaActual;

                        $item2="id";
                        $valor2=$respuesta["id"];

                        $ultimoLogin=ModeloUsuarios::mdlActualizarUsuario($tabla,$item1,$valor1,$item2,$valor2);
    

                        //FIN ULTIMO LOGIN
                        
                        if($ultimoLogin == "ok"){

                        echo '<script>
                        swal({
                
                            type: "success",
                            title: "Bienvenido(a)",
                            showConfirmButton: true,
                            confirmButtonText: "Aceptar",
                            closeOnConfirm: false
                           
                          }).then((result)=>{
        
                            if(result.value){
        
                                   window.location = "inicio";
                           }
        
        
                       });
                               
                        </script>';
                        }

                    }else{

                        echo '<br><div class="alert alert-danger">El Usuario aún no esta Activado</div>';

                     }//fin del if y else

                }else{
                    echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                        }//fin del if y else
                       



            }
            
        }
    }



    static public function ctrCrearUsuario(){

        if(isset($_POST["nuevoUsuario"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) && 
            preg_match('/^[a-zA-Z0-9]+$/',$_POST["nuevoUsuario"])&&
            preg_match('/^[a-zA-Z0-9]+$/',$_POST["nuevoPassword"])){


            ///  <!-- validar imagen -->
                
                $ruta="";
                if(isset($_FILES["nuevaFoto"]["tmp_name"])){

                    list($ancho, $alto)=getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

                    $nuevoAncho=500;
                    $nuevoAlto=500;

                    //Creamos la ruta para guardar las fotos de usuario

                    $directorio ="vistas/img/usuarios/".$_POST["nuevoUsuario"];

                    //mkdir($directorio, 0755);


                    //De acuero al tipo de mage aplicamos las funciones por defecto de php

                    if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

                        $aleatorio = mt_rand(100,999);

                        $ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0,$nuevoAncho,$nuevoAlto,$ancho,$alto);

                        imagejpeg($destino,$ruta);
                    }


                    if($_FILES["nuevaFoto"]["type"] == "image/png"){

                        $aleatorio = mt_rand(100,999);

                        $ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";

                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);

                        imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);

                        imagepng($destino,$ruta);
                    }
                }


                $tabla = "usuarios";
                /* OBTENER FECHA DE REGISTRO */
                date_default_timezone_set("America/Lima");
                $fecha = date('Y-m-d');
                $hora= date('H:i:s');

                $fecha_registro = $fecha.' '.$hora;

                $encriptar = crypt( $_POST["nuevoPassword"],'$2a$07$usesomesillystringforsalt$');
            
                $datos = array("nombre" => $_POST["nuevoNombre"],
                    "usuario" => $_POST["nuevoUsuario"],
                    "password" => $encriptar,
                    "perfil" => $_POST["nuevoPerfil"],
                    "foto" => $ruta,
                    "fechaNacimiento" => $_POST["nuevoNacimiento"],
                    "fecha" => $fecha_registro);

                    $respuesta= ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

                if($respuesta == "ok"){
    

                    echo '<script>
                    swal({
                    
                        type: "success",
                        title: "Guardado",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    
                    }).then((result)=>{

                        if(result.value){

                            window.location = "usuarios";
                    }


                });

                    </script>';

                }else{

                    echo '<script>
                    
                    swal({

                                type:"error",
                                title: "¡El usuario no puede ir vacio o llevar caracteres especiales",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false


                        }).then((result)=>{

                            if(result.value){

                                    window.location = "usuarios";
                            }


                        });
                    
                    
                    </script>';
                }


                
            }
        }
    }


    static public function ctrMostrarUsuario($item, $valor){

        $tabla="usuarios";

        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item,$valor);

        return $respuesta;
    }

    //editar usuario

    static public function ctrEditarUsuario(){

        if(isset($_POST["editarUsuario"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){
            
                $ruta=$_POST["fotoActual"];
                if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){

                    list($ancho, $alto)=getimagesize($_FILES["editarFoto"]["tmp_name"]);

                    $nuevoAncho=500;
                    $nuevoAlto=500;

                    //Creamos la ruta para guardar las fotos de usuario

                    $directorio ="vistas/img/usuarios/".$_POST["editarUsuario"];

                    //preguntamos si existe una imagen en la BD

                    if(!empty($_POST["fotoActual"])){

                        unlink($_POST["fotoActual"]);

                    }else{
                        mkdir($directorio, 0755);
                    }

                    


                    //De acuero al tipo de mage aplicamos las funciones por defecto de php

                    if($_FILES["editarFoto"]["type"] == "image/jpeg"){

                        $aleatorio = mt_rand(100,999);

                        $ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0,$nuevoAncho,$nuevoAlto,$ancho,$alto);

                        imagejpeg($destino,$ruta);
                    }


                    if($_FILES["editarFoto"]["type"] == "image/png"){

                        $aleatorio = mt_rand(100,999);

                        $ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".png";

                        $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);

                        imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);

                        imagepng($destino,$ruta);
                    }
                }
            
                $tabla="usuarios";

                if($_POST["editarPassword"] != ""){

                   if(preg_match('/^[a-zA-Z0-9]+$/',$_POST["editarPassword"])){

                        $encriptar = crypt( $_POST["editarPassword"],'$2a$07$usesomesillystringforsalt$');

                   }else{
                    echo '<script>
             
                            swal({
                
                                        type:"error",
                                        title: "¡El usuario no puede ir vacio o llevar caracteres especiales",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar",
                                        closeOnConfirm: false
                
                
                                }).then((result)=>{
                
                                    if(result.value){
                
                                            window.location = "usuarios";
                                    }
                
                
                            });
                            
                            
                                </script>';

                        }

                }else{

                    $encriptar= $_POST["passwordActual"];
                }

                $datos=array("nombre"=> $_POST["editarNombre"],
                            "usuario"=> $_POST["editarUsuario"],
                            "password"=> $encriptar,
                            "perfil"=> $_POST["editarPerfil"],
                            "foto"=> $ruta,
                            "fechaNacimiento" => $_POST["editarNacimiento"]);

                
                 $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

                 if($respuesta == "ok"){
  

                    echo '<script>
                    swal({
                    
                        type: "success",
                        title: "El usuario se a editado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                       
                      }).then((result)=>{
    
                        if(result.value){
    
                               window.location = "usuarios";
                       }
    
    
                   });
    
                    </script>';
    
                }
            }



        }
    }

    static public function ctrBorrarUsuario(){

        if(isset($_GET["idUsuario"])){
            
            $tabla="usuarios";
            $datos= $_GET["idUsuario"];

            if($_GET["fotoUsuario"] != ""){

                unlink($_GET["fotoUsuario"]);
                rmdir("vistas/img/usuarios/".$_GET["usuario"]);
            }

            $respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

            if($respuesta == "ok"){
  

                echo '<script>
                swal({
                
                    type: "success",
                    title: "El usuario a sido borrado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                   
                  }).then((result)=>{

                    if(result.value){

                           window.location = "usuarios";
                   }


               });

                </script>';

            }
        }

    }

    
}



