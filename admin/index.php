<!DOCTYPE html>
<html lang="fr">

<head id="head">
    <meta charset="UTF-8" content="text/html" http-equiv="content-type">
    <link rel="stylesheet" href="assets/css/style_connexion.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Page de connexion Administrateur</title>
</head>

<body class="body_connexion">
   <header>
       <?php include 'header_admin.php'; ?>
   </header>
    <div class="page_connexion">
        <div id="titre_principal">
            <h1> Bienvenue sur la page de connexion Administrateur.</h1>
        </div>
        <form action="index.php" method="post">
            <!--<label for="text">Pseudo</label>-->
            <input type="text" name="login" placeholder="Votre nom" />
            <!--<label for="password">Mot de passe</label>-->
            <input type="password" name="pwd" placeholder="Votre mot de passe" />
            <input type="submit" value="Connexion" />
        </form>
    </div>
    <button class="btn_connexion" onClick="window.location.href='../index.php'">Retour au Site</button>

<?php
if(isset($_POST) and !empty($_POST['pwd']) and !empty($_POST['login'])){

$bdd = new PDO('mysql:host=localhost;dbname=projetperso;charset=utf8', 'root', '');

$pseudo = $_POST['login'];
$pass = $_POST['pwd'];

// Vérification des identifiants
$req = $bdd->prepare('SELECT * FROM user_husky WHERE login = :nom AND pwd = :password');
$req->execute(array(
    ':nom' => $pseudo,
    ':password' => $pass));

$resultat = $req->fetch();

if (!$resultat)
{
    echo '<body onLoad="alert(\'Membre non reconnu...\')">';
}
else
{
    session_start();
    $_SESSION['status'] = $resultat['status']; // la collone categorie = 0,1,2 ... vis.admin,superadmin
    $_SESSION['login'] = $pseudo;
    $_SESSION['author'] = $resultat['author'];
    if($resultat['status'] === "admin"){
    echo 'Vous êtes connecté en tant que admin !';
    header("Location: page_admin.php");
    }
    elseif($resultat['status'] === "membre"){
        echo 'Vous êtes connecté en tant que membre !';
    header("Location: page_membre.php");
    }
    else{
        echo 'Vous n\'avez pas acces à cette section du site !';
    }
    exit();

}
}
else {
echo '<div style="margin:0 auto; text-align:center; width:300px; margin-top:10px; color:black;margin-bottom: 260px;"><i>Veuillez remplir le formulaire.</i></div>';
//echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}
?>
<?php include 'footer_admin.php'; ?>

<script src="assets/js/main.js"></script>

</body>

</html>
