<?php
namespace app\controllers;

use app\forms\AimForm;
use core\App;
use core\ParamUtils;
use core\Validator;

class AimCtrl{
    private $user;
    private $form;
    private $strona;
     public function __construct(){
            $this->form=new AimForm();
         App::getSmarty()->assign('page_title','Celi');
        }

        /**Запрашивает все цели  пользывателя и его "семьи" **/

public function viewAim($strona,$string=null){

    $max=0;

   $li2=App::getDB()->count('aim',[
       'id_aim',

   ],[

       "AND"=>[
           'id_family'=>$this->user->id_family,
           'text_aim[~]'=>$string.'%'
       ],



   ]);


    if ($li2<=5){
        $max=1;
    }else if ($li2%5==0){
        $max =$li2/5;

    }else{
        $max =$li2/5;
    }

    $max=ceil($max) ;

    if ($strona>$max ||$strona<=0|| !is_int($strona)){
        App::getRouter()->redirectTo("aimShow");
    }

    $s=5*($strona-1);
    $records=App::getDB()->select('aim',[
        'id_aim',
        'text_aim',
        'price_aim',
        'owned',
        'id_user',
    ],[
        'ORDER'=>[
            "id_aim"=>"DESC",
        ],
        "AND"=>[
            'id_family'=>$this->user->id_family,
            'text_aim[~]'=>$string.'%'
        ],

        'LIMIT'=>[$s,5]

    ]);

    App::getSmarty()->assign('strona',$strona);
    App::getSmarty()->assign('max',$max);
    App::getSmarty()->assign('string',$string);
    App::getSmarty()->assign('li',$records);
}

/**Показывает форму добавления цели и цели которые уже добавлены**/
    public function action_aimShow(){
        $this->user=unserialize($_SESSION['user']) ;
        $v = new Validator();
        $this->strona = $v->validateFromCleanURL(1, [
            'int' => true,
            'validator_message' => 'Niepoprawna liczba całkowita',
        ]);

        if ($this->strona<=0|| !is_numeric($this->strona)){
            $this->strona=1;
        }

        $string=[];
        $string = $v->validateFromRequest('search',[
            'trim' => true,
        ]);


        $par = $v->validateFromCleanURL(2, [
            'trim' => true,
        ]);
        if(isset($par)&& $par!=null){
            $string=$par;
        }

        $this->viewAim($this->strona,$string);
        $this->user->balance=UserMainCtrl::getUserBalance($this->user);
        IncomeCtrl::updateBalance($this->user);
        App::getSmarty()->assign('strona',$this->strona);
        App::getSmarty()->assign('form',$this->form);
        App::getSmarty()->assign('user',$this->user);
        $_SESSION['user']=serialize($this->user);


/*Вызывает widok*/
        $this->generateView();
       // App::getSmarty()->display('add_aim.tpl');
    }


    /*Проверяет данные из формы для добавления receipts */
    public function validAddUpdate(){
        $v = new Validator();
/*проверяет param=$p['id_aim']*/
        $this->form->id_aim = $v->validateFromCleanURL(1, [
            'int' => true,
            'validator_message' => 'Niepoprawny id',
        ]);


        $this->form->owned_form = $v->validateFromRequest('owned_form',[
            'trim' => true,
            'required' => true,
            'required_message' => 'Nie podałeś ile trzeba',
            'int'=> true,
            'min'=> 1,
            'validator_message' => 'Nie calkowita',

        ]);

        if (App::getMessages()->getSize()!=0){
            return false;
        }else{
            return true;
        }
    }


/**создаёт новые рекорд в таблице receipts  "sum" => то что вписал пользователь в инпуте*/
/**id_aim -> по идеи должно прийти с param=$p['id_aim'] но с модальным окном не работает*/
/**Не знаю как правильно передать id_aim через модальное окно*/


