<?php
//session_start();
require_once "constants.php";

class GestionnaireMySQL{
	public static $connection;
   public static function CreateTable($obj){
    $classname = strtolower ( get_class($obj) );
    
    $sql="CREATE TABLE if not exists  ".$classname." (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, ";
	$parm= get_class_vars($classname);
	foreach ($parm as $name => $value) {
		echo $value.'<br>';
		if ($name!="id"){
		echo $name;
		$sql.="".$name." varChar(30) ,";
		}
       }
       $sql = substr($sql,0,-1);
	$sql.=");";
	
	echo "<br>".$sql."<br>";
self::$connection->query($sql);
      }

	

	
	public static function Connect(){
		$c = new mysqli(_SERVER_,_DBUSERNAME_,_DBPASSWORD_);
		if($c->connect_error)
			die("Erreur: " . $c->connect_error);
		self::$connection = $c;
	}
		
	public static function SelectDB($dbname){
		if(self::$connection->select_db($dbname))
			echo " <br><b>Connection reussie <b><br>";
		else
			echo "Erreur de connection";
	}
	
	public static function InsertItem($obj){
		$classname = strtolower ( get_class($obj) );
		$properties = get_object_vars ($obj);
		$champs="";
		$valeurs="";
		//var_dump($properties);
		
		foreach($properties as $key=>$val){
			if($val != NULL){
				$champs .= $key . ",";
				if(is_string ($valeurs))
					$valeurs .= "'".$val . "',";
				else
					$valeurs .= $val . ",";
			}
		}
		$champs = substr($champs,0,-1);
		$valeurs = substr($valeurs,0,-1);		
		
		$sql = "INSERT INTO ".$classname." (".$champs.") VALUES (".$valeurs.");";
		
		self::$connection->query($sql);
	}
/*	
	public static function RetrieveItem($searchitem){
		if(is_array($searchitem))
			return SearchItem($searchitem);
		else
			return GetItem($searchitem);
	}
	*/
	
	
	public static function GetItem($obj){
		$classname = get_class($obj) ;
		
		$sql = "SELECT * FROM `".strtolower ( $classname)."` WHERE id=".$obj->id;

		$res= self::$connection->query($sql);
		
		$returnObject = new $classname;
		foreach($res->fetch_assoc() as $key=>$val){
			$returnObject->$key = $val;
		}
		
		return $returnObject;
//		return $res->fetch_assoc();
	}
	
	
	public static function SearchExactItems($arrsearchitem, $classname){
		self::SearchItems($arrsearchitem, $classname, "equal");
	}
	
	public static function SearchLikeItems($arrsearchitem, $classname){
		self::SearchItems($arrsearchitem, $classname, "like");
	}
	
	private static function SearchItems($arrsearchitem, $classname, $type="equal"){
		$arrReturnList = array();
		
		
		$sql = "SELECT * FROM ".strtolower ($classname)." WHERE 1=1";
		
		foreach($arrsearchitem as $keyField=>$value){
			if($type == "equal")
				$sql .= " AND (`" . $keyField . "` = '".$value."')";
			else
				$sql .= " AND (`" . $keyField . "` LIKE '%".$value."%')";
			//break;
		}
		
		$res = self::$connection->query($sql);

		
		while($row = $res->fetch_assoc()){
			$returnObject = new $classname;
			
			foreach($row as $key=>$val){
				$returnObject->$key = $val;
			}
			$arrReturnList[] = $returnObject;
		}
		echo "<pre>";
		//var_dump($arrReturnList);
		return $arrReturnList;
	}
	
}



/****************************** Tests ************************/
class Login{
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
GestionnaireMySQL::Connect();
GestionnaireMySQL::SelectDB("projet");

//GestionnaireMySQL::CreateTable($obj);
//GestionnaireMySQL::SelectDB("projet");
/*$me = new Login();
$me->user = "ddd";
$me->pass = "fff";
$me->id = 3;
$alphaBeta= new alphaBeta();
GestionnaireMySQL::Connect();

GestionnaireMySQL::CreateTable($alphaBeta);
var_dump(GestionnaireMySQL::$connection);
   GestionnaireMySQL::SelectDB(DBDATABASE);
//GestionnaireMySQL::InsertItem($me);

$item3 = GestionnaireMySQL::GetItem($me);
//var_dump($item3);


//$arr = array("auteurId"=>"5");
//$arr = array("user"=>"ddd","pass"=>"fff");
//GestionnaireMySQL::SearchExactItems($arr,"Login");*/














