<?php
namespace app\models;

class User{
    public $id;
    public $login;
    public $role;
    public $name;
    public $password;
    public $balance;
    public $id_family;


    public function  __construct($login, $role  ){
        $this->login = $login;
        $this->role = $role;

    }
}