<?php
/* Smarty version 4.1.0, created on 2022-05-29 18:19:48
  from 'C:\xampp\htdocs\finans\app\views\admin_main_panel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62939d240184c2_57378439',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '069a8f0e219624ca0b4315c5be868052f9f23738' => 
    array (
      0 => 'C:\\xampp\\htdocs\\finans\\app\\views\\admin_main_panel.tpl',
      1 => 1653319467,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62939d240184c2_57378439 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_163457671962939d23f28f57_96565843', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main_admin_panel_T.tpl");
}
/* {block 'content'} */
class Block_163457671962939d23f28f57_96565843 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_163457671962939d23f28f57_96565843',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>




    <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'logout'),$_smarty_tpl ) );?>
">Logout</a>
    <?php if ($_smarty_tpl->tpl_vars['role']->value) {?>
    <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'main'),$_smarty_tpl ) );?>
">User Panel</a>
    <?php }?>
<div>


<h1>Admin panel</h1>
<h2>Wyszukaj użytkownika</h2>


    <form class="row g-3" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"userShow"),$_smarty_tpl ) );?>
">
        <div class="col-auto mb-3 ">
            <input name="search" class="form-control mr-sm-2    " type="string" placeholder="Szukaj" aria-label="Search">
            <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('notUser')) {?>
                <p class="error2">
                    <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('notUser');?>

                </p>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('errReset')) {?>
                <p class="error2">
                    <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('errReset');?>

                </p>
            <?php }?>
        </div>
        <div class="col-auto">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Szukaj</button>
        </div>

    </form>
    <?php if ((isset($_smarty_tpl->tpl_vars['list']->value)) && $_smarty_tpl->tpl_vars['list']->value != null) {?>
    <table id="tab_people" class=" table  ">
        <thead class="table-dark" >
        <tr>
            <th>Login</th>
            <th>Imię</th>
            <th>id_family</th>
            <th>Zresetuj Hasło</th>
        </tr>
        </thead>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['list']->value["login"];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['list']->value["name"];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['list']->value["id_family"];?>
</td>
                    <td>                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Zresetuj
                        </button>
                    </td>

                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Czy napewno chcesz zresetować hasło?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid" >
                                        <a class="btn btn-dark" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'resetPassword','id'=>$_smarty_tpl->tpl_vars['list']->value['id_user']),$_smarty_tpl ) );?>
" role="button">Tak</a>
                                        <button type="button" class="btn btn-secondary col-md-5" data-bs-dismiss="modal">Nie</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </tr>


    </table>
    <?php }?>

<?php
}
}
/* {/block 'content'} */
}
