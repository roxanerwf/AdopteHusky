<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link href="tuto.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style_pageadmin.css" type="text/css">
  <title>Ajouter dans slider </title>
  <style>html{height:100%;}</style>
 </head>
 <body class="body_pageadmin">
     <?php require('header_admin.php');?>


     <h2>Bienvenue sur l'espace de de gestion du slider.</h2>



     <div class="form_admin">
<h1>Ajouter une photo et une légende dans le slider</h1>
<form method="POST" action="ajouter2.php" enctype="multipart/form-data">
<p>Légende <input type="text"  name="legende" ></p>
<p>Lien <input type="text"  name="lien" ></p>
<p> <input  type="FILE" name="photo">
<input type="submit" name="Envoyer" value="Enregistrer" />
</form>
</div>
<?php include('footer_admin.php'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="assets/js/image_formulaire.js"></script>
</body>
</html>
