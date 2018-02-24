<?php

try {
	$bdd = new PDO('mysql:host=localhost;dbname=projetperso;charset=utf8', 'root', '');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
//récup de l'identifiant de l'enregistrement
$ID= (int)$_POST['ID'];
//préparer la requete qui permet de récupérer l'adresse de l'image à supprimer
$req1 = $bdd->prepare('SELECT photo FROM `slide` WHERE ID = :ID');
//fournir l'identifiant
$req1->execute(array('ID'=> $ID));
//chercher les resultat
	$donnees = $req1->fetch(PDO::FETCH_ASSOC);
	 $image = $donnees['photo'];
//supprimer l'image
 	//if(unlink($image )) echo "La photo a été supprimée<br>" ;
/**********************Supprimer l'enregistrement ***************/
//préparation de la requête ( testez la sur phpmyadmin)( la clause WHERE est une condition sql)
$req= " DELETE FROM `slide` WHERE ID = :ID";
// la requête préparer
            $statement = $bdd -> prepare($req);
//Fournir le ID
            $statement -> BindParam('ID', $ID, PDO::PARAM_INT);
//exécution de la requête
            $result = $statement -> execute();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link href="tuto.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style_pageadmin.css" type="text/css">
  <title>Modifier le slider </title>
	<style>html{height:auto;}</style>
 </head>
 <body class="body_pageadmin">
     <?php require('header_admin.php');?>

     <h2>Bienvenue sur l'espace de de gestion du slider.</h2>
		 <div class="form_admin">
<?php
//message en cas d'erreur
if($result)  {
	echo " Les éléments ont bien été supprimés" ;
}
else echo " Désolé, il y avait une erreur de soumission ";
?>
</div>
<button class="btn_connexion" onClick="window.location.href='../index.php'">Retour au Site</button>
 <?php include('footer_admin.php'); ?>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <script src="assets/js/image_formulaire.js"></script>
 </body>
 </html>
