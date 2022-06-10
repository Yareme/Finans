<?php
/* Smarty version 4.1.0, created on 2022-05-22 16:05:38
  from 'C:\xampp\htdocs\finans\app\views\registerV.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_628a4332d8fff4_92987988',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc47e33fe7ec23ebc9b3947402b6a0e36c723cb1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\finans\\app\\views\\registerV.tpl',
      1 => 1653228336,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_628a4332d8fff4_92987988 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1264884525628a4332d78e92_81801531', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'RegisterLoginTemplates.tpl');
}
/* {block "content"} */
class Block_1264884525628a4332d78e92_81801531 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1264884525628a4332d78e92_81801531',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <section class=" vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-5 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-1 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase mb-5">Restracja</h2>
                                <form action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'register'),$_smarty_tpl ) );?>
" class="needs-validation" method="post">

                                    <div class="form-outline form-white mb-3">
                                        <input name="name" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->name;?>
" type="text" id="typeEmailX" class="form-control form-control-lg  <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('name')) {?> is-invalid <?php }?>"  />
                                        <label class="form-label" for="typeEmailX">Imię</label>
                                        <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('name')) {?>
                                            <p class="error">
                                                <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('name');?>

                                            </p>
                                        <?php }?>
                                    </div>

                                    <div class="form-outline form-white mb-3">
                                        <input type="text" name="login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
" id="typePasswordX" class="form-control form-control-lg  <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('login') || $_smarty_tpl->tpl_vars['msgs']->value->isMessage('login_exist')) {?> is-invalid <?php }?>" />
                                        <label class="form-label" for="typePasswordX">Login</label>
                                        <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('login')) {?>
                                            <p class="error">
                                                <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('login');?>

                                            </p>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('login_exist')) {?>
                                            <p class="error">
                                                <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('login_exist');?>

                                            </p>
                                        <?php }?>
                                    </div>

                                    <div class="form-outline form-white mb-3">
                                        <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg  <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('password')) {?> is-invalid <?php }?>" />
                                        <label class="form-label" for="typePasswordX">Hasło</label>
                                        <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('password')) {?>
                                            <p class="error">
                                                <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('password');?>

                                            </p>
                                        <?php }?>
                                    </div>

                                    <div class="form-outline form-white mb-3">
                                        <input type="password" name="password_repeat" id="typePasswordX" class="form-control form-control-lg <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('password_repeat') || $_smarty_tpl->tpl_vars['msgs']->value->isMessage('password_repeat_right')) {?> is-invalid <?php }?>" />
                                        <label class="form-label" for="typePasswordX">Powtóż hasło</label>
                                        <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('password_repeat')) {?>
                                            <p class="error">
                                                <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('password_repeat');?>

                                            </p>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('password_repeat_right')) {?>
                                            <p class="error">
                                                <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('password_repeat_right');?>

                                            </p>
                                        <?php }?>
                                    </div>

                                    <div class="form-outline form-white mb-3">
                                        <input type="number" name="invite_code" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->invite_code;?>
" id="typePasswordX" class="form-control form-control-lg  <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('invietCode')) {?> is-invalid <?php }?>" />
                                        <label class="form-label" for="typePasswordX">Podaj kod jak masz</label>
                                        <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('invietCode')) {?>
                                            <p class="error">
                                                <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('invietCode');?>

                                            </p>
                                        <?php }?>
                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Rejestracja</button>
                                </form>
                            </div>
                            <div>
                                <p class="mb-0">Już masz konto? <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'loginShow'),$_smarty_tpl ) );?>
" class="text-white-50 fw-bold">Zaloguj się</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <?php
}
}
/* {/block "content"} */
}
