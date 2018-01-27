<?php 
require_once 'GestMySQL.php';


class MyClass{
public $id;
prop
	
 public function __construct(){
	
	}
	
	public function addMyClass(){
		// Code pour ajouter les valeurs de l'objet MyClass dans dans une table MySQL appelee MyClass
	 GestionnaireMySQL::InsertItem($this);
	}
	public function getMyClass($id){
		// Code pour rechercher les valeurs dans une table MySQL appelee MyClass correspondant a l'identifiant.
		// Les valeurs sont ensuite attribuees au membres de la classe
		$this->id=$id;
		return GestionnaireMySQL::GetItem($this);
	}
	public static function getMyClassList($array){
		// Code pour rechercher toutes les valeurs dans une table MySQL appelee MyClass.
		// Les valeurs sont ensuite attribuees au membres de la classe pour chaque entree de la table.
		// La liste finale des objets correspondants est ensuite retournee
		
	    return GestionnaireMySQL::SearchExactItems($array,"MyClass");
	}
	
	
}


?>