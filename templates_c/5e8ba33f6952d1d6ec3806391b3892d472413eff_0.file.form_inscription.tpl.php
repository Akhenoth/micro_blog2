<?php
/* Smarty version 3.1.30, created on 2017-01-31 16:05:56
  from "C:\wamp\www\micro_blog2\form_inscription.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5890a7d4eec453_34065458',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5e8ba33f6952d1d6ec3806391b3892d472413eff' => 
    array (
      0 => 'C:\\wamp\\www\\micro_blog2\\form_inscription.tpl',
      1 => 1485875109,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5890a7d4eec453_34065458 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="cache" class="hidden"></div>

<form action="inscription.php" method="POST" id="Form">
  <div class="form-group">
    <label for="nom">Nom</label>
    <input type="input" name='nom' class="form-control" id="nom" placeholder="Nom">
  </div>
  <div class="form-group">
    <label for="prenom">Prénom</label>
    <input type="input" name='prenom' class="form-control" id="prenom" placeholder="Prénom">
  </div>
  <div class="form-group">
    <label for="pseudo">Pseudonyme</label>
    <input type="input" name='pseudo' class="form-control" id="pseudo" placeholder="Pseudo">
  </div>
  <div class="form-group">
    <label for="mail">E-Mail de connexion</label>
    <input type="input" name='mail' class="form-control" id="mail" placeholder="xxxx@domaine.fr">
  </div>
  <div class="form-group">
    <label for="mdp">Mot de passe</label>
    <input type="password" name='mdp' class="form-control" id="mdp" placeholder="Mot de passe">
  </div>
  <div class="form-group">
    <label for="mdp-conf">Confirmer mot de passe</label>
    <input type="password" name='mdp-conf' class="form-control" id="mdp-conf" placeholder="Confirmer mot de passe">
  </div>
  <button type="submit" id="inscription" class="btn btn-default" onsubmit="PassMatches()">S'inscrire</button>
</form><?php }
}
