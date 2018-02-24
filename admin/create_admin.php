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
        <link rel="stylesheet" href="assets/css/style_pageadmin.css" type="text/css">
    </head>

    <body class="body_pageadmin">
        <?php require('header_admin.php');?>


        <h2>Bonjour <?php echo ' '.$_SESSION['author']?>. Bienvenue sur l'espace de création d'article.</h2>


        <!-- Formulaire - id / author / section / titre / contenu / image / date------>
        <div class="form_admin">
            <h2>Formulaire de création d'article</h2>
            <form class="form_create" method="post" action="create_admin.php" enctype="multipart/form-data">

                <input type="hidden" name="author" value="<?= $_SESSION['author']?>"/>

                <span>Veuillez choisir ici la section concernée</span>
                <select id="soflow" name="choix_section" required>
                  <option value="">Choix de la section/onglet</option>
                  <option value="Origines">Origines</option>
                  <option value="Caractéristiques">Caractéristiques</option>
                  <option value="Comportement">Comportement</option>
                  <option value="Besoins">Besoins</option>
                  <option value="Education">Education</option>
                  <option value="Santé">Santé</option>
                  <option value="Elevages et activités">Elevages et activités</option>
                  <option value="Idées reçues">Idées reçues</option>
                </select>


                <input type="text" name="titre" value="" placeholder="Titre de l'article" required/>

                <textarea name="contenu" id="" cols="106" rows="40" placeholder="Contenu de l'article" required></textarea>

                <label for="images">Upload de l'image</label><input type="file" name="image" id="images" onChange="readURL(this);" required/><img id="preview" src="http://placehold.it/120" alt="Votre image" />

                <input type="submit" name="valider" value="Envoyer le nouvel article sur Adopte un Husky"/>

            </form>

        </div>

        <?php include('footer_admin.php'); ?>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="assets/js/image_formulaire.js"></script>
    </body>

    </html>

    <?php
}
?>



<!--- Traitement formulaire + ajout ----------------------------------------->


<?php

    $bdd = new PDO('mysql:host=localhost;dbname=projetperso;charset=utf8', 'root', '');



    if($_POST){
    $author=$_POST["author"];
    $choix_section=$_POST["choix_section"];
    $titre=$_POST["titre"];
    $contenu=$_POST["contenu"];


//l'upload du fichier imag : si le fichier n'est pas trop grand (risque de saturation de la E.H)
     if($_FILES['image']['size'] < 1048576) {
        // génération d'un nom au hasard du fichier image
        $nom_image = md5(uniqid(rand(), true)).'.png';
        // charger l'image avec le nouveau nom généré et le stocker dans image
        move_uploaded_file($_FILES['image']['tmp_name'],'images/'.$nom_image);
        echo 'Envoi image ok';
    }else {
        echo 'Envoi image a echoué';
    }




        //requete à la bdd

    $sql = $bdd->prepare('INSERT INTO article_husky SET author = :author, section = :section, titre = :titre, contenu = :contenu, image = :image, date_ajout = NOW()');

        // execution requete
    $edit = $sql->execute([
        'author' => $author,
        'section' => $choix_section,
        'titre' => $titre,
        'contenu' => $contenu,
        'image' => $nom_image,
    ]);

    echo '<p class="alert_upload">L\'article a bien été uploadé.<br/> Vous pouvez vous rendre dans l\'onglet pour voir l\'ajout en cliquant ici : <a href="../index.php/'.$choix_section.'">Se rendre à la page de l\'article</a> &nbsp; ou vous deconnecter en cliquant ici : <a href="page_admin.php">Se deconnecter</a></p>';
}


?>




 <!-- Ancien message si upload reussi ou non

   echo '<p class="alert_upload">Le fichier de l\'image a bien été uploadé. Vous pouvez vous rendre dans l\'onglet pour voir l\'ajout en cliquant ici : <a href="index.php/'.$choix_section.'">Se rendre à la page de l\'article</a> ou vous deconnecter en cliquant ici : <a href="page_admin.php">Se deconnecter</a></p>';
    }else {
        echo '<p class="alert_upload">Attention, le fichier de l\'image est trop grand/lourd. Veuillez remplir le formulaire à nouveau en cliquant ici : <a href="page_admin.php">Formulaire d\'ajout</a></p>';
    }
-->
