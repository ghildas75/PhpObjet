<?php 
require_once 'GestionnaireXML.php';
class MyClass{
public $id;
 prop

	
 public function __construct(){
	
     
     $this->id=uniqid();
	}
	
	
	
	public function write(){
	     GestionnaireXML::InsertItem($this);
	  
	}
	public function getMyClass($id){
	    // Code pour rechercher les valeurs dans une table MySQL appelee MyClass correspondant a l'identifiant.
	    // Les valeurs sont ensuite attribuees au membres de la classe
	    $this->id=$id;
	    return GestionnaireXML::GetItem($this);
	}
	
}	
	?>