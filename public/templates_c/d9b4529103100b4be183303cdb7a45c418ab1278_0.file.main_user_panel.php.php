<?php
/* Smarty version 4.1.0, created on 2022-04-28 18:37:58
  from 'C:\xampp\htdocs\finans\app\views\templates\main_user_panel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_626ac2e6364125_13739051',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9b4529103100b4be183303cdb7a45c418ab1278' => 
    array (
      0 => 'C:\\xampp\\htdocs\\finans\\app\\views\\templates\\main_user_panel.tpl',
      1 => 1651163876,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_626ac2e6364125_13739051 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
echo '<?php'; ?>
 use core\RoleUtils;

<?php echo '?>'; ?>


<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo (($tmp = $_smarty_tpl->tpl_vars['page_description']->value ?? null)===null||$tmp==='' ? 'Opis domyślny' ?? null : $tmp);?>
">
    <title><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? "Tytuł domyślny" ?? null : $tmp);?>
</title>
    <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css" integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/css/style.css">
</head>
<body>

<H1 class="p">User panel</H1>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'main'),$_smarty_tpl ) );?>
">Strona glwna</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
<?php if (RoleUtils::inRole("admin")) {?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'admin'),$_smarty_tpl ) );?>
">Admin Panel</a>
                </li>
<?php }?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'income'),$_smarty_tpl ) );?>
">Dodaj Zarobki</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'expenses'),$_smarty_tpl ) );?>
">Dodaj Wydatki</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>''),$_smarty_tpl ) );?>
">Moje kategorie</a>
                </li>

            </ul>
            <span class="navbar-text">

                <a class="btn"><?php echo (($tmp = $_smarty_tpl->tpl_vars['user']->value->balance ?? null)===null||$tmp==='' ? "0" ?? null : $tmp);?>
</a>

        <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>''),$_smarty_tpl ) );?>
"class="btn "> <?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
</a>
                        <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'logout'),$_smarty_tpl ) );?>
"class="btn ">Logout</a>

      </span>
        </div>
    </div>
</nav>

<div class="content">
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1416153212626ac2e63635e7_03652860', 'content');
?>

</div><!-- content -->


</body>
</html><?php }
/* {block 'content'} */
class Block_1416153212626ac2e63635e7_03652860 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1416153212626ac2e63635e7_03652860',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
}
