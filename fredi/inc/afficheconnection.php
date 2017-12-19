<?php


 @$prenom=$_SESSION['prenom'];
 
if(isset($_SESSION['prenom']) && !empty($_SESSION['prenom'])) 
       {
      echo ("Vous etes connecter: ".$prenom."  BIENVENUE!!!");
      echo ("<br/>");
        }
   
   else{
       echo ("<h4>Vous  n'etes pas connecter,cliquer sur connection pour vous connecter<h4>");
   }
?>