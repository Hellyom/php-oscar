<HTML>
<HEAD><TITLE>EJ8A</TITLE><style>table, td{border: 1px solid;}</style></HEAD>
<BODY>
<?php
$alumnos = ["Oscar" => 19, "Andres" => 73, "Marcos" => 23, "Diana" => 24, "Manu" =>27];

//min(), max() existen para arrays indexados

$max = -1;
$min = -1;
$average = array_sum($alumnos) / count($alumnos);

//min
foreach ($alumnos as $x => $val){
    if ($val > $max) {$max = $val;}
}

//max
$min = $max;
foreach ($alumnos as $x => $val){
    if ($val < $min) {$min = $val;}
}

echo("<br>");
echo("max " . $max);
echo("<br>");
echo("min " . $min);
echo("<br>");
echo("average " . $average);
?>
</BODY>
</HTML>