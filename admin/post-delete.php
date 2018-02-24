<?php
session_start();

$db = new PDO('mysql:host=localhost;dbname=projetperso', 'root','');


if (isset ($_SESSION['login']) AND ($_SESSION['status'] === "admin" )){

if(isset($_POST['delete'])){
    $delete_id = $_POST['delete_id'];
    $req=$db->prepare("DELETE FROM article_husky WHERE id = ?");
  $response = $req->execute([$delete_id]);
    if($response){
        header('Location:affichage_article.php');
    }
}
}


if (isset ($_SESSION['login']) AND ($_SESSION['status'] === "admin" )){

$id=$_GET['id'];
$req = $db->query("SELECT * FROM article_husky WHERE id = $id");

$posts=$req->fetch(PDO::FETCH_OBJ);



?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="assets/css/style_affichagearticle.css">
    </head>

    <body>
        <?php require('header_admin.php') ?>

        <div class="container">
            <h1>Bienvenue
                <?= $_SESSION['author'] ?> sur l'espace de modification et suppression de l'article du <?php echo $posts->date_ajout ?>
            </h1>

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
                    <a href="edit.php?id=<?= $posts->id  ?>"><button class="btn">Editer cet article</button></a>
                    <div class="pull-right">
                        <form action="post-delete.php" method="post">
                            <input type="hidden" name="delete_id" value="<?= $posts->id ?>">
                            <a style="float:right;margin-top:-20px;"><input type="submit" name="delete" value="&#9888;Supprimer cet article&#x26A0;"></a>
                        </form>
                    </div>
                </div>
            </article>
        </div>
        <?php include('footer_admin.php'); ?>
    </body>

    </html>

    <?php
}
?>
