<?php

  class Auth
  {

    public function __construct()// -crear constructor con session_start() y chequear que si esta la cookie de logueado, usarla como session
    {
      session_start();
      if (isset($_COOKIE["email"])) {
        $_SESSION["email"] = $_COOKIE["email"];
      }

    }
    public function loguear($email)// variable session con el email del parametro
    {
      $_SESSION["email"] = $email;

    }
    public function estaLogueado()// fijarse si esta seteado  la variable de sesion
    {
      return isset($_SESSION["email"]) || isset($_COOKIE["email"]);

    }
    public function usuarioLogueado($conn)// que recibe una db. Preguntar si estaLogueado y devolver el objeto usuario con el traerPorEmail del db usando el email de sesion, sino devolver NULL
    {
      if ($this->estaLogueado()) {
        return $conn->traerPorEmail($_SESSION["email"]);
      }else {
        return NULL;
      }
    }
    public function logout()// para session y cookies
    {
      setcookie("email", null, time()-1);
      session_destroy();
    }
    public function recordarme($email)// que recibe un email y setea la cookie
    {
      setcookie("email", $email, time() + 60*60*24*365);
    }

  }
