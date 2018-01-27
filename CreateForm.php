<?php
/**
 * generation de formulaire.
 * @var array donne utilise par le formulaire
 */
class  CreateForm{

/**
 * Enter description here ...
 * @var array donne utilise par le formulaire
 */
	
public $data;
/**
 * Enter description here ...
 * @var string donne utilise pour entree les champs
 */
public $surrond="p";

public function __construct($data){
$this->data=$data;
}
/**
 * Enter description here ...
 * @param  code html $html string a entoure
 * return string
 */
public function surround($html){
  return "{$this->surrond}>{$html}</{$this->surrond}";
}
/**
 * Enter description here ...
 * @param $index string  index de la valeur a recupere
 * return string
 */
public function getValue($index){
	
	
	return isset($this->data[$index])?$this->data[$index]:null;
}

/**
 * Enter description here ...
 * @param $name string  
 * return string
 */

public function input ($nameClass,$name,$numberParam){
	$input='';

$nameClass='<label> Welecome your class is : '.$nameClass.'</label><hr><br><br>';
for ($i=0;$i<$numberParam;$i++){
$input.='Parametre '.($i+1).':';
$name='prop'.($i+1);
$input.='<input type="text" name="'.$name.'" value="'.$this->getValue($name).'">'.'<br><br>';
$this->surround($input);
}
return $nameClass.$input;
}
/**
 * Enter description here ...
 * 
 * return string
 */

public function send(){
echo "<input type='submit' value='submit'>";
echo "<form>";
}
}
?>


