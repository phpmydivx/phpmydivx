<?php
include('header.php');
include('../config.php');

mysql_connect($host, $user, $pass);
mysql_select_db($base) or die('Connexion impossible à la base de donnée.');
$sql = mysql_query('SELECT `id`, `nom`, `support`, `langue`, `description`, `qualite` FROM `liste`');
$nbfilms = mysql_num_rows($sql);

echo '<h1>Recherche d\'un film</h1>';

if ($_POST['type'] === 'search') {
    $sql = 'SELECT `id`, `nom`, `support`, `langue`, `description`, `qualite` FROM `liste`';

    if (isset($_POST['id'])) {
        $sql.=' AND `id` = '.(int)$_POST['id'];
    } else if (isset($_POST['nom'])) {
        $sql.=' AND `nom` LIKE "'.$_POST['nom'].'%"';
    } else if (isset($_POST['support'])) {
        $sql.=' AND `support` LIKE "'.$_POST['support'].'%"';
    } else if (isset($_POST['langue'])) {
        $sql.=' AND `langue` LIKE "'.$_POST['langue'].'%"';
    } else if (isset($_POST['description'])) {
        $sql.=' AND `description` LIKE "'.$_POST['description'].'%"';
    } else if (isset($_POST['qualite'])) {
        $sql.=' AND `qualite` LIKE "'.$_POST['qualite'].'%"';
    }

    $sql.=' ORDER BY `nom`';
    $res = mysql_query($sql);

echo '
<table>
    <tr>
        <td>Id</td>
        <td>Nom</td>
        <td>Support</td>
        <td>Langue</td>
        <td>Description</td>
        <td>Qualite</td>
        <td>Modifier</td>
        <td>Effacer</td>
    </tr>';
while ($val = mysql_fetch_array($res,$bdd)) {
echo '
    <tr>
        <td>'.$val['id'].'</td>
        <td>'.$val['nom'].'</td>
        <td>'.$val['support'].'</td>
        <td>'.$val['langue'].'</td>
        <td>'.$val['description'].'</td>
        <td>'.$val['qualite'].'</td>
        <td><a href="update.php?id='.(int)$val['id'].'">Modifier</a></td>
        <td><a href="delete.php?id='.$val['id'].'">Effacer</a></td>
    </tr>';
}
echo'
</table>';
}

echo'
<form action="recherche.php" method="post">
    <input type="hidden" name="type" value="search">
    <div class="field">
        <label>Id :</label>
        <input type="text" name="id">
    </div>
    <div class="field">
        <label>Nom :</label>
        <input type="text" name="nom">
    </div>
    <div class="field">
        <label>Langue :</label>
        <select name="langue">
            <option value="">Choisir</option>
            <option value="Français">Français</option>
            <option value="Anglais">Anglais</option>
            <option value="BivX">BivX</option>
            <option value="Autre">Autre</option>
        </select>
    </div>
    <div class="field">
        <label>Support :</label>
        <select name="support">
            <option value="">Choisir</option>
            <option value="1*650">1 cd de 650Mo</option>
            <option value="1*700">1 cd de 700Mo</option>
            <option value="2*650">2 cd de 650Mo</option>
            <option value="2*700">2 cd de 700Mo</option>
            <option value="3*650">3 cd de 650Mo</option>
            <option value="3*700">3 cd de 700Mo</option>
        </select>
    </div>
    <div class="field">
        <label>Description :</label>
        <input type="text" name="description">
    </div>
    <div class="field">
        <label>Qualite :</label>
        <select name="qualite">
            <option value="">Choisir</option>
            <option value="mauvaise">Mauvaise</option>
            <option value="moyenne">Moyenne</option>
            <option value="bonne">Bonne</option>
            <option value="excellente">Excellente</option>
        </select>
    </div>
    <input type="submit" name="submit" value="Rechercher">
</form>';

include('footer.php');
