<?php
require_once __DIR__ . "/../../../config/lab6_db.php";
require_once __DIR__ . "/dao/pdo/LecturerDaoPdo.php";
require_once __DIR__ . "/dao/pdo/FacultyDaoPdo.php";
require_once __DIR__ . "/dao/pdo/DegreeDaoPdo.php";
require_once __DIR__ . "/dao/pdo/PositionDaoPdo.php";

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

echo "<hr>Degrees<hr>";

$degreeDao = new DegreeDaoPdo($db);
$degrees = $degreeDao->getAll();

foreach ($degrees as $degree) {
    echo print_r($degree->toArray());
    echo "<br><br>";
}

echo "<hr>Positions<hr>";

$positionDao = new PositionDaoPdo($db);
$positions = $positionDao->getAll();

foreach ($positions as $position) {
    echo print_r($position->toArray());
    echo "<br><br>";
}

echo "<hr>Lecturers from faculty 'ФПМ'<hr>";
$faculty = $facultyDao->findOneWithName("ФПМ");
$lecturers = $lecturerDao->findAllWithFaculty($faculty->getId());
foreach ($lecturers as $lecturer) {
    echo print_r($lecturer->toArray());
    echo "<br><br>";
}