<?php
session_start();

if (isset ($_SESSION['login']) AND ($_SESSION['status'] === "admin" )){


$db = new PDO('mysql:host=localhost;dbname=projetperso', 'root','');

$req = $db->query('SELECT * FROM article_husky ORDER BY date_ajout DESC');

$posts=$req->fetchAll(PDO::FETCH_OBJ);



?>

    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="assets/css/style_affichagearticle.css">

    </head>

    <body>
        <?php require('header_admin.php') ?>

        <div class="container">
            <h1>Bienvenue
                <?= $_SESSION['author'] ?> sur l'espace de modification et suppression des articles du site internet Adopte un Husky</h1>


            <?php foreach($posts as $posts): ?>

            <article class="article-box">

                <img src="images/<?php echo $posts->image ?>" alt="Image d'origine" class="image">

                <h2 class="title"><span> Titre : <br/><?php echo $posts->titre ?></span></h2>

                <p>
                    <?php echo $posts->contenu ?> </p>

                <hr class="divider" />

                <div class="meta-cont">
                    <div class="category-cont">
                        <p><i>Créé par</i>&nbsp;
                            <?php echo $posts->author ?> &nbsp;&nbsp;<i>le</i>&nbsp;
                            <?php echo $posts->date_ajout ?>(A/M/J).</p>
                        <p><i>Dans la section / onglet : </i>&nbsp;
                            <?php echo $posts->section ?> &nbsp;&nbsp;</p>
                    </div>
                    <a href="post-delete.php?id=<?= $posts->id ?>">Selectionner cet article pour modification </a>
                </div>
            </article>



            <?php endforeach; ?>

        </div>
    </body>

    </html>
<?php
}
?>
