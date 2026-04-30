<?php
header("Content-Type: application/json");
 
$student = array(
    "name" => "Abu jahed md Rakib",
    "id" => "23-51026-1",
    "department" => "CSE",
    "cgpa" => 3.56
);
 
echo json_encode($student);
?>