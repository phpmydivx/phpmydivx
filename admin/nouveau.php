<?php
include('header.php');
include('../config.php');

mysql_connect($host, $user, $pass);
mysql_select_db($base) or die('Connexion impossible à la base de donnée.');
$sql = mysql_query('SELECT `id`, `nom`, `support`, `langue`, `description`, `qualite` FROM `liste`');
$nbfilms = mysql_num_rows($sql);

echo '<h1>Ajout d\'un Film</h1>
<p>Actuellement '.$nbfilms.' films dans la base de donnée</p>

<form method="post" action="nouveau.php">
<label>Nom du film</label>
<input type="text" name="nom" size="40">

<label>Langue</label>
<select name="langue">
    <option value="Français">Français</option>
    <option value="Anglais">Anglais</option>
    <option value="BivX">BivX</option>
    <option value="Autre">Autre</option>
</select>

<label>Support</label>
<select name="support">
    <option value="1*650">1 cd de 650Mo</option>
    <option value="1*700">1 cd de 700Mo</option>
    <option value="2*650">2 cd de 650Mo</option>
    <option value="2*700">2 cd de 700Mo</option>
    <option value="3*650">3 cd de 650Mo</option>
    <option value="3*700">3 cd de 700Mo</option>
</select>

<label>Description</label>
<input type="text" name="description">

<label>Qualité</label>
<select name="qualite">
<option value="mauvaise">Mauvaise</option>
<option value="moyenne">Moyenne</option>
<option value="bonne">Bonne</option>
<option value="excellente">Excellente</option>
</select>

<input type="submit" name="submit" value="Envoyer">
</form>';

if (isset($_POST['submit'])) {
    $query = "INSERT INTO `liste` VALUES (NULL, '$nom', '$support', '$langue', '$description', '$qualite')";
    mysql_query($query, $mysql_link);
    echo 'Les données ont bien été enregistrées.';
}

include('footer.php');