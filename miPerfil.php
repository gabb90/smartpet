<?php

require_once 'autoload.php';

if (!$auth->estaLogueado()) {//si ya esta logueado, no lo deja entrar y lo redirije a home
  header("Location: home.php");
}

$conn_BD = new DB;
$usuario= $conn_BD->traerPorEmail($_SESSION["email"]);

?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartPet - Perfil</title>
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/paletaColores.css" id="theme">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="images/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  </head>

  <body class="registro-body">

    <?php require_once 'header.php'; ?>

    <div class="container-principal">

      <div class="container-secundario">

        <div class="perfilmain">
          <div class="perfilusuario">
            <img class="perfilimg" src="<?php echo "avatars/".$usuario->getAvatar(); ?>" alt="Perfil">
          </div>
          <div class="perfilusuario">
            <h2 class ="perfilh2"><?php echo $usuario->getNickname(); ?></h2>
          </div>
          <div>
            <div>
              <label for=""><u>Nombre Completo</u>: </label>
              <span><?php echo $usuario->getNombre(); ?></span>
            </div>
            <br>
            <div>
              <label for=""><u>País de Nacimiento</u>: </label>
              <span><?php echo $usuario->getCountry(); ?></span>  <!-- País de nacimiento: Neverland -->
            </div>
            <br>
            <?php if ($usuario->getState()) { ?>
              <div>
                <label for=""><u>Provincia</u>: </label>
                <span><?php echo $usuario->getState(); ?></span>  <!-- Provincia: Neverland -->
              </div>
              <br>
            <?php } ?>
            <div>
              <label for=""><u>Email</u>: </label>
              <span><?php echo $usuario->getEmail(); ?></span><!-- Correo electronico: john@doe.com -->
            </div>
            <br>
            <div>
              <label for=""><u>Tema</u>: </label>
              <button type="button" name="buttonclassic" id="buttonclassic">Clasico</button>
              <button type="button" name="buttonnavidad" id="buttonnavidad">Navidad</button>
            </div>
          </div>
        </div>

      </div>

      <?php require_once 'footer.php'; ?>

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/header.js"></script>
    <script src="js/themes.js"></script>
    <script src="js/themes-selector.js"></script>

  </body>
</html>
