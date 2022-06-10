<?php
/* Smarty version 4.1.0, created on 2022-05-22 20:49:55
  from 'C:\xampp\htdocs\finans\app\views\profileV.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_628a85d3896ce1_81397676',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3592852342d971ef8c47dca1c82b46344c9aaa15' => 
    array (
      0 => 'C:\\xampp\\htdocs\\finans\\app\\views\\profileV.tpl',
      1 => 1653245394,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_628a85d3896ce1_81397676 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1668341181628a85d3887b54_11340800', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main_user_panel.tpl");
}
/* {block 'content'} */
class Block_1668341181628a85d3887b54_11340800 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1668341181628a85d3887b54_11340800',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <h1>Profil</h1>

    <h2>Imię: <?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>
</h2>
    <h2>Login: <?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
</h2>
    <h2>Kod rodziny: <?php echo $_smarty_tpl->tpl_vars['invite_code']->value;?>
</h2>
    <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'changePasswordShow'),$_smarty_tpl ) );?>
">Zmień hosło</a>
    
    <?php if ($_smarty_tpl->tpl_vars['f']->value) {?>
        <form class="row g-4" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'changePassword'),$_smarty_tpl ) );?>
">
            <legend>Zmiana hasła</legend>
            <fieldset>

                <div class="col-md-2 mb-4">
                    <label for="id_login" class="form-label">Stare hasło: </label>
                    <input id="id_login" type="password" name="pass" class="form-control"/>
                    <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('pass')) {?>
                        <p class="error2">
                            <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('pass');?>

                        </p>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('passBD')) {?>
                        <p class="error2">
                            <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('passBD');?>

                        </p>
                    <?php }?>
                </div>

                <div class="col-md-2">
                    <label for="id_pass" class="form-label">Nowe hosło: </label>
                    <input id="id_pass" type="password" name="newPass" class="form-control"/><br />
                    <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('newPass')) {?>
                        <p class="error2">
                            <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('newPass');?>

                        </p>
                    <?php }?>

                </div>

                <div class="col-md-2">
                    <label for="id_pass" class="form-label">Potwierdź hosło: </label>
                    <input id="id_pass" type="password" name="newPassRepeat" class="form-control"/><br />
                    <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('newPassRepeat')) {?>
                        <p class="error2">
                            <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('newPassRepeat');?>

                        </p>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('passRep')) {?>
                        <p class="error2">
                            <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('passRep');?>

                        </p>
                    <?php }?>
                </div>

                <div class="pure-controls">
                    <button type="submit" class="btn btn-dark">Zmień</button>
                </div>

            </fieldset>

            <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('good')) {?>
                <p class="good">
                    <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('good');?>

                </p>
            <?php }?>
        </form>
        <?php }?>


<?php
}
}
/* {/block 'content'} */
}
