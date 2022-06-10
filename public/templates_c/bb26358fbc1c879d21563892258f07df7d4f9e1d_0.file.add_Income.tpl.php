<?php
/* Smarty version 4.1.0, created on 2022-04-17 00:46:59
  from 'C:\xampp\htdocs\finans\app\views\templates\add_Income.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_625b476365c3b6_56807426',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb26358fbc1c879d21563892258f07df7d4f9e1d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\finans\\app\\views\\templates\\add_Income.tpl',
      1 => 1650149217,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_625b476365c3b6_56807426 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2082642503625b476365b990_76230255', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main_user_panel.tpl");
}
/* {block 'content'} */
class Block_2082642503625b476365b990_76230255 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2082642503625b476365b990_76230255',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h1>Tu dodajeszsz Zarobki</h1>


    <form class="row g-3">




        <div class="col-md-6">
            <label for="inputCity" class="form-label">Przychód</label>
            <input type="text" class="form-control" id="inputCity" placeholder="1900">
        </div>

        <div class="col-md-4">
            <label for="inputState" class="form-label">Kategoria</label>
            <select id="inputState" class="form-select">
                <option selected>Wybrać...</option>
                <option>...</option>
            </select>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Dodaj</button>
        </div>
    </form>


    <?php
}
}
/* {/block 'content'} */
}
