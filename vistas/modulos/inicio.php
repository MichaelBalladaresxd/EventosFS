
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administracion de Web</h1>
            <small>Panel de Control</small>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Tablero</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <?php 
                $item = null;
                $valor = null;
                $usuarios = ControladorUsuarios::ctrMostrarUsuario($item,$valor);
              
                echo '<h3>'.count($usuarios).'</h3>';
              ?>
              
                <p>Usuarios Registrados</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>

                <!-- VALIDAR ACCESO -->
              <?php

                if ($_SESSION['perfil']=="Administrador") {
                 echo '<a href="usuarios" class="small-box-footer">Más Informacion <i class="fas fa-arrow-circle-right"></i></a>';
                } else {
                  echo '<a href="#" class="small-box-footer">No Tienes Acceso <i class="fas fa-arrow-circle-right"></i></a>';

                }
                
              
              ?>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php
                   $item = null;
                   $valor = null;
                   $eventos = ControladorEventos::ctrMostrarEventoCompleto($item,$valor);

                  echo '<h3>'.count($eventos).'</h3>';
              ?>

                <p>Eventos</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="eventos" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->