<?php
//var_dump($_POST);
session_start();
require_once "GestMySQL.php";
require_once 'GestionnaireXML.php';


function getNameClass(){
 return $_SESSION['inputsNameClasse'];
}
// echo getChekFunction();
makePhpFile();
if (getChekFunction()==1){
GestionnaireMySQL::Connect();
GestionnaireMySQL::SelectDB("projet");
require_once $_SESSION['inputsNameClasse'].".php";
$myobj= new $_SESSION['inputsNameClasse'];
GestionnaireMySQL::CreateTable($myobj);
}
else{
    require_once "{$_SESSION['inputsNameClasse']}.php";
    
    $today = date("Y-m-d H:i:s");
    $filess="id".$today;
    $obj=new $_SESSION['inputsNameClasse'];
   GestionnaireXML::InsertItem($obj) ;  

}




function getParameter(){
 	$prop="";
foreach($_POST as $cle=>$value ){
 $prop.="public "."$".$value .";\n";
      }
return $prop;
 }
 function getChekFunction(){
 	return $_SESSION['checkfunction'];
 }

function makePhpFile(){
if (getChekFunction()==1){
makePhp("templateFunction");
echo"<br> function incluse yes <br>";
}
else{
makePhp("templateNoFunction");
echo"<br>function no<br>";
}
}
function makePhp($template){
$myfile = fopen($template.".php","r") or die("Erreur!");
$fs = filesize($template.".php");
$data = fread($myfile,$fs);
fclose($myfile);
$phpfile = fopen(getNameClass().".php","w") or die("Erreur!");
$newData = str_replace("MyClass",getNameClass(),$data);
$newData = str_replace("prop",getParameter(),$newData);	
fwrite($phpfile,$newData);
}






?>