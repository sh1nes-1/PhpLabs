<?php
require_once __DIR__ . "/../../../config/lab6_db.php";
require_once __DIR__ . "/dao/pdo/LecturerDaoPdo.php";
require_once __DIR__ . "/dao/pdo/FacultyDaoPdo.php";

echo "<hr>Lecturers<hr>";

$lecturerDao = new LecturerDaoPdo($db);
$lecturers = $lecturerDao->getAll();

foreach ($lecturers as $lecturer) {
    echo print_r($lecturer->toArray());
    echo "<br><br>";
}

echo "<hr>Faculties<hr>";

$facultyDao = new FacultyDaoPdo($db);
$faculties = $facultyDao->getAll();

foreach ($faculties as $faculty) {
    echo print_r($faculty->toArray());
    echo "<br><br>";
}