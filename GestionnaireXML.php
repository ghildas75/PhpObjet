<?php

class GestionnaireXML{
	public static function Connect(){
		return null;
	}
	public static function SelectDB($dbname){
		return null;
	}
	
	public static function InsertItem($obj){
		$classname = get_class($obj);
	  
		if(!file_exists($classname)){
		    mkdir($classname);
		}
		 $myfile = fopen($classname."/".$classname."_".$obj->id.".xml","w")or die("erreur");
		fwrite($myfile,'<?xml version="1.0" encoding="ISO8859-1" ?>'."\n");
		self::write($myfile,$obj);
		fclose($myfile); 
	}	
	
	public static function write($myfile, $obj){
		$classname = get_class($obj);
		fwrite($myfile,"<$classname>\n");
		
		$arrParams = get_object_vars($obj);
		foreach($arrParams as $key=>$value){
			fwrite($myfile,"<$key>$value</$key>\n");
		}
		
		
		fwrite($myfile,"</$classname>\n");
	}
	
	public static function GetItem($obj){
		$classname = get_class($obj) ;
		$myfile = $classname . "_" .$obj->id . ".xml";
		$xml = simplexml_load_file($myfile);
		
		$returnObject = new $classname;
		foreach(get_object_vars($xml) as $key=>$val){
			$returnObject->$key = $val;
		}
		
		return $returnObject;
		
	}
	public static function SearchExactItems($arrsearchitem, $classname){
		return null;
	}	
	public static function SearchLikeItems($arrsearchitem, $classname){
		return null;
	}	
}












/****************************** Tests ************************/
/* class Login{
		public $id;
		public $user;
		public $pass;
}

class Articles{
		public $id;
		public $titre;
		public $contenu;
		public $auteurId;
}

$me = new Login();
//$me->user = "ddd";
//$me->pass = "fff";
$me->id = 3;

GestionnaireXML::Connect();
GestionnaireXML::SelectDB("projet");
var_dump($me);echo "<br>";
$item3 = GestionnaireXML::GetItem($me);
var_dump($item3);


$arr = array("auteurId"=>"5");
$arr = array("user"=>"ddd","pass"=>"fff");
GestionnaireMySQL::SearchExactItems($arr,"Login");


 */











