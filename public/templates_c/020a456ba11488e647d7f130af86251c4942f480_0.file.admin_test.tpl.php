<?php
/* Smarty version 4.1.0, created on 2022-04-25 15:34:44
  from 'C:\xampp\htdocs\finans\app\views\admin_main_panel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6266a374e458b7_89818617',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '020a456ba11488e647d7f130af86251c4942f480' => 
    array (
      0 => 'C:\\xampp\\htdocs\\finans\\app\\views\\admin_main_panel.tpl',
      1 => 1650893683,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6266a374e458b7_89818617 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15980610726266a374e34e02_94225048', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "RegisterLoginTemplates.tpl");
}
/* {block 'content'} */
class Block_15980610726266a374e34e02_94225048 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_15980610726266a374e34e02_94225048',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'logout'),$_smarty_tpl ) );?>
">Logout</a>
    <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'main'),$_smarty_tpl ) );?>
">User Panel</a>
<h1>Admin panel</h1>

    <?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>


<?php echo $_smarty_tpl->tpl_vars['role']->value;?>
<br>
    ---------------



    <table id="tab_people" class="pure-table pure-table-bordered">
        <thead>
        <tr>
            <th>Login</th>
            <th>password</th>
            <th>id_family</th>

        </tr>
        </thead>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
            <tr><td><?php echo $_smarty_tpl->tpl_vars['p']->value["login"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["password"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["id_family"];?>
</td></tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>
<?php
}
}
/* {/block 'content'} */
}
