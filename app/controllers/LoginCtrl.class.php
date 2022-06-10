<?php

namespace app\controllers;


use core\App;
use core\ParamUtils;
use core\RoleUtils;
use app\models\User;
use app\forms\LoginForm;
use core\Validator;

class LoginCtrl
{
    private $form;
    private $records;
    private $id_user;

    public function __construct(){
        $this->form = new LoginForm();
        App::getSmarty()->assign('page_title', 'Logowanie');
    }

    public function getParams(){
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->password = ParamUtils::getFromRequest('password');
    }

    public function checkUser(){
        $v=new Validator();
        $this->form->login=$v->validateFromRequest('login',[
            'trim' => true,
            'required' => true,
            'required_message' => 'Nie podałeś co kupiłeś',

        ]);
        if (!$v->isLastOK()) {
            App::getMessages()->addMessage("Podaj login", 'login');
        }
        $this->form->password=$v->validateFromRequest('password',[
            'trim' => true,
            'required' => true,
            'required_message' => 'Nie podałeś co kupiłeś',

        ]);
        if (!$v->isLastOK()) {
            App::getMessages()->addMessage("Podaj hasło", 'password');
        }
        $this->records = App::getDB()->get("users", [
            "id_user",
            "login",
            "password",
        ], [
            "login[=]" => $this->form->login,
            "password[=]" => $this->form->password
        ]);


        if ($this->records == null) {
            App::getMessages()->addMessage("Nie poprawny login  lub hasło ", 'errLogin');
            return false;
        } else {
            $this->id_user = $this->records['id_user'];
            return true;
        }

    }

    public function getRoleUser(){
        $role=array();
        $k = App::getDB()->select("role", [
            "[><]role_user" => ['id_role' => 'id_role']
        ], [
            "role_name"
        ], [
                "id_user" => $this->id_user
            ]
        );

        $i = 0;
        foreach ($k as $p) {
            $role[$i] = $p['role_name'];
            $i++;
        }
        return $role;

    }


    public function action_loginShow(){

        if (isset($_SESSION['user'])){
            $user=unserialize($_SESSION['user']);
            if (RoleUtils::inRole('admin')){
                App::getRouter()->redirectTo('showAdminPanel');
            }else{
                App::getRouter()->redirectTo('main');
            }
        }
        if (RoleUtils::inRole("admin")||RoleUtils::inRole("user")){
            if (RoleUtils::inRole('admin')) {
                App::getRouter()->redirectTo("showAdminPanel");
            } else {
                App::getRouter()->redirectTo("main");
            }
        }
        App::getSmarty()->assign('form',$this->form);
        $this->generateView();
    }


    public function action_login(){

        if (isset($_SESSION['user'])){
            $user=unserialize($_SESSION['user']);
            if (RoleUtils::inRole('admin')){
                App::getRouter()->redirectTo('showAdminPanel');
            }else{
                App::getRouter()->redirectTo('main');
            }
        }
        $this->getParams();
        if ($this->checkUser()) {

            $user = new User($this->form->login, $this->getRoleUser());
            $_SESSION['user'] = serialize($user);
            for ($i = 0; $i < count($this->getRoleUser()); $i++) {
                RoleUtils::addRole($user->role[$i]);
            }
            if (RoleUtils::inRole('admin')) {
                App::getRouter()->redirectTo("showAdminPanel");
            } else {
                App::getRouter()->redirectTo("main");
            }
        }else{
            App::getSmarty()->assign('form',$this->form);
            $this->generateView();
        }

    }

    public function action_logout()
    {
        App::getSmarty()->assign('form',$this->form);
       session_unset();
        session_destroy();
        $this->generateView();
    }


    public function generateView()
    {

        App::getSmarty()->display('loginV.tpl');
    }

}