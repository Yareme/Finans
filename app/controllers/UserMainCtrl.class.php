<?php

namespace app\controllers;

use core\App;

class   UserMainCtrl
{
    private $records;
    private $user;
public function __construct(){
    App::getSmarty()->assign('page_title', 'Moja aplikacja');
}
    public  function action_main(){
        $this->user=unserialize($_SESSION['user']) ;
       $this->user=$this->getUser($this->user);
       $this->user->balance=$this->getUserBalance($this->user);

        $_SESSION['user']=serialize($this->user);
        App::getSmarty()->assign('user',$this->user);
        App::getSmarty()->assign('expenses',$this->getExpenses());
        App::getSmarty()->assign('income',$this->getIncome());


        App::getSmarty()->display('user_main_panel.tpl');


    }

public function getExpenses(){
    return intval(App::getDB()->sum('expenses','price',[
        'id_user'=>$this->user->id
    ]))+intval(App::getDB()->sum('receipts','receipt',[
        'id_user'=>$this->user->id
    ]));
}
public function getIncome(){
    return  intval(App::getDB()->sum('income','income',[
        'id_user'=>$this->user->id
    ]));
}


public static function getUserBalance($user){

   return $user->balance= intval(App::getDB()->sum('income','income',[
        'id_user'=>$user->id
    ]))-intval(App::getDB()->sum('expenses','price',[
           'id_user'=>$user->id
       ]))-intval(App::getDB()->sum('receipts','receipt',[
           'id_user'=>$user->id
           ]));


}

    public static function getUser($user){
        $r = App::getDB()->get("users","*",[
            "login[=]"=> $user->login
        ]);
        $user->id=$r['id_user'];
        $user->name=$r['name'];
        $user->password=$r['password'];
        $user->balance=$r['balance'];
        $user->id_family=$r['id_family'];

        return $user;
    }
}