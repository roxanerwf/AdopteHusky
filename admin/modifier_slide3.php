<?php
try {
	$bdd = new PDO('mysql:host=localhost;dbname=projetperso;charset=utf8', 'root', '');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

if(isset($_FILES)){

	if($_FILES['image']['size'] < 1048576) {
		// reprendre le nom de l'ancienne image
	 	$nom_image = $_POST['image_old'];
 		// charger l'image avec
		move_uploaded_file($_FILES['image']['tmp_name'],$nom_image);
	}else {
 		echo 'La photo est trop grande';
	}

}
//sinon !!
//dans tout cas on update le nom et la race
$req= " UPDATE `slide` SET legende=:legende WHERE  ID=:ID";
 $res=$bdd->prepare($req);
 $fonc= $res->execute(array('legende'=>$_POST['legende'],'ID'=> $_POST['ID'] ));
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link href="tuto.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style_pageadmin.css" type="text/css">
  <title>Modifier le slider </title>
	<style>html{height:100%;}</style>
 </head>
 <body class="body_pageadmin">
     <?php require('header_admin.php');?>

     <h2>Bienvenue sur l'espace de de gestion du slider.</h2>
		 <div class="form_admin">
<?php
//message en cas d'erreur
if($fonc)   echo " Le slider à bien été mis à jour" ;
else echo " Désolé, il y avait une erreur de soumission ";
?>
</div>
<button class="btn_connexion" onClick="window.location.href='../index.php'">Retour au Site</button>
 <?php include('footer_admin.php'); ?>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <script src="assets/js/image_formulaire.js"></script>
 </body>
 </html>
