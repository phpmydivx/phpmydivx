<?php
include('header.php');
include('../config.php');

if (!empty($_GET['id'])) {
    echo 'Vous ếtes certain de supprimer cet enregistrement ?<br>
    <a href="remove.php?confirm='.(int)$_GET['id'].'">Ok</a> - <a href="javascript:history.back();">Annuler</a>';
}

if (!empty($_GET['confirm'])) {
    $sql = "DELETE FROM `liste` WHERE id = ".(int)$_GET['confirm'].";";
    $res = mysql_query($sql);

    if ($res) {
        echo 'Supprimée !<br>
        <a href="recherche.php">Autre recherche</a><br>
        <a href="../index.php">Retour à la liste</a>';
    } else {
        echo 'Erreur lors de la suppression';
    }
}
