<?php
/* Smarty version 4.1.0, created on 2022-06-03 21:19:34
  from 'C:\xampp\htdocs\finans\app\views\loginV.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629a5ec63647b8_19723540',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd18942fa5f2138f1cb33731f00d36c944ae3547b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\finans\\app\\views\\loginV.tpl',
      1 => 1654283357,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629a5ec63647b8_19723540 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1568635529629a5ec6291b93_93536512', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "RegisterLoginTemplates.tpl");
}
/* {block 'content'} */
class Block_1568635529629a5ec6291b93_93536512 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1568635529629a5ec6291b93_93536512',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <section class=" vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Logowanie</h2>
                                <p class="text-white-50 mb-5">Wpisz login i haslo!</p>
                                <form action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'login'),$_smarty_tpl ) );?>
" class="needs-validation" method="post" novalidate>
                                <div class="form-outline form-white mb-4">


                                    <input value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
" name="login" type="text" id="log"  class="form-control form-control-lg  <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('login')) {?> is-invalid <?php }?> " required/>
                                    <label class="form-label" for="log">Login</label>
                                    <div class="invalid-feedback">
                                        <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('login');?>

                                    </div>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('password')) {?> is-invalid <?php }?>" />
                                    <label class="form-label" for="typePasswordX">Password</label>
                                    <div class="invalid-feedback">
                                        <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('password');?>

                                    </div>

                                </div>
                                    <div class="error">
                                        <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('errLogin') && (!$_smarty_tpl->tpl_vars['msgs']->value->isMessage('login') || !$_smarty_tpl->tpl_vars['msgs']->value->isMessage('password'))) {?>
                                            <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('errLogin');?>

                                            <?php }?>
                                    </div>
                                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Zapomniełeś hasła?</a></p>

                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                                    </form>
                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                </div>

                            </div>

                            <div>
                                <p class="mb-0">Nie masz konta? <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'registerShow'),$_smarty_tpl ) );?>
" class="text-white-50 fw-bold">Rejestracja</a>
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
/* {/block 'content'} */
}
