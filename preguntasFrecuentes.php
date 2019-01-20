<?php

  require_once 'autoload.php';

?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SmartPet - Preguntas frecuentes</title>
  <link rel="icon" href="images/logo.png">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="css/paletaColores.css" id="theme">
  <link rel="stylesheet" href="css/styles.css">
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
  <body class="oli">

    <?php require_once 'header.php'; ?>

    <div class="container-principal">
      <div class="container-secundario">

        <!-- Bootstrap FAQ - START -->
        <div class="container">
          <div class="" id="accordion">
            <div class="faqHeader">Preguntas Frecuentes</div>
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-header pregunta-del-faq">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">¿Dónde nos encontramos?</a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="card-block">
                        Nos encontramos en el centro, cerca de las líneas de subte A, B, C, y D.
                    </div>
                </div>
            </div>
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-header">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">¿En qué días y horarios atendemos?</a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="card-block">
                      De lunes a viernes de 8:00 hs a 20:00 hs y sábados de 9:00 hs a 14:00 hs.
                    </div>
                </div>
            </div>
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-header">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">¿Cuánto demoran en llegar las compras?</a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                    <div class="card-block">
                        De 1 a 5 días hábiles dependiendo de la zona del país donde se encuentre.
                    </div>
                </div>
            </div>
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-header">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">¿Se pueden hacer compras fuera de horario de manera on-line?</a>
                    </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse">
                    <div class="card-block">
                        Sí, el sitio web está habilitado las 24 horas del día, todos los días del año.
                    </div>
                </div>
            </div>
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-header">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">¿Qué medios de pago aceptan?</a>
                    </h4>
                </div>
                <div id="collapseFive" class="panel-collapse collapse">
                    <div class="card-block">
                        Aceptamos tarjeta de crédito y efectivo por puntos de pago en toda la ciudad.
                    </div>
                </div>
            </div>
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-header">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">¿Cuánto tiempo tengo para hacer devoluciones?</a>
                    </h4>
                </div>
                <div id="collapseSix" class="panel-collapse collapse">
                    <div class="card-block">
                        Hasta 14 días a partir de que se recibió el producto.
                    </div>
                </div>
            </div>
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-header">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">¿Hacen envíos al exterior?</a>
                    </h4>
                </div>
                <div id="collapseSeven" class="panel-collapse collapse">
                    <div class="card-block">
                        Sí, consultar por aranceles y tarifas aquí.
                    </div>
                </div>
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


  </body>
</html>
