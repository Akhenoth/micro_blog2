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


<script>
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
</script>

