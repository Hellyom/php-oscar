<HTML>
<HEAD><TITLE>EJ7A</TITLE><style>table, td{border: 1px solid;}</style></HEAD>
<BODY>
<?php
$alumnos = ["Oscar" => 19, "Andres" => 73, "Marcos" => 23, "Diana" => 24, "Manu" =>27];
//A
foreach ($alumnos as $x => $val){
    echo "$x = $val<br>";
}
//B
reset($alumnos);
printf(next($alumnos)."B");
//C
echo("<br>");
printf(next($alumnos)."C");
//D
echo("<br>");
printf(end($alumnos)."D");
//E
sort($alumnos);
echo("<br>");
printf(reset($alumnos));
printf("|");
printf(end($alumnos))
?>
</BODY>
</HTML>