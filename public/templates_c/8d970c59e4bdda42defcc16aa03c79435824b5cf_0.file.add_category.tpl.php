<?php
/* Smarty version 4.1.0, created on 2022-05-23 17:17:39
  from 'C:\xampp\htdocs\finans\app\views\add_category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_628ba593e92499_10276180',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8d970c59e4bdda42defcc16aa03c79435824b5cf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\finans\\app\\views\\add_category.tpl',
      1 => 1653319059,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_628ba593e92499_10276180 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_888795010628ba593e7bb45_65500117', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main_user_panel.tpl");
}
/* {block 'content'} */
class Block_888795010628ba593e7bb45_65500117 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_888795010628ba593e7bb45_65500117',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <h1>Tu dodajesz kategorie</h1>


    <form class="row g-3" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'addCategory'),$_smarty_tpl ) );?>
">

        <div class="col-md-6">
            <label for="inputCity" class="form-label">Podaj nazwe kategorie</label>
            <input type="text" class="form-control" id="inputCity" placeholder="Praca stała" name="category_name">

            <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('addCategory')) {?>

                <p class="good">
                    <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('addCategory');?>

                </p>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('addCategoryError')) {?>
                <p class="error2">
                   <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('addCategoryError');?>

                </p>
            <?php }?>

        </div>

        <div class="col-12 mb-2">
            <button type="submit" class="btn btn-dark">Dodaj</button>
        </div>
    </form>


    <form class="row g-3" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"categoryShow"),$_smarty_tpl ) );?>
">
        <div class="col-auto">
            <input name="search" class="form-control mr-sm-2    " type="string" placeholder="Szukaj" aria-label="Search">
        </div>
        <div class="col-auto">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Szukaj</button>
        </div>
    </form>



    <table id="tab_people" class="table mt-3">
        <thead class="table-dark">
        <tr>
            <th>Categoria</th>
            <th>Usuń</th>
        </tr>
        </thead>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['li']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
            <tr><td><?php echo $_smarty_tpl->tpl_vars['p']->value["category_name"];?>
</td><td><a class="button-small pure-button button-warning" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'deleteCategory','param'=>$_smarty_tpl->tpl_vars['p']->value['id_category']),$_smarty_tpl ) );?>
" target="_f" onclick="test(event)">Usuń</a><?php echo '<script'; ?>
>
                            function test(e) {
                                if(confirm('Usunąć?')){
                                    return true;
                                }else{
                                    e.preventDefault();
                                }
                            };
                        <?php echo '</script'; ?>
></td></tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('er')) {?>
            <p class="error2">
                <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('er');?>

            </p>
        <?php }?>
    </table>
    <nav>
        <ul class="pagination">

                        <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class=" page-item"><a class="page-link <?php if ($_smarty_tpl->tpl_vars['strona']->value <= 1) {?> btn disabled <?php }?>" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'categoryShow','strona'=>1,'s'=>$_smarty_tpl->tpl_vars['string']->value),$_smarty_tpl ) );?>
"><<</a></li>

                    <li class="page-item"><a class="page-link <?php if ($_smarty_tpl->tpl_vars['strona']->value <= 1) {?> btn disabled <?php }?>" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'categoryShow','strona'=>$_smarty_tpl->tpl_vars['strona']->value-1,'s'=>$_smarty_tpl->tpl_vars['string']->value),$_smarty_tpl ) );?>
">Poprzednia</a></li>
                    <?php
$_smarty_tpl->tpl_vars['s'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['s']->step = 1;$_smarty_tpl->tpl_vars['s']->total = (int) ceil(($_smarty_tpl->tpl_vars['s']->step > 0 ? $_smarty_tpl->tpl_vars['max']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['max']->value)+1)/abs($_smarty_tpl->tpl_vars['s']->step));
if ($_smarty_tpl->tpl_vars['s']->total > 0) {
for ($_smarty_tpl->tpl_vars['s']->value = 1, $_smarty_tpl->tpl_vars['s']->iteration = 1;$_smarty_tpl->tpl_vars['s']->iteration <= $_smarty_tpl->tpl_vars['s']->total;$_smarty_tpl->tpl_vars['s']->value += $_smarty_tpl->tpl_vars['s']->step, $_smarty_tpl->tpl_vars['s']->iteration++) {
$_smarty_tpl->tpl_vars['s']->first = $_smarty_tpl->tpl_vars['s']->iteration === 1;$_smarty_tpl->tpl_vars['s']->last = $_smarty_tpl->tpl_vars['s']->iteration === $_smarty_tpl->tpl_vars['s']->total;?>
                        <li class="page-item"><a class="page-link" href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['s']->value;
$_prefixVariable1 = ob_get_clean();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'categoryShow','strona'=>$_prefixVariable1,'s'=>$_smarty_tpl->tpl_vars['string']->value),$_smarty_tpl ) );?>
"><?php echo $_smarty_tpl->tpl_vars['s']->value;?>
</a></li>
                    <?php }
}
?>

                    <li class=" page-item"><a class="page-link <?php if ($_smarty_tpl->tpl_vars['strona']->value == $_smarty_tpl->tpl_vars['max']->value) {?> btn disabled <?php }?>" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'categoryShow','strona'=>$_smarty_tpl->tpl_vars['strona']->value+1,'s'=>$_smarty_tpl->tpl_vars['string']->value),$_smarty_tpl ) );?>
">Następna</a></li>
                    <li class=" page-item"><a class="page-link <?php if ($_smarty_tpl->tpl_vars['strona']->value == $_smarty_tpl->tpl_vars['max']->value) {?> btn disabled <?php }?>" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'categoryShow','strona'=>$_smarty_tpl->tpl_vars['max']->value,'s'=>$_smarty_tpl->tpl_vars['string']->value),$_smarty_tpl ) );?>
">>></a></li>

                </ul>
            </nav>


        </ul>
    </nav>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
<?php
}
}
/* {/block 'content'} */
}
