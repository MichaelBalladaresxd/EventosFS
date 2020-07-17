$(document).ready(function(){
  $("#txtFechaMulti").addClass('d-none');
 
  $("#customCheckbox1").change(function(){
    if($("#customCheckbox1").is(':checked')){
      $("#txtFechaMulti").removeClass('d-none');
      $("#txtFechaMulti").addClass('d-block');
     } else {
      $("#txtFechaMulti").removeClass('d-block');
      $("#txtFechaMulti").addClass('d-none');
     }
  })



  // COMBOBOX LINK DE INSCRIPCION
  $("#archiveAdjuntoLink").addClass("d-none");
  $("#txtLinkCmb").addClass("d-none");


  $("#cmbInscripcion").change(function(){
    var inscripcion = $("#cmbInscripcion").val();
    
    switch (inscripcion) {
      case "Link":
        $("#txtLinkCmb").removeClass("d-none");
        $("#archiveAdjuntoLink").removeClass("d-block");
        $("#txtLinkCmb").addClass("d-block");
        $("#archiveAdjuntoLink").addClass("d-none");
        break;

      case "Archivo":
        $("#archiveAdjuntoLink").removeClass("d-none");
        $("#txtLinkCmb").removeClass("d-block");
        $("#archiveAdjuntoLink").addClass("d-block");
        $("#txtLinkCmb").addClass("d-none");
        break;
    
      default:
        $("#archiveAdjuntoLink").addClass("d-none");
        $("#txtLinkCmb").addClass("d-none");
        $("#archiveAdjuntoLink").removeClass("d-block");
        $("#txtLinkCmb").removeClass("d-block");
        break;
    }

  })
})