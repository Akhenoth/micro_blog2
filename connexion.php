<?php
  include('includes/connexion.inc.php');
  include('includes/haut.inc.php');

  $smarty = new Smarty();
  $smarty->display("template/form_connexion.tpl");
  include('includes/bas.inc.php'); 
  if(isset($_POST['mail']) && isset($_POST['mdp'])){
    /* Vérification de la connexion */
    $query = 'SELECT id FROM utilisateur WHERE mail = (:mail) AND mdp=(:mdp)';
    $prep = $pdo->prepare($query);
    $prep ->bindValue(':mail', $_POST['mail']);
    $prep ->bindValue(':mdp', $_POST['mdp']);
    $prep->execute();
    $resultat = $prep->fetch();
    $recount = $prep->rowCount();

    if($recount == 0){
      ?>
      <script>
          $(document).ready(function(){
            $('#cache').removeClass();
            $('#cache').addClass("alert alert-danger");
            $('#cache').html("L'adresse mail ou le mot de passe saisi est incorrect.");
            $('#cache').slideDown("slow");
            return false;
          });
      </script>
    <?php
    }else{
      /*Hachage du mot de passe*/
      $sid = md5($_POST['mail']).time();
      /*Création d'un cookie*/
      //setcookie('Uncookie',$sid, time()+6*60);
      /*Mise à jour du SID dans la base de donnée*/
      $query = "UPDATE utilisateur SET sid = ? WHERE mail=? and mdp=?";
      $prep = $pdo->prepare($query);
      $prep->bindValue(1, $sid);
      $prep->bindValue(2, $_POST['mail']);
      $prep->bindValue(3, $_POST['mdp']);
      $prep->execute();
      header('Location: index.tpl');
    }
  }
?>