<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="vistas/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">GrupoFS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
       
            <?php

                if($_SESSION["foto"] != ""){

                    echo '<img src="'.$_SESSION["foto"].'" class="img-circle elevation-2">';

                }else{

                    echo '<img src="vistas/img/usuarios/default/anonymous.png" class="img-circle elevation-2">';

                }
            ?>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION["nombre"]; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
          <li class="nav-header">MENU</li>
          <li class="nav-item active">
            <a href="inicio" class="nav-link">
              <i class="nav-icon far fa fa-home"></i>
                <p>
                Inicio
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>

          <?php

            if ($_SESSION['perfil']=="Administrador") {
              echo '<li class="nav-item">
              <a href="usuarios" class="nav-link">
                <i class="nav-icon far fa fa-users"></i>
                <p>
                  Usuarios
                </p>
              </a>
            </li>';
            }

          ?>

          <li class="nav-item">
            <a href="eventos" class="nav-link">
              <i class="nav-icon far fa fa-plus-square"></i>
              <p>
                Eventos
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="videos" class="nav-link">
              <i class="nav-icon far fa fa-video"></i>
              <p>
                Videos Cursos
              </p>
            </a>
          </li>

          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa fa-plus-square"></i>
              <p>
                Eventos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li> -->
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>