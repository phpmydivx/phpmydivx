<?
include('config.php');
$duree_estimee=120;
$limite = time() + $duree_estimee;
$db = mysql_connect($host, $user, $pass); 
mysql_select_db('koyot',$db); 
mysql_query("DELETE FROM nbconnecte WHERE ip='$REMOTE_ADDR' OR date<".time());
mysql_query("INSERT INTO nbconnecte (id,ip,date) VALUES ('0','$REMOTE_ADDR','$limite')"); 
$result = mysql_query("SELECT COUNT(id) FROM nbconnecte");
$row = mysql_fetch_row($result);
echo"Il y a <b>$row[0]</b> personne sur le site";
?>