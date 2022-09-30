<HTML>
<HEAD><TITLE> EJ7AM </TITLE><style>table, td{border: 1px solid; text-align: center;}</style></HEAD>
<BODY>
<?php
$gradebook =["Biologia"    => ["Alvaro" => 5, "Oscar" => 6, "Manu" => 9, "Pedro" => 6, "Marcos" => 5, "Patryk" => 5, "Dani" => 8, "Adrian" => 6, "Diana" => 8, "Sandra" => 8]
           , "Matematicas" => ["Alvaro" => 7, "Oscar" => 8, "Manu" => 4, "Pedro" => 7, "Marcos" => 2, "Patryk" => 7, "Dani" => 9, "Adrian" => 8, "Diana" => 4, "Sandra" => 2]
           , "Historia"    => ["Alvaro" => 4, "Oscar" => 3, "Manu" => 8, "Pedro" => 4, "Marcos" => 4, "Patryk" => 9, "Dani" => 4, "Adrian" => 4, "Diana" => 6, "Sandra" => 5]
           , "Tecnologia"  => ["Alvaro" => 4, "Oscar" => 9, "Manu" => 8, "Pedro" => 1, "Marcos" => 8, "Patryk" => 6, "Dani" => 7, "Adrian" => 7, "Diana" => 6, "Sandra" => 6]];

//La nota mas alta en una asignatura
$subjectToCheck = "Biologia";
$highestGrade = ["name" => "", "grade" => 0]; 
foreach ($gradebook[$subjectToCheck] as $student => $grade) {
    if ($grade > $highestGrade["grade"]) {
        $highestGrade["name"] = $student;
        $highestGrade["grade"] = $grade;
    }
}
echo($highestGrade["name"] . " ha sacado la nota más alta en " . $subjectToCheck . " con un " . $highestGrade["grade"]);
echo("<br>");

//La nota mas baja en una asignatura
$subjectToCheck2 = "Matematicas";
$lowestGrade = ["name" => "", "grade" => 10]; 
foreach ($gradebook[$subjectToCheck2] as $student => $grade) {
    if ($grade < $lowestGrade["grade"]) {
        $lowestGrade["name"] = $student;
        $lowestGrade["grade"] = $grade;
    }
}
echo($lowestGrade["name"] . " ha sacado la nota más baja en " . $subjectToCheck2 . " con un " . $lowestGrade["grade"]);
echo("<br>");

//Materia con la nota más baja de un alumno
$studentToCheck = "Oscar";
$lowStudentSub = ["subject" => "", "grade" => 10]; 
foreach ($gradebook as $subject => $students) {
    if ($students[$studentToCheck] < $lowStudentSub["grade"]) {
        $lowStudentSub["subject"] = $subject;
        $lowStudentSub["grade"] = $students[$studentToCheck];
    }
}
echo("La nota más baja de " . $studentToCheck . " es un " . $lowStudentSub["grade"] . " en " . $lowStudentSub["subject"]);
echo("<br>");

//Materia con la nota mas alta de un alumno
$studentToCheck2 = "Diana";
$highStudentSub = ["subject" => "", "grade" => 1]; 
foreach ($gradebook as $subject => $students) {
    if ($students[$studentToCheck2] > $highStudentSub["grade"]) {
        $highStudentSub["subject"] = $subject;
        $highStudentSub["grade"] = $students[$studentToCheck2];
    }
}
echo("La nota más alta de " . $studentToCheck2 . " es un " . $highStudentSub["grade"] . " en " . $highStudentSub["subject"]);
echo("<br>");

//Media de una materia
$subjectToCheck3 = "Historia";
$average = array_sum($gradebook[$subjectToCheck3]) / count($gradebook[$subjectToCheck3]);
echo("La nota media de la asignatura de " . $subjectToCheck3 . " es " . $average);
echo("<br>");

//Media de un alumno
$studentToCheck3 = "Dani";
$average2 = 0;
foreach($gradebook as $subject => $students){
    $average2 += $students[$studentToCheck3];
}
$average2 /= count($gradebook);

echo("La nota media de " . $studentToCheck3 . " es " . $average2)
?>
</BODY>
</HTML>