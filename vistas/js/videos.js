/*EDITAR EVENTO*/

$(document).on("click",".btnEditarVideo",function(){
 
    var idVideo = $(this).attr("idVideo");
    
    var datos= new FormData();
    console.log('datos', datos)
    datos.append("idVideo", idVideo);

    $.ajax({

        url:"ajax/videos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",

        success: function(respuesta){

            $("#editarTituloEvento").val(respuesta["nombre_video"]);
            $("#editarLinkVideo").val(respuesta["link"]);
            $("#editarAreaVideo").html(respuesta["area"]);
            $("#editarAreaVideo").val(respuesta["area"]);
            $("#txtidEvento").val(idVideo);

            console.log("respuesta",respuesta);
            
            
        }
    });

})

//eliminar video
$(document).on("click",".btnEliminarVideo",function(){
    
        var idVideo= $(this).attr("idVideo");
    
        swal({
            title: "¿Esta seguro de Eliminar el Video?",
            text: "Si no esta seguro puede cancelar la accion!",
            type:"warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText:"Cancelar",
            confirmButtonText: "Si, borrar video!"
        }).then(function(result){
    
            if(result.value){
    
                window.location = "index.php?ruta=videos&idVideo="+idVideo;
            }
        })
    })