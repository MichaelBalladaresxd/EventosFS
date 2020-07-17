<?php

session_start();

?>


<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" lang="es">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrador WEB FS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="icon" href="vistas/dist/img/icono.png">

    <!--=====================================
    PLUGINS DE CSS
    ======================================-->
    
   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="vistas/bower_components/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="vistas/bower_components/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="vistas/bower_components/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="vistas/bower_components/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="vistas/bower_components/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="vistas/bower_components/summernote/summernote-bs4.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="vistas/plugins/iCheck/all.css">

    <link rel="stylesheet" href="vistas/dist/css/stylelogin.css">
    
  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!--=====================================
    vistas/PLUGINS DE JAVASCRIPT
    ======================================-->
    <script src="vistas/bower_components/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="vistas/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="vistas/bower_components/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="vistas/bower_components/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="vistas/bower_components/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="vistas/bower_components/jqvmap/jquery.vmap.min.js"></script>
<script src="vistas/bower_components/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="vistas/bower_components/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="vistas/bower_components/moment/moment.min.js"></script>
<script src="vistas/bower_components/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="vistas/bower_components/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="vistas/bower_components/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="vistas/bower_components/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="vistas/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="vistas/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="vistas/bower_components/datatables/jquery.dataTables.min.js"></script>
<script src="vistas/bower_components/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="vistas/bower_components/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="vistas/bower_components/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- SweetAlert -->
<script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <!-- Site wrapper -->


        <?php

        if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){


                echo '<div class="wrapper">';

                /* CABEZOTE */
                include "vistas/modulos/cabezote.php";

                /* MENU */
                include "vistas/modulos/menu.php";
                


                /* CONTENIDO */

                if(isset($_GET["ruta"])){

                    if($_GET["ruta"] == "inicio" ||
                        $_GET["ruta"] == "usuarios" ||
                        $_GET["ruta"] == "eventos" ||
                        $_GET["ruta"] == "videos" ||
                        $_GET["ruta"] == "salir"){

                        include "modulos/".$_GET["ruta"].".php";
                    }else{
                        include "modulos/404.php";
                    }
                }else{
                    include "modulos/inicio.php";
                }

                /* FOOTER */
                include "vistas/modulos/footer.php";

                echo '</div>';

        }else{
            include "modulos/login.php";
        }



        ?>

        <script src="vistas/js/plantilla.js"></script>
        <script src="vistas/js/usuarios.js"></script>
        <script src="vistas/js/eventos.js"></script>
        <script src="vistas/js/videos.js"></script>



    </body>
</html>

