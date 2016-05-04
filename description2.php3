<HTML>
<HEAD>
<? echo "<html>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'><link rel =  'stylesheet'
	href			   =  'polices.css' 
	type			   =  'text/css'></head><body bgcolor='#ffffff'>";
?>
<SCRIPT LANGUAGE="JavaScript">
function ChangeUrl(formulaire)
	{
if (formulaire.ListeUrl.selectedIndex != 0)
		{
		location.href = formulaire.ListeUrl.options[formulaire.ListeUrl.selectedIndex].value;
	 	}
else 
		{
		alert('Veuillez choisir une destination.');
		}
	}
</SCRIPT>
<? include('config.php3'); ?>
<STYLE>

INPUT.formu { font-size:10px; color: #FFFFFF; background-color: #C0C0C0; font-family: Verdana,sans-serif; font-weight: 100; border: 2 solid <? echo"$tabletop"; ?>}
A {COLOR: black; TEXT-DECORATION: none}
A:hover {COLOR: <? echo"$tabletop"; ?>; TEXT-DECORATION: none}
BODY {scrollbar-face-color: <? echo"$tabletop"; ?>; scrollbar-shadow-color: #000000;
scrollbar-highlight-color: #FFFFFF;scrollbar-3dlight-color: #000000; scrollbar-darkshadow-color: #000000; scrollbar-track-color: <? echo"$tabletop"; ?>; scrollbar-arrow-color: #FFFFFF}
</STYLE>
<script>
<!-- 

// La largeur de l'infobulle.
var tickerwidth=120
// La hauteur de l'infobulle.
var tickerheight=110
// La distance entre le bord et le texte.
var tickerpadding=6
// La largeur du bord.
var borderwidth=1
// La police de caractères.
var fnt="Arial"
// La taille du caractère.
var fntsize=8
// La taille du dernier caractère .
var fntsizelastletter=8
// La couleur des caractères.
var fntcolor="008800"
// La couleur du dernier caractère.
var fntcolorlastletter="00AA00"
// La graisse du dernier caractère de 1 à 9 (gras).
var fntweight=3
// La couleur d'arrière-plan de l'infobulle.
var backgroundcolor="CCFFCC"
// Le temps de pause entre les messages.
var standstill=2000
// La vitesse (plus = moins vite).
var speed=30
// La distance horizontale entre le lien et l'infobulle.
var xdistance=30
// La distance verticale entre le lien et l'infobulle.
var ydistance=10

///////////////////////////////////////////////
var timer
var topposition=0
var leftposition=0
var x,y
var i_substring=0
var i_presubstring=0
var i_message=0
var message
var messagecontent=""
var messagebackground=""
var messagepresubstring=""
var messageaftersubstring=""
fntweight=fntweight*100

function getmessagebackground() {
	messagebackground="<table border="+borderwidth+" width="+tickerwidth+" height="+tickerheight+" cellspacing=0 cellpadding=0><tr><td valign=top bgcolor='"+backgroundcolor+"'>"
	messagebackground+="&nbsp;</td></tr></table>"
}

function getmessagecontent() {	
	messagecontent="<table border=0 cellspacing=0 cellpadding="+tickerpadding+" width="+tickerwidth+" height="+tickerheight+"><tr><td valign=top>"
	messagecontent+="<span style='position:relative; font-family:"+fnt+";color:"+fntcolor+";font-size:"+fntsize+"pt;font-weight:"+fntweight+"'>"	
	messagecontent+="<font color='"+fntcolor+"'>"
	messagecontent+=messagepresubstring
	messagecontent+="</font>"
	messagecontent+="</span>"
	messagecontent+="<span style='position:relative; font-family:"+fnt+";color:"+fntcolor+";font-size:"+fntsizelastletter+"pt;font-weight:900'>"	
	messagecontent+="<font color='"+fntcolorlastletter+"'>"
	messagecontent+=messageaftersubstring
	messagecontent+="</font>"
	messagecontent+="</span>"
	messagecontent+="</td></tr></table>"
}

function showticker() {
	if (i_substring<=message.length-1) {
	i_substring++
	i_presubstring=i_substring-1
	if (i_presubstring<0) {i_presubstring=0}
        messagepresubstring=message.substring(0,i_presubstring)
        messageaftersubstring=message.substring(i_presubstring,i_substring)
	getmessagecontent()
	if (document.all) {
	ticker.innerHTML=messagecontent
	timer=setTimeout("showticker()", speed)
	}
	if (document.layers) {
	document.ticker.document.write(messagecontent)
	document.ticker.document.close()
	timer=setTimeout("showticker()", speed)
	}
	}
	else {
	clearTimeout(timer)
	}
}

function hideticker() {
	clearTimeout(timer)
	i_substring=0
	i_presubstring=0
	if (document.all) {
	document.all.ticker.style.visibility="hidden"
        document.all.tickerbg.style.visibility="hidden"
	}
	if (document.layers) {
	document.ticker.visibility="hidden"
        document.tickerbg.visibility="hidden"
	}
}

function showmessage(linkmessage) {
	getmessagebackground()
	message=linkmessage
   	i_substring=0
	i_presubstring=0
	leftposition=x+xdistance
	topposition=y+ydistance
	if (document.all) {	
	document.all.ticker.style.posLeft=leftposition
	document.all.ticker.style.posTop=topposition
	document.all.tickerbg.style.posLeft=leftposition
	document.all.tickerbg.style.posTop=topposition
	tickerbg.innerHTML=messagebackground
        document.all.ticker.style.visibility="visible"
        document.all.tickerbg.style.visibility="visible"
	showticker()
	}
	if (document.layers) {
        document.ticker.left=leftposition
	document.ticker.top=topposition
	document.tickerbg.left=leftposition
	document.tickerbg.top=topposition
	document.tickerbg.document.write(messagebackground)
	document.tickerbg.document.close()
        document.ticker.visibility="visible"
        document.tickerbg.visibility="visible"
	showticker()
	}
}

function handlerMM(e){
	x = (document.layers) ? e.pageX : document.body.scrollLeft+event.clientX
	y = (document.layers) ? e.pageY : document.body.scrollTop+event.clientY
}

if (document.layers){
	document.captureEvents(Event.MOUSEMOVE);
}
document.onmousemove = handlerMM;
// -->
</script>
</HEAD>

<DIV ID="tickerbg" style="position:absolute;"></DIV>
<DIV ID="ticker" style="position:absolute;"></DIV>
<center>
<table border=1 cellpadding=2 cellspacing=0 bordercolordark=#FFFFFF bordercolorlight=#666666 width=800>
  <tr> 
    <td width=100% height="63"> 
      <center>
        <b><font size=2 face=arial, helvetica, geneva> 
        <div align="center"><b><img src="logo.gif" width="300" height="100"></b></div>
        </font></b> 
      </center>
    </td>
  </tr>
</table>
<br>
<table border=1 cellpadding=2 cellspacing=0 bordercolordark=#FFFFFF bordercolorlight=#666666 width=800>
  <tr bgcolor=<? echo"$tabletop"; ?>> 
    <td width=100%> 
      <center>
        <b><font size=2 face=arial, helvetica, geneva><marquee> 
        <? include('http://phpmydivx.free.fr/version.txt'); ?>
        </marquee></font></b> 
      </center>
    </td>
  </tr>
</table>
<br>
<table border=1 cellpadding=2 cellspacing=0 bordercolordark=#FFFFFF bordercolorlight=#666666 width=800>
  <tr bgcolor=<? echo"$tabletop"; ?>> 
    <td width=100%>
      <center>
        <b><font size=2 face=arial, helvetica, geneva> 
        <div align="center">[ <a href="/admin"><font color=black>Administration</font></a> 
          ]</div>
        </font></b>
      </center>
    </td>
  </tr>
</table>
<br>

<table border=1 cellpadding=2 cellspacing=0 bordercolordark=#FFFFFF bordercolorlight=#666666 width=800>

<tr bgcolor=<? echo"$tabletop"; ?>>

<td width=100%><center><b><font size=2 face=arial, helvetica, geneva>

<?

          //Nb de personnes sur le site

          include('connectes.inc');

        ?>

<?

mysql_connect($host, $user, $pass);

mysql_select_db($base) or die( "Connexion impossible à la base de donnée !!!!!!");

$sql = mysql_query("SELECT * FROM liste");

$numfilms = mysql_num_rows($sql);



echo " | Je possède actuellement $numfilms films | ";



mysql_close();



?>

<?

$fp = fopen("compteur.txt","r+"); 

$nbvisites = fgets($fp,11);       

$nbvisites++;                    

fseek($fp,0);                     

fputs($fp,$nbvisites);           

fclose($fp);                      

print("$nbvisites visiteurs");   

?></td></tr></table><br>





<table border=1 cellpadding=2 cellspacing=0 bordercolordark=#FFFFFF bordercolorlight=#666666 width=800>

<tr bgcolor=<? echo"$tabletop"; ?>>

    <td width=100%><center><b><font size=2 face=arial, helvetica, geneva> 

      <table border=1 cellpadding=2 cellspacing=0 bordercolordark=#FFFFFF bordercolorlight=#666666 width=100%>

        <tr>

          <td> 

            <div align="center"><b><font face="Tahoma"><a href="index.php3">Titre</a></font></b></div>

          </td>

          <td>

            <div align="center"><b><font size="2" face="Tahoma"><a href="support.php3">Support</a></font></b></div>

          </td>

          <td>

            <div align="center"><b><font face="Tahoma" size="2"><a href="langue.php3">Langue</a></font></b></div>

          </td>

          <td>

            <div align="center"><b><font face="Tahoma" size="2"><a href="qualite.php3">Qualite</a></font></b></div>

          </td>

          <td>

            <div align="center"><b><font face="Tahoma" size="2"><a href="description.php3">Description</a></font></b></div>

          </td>
		  
        </tr>

        <tr>

          <td> 

      <div align="center">      <? 

// on se connecte à MySQL 

$db = mysql_connect($host, $user, $pass); 



// on séléctionne la base 

mysql_select_db($base,$db); 



// on créer la requete SQL et on l'envoie 

$sql = 'SELECT nom,support,langue,qualite,description FROM liste ORDER BY description'; 



// on envoie la requete 

$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 



// on fait une boucle qui va faire un tour pour chaque enregistrements 



while($data = mysql_fetch_array($req)) 

   

  { 

    // on affiche les informations de l'enregistrements en cours 

    echo $data['nom'].'<br>';





}



// on ferme la connexion à mysql 

mysql_close(); 

?>

            </div>

          </td>

          <td> <div align="center">

            <? 

// on se connecte à MySQL 

$db = mysql_connect($host, $user, $pass); 



// on séléctionne la base 

mysql_select_db($base,$db); 



// on créer la requete SQL et on l'envoie 

$sql = 'SELECT nom,support,langue,qualite,description FROM liste ORDER BY description'; 



// on envoie la requete 

$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 



// on fait une boucle qui va faire un tour pour chaque enregistrements 



while($data = mysql_fetch_array($req)) 

   

  { 

    // on affiche les informations de l'enregistrements en cours 

    echo $data['support'].'<br>';





}



// on ferme la connexion à mysql 

mysql_close(); 

?>

            </div>

          </td>

          <td> <div align="center">

            <? 

// on se connecte à MySQL 

$db = mysql_connect($host, $user, $pass); 



// on séléctionne la base 

mysql_select_db($base,$db); 



// on créer la requete SQL et on l'envoie 

$sql = 'SELECT nom,support,langue,qualite,description FROM liste ORDER BY description'; 



// on envoie la requete 

$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 



// on fait une boucle qui va faire un tour pour chaque enregistrements 



while($data = mysql_fetch_array($req)) 

   

  { 

    // on affiche les informations de l'enregistrements en cours 

    echo $data['langue'].'<br>'; 

    





}



// on ferme la connexion à mysql 

mysql_close(); 

?>

            </div>

          </td>

          <td> 

           <div align="center"> <? 

// on se connecte à MySQL 

$db = mysql_connect($host, $user, $pass); 



// on séléctionne la base 

mysql_select_db($base,$db); 



// on créer la requete SQL et on l'envoie 

$sql = 'SELECT nom,support,langue,qualite,description FROM liste ORDER BY description'; 



// on envoie la requete 

$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 



// on fait une boucle qui va faire un tour pour chaque enregistrements 



while($data = mysql_fetch_array($req)) 

   

  { 

    // on affiche les informations de l'enregistrements en cours 

   echo $data['qualite'].'<br>';





}



// on ferme la connexion à mysql 

mysql_close(); 

?>

            </div>

          </td>

          <td> 

           <div align="center"> <? 

// on se connecte à MySQL 

$db = mysql_connect($host, $user, $pass); 



// on séléctionne la base 

mysql_select_db($base,$db); 



// on créer la requete SQL et on l'envoie 

$sql = 'SELECT nom,support,langue,qualite,description FROM liste ORDER BY description'; 



// on envoie la requete 

$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 



// on fait une boucle qui va faire un tour pour chaque enregistrements 



while($data = mysql_fetch_array($req)) 

   

  { 

    // on affiche les informations de l'enregistrements en cours 

   echo $data['description'].'<br>';





}



// on ferme la connexion à mysql 

mysql_close(); 

?>

            </div>

          </td>

        </tr>

      </table>

    </td>

  </tr></table><br>











<table border=1 cellpadding=2 cellspacing=0 bordercolordark=#FFFFFF bordercolorlight=#666666 width=800>

<tr bgcolor=<? echo"$tabletop"; ?>>

<td width=100%><center><b><font size=2 face=arial, helvetica, geneva>

<?

mysql_connect($host, $user, $pass);

mysql_select_db($base) or die( "Connexion impossible à la base de donnée !!!!!!");

$sql = mysql_query("SELECT * FROM liste");

$numfilms = mysql_num_rows($sql);



echo "Je possède actuellement $numfilms films";



mysql_close();



?></td></tr></table><br>

<center><br>
  <font class='text0'> | http://PhpMyDivX.free.fr | Copyright PhpMyDivX® 2001 
  - 2002 | By InKLy et Choizo | </font> 
</center>