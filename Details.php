<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=forum_php;charset=utf8", "root", "");
if (isset($_GET['id']) and !empty($_GET['id'])) {
    $get_id = htmlspecialchars($_GET['id']);
    $article = $bdd->prepare('SELECT * FROM f_topics WHERE id = ?');
    $article->execute(array($get_id));
    if ($article->rowCount() == 1) {
        $article = $article->fetch();
        $titre = $article['sujet'];
        $contenu = $article['contenu'];
    } else {
        die('Cet article n\'existe pas !');
    }
} else {
    die('Erreur');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Accueil</title>
    <meta charset="utf-8">
</head>

<body>
    <h1><?= $titre ?></h1>
    <p><?= $contenu ?></p>
</body>

</html>