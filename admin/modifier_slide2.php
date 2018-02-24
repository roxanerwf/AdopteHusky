<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Modifier le slider</title>
  <link rel="stylesheet" href="assets/css/style_pageadmin.css" type="text/css">
  <style>html{height:100%;}</style>
</head>
<body class="body_pageadmin">
<?php
try {
	$bdd = new PDO('mysql:host=localhost;dbname=projetperso;charset=utf8', 'root', '');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
$ID= (int)$_POST['ID'];

$req1 = $bdd->prepare('SELECT * FROM `slide` WHERE ID = :ID');

 $req1->execute(array('ID'=> $ID));
$resultat=$req1->fetch(PDO::FETCH_ASSOC);

?>
<?php require('header_admin.php');?>


    <h2>Bienvenue sur l'espace de de gestion du slider.</h2>
    
    <h2 style="text-align:center;color:white;font-weight:lighter;"><i>Modifier des éléments du slider</i></h2>
<div class="form_admin">
<form method="POST" action="modifier_slide3.php" enctype="multipart/form-data">
 <input type="hidden"  name="ID" value ="<?php echo $ID;?>"></p>
<img style="width:100%;height:auto;" src="<?php echo $resultat['photo'];?>" alt="">
<input type="hidden"  name="image_old" value="<?php echo $resultat['photo'];?>" >
<p>Légende <input type="text"  name="legende" value ="<?php echo $resultat['legende'];?>"></p>
<p>Lien <input type="text"  name="lien" value ="<?php echo $resultat['lien'];?>"></p>


<p> <input  type="FILE" name="image"></p>
<input type="submit" name="Envoyer" value="Enregistrer" />
</form>
</div>
	<?php include('footer_admin.php'); ?>
</body>
</html>
