<div class="login-page" style="background-image:url('vistas/dist/img/fondofs.jpg');">
  
  <div class="login-box">

    <div class="login-logo">
          <img src="vistas/dist/img/grupofs.jpg" class="img-fluid">
    </div>

  <div class="card" id="FormLogin">
    <div class="card-body login-card-body" id="FormLogin">
      <h3 class="login-box-msg font-weight-bold">Iniciar Sesion</h3>

      <form method="post">


        <div class="form-group has-feedback">

          <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" autocomplete="off" required>

          <span class="glyphicon glyphicon-user form-control-feedback"></span>

        </div>

        <div class="form-group has-feedback">

          <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>

          <span class="glyphicon glyphicon-lock form-control-feedback"></span>

        </div>

        <div class="row">

          <div class="col-6 mx-auto" >
            <button type="submit" class="btn btn-info btn-block btn-flat">Ingresar</button>
          </div>

        </div>

        <?php

          $login = new ControladorUsuarios();
          $login -> ctrIngresoUsuario();



        ?>
      </form> 
  </div>

</div>





 <!-- <div class="login-box-body" >

      <img src="vistas/dist/img/grupofs.jpg" class="img-responsive" 
          style="padding:30px 20px 20px 20px">

      <p class="login-box-msg" style="color: black;">Ingresar al Sistema</p>


      
    </div> -->


