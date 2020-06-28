//EDITAR CLIENTE

$(".tablaClientes tbody").on("click","button.btnEditarCliente",function(){

    var idCliente = $(this).attr("idCliente");

    var datos = new FormData();

    datos.append("idCliente", idCliente);

    $.ajax({

        url:"ajax/clientes.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){

            /*Para traer los datos de cargo del cliente*/
            var datosCargo = new FormData();
            datosCargo.append("idCargo",respuesta["id_cargo"]);
  
            $.ajax({
              url:"ajax/cargo.ajax.php",
              method: "POST",
              data: datosCargo,
              cache: false,
              contentType: false,
              processData: false,
              dataType: "json",
              success:function(respuesta){
                 
               $("#editarCargo").val(respuesta["id"]);
               $("#editarCargo").html(respuesta["cargo"]);
      
              }//fin succes
          })//fin del ajax
            
            /*PARA TRAER LOS DATOS DEL PAIS DEL CLIENTE*/
          var datosPais = new FormData();
          datosPais.append("idPais",respuesta["id_pais"]);


          $.ajax({
            url:"ajax/pais.ajax.php",
            method: "POST",
            data: datosPais,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success:function(respuesta){
               
             $("#editarPais").html(respuesta["pais"]);
             $("#editarPais").val(respuesta["id"]);
    
            }//fin succes
        })//fin del ajax


        /*PARA TRAER LOS DATOS DE TIIPO DE CLIENTE*/
        var datosCliente = new FormData();
        datosCliente.append("idTipocliente",respuesta["id_tipo_cliente"]);
    
        $.ajax({
            url:"ajax/tipocliente.ajax.php",
            method: "POST",
            data: datosCliente,
            cache: false,
            contentType: false,
            processData: false,
            dataType:"json",
            success: function(respuesta){
                console.log("respuesta",respuesta);
                $("#editarTipoCliente").html(respuesta["descripcion"]);
                $("#editarTipoCliente").val(respuesta["id"]);
            }
    
        })

        /*PARA TRAER LOS DATOS DEL VENDEDOR*/
        var datosVendedor= new FormData();
        datosVendedor.append("idVendedor", respuesta["id_vendedor"]);
    
        $.ajax({
    
            url:"ajax/vendedor.ajax.php",
            method: "POST",
            data: datosVendedor,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
    
            success: function(respuesta){
    
                $("#editarVendedor").val(respuesta["id"]);
                $("#editarVendedor").html(respuesta["nombre"]);                              
            }
        });

        /*PARA TRAER LOS DATOS DE LA UNIDAD DE NEGODICIO*/
        var datosUnidad = new FormData();
        datosUnidad.append("idUnidad",respuesta["id_unidad"]);

        $.ajax({
            url:"ajax/unidad-negocio.ajax.php",
            method: "POST",
            data: datosUnidad,
            cache: false,
            contentType: false,
            processData: false,
            dataType:"json",
            success: function(respuesta){
                console.log("respuesta",respuesta);
                $("#editarUnidad").html(respuesta["descripcion"]);
                $("#editarUnidad").val(respuesta["id"]);
            }

    })
            $("#idCliente").val(respuesta["id"]);
            $("#editarCompania").val(respuesta["compania"]);           
            $("#editarWeb").val(respuesta["pagina_web"]);
            $("#editarContacto").val(respuesta["contacto"]);          
            $("#editarEmail").val(respuesta["email"]);
            $("#editarTelefono").val(respuesta["telefono"]);
            $("#editarDireccion").val(respuesta["direccion"]);
            $("#editarGerente").val(respuesta["gerente_cuentas"]);
            $("#editarFuente").val(respuesta["fuente"]);                
            $("#editarComentario").val(respuesta["comentarios"]);
        }
    })
})


///ELIMINAR CLIENTE//

$(".tablaClientes tbody").on("click","button.btnEliminarCliente",function(){

    var idCliente = $(this).attr("idCliente");
    swal({

        title:"¿Esta seguro de borrar el cliente?",
        text:"¡Si no lo esta puede cancelar la acción!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: "Si, borrar el cliente!"
    }).then((result)=>{
        if(result.value){

            window.location ="index.php?ruta=clientes&idCliente="+idCliente;
        }
    })
})

//PARA COTIZAR AL CLIENTE
$(document).on("click",".btnCotizar",function(){
    //$(".btnActivar").click(function(){
    
        var idCliente = $(this).attr("idCliente");
        var estadoCliente = $(this).attr("estadoCliente");
    
        var datos = new FormData();
    
        datos.append("activarId",idCliente);
        datos.append("activarCliente",estadoCliente);
    
        $.ajax({
            url:"ajax/clientes.ajax.php",
            method:"POST",
            data: datos,
            cache: false,
            contentType:false,
            processData: false,
            success: function(respuesta){
                if(window.matchMedia("(max-width:767px)").matches){
    
                    swal({
                        title:"El cliente a sido Actualizado",
                        type: "success",
                        confirmButtonText: "¡Cerrar!"
            
                    }).then(function(result){
                        if (result.value) {
                            window.location="clientes";
                        }
    
                    });
    
                }
    
            }
            
        
        }) ;
        
    
        if(estadoCliente == 0){
    
            $(this).removeClass('btn-success');
            $(this).addClass('btn-danger');
            $(this).html('Sin Cotizar');
            $(this).attr('estadoCliente',1);
        }else{
    
            $(this).addClass('btn-success');
            $(this).removeClass('btn-danger');
            $(this).html('Cotizado');
            $(this).attr('estadoCliente',0);
        }
    
    });


      ///TABLA CLIENTES
    $('.tablaClientes').DataTable({
        "ajax": "ajax/datatable-clientes.ajax.php",
        "deferRender": true,
        "retrieve": true,
        "processing": true,
        "language": {

            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
    
        }
        });