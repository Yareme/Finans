<?php
/* Smarty version 4.1.0, created on 2022-05-23 17:09:35
  from 'C:\xampp\htdocs\finans\app\views\add_expenses.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_628ba3af963c43_71845889',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '70cc966781cf5afece232d47d839de8df61001c3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\finans\\app\\views\\add_expenses.tpl',
      1 => 1653318575,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_628ba3af963c43_71845889 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_461929528628ba3af94a690_03851588', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main_user_panel.tpl");
}
/* {block 'content'} */
class Block_461929528628ba3af94a690_03851588 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_461929528628ba3af94a690_03851588',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



<H1>Wydatki</H1>

    <form class="row g-3" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'addExpenses'),$_smarty_tpl ) );?>
">

    <div class="col-md-6">
        <label for="name_item" class="form-label ">Co kupiłeś</label>
        <input type="text" class="form-control" id="name_item" placeholder="Cukier" name="name_item"   ">
        <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('item')) {?>
            <p class="error2">
                <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('item');?>

            </p>
        <?php }?>
    </div>

        <div class="col-md-6">
            <label for="quantity" class="form-label ">Ile</label>
            <input type="text" class="form-control" id="quantity" placeholder="1900" name="quantity"   ">
            <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('quantily')) {?>

                <p class="error2">
                    <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('quantily');?>

                </p>
            <?php }?>
        </div>


        <div class="col-md-6">
            <label for="inputDate">Data:</label>
            <input id="inputDate" type="date" class="form-control" name="date" data-date-format="YYYY-MMMM-DD" value="2022-04-22">
            <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('date')) {?>
                <p class="error2">
                    <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('date');?>

                </p>
            <?php }?>
        </div>

        <div class="col-md-6">
            <label for="price" class="form-label ">Koszt</label>
            <input type="text" class="form-control" id="price" placeholder="1900" name="price"   ">
            <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('price')) {?>

                <p class="error2">
                    <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('price');?>

                </p>
            <?php }?>
         </div>

    <div class="col-md-4">
        <label for="inputState" class="form-label">Kategoria</label>
        <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'categoryShow'),$_smarty_tpl ) );?>
 " class="form-label navbar-toggler">Dodaj kategorie</a>

        <select id="inputState" class="form-select" name="category_name">

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
                <option selected name="category_name"><?php echo $_smarty_tpl->tpl_vars['p']->value["category_name"];?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

        </select>
        <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('category')) {?>

            <p class="error2">
                <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('category');?>

            </p>
        <?php }?>
    </div>



    <div class="col-12">
        <button type="submit" class="btn btn-dark">Dodaj</button>
    </div>
    </form>

    <h1>Ostatni wydatki</h1>

        <form class="row g-3" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"expensesShow"),$_smarty_tpl ) );?>
">
            <div class="col-auto">
                <input name="search" class="form-control mr-sm-2" type="string" placeholder="Szukaj" aria-label="Search">
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Szukaj</button>
            </div>
        </form>


    <table id="tab_people" class="table mt-3 ">
        <thead class="table-dark">
    <tr>
        <th>Nazwa</th>
        <th>Ilość</th>
        <th>Sumaryczny koszt</th>
        <th>Data</th>
        <th>Kategoria</th>
        <th>Usuń</th>

    </tr>
    </thead>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['li']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
        <tr><td><?php echo $_smarty_tpl->tpl_vars['p']->value["name_item"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["quantity"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["price"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["date"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["category_name"];?>
</td><td><a class="button-small pure-button button-warning" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'deleteExpenses','param'=>$_smarty_tpl->tpl_vars['p']->value['id_expenses']),$_smarty_tpl ) );?>
"target="_f" onclick="test(event)">Usuń</a><?php echo '<script'; ?>
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
    </table>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class=" page-item"><a class="page-link <?php if ($_smarty_tpl->tpl_vars['strona']->value <= 1) {?> btn disabled <?php }?>" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'expensesShow','strona'=>1,'s'=>$_smarty_tpl->tpl_vars['string']->value),$_smarty_tpl ) );?>
"><<</a></li>
            <li class="page-item"><a class="page-link <?php if ($_smarty_tpl->tpl_vars['strona']->value <= 1) {?> btn disabled <?php }?>" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'expensesShow','strona'=>$_smarty_tpl->tpl_vars['strona']->value-1,'s'=>$_smarty_tpl->tpl_vars['string']->value),$_smarty_tpl ) );?>
">Poprzednia</a></li>
            <li class=" page-item"><a class="page-link <?php if ($_smarty_tpl->tpl_vars['strona']->value == $_smarty_tpl->tpl_vars['max']->value) {?> btn disabled <?php }?>" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'expensesShow','strona'=>$_smarty_tpl->tpl_vars['strona']->value+1,'s'=>$_smarty_tpl->tpl_vars['string']->value),$_smarty_tpl ) );?>
">Następna</a></li>
            <li class=" page-item"><a class="page-link <?php if ($_smarty_tpl->tpl_vars['strona']->value == $_smarty_tpl->tpl_vars['max']->value) {?> btn disabled <?php }?>" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'expensesShow','strona'=>$_smarty_tpl->tpl_vars['max']->value,'s'=>$_smarty_tpl->tpl_vars['string']->value),$_smarty_tpl ) );?>
">>></a></li>

        </ul>
    </nav>

<?php
}
}
/* {/block 'content'} */
}
