<?php
namespace app\controllers;

use app\forms\ExpensesForm;
use core\App;
use core\RoleUtils;
use core\Validator;

class ExpensesCtrl{
        private $user;
        private $form;

        public function __construct(){
            $this->form=new ExpensesForm();
            App::getSmarty()->assign('page_title', 'Wydatki');
        }


        public function validate(){
            $v = new Validator();
            $this->form->item = $v->validateFromRequest('name_item',[
                'trim' => true,
                'required' => true,
                'required_message' => 'Nie podałeś co kupiłeś',

            ]);
            if (!$v->isLastOK()) {
                App::getMessages()->addMessage("Wpisz nazwe towaru", 'item');
            }
            $this->form->quantity = $v->validateFromRequest('quantity',[
                'trim' => true,
                'required' => true,
                'required_message' => 'Nie podałeś ilość',
                'int'=> true,
                'validator_message' => 'Nie calkowita',

            ]);
            if (!$v->isLastOK()) {
                App::getMessages()->addMessage("Nie podałeś ilość", 'quantily');
            }
            $this->form->price = $v->validateFromRequest('price',[
                'trim' => true,
                'required' => true,
                'required_message' => 'Nie podałeś ilość',
                'float'=> true,
                'validator_message' => 'Nie poprawna wartość',

            ]);

            if (!$v->isLastOK()) {
                App::getMessages()->addMessage("Nie podałeś kwote", 'price');
            }

            $this->form->date = $v->validateFromRequest('date',[
                'trim' => true,
                'date_format' => 'Y-m-d'
            ]);

            if (!$v->isLastOK()) {
                App::getMessages()->addMessage("Nie podałeś date", 'date');
            }

            $this->form->category_name = $v->validateFromRequest('category_name',[
                'trim' => true,
                'required' => true,
                'required_message' => 'Nie',
            ]);
            if (!$v->isLastOK()) {
                App::getMessages()->addMessage("Nie podałeś categorie", 'category');
            }

            if (App::getMessages()->getSize()!=0){
                return false;
            }else{
                return true;
            }
        }

    public function viewExpenses($strona,$string=null){

$li2=App::getDB()->count('expenses',[
    '[><]category'=>['id_category'=>'id_category']
],[
    'id_expenses',

],[
    "AND" => [
        'name_item[~]'=>$string.'%',
        'expenses.id_user'=>$this->user->id,
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
            App::getRouter()->redirectTo("expensesShow");
        }
           $s=5*($strona-1);
           $records=App::getDB()->select('expenses',[
               '[><]category'=>['id_category'=>'id_category']
           ],[
               'id_expenses',
               'name_item',
               'quantity',
               'date',
               'price',

               'category_name'
           ],[
               'ORDER'=>[
                   "id_expenses"=>"DESC",
               ],
               "AND" => [
                   'name_item[~]'=>$string.'%',
                   'expenses.id_user'=>$this->user->id,
               ],

               'LIMIT'=>[$s,5]

           ]);

        App::getSmarty()->assign('strona',$strona);
        App::getSmarty()->assign('max',$max);
        App::getSmarty()->assign('string',$string);
        App::getSmarty()->assign('li',$records);
        }


    public function action_expensesShow(){
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


        $this->viewExpenses($this->strona,$string);
        $this->user->balance=UserMainCtrl::getUserBalance($this->user);
        IncomeCtrl::updateBalance($this->user);
        App::getSmarty()->assign('strona',$this->strona);
        App::getSmarty()->assign('list',$this->getListCategory());
        App::getSmarty()->assign('user',$this->user);
        $this->generateView();
       // App::getSmarty()->display('add_expenses.tpl');
    }




    public function action_addExpenses(){
        $this->user=unserialize($_SESSION['user']) ;
        if($this->validate()){

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

            App::getDB()->insert('expenses',[
                'id_user'=>$this->user->id,
                'name_item'=>$this->form->item,
                'price'=>$this->form->price,
                'quantity'=>$this->form->quantity,
                'id_category'=>$id_category['id_category'],
                'date'=>$this->form->date->format('Y-m-d'),
            ]);

            App::getRouter()->redirectTo("expensesShow");
        }else{
            App::getSmarty()->assign('user',$this->user);
            App::getSmarty()->assign('form',$this->form);
            App::getSmarty()->assign('strona',1);
            $this->viewExpenses(1);
            App::getSmarty()->assign('list',$this->getListCategory());
            $this->generateView();
        }
//

    }


    public function validParameterForDelet(){
        $v = new Validator();
        $this->form->id_expenses = $v->validateFromCleanURL(1, [
            'int' => true,
            'validator_message' => 'Niepoprawna liczba całkowita',
        ]);
        if (App::getMessages()->getSize()!=0){
            return false;
        }else{
            return true;
        }

    }


public function action_deleteExpenses(){
    if ($this->validParameterForDelet()){
        App::getDB()->delete('expenses',[
            'id_expenses'=>$this->form->id_expenses,
        ]);
    }
    App::getRouter()->redirectTo('expensesShow');
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

    public function generateView(){
        App::getSmarty()->assign('active2','active');
        App::getSmarty()->display('add_expenses.tpl');
    }
}


