<?php
session_start();
require_once 'CreateForm.php';
?>


<html>
<head>
<title>Genration class </title>
</head>
<body>

<?php
echo "<form method='post' action='makeClass.php'>";
$form=new CreateForm($_POST);
$nameClass=test_input($_POST["NameClass"]);
$_SESSION['inputsNameClasse']=$nameClass;
$numberParam=test_input($_POST["numberParam"]);
$chkFunction=test_input($_POST["chkFunction"]);
$_SESSION['checkfunction']=$chkFunction;
/*if($chkFunction==2){
echo "<br> ma function ".$chkFunction."<br>"; 
}*/

$chkCreate=test_input($_POST["chkCreate"]);
echo $form->input($nameClass,"prop ",$numberParam);
$form->send();
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//echo $form->input($_POST['NameClass']);

?>

</body>
</html>