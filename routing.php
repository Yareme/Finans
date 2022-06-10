<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('loginShow'); #default action
App::getRouter()->setLoginRoute('DontHavePrivilegiaShow'); #
#action to forward if no permission
/**********************************/
Utils::addRoute('greetingsView', 'GreetingsCtrl');
Utils::addRoute('DontHavePrivilegiaShow',"DontHavePrivilegiaCtrl");
/**********************************/


/**********************************/
Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('loginShow', 'LoginCtrl');
/**********************************/


/**********************************/
Utils::addRoute('register','RegisterCtrl');
Utils::addRoute('registerShow','RegisterCtrl');
/**********************************/

/**********************************/
Utils::addRoute('logout', 'LoginCtrl');
/**********************************/



/**********************************/
Utils::addRoute('showAdminPanel', 'AdminMainCtrl',['admin']);
Utils::addRoute('resetPassword', 'AdminMainCtrl',['admin']);
Utils::addRoute('userShow', 'AdminMainCtrl',['admin']);
/**********************************/
/**********************************/

Utils::addRoute('main', 'UserMainCtrl',['user']);
/**********************************/




/**********************************/
Utils::addRoute('incomeShow', 'IncomeCtrl',['user']);
Utils::addRoute('addIncome', 'IncomeCtrl',['user']);
Utils::addRoute('deleteIncome', 'IncomeCtrl',['user']);
/**********************************/


/**********************************/
Utils::addRoute('expensesShow', 'ExpensesCtrl',['user']);
Utils::addRoute('addExpenses', 'ExpensesCtrl',['user']);
Utils::addRoute('deleteExpenses', 'ExpensesCtrl',['user']);
/**********************************/


/**********************************/
Utils::addRoute('categoryShow', 'CategoryCtrl',['user']);
Utils::addRoute('addCategory', 'CategoryCtrl',['user']);
Utils::addRoute('deleteCategory', 'CategoryCtrl',['user']);
/**********************************/


/**********************************/
Utils::addRoute('aimShow', 'AimCtrl',['user']);
Utils::addRoute('addAim', 'AimCtrl',['user']);
Utils::addRoute('updateAim', 'AimCtrl',['user']);
Utils::addRoute('moreAim', 'AimCtrl',['user']);
Utils::addRoute('deleteAim', 'AimCtrl',['user']);
/**********************************/
Utils::addRoute('deleteAimReceipt','AimCtrl',['user']);

Utils::addRoute('profileShow','ProfileCtrl',['user']);
Utils::addRoute('changePasswordShow','ProfileCtrl',['user']);
Utils::addRoute('changePassword','ProfileCtrl',['user']);