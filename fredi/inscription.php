<?php
include 'inc/hashage.php';
include 'inc/connexion_bd.inc.php';

$nom = isset($_POST['nom']) ? $_POST['nom'] : '';
$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
$rue = isset($_POST['rue']) ? $_POST['rue'] : '';
$cp = isset($_POST['cp']) ? $_POST['cp'] : '';
$ville = isset($_POST['ville']) ? $_POST['ville'] : '';
$mail = isset($_POST['mail']) ? $_POST['mail'] : '';
$datenaissance = isset($_POST['datenaissance']) ? $_POST['datenaissance'] : '';
$sexe=isset($_POST['sexe']) ? $_POST['sexe'] : '';
$passe = isset($_POST['passe']) ? $_POST['passe'] : '';
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
?>

<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Inscription à Fredi</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        
        <center>
            
            <h1>Créer un compte</h1>
            
            <p>Nom :<br /><input type="text" required name="nom"  />
            
            <p>Prenom :<br /><input type="text" required name="prenom"  /></p>

            <p>Rue :<br /><input type="text" required name="rue"  /></p>

            <p>Code Postale :<br /><input type="text" required name="cp"  /></p>

            <p>Ville :<br /><input type="text" required name="ville"  /></p>
            
            <p>Adresse mail :<br /><input type="email" required name="mail"/></p>
            
            <p>Date de naissance :<br /><input type="date" required name="datenaissance"/></p>
            
            <p>
                
                <input type="radio" name="sexe" value="F" checked/>Femme<br />
                <input type="radio" name="sexe" value="H" >Homme

            </p>

            <p>Mot de passe :<br /><input type="password" required name="passe"/></p>

            <p><input type="submit" name="submit" value="Enregistrer"></p>
        
        </center>
        <?php
        if($submit){
            
        $crypt = hashage($passe);
        $req = $con->prepare('INSERT INTO demandeur(nom_demandeur, prenom_demandeur, rue_demandeur, cp_demandeur, ville_demandeur, mail_demandeur,  datenaissance_demandeur, sexe_demandeur, motdepasse_demandeur) VALUE(:nom, :prenom, :rue , :cp, :ville, :mail, :datenaissance, :sexe, :crypt)');
        $req->execute(array(
            'nom'                   => $nom,
            'prenom'                => $prenom,
            'rue'                   => $rue,
            'cp'                    => $cp,
            'ville'                 => $ville,
            'mail'                  => $mail,
            'datenaissance'         => $datenaissance,
            'sexe'                  => $sexe,
            'crypt'                 => $crypt
          
        ));
        header('Location: index.php');
        }
        
        ?>
        </form>  
       
       
    </body>



</html>