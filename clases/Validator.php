<?php

class Validator{

    private $errores = [];
    private $fullname = '';
    private $nickname = '';
    private $country = '';
    private $email = '';
    private $password1 = '';
    private $password2 = '';
    private $paises = ['Argentina', 'Bolivia', 'Brasil', 'Chile', 'Colombia', 'Ecuador', 'México', 'Paraguay', 'Perú', 'Uruguay', 'Venezuela'];

    public function validarPost(Array $post){

      // "Limpio" los datos recibidos por POST

      $this->fullname = trim($post['fullname']);
      $this->nickname = trim($post['nickname']);
      $this->country = trim($post['country']);
      $this->email = trim($post['email']);
      $this->password1 = trim($post['password1']);
      $this->password2 = trim($post['password2']);

      // Valido el "Nombre completo"

      // Hago un tratamiento para NO permitir símbolos como *, $, &, /, etc., pero SÍ permitir las letras utilizadas tanto en el idioma español como en el portugués -esto incluye las letras "especiales" de estos dos idiomas, es decir, la Ñ y la Ç-, así como los espacios)

      if (empty($this->fullname)) {
        $this->errores ['fullname'] = 'Debes completar este campo';
      } else if ((strlen($this->fullname) < 4) || (strlen($this->fullname) > 60)) {
        $this->errores ['fullname'] = 'El nombre completo debe tener un mínimo de 4 y un máximo de 60 caracteres';
      } else if (!ctype_alpha(str_replace([' ', 'á', 'ã', 'â', 'à', 'é', 'ê', 'í', 'ó', 'õ', 'ô', 'ú', 'ñ', 'ç'], '', $this->fullname))) {
        $this->errores ['fullname'] = 'Se ingresaron caracteres inválidos. Este campo acepta solo letras y espacios';
      }

      // Valido el "Nombre de usuario"

      // Hago un tratamiento para NO permitir espacios ni símbolos como *, $, &, /, etc., pero SÍ permitir las letras utilizadas tanto en el idioma español como en el portugués -esto incluye las letras "especiales" de estos dos idiomas, es decir, la Ñ y la Ç-)

      if (empty($this->nickname)) {
        $this->errores ['nickname'] = 'Debes completar este campo';
      } else if ((strlen($this->nickname) < 3) || (strlen($this->nickname) > 10)) {
        $this->errores ['nickname'] = 'El nombre de usuario debe tener un mínimo de 3 y un máximo de 10 caracteres';
      } else if (!ctype_alnum(str_replace(['á', 'ã', 'â', 'à', 'é', 'ê', 'í', 'ó', 'õ', 'ô', 'ú', 'ñ', 'ç'], '', $this->nickname))) {
        $this->errores ['nickname'] = 'Se ingresaron caracteres inválidos. Este campo acepta solo letras y números (sin espacios)';
      }

      // Valido el "País de nacimiento"



      if (empty($this->country)) {
        $this->errores ['country'] = 'Debes elegir una opción';
      } else if (!in_array($this->country, $this->paises)) {
        $this->errores ['country'] = 'La opción ingresada no es válida';
      }

      // Valido el "Correo electrónico"

      if (empty($this->email)) {
        $this->errores ['email'] = 'Debes completar este campo';
      } else if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
        $this->errores ['email'] = 'El formato del correo es inválido';
      }else{
        $conn_BD= new DB ;
        if ($conn_BD->traerPorEmail($this->email)) {
          $this->errores ['email'] = 'El Email que ha elegido ya existe';
        }
      }

      // Valido la "Contraseña"

      if (empty($this->password1)) {
        $this->errores ['password1'] = 'Debes completar este campo';
      } else if ((strlen($this->password1) < 6) || (strlen($this->password1) > 20)) {
        $errores ['password1'] = 'La contraseña debe tener un mínimo de 6 y un máximo de 20 caracteres';
      }

      // Valido el "Repetir contraseña"

      if (empty($this->password2)) {
        $this->errores ['password2'] = 'Debes completar este campo';
      } else if ((strlen($this->password2) < 6) || (strlen($this->password2) > 20)) {
        $this->errores ['password2'] = 'La contraseña debe tener un mínimo de 6 y un máximo de 20 caracteres';
      } else if ($this->password2 !== $this->password1) {
        $this->errores ['password2'] = 'Las contraseñas ingresadas no coinciden';
      }

      // Validando la "Imagen de perfil":

      if (empty($this->errores)) {

        if ($_FILES["avatar"]["error"] == 4) {

          $this->errores ['imagen'] = "La imagen de perfil es obligatoria";

        } else if ($_FILES["avatar"]["error"] == UPLOAD_ERR_OK) {


          $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);


          if ($ext != "png" && $ext != "jpg" && $ext != "jpeg") {
            $this->errores ['imagen'] = "El formato del archivo es inválido";
          } else if ($_FILES["avatar"]["size"] > 2097152) {
            $this->errores ['imagen'] = "El archivo supera el tamaño máximo permitido";
          } else {


          };

        } else {
          $this->errores['imagen'] = "Ocurrió un error al cargar la imagen de perfil";
        }

      }

      return $this->errores;

    }

    public function validarNick(String $nickname){

      // Valido el "Nombre de usuario"

      // Hago un tratamiento para NO permitir espacios ni símbolos como *, $, &, /, etc., pero SÍ permitir las letras utilizadas tanto en el idioma español como en el portugués -esto incluye las letras "especiales" de estos dos idiomas, es decir, la Ñ y la Ç-)
      $error =[];
      if (empty($nickname)) {
        $error ["errorNik"] = 'Debes completar este campo';
        } else if ((strlen($nickname) < 3) || (strlen($nickname) > 30)) {
        $error ["errorNik"] = 'El nombre de usuario debe tener un mínimo de 3 y un máximo de 30 caracteres';
        } else if (!ctype_alnum(str_replace(['á', 'ã', 'â', 'à', 'é', 'ê', 'í', 'ó', 'õ', 'ô', 'ú', 'ñ', 'ç'], '',$nickname))) {
        $error ["errorNik"] = 'Se ingresaron caracteres inválidos. Este campo acepta solo letras y números (sin espacios)';
        }
        return $error;
    }

    public function validarMail(String $mail){
      $error= [];
      if (empty($mail)) {
        $error ["errorMail"] = 'Debes completar este campo';
        } else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $error ["errorMail"] = 'El formato del correo es inválido';
        }
        return $error;
    }

    public function validarPass(String $pass){

      // Valido la "Contraseña"
      $error=[];
      if (empty($pass)) {
        $error ["errorPass"] = 'Debes completar este campo';
        return $error;
      } else if ((strlen($pass) < 6) || (strlen($pass) > 20)) {
        $error ["errorPass"] = 'La contraseña debe tener un mínimo de 6 y un máximo de 20 caracteres';
      }
      return $error;
    }

  }
