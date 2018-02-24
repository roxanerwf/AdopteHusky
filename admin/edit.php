<?php

    session_start();


    if (isset ($_SESSION['login']) AND ($_SESSION['status'] === "admin" )){


    $db = new PDO('mysql:host=localhost;dbname=projetperso', 'root','');

    $post_id = $_GET['id'];
    $req = $db->query("SELECT * FROM article_husky WHERE id = $post_id");
    $post = $req->fetch(PDO::FETCH_OBJ);






?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="assets/css/style_edit.css">

    </head>

    <body class="body_edit">
        <?php require('header_admin.php') ?>

        <div class="page_edit">
            <h2>Bienvenue
                <?= $_SESSION['author'] ?> sur l'espace de modification de l'article du <?php echo $post->date_ajout ?? '';?>
            </h2>
            <form action="edit.php?id=<?= $post->id ?>" method="post" class="form_edit">
                <div class="form-group">
                    <h2>Editer un article</h2>
                    <label for="author">Auteur de l'article <input type="text" class="form-control" name="author" value="<?= $post->author ?? '';?>"></label>

                    <label>Veuillez choisir ici la section concernée
                <select name="section" required>
                  <option value="">Onglet actuel : <?= $post->section ?? '';?></option>
                  <option value="Origines">Origines</option>
                  <option value="Caractéristiques">Caractéristiques</option>
                  <option value="Comportement">Comportement</option>
                  <option value="Besoins">Besoins</option>
                  <option value="Education">Education</option>
                  <option value="Santé">Santé</option>
                  <option value="Elevages et activités">Elevages et activités</option>
                  <option value="Idées reçues">Idées reçues</option>
                </select>
                   </label>



                    <label for="titre">Titre <input type="text" class="form-control" name="titre" value="<?= $post->titre ?? '';?>"></label>

                    <label for="contenu">Message <textarea type="text" name="contenu" class="form-control"> <?= $post->contenu ?? '';?></textarea></label>

                    <label for="img" style="margin-bottom:5%"><p>Image</p>
                    <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                    <input type="file" name="image" id="img" onChange="readURL(this);"><img src="images/<?= $post->image ?? '';?>" alt="Image de base"><img id="preview" src="http://placehold.it/120" alt="your image" /></label>

                    <input type="hidden" name="id" value="<?= $post->id ?>">

                </div>
                <br>
                <input class="" type="submit" name="editer" value="Editer mon article">

            </form>
        </div>

        <?php include('footer_admin.php'); ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="assets/js/image_formulaire.js"></script>
    </body>

    </html>

    <?php
    if($_POST){
    $author = $_POST['author'];
    $section = $_POST['section'];
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $image = $_FILES['image'];
    $id = $_POST['id'];

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


    $sql = $db->prepare("UPDATE article_husky SET author = :author, section = :section, titre = :titre, contenu = :contenu, image = :image, date_ajout = NOW() WHERE id = :id");

    $post = $sql->execute([
        'author' => $author,
        'section' => $section,
        'titre' => $titre,
        'contenu' => $contenu,
        'image' => $nom_image,
        'id' => $id // necessaire? l'ordre peut etre?
        //manque-t-il la date?
    ]);
    header('Location: edit.php?id='.$id);
}



}
?>
