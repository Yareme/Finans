<?php

namespace app\controllers;

use app\forms\RegisterForm;
use app\models\User;
use core\App;
use core\ParamUtils;
use core\RoleUtils;
use core\Validator;
use \core\Messages;
use \core\Message;
use PDOException;
use function Sodium\randombytes_buf;

class RegisterCtrl
{

    private $form;
    private $login;
    private $records;
    private $fameli = false;


    public function __construct()
    {
        //stworzenie potrzebnych obiektów
        $this->form = new RegisterForm();
        App::getSmarty()->assign('page_title', 'Rejestracja');
    }

    public function getParams()
    {
        // 1. pobranie parametrów
        $this->form->name = ParamUtils::getFromRequest('name');
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->password = ParamUtils::getFromRequest('password');
        $this->form->password_repeat = ParamUtils::getFromRequest('password_repeat');
        $this->form->invite_code = ParamUtils::getFromRequest('invite_code');

    }


    public function validate(){
        $v = new Validator();

        $this->form->name = $v->validateFromRequest('name', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Imię jest wymagane',
        ]);

        if (!$v->isLastOK()) {
            App::getMessages()->addMessage( 'Nie podaleś imienia', 'name');
        }
        $this->form->login = $v->validateFromRequest('login', [
            'trim' => true,
            'required' => true,
            'required_message' => 'login jest wymagane',
        ]);
        if (!$v->isLastOK()) {
            App::getMessages()->addMessage( 'Nie wpisaleś loginu', 'login');
        }

        $this->form->password = $v->validateFromRequest('password', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Hasło jest wymagane',
        ]);
        if (!$v->isLastOK()) {
            App::getMessages()->addMessage( 'Nie wpisaleś hasła', 'password');
        }

        $this->form->password_repeat = $v->validateFromRequest('password_repeat', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Powtóż hosło',
        ]);
        if (!$v->isLastOK()) {
            App::getMessages()->addMessage( 'Powtórz hasło', 'password_repeat');
        }


        $this->form->invite_code = $v->validateFromRequest('invite_code', [
            'trim' => true,
        ]);

        if (App::getMessages()->getSize() != 0) {
            return false;
        }

        if ($this->form->password != $this->form->password_repeat) {
            App::getMessages()->addMessage("Hasła nie są takie same", 'password_repeat_right');
            return false;
        }


        if ($this->checkLogin()) {
            return true;
        } else {
            return false;
        }
    }


    public function checkLogin()
    {
        $this->records = App::getDB()->select("users", [
            "login",
        ], [
            "login[=]" => $this->form->login
        ]);

        if ($this->records == null) {
            return true;
        } else {
            App::getMessages()->addMessage("Login jest zajęty", 'login_exist');
            return false;
        }
    }


    public function createFamily(){
        $id_family = 0;
        $random_code_invite = random_int(1, 999999999);
        echo $random_code_invite;

        try {
            App::getDB()->insert("family", [
                "invite_code" => $random_code_invite
            ]);
        } catch (PDOException $e) {
            App::getMessages()->addMessage(new \core\Message("Bląd BD nie wyszło stwozyć rodzine", \core\Message::ERROR));
        }

        try {
            $id_family = App::getDB()->get("family", [
                "id_family"

            ], [
                "invite_code[=]" => $random_code_invite
            ]);


        } catch (PDOException $e) {
            App::getMessages()->addMessage(new \core\Message("Bląd BD", \core\Message::ERROR));

        }
        return $id_family['id_family'];
    }

public function checkInviteCode($invite_code){
    $id_family = App::getDB()->get("family", [
        "id_family"
    ], [
        "invite_code[=]" => $invite_code
    ]);
    if ($id_family==null){
        App::getMessages()->addMessage("Nie poprawny kod", 'invietCode');
        return false;
    }else{
        return true;
    }

}

    public function  createUser($invite_code=null)
    {
        if ($invite_code==null){
            $id_family = $this->createFamily();

            App:: getDB()->insert("users", [
                "login" => $this->form->login,
                "password" => $this->form->password,
                "name" => $this->form->name,
                "id_family" => $id_family
            ]);

        }else{
            $id_family = App::getDB()->get("family", [
                "id_family"
            ], [
                "invite_code[=]" => $invite_code
            ]);
            if ($id_family!=null){
                App:: getDB()->insert("users", [
                    "login" => $this->form->login,
                    "password" => $this->form->password,
                    "name" => $this->form->name,
                    "id_family" => $id_family['id_family'],
                ]);
            }else{
                return false;

            }


        }



        $this->setRole( 'user',$this->form->login);


    }


    public static function setRole($role,$login=null){

        try {
            App:: getDB()->insert("role_user", [
                "id_user" => self::getIdUserFromDb($login),
                "id_role" => App::getDB()->get("role", "id_role",[
                    'role_name'=>$role
                ])
            ]);

        } catch (PDOException $e) {
            App::getMessages()->addMessage(new \core\Message("Bląd BD", \core\Message::ERROR));
        }
    }


    public static function getIdUserFromDb($login){
        try{
            $id = App::getDB()->get("users", [
                "id_user"
            ], [
                "login[=]" => $login
            ]);
        }catch (PDOException $e) {
            App::getMessages()->addMessage(new \core\Message("Bląd BD", \core\Message::ERROR));
        }
        return $id['id_user'];
    }

    public function action_registerShow()
    {

        if (isset($_SESSION['user'])){
            $user=unserialize($_SESSION['user']);
            if (RoleUtils::inRole('admin')){
                App::getRouter()->redirectTo('showAdminPanel');
            }else{
                App::getRouter()->redirectTo('main');
            }
        }
        App::getSmarty()->assign('form', $this->form);
        $this->generateView();
    }

    public function action_register()
    {

        if (isset($_SESSION['user'])){
            $user=unserialize($_SESSION['user']);
            if (RoleUtils::inRole('admin')){
                App::getRouter()->redirectTo('showAdminPanel');
            }else{
                App::getRouter()->redirectTo('main');
            }
        }

        if ($this->validate()) {

            if (isset($this->form->invite_code) && $this->form->invite_code != null) {
                if ($this->checkInviteCode($this->form->invite_code)){
                    $this->createUser($this->form->invite_code);

                    $user = new User($this->form->login, 'user');
                    $_SESSION['user'] = serialize($user);

                    RoleUtils::addRole($user->role);
                    App::getRouter()->redirectTo("main");
                }else{
                    App::getSmarty()->assign('form', $this->form);
                    $this->generateView();
                }

            } else {

                $this->createUser();

                $user = new User($this->form->login, 'user');
                $_SESSION['user'] = serialize($user);

                RoleUtils::addRole($user->role);
                App::getRouter()->redirectTo("main");

            }

        } else {
            App::getSmarty()->assign('form', $this->form);
            $this->generateView();
        }
    }


    public function generateView()
    {
        App::getSmarty()->display('registerV.tpl');
    }
}