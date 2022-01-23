<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=php_exam;charset=utf8", "root", "");
$articles = $bdd->query('SELECT * FROM articles ORDER BY date_heure_creation DESC');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Accueil</title>
    <meta charset="utf-8">
</head>

<body>
    <ul>
        <?php while ($a = $articles->fetch()) { ?>
            <li><a href="details.php?id=<?= $a['id'] ?>"><?= $a['sujet'] ?></a> | <a href="redaction.php?edit=<?= $a['id'] ?>">Modifier</a> | <a href="supprimer.php?id=<?= $a['id'] ?>">Supprimer</a></li>
        <?php } ?>
        <ul>
</body>

</html>