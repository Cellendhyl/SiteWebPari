<?php


class DAOPariUser{
  private $pariUser;
  private $connexion;
  
  public function __construct($pu) {
    $this->pariUser = $pu;
	$this->connexion = null;
  }