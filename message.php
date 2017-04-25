<?php
	require('/template/Smarty.class.php');
	include('includes/connexion.inc.php');

	if($connecte == true){
		/*Vérification de la présence du message*/
		if (isset($_POST['id']) && !empty($_POST['id'])) {

		$query = 'UPDATE messages SET contenu=(:contenu), date_emission =UNIX_TIMESTAMP() WHERE id = (:id)';
		$prep = $pdo->prepare($query);
		$prep->execute(array(':contenu' => $_POST['message'], ':id' => $_POST['id']));

		}else {

	/*On effectue l'insertion de la donnée dans la base*/
		$query = 'INSERT INTO messages (contenu, date_emission) VALUES (:contenu, UNIX_TIMESTAMP())';
		$prep = $pdo->prepare($query);
		$data=':contenu';
		$prep->execute(array(':contenu' => $_POST['message']));
		
		if(preg_match('#([a-z\d-]+)', $data)){
			preg_replace('#([a-z\d-]+)', "<a href='$data'>$data</a>" ,$data);
		}

		}
	}


/*Redirection vers la page d'accueil*/
	header('Location: index.php');
?>

