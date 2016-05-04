<?php

include('../config.php');

echo "<center><b><font color='#336699' size='4' face='Arial, Helvetica, sans-serif'>Recherche d'un Film</font></b><br>";
echo "<img src='koyot.jpg' width='157' height='131' alt='Le coyote a la recherche d un film ou de bipbip !'><br></center>";
$bdd = @mysql_connect($host,$user,$pass);
     @mysql_select_db($base,$bdd);
if (!$bdd) {
    echo"<center><h4>Impossible de se connecter à la base de données.</h4></center>";
    exit;
}
switch($task) {
    case 2: // recherche dans la base
        if ($op2) {
            $query="SELECT * FROM liste WHERE id IS NOT NULL";
            if ($id) {
                $query.=" AND id LIKE '$id%'";
            }
            if ($nom) {
                $query.=" AND nom LIKE '$nom%'";
            }
            if ($support) {
                $query.=" AND support LIKE '$support%'";
            }
            if ($langue) {
                $query.=" AND langue LIKE '%$langue%'";
            }
            if ($description) {
                $query.=" AND description LIKE '%$description%'";
            }
            if ($qualite) {
                $query.=" AND qualite LIKE '%$qualite%'";
            }
            $query.=" ORDER BY nom";
            $res=mysql_query($query);
            echo"<table width='0%' cellpadding='5' cellspacing='1' border='0' align='center'>";
            echo"<td bgcolor='#ffffff' align='center'><b>Id</b></td><td bgcolor='#ffffff' align='center'><b>Nom</b></td><td bgcolor='#ffffff' align='center'><b>Support</b></td><td bgcolor='#ffffff' align='center'><b>Langue</b></td><td>&nbsp;</td><td bgcolor='#ffffff' align='center'><b>Description</b></td><td bgcolor='#ffffff' align='center'><b>Qualite</b></td><td>&nbsp;</td></tr>";
            while($val=mysql_fetch_array($res,$bdd)) {
                $id = $val['id'];
                $nom = $val['nom'];
                $support = $val['support'];
                $langue = $val['langue'];
                $description = $val['description'];
                $qualite = $val['qualite'];
                echo"<td bgcolor='#ffffff'>".$id."</td><td bgcolor='#ffffff'>".$nom."</td><td bgcolor='#ffffff'>".$support."</td><td bgcolor='#ffffff'>".$langue."</td><td bgcolor='#ffffff'><td bgcolor='#ffffff'>".$description."</td><td bgcolor='#ffffff'>".$qualite."</td><td bgcolor='#ffffff'><td bgcolor='#ffffff'><A HREF='recherche.php?task=4&id=$id&nom=$nom&support=$support&langue=$langue&description=$description&qualite=$qualite'>modifier</A></td><td bgcolor='#ffffff'><A HREF='recherche.php?task=3&id=$id'>effacer</A></td></tr>";
            }
            echo"</table><br>";
        }
        echo"<table width='0%' cellpadding='5' cellspacing='0' border='0' align='center' bgcolor='#ffffff'>
             <form name='recherche' action='recherche.php?task=2' method='post'>
               <tr>
                 <td align='right'>Id :</td>
                 <td><input type='text' name='id'></td>
               </tr>
               <tr>
                 <td align='right'>Nom :</td>
                 <td><input type='text' name='nom'></td>
               </tr>
               <tr>
               <td align='right'>Langue :</td>
               <td><select name='langue' size='1'><br>
               <option value=''>Choisir</option>
               <option value='Français'>Français</option>
               <option value='Anglais'>Anglais</option>
               <option value='BivX'>BivX</option>
               <option value='Autre'>Autre</option>
               </select></td>
               </tr>
               <tr>
                 <td align='right'>Support :</td>
                 <td><select name='support' size='1'><br>
                 <option value=''>Choisir</option>
				 <option value='1*650'>1 cd de 650 Mo</option>
				 <option value='1*700'>1 cd de 700 Mo</option>
				 <option value='2*650'>2 cd de 650 Mo</option>
				 <option value='2*700'>2 cd de 700 Mo</option>
				 <option value='3*650'>3 cd de 650 Mo</option>
				 <option value='3*700'>3 cd de 700 Mo</option></select></td>
               </tr>
               <tr>
                 <td align='right'>Description :</td>
                 <td><input type='text' name='description'></td>
               </tr>
               <tr>
                 <td align='right'>Qualite :</td>
                 <td><select name='qualite' size='1'><br>
                 <option value=''>Choisir</option>
                 <option value='mauvaise'>Mauvaise</option>
                 <option value='moyenne'>Moyenne</option>
                 <option value='bonne'>Bonne</option>
                 <option value='excellente'>Excellente</option>
                 </select></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td><input type='submit' name='op2' value='Rechercher'></td>
               </tr>
             </form>
           </table>";
    break;
    case 3: // suppression des resultats
        echo"<table align='center'><tr><td>Vous êtes sûr ?<li><A HREF='recherche.php?task=5&id=$id'>Ok<A/></li><li><A HREF='javascript:history.back();'>Annuler<A/></li></td></tr></table>";
    break;
    case 4: // modifier des resultats
        if ($op4) {
            $query="UPDATE liste SET nom='$nom', support='$support', langue='$langue' description='$description' qualite='$qualite' WHERE id='$id'";
            $res=mysql_query($query);
            if ($res) {
                echo"<center><h4>Entrée modifiée</h4></center>";
            } else {
                echo"<center><h4>Erreur</h4></center>";
            }
        }
        echo"<table width='0%' cellpadding='5' cellspacing='0' border='0' align='center' bgcolor='#fffff'>
             <form name='modifier' action='recherche.php?task=4' method='post'>
               <tr>
                 <td colspan='2' align='center'><h2>Modifier</h2></td>
               </tr>
               <tr>
                 <td align='right'>Id</td>
                 <td>$id</td>
               </tr>
               <tr>
                 <td align='right'>Nom</td>
                 <td>$nom</td>
               </tr>
               <tr>
                 <td align='right'>Support</td>
                 <td>$support</td>
               </tr>
               <tr>
                 <td align='right'>Langue</td>
                 <td>$langue</td>
               </tr>
               <tr>
                 <td align='right'>Description</td>
                 <td><input type='text' name='description' value=$description></td>
               </tr>
               <tr>
                 <td align='right'>Qualite</td>
                 <td>$qualite</td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td>
                   <input type='hidden' name='id' value='$id'>
                   <input type='hidden' name='nom' value='$nom'>
                   <input type='hidden' name='support' value='$support'>
                   <input type='hidden' name='langue' value='$langue'>
                   <input type='hidden' name='qualite' value='$qualite'>
                   <input type='submit' name='op4' value='Modifier'></td>
               </tr>
             </form>
           </table>";
    break;
    case 5:
        $query="DELETE FROM liste WHERE id = '$id'";
        $res=mysql_query($query);
        if ($res) {
            echo"<center>Supprimée !<br><br><a href='recherche.php?task=2'>Autre recherche</a><br><br><a href='../index.php'>Retour a la liste</a></center>";
        } else {
            echo"<center><h4>Erreur</h4></center>";
        }
    break;
    default:
        echo "<center></center>";
    break;
}
