<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();


if (isset ($_SESSION['login']) AND ($_SESSION['status'] === "admin" )){
   ?>

    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <title>Page Administrateur</title>
        <link rel="stylesheet" href="assets/css/style_admin.css" type="text/css">
    </head>

    <body class="body_admin">
        <?php require('header_admin.php');?>


        <h2>Bonjour <?php echo ' '.$_SESSION['author']?>. Bienvenue sur l'espace administrateur.</h2>


       <div class="button_admin">
         <p><i>Gérer les articles</i></p>
           <a href="create_admin.php"><button class="btn">Créer un article</button></a>
           <a href="affichage_article.php"><button class="btn">Modifier ou Supprimer un article</button></a>
           <a href="logout.php"><button class="btn">Se deconnecter</button></a>
           <br/><br/>


         <p><i>Gérer les élement du slider</i></p>
         <a href="ajouter1.php"><button class="btn">Ajouter un élément</button></a>
         <a href="modifier_slide1.php"><button class="btn">Modifier un élément</button></a>
         <a href="supprimer1.php"><button class="btn">Supprimer un élément</button></a>
       </div>

        <?php include('footer_admin.php'); ?>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="assets/js/image_formulaire.js"></script>
    </body>

    </html>

    <?php
}
?>
