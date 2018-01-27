<?php 
require_once 'GestionnaireXML.php';
class chat{
public $id;
 public $color;
public $race;
public $type;


	
 public function __construct(){
	
     
     $this->id=uniqid();
	}
	
	
	
	public function write(){
		
	     GestionnaireXML::InsertItem($this);
	  
	}
	public function getchat($id){
	    // Code pour rechercher les valeurs dans une table MySQL appelee chat correspondant a l'identifiant.
	    // Les valeurs sont ensuite attribuees au membres de la classe
	    $this->id=$id;
	    return GestionnaireXML::GetItem($this);
	
	}
	
	
	
}	
 $me = new chat();
/*$me->color = "red";
$me->type = " chaton";
$me->race = "aristochat";
$me->write(); */

 $result=$me->getchat("5a189962ce8b0");
 var_dump ($result);

	?>