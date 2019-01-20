<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartPet - Login</title>
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/paletaColores.css" id="theme">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="images/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  </head>

  <body class="registro-body">

    <?php

    require_once 'autoload.php';

    //si ya esta logueado, no lo deja entrar y lo redirige al home

    if ($auth->estaLogueado()) {
      header("Location: home.php");
    }

    $errorCorreo = "";
    $errorPassword="";
    $correo="";

    if ($_POST) {

      $correo = trim($_POST["login-correo"]);
      $password=trim($_POST["login-password"]);

      $validador = new Validator();
      $errorCorreo = $validador->validarMail($correo);
      $errorPassword = $validador->validarPass($password);

      if (empty($errorCorreo)&& empty($errorPassword)) {
        $conn_BD = new DB;
        $usuario=$conn_BD->traerPorEmail($correo);
        if ($usuario!=null) {
          $passUsuarioHash=$usuario->getPassword();
        }else {
          $passUsuarioHash=null;
        }

        // echo "<h1>Llegué hasta acá</h1>";
        // var_dump($usuario);
        // exit;

        if (($usuario!=null) && password_verify($password , $passUsuarioHash ) ) {

          //loguea al usuario

          $auth->loguear($usuario->getEmail());

          //deja al usuario logueado en cookie si marcó el "Recordarme"

          if (isset($_POST["recordarusuario"])) {
            $auth->recordarme($usuario->getEmail());
          }

          header('Location:home.php');

        }else {
          $errorPassword["errorPass"] = "Verifique Usuario y Contraseña";
        }
      }

    }

    ?>


    <?php   require_once 'header.php'; ?>

    <div class="container-principal">

      <div class="container-secundario">

        <div class="registro-titulos">

          <h1>Ingresa a tu cuenta</h1>
          <h5>No tienes una cuenta? Regístrate en SmartPet <a href="registro.php">aquí</a>!</h5>

        </div>

        <form class="registro-formulario" action="login.php" method="post">

          <div class="registro-container-campos">

            <div class="registro-nombre-y-campo">
              <label for="login-correo" class="registro-nombre">Correo electrónico:</label>
              <div class="registro-campo">
                <input type="text" name="login-correo" <?php if(isset($errorCorreo["errorMail"])){echo 'style="border: solid 2px red"';} ?> value="<?php echo $correo; ?>">
                <?php
                  if (isset($errorCorreo["errorMail"])) {
                    echo '<br><span class="registro-error">'.$errorCorreo["errorMail"].'</span>';
                  }
                ?>
              </div>
            </div>

            <div class="registro-nombre-y-campo">
              <label for="login-password" class="registro-nombre">Contraseña:</label>
              <div class="registro-campo">
                <input type="password" name="login-password" value="" <?php if(isset($errorPassword["errorPass"])){echo 'style="border: solid 2px red"';} ?> >
                <?php
                  if (isset($errorPassword["errorPass"])) {
                    echo '<br><span class="registro-error">'.$errorPassword["errorPass"].'</span>';
                  }
                ?>
              </div>
            </div>

            <label class="registro-recordar"><input type="checkbox" name="recordarusuario" value="recordarme"> Recordar mi cuenta</label>

          </div>

          <button class="registro-button" type="submit">Ingresar</button>

          <label class="registro-olvide">Olvidaste tu contraseña? Recupérala <a href="olvideContrasenia.php">aquí</a></label>

        </form>


      </div>

      <?php require_once 'footer.php'; ?>

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/header.js"></script>
    <script src="js/themes.js"></script>

  </body>
</html>
