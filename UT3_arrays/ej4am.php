<HTML>
<HEAD><TITLE> EJ4AM </TITLE><style>table, td{border: 1px solid;}</style></HEAD>
<BODY>
<?php
$matrix =     [[2,4,6,23,7],
              [8,10,12,87,2],
              [14,16,18,9,123]];

$biggest = $matrix[0][0];
$bigcoords = ["x" => 0, "y" => 0];



for ($i = 0; $i < count($matrix); $i++){
    for ($k = 0; $k < count($matrix[$i]); $k++){
        if ($matrix[$i][$k] > $biggest){
            $biggest = $matrix[$i][$k];
            $bigcoords["x"] = $i;
            $bigcoords["y"] = $k;
        }
    }
}    

echo("El numero mas grande se encuentra en la fila " . ($bigcoords["x"] + 1)); echo("<br>");
echo("El numero mas grande se encuentra en la columna " . ($bigcoords["y"] + 1));

?>
</BODY>
</HTML>