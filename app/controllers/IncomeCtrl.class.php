<?php
namespace app\controllers;
use app\forms\IncomeForm;
use core\App;
use core\ParamUtils;
use core\Validator;

class IncomeCtrl{
    private $user;
    private $form;
    public $strona;
    public function __construct()
    {
        $this->form=new IncomeForm();
        App::getSmarty()->assign('page_title', 'Dochód');
    }
    public function validate(){
        $v = new Validator();

        $this->form->income = $v->validateFromRequest('income',[
            'trim' => true,
            'required' => true,
            'required_message' => 'Nie podałeś kwote',
            'float' => true,
            'validator_message' => 'Nie liczba',
        ]);
        if (!$v->isLastOK()) {
            App::getMessages()->addMessage( 'Nie wpisaleś zarobki', 'income');
        }

        $this->form->category_name = $v->validateFromRequest('category_name',[
            'trim' => true,
            'required' => true,
            'required_message' => 'Nie',
        ]);
        if (!$v->isLastOK()) {
            App::getMessages()->addMessage( 'Nie podaleś categorie', 'category');
        }

        if (App::getMessages()->getSize()!=0){
            return false;
        }else{
            return true;
        }
    }



    public function viewIncome($strona,$string=null){


        $max=0;
        $li2=App::getDB()->count('income',[
            '[><]category'=>['id_category'=>'id_category']
        ],[
            'id_income',
        ],[
                'category_name[~]'=>$string.'%',
                "income.id_user"=>$this->user->id,

        ]);
        if ($li2<=5){
            $max=1;
        }else if ($li2%5==0){
            $max =$li2/5;

        }else{
            $max =$li2/5;
        }

        $max=ceil($max) ;

        if ($strona>$max ||$strona<=0|| !is_numeric($strona) || !is_int($strona)){
            App::getRouter()->redirectTo("incomeShow/1");
        }



        $s=5*($strona-1);
        $records=App::getDB()->select('income',[
            '[><]category'=>['id_category'=>'id_category']
        ],[
            'id_income',
            'income',
            'date',
            'category_name'
        ],[
            'ORDER'=>[
                "id_income"=>"DESC",
            ],
            "AND" => [
                'category_name[~]'=>$string.'%',
                "income.id_user"=>$this->user->id,
            ],
            'LIMIT'=>[$s,5]
        ]);

        App::getSmarty()->assign('strona',$strona);
        App::getSmarty()->assign('max',$max);
        App::getSmarty()->assign('string',$string);
        App::getSmarty()->assign('incomeList',$records);
        return $records;
    }

    public function action_incomeShow(){
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
        $s=5*($this->strona-1);




        $this->viewIncome($this->strona,$string);
        $this->user->balance=UserMainCtrl::getUserBalance($this->user);
        $this->updateBalance($this->user);

        App::getSmarty()->assign('user',$this->user);
        App::getSmarty()->assign('strona',$this->strona);
        App::getSmarty()->assign('form',$this->form);
        App::getSmarty()->assign('list',$this->getListCategory());
        App::getSmarty()->assign('active1','active');
        App::getSmarty()->display('add_Income.tpl');
    }


        public function validPa(){
            $v = new Validator();
            $this->form->id_income = $v->validateFromCleanURL(1, [
                'int' => true,
                'validator_message' => 'Niepoprawna liczba całkowita',
            ]);
            if (App::getMessages()->getSize()!=0){
                return false;
            }else{
                return true;
            }

        }



    public function action_deleteIncome(){


            if ($this->validPa()){
                App::getDB()->delete('income',[
                    'id_income'=>$this->form->id_income

                ]);
            }



        App::getRouter()->redirectTo('incomeShow');




    }

    public static function updateBalance($user){

        App::getDB()->update('users',[
           'balance'=>  UserMainCtrl::getUserBalance($user)
        ],[
            "id_user"=>$user->id
        ]);
    }



    public function action_addIncome(){
        $this->user=unserialize($_SESSION['user']) ;

        if ($this->validate()){

            $id_category=App::getDB()->get('category',[
                '[><]users'=>['id_user'=>'id_user']
            ],[
                'id_category'
            ],[
                "AND"=>[
                    'users.id_user'=>$this->user->id,
                    'category_name'=>$this->form->category_name
                ]

            ]);

            App::getDB()->insert('income',[
                'id_user'=>$this->user->id,
                'income'=>$this->form->income,
                'id_category'=>$id_category['id_category']
                ]);

           App::getRouter()->redirectTo("incomeShow");

        }else{
            App::getSmarty()->assign('user',$this->user);
            App::getSmarty()->assign('form',$this->form);
            App::getSmarty()->assign('strona',1);
            App::getSmarty()->assign('list',$this->getListCategory());
            $this->viewIncome(1);
            App::getSmarty()->assign('active1','active');
            App::getSmarty()->display('add_Income.tpl');

        }




    }

    public function getListCategory(){
        $list=App::getDB()->select('category',[
            '[><]users'=>['id_user'=>'id_user']
        ],
            [
                'category_name'
            ],[
                'users.id_user'=>$this->user->id
            ]
        );
        return $list;


    }
}
