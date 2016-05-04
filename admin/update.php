<?php
include('header.php');
include('../config.php');

mysql_connect($host, $user, $pass);
mysql_select_db($base) or die('Connexion impossible à la base de donnée.');

if (isset($_GET['id'])) {
    $sql = mysql_query('SELECT `id`, `nom`, `support`, `langue`, `description`, `qualite` FROM `liste`');
    $datas = mysql_fetch_array($sql);
    echo '
<form action="update.php" method="post">
<div class="field">
Id : '.$datas['id'].'
</div>
<div class="field">
Nom : '.$datas['nom'].'
</div>
<div class="field">
Support : '.$datas['support'].'
</div>
<div class="field">
Langue : '.$datas['langue'].'
</div>
<div class="field">
Description : '.$datas['description'].'
</div>
<div class="field">
Qualite : '.$datas['quantite'].'
</div>
<input type="submit" name="submit" value="Modifier">
</form>';
}

if (isset($_POST)) {
    $sql = "UPDATE `liste`
            SET `nom` = '".$_POST['nom']."',
                `support` = '".$_POST['support']."',
                `langue` = '".$_POST['langue']."',
                `description` = '".$_POST['description']."',
                `qualite` = '".$_POST['qualite']."'
            WHERE `id`= ".$_POST['id'].";";

    $res = mysql_query($sql);

    if ($res) {
        echo 'Entrée modifiée';
    } else {
        echo 'Erreur';
    }
}