    public function action_updateAim(){

        $this->user=unserialize($_SESSION['user']) ;

        if ($this->validAddUpdate()){
            $this->form->owned=$this->getOwned();
            $this->form->owned_form=intval($this->form->owned_form);
            $o=$this->form->owned+$this->form->owned_form;
            App::getDB()->insert('receipts',[
                'receipt'=>$this->form->owned_form,
                'id_user'=>$this->user->id,
                'id_aim'=>$this->form->id_aim,
                'id_family'=>$this->user->id_family
            ]);

            App::getDB()->update('aim',[
                'owned'=>App::getDB()->sum('receipts','receipt',[
                    'id_aim'=>$this->form->id_aim
                ])
            ],[
                'id_aim'=>$this->form->id_aim
            ]);
            App::getRouter()->redirectTo("aimShow");
        }
        App::getSmarty()->assign('user',$this->user);
        App::getSmarty()->assign('strona',1);
        App::getSmarty()->assign('form',$this->form);
        $this->viewAim(1);
        $this->generateView();
    }


                /** Скорее всего не приготся**/
/************************************************************/
        public function validate(){
        $v = new Validator();
        $this->form->text_aim = $v->validateFromRequest('text_aim',[
            'trim' => true,
            'required' => true,
            'required_message' => 'Nie podałeś opis',

        ]);
        if (!$v->isLastOK()){
            App::getMessages()->addMessage('Nie podaleś opis', 'text_aim');
        }
        $this->form->price_aim = $v->validateFromRequest('price_aim',[
            'trim' => true,
            'required' => true,
            'required_message' => 'Nie podałeś ile trzeba',
            'int'=> true,
            'min'=> 1,
            'validator_message' => 'Nie calkowita',

        ]);
            if (!$v->isLastOK()){
                App::getMessages()->addMessage('Nie podaleś kwote', 'price_aim');
            }

        if (App::getMessages()->getSize()!=0){
            return false;
        }else{
            return true;
        }
    }
        public function action_addAim(){
            $this->user=unserialize($_SESSION['user']) ;
                if ($this->validate()){
                    App::getDB()->insert('aim',[
                         "text_aim"=>$this->form->text_aim,
                         "price_aim"=>$this->form->price_aim,
                         "id_user"=>$this->user->id,
                        "id_family"=>$this->user->id_family
                    ]);
                    App::getRouter()->redirectTo("aimShow");
                }else{
                    App::getSmarty()->assign('user',$this->user);
                    App::getSmarty()->assign('form',$this->form);
                    App::getSmarty()->assign('strona',1);
                    $this->viewAim(1);
                    $this->generateView();
                }

        }



        public function getOwned(){
            $this->user=unserialize($_SESSION['user']) ;

             $r=App::getDB()->get('aim',[
                        'owned'
                    ],[
                        'id_aim'=>$this->form->id_aim
                    ]);
            return $r['owned'];
        }





    public function validParameter(){
        $v = new Validator();
        $this->form->id_aim = $v->validateFromCleanURL(1, [
            'int' => true,
            'validator_message' => 'Niepoprawna liczba całkowita',
        ]);
        if (App::getMessages()->getSize()!=0){
            return false;
        }

        $this->strona = $v->validateFromCleanURL(2, [
            'int' => true,
            'validator_message' => 'Niepoprawna liczba całkowita',
        ]);
        if (App::getMessages()->getSize()!=0){
            $this->strona=1;
            return true;
        }else{
            return true;
        }

    }


