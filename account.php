<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=forum_php', 'root', '');

if (isset($_GET['id']) and $_GET['id'] > 0) {
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
?>
    <html>

    <head>
        <title>TUTO PHP</title>
        <meta charset="utf-8">
    </head>

    <body>
        <div align="center">
            <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
            <br /><br />
            Pseudo = <?php echo $userinfo['pseudo']; ?>
            <br />
            Mail = <?php echo $userinfo['mail']; ?>
            <br />
            <?php
            if (isset($_SESSION['id']) and $userinfo['id'] == $_SESSION['id']) {
            ?>
                <br />
                <a href="edit_account.php">Editer mon profil</a>
                <a href="deconnexion.php">Se déconnecter</a>
            <?php
            }
            ?>
        </div>
    </body>

    </html>
<?php
}
?>