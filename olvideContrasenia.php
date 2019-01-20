<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartPet - Home</title>
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/paletaColores.css" id="theme">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="images/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  </head>
  <body>

    <?php require_once 'header.php'; ?>

    <div class="container-principal">

      <div class="container-secundario">

        <div class="registro-titulos">

          <h1>Olvidaste tu contraseña</h1>
          <h5>Ingresa tu correo electrónico</h5>

        </div>

        <form class="registro-formulario" action="" method="post">
          <div class="registro-container-campos">
            <div class="registro-nombre-y-campo">
              <label for="login-correo" class="registro-nombre">Correo electrónico:</label>
                <div class="registro-campo">
                  <input type="text" name="login-correo">
                </div>
            </div>
          </div>

          <button class="registro-button" type="submit" name="button">Recuperar constraseña</button>

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
