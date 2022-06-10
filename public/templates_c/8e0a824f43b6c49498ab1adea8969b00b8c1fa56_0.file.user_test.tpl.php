<?php
/* Smarty version 4.1.0, created on 2022-04-29 19:32:49
  from 'C:\xampp\htdocs\finans\app\views\user_main_panel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_626c2141016138_17317871',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8e0a824f43b6c49498ab1adea8969b00b8c1fa56' => 
    array (
      0 => 'C:\\xampp\\htdocs\\finans\\app\\views\\user_main_panel.tpl',
      1 => 1651253564,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_626c2141016138_17317871 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1853453534626c2140eed3c7_45644971', 'content');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main_user_panel.tpl");
}
/* {block 'content'} */
class Block_1853453534626c2140eed3c7_45644971 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1853453534626c2140eed3c7_45644971',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    <h3>Cześć <?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>
</h3>

1231


<?php
}
}
/* {/block 'content'} */
}
