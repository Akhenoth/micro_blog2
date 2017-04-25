<?php
/* Smarty version 3.1.30, created on 2017-01-31 15:01:26
  from "C:\wamp\www\micro_blog2\mv-idt.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_589098b6028ab0_88942219',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '551febfe4097d4a00fa533da795efc916d7dc652' => 
    array (
      0 => 'C:\\wamp\\www\\micro_blog2\\mv-idt.tpl',
      1 => 1485871208,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_589098b6028ab0_88942219 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
          $(document).ready(function(){
            $('#cache').removeClass();
            $('#cache').addClass("alert alert-danger");
            $('#cache').html("L'adresse mail ou le mot de passe saisi est incorrect.");
            $('#cache').slideDown("slow");
            return false;
          });
<?php echo '</script'; ?>
><?php }
}
