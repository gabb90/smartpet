<?php

  require_once 'autoload.php';
  $auth->logout();
  header("Location: home.php");
