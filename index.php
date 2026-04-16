<?php

$name = isset($_GET['name']) ? $_GET['name'] : "Student";
$marks = array(60, 75, 40, 90, 55);
echo "<h3>Student Marks</h3>";
foreach($marks as $m){
    echo $m . "<br>";
}

$total = 0;
foreach($marks as $m){
    $total = $total + $m;
}
$avg = (float)$total / count($marks);

$max = max($marks);
$min = min($marks);
$pass = 0;
$fail = 0;

foreach($marks as $m){
    if($m >= 50){
        $pass++;
    } else {
        $fail++;
    }
}
function findAverage($arr){
    $sum = array_sum($arr);
    return $sum / count($arr);
}

echo "<h3>Results</h3>";
echo "Total: ".$total."<br>";
echo "Average: ".findAverage($marks)."<br>";
echo "Max: ".$max."<br>";
echo "Min: ".$min."<br>";
echo "Pass: ".$pass."<br>";
echo "Fail: ".$fail."<br>";

$student = array(
    "name"=>"Rakib",
    "id"=>"23-51026-1",
    "cgpa"=>3.38
);

echo "<h3>Student Details</h3>";
foreach($student as $key=>$value){
    echo $key." : ".$value."<br>";
}
echo "<br>Uppercase Name: ".strtoupper("rakib");
echo "<br>Name Length: ".strlen("rakib");

echo "<br>Total Students: ".count($marks);

?>