<?php

class Usuario
{
  protected $idUsuario;
  protected $name;
  protected $nickname;
  protected $country;
  protected $state;
  protected $email;
  protected $password;
  protected $avatar;
  protected $admin;
  protected $active;

  public function __construct($idUsuariox= null, $namex, $nicknamex, $countryx, $statex=null, $emailx, $passwordx, $avatarx, $adminx=null, $activex=null)
  {
    if ($idUsuariox==null) {
      $this->password= password_hash($passwordx, PASSWORD_DEFAULT);
    }else {
      $this->password=$passwordx;
    }

    $this->idUsuario=$idUsuariox;
    $this->name=$namex;
    $this->nickname=$nicknamex;
    $this->country=$countryx;
    $this->state=$statex;
    $this->email=$emailx;
    $this->avatar=$avatarx;
    $this->admin=$adminx;
    $this->active=$activex;
  }

  public function getNombre()
  {
    return $this->name;
  }
  public function getNickname()
  {
    return $this->nickname;
  }
  public function getCountry()
  {
    return $this->country;
  }
  public function getState()
  {
    return $this->state;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function getPassword()
  {
    return $this->password;
  }
  public function getAvatar()
  {
    return $this->avatar;
  }
  public function getAdmin()
  {
    return $this->admin;
  }
  public function getActive()
  {
    return $this->active;
  }

}
