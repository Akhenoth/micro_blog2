<?php
/* Smarty version 3.1.30, created on 2017-03-14 15:38:40
  from "C:\wamp\www\micro_blog2\template\form_connexion.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c8007033ee90_55205405',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '574d89a86a33fdcc0e900ca23a77433177ff8c11' => 
    array (
      0 => 'C:\\wamp\\www\\micro_blog2\\template\\form_connexion.tpl',
      1 => 1489502315,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58c8007033ee90_55205405 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="cache" class="hidden"></div>

<form action="connexion.php" method="POST" id="Form">
  <div class="form-group">
    <label for="mail">E-Mail de connexion</label>
    <input type="input" name='mail' class="form-control" id="mail" placeholder="xxxx@domaine.fr">
  </div>
  <div class="form-group">
    <label for="mdp">Mot de passe</label>
    <input type="password" name='mdp' class="form-control" id="mdp" placeholder="°°°°°°°">
  </div>
  <button type="submit" id="connexion" class="btn btn-default">Me connecter</button>
</form>
<a href="inscription.php">Pas encore inscrit ?</a>


<?php echo '<script'; ?>
>
// Script vérifiant les log (champs vides)
  $(document).ready(function(){
    $('#Form').submit(function(){
      if( $('#mail').val() == '' || $('#mdp').val() == '' ){
        console.log("pas de mail");

        $('#cache').removeClass();
        $('#cache').addClass("alert alert-danger");
        $('#cache').html("L'adresse mail ou le mot de passe est manquant");
        $('#cache').slideDown("slow");
        return false;
      }
      return true;
    });
  });
<?php echo '</script'; ?>
>

<?php }
}
