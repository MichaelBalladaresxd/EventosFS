
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Administrador de Videos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active">Videos</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">

        <div class="box">

            <div class="box-header with-border">
                <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarVideo">
                    Agregar Video

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
                                    <th>Nombre del Curso</th>
                                    <th>Link/URL</th>
                                    <th>Area</th>
                                    <th>Fec. Registro</th>
                                    <th>Acciones </th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php

                                $item = null;
                                $valor = null;

                                $videos = ControladorVideos::ctrMostrarVideo($item,$valor);

                                foreach ($videos as $key => $value){
                                    echo '
                                    <tr>
                                        <td>'.($key+1).'</td>
                                        <td>'.$value["nombre_video"].'</td>
                                        <td><a href="'.$value["link"].'" target="_blank">'.$value["link"].'</a> </td>
                                        <td>'.$value["area"].'</td>
                                        <td>'.$value["fecha_registro"].'</td>';
                                    
                                        echo'
                                        <td>
                                            <div class="btn-group">

                                                <button class="btn btn-warning btnEditarVideo" idVideo="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarVideo"><i class="fa fa-pen"></i></button>
                                                <button class="btn btn-danger btnEliminarVideo" idVideo="'.$value["id"].'"><i class="fa fa-times"></i></button>
                                            
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

<div id="modalAgregarVideo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

    <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">

            <div class="modal-header" style="background:#222d32; color:white;">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Video</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">         
                    <span aria-hidden="true">&times;</span>          
                </button>
            </div>

        <div class="modal-body">

            <div class="box-body">

                <div class="form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </span>

                        <input type="text" class="form-control" name="nuevoTituloEvento" autocomplete="off" placeholder="Ingrese Nombre del Curso" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-link"></i>
                        </span>

                        <input type="text" class="form-control" name="nuevoLinkVideo" autocomplete="off" placeholder="Ingrese URL del Video" required>
                    </div>
                </div>

            

                <div class="form-group">
                
                    <div class="row">
                        <div class="input-group-prepend col-md-12 col-12">
                            <span class="input-group-text"><i class="fas fa-file-archive"></i></span>

                            <select class="form-control" name="nuevoAreaVideo" id="cmbAreaVideo">
                                <option value="">Selec. Área</option>
                                <option value="PT">PT</option>
                                <option value="AT">AT</option>
                                <option value="AR">AR</option>
                            </select>
                        </div>


                            <!-- Usuario Qu registrará -->
                            <input type="hidden" name="txtUsuarioRegistro" value="<?php echo $_SESSION['nombre']; ?>">
                    </div>

                </div>

            </div>

        </div>

        <div class="modal-footer">
            
            <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal" >Salir</button>
            <button type="submit" class="btn btn-success" >Guardar Video</button>

        </div>

                <?php
                    $crearVideo = new ControladorVideos();
                    $crearVideo -> ctrCrearVideo();
                ?>
        </form>
    </div>
</div>

    
</div>




<!-- MODAL EDITAR VIDEO -->

<div id="modalEditarVideo" class="modal fade" role="dialog"  tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">

    <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">

        <div class="modal-header" style="background:#222d32; color:white;">
            <h5 class="modal-title">Editar Video</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">               
                <span aria-hidden="true">&times;</span>          
            </button>
            

        </div>

        <div class="modal-body">

            <div class="box-body">

                <div class="form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </span>

                        <input type="text" class="form-control" name="editarTituloEvento" id="editarTituloEvento"  required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-link"></i>
                        </span>

                        <input type="text" class="form-control" name="editarLinkVideo" id="editarLinkVideo" required>
                    </div>
                </div>



                <div class="form-group">
                
                    <div class="row">
                        <div class="input-group-prepend col-md-12 col-12">
                            <span class="input-group-text"><i class="fas fa-file-archive"></i></span>

                            <select class="form-control" name="editarAreaVideo" >
                                <option value="" id="editarAreaVideo"></option>
                                <option value="PT">PT</option>
                                <option value="AT">AT</option>
                                <option value="AR">AR</option>
                            </select>
                        </div>


                            <!-- Usuario Qu registrará -->
                            <input type="hidden" name="txtUsuarioRegistro" value="<?php echo $_SESSION['nombre']; ?>">
                            <input type="hidden" name="txtidEvento" id="txtidEvento" value="">
                    </div>

                </div>

            </div>

        </div>

        <div class="modal-footer">
            
            <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal" >Salir</button>
            <button type="submit" class="btn btn-success" >Guardar Cambios</button>

        </div>

                <?php
                    $editarVideo = new ControladorVideos();
                    $editarVideo -> ctrEditarVideo();
                ?>
        </form>
    </div>
</div>

    
</div>
<?php
$borrarVideo = new ControladorVideos();
$borrarVideo -> ctrBorrarVideo();
?>


