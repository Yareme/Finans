<?php
/* Smarty version 4.1.0, created on 2022-05-23 17:20:26
  from 'C:\xampp\htdocs\finans\app\views\add_aim.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_628ba63a9c89e5_14924634',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dad035253d3053a13cfa8fd40d9c0eb2f2def0dc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\finans\\app\\views\\add_aim.tpl',
      1 => 1653319225,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_628ba63a9c89e5_14924634 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1644154292628ba63a9a7186_31870333', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main_user_panel.tpl");
}
/* {block 'content'} */
class Block_1644154292628ba63a9a7186_31870333 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1644154292628ba63a9a7186_31870333',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>




    <h1>Tu dodajesz cele</h1>

    <!-- Button trigger modal -->



    <form action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"addAim"),$_smarty_tpl ) );?>
">
        <div class="col-md-6">
            <label for="text_aim">Opis celu</label>
            <input class="form-control" id="text_aim" name="text_aim" rows="2" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->text_aim;?>
" >
            <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('text_aim')) {?>
                <p class="error2">
                    <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('text_aim');?>

                </p>
            <?php }?>
        </div>


        <div class="col-md-2">
            <label for=" price_aim">Ile trzeba zebrać</label>
                <input  type="number" class="form-control" id="price_aim" name="price_aim" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->price_aim;?>
">
            <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage('price_aim')) {?>
                <p class="error2">
                    <?php echo $_smarty_tpl->tpl_vars['msgs']->value->getMessage('price_aim');?>

                </p>
            <?php }?>
        </div>

        <div class="col-12">
            <button type="submit" class="col-sm-1 btn btn-dark mt-2">Dodaj</button>
        </div>


    </form>


    <H1>Bierzące cele</H1>


        <form class="row g-3" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"aimShow"),$_smarty_tpl ) );?>
">
           <div class="col-auto">
               <input name="search" class="form-control mr-sm-2" type="string" placeholder="Szukaj" aria-label="Search">
           </div>
            <div class="col-auto">
            <button class="btn btn-outline-success my-2 my-sm-0 " type="submit">Szukaj</button>
            </div>
        </form>


    <table   class="table mt-3">
        <thead class="table-dark">
        <tr>
            <th>Opis</th>
            <th>Wymagana kwota</th>
            <th>Już jest</th>
            <th>Dodaj</th>
            <th>Usuń</th>

        </tr>
        </thead>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['li']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
            <tr><td><?php echo $_smarty_tpl->tpl_vars['p']->value["text_aim"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["price_aim"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["owned"];?>
</td><td class="tt"><form class="row gy-2 gx-3 align-items-center" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'updateAim','param'=>$_smarty_tpl->tpl_vars['p']->value['id_aim']),$_smarty_tpl ) );?>
"><div class="col-sm-6"><input class="form-control" type="number" id="owned" name="owned_form" ></div><div class="col-auto"><button type="submit" class="btn btn-dark" >Dodaj</button><a class="btn btn-link" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'moreAim','param'=>$_smarty_tpl->tpl_vars['p']->value['id_aim']),$_smarty_tpl ) );?>
">Więcej</a></div></form></td><td><a class="button-small pure-button button-warning" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'deleteAim','param'=>$_smarty_tpl->tpl_vars['p']->value['id_aim']),$_smarty_tpl ) );?>
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
            <li class=" page-item"><a class="page-link <?php if ($_smarty_tpl->tpl_vars['strona']->value <= 1) {?> btn disabled <?php }?>" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'aimShow','strona'=>1,'s'=>$_smarty_tpl->tpl_vars['string']->value),$_smarty_tpl ) );?>
"><<</a></li>
            <li class="page-item"><a class="page-link <?php if ($_smarty_tpl->tpl_vars['strona']->value <= 1) {?> btn disabled <?php }?>" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'aimShow','strona'=>$_smarty_tpl->tpl_vars['strona']->value-1,'s'=>$_smarty_tpl->tpl_vars['string']->value),$_smarty_tpl ) );?>
">Previous</a></li>
            <li class=" page-item"><a class="page-link <?php if ($_smarty_tpl->tpl_vars['strona']->value == $_smarty_tpl->tpl_vars['max']->value) {?> btn disabled <?php }?>" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'aimShow','strona'=>$_smarty_tpl->tpl_vars['strona']->value+1,'s'=>$_smarty_tpl->tpl_vars['string']->value),$_smarty_tpl ) );?>
">Next</a></li>
            <li class=" page-item"><a class="page-link <?php if ($_smarty_tpl->tpl_vars['strona']->value == $_smarty_tpl->tpl_vars['max']->value) {?> btn disabled <?php }?>" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'aimShow','strona'=>$_smarty_tpl->tpl_vars['max']->value,'s'=>$_smarty_tpl->tpl_vars['string']->value),$_smarty_tpl ) );?>
">>></a></li>

        </ul>
    </nav>

<?php
}
}
/* {/block 'content'} */
}
