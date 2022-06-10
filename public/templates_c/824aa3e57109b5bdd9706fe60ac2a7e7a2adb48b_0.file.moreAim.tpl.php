<?php
/* Smarty version 4.1.0, created on 2022-05-23 17:20:31
  from 'C:\xampp\htdocs\finans\app\views\moreAim.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_628ba63f21a257_74445076',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '824aa3e57109b5bdd9706fe60ac2a7e7a2adb48b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\finans\\app\\views\\moreAim.tpl',
      1 => 1653319225,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_628ba63f21a257_74445076 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_277039716628ba63f202238_10912453', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main_user_panel.tpl");
}
/* {block 'content'} */
class Block_277039716628ba63f202238_10912453 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_277039716628ba63f202238_10912453',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <h1>Cel: <?php echo $_smarty_tpl->tpl_vars['text_aim']->value;?>
</h1>

        <form class="row g-3" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"moreAim",'id'=>$_smarty_tpl->tpl_vars['id']->value),$_smarty_tpl ) );?>
">
            <div class="col-auto">
                <input name="search" class="form-control mr-sm-2" type="string" placeholder="Szukaj" aria-label="Search">
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Szukaj</button>
            </div>
        </form>

    <table class="table mt-3">
        <thead class="table-dark">
        <tr>

            <th>Suma</th>
            <th>Imię</th>
            <th>Data</th>
            <th>Usuń</th>

        </tr>
        </thead>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['li']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
            <tr><td><?php echo $_smarty_tpl->tpl_vars['p']->value["receipt"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["name"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["date"];?>
</td><?php if ($_smarty_tpl->tpl_vars['user']->value->id == $_smarty_tpl->tpl_vars['p']->value['id_user']) {?> <td><a class="button-small pure-button button-warning" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'deleteAimReceipt','id'=>$_smarty_tpl->tpl_vars['id']->value,'param'=>$_smarty_tpl->tpl_vars['p']->value['id_receipt'],'s'=>$_smarty_tpl->tpl_vars['strona']->value),$_smarty_tpl ) );?>
">Usuń</a></td><?php }?></tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>



    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class=" page-item"><a class="page-link <?php if ($_smarty_tpl->tpl_vars['strona']->value <= 1) {?> btn disabled <?php }?>" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'moreAim','id'=>$_smarty_tpl->tpl_vars['id']->value,'strona'=>1,'s'=>$_smarty_tpl->tpl_vars['string']->value),$_smarty_tpl ) );?>
"><<</a></li>
            <li class="page-item"><a class="page-link <?php if ($_smarty_tpl->tpl_vars['strona']->value <= 1) {?> btn disabled <?php }?>" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'moreAim','id'=>$_smarty_tpl->tpl_vars['id']->value,'strona'=>$_smarty_tpl->tpl_vars['strona']->value-1,'s'=>$_smarty_tpl->tpl_vars['string']->value),$_smarty_tpl ) );?>
">Previous</a></li>
            <li class=" page-item"><a class="page-link <?php if ($_smarty_tpl->tpl_vars['strona']->value == $_smarty_tpl->tpl_vars['max']->value) {?> btn disabled <?php }?>" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'moreAim','id'=>$_smarty_tpl->tpl_vars['id']->value,'strona'=>$_smarty_tpl->tpl_vars['strona']->value+1,'s'=>$_smarty_tpl->tpl_vars['string']->value),$_smarty_tpl ) );?>
">Next</a></li>
            <li class=" page-item"><a class="page-link <?php if ($_smarty_tpl->tpl_vars['strona']->value == $_smarty_tpl->tpl_vars['max']->value) {?> btn disabled <?php }?>" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'moreAim','id'=>$_smarty_tpl->tpl_vars['id']->value,'strona'=>$_smarty_tpl->tpl_vars['max']->value,'s'=>$_smarty_tpl->tpl_vars['string']->value),$_smarty_tpl ) );?>
">>></a></li>

        </ul>
    </nav>


<?php
}
}
/* {/block 'content'} */
}
