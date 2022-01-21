<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=forum_php;charset=utf8', 'root', '');
session_start();
if (isset($_GET['type']) and $_GET['type'] == 'membre') {

    if (isset($_GET['supprime']) and !empty($_GET['supprime'])) {
        $supprime = (int) $_GET['supprime'];
        $req = $bdd->prepare('DELETE FROM membres WHERE id = ?');
        $req->execute(array($supprime));
    }
}
$membres = $bdd->query('SELECT * FROM membres ORDER BY id DESC LIMIT 0,5');

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Administration</title>
</head>

<body>
    <ul>
        <?php while ($m = $membres->fetch()) { ?>
            <li><?= $m['id'] ?> : <?= $m['pseudo'] ?> - <a href="index.php?type=membre&supprime=<?= $m['id'] ?>">Supprimer</a></li>
        <?php } ?>
    </ul>
</body>

</html>