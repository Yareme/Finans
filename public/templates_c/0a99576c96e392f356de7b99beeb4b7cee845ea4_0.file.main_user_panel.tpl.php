<?php
/* Smarty version 4.1.0, created on 2022-05-23 17:18:59
  from 'C:\xampp\htdocs\finans\app\views\templates\main_user_panel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_628ba5e371e7b4_70559603',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a99576c96e392f356de7b99beeb4b7cee845ea4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\finans\\app\\views\\templates\\main_user_panel.tpl',
      1 => 1653319138,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_628ba5e371e7b4_70559603 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<!doctype html>
<html lang="pl" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo (($tmp = $_smarty_tpl->tpl_vars['page_description']->value ?? null)===null||$tmp==='' ? 'Opis domyślny' ?? null : $tmp);?>
">
    <title><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? "Tytuł domyślny" ?? null : $tmp);?>
</title>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/js/js.js" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css" integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/css/style.css"  type="text/css" crossorigin="anonymous">

</head>
<body>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'main'),$_smarty_tpl ) );?>
">Strona glówna</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link <?php echo (($tmp = $_smarty_tpl->tpl_vars['active1']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" aria-current="page" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'incomeShow','strona'=>"1"),$_smarty_tpl ) );?>
">Dodaj zarobki</a>
                </li>

                <li class="nav-item">
                        <a class="nav-link <?php echo (($tmp = $_smarty_tpl->tpl_vars['active2']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'expensesShow','strona'=>"1"),$_smarty_tpl ) );?>
">Dodaj wydatki</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php echo (($tmp = $_smarty_tpl->tpl_vars['active3']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
 " href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'categoryShow','strona'=>"1"),$_smarty_tpl ) );?>
">Moje kategorie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo (($tmp = $_smarty_tpl->tpl_vars['active4']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
 " href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'aimShow','strona'=>"1"),$_smarty_tpl ) );?>
">Moje cele</a>
                </li>



            </ul>
            <span class="navbar-text">

                <a class="btn"><?php echo (($tmp = $_smarty_tpl->tpl_vars['user']->value->balance ?? null)===null||$tmp==='' ? "0" ?? null : $tmp);?>
</a>

        <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'profileShow'),$_smarty_tpl ) );?>
"class="btn "> <?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
</a>
                        <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'logout'),$_smarty_tpl ) );?>
" class="btn ">Logout</a>

      </span>
        </div>
    </div>
</nav>


<div class="content">
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1458817741628ba5e371dcd1_93718049', 'content');
?>

</div><!-- content -->


</body>
</html><?php }
/* {block 'content'} */
class Block_1458817741628ba5e371dcd1_93718049 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1458817741628ba5e371dcd1_93718049',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
}
