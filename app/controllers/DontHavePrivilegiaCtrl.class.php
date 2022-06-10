<?php
namespace app\controllers;

use core\App;

class DontHavePrivilegiaCtrl{
    public function __construct(){
        App::getSmarty()->assign('page_title', 'Brak uprawnień');
    }
    public function action_DontHavePrivilegiaShow(){
        App::getSmarty()->display('DontHavePrivilegia.html');
    }

}
