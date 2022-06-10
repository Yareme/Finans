<?php
/* Smarty version 4.1.0, created on 2022-04-29 19:32:46
  from 'C:\xampp\htdocs\finans\app\views\greetingsV.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_626c213e1efd82_25512359',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee24d81231ad9be3822442ca397e10bb2965f3af' => 
    array (
      0 => 'C:\\xampp\\htdocs\\finans\\app\\views\\greetingsV.tpl',
      1 => 1651253320,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_626c213e1efd82_25512359 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1446716126626c213e1eab13_85637781', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "RegisterLoginTemplates.tpl");
}
/* {block 'content'} */
class Block_1446716126626c213e1eab13_85637781 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1446716126626c213e1eab13_85637781',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h1>Witam w mojej aplikacje</h1>
<h2>Teraz możesz się zalogować lub założyć konto</h2>
	<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'loginShow'),$_smarty_tpl ) );?>
" class="pure-button pure-button-primary">Zaloguj się</a>
	<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'registerShow'),$_smarty_tpl ) );?>
" class="pure-button pure-button-primary">Rejstracja</a>


<?php
}
}
/* {/block 'content'} */
}
