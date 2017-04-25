<?php
/* Smarty version 3.1.30, created on 2017-04-25 22:04:17
  from "C:\wamp\www\micro_blog2\template\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58ffabc1930e75_64215083',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50b4adafbd286b02c8fa341085c0472183e9b738' => 
    array (
      0 => 'C:\\wamp\\www\\micro_blog2\\template\\index.tpl',
      1 => 1493150633,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58ffabc1930e75_64215083 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\wamp\\www\\micro_blog2\\template\\plugins\\modifier.date_format.php';
?>
<!--  <div class="row">
    <form method="post" action ='message.php'>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="hidden" name="id" value=<?php echo $_smarty_tpl->tpl_vars['msgmodif']->value;?>
>
          <textarea id="message" name="message" class="form-control" placeholder="Message"></textarea>
        </div>
      </div>
      <div class="col-sm-2">
        <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
      </div>
    </form>
  </div>  -->

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'donnee');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['donnee']->value) {
?>
  <hr/>
  <?php echo $_smarty_tpl->tpl_vars['donnee']->value['contenu'];?>
</br>
  <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['donnee']->value['date_emission'],"%D à %H h %M m %S s");?>
</br>
    <?php if ($_smarty_tpl->tpl_vars['connecte']->value == true) {?>
      <a href="index.php?id=<?php echo $_smarty_tpl->tpl_vars['donnee']->value['id'];?>
"><button type="button" class="btn btn-info">Modifier</button></a></br>
      <a href="suppression-msg.php?id=<?php echo $_smarty_tpl->tpl_vars['donnee']->value['id'];?>
"><button type="button" class="btn btn-danger">Supprimer</button></a></br>
    <?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</div><?php }
}
