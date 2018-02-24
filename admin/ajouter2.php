<?php

try {
	$bdd = new PDO('mysql:host=localhost;dbname=projetperso;charset=utf8', 'root', '');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

if($_FILES['photo']['size'] < 1048576) {

	  $nom_image = 'images/'.md5(uniqid(rand(), true)).'.png';

	move_uploaded_file($_FILES['photo']['tmp_name'],$nom_image);
}else {
 	echo 'Le fichier est trop grand';
}

$legende= $_POST['legende'];
$lien= $_POST['lien'];
$requete = "INSERT INTO `slide` (`ID`, `legende`, `lien`, `photo`) VALUES
                                 (NULL, '$legende', '$lien', '$nom_image');";
 $resultat= $bdd->exec($requete);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link href="tuto.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style_pageadmin.css" type="text/css">
  <title>Ajouter dans slider </title>
 </head>
 <body class="body_pageadmin">
     <?php require('header_admin.php');?>

     <h2>Bienvenue sur l'espace de de gestion du slider.</h2>
		 <div class="form_admin">
		 	<?php
		 	if($resultat==1) { echo'Votre photo a bien été ajoutée';
		 	}else {
		 	echo ' Ohlala ...problème';
		 	}
		 	?>
		</div>
		<button class="btn_connexion" onClick="window.location.href='../index.php'">Retour au Site</button>
		 <?php include('footer_admin.php'); ?>

		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		 <script src="assets/js/image_formulaire.js"></script>
		 </body>
		 </html>
