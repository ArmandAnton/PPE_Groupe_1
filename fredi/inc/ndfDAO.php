<?php

/**
* 
*/
include_once "inc/ndf.php";
class Note_de_fraisDAO  //attribut de la classe note de frais
{

	private $id_note_de_frais;
  private $id_Demandeur


  
private static function get_connexion() {
    if (self::$connexion === null) {
      // Récupération des paramètres de configuration BD
      $user = 'root';
      $pass = '';
      $host = 'localhost';
      $base = 'fredi';
      $dsn = 'mysql:host=' . $host . ';dbname=' . $base;
      // Création de la connexion
      try {
        self::$connexion = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        self::$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        throw new Exception("Erreur lors de la connexion : " . $e->getMessage());
      }
    }
    return self::$connexion;
  }
  



    function find($id_Demandeur) {
    $sql = "select * from adherent where id_Demandeur=:id_Demandeur";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":id_Demandeur" => $id_Demandeur));
      $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
     foreach ($rows as $row){
     $tableau[] = new Note_de_frais($row);
     }
  
    return $tableau; 
  }
 


  function hydrater(array $tableau) 
  {
    foreach ($tableau as $cle => $valeur) {
      $methode = 'set_' . $cle;
      if (method_exists($this, $methode)) {
        $this->$methode($valeur);
      }
    }
  }



}


































}