<?php
include('header.php');

if ($_POST['password'] !== PASSWORD) {
    if (isset($pass)) {
        echo '<div class="error">! FALSE PASSWORD ! ACCESS DENIED ! AGAIN SHOOT !</div>';
    }
    echo '
    <form action="index.php" method="post">
	<div>Veuillez entrer le mot de passe:</div>
    <label>Password:</label>
    <input type="password" name="password">
    <input type="submit">
    </form>';
} else {
    echo '
    <p>Bonjour, vous pouvez accéder aux différentes parties d\'administration du site.</p>
    [ <a href="nouveau.php">Ajouter un film</a> ]
    [ <a href="recherche.php">Rechercher un film</a> ]
    ';
}

include('footer.php');
