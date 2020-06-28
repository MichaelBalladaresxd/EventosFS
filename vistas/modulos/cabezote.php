<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>

      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          
          <?php

            if($_SESSION["foto"] != ""){

                echo '<img src="'.$_SESSION["foto"].'" class="user-image img-circle elevation-2">';

            }else{

                echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image img-circle elevation-2">';

            }
          ?>

          <span class="d-none d-md-inline"><?php echo $_SESSION['nombre']; ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-success">
          <?php

            if($_SESSION["foto"] != ""){

                echo '<img src="'.$_SESSION["foto"].'" class="img-circle elevation-2">';

            }else{

                echo '<img src="vistas/img/usuarios/default/anonymous.png" class="img-circle elevation-2">';

            }
          ?>
            <p>
            <?php echo $_SESSION['nombre']; ?> - <?php echo $_SESSION['perfil']; ?>
              <small><?php echo $_SESSION['fechaNacimiento'] ?> </small>
            </p>
          </li>
        
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="#" class="btn btn-success btn-flat">Inicio</a>
            <a href="salir" class="btn btn-danger btn-flat float-right">Cerrar Sesión</a>
          </li>
        </ul>
      </li>

      
    </ul>
  </nav>