<?php

class Lf {


	private $id_lf; //Id de la ligne de frais
	private $datetrajet_lf; //Date tu trajet
  private $trajet_lf;
	private $km_lf; //Kilometres
  private $couttrajet_lf;
	private $coutpeage_lf; //cout des peages
	private $coutrepas_lf; //Cout des repas
	private $couthebergement_lf; //Cout de l'hebergement
  private $annee_indemnite;
  private $id_motif;
	

	
//Constructeur


function __construct(array $tableau = null) {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }
//Getter

function get_id_lf() {
    return $this->id_lf;
  }
  
function get_datetrajet_lf() {
    return $this->datetrajet_lf;
  }

function get_trajet_lf() {
    return $this->trajet_lf;
  }
  
function get_km_lf() {
    return $this->km_lf;
  }

function get_couttrajet_lf() {
    return $this->couttrajet_lf;
  }
  
function get_coutpeage_lf() {
    return $this->coutpeage_lf;
  }

  
function get_coutrepas_lf() {
    return $this->coutrepas_lf;
  }
  
function get_couthebergement_lf() {
    return $this->couthebergement_lf;
  }

function get_annee_indemnite() {
   return $this->annee_indemnite;
  }

function get_id_motif() {
   return $this->id_motif;
  }

//Setter

function set_id_lf($id_lf) {
    $this->id_lf = $id_lf;
  }
  
function set_datetrajet_lf($datetrajet_lf) {
    $this->datetrajet_lf = $datetrajet_lf;
  }

function set_trajet_lf($trajet_lf) {
    $this->trajet_lf = $trajet_lf;
  }
  
function set_km_lf($km_lf) {
    $this->km_lf = $km_lf;
  }

function set_couttrajet_lf($couttrajet_lf) {
    $this->couttrajet_lf = $couttrajet_lf;
  }
  
function set_coutpeage_lf($coutpeage_lf) {
    $this->coutpeage_lf = $coutpeage_lf;
  }
  
function set_coutrepas_lf($coutrepas_lf) {
    $this->coutrepas_lf = $coutrepas_lf;
  }
  
function set_couthebergement_lf($couthebergement_lf) {
    $this->couthebergement_lf = $couthebergement_lf;
  }

function set_annee_indemnite($annee_indemnite) {
    $this->annee_indemnite = $annee_indemnite;
  }  

function set_id_motif($id_motif) {
    $this->id_motif = $id_motif;
  }   

function hydrater(array $tableau) {
    foreach ($tableau as $cle => $valeur) {
      $methode = 'set_' . $cle;
      if (method_exists($this, $methode)) {
        $this->$methode($valeur);
      }
    }
  }










}