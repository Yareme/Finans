<?php
/* Smarty version 4.1.0, created on 2022-04-15 13:29:41
  from 'C:\xampp\htdocs\finans\app\views\loginV.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62595725d84096_63602159',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4afb446393958ed4626f5e957ec92fc1dc960a6f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\finans\\app\\views\\loginV.php',
      1 => 1650022178,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62595725d84096_63602159 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_112972289962595725d7b6c2_78934106', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.php");
}
/* {block 'content'} */
class Block_112972289962595725d7b6c2_78934106 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_112972289962595725d7b6c2_78934106',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>







<form action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'login'),$_smarty_tpl ) );?>
" method="post"  class="pure-form pure-form-aligned bottom-margin">
    <legend>Logowanie do systemu</legend>
    <?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
login
    <fieldset>
        <div class="pure-control-group">
            <label for="id_login">login: </label>
            <input id="id_login" type="text" name="login"/>
        </div>
        <div class="pure-control-group">
            <label for="id_pass">pass: </label>
            <input id="id_pass" type="password" name="password" /><br />
        </div>
        <div class="pure-controls">
            <input type="submit" value="zaloguj" class="pure-button pure-button-primary"/>
        </div>
    </fieldset>
</form>



<?php
}
}
/* {/block 'content'} */
}
