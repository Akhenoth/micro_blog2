<?php
 // require('/template/Smarty.class.php');
  include('includes/connexion.inc.php');
  include('includes/haut.inc.php');

  $inscription = new Smarty();

  if(isset($_POST['mail']) && isset($_POST['mdp']) && isset($_POST['pseudo']) && isset($_POST['nom']) && isset($_POST['prenom'])){

    /*Vérification de la présence de données déjà existante en base*/
    $verif = "SELECT * FROM utilisateur WHERE pseudo = (:pseudo) OR mail = (:mail)";
    $prep = $pdo -> prepare($verif);
    $prep->bindValue(':pseudo', $_POST['pseudo']);
    $prep->bindValue(':mail', $_POST['mail']);
    $prep->execute();
    $verification = $prep->fetch();
    $rowcount = $prep->rowCount();

    //Si le rowCount == 0, alors la donnée n'est pas présete en base, évitant ainsi une erreur sql
    if($rowcount == 0){
      /* Inscription */
      $query = "INSERT INTO utilisateur (nom, prenom, pseudo, mail, mdp) VALUES (:nom, :prenom, :pseudo, :mail, :mdp)";
      $prep = $pdo->prepare($query);
      $prep ->bindValue(':nom', $_POST['nom']);
      $prep ->bindValue(':prenom', $_POST['prenom']);
      $prep -> bindValue(':pseudo', $_POST['pseudo']);
      $prep ->bindValue(':mail', $_POST['mail']);
      $prep ->bindValue(':mdp', $_POST['mdp']);
      $prep->execute();

      ?>

      <script>
        // Script alertant l'utilisateur que le compte à bien été crée
          $(document).ready(function(){
            $('#cache').removeClass();
            $('#cache').addClass("alert alert-success");
            $('#cache').html("Le compte à bien été crée.");
            $('#cache').slideDown("slow");
            return false;
          });
          </script>
          <?php

    }
    else{ ?>
      <script>
        // Script alertant l'utilisateur que le mail ou le pseudo est déjà existant
          $(document).ready(function(){
            $('#cache').removeClass();
            $('#cache').addClass("alert alert-danger");
            $('#cache').html("Le pseudo ou le mail est déjà existant.");
            $('#cache').slideDown("slow");
            return false;
          });
          </script>
<?php }
  }

  $inscription->display('template/form_inscription.tpl');
  include('includes/bas.inc.php'); 
?>



<script>
// Script vérifiant les log (champs vides)
  $(document).ready(function(){
    $('#Form').submit(function(){

      /*Test sur les champs mail, mot de passe et pseudo, alerte si un de ces champs est vide*/
      if( $('#mail').val() == '' || $('#mdp').val() == '' || $('#pseudo').val() == '' ){

        $('#cache').removeClass();
        $('#cache').addClass("alert alert-danger");
        $('#cache').html("Le pseudo, l'adresse mail et/ou le mot de passe est manquant");
        $('#cache').slideDown("slow");
        return false;
      }

      /*Test sur les champs noms et prenoms, alerte si un de ces champs est manquant*/
      if( $('#nom').val() == '' || $('#prenom').val() == ''){

        $('#cache').removeClass();
        $('#cache').addClass("alert alert-danger");
        $('#cache').html("Le nom et/ou le prénom est manquant");
        $('#cache').slideDown("slow");
        return false;
      } 

      /*Test sur l'exactitude des mots de passe renseigné*/
      if( $('#mdp').val() != $('#mdp-conf').val()){
        $('#cache').removeClass();
        $('#cache').addClass("alert alert-danger");
        $('#cache').html("Les mots de passe ne correspondent pas");
        $('#cache').slideDown("slow");
        return false;
      }
      return true;

    });
  }); 

</script>