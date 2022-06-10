<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;

/**
 * HelloWorld built in Amelia - sample controller
 *
 * @author Przemysław Kudłacik
 */
class GreetingsCtrl {

public function __construct(){
    App::getSmarty()->assign('page_title', 'Witam');
}
    public function action_greetingsView() {

        App::getSmarty()->display("greetingsV.tpl");
        
    }
    
}
