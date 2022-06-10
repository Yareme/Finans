<?php

namespace app\controllers;

use app\forms\CategoryForm;
use core\App;
use core\ParamUtils;
use core\Validator;
use PDOException;

class CategoryCtrl{
    private $user;
    private $form;


    public function __construct(){

        $this->form = new CategoryForm();
        App::getSmarty()->assign('page_title','Kategorie');
    }

    public function validate(){
        $v = new Validator();
        $this->form->category_name = $v->validateFromRequest('category_name',[
            'trim' => true,
            'required' => true,
            'required_message' => 'Nie podałeś kategorie',
        ]);
        if (!$v->isLastOK()) {
            App::getMessages()->addMessage("Wpisz nazwe kategorii", 'addCategoryError');
        }


            if (App::getMessages()->getSize() != 0){
            return false;
        }else{
            return true;
        }
    }

    public function validParameterForDelet(){
        $v = new Validator();
        $this->form->id_category = $v->validateFromCleanURL(1, [
            'int' => true,
            'validator_message' => 'Niepoprawna liczba całkowita',
        ]);
        if (!$v->isLastOK()){
            return false;
        }else{
            return true;
        }

    }

    public function action_deleteCategory(){
        if ($this->validParameterForDelet()){
           $in= App::getDB()->select('income',['id_income'],[
                'id_category'=>$this->form->id_category,
            ]);
            $ex= App::getDB()->select('expenses',['id_expenses'],[
                'id_category'=>$this->form->id_category,
            ]);
            if ($in==null&&$ex==null){
                App::getDB()->delete('category',[
                    'id_category'=>$this->form->id_category,
                ]);
                App::getMessages()->addMessage(new \core\Message("Usuniento", \core\Message::INFO));
                App::getRouter()->redirectTo('categoryShow');
            }else{
                $this->user=unserialize($_SESSION['user']) ;
                App::getSmarty()->assign('user',$this->user);
                $this->categoryList(1);
                App::getMessages()->addMessage("Nie można usunąć", 'er');
                App::getSmarty()->assign('strona',1);
                $this->generateView();


            }

        }

    }

    public function categoryList($strona,$string=null){
$max=0;

        $li2=App::getDB()->count('category',[
            '[><]users'=>['id_user'=>'id_user']
        ],
            [
                'id_category',
            ],[

                    'category_name[~]'=>$string.'%',
                    'users.id_user'=>$this->user->id,

            ]
        );

        if ($li2<=5){
            $max=1;
        }else if ($li2%5==0){
            $max =$li2/5;

        }else{
            $max =$li2/5;
        }

       $max=ceil($max) ;

if ($strona>$max ||$strona<=0|| !is_int($strona)){
    App::getRouter()->redirectTo("categoryShow");
}


        /*do{*/
        $s=5*($strona-1);

            $li=App::getDB()->select('category',[
                '[><]users'=>['id_user'=>'id_user']
            ],
                [
                    'id_category',
                    'category_name'
                ],[
                    'ORDER'=>[
                        "id_category"=>"DESC",
                    ],
                    "AND" => [
                        'category_name[~]'=>$string.'%',
                        'users.id_user'=>$this->user->id,
                    ],

                    'LIMIT'=>[$s,5]
                ]
            );





        App::getSmarty()->assign('string',$string);
        App::getSmarty()->assign('strona',$strona);
        App::getSmarty()->assign('max',$max);
        App::getSmarty()->assign('li',$li);
        return $li;
    }

    public function action_categoryShow(){
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
        $this->user->balance=UserMainCtrl::getUserBalance($this->user);
        IncomeCtrl::updateBalance($this->user);
        App::getSmarty()->assign('user',$this->user);
        $this->categoryList($this->strona,$string);

        App::getSmarty()->assign('strona',$this->strona);
        $this->generateView();

    }


    public function action_addCategory(){
        $this->user=unserialize($_SESSION['user']) ;
            if ($this->validate()){

                try{
                    App::getDB()->insert('category',[
                        "category_name"=>$this->form->category_name,
                        "id_user"=>$this->user->id
                    ]);
                 App::getMessages()->addMessage("Kategoria dodana", 'addCategory');
                    $this->user=unserialize($_SESSION['user']) ;

                    App::getSmarty()->assign('user',$this->user);
                    $this->categoryList(1);

                    App::getSmarty()->assign('strona',1);
                    App::getRouter()->redirectTo('categoryShow');

                }catch (PDOException $e){
                    App::getMessages()->addMessage(new \core\Message("wystąpił błąd BD".$e, \core\Message::ERROR));
                }
            }else{
               // App::getRouter()->redirectTo('categoryShow');
                $this->user=unserialize($_SESSION['user']) ;

                App::getSmarty()->assign('user',$this->user);
                $this->categoryList(1);

                App::getSmarty()->assign('strona',1);

               $this->generateView();

            }
            }


    public function generateView(){

        App::getSmarty()->assign('active3','active');
        App::getSmarty()->display('add_category.tpl',);
    }
}

