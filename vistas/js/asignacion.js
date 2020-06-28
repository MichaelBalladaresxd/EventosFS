//Editar Asignacio
$(".btnEditarAsignacion").click(function(){

    console.log("asdasdas");
    var idAsignacion = $(this).attr("idAsignacion");
    console.log('idAsignacion', idAsignacion)

    var datos = new FormData();
    console.log('datos', datos)

    datos.append("idAsignacion",idAsignacion);

    $.ajax({

        url:"ajax/asignacion.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success:function(respuesta){
            console.log('respuesta', respuesta)
            $("#idAsignacion").val(respuesta["id"]);
            $("#editarNombre").val(respuesta["asignador"]);
            $("#editarPerfil").val(respuesta["id_usuario"]);
            $("#editarAsunto").val(respuesta["asunto"]);
            $("#editarDescripcion").val(respuesta["descripcion"]);
            $("#editarLimite").val(respuesta["fec_limite"]);
            $("#editarArchivo").val(respuesta["archivo"]);


        }
    })
})

/*ELIMINAR ASIGNACION*/

$(".btnEliminarAsignacion").click(function(){
    var idAsignacion=$(this).attr("idAsignacion");

    swal({
        title:"¿Esta seguro de borrar esta Asigancion?",
        type: "warning",
        text: "!Si no esta seguro puede cancelar la Operacion!",
        confirmButtonText: "¡Si, Borrar asignacion!",
        showCancelButton: true,
        confirmButtonColor:'#3085d6',
        cancelButtonText:'Cancelar',
        cancelButtonColor: '#d33',
        closeOnConfirm: false

    }).then((result)=>{
        if (result.value) {
            window.location="index.php?ruta=asignacion&idAsignacion="+idAsignacion;
        }

    })
})