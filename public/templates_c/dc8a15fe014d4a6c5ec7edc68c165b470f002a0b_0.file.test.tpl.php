<?php
/* Smarty version 4.1.0, created on 2022-05-03 18:04:45
  from 'C:\xampp\htdocs\finans\app\views\test.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6271529d0271a7_88992897',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dc8a15fe014d4a6c5ec7edc68c165b470f002a0b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\finans\\app\\views\\test.tpl',
      1 => 1651593883,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6271529d0271a7_88992897 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_425119396271529d022736_29935966', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main_user_panel.tpl");
}
/* {block 'content'} */
class Block_425119396271529d022736_29935966 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_425119396271529d022736_29935966',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'updateAim'),$_smarty_tpl ) );?>
">
                        <label for="owned">Ile chcesz dodać</label>
                        <textarea class="form-control" id="owned" name="owned" rows="2"></textarea>
                        <button type="submit" class="col-sm-1 btn btn-primary mt-2">  <a  class="button-small pure-button button-warning" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'updateAim','param'=>$_smarty_tpl->tpl_vars['p']->value['id_aim']),$_smarty_tpl ) );?>
">D</a></button>
                    </form>


                    
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>
<?php
}
}
/* {/block 'content'} */
}
