<?php
/* Smarty version 4.1.0, created on 2022-05-20 20:53:28
  from 'C:\xampp\htdocs\finans\app\views\user_main_panel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6287e3a8d99498_29929999',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b2dff2c51b605b7525448f2391c377ba031a34e9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\finans\\app\\views\\user_main_panel.tpl',
      1 => 1653072808,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6287e3a8d99498_29929999 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3927350196287e3a8d90b48_76404064', 'content');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main_user_panel.tpl");
}
/* {block 'content'} */
class Block_3927350196287e3a8d90b48_76404064 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_3927350196287e3a8d90b48_76404064',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <h3>Cześć <?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>
</h3>

    <div class="split left">
        <div class="centered">
            <h4>Zarobiłeś: <?php echo $_smarty_tpl->tpl_vars['income']->value;?>
</h4>
        </div>
    </div>

    <div class="split right">
        <div class="centered">
            <h4>Wydałeś: <?php echo $_smarty_tpl->tpl_vars['expenses']->value;?>
</h4>

        </div>

<?php
}
}
/* {/block 'content'} */
}
