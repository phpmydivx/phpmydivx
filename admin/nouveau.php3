<? 

echo "<center>";
echo "<body bgcolor='#ffffff'>";
echo "<b><font color='#336699' size='4' face='Arial, Helvetica, sans-serif'>Ajout d'un Film</font></b><br>";
include('../config.php3'); 
echo "<img src='koyot.jpg' width='157' height='131' alt='Oh un coyote !'><br>";
mysql_connect($host, $user, $pass);
mysql_select_db($base) or die( "Connexion impossible � la base de donn�e !!!!!!");
$sql = mysql_query("SELECT * FROM liste");
$numfilms = mysql_num_rows($sql);
echo " <font color='#336699'> Actuellement $numfilms films dans la base de donn�e</font> ";
mysql_close();
echo "<br><br><form name='form1' method='post' action=''>";
echo "<p><font size='2' face='Arial, Helvetica, sans-serif'>Nom du film : <br>";
echo "<input type='' name='nom' size='40'>";
echo "</font></p>";
echo "<p><font face='Arial, Helvetica, sans-serif' size='2'>Langue:<br>";
echo "<select name='langue' size='1'>";
echo "<option value='Fran�ais'>Fran�ais</option>";
echo "<option value='Anglais'>Anglais</option>";
echo "<option value='BivX'>BivX</option>";
echo "<option value='Autre'>Autre</option>";
echo "</select>";
echo "</font></p>";
echo "<p><font size='2' face='Arial, Helvetica, sans-serif'>Support : <br>";
echo "<select name='support' size='1'>";
echo "<option value='1*650'>1 cd de 650 Mo</option>";
echo "<option value='1*700'>1 cd de 700 Mo</option>";
echo "<option value='2*650'>2 cd de 650 Mo</option>";
echo "<option value='2*700'>2 cd de 700 Mo</option>";
echo "<option value='3*650'>3 cd de 650 Mo</option>";
echo "<option value='3*700'>3 cd de 700 Mo</option>";
echo "</select>";
echo "</font></p>";
echo "<p><font size='2' face='Arial, Helvetica, sans-serif'>Description :<br>";
echo "<input type='text' name='description' size='30'>";
echo "</font></p>";
echo "<p><font size='2' face='Arial, Helvetica, sans-serif'>Qualit�  : <br>";
echo "<font size='2' face='Arial, Helvetica, sans-serif'><select name='qualite' size='1'>";
echo "<option value='mauvaise'>Mauvaise</option>";
echo "<option value='moyenne'>Moyenne</option>";
echo "<option value='bonne'>Bonne</option>";
echo "<option value='excellente'>Excellente</option>";
echo "</select></font>";
echo "</p>";
echo "<p> <font size='2' face='Arial, Helvetica, sans-serif'>";
echo "<input type='submit' name='Submit' value='Envoyer' action='nouveau.php3'>";
echo "<input type='hidden' name='posted' value='1'>";
echo "</font> </p>";
echo "</form>";
function debut() {
  }
if(isset($posted)):
include "../config.php3";
$mysql_link = mysql_connect($host,$user,$pass);
mysql_select_db($base, $mysql_link);
$query = "insert into liste VALUES(NULL, '$nom', '$support', '$langue', '$description', '$qualite')";
mysql_query($query, $mysql_link);
print("<b><font color=red face='Arial' size='2'>Les donn�es ont bien �t� entr�es</font></b>");
debut();
else:
debut();
endif;
?>