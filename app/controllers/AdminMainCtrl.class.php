<?php

    namespace app\controllers;


    use core\App;
    use core\RoleUtils;
    use core\Validator;

    class AdminMainCtrl{
            private $user;
            private $id;
        public function __construct(){
            App::getSmarty()->assign('page_title','Admin Panel');
        }
        public function action_showAdminPanel(){
            $user=unserialize($_SESSION['user']);
            App::getSmarty()->assign('role',RoleUtils::inRole('user'));
            App::getSmarty()->display('admin_main_panel.tpl');
        }

private $string;
        public function validate(){
            $v= new Validator();
            $this->string = $v->validateFromRequest('search',[
                'trim' => true,
                'required' => true,
            ]);
            if (!$v->isLastOK()){
                App::getMessages()->addMessage('Nie ma takiego użytkownika','notUser');
                return false;
            }else{
                return true;
            }
        }
        public function action_userShow(){

                if ($this->validate()){
                    $this->user = App::getDB()->get("users", [
                        "id_user",
                        "login",
                        "name",
                        "id_family",
                    ],[
                        'login[~]'=>$this->string.'%'
                    ] );


                    App::getSmarty()->assign('role',RoleUtils::inRole('user'));
                    App::getSmarty()->assign('list',$this->user);
                    App::getSmarty()->display('admin_main_panel.tpl');
                }else{
                    App::getSmarty()->assign('role',RoleUtils::inRole('user'));
                    App::getSmarty()->display('admin_main_panel.tpl');
                }

        }
        public function validateToReset(){
            $v= new Validator();

            $this->id=$v->validateFromCleanURL(1,[
            'int' => true,
            'validator_message' => 'Niepoprawna liczba całkowita',
        ]);
        if (!$v->isLastOK()){
            return false;
        }else{
            return true;
        }
        }
        public function action_resetPassword(){
            if ($this->validateToReset()){
                App::getDB()->update('users',[
                    'password'=>123,
                ],[
                    'id_user'=>$this->id,
                ]);
                App::getRouter()->redirectTo('showAdminPanel');
            }else{
                App::getMessages()->addMessage('Wystąpil bląd przy próbie resetu','errReset');
                App::getSmarty()->display('admin_main_panel.tpl');
            }


        }

}