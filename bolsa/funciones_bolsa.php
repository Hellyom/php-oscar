<?php
function printFile($url){ //Prints raw file 
  $file = file($url); //File returns an array of lines
  foreach ($file as $line){
    echo("<pre>"); // "pre"formated text
    echo($line);
    echo("</pre>");
    echo("<br>");
  }
}
function stockValues($stockname, $url){ //Returns array of all values of a specific stock
  $file = file($url); //File returns an array of lines
  for ($i = 1; $i < count($file); $i++){ //Nos saltamos la primera linea de headers
    $line = preg_split("/( +[^A-Za-z\d] )/", $file[$i]); //Split the line with a regex pattern -> 1 or more SPACE
    if ($line[0] === $stockname){
      return $line;
    }
  }
  echo("Esta accion no existe");
  return false;
}


function printArray($arr){ //Prints an array as a table
  echo("<table>");
  echo("<tr>");
  foreach ($arr as $val){
    echo("<td>");
    echo($val);
    echo("</td>");
  }
  echo("</table>");
  echo("</tr>");
}

function findStockNames($url){
  $file = file($url); //File returns an array of lines
  $stocknames = [];
  for ($i = 1; $i < count($file); $i++){ //Nos saltamos la primera linea de headers
    $line = preg_split("/( +[^A-Za-z\d] )/", $file[$i]); //Split the line with a regex pattern -> 1 or more SPACE
    array_push($stocknames, $line[0]);
  }
  return $stocknames;
}

function findFieldNames($url){ //Returns an array with the names of the fields/columns
  $file = file($url);
  $fieldnames = preg_split("/([ ]{2,})/", $file[0]);
  return $fieldnames;
}

function genOptions($arr){ //Generates HTML with values inside the tag provided [HTML tag to use] [array of values for each tag]
  foreach ($arr as $value){
    echo("<option value=" . "\"$value\"" . ">");
    echo($value);
    echo("</option>");
  }
}

function searchValue($url, $stockname, $fieldname){ //Searches for a value inside an array
    $file = file($url);
    $fieldnames = preg_split("/([ ]{2,})/", $file[0]); //Splitting field names
    $index = array_search($fieldname ,$fieldnames); //Index of the field
    return stockValues($stockname, $url)[$index];
  }

function sumOf($url, $fieldname){ //Returns the sum of a field/column
  $file = file($url); //File returns an array of lines
  $fieldnames = preg_split("/([ ]{2,})/", $file[0]); //Array with the field names in its correct index position
  $index = array_search($fieldname ,$fieldnames); //Index of the field

  $sum = 0;
  for ($i = 1; $i < count($file); $i++){ //Nos saltamos la primera linea de fields
    $line = preg_split("/( +[^A-Za-z\d] )/", $file[$i]); //Split the line with a regex pattern -> 1 or more SPACE
    $sum += intval(str_replace(".", "", $line[$index])); //Formatting the dots notation of 1.000 -> 1000
  }
  return $sum;
}

function minValue($url, $fieldname){ //Returns associative array with the Stock Name and the value
  $file = file($url); //File returns an array of lines
  $fieldnames = preg_split("/([ ]{2,})/", $file[0]); //Array with the field names in its correct index position
  $index = array_search($fieldname ,$fieldnames); //Index of the field

  $stockname = "";
  $min = 0;
  for ($i = 1; $i < count($file); $i++){
    $line = preg_split("/( +[^A-Za-z\d] )/", $file[$i]); //Split the line with a regex pattern -> 1 or more SPACE
    $num = intval(str_replace(".", "", $line[$index])); //Formatting the dots notation of 1.000 -> 1000
    if ($i == 1) {$min = $num;} //setting the first number as the min
    if ($num < $min){
      $min = $num;
      $stockname = $line[0];
    }
  }
  return ["name" -> $stockname, "value" -> $min];
}

function maxValue($url, $fieldname){ //Returns associative array with the Stock Name and the value 
  $file = file($url); //File returns an array of lines
  $fieldnames = preg_split("/([ ]{2,})/", $file[0]); //Array with the field names in its correct index position
  $index = array_search($fieldname ,$fieldnames); //Index of the field
  
  $stockname = "";
  $max = 0;
  for ($i = 1; $i < count($file); $i++){
    $line = preg_split("/( +[^A-Za-z\d] )/", $file[$i]); //Split the line with a regex pattern -> 1 or more SPACE
    $num = intval(str_replace(".", "", $line[$index])); //Formatting the dots notation of 1.000 -> 1000
    if ($i == 1) {$max = $num;} //setting the first number as the min
    if ($num > $max){
      $max = $num;
      $stockname = $line[0];
    }
  }
  return ["name" => $stockname, "value" => $max];
}
?>