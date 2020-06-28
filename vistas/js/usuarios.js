

$(".nuevaFoto").change(function(){
    
    var imagen = this.files[0];


    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

        $(".nuevaFoto").var("");

        swal({
            title:"Error al subir la imagen",
            text:"¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"

        });
    }else if(imagen["size"] > 2000000){



        swal({
            title:"Error al subir la imagen",
            text:"¡La imagen no debe pesar mas de 2 MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"

        });
    }else{

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);   

        $(datosImagen).on("load", function(event){

            var rutaImagen = event.target.result;

            $(".previsualizar").attr("src", rutaImagen);

        })
    }

})


/*EDITAR USUARIO*/

$(document).on("click",".btnEditarUsuario",function(){
 
    var idUsuario = $(this).attr("idUsuario");
    
    var datos= new FormData();
    console.log('datos', datos)
    datos.append("idUsuario", idUsuario);

    $.ajax({

        url:"ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",

        success: function(respuesta){

            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarUsuario").val(respuesta["usuario"]);
            $("#editarPerfil").html(respuesta["perfil"]);
            $("#editarPerfil").val(respuesta["perfil"]);
            $("#fotoActual").val(respuesta["foto"]);
           
            $("#editarEmail").val(respuesta["email"]);
            $("#editarNacimiento").val(respuesta["fechaNacimiento"]);

            $("#passwordActual").val(respuesta["password"]);

            if(respuesta["foto"] != ""){

                $(".previsualizar").attr("src",respuesta["foto"]);
            }

            //console.log("respuesta",respuesta);
            
            
        }
    });

})

//ACTIVAR USUARIO
$(document).on("click",".btnActivar",function(){
//$(".btnActivar").click(function(){

    var idUsuario = $(this).attr("idUsuario");
    var estadoUsuario = $(this).attr("estadoUsuario");

    var datos = new FormData();

    datos.append("activarId",idUsuario);
    datos.append("activarUsuario",estadoUsuario);

    $.ajax({
        url:"ajax/usuarios.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType:false,
        processData: false,
        success: function(respuesta){
            if(window.matchMedia("(max-width:767px)").matches){

                swal({
                    title:"El usuario a sido Actualizado",
                    type: "success",
                    confirmButtonText: "¡Cerrar!"
        
                }).then(function(result){
                    if (result.value) {
                        window.location="usuarios";
                    }

                });

            }

        }
        
    
    }) ;
    

    if(estadoUsuario == 0){

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoUsuario',1);
    }else{

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoUsuario',0);
    }

});

//REVISAR SI EL USERNAME SE REPITE

$("#nuevoUsuario").change(function(){
    $(".alert").remove();
    var usuario = $(this).val();

    var datos = new FormData();
    datos.append("validarUsuario",usuario);

    $.ajax({
        url:"ajax/usuarios.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType:false,
        processData: false,
        dataType:"json",
        success: function(respuesta){
            if(respuesta){
                $("#nuevoUsuario").parent().after('<div class="alert alert-warning"> Este usuario ya existe</div>');

                $("#nuevoUsuario").val("");
            }
            

        }
        
    
    }) ;


});

//eliminar usuario
$(document).on("click",".btnEliminarUsuario",function(){
//$(".btnEliminarUsuario").click(function(){

    var idUsuario= $(this).attr("idUsuario");
    var fotoUsuario= $(this).attr("fotoUsuario");
    var usuario= $(this).attr("usuario");

    swal({
        title: "¿Esta seguro de Eliminar el Usuario?",
        text: "Si no esta seguro puede cancelar la accion!",
        type:"warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText:"Cancelar",
        confirmButtonText: "Si, borrar usuario!"
    }).then(function(result){

        if(result.value){

            window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;
        }
    })
})