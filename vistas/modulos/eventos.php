
<div class="content-wrapper">

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Administrador de Eventos/Cursos</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active">Eventos - Cursos</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>


<section class="content">

  <div class="box">

    <div class="box-header with-border">
        <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarEvento">
            Agregar Evento

        </button>

    </div>
    <br>
    <div class="box-body">
        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped tablas">
                    <thead>
                        <tr>
                            <th style="whidt:10px">#</th>                     
                            <th>Titulo del Evento</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Inscripción</th>
                            <th>Archivo</th>
                            <th>Acciones </th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php

                        $item = null;
                        $valor = null;

                        $eventos = ControladorEventos::ctrMostrarEvento($item,$valor);

                        foreach ($eventos as $key => $value){
                            echo '
                            <tr>
                                <td>'.($key+1).'</td>
                                <td>'.$value["nombre_archivos"].'</td>
                                <td>'.$value["ver_fecha"].'</td>';
                                echo '<td>'.$value["fecha_evento"].'</td>';
                                echo '<td>'.$value["comentarios_text"].'</td>';
                                echo '<td><img src="https://www.grupofs.com/imagenes/'.$value["archivo_archivos"].'" class="img-thumbnail" width="100px"></td>';
                               
                                echo'
                                <td>
                                    <div class="btn-group">

                                        <button class="btn btn-warning btnEditarEvento" idEvento="'.$value["id_archivos"].'" data-toggle="modal" data-target="#modalEditarEvento"><i class="fa fa-pen"></i></button>
                                        <button class="btn btn-danger btnEliminarEvento" idEvento="'.$value["id_archivos"].'"><i class="fa fa-times"></i></button>
                                    
                                    </div>
                                </td>

                            </tr>';
                        }


                        ?>
                        
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>

  </div>

</section>

</div>

<!-- MODAL AGREGAR EVENTO -->

<div id="modalAgregarEvento" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">

  <div class="modal-content">

    <form role="form" method="post" enctype="multipart/form-data">

        <div class="modal-header" style="background:#222d32; color:white;">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Evento</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">         
                <span aria-hidden="true">&times;</span>          
            </button>
        </div>

      <div class="modal-body">

        <div class="box-body">

            <div class="form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>

                    <input type="text" class="form-control input-sm" name="nuevoTituloEvento" autocomplete="off" placeholder="Ingrese Titulo del Evento" required>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                <div class="input-group date col-md-6 col-6" id="reservationdate" data-target-input="nearest">
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" required/>
                </div>


                <div class="custom-control custom-checkbox col-md-5 col-5">
                    <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="Check">
                    <label for="customCheckbox1" class="custom-control-label">Fechas Múltiples</label>
                </div>
                </div>
            </div>     


                    <!-- Input Extra Fechas Multiples -->
            <div class="form-group" style="display:none;"> 
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>

                    <input type="text" class="form-control input-sm" name="txtFechMultiples"  autocomplete="off" placeholder="Ingrese Fechas Múltiples" id="FechMultiples" required>
                </div>
            </div>
           

            <div class="form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-clipboard"></i></span>

                    <input type="text" class="form-control input-sm" name="txtLink"  autocomplete="off" placeholder="Ingrese Link de Inscripción" id="nuevoLink" required>
                </div>
            </div>

           

            <div class="form-group">
               
                <div class="row">
                    <div class="input-group-prepend col-md-6 col-5">
                        <span class="input-group-text"><i class="fas fa-file-archive"></i></span>

                        <select class="form-control input-sm" name="nuevoArchivo">
                            <option value="">Seleccionar Opcion</option>
                            <option value="Link">Link</option>
                            <option value="Archivo">Archivo</option>
                        </select>
                    </div>

                    <div class="input-group-prepend col-md-6 col-6" id="txtLinkCmb" style="display:none;">
                        <input type="text" class="form-control input-sm" name="txtLink"  autocomplete="off" placeholder="Ingrese Link de Inscripción" id="nuevoLink" required>
                    </div>

                    <input type="file" class="AdjuntoLink col-md-6 col-6" name="txtAdjuntoLink">

                </div>

            </div>

            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" cclass="nuevaFoto" name="txtAdjunto" >
                    <label class="custom-file-label" for="inputGroupFile03">Seleccionar Archivo</label>

                </div>
            </div>


        </div>

      </div>

      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal" >Salir</button>
        <button type="submit" class="btn btn-success" >Guardar Usuario</button>

      </div>

            <?php
                $crearUsuario = new ControladorUsuarios();
                $crearUsuario -> ctrCrearUsuario();
            ?>
    </form>
</div>
</div>

    
</div>




<!-- MODAL EDITAR USUARIO -->

<div id="modalEditarUsuario" class="modal fade" role="dialog"  tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">

    <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">

        <div class="modal-header" style="background:#222d32; color:white;">
            <h5 class="modal-title">Editar Usuario</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">               
                <span aria-hidden="true">&times;</span>          
            </button>
            

        </div>

        <div class="modal-body">

            <div class="box-body">

                <div class="form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>

                        <input type="text" class="form-control input-sm" id="editarNombre" name="editarNombre" value="" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-key"></i></span>

                        <input type="text" class="form-control input-sm" id="editarUsuario" name="editarUsuario" value="" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>

                        <input type="password" class="form-control input-sm" name="editarPassword" placeholder="Ingrese Nueva Contraseña" >
                        <input type="hidden" id="passwordActual" name="passwordActual">
                    
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-users"></i></span>

                        <select class="form-control input-sm" name="editarPerfil">
                            <option value="" id="editarPerfil"></option>
                            <option value="Administrador">Administrador</option>
                            <option value="Especial">Especial</option>
                            <option value="Vendedor">Vendedor</option>
                        </select>
                    </div>
                </div>

               
            <div class="form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>

                    <input type="date" class="form-control input-sm" id="editarNacimiento" name="editarNacimiento" placeholder="Ingrese Fecha de Nacimiento" required>
                </div>
            </div>

                <div class="form-group">

                    <div class="panel">Subir Foto</div>  
                
                    <input type="file" class="nuevaFoto" name="editarFoto">

                    <p class="help-block">Peso Maximo de la foto 2 MB</p>

                    <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                    <input type="hidden" name="fotoActual" id="fotoActual">
                </div>

            </div>

        </div>

        <div class="modal-footer">
            
            <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal" >Salir</button>
            <button type="submit" class="btn btn-success" >Modificar Usuario</button>

        </div>

                <?php
                    $editarUsuario = new ControladorUsuarios();
                    $editarUsuario -> ctrEditarUsuario();
                ?>
        </form>
    </div>
</div>

    
</div>
<?php
$borrarUsuario = new ControladorUsuarios();
$borrarUsuario -> ctrBorrarUsuario();
?>


