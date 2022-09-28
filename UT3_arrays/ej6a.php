<HTML>
<HEAD><TITLE>EJ6A</TITLE><style>table, td{border: 1px solid;}</style></HEAD>
<BODY>
<?php
$class1 = ["Bases Datos", "Entornos Desarrollo", "Programación"];
$class2 = ["Sistemas Informáticos", "FOL", "Mecanizado"];
$class3 = ["Desarrolo Web ES", "Desarrollo Web EC", "Despliegue", "Desarrollo Interfaces", "Inglés"];

$merged1 = [];

$temp = [$class1, $class2, $class3];
for ($i = 0; $i < count($temp); $i++){
    for ($k = 0; $k < count($temp[$i]); $k++){
        $merged1[count($merged1) + 1] = $temp[$i][$k];
    } //merged1 no tiene index 0
}

//parte del ej6a

//array_reverse existe tmb
$mergedreversed = [];

for ($i = count($merged1) - 1; $i > 0; $i--){
    if ($merged1[$i] == "Mecanizado") {continue;}
    array_push($mergedreversed, $merged1[$i]);
}

echo(implode(" | ", $mergedreversed));
?>
</BODY>
</HTML>