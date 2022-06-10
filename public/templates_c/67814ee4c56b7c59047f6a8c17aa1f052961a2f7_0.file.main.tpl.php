<?php
/* Smarty version 4.1.0, created on 2022-04-28 20:02:44
  from 'C:\xampp\htdocs\finans\app\views\templates\RegisterLoginTemplates.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_626ad6c4e402f2_20151451',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '67814ee4c56b7c59047f6a8c17aa1f052961a2f7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\finans\\app\\views\\templates\\RegisterLoginTemplates.tpl',
      1 => 1651168963,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_626ad6c4e402f2_20151451 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
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
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/public/css/style.css">
</head>
<body>

<div class="content">
dftfg
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_961147212626ad6c4e3f676_49713063', 'content');
?>

</div><!-- content -->


</body>
</html><?php }
/* {block 'content'} */
class Block_961147212626ad6c4e3f676_49713063 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_961147212626ad6c4e3f676_49713063',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
}
