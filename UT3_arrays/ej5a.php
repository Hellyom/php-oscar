<HTML>
<HEAD><TITLE>EJ5A</TITLE><style>table, td{border: 1px solid;}</style></HEAD>
<BODY>
<?php
$class1 = ["Bases Datos", "Entornos Desarrollo", "Programación"];
$class2 = ["Sistemas Informáticos", "FOL", "Mecanizado"];
$class3 = ["Desarrolo Web ES", "Desarrollo Web EC", "Despliegue", "Desarrollo Interfaces", "Inglés"];

$merged1 = [];
$merged2 = [];
$merged3 = [];

//A

$temp = [$class1, $class2, $class3];
for ($i = 0; $i < count($temp); $i++){
    for ($k = 0; $k < count($temp[$i]); $k++){
        $merged1[count($merged1) + 1] = $temp[$i][$k];
    } //$merged1 no tiene index 0
}
echo(implode(" | ", $merged1));

//B

$merged2 = array_merge($class1, $class2, $class3);
echo("<br>" . implode(" / ", $merged1));

//C

for ($i = 0; $i < count($temp); $i++){
    for ($k = 0; $k < count($temp[$i]); $k++){
        array_push($merged3, $temp[$i][$k]);
    }
}

echo("<br>" . implode(" \ ", $merged3));
?>
</BODY>
</HTML>