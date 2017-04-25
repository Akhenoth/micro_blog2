<?php
session_start();
include('includes/connexion.inc.php');
include('includes/haut.inc.php');

$index = new Smarty();
$index->assign("connecte", $connecte);
?>


<div class="row">              
  <form method="post" action='message.php'>
    <div class="col-sm-10">  
      <div class="form-group">
       <?php
       /*Si on a un ID, on récupère la donnée en base*/
        if(isset($_GET['id']) && !empty($_GET['id'])){
        ?>  <input type="hidden" name="id" value="<?=$_GET['id']?>">  

        <?php 
          
        /// creer un array, et tant qu'il y a des messages dans la BD on les insere
          $query = 'SELECT * FROM messages WHERE id='.$_GET['id'];
          $msgmodif = $pdo->query($query)->fetchAll();
          $index->assign('msgmodif', $msgmodif);
        
          }
        ?>
        <?php if($connecte==true){

        ?>
        <textarea id="message" name="message" class="form-control" placeholder="Message"><?php if(isset($_GET['id'])){echo $msgmodif['contenu']; } ?></textarea>
        
      </div>
    </div>
    <div class="col-sm-2">
      <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
      <?php } ?>
    </div>                        
  </form>
</div>

<?php


//Pagination

  //Nombre de messages par page
  $messagesParPages = 7;
  //Récupération du nombre total de message 
  $nombreMessages = 'SELECT COUNT(*) AS TotalMessages FROM messages';
  $prep = $pdo->prepare($nombreMessages);
  $prep->execute();
  $donneesTotales = $prep->fetch();
  $total = $donneesTotales['TotalMessages'];
  //Compter le nombre de pages vis à vis du nombre de messages à afficher
  $nombrePages = ceil($total/$messagesParPages);

  if(isset($_GET['page'])){
    $pageActuelle=intval($_GET['page']);
    if($pageActuelle > $nombrePages){
      $pageActuelle = $nombrePages;
    }
  }else{
    $pageActuelle=1;
  }
  //Récupération de la derniere donnée pour afficher à partir du bon message
  $lecturePremiereDonnee = ($pageActuelle-1)*$messagesParPages;

  $array = array();

  $lectureMessage = 'SELECT * FROM messages ORDER BY id DESC LIMIT '.$lecturePremiereDonnee.','.$messagesParPages.'';
  $prepa = $pdo->prepare($lectureMessage);
  $prepa ->execute();
  $data = $prepa->fetchAll();
  $index->assign('data', $data);
  for($i=1; $i<=$nombrePages; $i++){
    if($i==$pageActuelle){
      echo '<ul class="pagination">
            <li><a href="#">'.$i.'</a></li>
            </ul>';
    }else{ 
      echo '<ul class="pagination">
            <li><a href="index.php?page='.$i.'">'.$i.'</a></li>
           </ul>';
      }
  }

  foreach ($prepa as $message){
    if(preg_match_all('#([a-z\d-]+)', $message['champ'], $matches, PREG_SET_ORDER)){
      foreach ($matches as $values) {
        $dieze = "<a href='#'".$values[1]."'>'".$values[0]."</a>";
        $message['champ'] = preg_replace("/".$values[0]."/", $dieze, $message['champ']);
      }
    }
  }

  foreach ($prepa as $mail) {
    if(preg_match_all("^[a-zA-Z0-9\-]+@([a-z]+\.?[a-z0-9]+.[a-z]{2,3})$", $message['champ'], $matches, PREG_SET_ORDER)){
      foreach($matches as $values){
        $mail = "<a href='mailto:'".$matches[0][0]."'>'".$matches[0][0]."</a>";
        $message['champ'] = preg_replace("/".$matches[0][0]."/", $mail, $message['champ']);
      }
    }
  }

$index->display('template/index.tpl');

//Adresse mail : 
//^[a-zA-Z0-9\-]+@([a-z]+\.?[a-z0-9]+.[a-z]{2,3})$

// Récupération des mots avec #
//#([a-z\d-]+)

//URL
//^(https?:\/\/[www.]*[a-zA-Z0-9\/\-\_\.\!\?\+\=]+[.][a-z]{2,3}[a-zA-Z0-9\/\-\_\!\?\+\=]*)$

/*
Développer un aperçu qui s'actualise en temps réel
jquery : .change ou keypress(fonction(){})
         .get(URL, {message, message}, function(data){}) => apercu.msg.php
*/

?>

<?php include('includes/bas.inc.php'); ?>

