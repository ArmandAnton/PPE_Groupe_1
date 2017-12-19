<?php

include 'inc/connexion_bd.inc.php';

$datetrajet = isset($_POST['datetrajet']) ? $_POST['datetrajet'] : '';
$motif = isset($_POST['motif']) ? $_POST['motif'] : '';
$trajet = isset($_POST['trajet']) ? $_POST['trajet'] : '';
$km = isset($_POST['km']) ? $_POST['km'] : '';
$ct = isset($_POST['ct']) ? $_POST['ct'] : ''; //ct : Cout trajet
$cp = isset($_POST['cp']) ? $_POST['cp'] : ''; //cp : Cout péage
$cr = isset($_POST['cr']) ? $_POST['cr'] : ''; //cr : Cout repas
$ch = isset($_POST['ch']) ? $_POST['ch'] : ''; //ch : Cout hébergement
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Ajout d'une ligne de frais</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        
        <center>
            
            <h1>Ajouter une ligne de frais</h1>
            
            <p>Date trajet<br /><input type="date" required name="datetrajet"  />
            
            <p>
				<select name="motif">
				
					<option value="1" selected>Voyage</option>
					<option value="2" >Retard</option>
					<option value="3" >Lala</option>
				
				</select>
			</p>

            <p>Trajet <br /><input type="text" required name="trajet" placeholder="Exemple :Toulouse-Pamiers"  /></p>

            <p>Km Parcourus <br /><input type="text" required name="km"/></p>

            <p>Cout trajet <br /><input type="text" required name="ct"  /></p>
            
            <p>Cout péage <br /><input type="text" required name="cp"/></p>
            
            <p>Cout repas <br /><input type="text" required name="cr"/></p>
            
            <p>Cout hébergement <br /><input type="text" required name="ch"/></p>

            <p><input type="submit" name="submit" value="Ajouter"></p>
            <p><input type="reset" value="Annuler"></p>
        
        </center>
        <?php
        if($submit){
            
        
        $req = $con->prepare('INSERT INTO lignefrais(datetrajet_lf, id_motif, trajet_lf, km_lf, couttrajet_lf, coutpeage_lf, coutrepas_lf, couthebergement_lf) VALUE(:datetrajet, :motif, :trajet , :km, :ct, :cp, :cr, :ch )');
        
        $req->execute(array(
            ':datetrajet'            => $datetrajet,
            ':motif'                 => $motif,
            ':trajet'                => $trajet,
            ':km'                    => $km,
            ':ct'                 	 => $ct,
            ':cp'                  	 => $cp,
            ':cr'         			 => $cr,
            ':ch'                  	 => $ch
          
        ));
        header('Location: ajout.php');
        }
        
        ?>
        </form>  
       
       
    </body>



</html>




?>