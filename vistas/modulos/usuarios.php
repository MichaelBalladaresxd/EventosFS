
<div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administración de Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">

      <div class="box">

        <div class="box-header with-border">
            <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarUsuario">
                Agregar usuario

            </button>

        </div>
        <br>
        <div class="box-body">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="whidt:10px">#</th>                     
                                <th>Nombre</th>
                                <th>Usuario</th>
                                <th>Foto</th>
                                <th>Perfil</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Estado</th>
                                <th>Ultimo Login</th>   
                                <th>Acciones </th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php

                            $item = null;
                            $valor = null;

                            $usuarios = ControladorUsuarios::ctrMostrarUsuario($item,$valor);

                            foreach ($usuarios as $key => $value){
                            echo '
                            <tr>
                            <td>'.($key+1).'</td>
                            <td>'.$value["nombre"].'</td>
                            <td>'.$value["usuario"].'</td>';

                            if($value["foto"] != ""){
                            echo ' <td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                            }else{

                            echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                            
                            }
                            echo '<td>'.$value["perfil"].'</td>';
                            
                            //fecha de nacimiento

                            echo '<td>'.$value["fechaNacimiento"].'</td>';
                            //Condicion para ver el estado y color de los botones

                            if($value["estado"] == 1){

                                echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';

                            }else{

                                echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'"  fotoUsuario="'.$value["foto"].'"usuario="'.$value["usuario"].'" estadoUsuario="1">Desactivado</button></td>';
                            }

                            echo '<td>'.$value["ultimo_login"].'</td>';
                            echo'
                            <td>
                                <div class="btn-group">

                                    <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pen"></i></button>
                                    <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'"><i class="fa fa-times"></i></button>
                                
                                    </div>
                            </td>

                            </tr>
                            ';
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

  <!-- MODAL AGREGAR USUARIO -->

  <div id="modalAgregarUsuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">

            <div class="modal-header" style="background:#222d32; color:white;">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">         
                    <span aria-hidden="true">&times;</span>          
                </button>
            </div>

          <div class="modal-body">

            <div class="box-body">

                <div class="form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>

                        <input type="text" class="form-control input-sm" name="nuevoNombre" placeholder="Ingrese Nombre" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>

                        <input type="text" class="form-control input-sm" name="nuevoUsuario"  autocomplete="off" placeholder="Ingrese Usuario" id="nuevoUsuario" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>

                        <input type="password" class="form-control input-sm" name="nuevoPassword" placeholder="Ingrese Contraseña" required>
                    </div>
                </div>

               

                <div class="form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-users"></i></span>

                        <select class="form-control input-sm" name="nuevoPerfil">
                            <option value="">Seleccionar Perfil</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Usuario">Usuario</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group-prepend">
                   
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>

                        <input type="date" class="form-control input-sm" name="nuevoNacimiento" title="Fecha de Nacimiento"  required>
                    </div>
                </div>

                <div class="form-group">

                    <div class="panel">Subir Foto</div>  
                  
                    <input type="file" class="nuevaFoto" name="nuevaFoto">

                    <p class="help-block">Peso Maximo de la foto 2 MB</p>

                    <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

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
                                    <option value="Usuario">Usuario</option>
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


