 <?php

include "inc/lignefraisDAO.php";


$lignefraisDAO = new lignefraisDAO();
$rows = $lignefraisDAO->findAll();


?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">  

    <title>Afficher</title>
    <link rel="stylesheet" type="text/css" href="css/tableaufaq.css" />
  </head>
  <body>

            
        <table border=1 cellspacing=1 cellpadding=2 bordercolor="black">

            <caption><h1>Tableau des notes de frais </h1></caption>
            <tr>
           
                <th>ID lf</th>
                <th>Date</th>
                <th>Motif</th>
                <th>Trajet</th>   
                <th>Kms parcourus</th>
                <th>Coût Trajet</th>
                <th>Péages</th>
                <th>Repas</th>
                <th>Hebergement</th>
                <th>Total</th>
                <th>Modifier</th> 
                <th>Supprimer</th>             
            
            </tr>

            <?php 

              foreach ($rows as $lignefrais) {
                echo('<tr>
                        <td>'.$lignefrais->get_id_lf().'</td>
                        <td>'.$lignefrais->get_datetrajet_lf().'</td>
                        <td>'.$lignefrais->get_trajet_lf().'</td>
                        <td>'.$lignefrais->get_km_lf().'</td>
                        <td>'.$lignefrais->get_couttrajet_lf().'</td>
                        <td>'.$lignefrais->get_coutpeage_lf().'</td>
                        <td>'.$lignefrais->get_coutrepas_lf().'</td>
                        <td>'.$lignefrais->get_couthebergement_lf().'</td>
                        <td>'.$lignefrais->get_annee_indemnite().'</td> 
                        <td>'.$lignefrais->get_id_motif().'</td>
                        
                      </tr>');   
                  ?>
                        

            }

            ?>
         
        </table>

                  <p><a href="ajout.php" >Ajouter</a> une note de frais</p>&nbsp;
  </body>
</html>