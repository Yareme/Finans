<?php

namespace app\controllers;


use core\App;
use core\Validator;

class ProfileCtrl {
 private $user;
 private $pass;
 private $newPass;
 private $newPassRepeat;

    public function __construct(){

        App::getSmarty()->assign('page_title','Profil');
    }
public function action_profileShow(){
    App::getSmarty()->assign('f',false);
    $this->generateView();
}
public function action_changePasswordShow(){
    App::getSmarty()->assign('f',true);
    $this->generateView();
}

public function validet(){
    $v=new Validator();
    $this->pass=$v->validateFromRequest('pass',[
        'trim' => true,
        'required' => true,
        'required_message' => 'Nie podałeś kategorie',
    ]);
    if (!$v->isLastOK()) {
        App::getMessages()->addMessage("Podaj dane", 'pass');
    }

    $this->newPass=$v->validateFromRequest('newPass',[
        'trim' => true,
        'required' => true,
        'required_message' => 'Nie podaleś hosło',
    ]);
    if (!$v->isLastOK()) {
        App::getMessages()->addMessage("Podaj dane", 'newPass');
    }

    $this->newPassRepeat=$v->validateFromRequest('newPassRepeat',[
        'trim' => true,
        'required' => true,
        'required_message' => 'Nie podaleś hosło',
    ]);
    if (!$v->isLastOK()) {
        App::getMessages()->addMessage("Podaj dane", 'newPassRepeat');
    }
    if (App::getMessages()->getSize() != 0){
        return false;
    }
    if ($this->pass!=$this->user->password){
        App::getMessages()->addMessage("Nie poprawne hosło", 'passBD');
        return false;
    }
    if ($this->newPass!=$this->newPassRepeat){
        App::getMessages()->addMessage("Hasła nie są równe", 'passRep');
        return false;
    }
    return true;


}

    public function action_changePassword (){
        $this->user=unserialize($_SESSION['user']);
        App::getSmarty()->assign('user',$this->user);
        App::getSmarty()->assign('f',true);
        App::getSmarty()->assign('invite_code',$this->getInviteCode());
   if ($this->validet()){
       App::getDB()->update('users',[
           'password'=>$this->newPass,
       ],[
           'id_user'=>$this->user->id
       ]);
       App::getMessages()->addMessage("Hasło zmienione", 'good');
     $this->generateView();
   }else{
       $this->generateView();
   }

    }


public function getInviteCode(){
   $r= App::getDB()->get('family',[
        '[><]users'=>['id_family'=>'id_family']
    ],
        [
            'invite_code',

        ],[
                'users.id_user'=>$this->user->id,
        ]
    );
    return $r['invite_code'];
}
    public function generateView(){


        $this->user=unserialize($_SESSION['user']);
        App::getSmarty()->assign('user',$this->user);
        App::getSmarty()->assign('invite_code',$this->getInviteCode());
        App::getSmarty()->display('profileV.tpl',);
    }

}