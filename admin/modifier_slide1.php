<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Modifier des éléments du slider</title>
  <link rel="stylesheet" href="assets/css/style_pageadmin.css" type="text/css">
  <style type="text/css">
  html{
  height:auto !important;
  }

  table {
    max-width: 1600px;
    margin-left: 15%;
    margin-right: 15%;
    background-color: lightgray;
    text-align: center;
}

th {
    height: 50px;
}
   th, td {
   border: 1px solid black;
}
  </style>
</head>
<body class="body_pageadmin">
    <?php require('header_admin.php');?>


    <h2>Bienvenue sur l'espace de de gestion du slider.</h2>
    <br/>
<div >
<h2 style="text-align:center;color:white;font-weight:lighter;"><i>Modifier des éléments du slider</i></h2>
<!--Début Formulaire qui doit envoyer uniquement in ID -->
<form action="modifier_slide2.php" method="POST">
<table cellspacing="0" cellpadding="0">
<tr><th>ID</th><th>Légende</th><th>Lien</th><th>Photo</th>

<?php

try {
	$bdd = new PDO('mysql:host=localhost;dbname=projetperso;charset=utf8', 'root', '');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

 $req ="SELECT * FROM slide";

$armoire = $bdd->query($req);

foreach($armoire  as $tiroir ){

echo '<tr><td><input type="radio" name="ID" value="'.$tiroir['ID'].'" ></td><td>'.$tiroir['legende'].'</td><td>'.$tiroir['lien'].'</td><td><img style="width:100%;" src="'.$tiroir['photo'].'"></td></tr>';
}
?>
</table>
<input type="submit" name="Modifier">

<!-- Fin formulaire -->
</form>
</div>
<?php include('footer_admin.php'); ?>
</body>
</html>