    public function action_deleteAimReceipt(){
        $v = new Validator();
        $this->user=unserialize($_SESSION['user']) ;
        $strona=$v->validateFromCleanURL(3, [
            'int' => true,
            'validator_message' => 'Niepoprawna liczba całkowita',
        ]);
        $id_receipt=$v->validateFromCleanURL(2, [
            'int' => true,
            'validator_message' => 'Niepoprawna liczba całkowita',
        ]);
        $id_aim=$v->validateFromCleanURL(1, [
            'int' => true,
            'validator_message' => 'Niepoprawna liczba całkowita',
        ]);

        App::getDB()->delete('receipts',[
            'id_receipt'=>$id_receipt
        ]);

        App::getDB()->update('aim',[
            'owned'=>App::getDB()->sum('receipts','receipt',[
                'id_aim'=>$id_aim
            ])
        ],[
            'id_aim'=>$id_aim
        ]);

        App::getRouter()->redirectTo('moreAim/'.$id_aim.'/'.$strona);
    }

    public function moreAimView($strona,$id_aim,$string=null){
        $max=0;
        $li2=App::getDB()->count('receipts',[
            '[><]users'=>['id_user'=>'id_user']
        ],[
            'id_receipt',
        ],[
            "AND"=>[
                'receipts.id_aim'=>$this->form->id_aim,
                'name[~]'=>$string."%",
            ],

        ]);
        if ($li2<=5){
            $max=1;
        }else if ($li2%5==0){
            $max =$li2/5;

        }else{
            $max =$li2/5;
        }

        $max=ceil($max) ;
        $s=5*($strona-1);
        if ($this->strona>$max ||$this->strona<=0|| !is_int($this->strona)){
            App::getRouter()->redirectTo("moreAim/".$id_aim);
        }

        $records=App::getDB()->select('receipts',[
            '[><]users'=>['id_user'=>'id_user']
        ],[
            'receipts.id_user',
            'id_receipt',
            'receipt',
            'name',
            'date',

        ],[
            'ORDER'=>[
                "receipts.id_receipt"=>"DESC",
            ],
            "AND"=>[
                'receipts.id_aim'=>$this->form->id_aim,
                'name[~]'=>$string."%",
            ],

            'LIMIT'=>[$s,5]

        ]);
        App::getSmarty()->assign('string',$string);
        App::getSmarty()->assign('strona',$strona);
        App::getSmarty()->assign('max',$max);
        App::getSmarty()->assign('li',$records);
        return $records;
    }

        public function action_moreAim(){
            $this->user=unserialize($_SESSION['user']);

            if ($this->validParameter()){
                $v = new Validator();
               $r=App::getDB()->get('aim',["text_aim"],[
                    'id_aim'=>$this->form->id_aim
                ]);
                $text_aim=$r['text_aim'];

                if ($this->strona<=0|| !is_numeric($this->strona)){
                    $this->strona=1;
                }
                $s=5*($this->strona-1);

                $string=[];
                $string = $v->validateFromRequest('search',[
                    'trim' => true,
                ]);



                $par = $v->validateFromCleanURL(3, [
                    'trim' => true,
                ]);
                if(isset($par)&& $par!=null){
                    $string=$par;
                }

                $this->moreAimView($this->strona,$this->form->id_aim,$string);

                $this->user->balance=UserMainCtrl::getUserBalance($this->user);
                IncomeCtrl::updateBalance($this->user);
                App::getSmarty()->assign('string',$string);

                App::getSmarty()->assign('id',$this->form->id_aim);
                App::getSmarty()->assign('strona',$this->strona);
                App::getSmarty()->assign('text_aim',$text_aim);


            }



            App::getSmarty()->assign('user',$this->user);
            App::getSmarty()->assign('active4','active');
         App::getSmarty()->display('moreAim.tpl');
        }
        public function action_deleteAim(){
            if ($this->validParameter()){
                App::getDB()->delete('aim',[
                    'id_aim'=>$this->form->id_aim,

                ]);

                App::getDB()->delete('receipts',[
                    'id_aim'=>$this->form->id_aim,
                ]);
            }
            App::getRouter()->redirectTo('aimShow');
        }
        public function generateView(){
            App::getSmarty()->assign('active4','active');
        App::getSmarty()->display('add_aim.tpl');
    }
    /************************************************************/
}



