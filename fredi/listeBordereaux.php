<!DOCTYPE html>
<?php
 include 'inc/ndfDAO.php'

$dao_note_frais=
session_start();
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
$id=$_SESSION['id'];
$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];


   
?>



<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <title>ListeBordereaux</title>
    </head>
    
    <body>
         <div id="topcorner">
        <?php
       include 'inc/afficheconnection.php';

         if($id =! null) 
                 {
                   $dao_note_frais= new Note_de_fraisDAO;
                   $rows=$dao_note_frais->find($id);
                     if($rows = null)
                     {
                      $affi=1
                     }
                     else{
                      $affi=2  
                     }

                  }
          else    {
       
                    header('Location: index.php');
          
                  }

          if($affi = 2)
          {

         foreach ($rows as $row) 
              {
                echo('bordereaux'.$row->get_id_note_de_frais().$row->get_annee()) 
              }

          } 
        if($affi = 1)
        {
         echo("vous n'avez aucun bordereau, créé une ligne de frais va automatiquement vous créé un borderaux pour l'année actuelle")
         ?>
         <p><a href="ajouter.php" >Ajouter</a> une ligne de frais</p>
        <?php
         
        }




        ?>
        </div>
        
         </div>
        <div id="global">
         
         
    </body>
</html>