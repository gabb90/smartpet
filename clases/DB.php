<?php

class DB
{
  private $dsn = "mysql:host=localhost; dbname=smartpet; charset=utf8mb4; port=3306";
  private $usuario = "root";
  private $pass = "";
  private $opt=[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];
  private $conn;

  function __construct()
  {
    try {
      $this->conn=new PDO($this->dsn, $this->usuario, $this->pass,$this->opt);
    } catch (Exception $e) {
      echo "Error en la conexion a la base de datos.";
    }
  }

  public function guardarUsuario(Usuario $usuario){

    //$stmt = $this->conn->prepare("INSERT INTO users (fullname, nickname, country, email, password, avatar, activo) VALUES (:fullname, :nickname, :country, :email, :password, :avatar, 1)");
    $stmt = $this->conn->prepare("
    INSERT INTO users (name, nickname, country, state, email, password, avatar)
    VALUES (:name, :nickname, :country, :state, :email, :password, :avatar)
    ");

    $stmt->bindValue(":name",$usuario->getNombre());
    $stmt->bindValue(":nickname",$usuario->getNickname());
    $stmt->bindValue(":country",$usuario->getCountry());
    $stmt->bindValue(":state",$usuario->getState());
    $stmt->bindValue(":email",$usuario->getEmail());
    $stmt->bindValue(":password",$usuario->getPassword());
    $stmt->bindValue(":avatar",$usuario->getAvatar());

    $stmt->execute();

  //  $idUsuario = $this->conn->lastInsertId();
  //  $usuario->setId($idUsuario);


    return $usuario;
  }

  public function traerTodo(){
    $stmt = $this->conn->prepare("SELECT * FROM users");

    $stmt->execute();

    $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);

    foreach ($resultados as $cadaUsuario) {
      $usuarios[] = new Usuario(
        $cadaUsuario->idUsuario,
        $cadaUsuario->name,
        $cadaUsuario->nickname,
        $cadaUsuario->country,
        $cadaUsuario->email,
        $cadaUsuario->password,
        $cadaUsuario->avatar,
        $cadaUsuario->active);
    }
    return $usuarios;
  }

  public function traerPorEmail($email) {
    $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email" );

    $stmt->bindValue(":email",$email);

    $stmt-> execute();

    $resultados = $stmt->fetch(PDO::FETCH_ASSOC);

    // var_dump($resultados);

    if ($resultados){
      return new Usuario(
        $resultados['id'],
        $resultados['name'],
        $resultados['nickname'],
        $resultados['country'],
        $resultados['state'],
        $resultados['email'],
        $resultados['password'],
        $resultados['avatar'],
        $resultados['admin'],
        $resultados['active']);

    }else{
      return null;
    }
  }

  public function traerUsuario($user, $pass)
  {
    $stmt = $this->conn->prepare("SELECT * FROM users WHERE user = :user AND password = :pass" );

    $stmt->bindValue(":email", $email, PDO::PARAM_STR);
    $stmt->bindValue(":pass", $pass, PDO::PARAM_STR);

    $stmt-> execute();

    $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($resultados){
      return new Usuario(
        $resultados['idUsuario'],
        $resultados['name'],
        $resultados['nickname'],
        $resultados['country'],
        $resultados['email'],
        $resultados['password'],
        $resultados['avatar'],
        $resultados['active']);

    }else{
      return false;
    }
  }
}
