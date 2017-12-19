<!DOCTYPE html>
<?php
session_start();
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <title>login</title>
    </head>
    
    <body>
         <div id="topcorner">
        <?php
       include 'inc/afficheconnection.php';
       include 'inc/DemandeurDAO.php'
        ?>
        </div>
        
         </div>
        <div id="global">
         
            <h3>Entre vos coordonné pour vous connecter</h3>
            <h3>Cela vous permetra d'acceder a vos notes de frais </h3>  
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="form1" method="post">

            <p>Email :<br /><input type ="mail" required name="mail" value=""/></p>
            <p>Mot de passe :<br /><input type ="password" required  name="passe" value=""/></p>
            <p><input type="submit" name="submit" value="OK" /></p>


        </form>
        </div>
        <?php
        $mail = isset($_POST['mail']) ? $_POST['mail'] : '';
        $passe = isset($_POST['passe']) ? $_POST['passe'] : '';
       
      
        include 'inc/hashage.php';
        
        
        
        if ($submit) {

            $crypt = hashage($passe);
           
        $demandeurDAO=new DemandeurDAO;


       $user=$demandeurDAO->find($mail,$crypt);  
              

            if (count($user) > 0  ) {

           
               
                $_SESSION['id'] = $user->get_id_demandeur();
                $_SESSION['nom'] = $user->get_nom_demandeur();
                $_SESSION['prenom'] = $user->get_prenom_demandeur();
                $_SESSION['rue'] = $user->get_rue_demandeur();
                $_SESSION['cp'] = $user->get_cp_demandeur();
                $_SESSION['ville'] = $user->get_ville_demandeur();
                $_SESSION['mdp'] = $user->get_mdp_demandeur();
                $_SESSION['mail'] = $user->get_mail_demandeur();
                $_SESSION['datenaissance'] = $user->get_datenaissance_demandeur();
                $_SESSION['sexe'] = $user->get_sexe_demandeur();
         
              
                echo' <script type="text/javascript">
            alert("bienvenue '.$user->get_prenom_demandeur().' ");
            </script>';
                
            } 
            else 
             {
                echo ' <script type="text/javascript">
            alert("Erreur dans voter mot de passe ou adresse Email ");
            </script>';
                
            }
        }
       
        ?>

    </body>
</html>