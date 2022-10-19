<?php
function clean($string){
  return (htmlentities(filter_var(trim($string), FILTER_SANITIZE_SPECIAL_CHARS)));
}

function verifyName($name){
  $patt = "/([A-Za-z ]{2,50})\b/";
  return preg_match($patt, $name);
}

function verifyLastName($name){
  $patt = "/([A-Za-z ]{2,50})\b/";
  return preg_match($patt, $name);
}

function verifyEmail($email){
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function isEmptyArray($array){
  foreach ($array as $value){
    if (empty($value)){
      return false;
    }
  }
  return true; 
}

function addUserTo($filename, $values){
  //Comprobando si el archivo existe, si no, crearlo
  if (!file_exists($filename)){
    $file = fopen($filename, "w");
    fwrite($file, "nombre, apellido, apellido2, email, sexo" . "\n");
    fclose($file);
    $file = fopen($filename ,"a");
    $text = implode(", ", $values) . "\n";
    fwrite($file, $text);
    fclose($file);
  } else { //Si existe, abrirlo en modo append
    $file = fopen($filename ,"a");
    $text = implode(", ", $values) . "\n";
    fwrite($file, $text);
    fclose($file);
  }
}
?>
