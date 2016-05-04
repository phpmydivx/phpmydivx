<?php
include('pass.php');

echo "<html>
<title>Php My DivX v1.5 - Administration </title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<link rel='stylesheet' href='polices.css' type='text/css'></head><body bgcolor='#000000'>";

if ($pass != $password) {
    if (isset($pass)) {
        echo "<p><center><font face=verdana color=FF0000>! FALSE PASSWORD ! ACCESS DENIED ! AGAIN SHOOT !</font></p></center>";
    }
    echo "<br><br><center><form action='index.php' method=POST>
	<br><br><div align=center><img src='logo.gif' border=0></div><br><br>

	<br><font class='text5'>Veuillez entrer le mot de passe:</font><br><br>
    <font class='text6'>Password:</font>
    <INPUT TYPE=Password NAME=pass SIZE=15 style='border-style: solid; border-width: 2; background-color: #3B3B3B; color: #708090; font-weight: bold'> 
	<INPUT TYPE=Submit VALUE= ENTER style='border-style: solid; border-width: 1; background-color: #3B3B3B; color: #708090'>
    </form></center>";
	echo "<center><br><font class='text0'>| <a href='http://PhpMyDivX.free.fr'>http://PhpMyDivX.free.fr</a> | Copyright PhpMyDivX® 2001 - 2002 |</font></center>";
    echo "</body></html>";
    exit;
}
echo "<div align='center'><img src='logo.gif' border=0></div><br><br>";
echo "<br><br><br><div align=center><font class='text7'>Bonjour, vous pouvez acceder aux differentes parties d'admin du site.</p>";
echo "[&nbsp;<a href='nouveau.php'>Ajouter un film</a>&nbsp;]&nbsp;&nbsp;&nbsp;";
echo "[&nbsp;<a href='recherche.php?task=2'>Modifier la base de donnée</a>&nbsp;]&nbsp;&nbsp;&nbsp;";
echo "<center><br><font class='text0'>| <a href='http://PhpMyDivX.free.fr'>http://PhpMyDivX.free.fr</a> | Copyright PhpMyDivX® 2001 - 2002 |</font></center>";
echo "</div></body></html>";
